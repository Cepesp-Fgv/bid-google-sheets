<?php

namespace App\Http\Controllers;

use Google_Service_Sheets as GoogleSheetsService;
use Google_Service_Sheets_Spreadsheet as GoogleSheetsSpreadsheet;
use Google_Service_Sheets_ValueRange as GoogleSheetsValueRange;
use Illuminate\Http\Request;
use Illuminate\Support\LazyCollection;
use League\Csv\Reader;

class GoogleSheetsController extends Controller
{
    public function open(Request $request)
    {
        $title = $request->input('title', "DATAURBE " . now()->format('d/m/Y'));
        $url = $request->input('url');

        return view('prepare', compact('url', 'title'));
    }

    public function pipe(Request $request)
    {
        $url = $request->input('url');
        return response()->streamDownload(function () use ($url) {
            echo file_get_contents($url);
        });
    }

    public function callback(GoogleSheetsService $sheets)
    {
        $title = session('data.title');
        $separator = session('data.separator');
        $url = session('data.url');

        $contents = file_get_contents($url);

        if (empty($contents))
            return redirect()->route('sheets.open')->withInput(compact('title', 'url'))->withErrors("Could no read URL", 'csv');

        $csv = Reader::createFromString($contents);
        $csv->setDelimiter($separator);

        $data = [];
        foreach ($csv as $row) {
            $rowData = [];
            foreach ($row as $cell) {
                if (filled($cell))
                    array_push($rowData, mb_convert_encoding($cell, "UTF-8", "Windows-1252"));
            }

            if (filled($rowData))
                array_push($data, $rowData);
        }

        $spreadsheet = $this->createSpreadsheet($sheets, $title, $data);

        $redirectLink = "https://docs.google.com/spreadsheets/d/{$spreadsheet->getSpreadsheetId()}/edit";

        dd($redirectLink);

        return redirect()->to($redirectLink);
    }

    /**
     * @param GoogleSheetsService $sheets
     * @param string $title
     * @param array $data
     * @return GoogleSheetsSpreadsheet
     */
    private function createSpreadsheet(GoogleSheetsService $sheets, string $title, array $data): GoogleSheetsSpreadsheet
    {
        $spreadsheet = new GoogleSheetsSpreadsheet([
            'properties' => [
                'title' => $title
            ]
        ]);

        $spreadsheet = $sheets->spreadsheets->create($spreadsheet, [
            'fields' => 'spreadsheetId',
        ]);

        $valuesRange = new GoogleSheetsValueRange([
            'values' => $data
        ]);

        dump($valuesRange);

        $response = $sheets->spreadsheets_values->update($spreadsheet->getSpreadsheetId(), 'A1', $valuesRange, [
            'valueInputOption' => 'RAW',
            'includeValuesInResponse' => true
        ]);

        dump($response);

        return $spreadsheet;
    }

}

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

        $spreadsheet = new GoogleSheetsSpreadsheet([
            'properties' => [
                'title' => $title
            ]
        ]);
        $spreadsheet = $sheets->spreadsheets->create($spreadsheet, [
            'fields' => 'spreadsheetId',
        ]);

        $csv = Reader::createFromString(file_get_contents($url));
        $csv->setDelimiter($separator);

        $sheets->spreadsheets_values->update($spreadsheet->getSpreadsheetId(), 'A1', new GoogleSheetsValueRange([
            'values' => (new LazyCollection($csv))->toArray()
        ]), [
            'valueInputOption' => 'USER_ENTERED'
        ]);

        return redirect()->to("https://docs.google.com/spreadsheets/d/{$spreadsheet->getSpreadsheetId()}/edit#gid=0");
    }

}

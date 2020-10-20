<?php

namespace App\Http\Controllers;

use App\GoogleSheetsService;
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
        $encoding = $request->input('encoding');

        return response()->streamDownload(function () use ($url, $encoding) {
            $contents = file_get_contents($url);
            echo mb_convert_encoding($contents, 'UTF-8', $encoding);
        });
    }

    public function callback(GoogleSheetsService $sheets)
    {
        $title = session('data.title');
        $separator = session('data.separator', ';');
        $encoding = session('data.encoding', "Windows-1252");
        $url = session('data.url');

        $contents = file_get_contents($url);

        $back = redirect()->route('sheets.open')->withInput(compact('title', 'url'));

        if (empty($title))
            return $back->withErrors(['csv' => "O título é obrigatório"]);

        if (empty($contents))
            return $back->withErrors(['csv' => "Não foi possível git o CSV"]);

        $data = $this->parseContents($contents, $separator, $encoding);

        $spreadsheet = $sheets->create($title, $data);
        $redirectLink = GoogleSheetsService::link($spreadsheet);

        return redirect()->to($redirectLink);
    }

    /**
     * @param string $contents
     * @param string $separator
     * @param string $encoding
     * @return array[]
     * @throws \League\Csv\Exception
     */
    private function parseContents(string $contents, string $separator, string $encoding): array
    {
        $csv = Reader::createFromString($contents);
        $csv->setDelimiter($separator);

        $data = [];
        foreach ($csv as $row) {
            $rowData = [];
            foreach ($row as $cell) {
                if (filled($cell))
                    array_push($rowData, mb_convert_encoding($cell, "UTF-8", $encoding));
            }

            if (filled($rowData))
                array_push($data, $rowData);
        }

        return $data;
    }

}

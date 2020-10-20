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
        return response()->streamDownload(function () use ($url) {
            echo file_get_contents($url);
        });
    }

    public function callback(GoogleSheetsService $sheets)
    {
        $title = session('data.title');
        $separator = session('data.separator');
        $encoding = session('data.encoding');
        $url = session('data.url');

        $contents = file_get_contents($url);

        if (empty($contents))
            return redirect()->route('sheets.open')->withInput(compact('title', 'url'))->withErrors("Could no read URL", 'csv');

        $data = $this->parseContents($contents, $separator, $encoding);

        $spreadsheet = $sheets->create($title, $data);

        return redirect()->to(GoogleSheetsService::link($spreadsheet));
    }

    /**
     * @param bool $contents
     * @param string $separator
     * @return array[]
     * @throws \League\Csv\Exception
     */
    private function parseContents(bool $contents, string $separator, string $encoding): array
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

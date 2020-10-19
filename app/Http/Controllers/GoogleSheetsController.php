<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Revolution\Google\Sheets\Facades\Sheets;

class GoogleSheetsController extends Controller
{
    public function __invoke(Request $request)
    {
        $url = urldecode($request->get('url'));
        $date = now()->format('d/m/Y');
        $title = 'Dataurb ' . $date;

        Sheets::spreadsheetByTitle($title)
            ->addSheet($date)
            ->append([
                ["=IMPORTDATA(\"$url\")"]
            ]);
    }
}

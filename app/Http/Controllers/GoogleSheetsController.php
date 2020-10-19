<?php

namespace App\Http\Controllers;

use App\Http\Middleware\GoogleOAuth2Middleware;
use Google_Service_Sheets_Spreadsheet;
use Illuminate\Http\Request;
use League\OAuth2\Client\Provider\Google;
use League\OAuth2\Client\Token\AccessTokenInterface;

class GoogleSheetsController extends Controller
{
    /**
     * GoogleSheetsController constructor.
     */
    public function __construct()
    {
        $this->middleware('google.oauth2');
    }

    public function __invoke(Request $request, \Google_Service_Sheets $sheets)
    {
        $url = session('data.url');
        $date = now()->format('d/m/Y');
        $title = 'Dataurb ' . $date;
        $spreadsheet = new Google_Service_Sheets_Spreadsheet([
            'properties' => [
                'title' => $title
            ]
        ]);
        $spreadsheet = $sheets->spreadsheets->create($spreadsheet, [
            'fields' => 'spreadsheetId'
        ]);

        $sheets->spreadsheets_values->update($spreadsheet->getSpreadsheetId(), "A1", new \Google_Service_Sheets_ValueRange([
            'values' => [
                ["=IMPORTDATA(\"$url\")"]
            ]
        ]), [
            'valueInputOption' => 'USER_ENTERED'
        ]);

        dd($spreadsheet->getSpreadsheetUrl());
        return redirect()->to($spreadsheet->getSpreadsheetUrl());
    }
}

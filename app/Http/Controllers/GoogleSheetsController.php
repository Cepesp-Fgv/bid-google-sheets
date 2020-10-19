<?php

namespace App\Http\Controllers;

use Google_Service_Sheets_Spreadsheet;
use Illuminate\Http\Request;
use League\OAuth2\Client\Provider\Google;
use League\OAuth2\Client\Token\AccessTokenInterface;

class GoogleSheetsController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate(['url' => 'required']);

        $url = urldecode($request->input('url'));

        if ($redirectResponse = $this->getAccessToken($request, $url))
            return $redirectResponse;

        /** @var AccessTokenInterface $accessToken */
        $accessToken = session('google.access-token');

        $client = new \Google_Client();
        $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
        $client->setAccessToken($accessToken->getToken());

        $sheets = new \Google_Service_Sheets($client);

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
        ]));

        return redirect()->to($spreadsheet->getSpreadsheetUrl());
    }

    /**
     * @param Request $request
     * @param string $url
     * @return \Illuminate\Http\RedirectResponse|null
     * @throws \League\OAuth2\Client\Provider\Exception\IdentityProviderException
     */
    private function getAccessToken(Request $request, string $url)
    {
        /** @var AccessTokenInterface $accessToken */
        $accessToken = session('google.access-token');

        if (empty($accessToken) || $accessToken->hasExpired()) {
            $code = $request->input('code');

            $provider = new Google([
                'clientId' => env('GOOGLE_CLIENT_ID'),
                'clientSecret' => env('GOOGLE_CLIENT_SECRET'),
                'redirectUri' => route('sheets.open', [
                    'url' => $url
                ]),
            ]);

            if (empty($code)) {
                return redirect()->to($provider->getAuthorizationUrl());
            } else {
                $accessToken = $provider->getAccessToken('authorization_code', compact('code'));
            }
        }

        session()->put('google.access-token', $accessToken);
        return null;
    }
}

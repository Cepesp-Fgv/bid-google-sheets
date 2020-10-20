<?php


namespace App;


use Google_Service_Sheets;
use Google_Service_Sheets_Spreadsheet;
use Google_Service_Sheets_ValueRange;

class GoogleSheetsService
{
    /**
     * @var Google_Service_Sheets
     */
    private $api;

    /**
     * GoogleSheetsService constructor.
     * @param Google_Service_Sheets $sheets
     */
    public function __construct(Google_Service_Sheets $sheets)
    {
        $this->api = $sheets;
    }

    /**
     * @param string $title
     * @param array $data
     * @return Google_Service_Sheets_Spreadsheet
     */
    public function create(string $title, array $data): Google_Service_Sheets_Spreadsheet
    {
        $spreadsheet = new Google_Service_Sheets_Spreadsheet([
            'properties' => [
                'title' => $title
            ]
        ]);

        $spreadsheet = $this->api->spreadsheets->create($spreadsheet, [
            'fields' => 'spreadsheetId',
        ]);

        $valuesRange = new Google_Service_Sheets_ValueRange([
            'values' => $data
        ]);

        $this->api->spreadsheets_values->update($spreadsheet->getSpreadsheetId(), 'A1', $valuesRange, [
            'valueInputOption' => 'RAW',
        ]);

        return $spreadsheet;
    }

    public static function link(Google_Service_Sheets_Spreadsheet $sheet)
    {
        return "https://docs.google.com/spreadsheets/d/{$sheet->getSpreadsheetId()}/edit";
    }
}

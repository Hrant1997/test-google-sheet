<?php 

namespace App\Http\Services;

use Google\Client;
use Google\Service\Sheets;
use Google\Service\Sheets\SpreadsheetProperties;
use Google\Service\Sheets\Spreadsheet;
use Google\Service\Drive;
use Google\Service\Drive\Permission;
class GoogleSheetService {
  private static $config_path = __DIR__ . '/google_sheet_credentials.json';

  static function createSheet($name) {
    $client = new Client();
    $client->setApplicationName('Google Sheets API');
    $client->setScopes([Sheets::SPREADSHEETS, Drive::DRIVE]);
    $client->setAccessType('offline');
    $client->setAuthConfig(self::$config_path);

    // configure the Sheets Service
    $service = new Sheets($client);
    $spreadsheet = new Spreadsheet();

    $properties = new SpreadsheetProperties();
    $properties->setTitle($name);
    $spreadsheet->setProperties($properties);

    $createdSpreadsheet = $service->spreadsheets->create($spreadsheet);

    // Get the URL of the created Google Sheet
    $spreadsheetId = $createdSpreadsheet->spreadsheetId;

    $driveService = new Drive($client);
    $permission = new Permission();
    $permission->setType('anyone');
    $permission->setRole('reader');
    $driveService->permissions->create($spreadsheetId, $permission);

    $sheetUrl = "https://docs.google.com/spreadsheets/d/{$spreadsheetId}";
    return $sheetUrl;
  }


}
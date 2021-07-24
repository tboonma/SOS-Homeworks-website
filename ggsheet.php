<?php
function connectSheet() {
    require __DIR__ . '/vendor/autoload.php';

    $client = new \Google_Client();

    $client->setApplicationName('Google Sheets and PHP');

    $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);

    $client->setAccessType('offline');

    $client->setAuthConfig(__DIR__ . '/credentials.json');

    return $service
}
//Reading data from spreadsheet.
function getAllPermitUser() {
    
    $service = connectSheet();

    $spreadsheetId = "<YOUR_SPREADSHEET_ID>"; //It is present in your URL

    $get_range = "<SHEET_NAME:RANGE>";

    //Request to get data from spreadsheet.

    $response = $service->spreadsheets_values->get($spreadsheetId, $get_range);

    $values = $response->getValues();

    return $values;
}
function CheckExist($name) {

    $values = getAllPermitUser();
    foreach ($values as $user) {
        $found = FALSE;
        if (in_array($name, $user)) return TRUE;
    }
    return FALSE;
}
function getName($name) {
    $values = getAllPermitUser();
    foreach ($values as $user) {
        if ($user[0] === $name) {
            return $user[1];
        }
    }
}

function getHomeworks($userId) {
    $service = connectSheet();

    $spreadsheetId = "<YOUR_SPREADSHEET_ID>"; //It is present in your URL

    $get_range = "<SHEET_NAME:RANGE>";
    $response = $service->spreadsheets_values->get($spreadsheetId, $get_range);

    $values = $response->getValues();

    return $values;
}

function getPhotos() {
    $service = connectSheet();

    $spreadsheetId = "<YOUR_SPREADSHEET_ID>"; //It is present in your URL

    $get_range = "<SHEET_NAME:RANGE>";
    $response = $service->spreadsheets_values->get($spreadsheetId, $get_range);

    $values = $response->getValues();

    return $values;
}

function getLessons() {
    $service = connectSheet();

    $spreadsheetId = "<YOUR_SPREADSHEET_ID>"; //It is present in your URL

    $get_range = "<SHEET_NAME:RANGE>";
    $response = $service->spreadsheets_values->get($spreadsheetId, $get_range);

    $values = $response->getValues();

    return $values;
}
?>
<?php

function parseAirports(): array
{
    $file = storage_path('app/public/airports.csv');
    $airports = [];
    $rows   = array_map(
        function($v){
            return str_getcsv($v, "|");
        }, file($file)
    );
    $header = array_shift($rows);
    $csv    = array();
    foreach($rows as $row) {
        $row = mb_convert_encoding($row, "UTF-8", "WINDOWS-1251");
        $csv[] = array_combine($header, $row);
    }
    foreach ($csv as $row) {
        $airports[] = array_filter($row, function ($key) {
            return !is_numeric($key);
        }, ARRAY_FILTER_USE_KEY);
    }
    return $airports;
}

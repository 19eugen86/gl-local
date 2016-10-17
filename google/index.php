<?php
/**
 * Created by PhpStorm.
 * User: evgeniy.edlenko
 * Date: 05.08.2016
 * Time: 15:03
 */
echo '<pre>';

$reportData = [];

$f = fopen("data/Google_attributions_201608.csv", 'r');
while (($data = fgetcsv($f, null, ';', '"')) !== FALSE) {
    $clickData = json_decode($data[2], true);
    $reportData[] = [
        'GAID' => $data[0],
        'Timestamp' => $data[1],
        'Sub Publisher' => $clickData['sub_publisher'],
        'Sub Publisher 2' => $clickData['sub_publisher2'],
        'Sub Publisher 3' => $clickData['sub_publisher3'],
        'Sub Publisher 4' => $clickData['sub_publisher4'],
        'Sub Publisher 5' => $clickData['sub_publisher5'],
    ];
}
fclose($f);

$fp = fopen('report/Google_DML_Android_sub_publisher_04_08_2016.csv', 'w');
fputcsv($fp, ["GAID", "Timestamp", "Sub Publisher", "Sub Publisher 2", "Sub Publisher 3", "Sub Publisher 4", "Sub Publisher 5"]);

foreach ($reportData as $data) {
    fputcsv($fp, [
        $data['GAID'],
        $data['Timestamp'],
        $data['Sub Publisher'],
        $data['Sub Publisher 2'],
        $data['Sub Publisher 3'],
        $data['Sub Publisher 4'],
        $data['Sub Publisher 5']
    ]);
}

fclose($fp);


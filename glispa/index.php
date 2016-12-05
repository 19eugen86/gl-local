<?php
/**
 * Created by PhpStorm.
 * User: EDLENKO
 * Date: 02.12.2016
 * Time: 17:35
 */

echo '<pre>';

$reportData = [];

$f = fopen("report/attributions.csv", 'r');
while (($data = fgetcsv($f, null, ';', '"')) !== FALSE) {
    $clickData = json_decode($data[0], true);
    $installData = json_decode($data[4], true);

    $reportData[] = [
        $data[1],
        $data[2],
        $data[3],
        $installData['events'][0]['data']['d_name'],
        $clickData['sub_publisher'],
        $clickData['country'],
        long2ip($installData['ip_numeric']),
        (isset($clickData['clickid'])) ? $clickData['clickid'] : ''
    ];
}

//var_dump($reportData);
//die;

fclose($f);

$fp = fopen('Glispa_November_2016_report.csv', 'w');
fputcsv($fp, ["Click Date", "Install Date", "Device Id", "Device Name", "Sub Publisher", "Country", "IP", "Glispa Click ID"]);

foreach ($reportData as $row) {
    fputcsv($fp, [$row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7]]);
}
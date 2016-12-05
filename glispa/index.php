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
        (isset($data[1])) ? $data[1] : '',
        (isset($data[2])) ? $data[2] : '',
        (isset($data[3])) ? $data[3] : '',
        (isset($installData['events'][0]['data']['d_name'])) ? $installData['events'][0]['data']['d_name'] : '',
        (isset($installData['device_internal_identifiers']['mac'])) ? $installData['device_internal_identifiers']['mac'] : '',
        (isset($installData['device_internal_identifiers']['idfv'])) ? $installData['device_internal_identifiers']['idfv'] : '',
        (isset($installData['events'][3]['data']['idfv_old'])) ? $installData['events'][3]['data']['idfv_old'] : '',
        (isset($installData['events'][3]['data']['idfv_new'])) ? $installData['events'][3]['data']['idfv_new'] : '',
        (isset($installData['device_internal_identifiers']['idfa'])) ? $installData['device_internal_identifiers']['idfa'] : '',
        (isset($installData['events'][3]['data']['idfa_old'])) ? $installData['events'][3]['data']['idfa_old'] : '',
        (isset($installData['events'][3]['data']['idfa_new'])) ? $installData['events'][3]['data']['idfa_new'] : '',
        (isset($installData['device_internal_identifiers']['gdid'])) ? $installData['device_internal_identifiers']['gdid'] : '',
        (isset($clickData['sub_publisher'])) ? $clickData['sub_publisher'] : '',
        (isset($clickData['country'])) ? $clickData['country'] : '',
        (isset($installData['ip_numeric'])) ? long2ip($installData['ip_numeric']) : '',
        (isset($clickData['clickid'])) ? $clickData['clickid'] : ''
    ];
}

//var_dump($reportData);
//die;

fclose($f);

$fp = fopen('Glispa_November_2016_report.csv', 'w');
fputcsv($fp, [
    "Click Date",
    "Install Date",
    "Device Id",
    "Device Name",
    "MAC",
    "IDFV",
    "IDFV_OLD",
    "IDFV_NEW",
    "IDFA",
    "IDFA_OLD",
    "IDFA_NEW",
    "GDID",
    "Sub Publisher",
    "Country",
    "IP",
    "Glispa Click ID"
]);

foreach ($reportData as $row) {
    fputcsv($fp, [
        $row[0],
        $row[1],
        $row[2],
        $row[3],
        $row[4],
        $row[5],
        $row[6],
        $row[7],
        $row[8],
        $row[9],
        $row[10],
        $row[11],
        $row[12],
        $row[13],
        $row[14],
        $row[15]
    ]);
}
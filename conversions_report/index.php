<?php
/**
 * Created by PhpStorm.
 * User: evgeniy.edlenko
 * Date: 25.07.2016
 * Time: 16:52
 */



echo '<pre>';

$allAdvertisers = array();
if (($handle = fopen("data/advertisers.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle)) !== FALSE) {
        $allAdvertisers[] = $data[0];
    }
    fclose($handle);
}

$conversions = array();
if (($handle = fopen("data/Conversions_last_30_days_report.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $conversions[$data[0]] = $data[1];
    }
    fclose($handle);
}

$report = array();
foreach ($allAdvertisers as $adv) {
    $conversionsNum = 0;
    if (array_key_exists($adv, $conversions)) {
        $conversionsNum = $conversions[$adv];
    }
    $report[] = array(
        'advertiser_id' => $adv,
        'conversions' => $conversionsNum
    );
}

$handle = fopen("report/Conversions_last_30_days_report.csv", "w");
fputcsv($handle, array('advertiser ID', 'Conversions'));
foreach ($report as $row) {
    fputcsv($handle, array($row['advertiser_id'], $row['conversions']));
}
fclose($handle);
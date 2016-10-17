<?php
/**
 * Created by PhpStorm.
 * User: evgeniy.edlenko
 * Date: 19.08.2016
 * Time: 16:53
 */

echo '<pre>';

$reportData = [];

$f = fopen("data/campaigns.csv", 'r');
while (($data = fgetcsv($f, null, ',', '"')) !== FALSE) {
    $campaignId = $data[0];
    $conversionsNum = $data[2];

    $campaignInfo = explode(' - ', $data[1]);
    $num = count($campaignInfo);

    $publisher = $campaignInfo[0];
    $game = trim(str_replace('campaign', '', $campaignInfo[1]));
    $os = $campaignInfo[$num-1];

    $country = '';
    if ($num > 3) {
        if ($num == 4) {
            $country = $campaignInfo[2];
        } elseif ($num == 5) {
            if (strtolower($campaignInfo[2]) != 'adwords' && strtolower($campaignInfo[2]) != 'retention day 1') {
                $country = $campaignInfo[2].' - '.$campaignInfo[3];
            } else {
                $country = $campaignInfo[3];
            }
        } elseif ($num == 6) {
            if (strtolower($campaignInfo[2]) != 'adwords') {
                $country = $campaignInfo[2].' - '.$campaignInfo[3].' - '.$campaignInfo[4];
            }
        }
    }

    $reportData[] = [
        $game,
        $campaignId,
        $publisher,
        $country,
        $os,
        $conversionsNum
    ];
}
fclose($f);

$fp = fopen('report/DMK_DML_last_7_days_conversions_report.csv', 'w');
fputcsv($fp, ["Game", "Camp ID", "Publisher", "Country", "OS", "Conversions (total for  last 7 days)"]);

foreach ($reportData as $row) {
    fputcsv($fp, [$row[0], $row[1], $row[2], $row[3], $row[4], $row[5]]);
}

fclose($fp);
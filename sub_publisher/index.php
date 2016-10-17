<?php
/**
 * Created by PhpStorm.
 * User: evgeniy.edlenko
 * Date: 05.08.2016
 * Time: 15:03
 */
echo '<pre>';

$reportData = [];

$f = fopen("data/attributions_201605.csv", 'r');
while (($data = fgetcsv($f, null, ';', '"')) !== FALSE) {
    $subPublisher = $data[0];
    if (substr_count($data[0], '"') > 0) {
        $subPublisher = substr($data[0], 0, strpos($data[0], '"'));
    }

    if (!array_key_exists($subPublisher, $reportData)) {
        $reportData[$subPublisher] = 0;
    }
    $reportData[$subPublisher] += $data[1];
}
fclose($f);

$fp = fopen('report/Applifier_DMK_iOS_sub_publisher.csv', 'w');
fputcsv($fp, ["Sub Publisher", "Attributions"]);

foreach ($reportData as $subPublisher => $attributions) {
    fputcsv($fp, [$subPublisher, $attributions]);
}

fclose($fp);


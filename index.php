<?php
/**
 * Created by PhpStorm.
 * User: evgeniy.edlenko
 * Date: 14.07.2016
 * Time: 15:26
 */

//$params = array(
//    ':start_date' => date('Y-m-d 00:00:00', strtotime('-7 day')),
//    ':end_date' => date('Y-m-d 23:59:59', strtotime('-1 day')),
//    ':start_hour' => date('H', strtotime('-1 hour')),
//    ':end_hour' => date('H', strtotime('-2 hour'))
//);
//
//echo "<pre>";
//var_dump($params);

//$date = new \DateTime('-30 minute');
//$startDate = $date->format('H:i');
//
//$date = new \DateTime();
//$endDate = $date->format('H:i');
//
//echo "<pre>";
//var_dump($startDate, $endDate);

$dropPercentage = 90;
$severity = 'OK';

// > 80%
if ($dropPercentage >= 80) {
    $severity = 'CRITICAL';
}

// 50-80%
if ($dropPercentage >= 50 && $dropPercentage < 80) {
    $severity = 'MAJOR';
}

// 30-50%
if ($dropPercentage >= 30 && $dropPercentage < 50) {
    $severity = 'MINOR';
}

echo $severity;
<?php
/**
 * Created by PhpStorm.
 * User: evgeniy.edlenko
 * Date: 01.08.2016
 * Time: 11:06
 */
echo '<pre>';

$initConversionsStr = '28833	29481	29868	31542	28897	28242	27712	28599	28165	31675	32760	30616	30484	32491	30913	30935	32621	33945	30874	29549	28641	28566	16502	75	25';
$initConversions = explode(',', preg_replace('/\s+/', ',', $initConversionsStr));

$conversions = array();
foreach ($initConversions as $key => $val) {
    $conversions[] = array(
        'conversions_num' => $val,
        'day' => $key+7
    );
}

$start = 0;
$end = 7;

$alarms = array();
for ($i = 0; $i < count($conversions); $i++) {
    if (array_key_exists($end, $conversions)) {
        $thresholds = array_slice($conversions, $start, 7);
        $current = $conversions[$end]['conversions_num'];

        $avg = 0;
        $avgNum = 0;
        foreach ($thresholds as $val) {
            if (array_key_exists('conversions_num', $val)) {
                $avg += $val['conversions_num'];
                $avgNum++;
            }
        }
        $avg = $avg/$avgNum;

        $level = 'OK';
        if ($current < 0.2*$avg) {
            $level = 'CRITICAL';
        }
        if ($current < 0.5*$avg && $current > 0.2*$avg ) {
            $level = 'MAJOR';
        }
        if ($current < 0.7*$avg && $current > 0.5*$avg ) {
            $level = 'MINOR';
        }

        if ($level != 'OK') {
            $alarms[$conversions[$end]['day']] = array(
                'conversions_num' => $conversions[$end]['conversions_num'],
                'alarm_level' => $level
            );
        }

        $start++;
        $end++;
    }
}

var_dump($alarms);



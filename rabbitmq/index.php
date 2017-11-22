<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 13.10.2017
 * Time: 19:33
 */
set_time_limit(0);

$ip = '31.202.99.79';
$ua = 'Mozilla/5.0 (iPhone; CPU iPhone OS 10_2_1 like Mac OS X) AppleWebKit/602.4.6 (KHTML, like Gecko) Version/10.0 Mobile/14D27 Safari/602.1';

$url = "http://extads-staging.gameloft.org/kixer/impression.php?gcampaign_id=6210&gproduct_id=2208&gos=ios&tracking_id=kxr_0-8176962_1-8176963_2-8176997_3-6782449_4-6782452_c-10660.8176997_i-i.1.1504223998.666.10014176.1539_au-2_pc-US_pp-iOS_pd-iphone_ui-1495499468.7464.10013160.15129_d-_go-n240&sub_id=5285&ip_address=$ip&language=en&ip=$ip&lang=en&ua=".urlencode($ua);
//$url = 'http://extads.gameloft.com/futurestream/impression.php?gcampaign_id=408&gproduct_id=1897&gos=ios&idfa=0EDFA043-6D64-4D13-BCC0-48BB354CE957&country=${country}&ad_code=${ad_code}&extads_test=1';

$tsStart = microtime(true);

for ($i = 0; $i < 2500; $i++) {
    $tsLoopStart = microtime(true);

    // create a new cURL resource
    $ch = curl_init();

    // set URL and other appropriate options
    curl_setopt($ch, CURLOPT_URL, $url);

    $headers = array(
        'User-Agent: '.$ua,
    );
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // grab URL and pass it to the browser
    curl_exec($ch);

    // close cURL resource, and free up system resources
    curl_close($ch);

    $tsLoopEnd = microtime(true);

    echo 'Iteration #'.$i.': ' . ($tsLoopEnd - $tsLoopStart) . ' seconds';
    echo '<br>';
}

$tsEnd = microtime(true);

echo '<br>';
echo 'RabbitMQ total time elapsed: ' . ($tsEnd - $tsStart) . ' seconds';
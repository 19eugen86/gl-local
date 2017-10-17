<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 13.10.2017
 * Time: 19:33
 */
set_time_limit(0);

$url = 'http://extads-staging.gameloft.org/kixer/impression.php?gcampaign_id=6210&gproduct_id=2208&gos=ios&tracking_id=TRACKING_ID&sub_id=SUBID&ip_address=IP_ADDRESS&lang=LANGUAGE&ua=USER_AGENT';

$tsStart = microtime(true);

for ($i = 0; $i < 500; $i++) {
    $tsLoopStart = microtime(true);

    // create a new cURL resource
    $ch = curl_init();

    // set URL and other appropriate options
    curl_setopt($ch, CURLOPT_URL, $url);

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
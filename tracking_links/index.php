<?php
/**
 * Created by PhpStorm.
 * User: evgeniy.edlenko
 * Date: 07.10.2016
 * Time: 16:14
 */
set_time_limit(0);

$links = $advs = $advsCampaigns = $platformBuilds = $glProductBuilds = $queries = [];

$connection = mysqli_connect('localhost', 'root', '', 'ext_ads');

// Advertisers
$advList = scandir('../../EXTADS/trunk/public');
$advertisers = mysqli_fetch_all(mysqli_query($connection, 'SELECT * FROM advertisers WHERE 1'), MYSQLI_ASSOC);

foreach ($advList as $advDir) {
    if ($advDir == '.' || $advDir == '..') {
        continue;
    }

    foreach ($advertisers as $key => $advertiser) {
        if (strtolower($advertiser["name"]) == $advDir) {
            $advs[] = [
                'id'            => intval($advertiser["id"]),
                'name'          => $advertiser["name"],
                'impressions'   => intval($advertiser["impressions"]),
                'dir'           => $advDir,
            ];
        }
    }
}

// Product builds
$productBuilds = mysqli_fetch_all(mysqli_query($connection, 'SELECT * FROM product_builds WHERE 1'), MYSQLI_ASSOC);

foreach ($productBuilds as $build) {
    $platformBuilds[$build["build"]][] = $build["id"];
    $glProductBuilds[$build["id"]] = $build["gameloft_product_id"];
}

// Campaigns
$campaigns = mysqli_fetch_all(mysqli_query($connection, 'SELECT * FROM campaigns WHERE name LIKE "UC-%"'), MYSQLI_ASSOC);

foreach ($campaigns as $campaign) {
    foreach ($platformBuilds as $os => $builds) {
        if (in_array($campaign["product_build_id"], $builds)) {
            $campaign['os'] = $os;
            break;
        }
    }

    $campaign['gl_product_id'] = $glProductBuilds[$campaign["product_build_id"]];

    $advsCampaigns[$campaign['advertiser_id']][] = [
        'id'                => $campaign['id'],
        'name'              => $campaign['name'],
        'product_build_id'  => $campaign['product_build_id'],
        'os'                => $campaign['os'],
        'gl_product_id'     => $campaign['gl_product_id']
    ];
}

// Links
foreach ($advs as $adv) {
    if (!empty($advsCampaigns[$adv['id']]) && is_array($advsCampaigns[$adv['id']])) {
        $advCampaigns = $advsCampaigns[$adv['id']];
        foreach ($advCampaigns as $advCampaign) {
            $links[$advCampaign['id']] = [
                'click' => 'http://extads.gameloft.com/'.$adv['dir'].'/click.php?gcampaign_id='.$advCampaign['id'].'&gproduct_id='.$advCampaign['gl_product_id'].'&gos='.$advCampaign['os'].'',
                'imps' => ($adv['impressions']) ? 'http://extads.gameloft.com/'.$adv['dir'].'/impression.php?gcampaign_id='.$advCampaign['id'].'&gproduct_id='.$advCampaign['gl_product_id'].'&gos='.$advCampaign['os'].'' : '',
            ];
        }
    }
}

// SQL queries
foreach ($links as $campaignId => $link) {
    if (!empty($link["click"])) {
        $queries[] = 'INSERT INTO `campaign_urls`(`campaign_id`, `event`,`url`) VALUES ('.$campaignId.', "click", "'.$link["click"].'")';
    }

    if (!empty($link["imps"])) {
        $queries[] = 'INSERT INTO `campaign_urls`(`campaign_id`, `event`, `url`) VALUES ('.$campaignId.', "impression", "'.$link["imps"].'")';
    }
}

// Inserting
foreach ($queries as $sql) {
    mysqli_query($connection, $sql);
}

echo 'Rows inserted: '.count($queries);
echo '<br/>';
die('DONE');
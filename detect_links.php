<?php
$campaign_urls = array(
    array('campaign_id' => '3752','product_id' => '7'),
    array('campaign_id' => '3754','product_id' => '7'),
    array('campaign_id' => '3744','product_id' => '13'),
    array('campaign_id' => '3746','product_id' => '13'),
    array('campaign_id' => '3954','product_id' => '15'),
    array('campaign_id' => '3956','product_id' => '15'),
    array('campaign_id' => '3740','product_id' => '26'),
    array('campaign_id' => '3742','product_id' => '26'),
    array('campaign_id' => '3756','product_id' => '30'),
    array('campaign_id' => '3758','product_id' => '30'),
    array('campaign_id' => '3674','product_id' => '34'),
    array('campaign_id' => '3676','product_id' => '34'),
    array('campaign_id' => '3962','product_id' => '44'),
    array('campaign_id' => '3964','product_id' => '44'),
    array('campaign_id' => '3686','product_id' => '46'),
    array('campaign_id' => '3688','product_id' => '46'),
    array('campaign_id' => '3682','product_id' => '48'),
    array('campaign_id' => '3684','product_id' => '48'),
    array('campaign_id' => '3958','product_id' => '50'),
    array('campaign_id' => '3960','product_id' => '50'),
    array('campaign_id' => '3748','product_id' => '54'),
    array('campaign_id' => '3750','product_id' => '54'),
    array('campaign_id' => '3966','product_id' => '66'),
    array('campaign_id' => '3968','product_id' => '66'),
    array('campaign_id' => '3678','product_id' => '70'),
    array('campaign_id' => '3680','product_id' => '70'),
    array('campaign_id' => '4898','product_id' => '72'),
    array('campaign_id' => '4900','product_id' => '72')
);

$sql = '';
foreach ($campaign_urls as $urlData) {
    $url = 'http://extads.gameloft.com/youtube/detect/click.php?eproduct_id='.$urlData['product_id'];
    $sql .= "UPDATE campaign_urls SET url='".$url."' WHERE campaign_id=".$urlData['campaign_id'].";".'<br/>';
}

echo $sql;
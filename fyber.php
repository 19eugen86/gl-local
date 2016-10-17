<?php
/**
 * Created by PhpStorm.
 * User: evgeniy.edlenko
 * Date: 01.09.2016
 * Time: 10:24
 */

$gameIds = array(
    // Fyber - Dungeon Hunter 5 campaign - iOS
    874  => '2c11d0732f18f583835ed7a8d456a111',
    // Fyber - Dungeon Hunter 5 campaign - Android
    876  => '', // TODO:
    // Fyber - Dragon Mania Legends campaign - Germany - iOS
    954  => 'd4afc35bee24c246e1ae0df3fc166014',
    // Fyber - Siegefall campaign - Germany - iOS
    1278 => '8da855c551a02a392ca724a82f8e34df',
    // Fyber - Dragon Mania Legends campaign - Germany - Android
    1534 => 'fe05fb1f9465903746b374319d670812',
    // Fyber - Siegefall campaign - Germany - Android
    1536 => 'dfa63bc558dcf1b819d2ae3518122d9b',
    // Fyber - Dragon Mania Legends campaign - Russia - iOS
    1554 => 'd4afc35bee24c246e1ae0df3fc166014',
    // Fyber - Dungeon Hunter 5 campaign - Russia - iOS
    1560 => '68e58baddd5a8e93ffcb6d7cf8466109',
    // Fyber - March of Empires campaign - Russia - iOS
    1616 => 'aba56bd58aa8ec5dade17738e2b221d5',
    // Fyber - March of Empires campaign - Germany - iOS
    1722 => 'aba56bd58aa8ec5dade17738e2b221d5',
    // Fyber - March of Empires campaign - Germany - Android
    1724 => 'b4eb68f370cfc7a029556e31903258f9',
    // Fyber - March of Empires campaign - United Kingdom - iOS
    1758 => 'aba56bd58aa8ec5dade17738e2b221d5',
    // Fyber - Dragon Mania Legends campaign - United Kingdom - iOS
    1760 => 'd4afc35bee24c246e1ae0df3fc166014',
    // Fyber - Siegefall campaign - China - iOS
    1766 => 'd1f0e8468da7e3917f3f93c40a4427b1',
    // Fyber - Dungeon Hunter 5 campaign - China - iOS
    1768 => '9a0d522c316593c56a14157f1c51e937',
    // Fyber - Siegefall campaign - Russia - iOS
    1954 => '8da855c551a02a392ca724a82f8e34df',
    // Fyber - Order & Chaos 2 campaign - United Kingdom - iOS
    1902 => 'a671cef9b18adbca38650c460af7b1f3',
    // Fyber - Order & Chaos 2 campaign - Russia - iOS
    1986 => 'a671cef9b18adbca38650c460af7b1f3',
    // Fyber - Order & Chaos 2 campaign - Germany - iOS
    2166 => 'a671cef9b18adbca38650c460af7b1f3',
    // Fyber - Order & Chaos 2 campaign - Germany - Android
    2168 => 'be0e07fd3f1ff3b95892d43061a1a127',
    // Fyber - March of Empires campaign - United Kingdom - Android
    2312 => 'b4eb68f370cfc7a029556e31903258f9',
    // Fyber - Dragon Mania Legends campaign - France - iOS
    2354 => 'd4afc35bee24c246e1ae0df3fc166014',
    // Fyber - Dragon Mania Legends campaign - United States - Canada - iOS
    2366 => '', // TODO:
    // Fyber - Dragon Mania Legends campaign - United States - Canada - Android
    2368 => '', // TODO:
    // Fyber - March of Empires campaign - United States - Canada - iOS
    2370 => '87ab39a2d553ecf66e18b43126598bb2',
    // Fyber - March of Empires campaign - United States - Canada - Android
    2372 => '', // TODO:
    // Fyber - Dungeon Hunter 5 campaign - China - iOS
    2460 => 'b40ef8876e326d8f40b1d62dd4f7eaf6',
    // Fyber - Order & Chaos 2 campaign - China - iOS
    2470 => '7e354dff47d5dbc2e608bb4403ea56f3',
    // Fyber - Asphalt 8 Airborne campaign - United States - Canada - iOS
    2478 => '', // TODO:
    // Fyber - Dragon Mania Legends campaign - China - iOS
    2496 => 'cf5ae8d2fb3dae7243fbc104dd43ad6a',
    // Fyber - March of Empires campaign - China - iOS
    2552 => '3da6cba5fa02bcd74039f5644b19abfa',
    // Fyber - Asphalt 8 Airborne campaign - Germany - iOS
    2670 => 'ade798a28e584e99eb2e889e20d640af',
    // Fyber - Gods of Rome campaign - Russia - iOS
    2682 => '57de9ff0e9f599c7fad1aef476754d9e',
    // Fyber - Gods of Rome campaign - Germany - iOS
    2686 => '57de9ff0e9f599c7fad1aef476754d9e',
    // Fyber - Gods of Rome campaign - United Kingdom - iOS
    2788 => '57de9ff0e9f599c7fad1aef476754d9e',
    // Fyber - Dragon Mania Legends campaign - United Arab Emirates - iOS
    2822 => 'd4afc35bee24c246e1ae0df3fc166014',
    // Fyber - Dragon Mania Legends campaign - Turkey - iOS
    2824 => 'd4afc35bee24c246e1ae0df3fc166014',
    // Fyber - Dragon Mania Legends campaign - Spain - iOS
    2980 => '', // TODO:
    // Fyber - Dungeon Hunter 5 campaign - United States - Canada - iOS
    3038 => '', // TODO:
    // Fyber - Dungeon Hunter 5 campaign - United States - Canada - Android
    3040 => '', // TODO:
    // Fyber - Disney Kingdom campaign - United Kingdom - iOS
    3588 => 'b918c98806691538036d11d8413ba74f',
    // Fyber - Disney Kingdom campaign - United Kingdom - Android
    3590 => '77d0fa6b695cdd4ebaad078803940d5b',
    // Fyber - Disney Kingdom campaign - Germany - iOS
    3592 => 'b918c98806691538036d11d8413ba74f',
    // Fyber - Disney Kingdom campaign - Germany - Android
    3594 => '77d0fa6b695cdd4ebaad078803940d5b',
    // Fyber - Disney Kingdom campaign - Turkey - iOS
    3668 => 'b918c98806691538036d11d8413ba74f',
    // Fyber - Disney Kingdom campaign - Spain - iOS
    3670 => 'b918c98806691538036d11d8413ba74f',
    // Fyber - Disney Kingdom campaign - United Arab Emirates - iOS
    3698 => 'b918c98806691538036d11d8413ba74f',
    // Fyber - Disney Kingdom campaign - Saudi Arabia - iOS
    3700 => 'b918c98806691538036d11d8413ba74f',
    // Fyber - Disney Kingdom campaign - United States - Canada - iOS
    3788 => 'fb762ac24e22ba691f2f5886b1b2d913',
    // Fyber - Disney Kingdom campaign - United States - Canada - Android
    3790 => '', // TODO:
    // Fyber - Disney Kingdom campaign - China - iOS
    3906 => '', // TODO:
    // Fyber - Dragon Mania Legends campaign - Spain - Android
    4572 => 'fe05fb1f9465903746b374319d670812',
    // Fyber - Dragon Mania Legends campaign - United Arab Emirates - Android
    4574 => '', // TODO:
    // Fyber - Dragon Mania Legends campaign - Spain - iOS
    5128 => 'd4afc35bee24c246e1ae0df3fc166014',
    // Fyber - Dragon Mania Legends campaign - Turkey - iOS
    5130 => 'd4afc35bee24c246e1ae0df3fc166014',
    // Fyber - Dragon Mania Legends campaign - Spain - Android
    5132 => 'fe05fb1f9465903746b374319d670812',
    // Fyber - Dragon Mania Legends campaign - Turkey - Android
    5134 => 'fe05fb1f9465903746b374319d670812',
);

$toDeactivate = [];
foreach ($gameIds as $campaignId => $appId) {
    if (empty($appId)) {
        $toDeactivate[] = $campaignId;
    }
}

var_dump(implode(',', $toDeactivate));
die;

$campaigns = array(
    array('id' => '874','name' => 'Fyber - Dungeon Hunter 5 campaign - iOS'),
    array('id' => '876','name' => 'Fyber - Dungeon Hunter 5 campaign - Android'),
    array('id' => '954','name' => 'Fyber - Dragon Mania Legends campaign - Germany - iOS'),
    array('id' => '1278','name' => 'Fyber - Siegefall campaign - Germany - iOS'),
    array('id' => '1534','name' => 'Fyber - Dragon Mania Legends campaign - Germany - Android'),
    array('id' => '1536','name' => 'Fyber - Siegefall campaign - Germany - Android'),
    array('id' => '1554','name' => 'Fyber - Dragon Mania Legends campaign - Russia - iOS'),
    array('id' => '1560','name' => 'Fyber - Dungeon Hunter 5 campaign - Russia - iOS'),
    array('id' => '1616','name' => 'Fyber - March of Empires campaign - Russia - iOS'),
    array('id' => '1722','name' => 'Fyber - March of Empires campaign - Germany - iOS'),
    array('id' => '1724','name' => 'Fyber - March of Empires campaign - Germany - Android'),
    array('id' => '1758','name' => 'Fyber - March of Empires campaign - United Kingdom - iOS'),
    array('id' => '1760','name' => 'Fyber - Dragon Mania Legends campaign - United Kingdom - iOS'),
    array('id' => '1766','name' => 'Fyber - Siegefall campaign - China - iOS'),
    array('id' => '1768','name' => 'Fyber - Dungeon Hunter 5 campaign - China - iOS'),
    array('id' => '1902','name' => 'Fyber - Order & Chaos 2 campaign - United Kingdom - iOS'),
    array('id' => '1954','name' => 'Fyber - Siegefall campaign - Russia - iOS'),
    array('id' => '1986','name' => 'Fyber - Order & Chaos 2 campaign - Russia - iOS'),
    array('id' => '2166','name' => 'Fyber - Order & Chaos 2 campaign - Germany - iOS'),
    array('id' => '2168','name' => 'Fyber - Order & Chaos 2 campaign - Germany - Android'),
    array('id' => '2312','name' => 'Fyber - March of Empires campaign - United Kingdom - Android'),
    array('id' => '2354','name' => 'Fyber - Dragon Mania Legends campaign - France - iOS'),
    array('id' => '2366','name' => 'Fyber - Dragon Mania Legends campaign - United States - Canada - iOS'),
    array('id' => '2368','name' => 'Fyber - Dragon Mania Legends campaign - United States - Canada - Android'),
    array('id' => '2370','name' => 'Fyber - March of Empires campaign - United States - Canada - iOS'),
    array('id' => '2372','name' => 'Fyber - March of Empires campaign - United States - Canada - Android'),
    array('id' => '2460','name' => 'Fyber - Dungeon Hunter 5 campaign - China - iOS'),
    array('id' => '2470','name' => 'Fyber - Order & Chaos 2 campaign - China - iOS'),
    array('id' => '2478','name' => 'Fyber - Asphalt 8 Airborne campaign - United States - Canada - iOS'),
    array('id' => '2496','name' => 'Fyber - Dragon Mania Legends campaign - China - iOS'),
    array('id' => '2552','name' => 'Fyber - March of Empires campaign - China - iOS'),
    array('id' => '2670','name' => 'Fyber - Asphalt 8 Airborne campaign - Germany - iOS'),
    array('id' => '2682','name' => 'Fyber - Gods of Rome campaign - Russia - iOS'),
    array('id' => '2686','name' => 'Fyber - Gods of Rome campaign - Germany - iOS'),
    array('id' => '2788','name' => 'Fyber - Gods of Rome campaign - United Kingdom - iOS'),
    array('id' => '2822','name' => 'Fyber - Dragon Mania Legends campaign - United Arab Emirates - iOS'),
    array('id' => '2824','name' => 'Fyber - Dragon Mania Legends campaign - Turkey - iOS'),
    array('id' => '2980','name' => 'Fyber - Dragon Mania Legends campaign - Spain - iOS'),
    array('id' => '3038','name' => 'Fyber - Dungeon Hunter 5 campaign - United States - Canada - iOS'),
    array('id' => '3040','name' => 'Fyber - Dungeon Hunter 5 campaign - United States - Canada - Android'),
    array('id' => '3588','name' => 'Fyber - Disney Kingdom campaign - United Kingdom - iOS'),
    array('id' => '3590','name' => 'Fyber - Disney Kingdom campaign - United Kingdom - Android'),
    array('id' => '3592','name' => 'Fyber - Disney Kingdom campaign - Germany - iOS'),
    array('id' => '3594','name' => 'Fyber - Disney Kingdom campaign - Germany - Android'),
    array('id' => '3668','name' => 'Fyber - Disney Kingdom campaign - Turkey - iOS'),
    array('id' => '3670','name' => 'Fyber - Disney Kingdom campaign - Spain - iOS'),
    array('id' => '3698','name' => 'Fyber - Disney Kingdom campaign - United Arab Emirates - iOS'),
    array('id' => '3700','name' => 'Fyber - Disney Kingdom campaign - Saudi Arabia - iOS'),
    array('id' => '3788','name' => 'Fyber - Disney Kingdom campaign - United States - Canada - iOS'),
    array('id' => '3790','name' => 'Fyber - Disney Kingdom campaign - United States - Canada - Android'),
    array('id' => '3906','name' => 'Fyber - Disney Kingdom campaign - China - iOS'),
    array('id' => '4572','name' => 'Fyber - Dragon Mania Legends campaign - Spain - Android'),
    array('id' => '4574','name' => 'Fyber - Dragon Mania Legends campaign - United Arab Emirates - Android'),
    array('id' => '5128','name' => 'Fyber - Dragon Mania Legends campaign - Spain - iOS'),
    array('id' => '5130','name' => 'Fyber - Dragon Mania Legends campaign - Turkey - iOS'),
    array('id' => '5132','name' => 'Fyber - Dragon Mania Legends campaign - Spain - Android'),
    array('id' => '5134','name' => 'Fyber - Dragon Mania Legends campaign - Turkey - Android')
);

echo count($gameIds);
echo '<br>';
echo count($campaigns);
echo '<br>';
echo '<br>';
echo '<br>';

foreach ($campaigns as $key => $campaign) {
    if (array_key_exists($campaign['id'], $gameIds) && !empty($gameIds[$campaign['id']])) {
        unset($campaigns[$key]);
    }
}

$fp = fopen('Fyber_app_ids_missed.csv', 'w');
fputcsv($fp, ["Campaign ID", "Campaign Name"]);

foreach ($campaigns as $campaign) {
    fputcsv($fp, [$campaign['id'], $campaign['name']]);
}

fclose($fp);
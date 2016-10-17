<?php
/**
 * Created by PhpStorm.
 * User: evgeniy.edlenko
 * Date: 10.10.2016
 * Time: 15:57
 */

set_time_limit(0);

echo '<pre>';

$connection = mysqli_connect('localhost', 'root', '', 'ext_ads');

$tmp = mysqli_fetch_all(mysqli_query($connection, 'SELECT * FROM advertisers WHERE 1'), MYSQLI_ASSOC);
$advertisers = [];
foreach ($tmp as $adv) {
    $advertisers[$adv['id']] = $adv['name'];
}

$advMacrosList = scandir('adv_macros');

$macros = $diffs = [];
foreach ($advMacrosList as $advMacros) {
    if ($advMacros == '.' || $advMacros == '..') {
        continue;
    }

    $fileName = $advMacros;

    $info = explode(' - ', str_replace('.csv', '', $advMacros));
    $advId = $info[0];
    $advName = $info[1];

    if (ucfirst(strtolower(str_replace(' ', '', $advertisers[$advId]))) == ucfirst(strtolower(str_replace(' ', '', $advName)))) {
        if (($handle = fopen("adv_macros/$fileName", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                if ((empty($data[0]) && empty($data[1])) || ($data[0] == 'Name' && $data[1] == 'Description')) {
                    continue;
                }

                $event = "NULL";
                if (isset($data[2])) {
                    $event = '"'.strtolower($data[2]).'"';
                }

                $macros[$advId][] = [
                    'name'          => $data[0],
                    'event'         => $event,
                    'description'   => $data[1],
                ];
            }
            fclose($handle);
        }
    } else {
        $diffs[] = [
            'file' => $advName,
            'db' => $advertisers[$advId]
        ];
    }
}

if (!empty($diffs)) {
    var_dump($diffs);
    die;
}

$queries = $macrosToInsert = $advMacrosToInsert = [];
foreach ($macros as $advId => $advMacros) {
    foreach ($advMacros as $macro) {
        $macrosToInsert[] = $macro['name'];
        $advMacrosToInsert[$advId][] = $macro['name'];
        $queries[] = 'INSERT INTO `advertiser_macros`(`advertiser_id`, `name`, `event`, `description`, `status_id`) VALUES ('.$advId.',"'.$macro['name'].'",'.$macro['event'].',"'.$macro['description'].'",1)';
    }
}

// Inserting
foreach ($queries as $sql) {
    mysqli_query($connection, $sql);
}

echo 'Rows inserted: '.count($queries);
echo '<br/>';
die('DONE');

//$macrosInserted = mysqli_fetch_all(mysqli_query($connection, 'SELECT name FROM advertiser_macros WHERE 1'));
//$temp = [];
//foreach ($macrosInserted as $macro) {
//    $temp[] = $macro[0];
//}
//unset($macrosInserted);
//$macrosInserted = $temp;
//unset($temp);

// {ios_ifa}
//foreach ($macrosInserted as $key => $macro) {
//    if (in_array($macro, $macrosToInsert)) {
//        $index = array_search($macro, $macrosToInsert);
//        unset($macrosToInsert[$index]);
//    }
//}

//var_dump($macrosInserted);

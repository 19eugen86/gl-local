<?php
/**
 * Created by PhpStorm.
 * User: evgeniy.edlenko
 * Date: 15.08.2016
 * Time: 10:37
 */

if ($_POST['ids']) {
    $ids = explode("\n", $_POST['ids']);
    foreach ($ids as $key => $val) {
        $ids[$key] = trim($val);
    }

    $str = implode(',', $ids);
    echo substr($str, 0, strlen($str)-1);
}

?>

<a href="index.html">Back</a>
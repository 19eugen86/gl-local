<?php
/**
 * Created by PhpStorm.
 * User: evgeniy.edlenko
 * Date: 05.08.2016
 * Time: 17:16
 */

$str = "{\"gcampaign_id\":\"3672\",\"gproduct_id\":\"1845\",\"gos\":\"ios\",\"ifa\":\"37B52431-D1EA-482B-B822-1CECC8E1A093\",\"source_game_id\":\"131624550\",\"country_code\":\"it\",\"game_id\":\"107891\",\"sub_publisher\":\"1316245asdasda50\",\"country\":\"it\"}";
preg_match('/\"sub_publisher\"\:\"[0-9a-zA-Z]*\"/', $str, $matches);

echo '<pre>';
var_dump($matches);

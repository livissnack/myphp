<?php
date_default_timezone_set("Asia/Shanghai");
$id = empty($_GET['id']) ? "gdgj" : trim($_GET['id']);

$json = file_get_contents("https://php.17186.eu.org/gdtv/data.json");
$res = json_decode($json, true);

$searchIndex = array_search($id, array_column($res, 'nid'));
$searchData = $res[$searchIndex];
$playUrl = $searchData['url'];
header('location:'.$playUrl);
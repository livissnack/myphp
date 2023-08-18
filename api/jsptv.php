<?php
$id = isset($_GET['id'])?$_GET['id']:'jxws';
$n = [
    'jxws' => 'tv_jxtv1.m3u8',//江西卫视
    'jxds' => 'tv_jxtv2.m3u8',//江西都市
    'jxjs' => 'tv_jxtv3_hd.m3u8',//江西经视
    'jxys' => 'tv_jxtv4.m3u8',//江西影视
    'jxgg' => 'tv_jxtv5.m3u8',//江西公共
    'jxse' => 'tv_jxtv6.m3u8',//江西少儿
    'jxxw' => 'tv_jxtv7.m3u8',//江西新闻
    'jxyd' => 'tv_jxtv8.m3u8',//江西移动
    'fsgw' => 'tv_fsgw.m3u8',//江西风尚购物
    ];

$timestamp = intval(microtime(true)*1000);
$params = "type=android&t={$timestamp}&time={$timestamp}&token=md5('com.sobey.cloud.view.jiangxiandroidjxntv'.$timestamp)&device_id=48MXQ6GIMM8UYXKJ734O2NMWEBKBWH49LB4EE9R0&app_version=5.07.09&siteid=10001";
$authUrl = "https://app.jxgdw.com/api/media/auth?".$params;
$d = file_get_contents($authUrl);
$json = json_decode($d);
$live = "https://jsp-tv-live.jxtvcn.com.cn/live-jsp/{$n[$id]}";
$tail = http_build_query($json);
$m3u8 = trim("$live?$tail");

$ch = curl_init($m3u8);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$play = curl_exec($ch);       
curl_close($ch);
$burl = 'https://jsp-tv-live.jxtvcn.com.cn/live-jsp/';
header("Content-Type: application/vnd.apple.mpegURL");
print_r(preg_replace("/(.*?.ts)/i",$burl."$1",trim($play)));
?>
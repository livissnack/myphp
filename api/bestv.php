<?php
date_default_timezone_set("Asia/Shanghai");
$channel = empty($_GET['id']) ? "cctv16hd4k/15000000" : trim($_GET['id']);
$array = explode("/", $channel);
// $stream = "http://14.22.20.128/live-gitv-sx-yh.189smarthome.com/live/program/live/{$array[0]}/{$array[1]}/";
// $stream = "http://live-gitv-nm-yh.189smarthome.com/live/program/live/{$array[0]}/{$array[1]}/";
$stream = "1.62.64.192.8c1e0920c45da70a78884bf9138304e0.v.smtcdns.net/dongfang5g-pc-v51-live.bestvcdn.com.cn/live/program/live/{$array[0]}/{$array[1]}/";
// $stream = "http://115.56.76.71/liveplay-kk.rtxapp.com/live/program/live/{$array[0]}/{$array[1]}/";
$timestamp = substr(time(), 0, 9) - 7;
$current = "#EXTM3U" . "\r\n";
$current .= "#EXT-X-VERSION:3" . "\r\n";
$current .= "#EXT-X-TARGETDURATION:3" . "\r\n";
$current .= "#EXT-X-MEDIA-SEQUENCE:{$timestamp}" . "\r\n";
for ($i = 0; $i < 3; $i++) {
    $timematch = $timestamp . '0';
    $timefirst = date('YmdH', $timematch);
    $current .= "#EXTINF:3," . "\r\n";
    $current .= $stream . $timefirst . "/" . $timestamp . ".ts" . "\r\n";
    $timestamp = $timestamp + 1;
}
header("Content-Disposition: attachment; filename=playlist.m3u8");
echo $current;

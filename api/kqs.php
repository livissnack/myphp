<?php
    error_reporting(0);
    $ts = $_GET['ts'];
    if(!$ts){
        $id = isset($_GET['id'])?$_GET['id']:'720';//720,480
        $burl = "https://pkvc-hls5.cdnvideo.ru/Katusha/smil:Katusha.smil/";
        if($id == 720) $live = $burl."chunklist_b3128000_slru.m3u8";
        if($id == 480) $live = $burl."chunklist_b1878000_slru.m3u8";

        $con = stream_context_create(['http'=>['method'=>"GET",'header'=>["Referer: https://www.katyusha.tv",]]]);
        $cur = file_get_contents($live, null, $con);
        header('Content-Type: application/vnd.apple.mpegurl');
        print_r(preg_replace("/(.*?.ts)/i", "https://".$_SERVER ['HTTP_HOST'].$_SERVER['PHP_SELF']."?ts=$burl$1",$cur));
    } else {
        $data = get($ts);
        header('Content-Type: video/MP2T');
        echo $data;
    }
    function get($url){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_REFERER, 'https://www.katyusha.tv');
        $res = curl_exec($ch);
        curl_close($ch);
    }
?>
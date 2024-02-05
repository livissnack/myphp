<?php
    $id = $_GET['id'];
    $programs = [
        'zhonghe' => 0,     //广州综合
        'xinwen' => 1,      //广州新闻
        'jingsai' => 2,     //广州竞赛
        'yingshi' => 3,     //广州影视
        'fazhi' => 4,       //广州法治
        'shenghuo' => 5,    //广州南国都市
    ];
    $url = 'https://gzbn.gztv.com:7443/plus-cloud-manage-app/liveChannel/queryLiveChannelList?type=1';
    $headers = [    
        'Accept: application/json, text/plain, */*',
        'Accept-Encoding: gzip, deflate, br',
        'Accept-Language: zh-CN,zh;q=0.9,en;q=0.8',
        'Connection: keep-alive',
        'Host: gzbn.gztv.com:7443',
        'Origin: https://gzbn.gztv.com',
    ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $data = curl_exec($ch);
    curl_close($ch);
    $re = json_decode($data)->data;
    $program = $programs[$id];
    $playUrl = $program['httpUrl'] ?? '';
    header('location:'.$playUrl);
?>
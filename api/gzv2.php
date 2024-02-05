<?php
    $id = $_GET['id'] ?? 'gz2';
    $programs = [
        'gz2' => 'd43bd55d731949e2bc1ebad65de1ba4a',     //贵州2频道
    ];
    $key = $programs[$id];
    $url = "https://bxgz-api.v2gogo.com/live/liveStudio/getLiveStudioById/$key";
    $headers = [
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML,like Gecko) Chrome/99.0.4844.84 Safari/537.36 HBPC/12.1.3.3',
        'Host: bxgz-api.v2gogo.com',
        'Origin: bxgz-api.v2gogo.com',
        'Referer: bxgz-api.v2gogo.com',
    ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $data = curl_exec($ch);
    curl_close($ch);
    $result = json_decode($data)->data->liveStudioLineList;
    $playUrl = $result[0]->playHls ?? '';
    header('location:'.$playUrl);
?>
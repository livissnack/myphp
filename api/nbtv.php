<?php
    $id = $_GET['id'] ?? 'nbtv1';
    if (!in_array($id, ['nbtv1', 'nbtv2', 'nbtv3', 'nbtv4'])) {
        echo '未找到该频道';
        die();
    }
    $url = 'http://em.chinamcloud.com/player/encryptUrl';
    $params = [
        "url" => "http://liveplay.nbtv.cn/live/" . $id . "_md" . ".m3u8",
        "playType" => "live",
        "type" => "cdn",
        "cdnEncrypt" => "d058c6c09b8cec3e4c8391557ac977714a35da41c4cfd40c75d6b4fdb37750b40af99e78071b72269b1614077c887c9431ce02c56739ed3a878ac3445c6352497f6ab0dec816df39192412e95509d2df4808e102380dd64ae67105a7266ec8ed580998e4e34dd62002039f872e1bda820ec4d9eaf8a11d658155d26c74125323c71e9743653e192327f3b6944ef0d219250f53718c6c38512eb9f142afe25f0838dff439d47fa695cb0eaf6473e4b4b6be62bfcbd240bc8d77d250809c1796c3cc54bdc2b70740c58cb3e39cf0ca4472d7c04c433a1daa8c6853e887aa36046c5bb959a58c0df05b81b399fad91372fea0aae029b73101c15d4bf220bbf975f7cb0a0c7ba42817d4aeebc8b8b6a3f2e83760724205a1f0eeab3dc2501d520baeab6463a0189135c00c96896e000fc28c",
        "cdnIndex" => 0
    ];
    $headers = [
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML,like Gecko) Chrome/99.0.4844.84 Safari/537.36 HBPC/12.1.3.3',
        'Host: em.chinamcloud.com',
        'Content-Type: application/json',
        'Referer: em.chinamcloud.com',
    ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch,CURLOPT_POST, 1);
    curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($params));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $data = curl_exec($ch);
    curl_close($ch);
    $playUrl = json_decode($data)->url ?? '';
    header('location:'.$playUrl);
?>
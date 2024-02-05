<?php
header('Content-Type:text/json;charset=UTF-8');
$id = isset($_GET['id']) ? $_GET['id'] : 'cctv1';
$n = [
    //央视
    'cctv4k' => 2000266303, //cctv-4k
    'cctv8k' => 2020603401, //cctv-8k
    'cctv1' => 2000210103, //cctv1,1080
    'cctv1-b' => 2000210102, //cctv1,720
    'cctv1-c' => 2000210101, //cctv1,540,
    'cctv2' => 2000203603, //cctv2,1080
    'cctv2-b' => 2000203602, //cctv2,720
    'cctv2-c' => 2000203601, //cctv2,540,
    'cctv3' => 2000203803, //cctv3(vip),1080
    'cctv3-b' => 2000203802, //cctv3(vip),720
    'cctv3-c' => 2000203801, //cctv3(vip),540,
    'cctv4' => 2000204803, //cctv4,1080
    'cctv4-b' => 2000204802, //cctv4,720
    'cctv4-c' => 2000204801, //cctv4,540,
    'cctv5' => 2000205103, //cctv5,1080
    'cctv5-b' => 2000205102, //cctv5,720
    'cctv5-c' => 2000205101, //cctv5,540,
    'cctv5p' => 2000204503, //cctv5+,1080
    'cctv5p-b' => 2000204502, //cctv5+,720
    'cctv5p-c' => 2000204503, //cctv5+,540,
    'cctv6' => 2000203303, //cctv6(vip),540
    'cctv6-b' => 2000203302, //cctv6(vip),540
    'cctv6-c' => 2000203301, //cctv6(vip),540
    'cctv7' => 2000510003, //cctv7,1080
    'cctv7-b' => 2000510002, //cctv7,720
    'cctv7-c' => 2000510001, //cctv7,540,
    'cctv8' => 2000203903, //cctv8(vip),1080
    'cctv8-b' => 2000203902, //cctv8(vip),720
    'cctv8-c' => 2000203901, //cctv8(vip),540
    'cctv9' => 2000499403, //cctv9,1080
    'cctv9-b' => 2000499402, //cctv9,720
    'cctv9-c' => 2000499401, //cctv9,540
    'cctv10' => 2000203503, //CCTV10,1080
    'cctv10-b' => 2000203502, //CCTV10,720
    'cctv10-c' => 2000203501, //CCTV10,540
    'cctv11' => 2000204103, //CCTV11,1080
    'cctv11-b' => 2000204102, //CCTV11,720
    'cctv11-c' => 2000204101, //CCTV11,540
    'cctv12' => 2000202603, //CCTV12,1080
    'cctv12-b' => 2000202602, //CCTV12,720
    'cctv12-c' => 2000202601, //CCTV12,540
    'cctv13' => 2000204603, //CCTV13,1080
    'cctv13-b' => 2000204602, //CCTV13,720
    'cctv13-c' => 2000204601, //CCTV13,540
    'cctv14' => 2000204403, //CCTV14,1080
    'cctv14-b' => 2000204402, //CCTV14,720
    'cctv14-c' => 2000204401, //CCTV14,540
    'cctv15' => 2000205003, //CCTV15,1080
    'cctv15-b' => 2000205002, //CCTV15,720
    'cctv15-c' => 2000205001, //CCTV15,540
    'cctv16' => 2012375003, //CCTV16,1080
    'cctv16-b' => 2012375002, //CCTV16,720
    'cctv16-c' => 2012375001, //CCTV16,540
    'cctv16-4k' => 2012492303, //CCTV16-4k(vip),1080
    'cctv16-4k-b' => 2012492302, //CCTV16-4k(vip),720
    'cctv16-4k-c' => 2012492301, //CCTV16-4k(vip),540
    'cctv17' => 2000204203, //CCTV17,1080
    'cctv17-b' => 2000204202, //CCTV17,720
    'cctv17-c' => 2000204201, //CCTV17,540
    //央视数字
    'bqkj' => 2012513403, //CCTV兵器科技(vip),1080
    'bqkj-b' => 2012513402, //CCTV兵器科技(vip),720
    'bqkj-c' => 2012513401, //CCTV兵器科技(vip),540
    'dyjc' => 2012514403, //CCTV第一剧场(vip),1080
    'dyjc-b' => 2012514402, //CCTV第一剧场(vip),720
    'dyjc-c' => 2012514401, //CCTV第一剧场(vip),540
    'hjjc' => 2012511203, //CCTV怀旧剧场(vip),1080
    'hjjc-b' => 2012511202, //CCTV怀旧剧场(vip),720
    'hjjc-c' => 2012511201, //CCTV怀旧剧场(vip),540
    'fyjc' => 2012513603, //CCTV风云剧场(vip),1080
    'fyjc-b' => 2012513602, //CCTV风云剧场(vip),720
    'fyjc-c' => 2012513601, //CCTV风云剧场(vip),540
    'fyyy' => 2012514103, //CCTV风云音乐(vip),1080
    'fyyy-b' => 2012514102, //CCTV风云音乐(vip),720
    'fyyy-c' => 2012514101, //CCTV风云音乐(vip),540
    'fyzq' => 2012514203, //CCTV风云足球(vip),1080
    'fyzq-b' => 2012514202, //CCTV风云足球(vip),720
    'fyzq-c' => 2012514201, //CCTV风云足球(vip),540
    'dszn' => 2012514003, //CCTV电视指南(vip),1080
    'dszn-b' => 2012514002, //CCTV电视指南(vip),720
    'dszn-c' => 2012514001, //CCTV电视指南(vip),540
    'nxss' => 2012513903, //CCTV女性时尚(vip),1080
    'nxss-b' => 2012513902, //CCTV女性时尚(vip),720
    'nxss-c' => 2012513901, //CCTV女性时尚(vip),540
    'whjp' => 2012513803, //CCTV央视文化精品(vip),1080
    'whjp-b' => 2012513802, //CCTV央视文化精品(vip),720
    'whjp-c' => 2012513801, //CCTV央视文化精品(vip),540
    'sjdl' => 2012513303, //CCTV世界地理(vip),1080
    'sjdl-b' => 2012513302, //CCTV世界地理(vip),720
    'sjdl-c' => 2012513301, //CCTV世界地理(vip),540
    'gefwq' => 2012512503, //CCTV高尔夫网球(vip),1080
    'gefwq-b' => 2012512502, //CCTV高尔夫网球(vip),720
    'gefwq-c' => 2012512501, //CCTV高尔夫网球(vip),540
    'ystq' => 2012513703, //CCTV央视台球(vip),1080
    'ystq-b' => 2012513702, //CCTV央视台球(vip),720
    'ystq-c' => 2012513701, //CCTV央视台球(vip),540
    'wsjk' => 2012513503, //CCTV卫生健康(vip),1080
    'wsjk-b' => 2012513502, //CCTV卫生健康(vip),720
    'wsjk-c' => 2012513501, //CCTV卫生健康(vip),540
    //央视国际
    'cgtn' => 2001656803, //CGTN,1080
    'cgtn-b' => 2001656802, //CGTN,720
    'cgtn-c' => 2001656801, //CGTN,540
    'cgtnjl' => 2010155403, //CGTN纪录,1080
    'cgtnjl-b' => 2010155402, //CGTN纪录,720
    'cgtnjl-c' => 2010155401, //CGTN纪录,540
    'cgtne' => 2010152503, //CGTN西语,1080
    'cgtne-b' => 2010152502, //CGTN西语,720
    'cgtne-c' => 2010152501, //CGTN西语,540
    'cgtnf' => 2010153503, //CGTN法语,1080
    'cgtnf-b' => 2010153502, //CGTN法语,720
    'cgtnf-c' => 2010153501, //CGTN法语,540
    'cgtna' => 2010155203, //CGTN阿语,1080
    'cgtna-b' => 2010155202, //CGTN阿语,720
    'cgtna-c' => 2010155201, //CGTN阿语,540
    'cgtnr' => 2010152603, //CGTN俄语,1080
    'cgtnr-b' => 2010152602, //CGTN俄语,720
    'cgtnr-c' => 2010152601, //CGTN俄语,540
    //卫视
    'bjws' => 2000272103, //北京卫视,1080
    'bjws-b' => 2000272102, //北京卫视,720
    'bjws-c' => 2000272101, //北京卫视,540
    'dfws' => 2000292403, //东方卫视,1080
    'dfws-b' => 2000292402, //东方卫视,720
    'dfws-c' => 2000292401, //东方卫视,540
    'tjws' => 2019927003, //天津卫视,1080
    'tjws-b' => 2019927002, //天津卫视,720
    'tjws-c' => 2019927001, //天津卫视,540
    'cqws' => 2000297803, //重庆卫视,1080
    'cqws-b' => 2000297802, //重庆卫视,720
    'cqws-c' => 2000297801, //重庆卫视,540
    'hljws' => 2000293903, //黑龙江卫视,1080
    'hljws-b' => 2000293902, //黑龙江卫视,720
    'hljws-c' => 2000293901, //黑龙江卫视,540
    'lnws' => 2000281303, //辽宁卫视,1080
    'lnws-b' => 2000281302, //辽宁卫视,720
    'lnws-c' => 2000281301, //辽宁卫视,540
    'hbws' => 2000293403, //河北卫视,1080
    'hbws-b' => 2000293402, //河北卫视,720
    'hbws-c' => 2000293401, //河北卫视,540
    'sdws' => 2000294803, //山东卫视,1080
    'sdws-b' => 2000294802, //山东卫视,720
    'sdws-c' => 2000294801, //山东卫视,540
    'ahws' => 2000298003, //安徽卫视,1080
    'ahws-b' => 2000298002, //安徽卫视,720
    'ahws-c' => 2000298001, //安徽卫视,540
    'hnws' => 2000296103, //河南卫视,1080
    'hnws-b' => 2000296102, //河南卫视,720
    'hnws-c' => 2000296101, //河南卫视,540
    'hubws' => 2000294503, //湖北卫视,1080
    'hubws-b' => 2000294502, //湖北卫视,720
    'hubws-c' => 2000294501, //湖北卫视,540
    'hunws' => 2000296203, //湖南卫视,1080
    'hunws-b' => 2000296202, //湖南卫视,720
    'hunws-c' => 2000296201, //湖南卫视,540
    'jxws' => 2000294103, //江西卫视,1080
    'jxws-b' => 2000294102, //江西卫视,720
    'jxws-c' => 2000294101, //江西卫视,540
    'jsws' => 2000295603, //江苏卫视,1080
    'jsws-b' => 2000295602, //江苏卫视,720
    'jsws-c' => 2000295601, //江苏卫视,540
    'zjws' => 2000295503, //浙江卫视,1080
    'zjws-b' => 2000295502, //浙江卫视,720
    'zjws-c' => 2000295501, //浙江卫视,540
    'dnws' => 2000292503, //东南卫视,1080
    'dnws-b' => 2000292502, //东南卫视,720
    'dnws-c' => 2000292501, //东南卫视,540
    'gdws' => 2000292703, //广东卫视,1080
    'gdws-b' => 2000292702, //广东卫视,720
    'gdws-c' => 2000292701, //广东卫视,540
    'szws' => 2000292203, //深圳卫视,1080
    'szws-b' => 2000292202, //深圳卫视,720
    'szws-c' => 2000292201, //深圳卫视,540
    'gxws' => 2000294203, //广西卫视,1080
    'gxws-b' => 2000294202, //广西卫视,720
    'gxws-c' => 2000294201, //广西卫视,540
    'gzws' => 2000293303, //贵州卫视,1080
    'gzws-b' => 2000293302, //贵州卫视,720
    'gzws-c' => 2000293301, //贵州卫视,540
    'scws' => 2000295003, //四川卫视,1080
    'scws-b' => 2000295002, //四川卫视,720
    'scws-c' => 2000295001, //四川卫视,540
    'xjws' => 2019927403, //新疆卫视,1080
    'xjws-b' => 2019927402, //新疆卫视,720
    'xjws-c' => 2019927401, //新疆卫视,540
    'hinws' => 2000291503, //海南卫视,1080
    'hinws-b' => 2000291502, //海南卫视,720
    'hinws-c' => 2000291501, //海南卫视,540
];
$cnlid = $n[$id];
// $guid = rand_str(6);
$guid = generateGuid();
$salt = '0f$IVHi9Qno?G';
$platform = "5910204";
$key = hex2bin("48e5918a74ae21c972b90cce8af6c8be");
$iv = hex2bin("9a7e7d23610266b1d9fbf98581384d92");
$ts = time();
$el = "|{$cnlid}|{$ts}|mg3c3b04ba|V1.0.0|{$guid}|{$platform}|[url]https://www.yangshipin.c[/url]|mozilla/5.0 (windows nt ||Mozilla|Netscape|Win32|";

$len = strlen($el);
$xl = 0;
for ($i = 0; $i < $len; $i++) {
    $xl = ($xl << 5) - $xl + ord($el[$i]);
    $xl &= $xl & 0xFFFFFFFF;
}

$xl = ($xl > 2147483648) ? $xl - 4294967296 : $xl;

$el = '|' . $xl . $el;
$ckey = "--01" . strtoupper(bin2hex(openssl_encrypt($el, "AES-128-CBC", $key, 1, $iv)));

$params = [
    "adjust" => 1,
    "appVer" => "V1.0.0",
    "app_version" => "V1.0.0",
    "cKey" => $ckey,
    "channel" => "ysp_tx",
    "cmd" => "2",
    "cnlid" => "{$cnlid}",
    "defn" => "fhd",
    "devid" => "devid",
    "dtype" => "1",
    "encryptVer" => "8.1",
    "guid" => $guid,
    "otype" => "ojson",
    "platform" => $platform,
    "rand_str" => "{$ts}",
    "sphttps" => "1",
    "stream" => "2"
];
if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $onlineip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $onlineip = $_SERVER['REMOTE_ADDR'];
}
$sign = md5(http_build_query($params) . $salt);
$params["signature"] = $sign;

$bstrURL = "https://player-api.yangshipin.cn/v1/player/get_live_info";
$headers = [
    "Content-Type: application/json",
    "Referer:https://www.yangshipin.cn/",
    "Cookie: guid=$guid; versionName=99.99.99; versionCode=999999; platformVersion=Chrome; deviceModel=121; vplatform=109",
    "Yspappid: 519748109",
    "user-agent:" . $_SERVER['HTTP_USER_AGENT'],
    'x-forwarded-for:' . $onlineip,
    'client-ip:' . $onlineip,
];
$json = json_decode(get_data($bstrURL, $headers, $params));
$live = $json->data->playurl;
$host = parse_url($live)['host'];
$cdns = array(
    // 'hlslive-hs-cdn.ysp.cctv.cn',
    // 'hlslive-ty-cdn.ysp.cctv.cn',
    // 'hlsliveali-cdn.ysp.cctv.cn',
    // 'hlslive-tx-cdn.ysp.cctv.cn',
    'bkhlsliveali-cdn.ysp.cctv.cn',
);
$cdn = $cdns[array_rand($cdns, 1)];
$m3u8 = preg_replace("/{$host}/", $cdn, $live);
//$m3u8 = trim(preg_replace("/https/","http",$m3u8));
$burl = dirname($m3u8) . "/";

header('Content-Type: application/vnd.apple.mpegurl');
print_r(preg_replace("/(.*?.ts)/i", $burl . "$1", get_data($m3u8, $headers)));
exit;
function get_data($url, $header, $post = null)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 0); // 设置超时时间
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    if (!empty($post)) {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));
    }
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
function rand_str($k)
{
    $e = "ABCDEFGHIJKlMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $i = 0;
    $str = "";
    while ($i < $k) {
        $str .= $e[mt_rand(0, 61)];
        $i++;
    }
    return $str;
}

function generateGuid()
{
    $timestamp = base_convert((string) round(microtime(true) * 1000), 10, 36);
    $randomPart = substr(base_convert((string) mt_rand(), 10, 36), 0, 11);
    return $timestamp . "_" . str_repeat('0', 11 - strlen($randomPart)) . $randomPart;
}

<?php
//header('Content-Type: text/html;charset=UTF-8');
$vid = $_GET['vid']?$_GET['vid']:'';
$bstrURL = "https://u.y.qq.com/cgi-bin/musicu.fcg";
if($vid=='list'||$vid==null||$vid=='top'){
  $order=array(//排序方式
    'hot'=>0,   //最热
    'new'=>1,  //最新
    );
  $area=[16,17,18,19,20];               //区域  16 内地，17 祖国同胞，18 欧美，19 韩，20 日本
  $version=[8,9,10,11,12,13,14];       //类型  8 mv，9 现场，10 翻唱，11 舞蹈，12 影视，13 综艺，14 儿歌
  $oid = $_GET['oid']?$_GET['oid']:''; //对应数组$order定义的'hot'和'new'
  $aid = $_GET['aid']?$_GET['aid']:''; //对应数组$area的元素值
  $sid = $_GET['sid']?$_GET['sid']:''; //对应数组$version的元素值  
  if(!$oid||empty($order[$oid])){
    $oid=array_keys($order)[array_rand(array_keys($order),1)];  
  }
  if(!$aid||!in_array($aid,$area)){
    $aid=$area[array_rand($area,1)];
    if($vid!='list'){
        $aid=15;
    }
  }
  if(!$sid||!in_array($sid,$version)){
    $sid=$version[array_rand($version,1)];
    if($vid!='list'){
        $sid=7;
    }
  }
  $size=200;    //默认设定 单次最多获取200个ID,可根据服务器解析速度自行调节修改。
  $key=999;  
  if($aid==17&&$sid==11){$key=358;}
  if($aid==17&&$sid==14){$key=54;}
  if($aid==18&&$sid==11){$key=578;}
  if($aid==19&&$sid==14){$key=148;}
  if($aid==20&&$sid==14){$key=20;}
  $num=mt_rand(0,floor($key/$size));
  $postData = '{"comm":{"cv":4747474,"ct":24,"format":"json","inCharset":"utf-8","outCharset":"utf-8","notice":0,"platform":"yqq.json","needNewCode":1,"uin":0,"g_tk_new_20200303":5381,"g_tk":5381},"req_1":{"module":"MvService.MvInfoProServer","method":"GetAllocMvInfo","param":{"order":'.$order[$oid].',"start":'.($num*$size).',"size":'.$size.',"version_id":'.$sid.',"area_id":'.$aid.'}}}';  
  $data=get_data($bstrURL,$postData);
  if($data){
    foreach (json_decode($data)->req_1->data->list as $sub){
      $name=$sub->singers[0]->name;
      $title=$sub->title;
      $id=$ids[]=$sub->vid;
      if($vid=='list'){
        echo $name.'<'.$title.'>,http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?vid='.$id.'&oid='.$oid.'&aid='.$aid.'&sid='.$sid.'</a><br>';
      }
    }  
  }
  if($vid!='list'){
    $vid=$ids[array_rand($ids,1)];  
  }
}
if($vid!='list'&&$vid!='top'){
  $type = $_GET['type']?$_GET['type']:'';
  switch ($type){
    case 'mp4':
    $stream='mp4';
    break;
    case 'hls':
    $stream='hls';
    break;
    default:
    $stream=array('mp4','hls')[mt_rand(0,1)];
    break;   
  }
  $postData = '{"comm":{"ct":6,"cv":0,"g_tk":5381,"uin":0,"format":"json","platform":"yqq"},"mvInfo":{"module":"video.VideoDataServer","method":"get_video_info_batch","param":{"vidlist":["'.$vid.'"],"required":["vid","type","sid","cover_pic","duration","singers","new_switch_str","video_pay","hint","code","msg","name","desc","playcnt","pubdate","isfav","fileid","filesize","pay","pay_info","uploader_headurl","uploader_nick","uploader_uin","uploader_encuin","play_forbid_reason"]}},"mvUrl":{"module":"music.stream.MvUrlProxy","method":"GetMvUrls","param":{"vids":["'.$vid.'"],"request_type":10003,"addrtype":3,"format":264}}}';
  $data=get_data($bstrURL,$postData);
  $json = json_decode($data);
  $pams=$json->mvUrl->data->$vid->$stream;
  $playurl = $pams[count($pams)-1]->freeflow_url[1];//貌似有四条线路，默认第二条freeflow_url[1]
  //echo $playurl;
  header('location:'.$playurl);
}

function get_data($bstrURL,$post=null){
$header=array(
        'referer: https://y.qq.com/',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36',
        );
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $bstrURL); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
if(!empty($post)){
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, ($post));
  }
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
$data = curl_exec($ch);
curl_close($ch);
return $data;
}
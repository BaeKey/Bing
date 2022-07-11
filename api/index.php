<?php
$url = "https://cn.bing.com/HPImageArchive.aspx?format=js&idx=0&n=6&mkt=zh-CN";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$headers = array(
   "Accept: application/json",
   "Access-Control-Allow-Origin:*",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$resp = curl_exec($curl);
curl_close($curl);
$array = json_decode($resp);
$imgurl = 'https://cn.bing.com'.$array->{"images"}[rand(0,5)]->{"urlbase"}.'_1920x1080.jpg';
if($imgurl){		
    //允许跨域
    header("Access-Control-Allow-Origin: *");
    // 302跳转至目标图像
    header("Location: {$imgurl}");
    exit(); 
} else {     
     exit('error'); 
}
?>

<?php
/*
Plugin Name:百度收录量
Version:1.0
Description:根据域名返回百度收录量
*/
$domain = (isset($_GET['domain'])) ? $_GET['domain'] : $_POST['domain'];

$count = baiduSL($domain);

if (!isset($count)) showjson(array('code' => 200502, 'msg' => '查询失败，请重试！'));
if (!$count) $count = 0;
$result = array(
    'code' => 1,
    'domain' => $domain,
    'data' => $count
);
print_r(json_encode($result));

unset($value, $url_arr, $domain, $row, $hostrow, $site, $resulturl, $result, $ch);
function baiduSL($domain)
{
    $baidu = 'https://www.baidu.com/s?ie=utf-8&tn=baidu&wd=site%3A' . $domain;
    $bdsite = BD_curl($baidu);
    $bdsite = str_replace(array("\r\n", "\r", "\n", '    '), '', $bdsite);
    preg_match('/该网站共有(.*?)个网页被百度收录/i', $bdsite, $count);
    if (!$count) preg_match('/找到相关结果数约(.*?)个/i', $bdsite, $count);
    //ereg('该网站共有(.*)个网页被百度收录', $bdsite,$count);
    //print_r($count);
    //$count=str_replace('该网站共有','',$count);
    //$count=str_replace('个网页被百度收录','',$count);
    $count = str_replace(array("\r\n", "\r", "\n", ',', ' '), '', $count);
    $baiduSL = strip_tags($count[1]);
    unset($count);
    return $baiduSL;
}

function BD_curl($url, $post = 0, $referer = 0, $cookie = 0, $header = 0, $ua = 0, $nobaody = 0)
{
    $ch = curl_init();
    $ip = rand(0, 255) . '.' . rand(0, 255) . '.' . rand(0, 255) . '.' . rand(0, 255);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    //$httpheader[] = "Host: www.baidu.com";
    //$httpheader[] = "Connection: keep-alive";
    //$httpheader[] = "Upgrade-Insecure-Requests: 1";
    //$httpheader[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36";
    $httpheader[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8";
    $httpheader[] = "Accept-Encoding: gzip, deflate, sdch, br";
    $httpheader[] = "Accept-Language: zh-CN,zh;q=0.8";
    //$httpheader[] = 'X-FORWARDED-FOR:'.$ip;
    //$httpheader[] = 'CLIENT-IP:'.$ip;
    curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
    if ($post) {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    }
    if ($header) {
        curl_setopt($ch, CURLOPT_HEADER, true);
    }
    if ($cookie) {
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    }
    if ($referer) {
        if ($referer == 1) {
            curl_setopt($ch, CURLOPT_REFERER, 'https://music.163.com/outchain/player?type=0&id=2250011882&auto=1');
        } else {
            curl_setopt($ch, CURLOPT_REFERER, $referer);
        }
    }
    if ($ua) {
        curl_setopt($ch, CURLOPT_USERAGENT, $ua);
    } else {
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143 Safari/601.1");
    }
    if ($nobaody) {
        curl_setopt($ch, CURLOPT_NOBODY, 1);
    }
    curl_setopt($ch, CURLOPT_TIMEOUT, 3);
    curl_setopt($ch, CURLOPT_ENCODING, "gzip");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $ret = curl_exec($ch);
    //$Headers = curl_getinfo($ch);
    curl_close($ch);
    return $ret;
}

function showjson($arr)
{
    header("Content-Type: application/json; charset=utf-8");
    exit(json_encode($arr, 320));
}

?>
<?php
/*
 * @Author: zhong
 * @Date: 2021-10-26 10:12:07
 * @LastEditors: zhong
 * @LastEditTime: 2022-02-16 13:24:53
 * @FilePath: \hot.php
 */

error_reporting(0);
header("Access-Control-Allow-Origin:*");
header("Content-type:application/json; charset=utf-8");
date_default_timezone_set("Asia/Shanghai");

class VvhanApi
{
    // 知乎热榜  热度
    public function zhihuHot()
    {
        $_resHtml = str_replace(["\n", "\r", " "], '', $this->antxCurl('https://www.zhihu.com/hot', ['User-Agent:Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1'], 'https://www.zhihu.com'));
        preg_match('/<scriptid=\"js-initialData\"type=\"text\/json\">(.*?)<\/script>/', $_resHtml, $_resHtmlArr);
        $jsonRes = json_decode($_resHtmlArr[1], true);
        $tempArr = [];
        foreach ($jsonRes['initialState']['topstory']['hotList'] as $k => $v) {
            $tempArr[] = [
                'index' => $k + 1,
                'title' => $v['target']['titleArea']['text'],
                'desc' => $v['target']['excerptArea']['text'],
                'pic' => $v['target']['imageArea']['url'],
                'hot' => $v['target']['metricsArea']['text'],
                'url' => $v['target']['link']['url'],
                'mobilUrl' => $v['target']['link']['url']
            ];
        }
        return [
            'success' => true,
            'title' => '知乎热榜',
            'subtitle' => '热度',
            'update_time' => date('Y-m-d h:i:s', time()),
            'data' => $tempArr
        ];
    }

    // 微博 热搜榜
    public function wbresou()
    {
        $_md5 = md5(time());
        $cookie = "Cookie: {$_md5}:FG=1";
        $jsonRes = json_decode($this->antxCurl('https://weibo.com/ajax/side/hotSearch', null, $cookie, "https://s.weibo.com"), true);
        $tempArr = [];
        foreach ($jsonRes['data']['realtime'] as $k => $v) {
            array_push($tempArr, [
                'index' => $k + 1,
                'title' => $v['note'],
                'hot' => $v['num'] . '万',
                'url' => "https://s.weibo.com/weibo?q={$v['word_scheme']}&t=31&band_rank=12&Refer=top",
                'mobilUrl' => "https://s.weibo.com/weibo?q={$v['word_scheme']}&t=31&band_rank=12&Refer=top"
            ]);
        }
        return [
            'success' => true,
            'title' => '微博',
            'subtitle' => '热搜榜',
            'update_time' => date('Y-m-d h:i:s', time()),
            'data' => $tempArr
        ];
    }

    // 百度热点 指数
    public function baiduredian()
    {
        $_resHtml = str_replace(["\n", "\r", " "], '', $this->antxCurl('https://top.baidu.com/board?tab=realtime', null));
        preg_match('/<!--s-data:(.*?)-->/', $_resHtml, $_resHtmlArr);
        return json_decode($_resHtmlArr[1], true);
        $tempArr = [];
        foreach ($jsonRes['data']['cards'] as $v) {
            foreach ($v['content'] as $k => $_v) {
                $tempArr[] = [
                    'index' => $k + 1,
                    'title' => $_v['word'],
                    'desc' => $_v['desc'],
                    'pic' => $_v['img'],
                    'url' => $_v['url'],
                    'hot' => $_v['hotScore'] . 'W个内容',
                    'mobilUrl' => $_v['appUrl']
                ];
            }
        }
        return [
            'success' => true,
            'title' => '百度热点',
            'subtitle' => '指数',
            'update_time' => date('Y-m-d h:i:s', time()),
            'data' => $tempArr
        ];
    }

    private function antxCurl($url, $header = [
        "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
        "Accept-Encoding: gzip, deflate, br",
        "Accept-Language: zh-CN,zh;q=0.9",
        "Connection: keep-alive",
        "User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 10_3_1 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/10.0 Mobile/14E304 Safari/602.1"
    ],                        $cookie = null, $refer = 'https://www.baidu.com')
    {
        $ip = rand(0, 255) . '.' . rand(0, 255) . '.' . rand(0, 255) . '.' . rand(0, 255);
        $header[] = "CLIENT-IP:" . $ip;
        $header[] = "X-FORWARDED-FOR:" . $ip;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url); //设置传输的 url
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header); //发送 http 报头
        curl_setopt($ch, CURLOPT_COOKIE, $cookie); //设置Cookie
        curl_setopt($ch, CURLOPT_REFERER,  $refer); //设置Referer
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate'); // 解码压缩文件
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // 对认证证书来源的检查
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); // 从证书中检查SSL加密算法是否存在
        curl_setopt($ch, CURLOPT_TIMEOUT, 5); // 设置超时限制防止死循环
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
}

$_type = $_GET['type'] ?? '';
$API = new VvhanApi;

switch ($_type) {
    case 'baidu':
        $_res = $API->baiduredian();
        break;
    case 'zhihu':
        $_res = $API->zhihuHot();
        break;

    case 'weibo':
        $_res = $API->wbresou();
        break;

    default:
        $_res = ['success' => false, 'message' => '参数不完整'];
        break;
}
exit(json_encode($_res, JSON_UNESCAPED_UNICODE));
?>

<?php
//md5签名方式--非简单签名
    header("Content-Type:text/html;charset=UTF-8");
    date_default_timezone_set("PRC");
    $showapi_appid = '102819';  //替换此值,在官网的"我的应用"中找到相关值
    $showapi_secret = '760e838dc1774c66929916b1171cfc35';  //替换此值,在官网的"我的应用"中找到相关值
    $code = 'adsd';
    $paramArr = array(
            'showapi_appid'=> $showapi_appid,
            'content'=> "您好,[name],验证码是[code], 本次登录密码有效时间为[minute]分钟",
            'title'=> "某某公司名称",
            'notiPhone'=> "138...880"
    //添加其他参数
    );
    
    //创建参数(包括签名的处理)
    function createParam ($paramArr,$showapi_secret) {
        $paraStr = "";
        $signStr = "";
        ksort($paramArr);
        foreach ($paramArr as $key => $val) {
            if ($key != '' && $val != '') {
                $signStr .= $key.$val;
                $paraStr .= $key.'='.urlencode($val).'&';
            }
        }
        $signStr .= $showapi_secret;//排好序的参数加上secret,进行md5
        $sign = strtolower(md5($signStr));
        $paraStr .= 'showapi_sign='.$sign;//将md5后的值作为参数,便于服务器的效验
        echo "排好序的参数:".$signStr."\r\n";
        return $paraStr;
    }

    $param = createParam($paramArr,$showapi_secret);
    $url = 'http://route.showapi.com/28-2?'.$param;
    echo "请求的url:".$url."\r\n";
    $result = file_get_contents($url);
    echo "返回的json数据:\r\n";
    print $result.'\r\n';
    $result = json_decode($result);
    echo "\r\n取出showapi_res_code的值:\r\n";
    print_r($result->showapi_res_code);
    echo "\r\n";
?>
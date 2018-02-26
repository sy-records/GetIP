<?php
    /**
     * 纯净得只剩下字的访问IP查询API | 沈唁志
     * https://qq52o.me/1814.html
     */
    //文本输出编码
    Header('content-type:text/html;Charset=utf-8');
    //定义函数
    function getIP()
    {
        static $realip;
    	//定义常量
        if (isset($_SERVER)){
            if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
                $realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
            } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
                $realip = $_SERVER["HTTP_CLIENT_IP"];
            } else {
                $realip = $_SERVER["REMOTE_ADDR"];
            }
        } else {
            if (getenv("HTTP_X_FORWARDED_FOR")){
                $realip = getenv("HTTP_X_FORWARDED_FOR");
            } else if (getenv("HTTP_CLIENT_IP")) {
                $realip = getenv("HTTP_CLIENT_IP");
            } else {
                $realip = getenv("REMOTE_ADDR");
            }
        }
        return $realip;
    }

    $bool = false;

    if ($_GET['code']==='js') {
        echo "function syip(){document.write(\"";
        echo "您的IP是：".getip();
        echo "\");}";
    	$bool = true;
       }

    if ($_GET['code']==='js-txt') {
        echo "function syiptxt(){document.write(\"";
        echo getip();
        echo "\");}";
    	$bool = true;
       }

    if (!$bool){   
        echo getip();
    }

?>
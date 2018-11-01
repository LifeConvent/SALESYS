<?php

if (version_compare(PHP_VERSION, '5.3.0', '<')) die('require PHP > 5.3.0 !');
session_start();
$seid = md5(uniqid('CES'), TRUE);
$_SESSION["seid"] = $seid;
//session_regenerate_id(TRUE);
session_name("sec-s_sessionid");
//开启调试模式，开发阶段开启，部署时关闭
define('APP_DEBUG', True);
//定义应用目录
define('APP_PATH', './SALESHOP/');
define('APP_NAME', './SALESHOP');
define('KEY', 'Ia0CtpywryfU5VGNAlk23s8ctM-99v7we2HZmkVuh_szDz3dinL9aQ9gqslBTZk2');
define('TITLE', 'SALE-SHOP  门店销售系统');
define('HOST', 'http://itwwn8.natappfree.cc/');
//define('HOST', 'http://localhost/');
//引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

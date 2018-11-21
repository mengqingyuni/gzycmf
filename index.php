<?php
//ini_set("display_errors", "On");

error_reporting(E_ALL | E_STRICT);
date_default_timezone_set('Asia/ShangHai');

define("YIN_PATH",dirname(__FILE__));
define("WEB_URL","http://gzy.com");

// Config

//echo YIN_PATH. '/data/gzycmf/config/conf.php';exit;


require 'vendor/autoload.php';
$conf = new \Noodlehaus\Config(YIN_PATH. '/config/conf.php');
//echo $conf->get('debug');

require_once YIN_PATH . '/core/init.php'; //引入框架核心文件
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();




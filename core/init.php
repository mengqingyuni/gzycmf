<?php
/**
 * Created by init.php.
 * User: gongzhiyang
 * Date: 18/11/15
 * Time: 11:43 下午
 */


use \core\gzy\AutoLoad;
use \core\gzy\Gzy;

// 自动加载
spl_autoload_register([new AutoLoad(),'loadprint']);

// 框架核心入口
$gzy = new Gzy();
$gzy->run();


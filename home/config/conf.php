<?php
return [
	"debug"=> true,  // 是否开启调试模式
	'controller' => 'Index',    // 默认控制器
    'action' => 'run',          // 默认方法
	"template" =>[
		'template'      => 'php',//模板默认原生php
		'suffix'        => '.php', //设置模板文件的缀 如果是smarty就是 .html
		'templateaDir'  => 'views/',//设置模板所在的文件夹
		'compiledir'    => 'runtime/HTML',//设置编译后存放放的目录
		'suffix_cache'  =>  '.php',//设置编译文件后缀
	]
];
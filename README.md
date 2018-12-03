# gzycmf
自己写的php框架，主要用于学习。正在完善中。所以没有写文档，请大家见谅。目前已经实现php的基本功能，如模块、控制器、模型、视图、数据库等基础功能。请大家指教。

1 、实现了路由配置  默认是带有参数，但要注意NGINX和apache路由配置

return [
	"debug"		 => true,  // 是否开启调试模式
	"url_route"  => 'PATH_INFO', //PATH_INFO 普通模式（无参数）
	'modules'	 => 'home',
	'controller' => 'Index',    // 默认控制器
    'action' 	 => 'run',          // 默认方法
	"template"   =>[
		'template'      => 'php',//模板默认原生php
		'suffix'        => '.php', //设置模板文件的缀 如果是smarty就是 .html
		'templateaDir'  => 'views/',//设置模板所在的文件夹
		'compiledir'    => 'runtime/HTML',//设置编译后存放放的目录
		'suffix_cache'  =>  '.php',//设置编译文件后缀
	]
];

http://gzy.com/index.php/home/Index/run

http://test:8888/index.php?c=Index&a=run&name=dd&jid=233

2、实现了模块化  控制器和model模块化

home端

api端

3、视图目前php原生








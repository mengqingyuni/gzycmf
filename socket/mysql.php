<?php
/**
 * Created by mysql.php.
 * User: gongzhiyang
 * Date: 18/12/12
 * Time: 7:39 下午
 */
$s = microtime(true);
$db = new swoole_mysql();
$server = array(
	'host' => 'localhost',
	'port' => 3306,
	'user' => 'root',
	'password' => '',
	'database' => 'doub_web',
	'charset' => 'utf8', //指定字符集
	//'timeout' => 120,  // 可选：连接超时时间（非查询超时时间），默认为SW_MYSQL_CONNECT_TIMEOUT（1.0）
);

$db->connect($server, function ($db, $r) {
	if ($r === false) {
		var_dump($db->connect_errno, $db->connect_error);
		die("链接失败");
	}
	$sql = 'select * from doub_user';
	$db->query($sql, function(swoole_mysql $db, $r) {
		if ($r === false)
		{
			var_dump($db->error, $db->errno);
			die("操作失败");
		}
		elseif ($r === true )
		{
			var_dump($db->affected_rows, $db->insert_id);

		}
		var_dump($r);
		$db->close();
	});
});
//swoole_event_wait();
echo 'use ' . (microtime(true) - $s) . ' s';
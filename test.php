<?php
/**
 * Created by test.php.
 * User: gongzhiyang
 * Date: 18/11/25
 * Time: 12:27 上午
 */

Class SafePDO extends PDO {

//	public static function exception_handler($exception) {
//		// Output the exception details
//		die('Uncaught exception:'.",".$exception->getMessage());
//
//        }

	public function __construct($dsn, $username='', $password='', $driver_options=array()) {

		// Temporarily change the PHP exception handler while we . . .
		//set_exception_handler(array(__CLASS__, 'exception_handler'));

		// . . . create a PDO object
		parent::__construct($dsn, $username, $password, $driver_options);

		// Change the exception handler back to whatever it was before
		//restore_exception_handler();
	}

}
$dbms='mysql';     //数据库类型
$host='127.0.0.1'; //数据库主机名
$dbName='yii2basic';    //使用的数据库
$user='root';      //数据库连接用户名
$pass='';          //对应的密码
$dsn="$dbms:host=$host;dbname=$dbName";
// Connect to the database with defined constants


try {

	$dbh = new SafePDO($dsn, $user, $pass,array(\PDO::ATTR_PERSISTENT => true));
	echo "连接成功<br/>";
	//你还可以进行一次搜索操作
	foreach ($dbh->query('SELECT * from adminuser') as $row) {
		//print_r($row); //你可以用 echo($GLOBAL); 来看到这些值
	}

	//$dbh = null;
} catch (\PDOException $e) {
	die ("Error!: " . $e->getMessage() . "<br/>");
}


?>
<?php
namespace api\models;
/**
 * Created by Index.php.
 * User: gongzhiyang
 * Date: 18/11/25
 * Time: 1:10 上午
 */
use core\gzy\base\model;

class Index extends model {

	public function __construct() {






//		$this->conf = new Config(YIN_PATH. '/config/db.php');
//		var_dump($this->conf["dsn"]);
		parent::__construct();


	}




	public function find() {
		$dbh = new Model();
		//print_r($dbh);
		$select = 'SELECT * from adminuser LIMIT 1';
		$stmt = $dbh->query($select); //返回一个PDOStatement对象

		$rows = $stmt->fetchAll(); //获取所有

		$row_count = $stmt->rowCount(); //记录数，2
		return $rows;
	}

	public function createMysql () {
		try {
			$conn = new Model();
			$conn->setAttribute ( $conn::ATTR_ERRMODE , $conn::ERRMODE_EXCEPTION );

			$user_1	= "CREATE TABLE `user_1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
			$conn->exec ( $user_1 );
			return "数据表 MyGuests 创建成功";

		}
		catch(\PDOException $e)
		{
			return $user_1 . "<br>" . $e->getMessage();
		}




	}


}
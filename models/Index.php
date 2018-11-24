<?php
namespace models;
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


}
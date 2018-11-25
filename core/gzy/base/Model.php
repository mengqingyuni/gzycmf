<?php
namespace core\gzy\base;

/**
 * 返回属性的验证规则。
 * Created by Model.php.
 * User: gongzhiyang
 * Date: 18/11/25
 * Time: 12:58 上午
 */
use Noodlehaus\Config;
class Model extends \PDO {


	public function __construct() {


		try {
				$this->conf = new Config(YIN_PATH. '/config/db.php');
				parent::__construct($this->conf['dsn'], $this->conf['username'], $this->conf['password'], array(\PDO::ATTR_PERSISTENT => true));
				//die ("成功");
			} catch (\PDOException $e) {

				die ("Error!: " . $e->getMessage() . "<br/>");
			}

	}


}
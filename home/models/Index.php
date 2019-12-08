<?php

namespace api\models;

/*
 * Created by Index.php.
 * User: gongzhiyang
 * Date: 18/11/25
 * Time: 1:10 上午
 */
use core\gzy\base\model;

class Index extends model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function find()
    {
        $dbh = new Model();
        //print_r($dbh);
        $select = 'SELECT * from sys LIMIT 1';
        $stmt = $dbh->query($select); //返回一个PDOStatement对象

        $rows = $stmt->fetchAll(); //获取所有

        $row_count = $stmt->rowCount(); //记录数，2
        return $rows;
    }

    public function createMysql()
    {
    }
}

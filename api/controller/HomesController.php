<?php

/**
 * Created by IndexController.php.
 * User: gongzhiyang
 * Date: 18/11/16
 * Time: 12:11 上午.
 */

namespace api\controller;

use api\models\Index;
use core\gzy\controller\ApiController;

class HomesController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
        //var_dump($this->conf);
    }

    public function __call($name, $arguments)
    {
        return '=========';
    }

//

    /**
     * 列表 get.
     */
    public function index()
    {
        echo 'ddd';
    }

    /**
     * 详情 get.
     */
    public function view()
    {
        echo get('view');
    }

    /**
     * 添加 post.
     */
    public function create()
    {
    }

    /**
     * 更新 post.
     */
    public function update()
    {
    }

    /**
     * 删除 post.
     */
    public function delete()
    {
    }
}

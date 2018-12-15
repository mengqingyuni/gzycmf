<?php
/**
 * api 控制器类
 * Created by BaseController.php.
 * User: gongzhiyang
 * Date: 18/11/24
 * Time: 9:18 下午
 */

namespace core\gzy\controller;
use core\gzy\base\Templates;
use Noodlehaus\Config;
class ApiController extends Controller {

	public function __construct () {

		parent::__construct();

	}

	function antions () {

		return [
			'index' => [
				'class' => 'yii\rest\IndexAction',
				'modelClass' => $this->modelClass,
				'checkAccess' => [$this, 'checkAccess'],
			],
			'view' => [
				'class' => 'yii\rest\ViewAction',
				'modelClass' => $this->modelClass,
				'checkAccess' => [$this, 'checkAccess'],
			],
			'create' => [
				'class' => 'yii\rest\CreateAction',
				'modelClass' => $this->modelClass,
				'checkAccess' => [$this, 'checkAccess'],
				'scenario' => $this->createScenario,
			],
			'update' => [
				'class' => 'yii\rest\UpdateAction',
				'modelClass' => $this->modelClass,
				'checkAccess' => [$this, 'checkAccess'],
				'scenario' => $this->updateScenario,
			],
			'delete' => [
				'class' => 'yii\rest\DeleteAction',
				'modelClass' => $this->modelClass,
				'checkAccess' => [$this, 'checkAccess'],
			],
			'options' => [
				'class' => 'yii\rest\OptionsAction',
			],
		];
	}


	/**
	 * {@inheritdoc}
	 */
	protected function verbs()
	{
		return [
			'index' => ['GET', 'HEAD'],
			'view' => ['GET', 'HEAD'],
			'create' => ['POST'],
			'update' => ['PUT', 'PATCH'],
			'delete' => ['DELETE'],
		];
	}





}


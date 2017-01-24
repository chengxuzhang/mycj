<?php

namespace mdm\collection\controllers;

use Yii;

class ArticleController extends \mdm\collection\components\BaseController
{
	public $layout = 'right';

	public function actionIndex(){
		// $this->layout = 'right';

		return $this->render('index');
	}

	/**
	 * 创建新任务
	 */
	public function actionCreate(){
		$this->layout = 'article';

		return $this->render('create');
	}
}
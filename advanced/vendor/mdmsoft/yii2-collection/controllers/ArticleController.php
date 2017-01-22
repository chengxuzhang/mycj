<?php

namespace mdm\collection\controllers;

use Yii;
use yii\web\Controller;

class ArticleController extends Controller
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
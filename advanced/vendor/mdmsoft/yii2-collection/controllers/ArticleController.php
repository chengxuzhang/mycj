<?php

namespace mdm\collection\controllers;

use Yii;
use yii\web\Controller;

class ArticleController extends Controller
{

	public function actionIndex(){
		$this->layout = 'right';

		return $this->render('index');
	}
}
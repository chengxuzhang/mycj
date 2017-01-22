<?php

namespace mdm\collection\controllers;

use Yii;
use yii\web\Controller;
use QL\QueryList;

class SiteController extends Controller
{

	public function actionIndex(){
		return $this->render('index');
	}

	public function actionCreate(){
		echo 333;
	}

	public function actionUpdate(){

	}
}
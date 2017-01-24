<?php

namespace mdm\collection\controllers;

use Yii;
use yii\web\Controller;
use QL\QueryList;

class SiteController extends Controller
{

	public function actionIndex(){
		$nodeModel = new \mdm\collection\models\Node;
		$nodeData = $nodeModel->getNodeData();
		return $this->render('index',[
			'nodeModel' => $nodeModel,
			'nodeData' => $nodeData,
		]);
	}

	public function actionCreate(){
		echo 333;
	}

	public function actionUpdate(){

	}
}
<?php

namespace mdm\collection\controllers;

use Yii;
use QL\QueryList;

class SiteController extends \mdm\collection\components\BaseController
{
	public function actionIndex(){
		$nodeModel = new \mdm\collection\models\Node;
		$nodeData = $nodeModel->getNodeData();
		return $this->render('index',[
			'nodeModel' => $nodeModel,
			'nodeData' => $nodeData,
		]);
	}
}
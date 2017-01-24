<?php

namespace mdm\collection\controllers;

use Yii;
use mdm\collection\models\Node;
use mdm\collection\models\NodeSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * NodeController implements the CRUD actions for Node model.
 */
class NodeController extends \mdm\collection\components\BaseController
{
	public $layout = 'right';
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['GET'],
                ],
            ],
        ];
    }

    /**
     * Creates a new Node model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Node();
        Yii::$app->response->format = Response::FORMAT_JSON;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        	$data = $model->getNodeData();
            return ['status'=>1,'message'=>'创建成功','postFun'=>1,'data'=>$data];
        } else {
        	return ['status'=>0,'message'=>'创建失败','postFun'=>1];
        }
    }

    /**
     * Updates an existing Node model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        Yii::$app->response->format = Response::FORMAT_JSON;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        	$data = $model->getNodeData();
            return ['status'=>1,'message'=>'修改成功','postFun'=>1,'data'=>$data];
        } else {
            return ['status'=>0,'message'=>'修改失败','postFun'=>1];
        }
    }

    /**
     * Deletes an existing Node model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
    	$model = $this->findModel($id);
    	Yii::$app->response->format = Response::FORMAT_JSON;

    	if($model->find()->where(['pid'=>$id])->all()){
    		return ['status'=>0,'message'=>'请先删除该目录下的子节点','getFun'=>1];
    	}
        $model->delete();
        $data = $model->getNodeData();

        return ['status'=>1,'message'=>'修改成功','getFun'=>1,'data'=>$data];
    }

    /**
     * Finds the Node model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Node the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Node::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

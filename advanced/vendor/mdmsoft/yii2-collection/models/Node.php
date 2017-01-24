<?php

namespace mdm\collection\models;

use Yii;

/**
 * This is the model class for table "node".
 *
 * @property string $id
 * @property integer $pid
 * @property string $name
 * @property integer $type
 */
class Node extends \mdm\collection\components\BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'node';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'type'], 'integer'],
            [['name'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pid' => '父级ID',
            'name' => '名称',
            'type' => '类型',
        ];
    }

    /**
     * 获取所有的数据
     * @return [type] [description]
     */
    public function getNodeData(){
        return $this->find()->asArray()->all();
    }
}

<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "node".
 *
 * @property string $id
 * @property integer $pid
 * @property string $name
 * @property integer $type
 */
class Node extends \yii\db\ActiveRecord
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
            'pid' => 'Pid',
            'name' => 'Name',
            'type' => 'Type',
        ];
    }
}

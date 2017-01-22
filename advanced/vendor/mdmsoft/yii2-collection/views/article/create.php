<?php

use yii\helpers\Html;
use yii\helpers\Url;
use mdm\collection\AnimateAsset;

$this->title = Yii::t('rbac-collection', 'Create');
$this->params['breadcrumbs'][] = $this->title;

AnimateAsset::register($this);// 注册js
?>

<div class="article-index">
	
<?= $this->render('_form') ?>

</div>
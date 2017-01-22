<?php

namespace mdm\collection;

use yii\web\AssetBundle;

/**
 * Description of AppAsset
 *
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 2.5
 */
class AppAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@mdm/collection/assets';
    /**
     * @inheritdoc
     */
    public $css = [
    ];
    /**
     * @inheritdoc
     */
    public $js = [
    ];
    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
    public $jsOptions = [  
        'position' => \yii\web\View::POS_HEAD,   // 这是设置所有js放置的位置  
    ];
}

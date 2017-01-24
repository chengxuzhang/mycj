<?php

namespace mdm\collection;

use yii\web\AssetBundle;

/**
 * Description of AnimateAsset
 *
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 2.5
 */
class RightAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@mdm/collection/assets';
    /**
     * @inheritdoc
     */
    public $css = [
        'youjian/css/font-awesome.css',
    ];
    /**
     * @inheritdoc
     */
    public $js = [
        'youjian/js/BootstrapMenu.min.js',
    ];
    public $jsOptions = [  
        'position' => \yii\web\View::POS_HEAD,   // 这是设置所有js放置的位置  
    ];
}

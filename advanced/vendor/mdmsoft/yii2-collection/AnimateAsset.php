<?php

namespace mdm\collection;

use yii\web\AssetBundle;

/**
 * Description of AnimateAsset
 *
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 2.5
 */
class AnimateAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@mdm/collection/assets';
    /**
     * @inheritdoc
     */
    public $css = [
        'ztree/zTreeStyle/zTreeStyle.css',
    ];
    /**
     * @inheritdoc
     */
    public $js = [
        'ztree/jquery.ztree.core.js',
        'ztree/jquery.ztree.excheck.js',
        'ztree/jquery.ztree.exedit.js',
    ];
}

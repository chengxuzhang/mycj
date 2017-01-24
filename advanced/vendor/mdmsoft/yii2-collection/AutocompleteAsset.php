<?php

namespace mdm\collection;

use yii\web\AssetBundle;

/**
 * AutocompleteAsset
 *
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class AutocompleteAsset extends AssetBundle
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
        'ztree/zTreeStyle/autoIcon.css',
    ];
    /**
     * @inheritdoc
     */
    public $js = [
        'ztree/jquery.ztree.core.js',
        'ztree/jquery.ztree.excheck.js',
        'ztree/jquery.ztree.exedit.js',
    ];
    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\JqueryAsset',
    ];

}

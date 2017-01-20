<?php

namespace mdm\collection;

use Yii;

class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if (!isset(Yii::$app->i18n->translations['rbac-collection'])) {
            Yii::$app->i18n->translations['rbac-collection'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'sourceLanguage' => 'en',
                'basePath' => '@mdm/collection/messages'
            ];
        }
        /*
        $userClass = ArrayHelper::getValue(Yii::$app->components, 'user.identityClass');
        if ($this->defaultRoute == 'default' && $userClass && is_subclass_of($userClass, 'yii\db\BaseActiveRecord')) {
            $this->defaultRoute = 'assignment';
        }
        //user did not define the Navbar?
        if ($this->navbar === null && Yii::$app instanceof \yii\web\Application) {
            $this->navbar = [
                ['label' => Yii::t('rbac-admin', 'Help'), 'url' => ['default/index']],
                ['label' => Yii::t('rbac-admin', 'Application'), 'url' => Yii::$app->homeUrl]
            ];
        }
        */

        if (class_exists('yii\jui\JuiAsset')) {
            Yii::$container->set('mdm\collection\AutocompleteAsset', 'yii\jui\JuiAsset');
        }
    }
}

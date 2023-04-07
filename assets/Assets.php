<?php

namespace humhub\modules\verifiedIcon\assets;

use humhub\modules\ui\view\components\View;
use humhub\modules\user\models\User;
use humhub\modules\space\models\Space;
use Yii;
use yii\helpers\Url;
use yii\web\AssetBundle;

class Assets extends AssetBundle
{
    public $jsOptions = ['position' => \yii\web\View::POS_END];
    public $publishOptions = [
        'forceCopy' => false
    ];
    public $sourcePath = '@verified-icon/resources';
    public $js = [
        'js/humhub.verified.icon.js'
    ];

    /**
     * @param View $view
     * @return void|AssetBundle
     */
    public static function register($view)
    {
        $cssContent = Yii::$app->getModule('verified-icon')->settings->get('cssContent');
		
		if (!empty($cssContent)) {
			
			parent::register($view);
            $view->registerJsConfig('verified.icon', [
                'cssContent' => $cssContent
            ]);
		}
    }
}

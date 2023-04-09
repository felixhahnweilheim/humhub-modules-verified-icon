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
    public $publishOptions = [
        'forceCopy' => false
    ];
    public $sourcePath = '@verified-icon/resources';
    public $css = [
		'verified.css'
	];
	
    /**
     * @param View $view
     * @return void|AssetBundle
     */
    public static function register($view)
    {
		parent::register($view);
    }
}

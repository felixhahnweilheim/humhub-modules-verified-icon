<?php

namespace humhub\modules\verifiedIcon\widgets;

use humhub\components\Widget;
use humhub\modules\verifiedIcon\assets\Assets;
use Yii;

class VrfdIconCSS extends Widget
{
    public function run()
	{
		$cssContent = Yii::$app->getModule('verified-icon')->settings->get('cssContent');
		
		if (empty($cssContent)) {
			return;
		}
        
		return '<style id="verified-css" type="text/css">' . $cssContent . '</style>';
	}
}
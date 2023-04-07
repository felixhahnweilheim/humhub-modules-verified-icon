<?php

namespace humhub\modules\verifiedIcon;

use Yii;
use yii\helpers\Url;

class Module extends \humhub\components\Module {
	
	public $resourcesPath = 'resources';
	
	// Translatable Module Description
    public function getDescription() {
        return Yii::t('VerifiedIconModule.admin', 'Icon for verified acconts and spaces');
    }
    
    // Link to configuration page
    public function getConfigUrl() {
        return Url::to(['/verified-icon/config']);
    }
}
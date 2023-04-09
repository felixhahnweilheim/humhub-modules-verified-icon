<?php

namespace humhub\modules\verifiedIcon\models;

use humhub\modules\verifiedIcon\Module;
use humhub\modules\user\models\User;
use humhub\modules\space\models\Space;
use Yii;

/**
 * ConfigureForm defines the configurable fields.
 */
class Config extends \yii\base\Model
{	
    public $vrfdUsersIds;
	public $vrfdSpacesIds;
    
    public static function isVerifiedUser($containerId) {
	    
        $module = Yii::$app->getModule('verified-icon');
		$vrfdUsersIdsArray = explode(',', $module->settings->get('verified-users-ids'));
		
		if (in_array($containerId, $vrfdUsersIdsArray)) {
			return true;
		}
		return false;
    }
	
    public static function isVerifiedSpace($containerId) {
	    
        $module = Yii::$app->getModule('verified-icon');
        $vrfdUsersIdsArray = explode(',', $module->settings->get('verified-spaces-ids'));
        
		if (in_array($containerId, $vrfdUsersIdsArray)) {
			return true;
		}
		return false;
    }
	
    public function init() {
    
        parent::init();
		$module = Yii::$app->getModule('verified-icon');
        
        $this->vrfdUsersIds = $module->settings->get('verified-users-ids');
		$this->vrfdSpacesIds = $module->settings->get('verified-spaces-ids');
    }
    
    public function attributeLabels() {
        
        return [
            'vrfdUsersIds' => Yii::t('VerifiedIconModule.admin', 'Verified Users'),
            'vrfdSpacesIds' => Yii::t('VerifiedIconModule.admin', 'Verified Spaces'),
        ];
    }
	
    public function attributeHints() {
		
        return [
            'vrfdUsersIds' => Yii::t('VerifiedIconModule.admin', 'Enter the user IDs seperated by comma, e.g. <code>1,21</code>') . '<br />' . Yii::t('VerifiedIconModule.admin', 'To find the ID of a user go to Administration > Users and edit the user.'),
            'vrfdSpacesIds' => Yii::t('VerifiedIconModule.admin', 'Enter the space IDs seperated by comma, e.g. <code>1,21</code>') . '<br />' . Yii::t('VerifiedIconModule.admin', 'To find the ID of a space go to Administration > Spaces and hover over the "Edit" option. The end of the shown link indicates the ID.'),
        ];
    }

    public function rules() {
    
        return [
            [['vrfdUsersIds', 'vrfdSpacesIds'], 'validateNumbersString'],
        ];
    }
	
    public function validateNumbersString($attribute, $params, $validator) {
		
        if (!preg_match("/^[0-9, ]*+$/", $this->$attribute)) {
            $this->addError($attribute, Yii::t('VerifiedIconModule.admin', 'Invalid Format') . '. ' . Yii::t('VerifiedIconModule.admin', 'Must be a list of numbers, seperated by commas.'));
        }
    }
	
    public function save() {
    
        if(!$this->validate()) {
            return false;
        }
		
        $module = Yii::$app->getModule('verified-icon');
        
        $module->settings->set('verified-users-ids', $this->vrfdUsersIds);
        $module->settings->set('verified-spaces-ids', $this->vrfdSpacesIds);

		self::saveCSS();
		
        return true;
    }
	
	protected function saveCSS() {
		$module = Yii::$app->getModule('verified-icon');
		
		$vrfdUsersIdsArray = explode(',', $this->vrfdUsersIds);
		
		$vrfdSpacesIdsArray = explode(',', $this->vrfdSpacesIds);
		
		$contentContainerIdsArray = array();
		
		foreach($vrfdUsersIdsArray as $userId){
			if(!empty(User::findOne($userId))) {
			    $contentContainerIdsArray[] = User::findOne($userId)->contentcontainer_id;
			}
		}
		foreach($vrfdSpacesIdsArray as $spaceId){
			if(!empty(User::findOne($spaceId))) {
			    $contentContainerIdsArray[] = Space::findOne($spaceId)->contentcontainer_id;
			}
		}
		
		$cssContent = '';
		
		foreach($contentContainerIdsArray as $containerId) {
			$cssContent .= '.card-title [data-contentcontainer-id="' . $containerId . '"]:after' . ',' .
				'.media-heading [data-contentcontainer-id="' . $containerId . '"]:after' . ',' .
				'.media-subheading [data-contentcontainer-id="' . $containerId . '"]:after' . ',';
		}
		if(!empty($cssContent)) {
		    $cssContent .= 'h1.verified:after{content:"\\f058";font-family:"FontAwesome";margin:0px 0px 0px .3em;color:var(--info);}';
		}
		
		$cssFile = $module->getBasePath() . '/resources/verified.css';
		
		// Remove file to udpate timestamp of resources directory which tells Yii to recopy the asset file
		if (file_exists($cssFile)) {
			unlink($cssFile);
		}
		
		if (!empty($cssContent)) {
		    file_put_contents($cssFile, $cssContent);
		}
	}
}

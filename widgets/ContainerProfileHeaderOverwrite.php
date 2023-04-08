<?php

namespace humhub\modules\verifiedIcon\widgets;

use humhub\modules\verifiedIcon\models\Config;
use humhub\modules\content\widgets\ContainerProfileHeader;
use humhub\modules\user\models\User;
use humhub\modules\space\models\Space;
use Yii;

class ContainerProfileHeaderOverwrite extends ContainerProfileHeader
{	
	public function init()
	{
		parent::init();
		
		if ($this->container instanceof Space && Config::isVerifiedSpace($this->container->id) ) {
            $this->classPrefix .= ' verified';
        } elseif ($this->container instanceof User && Config::isVerifiedUser($this->container->id)) {
		    $this->classPrefix .= ' verified';
		}
	}
	
	public function getViewPath()
	{
		return Yii::$app->getModule('content')->basePath . '/widgets/views/';
	}
}

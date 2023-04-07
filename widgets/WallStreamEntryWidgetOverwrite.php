<?php

namespace humhub\modules\verifiedIcon\widgets;

use humhub\modules\verifiedIcon\Module;
use humhub\modules\content\widgets\stream\WallStreamEntryWidget;

abstract class WallStreamEntryWidgetOverwrite extends WallStreamEntryWidget
{
	protected function renderBody();
	public function init()
	{
		parent::init();
	}
/*	protected function renderTitle()
    {
		$options['class'] = 'verified';
		return Html::containerLink($this->model->content->createdBy);
	/*	if (Module::isVerifiedUser()) {
			$title = Html::containerLink($this->model->content->createdBy, ['class' => 'verified']);
		}
        return Html::containerLink($this->model->content->createdBy);
		*/
/*    }
	*/
/*	public function getViewPath() {
		return Yii::$app->getModule('content')->basePath . '/widgets/stream/views/';
		//return Yii::$app->view->theme->basePath . '/views/content/widgets/views/';
	}
	*/
}
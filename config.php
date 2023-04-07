<?php

use yii\base\Event;
use humhub\widgets\LayoutAddons;
use humhub\modules\verifiedIcon\Events;

use humhub\modules\content\widgets\ContainerProfileHeader;
use humhub\modules\content\widgets\stream\WallStreamEntryWidget;

return [
    'id' => 'verified-icon',
    'class' => 'humhub\modules\verifiedIcon\Module',
    'namespace' => 'humhub\modules\verifiedIcon',
    'events' => [
	    	[
			'class' => LayoutAddons::class,
			'event' => LayoutAddons::EVENT_INIT,
			'callback' => [Events::class, 'onLayoutAddonsInit']
		],
		[
			'class' => ContainerProfileHeader::class,
			'event' => ContainerProfileHeader::EVENT_CREATE,
			'callback' => [Events::class, 'onContainerProfileHeaderBeforeRun']
		],
	/*	[
			'class' => WallStreamEntryWidget::class,
			'event' => WallStreamEntryWidget::EVENT_CREATE,
			'callback' => [Events::class, 'onWallStreamEntryWidgetBeforeRun']
		],
		*/
	]
];
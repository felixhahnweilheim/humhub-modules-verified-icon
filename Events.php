<?php

namespace humhub\modules\verifiedIcon;

use humhub\modules\verifiedIcon\widgets\VrfdIconCSS;
use humhub\modules\verifiedIcon\widgets\ContainerProfileHeaderOverwrite;
use humhub\widgets\LayoutAddons;
use humhub\libs\WidgetCreateEvent;

class Events
{
	public static function onLayoutAddonsInit($event)
	{
        $event->sender->addWidget(VrfdIconCSS::class);
	}
	public static function onContainerProfileHeaderBeforeRun(WidgetCreateEvent $event)
	{
		    $event->config['class'] = ContainerProfileHeaderOverwrite::class;
	}
}

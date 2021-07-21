<?php

use olan\whiteboard\Events;
use humhub\modules\admin\widgets\AdminMenu;
use humhub\widgets\TopMenu;
use humhub\modules\space\widgets\Menu;
use humhub\modules\space\widgets\HeaderControlsMenu;
use humhub\modules\space\modules\manage\widgets\DefaultMenu;

return [
	'id' => 'whiteboard',
	'class' => 'olan\whiteboard\Module',
	'namespace' => 'olan\whiteboard',
	'events' => [
		// ['class' => TopMenu::class, 'event' => TopMenu::EVENT_INIT, 'callback' => [Events::class, 'onTopMenuInit']],
		['class' => AdminMenu::class, 'event' => AdminMenu::EVENT_INIT, 'callback' => [Events::class, 'onAdminMenuInit']],

		['class' => HeaderControlsMenu::class, 'event' => HeaderControlsMenu::EVENT_INIT, 'callback' => [Events::class, 'onSpaceHeaderControlsMenu']],
		['class' => DefaultMenu::class, 'event' => DefaultMenu::EVENT_INIT, 'callback' => [Events::class, 'onSpaceDefaultMenu']],
		['class' => Menu::class, 'event' => Menu::EVENT_INIT, 'callback' => [Events::class, 'onSpaceMenuInit']],
	],
];

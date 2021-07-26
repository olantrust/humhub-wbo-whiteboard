<?php

namespace  olan\wbowhiteboard;

use humhub\modules\ui\menu\MenuLink;
use Yii;
use yii\helpers\Url;

class Events
{
    /**
     * Defines what to do when the top menu is initialized.
     *
     * @param $event
     */
    // public static function onTopMenuInit($event)
    // {
    //     $event->sender->addItem([
    //         'label' => 'Whiteboard',
    //         'icon' => '<i class="fa fa-pencil-square"></i>',
    //         'url' => Url::to(['/wbo-whiteboard/index']),
    //         'sortOrder' => 99999,
    //         'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'whiteboard' && Yii::$app->controller->id == 'index'),
    //     ]);
    // }

    /**
     * Defines what to do if admin menu is initialized.
     *
     * @param $event
     */
    public static function onAdminMenuInit($event)
    {
        $event->sender->addItem([
            'label' => 'WBO Whiteboard',
            'url' => Url::to(['/wbo-whiteboard/admin']),
            'group' => 'manage',
            'icon' => '<i class="fa fa-pencil-square"></i>',
            'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'wbo-whiteboard' && Yii::$app->controller->id == 'admin'),
            'sortOrder' => 402,
        ]);
    }

    public static function onSpaceMenuInit($event)
    {
        $space = $event->sender->space;

        if($space->isModuleEnabled('wbo-whiteboard'))
        {
            $event->sender->addItem([
                'label'    => 'WBO Whiteboard',
                'url'      => $space->createUrl('/wbo-whiteboard/index'),
                // 'group'    => 'manage',
                'icon'      => '<i class="fa fa-pencil-square"></i>',
                'isActive'  => MenuLink::isActiveState('wbo-whiteboard', 'index'),
                'sortOrder' => 403,
            ]);
        }
    }

    public static function onSpaceHeaderControlsMenu($event)
    {
        if($event->sender->space->isModuleEnabled('wbo-whiteboard') && $event->sender->space->isAdmin())
        {
            $event->sender->addEntry(new MenuLink([
                'label'     => Yii::t('WboWhiteboardModule.base', 'WBO Whiteboard'),
                'url'       => $event->sender->space->createUrl('/wbo-whiteboard/space-settings'),
                'icon'      => 'pencil-square',
                'sortOrder' => 200,
            ]));
        }
    }



    public static function onSpaceDefaultMenu($event)
    {
        if($event->sender->space->isModuleEnabled('wbo-whiteboard') && $event->sender->space->isAdmin())
        {
            $event->sender->addEntry(new MenuLink([
                'label'     => Yii::t('WboWhiteboardModule.base', 'Whiteboard'),
                'url'       => $event->sender->space->createUrl('/wbo-whiteboard/space-settings'),
                // 'icon'      => 'money',
                'isActive'  => MenuLink::isActiveState('wbo-whiteboard', 'space-settings'),
                'sortOrder' => 405
            ]));
        }
    }
}

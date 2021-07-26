<?php

namespace olan\wbowhiteboard\controllers;

use Yii;
use humhub\components\Controller;

class IndexController extends \humhub\modules\content\components\ContentContainerController
{

    // public $subLayout = "@wbowhiteboard/views/layouts/default";

    /**
     * Renders the index view for the module
     *
     * @return string
     */
    public function actionIndex()
    {
        $space = $this->contentContainer;
        $user  = Yii::$app->user;

        $unique_board = $space->guid; //. '_' . $user->guid;

        $wb_url   = Yii::$app->getModule('wbo-whiteboard')->settings->get('wb_url') . '/boards/' . $unique_board;
        $bg_color = Yii::$app->getModule('wbo-whiteboard')->settings->get($space->id . '-bg_color');

        return $this->render('index', [
            'wb_url'   => $wb_url,
            'bg_color' => $bg_color
        ]);
    }

}


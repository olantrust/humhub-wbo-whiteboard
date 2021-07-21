<?php

namespace olan\whiteboard\controllers;

use olan\whiteboard\models\WhiteboardBackground;
use Yii;

/**
 * Thorugh this we are mapping Humhub space with akaunting
 */
class SpaceSettingsController extends \humhub\modules\space\modules\manage\components\Controller
{
    public function actionIndex()
    {
        $module = Yii::$app->getModule('whiteboard');

        $space = $this->contentContainer;

        $model = new WhiteboardBackground();

        // Save data
        if ($model->load(Yii::$app->request->post()) && $model->saveValue($space->id))
        {
            $this->view->saved();
            return $this->redirect($space->createUrl('/whiteboard/space-settings'));
        }

        $model->bg_color =  $module->settings->get($space->id . '-bg_color');

        return $this->render('index', [
            'space' => $space,
            'model' => $model
        ]);
    }
}

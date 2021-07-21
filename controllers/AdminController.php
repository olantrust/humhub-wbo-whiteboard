<?php

namespace olan\whiteboard\controllers;

use Yii;
use humhub\modules\admin\components\Controller;
use olan\whiteboard\models\WhiteboardSetup;

class AdminController extends Controller
{

    /**
     * Render admin only page
     *
     * @return string
     */
    public function actionIndex()
    {
        $module = Yii::$app->getModule('whiteboard');

        $model = new WhiteboardSetup();

        // Save data
        if ($model->load(Yii::$app->request->post()) && $model->save())
        {
            $this->view->saved();
            return $this->redirect(['index']);
        }

        $model->wb_url =  $module->settings->get('wb_url');

        return $this->render('index', [
            'model' => $model
        ]);
    }

}


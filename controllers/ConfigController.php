<?php

namespace humhub\modules\verifiedIcon\controllers;

use humhub\modules\verifiedIcon\models\Config;
use Yii;

/**
 * ConfigController handles the configuration requests.
 */
class ConfigController extends \humhub\modules\admin\components\Controller
{
    /**
     * Configuration action for super admins.
     */
    public function actionIndex()
    {
        $form = new Config();

        if ($form->load(Yii::$app->request->post()) && $form->save()) {
            $this->view->saved();
        }

        return $this->render('index', ['model' => $form]);
    }
}
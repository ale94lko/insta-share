<?php

namespace backend\controllers;

use common\models\LoginForm;
use common\models\User;
use Yii;
use yii\base\InvalidConfigException;
use yii\filters\Cors;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;
use yii\web\UnauthorizedHttpException;

class UserController extends ActiveController
{
    public $modelClass = User::class;

    /**
     * {@inheritdoc}
     */
    public function actions(): array
    {
        $actions = parent::actions();
        unset($actions['index']);

        return $actions;
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors(): array
    {
        return array_merge(parent::behaviors(), [
            'cors' => Cors::class
        ]);
    }

    /**
     */
    public function actionLogin()
    {
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post(), '') && $model->login()) {
            return $model->getUser();
        }

        Yii::$app->response->statusCode = 422;

        return [
            'errors' => $model->errors,
        ];
    }
}

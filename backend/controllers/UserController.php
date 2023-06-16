<?php

namespace backend\controllers;

use common\models\User;
use Yii;
use yii\base\InvalidConfigException;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;
use yii\web\UnauthorizedHttpException;

class UserController extends ActiveController
{
    public $modelClass = User::class;

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);

        return $actions;
    }

    /**
     * {@inheritdoc}
     */
    public function verbs(): array
    {
        $verbs = parent::verbs();
        $verbs['login'] = ['POST'];

        return $verbs;
    }

    /**
     * @throws NotFoundHttpException
     * @throws InvalidConfigException
     * @throws UnauthorizedHttpException
     */
    public function actionLogin(): array
    {
        $requestParams = Yii::$app->getRequest()->getBodyParams();
        if (empty($requestParams)) {
            $requestParams = Yii::$app->getRequest()->getQueryParams();
        }

        $username = $requestParams['username'];
        $password = $requestParams['password'];

        $modelClass = $this->modelClass;
        $model = $modelClass::findOne([
            'username' => $username,
            'status' => $modelClass::STATUS_ACTIVE
        ]);

        if (empty($model)) {
            throw new NotFoundHttpException("User not found: $username");
        }

        if (!$model->validatePassword($password)) {
            throw new UnauthorizedHttpException("Invalid password for username: $username");
        }

        return ['access_token' => $model->access_token];
    }
}

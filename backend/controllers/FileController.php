<?php

namespace backend\controllers;

use backend\resources\File;
use Yii;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;

class FileController extends ActiveController
{
    public $modelClass = File::class;

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class,
        ];

        return $behaviors;
    }

    /**
     * Checks the privilege of the current user to his own files.
     *
     * @param string $action the ID of the action to be executed
     * @param File $model the model to be accessed. If null, it means no specific model is being accessed.
     * @param array $params additional parameters
     * @throws ForbiddenHttpException if the user does not have access
     */
    public function checkAccess($action, $model = null, $params = [])
    {
        if ($model->created_by !== Yii::$app->user->id) {
            throw new ForbiddenHttpException('You do not have access to this file');
        }
    }
}

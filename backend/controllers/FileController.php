<?php

namespace backend\controllers;

use backend\resources\File;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;

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
}

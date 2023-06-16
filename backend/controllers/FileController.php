<?php

namespace backend\controllers;

use common\models\File;
use yii\rest\ActiveController;

class FileController extends ActiveController
{
    public $modelClass = File::class;
}

<?php

namespace backend\controllers;

use backend\resources\File;
use yii\rest\ActiveController;

class FileController extends ActiveController
{
    public $modelClass = File::class;
}

<?php

namespace backend\resources;

class File extends \common\models\File
{
    public function fields(): array
    {
        return ['name', 'status', 'path', 'created_by'];
    }
}

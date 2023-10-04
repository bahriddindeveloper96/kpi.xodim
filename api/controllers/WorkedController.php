<?php

namespace api\controllers;

use common\models\Worked;
use common\models\WorkedSearch;
use yii\rest\ActiveController;
use Yii;


class WorkedController extends ActiveController
{
    public $modelClass = 'common\models\Worked';
}

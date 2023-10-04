<?php

namespace api\controllers;

use common\models\Division;
use common\models\DivisionSearch;
use yii\rest\ActiveController;
use Yii;


class DivisionController extends ActiveController
{
    public $modelClass = 'common\models\Division';
}

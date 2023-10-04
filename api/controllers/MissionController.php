<?php

namespace api\controllers;

use common\models\Mission;
use common\models\MissionSearch;
use yii\rest\ActiveController;
use Yii;


class MissionController extends ActiveController
{
    public $modelClass = 'common\models\Mission';
}

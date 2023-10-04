<?php

namespace api\controllers;

use common\models\Incentive;
use common\models\IncentiveSearch;
use yii\rest\ActiveController;
use Yii;


class IncentiveController extends ActiveController
{
    public $modelClass = 'common\models\Incentive';
}

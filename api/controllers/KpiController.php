<?php

namespace api\controllers;

use common\models\Kpi;
use common\models\KpiSearch;
use yii\rest\ActiveController;
use Yii;


class KpiController extends ActiveController
{
    public $modelClass = 'common\models\Kpi';
}

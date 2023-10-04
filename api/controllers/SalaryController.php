<?php

namespace api\controllers;

use common\models\Salary;
use common\models\SalarySearch;
use yii\rest\ActiveController;
use Yii;


class SalaryController extends ActiveController
{
    public $modelClass = 'common\models\Salary';
}

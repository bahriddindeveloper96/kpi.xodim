<?php

namespace api\controllers;

use common\models\Company;
use common\models\CompanySearch;
use yii\rest\ActiveController;
use Yii;


class CompanyController extends ActiveController
{
    public $modelClass = 'common\models\CompanySearch';
}

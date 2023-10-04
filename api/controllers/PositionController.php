<?php

namespace api\controllers;


use yii\rest\ActiveController;
use Yii;


class PositionController extends ActiveController
{
    public $modelClass = 'common\models\UserPosition';
}

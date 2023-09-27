<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "kpi_plan".
 *
 * @property int $id
 * @property string $old_result
 * @property string $end_result
 * @property string $percent
 * @property string $summa
 */
class Kpi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kpi_plan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['old_result', 'end_result', 'percent', 'summa'], 'required'],
            [['old_result', 'end_result', 'percent', 'summa'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'old_result' => 'Мин резултать - %',
            'end_result' => 'Мах резултать -%',
            'percent' => 'Процент %',
            'summa' => 'Сумма',
        ];
    }
}

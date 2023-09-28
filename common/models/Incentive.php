<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "incentive".
 *
 * @property int $id
 * @property int $user_id
 * @property string $percent
 * @property string $summa
 * @property string $date
 *
 * @property Worked $user
 */
class Incentive extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'incentive';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'percent', 'summa', 'date'], 'required'],
            [['user_id'], 'integer'],
            [['date'], 'safe'],
            [['percent', 'summa'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Worked::class, 'targetAttribute' => ['user_id' => 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'user_id' => 'Сотрудник',
            'percent' => 'Процент %',
            'summa' => 'Сумма',
            'date' => 'Дата',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Worked::class, ['user_id' => 'user_id']);
    }
}

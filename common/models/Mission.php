<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mission".
 *
 * @property int $id
 * @property int $division_id
 * @property string $mission_one
 * @property string $mission_two
 * @property string $mission_three
 * @property int $company_id
 * @property string $one_ball
 * @property string $two_ball
 * @property string $three_ball
 * @property string $plan_a
 * @property string $plan_b
 * @property string $plan_c
 *
 * @property Company $company
 * @property Division $division
 * @property Worked[] $workeds
 */
class Mission extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mission';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['division_id', 'mission_one', 'mission_two', 'mission_three', 'company_id', 'one_ball', 'two_ball', 'three_ball', 'plan_a', 'plan_b', 'plan_c'], 'required'],
            [['division_id', 'company_id'], 'integer'],
            [['mission_one', 'mission_two', 'mission_three', 'one_ball', 'two_ball', 'three_ball', 'plan_a', 'plan_b', 'plan_c'], 'string', 'max' => 255],
            [['division_id'], 'exist', 'skipOnError' => true, 'targetClass' => Division::class, 'targetAttribute' => ['division_id' => 'id']],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::class, 'targetAttribute' => ['company_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'division_id' => 'Отдель',
            'mission_one' => 'Главный задача',
            'mission_two' => 'Спец задача',
            'mission_three' => 'Другой задача',
            'company_id' => 'Корхона',
            'one_ball' => 'Процент - %',
            'two_ball' => 'Процент - %',
            'three_ball' => 'Процент - %',
            'plan_a' => 'Общий ш.т',
            'plan_b' => 'Общий ш.т',
            'plan_c' => 'Общий ш.т',
        ];
    }

    /**
     * Gets query for [[Company]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::class, ['id' => 'company_id']);
    }

    /**
     * Gets query for [[Division]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDivision()
    {
        return $this->hasOne(Division::class, ['id' => 'division_id']);
    }

    /**
     * Gets query for [[Workeds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkeds()
    {
        return $this->hasMany(Worked::class, ['mission_id' => 'id']);
    }
}

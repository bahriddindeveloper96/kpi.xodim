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
 *
 * @property Company $company
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
            [['division_id', 'mission_one', 'mission_two', 'mission_three', 'company_id'], 'required'],
            [['division_id', 'company_id'], 'integer'],
            [['mission_one', 'mission_two', 'mission_three'], 'string', 'max' => 255],
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
            'division_id' => 'Division ID',
            'mission_one' => 'Mission One',
            'mission_two' => 'Mission Two',
            'mission_three' => 'Mission Three',
            'company_id' => 'Company ID',
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

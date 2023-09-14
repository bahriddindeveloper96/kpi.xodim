<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "worked".
 *
 * @property int $id
 * @property int $user_id
 * @property string $date
 * @property string $mission_one
 * @property string $mission_two
 * @property string $mission_three
 * @property int $mission_id
 * @property int $company_id
 *
 * @property Company $company
 * @property Mission $mission
 * @property User $user
 */
class Worked extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'worked';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'date', 'mission_one', 'mission_two', 'mission_three', 'mission_id', 'company_id'], 'required'],
            [['user_id', 'mission_id', 'company_id'], 'integer'],
            [['date', 'mission_one', 'mission_two', 'mission_three'], 'string', 'max' => 255],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::class, 'targetAttribute' => ['company_id' => 'id']],
            [['mission_id'], 'exist', 'skipOnError' => true, 'targetClass' => Mission::class, 'targetAttribute' => ['mission_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'date' => 'Date',
            'mission_one' => 'Mission One',
            'mission_two' => 'Mission Two',
            'mission_three' => 'Mission Three',
            'mission_id' => 'Mission ID',
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

    /**
     * Gets query for [[Mission]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMission()
    {
        return $this->hasOne(Mission::class, ['id' => 'mission_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}

<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mission".
 *
 * @property int $id
 * @property int $position_id
 * @property string $mission_one
 * @property string $mission_two
 * @property string $mission_three
 * @property int $company_id
 *
 * @property Company $company
 * @property UserPosition $position
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
            [['position_id', 'mission_one', 'mission_two', 'mission_three', 'company_id'], 'required'],
            [['position_id', 'company_id'], 'integer'],
            [['mission_one', 'mission_two', 'mission_three'], 'string', 'max' => 255],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::class, 'targetAttribute' => ['company_id' => 'id']],
            [['position_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserPosition::class, 'targetAttribute' => ['position_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'position_id' => 'Position ID',
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

    /**
     * Gets query for [[Position]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosition()
    {
        return $this->hasOne(UserPosition::class, ['id' => 'position_id']);
    }
}

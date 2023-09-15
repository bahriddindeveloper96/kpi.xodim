<?php

namespace common\models;
use common\models\User;

use Yii;

/**
 * This is the model class for table "user_position".
 *
 * @property int $id
 * @property int $xodim_id
 * @property int $division_id
 * @property string $begin_date
 * @property string $buyruq_file
 * @property int $created_by
 * @property int $updated_by
 * @property int $company_id
 *
 * @property Company $company
 * @property User $createdBy
 * @property Division $division
 * @property Mission[] $missions
 * @property User $updatedBy
 * @property User $xodim
 */
class UserPosition extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_position';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['xodim_id', 'division_id', 'begin_date', 'buyruq_file', 'created_by', 'updated_by', 'company_id'], 'required'],
            [['xodim_id', 'division_id', 'created_by', 'updated_by', 'company_id'], 'integer'],
            [['begin_date', 'buyruq_file'], 'string', 'max' => 255],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::class, 'targetAttribute' => ['company_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['division_id'], 'exist', 'skipOnError' => true, 'targetClass' => Division::class, 'targetAttribute' => ['division_id' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
            [['xodim_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['xodim_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'xodim_id' => 'Cотрудник',
            'division_id' => 'Отделт',
            'begin_date' => 'Команди дата',
            'buyruq_file' => 'Команди файл',
            'created_by' => 'Владелец',
            'updated_by' => 'Владелец',
            'company_id' => 'Корхона',
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
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
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
     * Gets query for [[Missions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMissions()
    {
        return $this->hasMany(Mission::class, ['position_id' => 'id']);
    }

    /**
     * Gets query for [[UpdatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'updated_by']);
    }

    /**
     * Gets query for [[Xodim]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'xodim_id']);
    }
}

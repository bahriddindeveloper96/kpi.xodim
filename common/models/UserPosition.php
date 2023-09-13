<?php

namespace common\models;
use common\models\User;

use Yii;

/**
 * This is the model class for table "user_position".
 *
 * @property int $id
 * @property int $xodim_id
 * @property string $lavozimi
 * @property string $begin_date
 * @property string $buyruq_file
 * @property int $created_by
 * @property int $updated_by
 * @property int $company_id
 *
 * @property Company $company
 * @property User $createdBy
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
            [['xodim_id', 'lavozimi', 'begin_date', 'buyruq_file', 'created_by', 'updated_by', 'company_id'], 'required'],
            [['xodim_id', 'created_by', 'updated_by', 'company_id'], 'integer'],
            [['lavozimi', 'begin_date', 'buyruq_file'], 'string', 'max' => 255],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::class, 'targetAttribute' => ['company_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
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
            'id' => 'ID',
            'xodim_id' => 'Xodim ID',
            'lavozimi' => 'Lavozimi',
            'begin_date' => 'Begin Date',
            'buyruq_file' => 'Buyruq File',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
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
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
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

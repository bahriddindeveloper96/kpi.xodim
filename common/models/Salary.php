<?php

namespace common\models;
use common\models\User;
use common\models\Company;

use Yii;

/**
 * This is the model class for table "salary".
 *
 * @property int $id
 * @property int $company_id
 * @property int $user_id
 * @property string $money
 * @property string $money_date
 * @property string $comment
 *
 * @property Company $company
 * @property User $user
 */
class Salary extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'salary';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_id', 'user_id', 'money', 'money_date', 'comment'], 'required'],
            [['company_id', 'user_id'], 'integer'],
            [['money', 'money_date', 'comment'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::class, 'targetAttribute' => ['company_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'company_id' => 'Корхона',
            'user_id' => 'Сотрудник',
            'money' => 'Сумма',
            'money_date' => 'Сумма дата',
            'comment' => 'Коммент',
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
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}

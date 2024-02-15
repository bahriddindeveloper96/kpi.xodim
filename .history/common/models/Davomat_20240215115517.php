<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "davomat".
 *
 * @property int $id
 * @property int $user_id
 * @property string $date
 * @property string $izox
 * @property string $file
 *
 * @property User $user
 */
class Davomat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $image;
    public static function tableName()
    {
        return 'davomat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id','image'], 'required'],
            [['user_id'], 'integer'],
            [['image'],'file'],
            [['date'], 'safe'],
            [['izox', 'file'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
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
            'date' => 'Дата',
            'izox' => 'Коммент',
            'image' => 'Фото',
        ];
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

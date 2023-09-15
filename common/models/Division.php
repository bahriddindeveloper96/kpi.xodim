<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "division".
 *
 * @property int $id
 * @property string $name
 * @property string $stavka
 */
class Division extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'division';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'stavka'], 'required'],
            [['name', 'stavka'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'name' => 'Имя',
            'stavka' => 'Ставка',
        ];
    }
}

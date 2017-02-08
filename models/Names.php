<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "names".
 *
 * @property integer $id
 * @property string $name
 * @property string $surname
 * @property string $address
 */
class Names extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'names';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'address'], 'required'],
            [['name', 'surname'], 'string', 'max' => 100],
            [['address'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'address' => 'Address',
        ];
    }
}

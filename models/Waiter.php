<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "waiter".
 *
 * @property integer $id_waiter
 * @property string $name
 * @property string $surname
 *
 * @property Order[] $orders
 */
class Waiter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'waiter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'surname'], 'required'],
            [['name', 'surname'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_waiter' => 'Id Waiter',
            'name' => 'Name',
            'surname' => 'Surname',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['id_waiter' => 'id_waiter']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "food".
 *
 * @property integer $id_food
 * @property string $name_food
 * @property double $price
 *
 * @property OrderFood[] $orderFoods
 */
class Food extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'food';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_food', 'price'], 'required'],
            [['price'], 'number'],
            [['name_food'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_food' => 'Id Food',
            'name_food' => 'Name Food',
            'price' => 'Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderFoods()
    {
        return $this->hasMany(OrderFood::className(), ['id_food' => 'id_food']);
    }
}

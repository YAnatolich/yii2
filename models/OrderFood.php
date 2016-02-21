<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_food".
 *
 * @property integer $id_order_food
 * @property integer $id_food
 * @property integer $id_order
 *
 * @property Food $idFood
 * @property Order $idOrder
 */
class OrderFood extends \yii\db\ActiveRecord
{
    public $cnt_food;
    public $cnt_order;
    public $name_food;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_food';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_food', 'id_order'], 'required'],
            [['id_food', 'id_order'], 'integer'],
            [['id_food'], 'exist', 'skipOnError' => true, 'targetClass' => Food::className(), 'targetAttribute' => ['id_food' => 'id_food']],
            [['id_order'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['id_order' => 'id_order']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_order_food' => 'Id Order Food',
            'id_food' => 'Id Food',
            'id_order' => 'Id Order',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFood()
    {
        return $this->hasOne(Food::className(), ['id_food' => 'id_food']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdOrder()
    {
        return $this->hasOne(Order::className(), ['id_order' => 'id_order']);
    }
}

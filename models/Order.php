<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $id_order
 * @property integer $id_waiter
 * @property string $date_order
 *
 * @property Waiter $idWaiter
 * @property OrderFood[] $orderFoods
 */
class Order extends \yii\db\ActiveRecord
{
     public $cnt_order;
     public $tmp_table;
     public $id_waiter;
     public $sumFromPrice;
     public $cnt_food;
     public $price;
     public $id_order;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_waiter', 'date_order'], 'required'],
            [['id_waiter'], 'integer'],
            [['date_order'], 'safe'],
            [['id_waiter'], 'exist', 'skipOnError' => true, 'targetClass' => Waiter::className(), 'targetAttribute' => ['id_waiter' => 'id_waiter']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cnt_order' => 'количество заказов',
            'order.id_order' => 'Id Order',
            'id_waiter' => 'Id Waiter',
            'waiter.name' =>'имя официанта',
            'waiter.surname' =>'имя официанта',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdWaiter()
    {
        return $this->hasOne(Waiter::className(), ['id_waiter' => 'id_waiter']);
    }
public function getWaiter()
    {
        return $this->hasOne(Waiter::className(), ['id_waiter' => 'id_waiter']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderFoods()
    {
        return $this->hasMany(OrderFood::className(), ['id_order' => 'id_order']);
    }
}

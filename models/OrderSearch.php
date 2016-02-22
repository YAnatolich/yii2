<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Order;
use app\models\Waiter;
use yii\data\SqlDataProvider;
use yii\data\ArrayDataProvider;
/**
 * OrderSearch represents the model behind the search form about `app\models\Order`.
 */
class OrderSearch extends Order
{
  public $name;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_order', 'id_waiter'], 'integer'],
            [['date_order'], 'safe'],
        ];
    }
    

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    
    public function search($params)
    {
        
        
      $dataProvider = new SqlDataProvider([
    'sql' => 'SELECT waiter.id_waiter, waiter.name, waiter.surname, cnt_order FROM 
(SELECT order.id_waiter, COUNT(order.id_waiter) AS cnt_order
 FROM `order` GROUP BY id_waiter ORDER BY cnt_order DESC LIMIT 10) as s
 JOIN waiter ON waiter.id_waiter = s.id_waiter',
    'params' => [':date'=>"2016-02-17"],
    'totalCount' => 20,
    'sort' => [
        'attributes' => [
            'waiter.name',
            'waiter.surname',
            'id_waiter',
            'date_order',
            'cnt_order',
        ],
    ],
    'pagination' => [
        'pageSize' => 20,
    ],
]);
      
        $this->load($params);

        

        // grid filtering conditions
      /* $query5->andFilterWhere([
           'cnt_order'=>$this->cnt_order,
           'id_order' => $this->id_order,
           'id_waiter' => $this->id_waiter,
           'date_order' => $this->date_order,
           'name' => $this->name,
        ]);
*/
        return $dataProvider;
    }
}


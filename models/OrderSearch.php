<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Order;
use app\models\Waiter;
/**
 * OrderSearch represents the model behind the search form about `app\models\Order`.
 */
class OrderSearch extends Order
{
  
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
        
        
        $query2 = Order::find()
                ->select(['id_waiter','COUNT(id_waiter) AS cnt_order'])
                ->groupBy('{{id_waiter}}')
                ->orderBy('cnt_order DESC')
                ->limit(10);
        
      /* $query4 = Video::find()
       ->select(['video.*', 'COUNT(likes.video_id) AS countlike'])
       ->join('LEFT JOIN', Likes::tableName(), 'videos.id=likes.video_id')
       ->groupBy('videos.id')
       ->orderBy(['countlike' => SORT_DESC])
       ->limit(10);
        */
      $query5 = Order::find()
       ->select(['waiter.id_waiter','waiter.name','waiter.surname','order.id_order','order.date_order','COUNT(order.id_waiter) AS cnt_order'])
       ->join('LEFT JOIN', Waiter::tableName(), 'order.id_waiter=waiter.id_waiter')
       ->groupBy('order.id_waiter')
       ->orderBy(['cnt_order' => SORT_DESC])
       ->limit(10);
       
         
//$data = $query->all();

            
        
         $query3 = Order::find()
                ->select(['date_order','id_order','waiter.id_waiter', 'waiter.name', 'waiter.surname'])
                ->joinWith('waiter')
                ->where(['waiter.id_waiter' => 'order.id_waiter']);
                
                
       // $query2 = Waiter::find();
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query5,
            
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
       $query5->andFilterWhere([
           'cnt_order'=>$this->cnt_order,
           'id_order' => $this->id_order,
           'id_waiter' => $this->id_waiter,
           'date_order' => $this->date_order,
        ]);

        return $dataProvider;
    }
}


<?php
namespace app\controllers;

use Yii;

use app\models\Food;
use app\models\FoodSearch;
use app\models\OrderFood;
use app\models\OrderFoodSearch;
use app\models\Order;
use app\models\OrderSearch;
use app\models\Waiter;
use app\models\WaiterSearch;
use app\controllers\FoodController;
use app\controllers\OrderController;
use app\controllers\OrderFoodController;
use app\controllers\WaiterController;
use yii\db\Command;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\EntryForm;
namespace app\controllers;


class RestoranController extends \yii\web\Controller
{
    public $cnt_food;
    public $cnt_order;
    public function actionIndex()
    {
        $order = new \app\models\Order();
        $waiter = new \app\models\Waiter();
        $orderFood = new \app\models\OrderFood();
        $queryPopWaiter = $order::find()
       ->select(['waiter.id_waiter','waiter.name','waiter.surname','order.id_order','order.date_order','COUNT(order.id_waiter) AS cnt_order'])
       ->join('LEFT JOIN', $waiter::tableName(), 'order.id_waiter=waiter.id_waiter')
       ->groupBy('order.id_waiter')
       ->orderBy(['cnt_order' => SORT_DESC])
       ->limit(10);
      //  $query = new Query;
// compose the query
$queryPopFood = $orderFood::find()
     ->select('food.name_food, COUNT( food.name_food ) as cnt_food,
 order_food.id_food, order_food.id_order')
    ->from('food')
    ->join('LEFT JOIN', $orderFood::tableName(), 
            'order_food.id_food = food.id_food')
    ->groupBy('food.name_food')
    ->orderBy('cnt_food DESC')    
    ->limit(10)
    ;


$querySelectOrder = $order::find()
        ->select(['id_order'])
        ->where(['date_order' => '2016-02-17'])->column()
        ;



$querySumMany = $order::find()
        ->select(['SUM(food.price) AS sumFromPrice'])
        ->from('food')
        ->join('LEFT JOIN',$order::find(),'')
        ->where(['order_food.id_food' => 'food.id_food',
            'order_food.id_order' => $querySelectOrder
            ]); 

return $this->render('index',['foo' => 1,
    'bar' => 2,
    'queryPopFood' =>$queryPopFood,
    'queryPopWaiter'=>$queryPopWaiter,
    'querySumMany' => $querySumMany,
    ]);
    }

}

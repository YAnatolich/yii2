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
use yii\data\SqlDataProvider;

class SqlDataProvider1 extends  SqlDataProvider{
    public $sumFromPrice;
    public $s;
}


class RestoranController extends \yii\web\Controller
{
    public $sumFromPrice;
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
 /*$queryPopFood = $orderFood::find()
     ->select('food.name_food, COUNT( food.name_food ) as cnt_food,
 order_food.id_food, order_food.id_order')
    ->from('food')
    ->join('LEFT JOIN', $orderFood::tableName(), 
            'order_food.id_food = food.id_food')
    ->groupBy('food.name_food')
    ->orderBy('cnt_food DESC')    
    ->limit(10)
    ;*/

$dataProvider3 = new SqlDataProvider1([
    'sql' => 'SELECT food.name_food, COUNT( food.name_food ) as cnt_food,
 order_food.id_food, order_food.id_order
FROM food 
JOIN order_food ON order_food.id_food = food.id_food
GROUP BY food.name_food
ORDER BY cnt_food DESC 
',
    'params' => [':date'=>"2016-02-17"],
    'totalCount' => 5,
    'sort' => [
        'attributes' => [
            'name_food',
            'cnt_food',
            'id_food',
            'id_order',
            
        ],
    ],
    'pagination' => [
        'pageSize' => 5,
    ],
]);



$dataProvider = new SqlDataProvider1([
    'sql' => 'SELECT SUM(food.price) AS sumFromPrice
FROM order_food, food WHERE order_food.id_food = food.id_food
 AND order_food.id_order IN (SELECT `id_order` FROM `order` WHERE `date_order` = :date)',
    'params' => [':date'=>"2016-02-17"],
    'totalCount' => 20,
    'sort' => [
        'attributes' => [
            'sumFromPrice',
            'name' => [
                'asc' => ['first_name' => SORT_ASC, 'last_name' => SORT_ASC],
                'desc' => ['first_name' => SORT_DESC, 'last_name' => SORT_DESC],
                'default' => SORT_DESC,
                'label' => 'Name',
            ],
        ],
    ],
    'pagination' => [
        'pageSize' => 20,
    ],
]);

$dataProvider2 = new SqlDataProvider1([
    'sql' => 'SELECT order_food.id_order, food.name_food, food.id_food
FROM order_food, food
WHERE order_food.id_order
IN (

SELECT id_order
FROM (

	SELECT id_order
	FROM `order`
	GROUP BY id_order DESC
	LIMIT 5
) AS s
)
AND order_food.id_food = food.id_food
ORDER BY `order_food`.`id_order` ASC',
    'params' => [':date'=>"2016-02-17"],
    'totalCount' => 40,
    'sort' => [
        'attributes' => [
            'order_id',
            'name_food',
            'name' => [
                'asc' => ['first_name' => SORT_ASC, 'last_name' => SORT_ASC],
                'desc' => ['first_name' => SORT_DESC, 'last_name' => SORT_DESC],
                'default' => SORT_DESC,
                'label' => 'Name',
            ],
        ],
    ],
    'pagination' => [
        'pageSize' => 20,
    ],
]);


return $this->render('index',[
    'time' => date('H:i:s'),
    //'queryPopFood' =>$queryPopFood,
    'queryPopWaiter'=>$queryPopWaiter,
  'dataProvider' => $dataProvider,
    'dataProvider2' => $dataProvider2,
    'dataProvider3' => $dataProvider3,
    ]);
    }

}

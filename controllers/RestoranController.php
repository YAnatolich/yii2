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
use yii\data\ArrayDataProvider;

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
       
       $command = Yii::$app->db->createCommand( '
SELECT food.name_food, COUNT( food.name_food ) as cnt_food,
 order_food.id_food, order_food.id_order
FROM food 
 LEFT JOIN order_food ON order_food.id_food = food.id_food
GROUP BY food.name_food
ORDER BY COUNT( food.name_food ) DESC Limit 5' );
       
       
$models = $command->queryAll();

for ( $i = 0; $i < count( $models ); $i++ ) {
    $models[$i]['place'] = $i + 1;
}

$dataProvider3 = new ArrayDataProvider([
     'allModels' => $models,
    'sort' => [
        
        'attributes' => [
            'name_food',
            'id_food',
            'cnt_food',
            'matches' => [ 'default' => SORT_DESC ],
        ],
    ],
    'pagination' => [ 'pageSize' => 100 ],
 ]);
/*$dataProvider3 = new SqlDataProvider1([
    'sql' => 'SELECT food.name_food, food.id_food, order_food.id_order
 FROM food
 JOIN `order_food` ON order_food.id_food = food.id_food
',
    'params' => [':date'=>"2016-02-17"],
    'totalCount' =>120,
    'sort' => [
        'attributes' => [
            'name_food',
            'id_food',
            'id_order',
            
        ],
    ],
    'pagination' => [
        'pageSize' => 20,
    ],
]);

*/

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
    'sql' => 'SELECT food.name_food, COUNT( food.name_food ) as cnt_food,
 order_food.id_food, order_food.id_order
FROM food 
JOIN order_food ON order_food.id_food = food.id_food
GROUP BY food.name_food
ORDER BY  cnt_food DESC',
    
    'totalCount' => 40,
    'sort' => [
        'attributes' => [
            
            'name_food',
            'cnt_food',
            'id_food',
            
            'name' => [
                'asc' => ['first_name' => SORT_ASC, 'last_name' => SORT_ASC],
                'desc' => ['first_name' => SORT_DESC, 'last_name' => SORT_DESC],
                'default' => SORT_DESC,
                'label' => 'Name',
            ],
        ],
    ],
    'pagination' => [
        'pageSize' => 5,
    ],
]);


return $this->render('index',[
    'time' => date('H:i:s'),
    //'queryPopFood' =>$queryPopFood,
    'queryPopWaiter'=>$queryPopWaiter,
  'dataProvider' => $dataProvider,
    'dataProvider2' => $dataProvider2,
    'dataProvider3' => $dataProvider3,
    'command'=>$command,
    
    ]);
    }

}

<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\data\Pagination;

use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;

$this->title = 'Restoran';
$this->params['breadcrumbs'][] = $this->title;
/*$pagination = $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => 5,
        ]);*/


use yii\widgets\Pjax;

?>

<h1>restoran/index</h1>
<h2>Популярные блюда</h2>
<ul>
   <?= Html::a("Обновить", ['restoran/index'], ['class' => 'btn btn-lg btn-primary']) ?>

<?php Pjax::begin(); ?>

<h1>Сейчас: <?= $time ?></h1>
    
<!--?php 
$queryVar = $queryPopFood->all();
array_splice($queryVar,5);
foreach ($queryVar as $key): ?>
    <li>
        <!--?= Html::encode("{$key->name_food} ({$key->id_food})") ?>:
        <!--?= $key->cnt_food ?>
    </li>
<!--?php endforeach; ?>
</ul>

<h2>Сумма за выручки за день</h2>
<ul>
    
   
    
<!--?php 
$queryVar2 = array(0,1);
//array_splice($queryVar2,5);
foreach ($queryVar2 as $key):
    echo $key->sumFromPrice;


    
    ?>
    <li>
        <!--?= Html::encode("{$key->sumFromPrice} ({$key->id_order})") ?>:
        <!--?= $key->cnt_food ?>
    </li>
<!--?php endforeach; ?-->
<!--/ul-->
 <p>
        <?= GridView::widget([
        'dataProvider' => $dataProvider3,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'name_food',
            'cnt_food',
            'id_food',
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
        
    ]);
  
 
    ?> 
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'sumFromPrice',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        
    ]);
  
 
    ?>
     <?= GridView::widget([
        'dataProvider' => $dataProvider2,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'id_food',
            'name_food',
            'id_order',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        
    ]);
  
 
    ?>
<?php Pjax::end(); ?> 
<p>
    
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>

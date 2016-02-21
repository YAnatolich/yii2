<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\data\Pagination;

use yii\grid\GridView;
use yii\data\ActiveDataProvider;
$this->title = 'Restoran';
$this->params['breadcrumbs'][] = $this->title;
$pagination = $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => 20,
        ]);
?>

<h1>restoran/index</h1>
<ul>
    
    
<?php 
$query2 = $query1->all();
foreach ($query2 as $key): ?>
    <li>
        <?= Html::encode("{$key->name_food} ({$key->cnt_order})") ?>:
        <?= $key->cnt_order ?>
    </li>
<?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>
<?php

$dataProvider2 = new ActiveDataProvider([
    'query' => $query1,
    'pagination' => [
        'pageSize' => 20,
    ],
  
]);
echo GridView::widget([
    'dataProvider' => $dataProvider2,
]);
?>
<ul>
    
    
<?php 
$query4 = $query5->all();
foreach ($query4 as $key): ?>
    <li>
        <?= Html::encode("{$key->waiter_id} ({$key->cnt_order})") ?>:
        <?= $key->cnt_order ?>
    </li>
<?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>
<?php

$dataProvider = new ActiveDataProvider([
    'query' => $query5,
    'pagination' => [
        'pageSize' => 20,
    ],
]);
echo GridView::widget([
    'dataProvider' => $dataProvider,
]);
?>


    <p>
        <?= Html::a('Create Country', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
  
    
<p>
    
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>

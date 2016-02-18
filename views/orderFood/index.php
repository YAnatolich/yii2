<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderFoodSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Order Foods';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-food-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Order Food', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_order_food',
            'id_food',
            'id_order',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\OrderFood */

$this->title = $model->id_order_food;
$this->params['breadcrumbs'][] = ['label' => 'Order Foods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-food-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_order_food], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_order_food], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_order_food',
            'id_food',
            'id_order',
        ],
    ]) ?>

</div>

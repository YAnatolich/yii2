<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OrderFood */

$this->title = 'Update Order Food: ' . ' ' . $model->id_order_food;
$this->params['breadcrumbs'][] = ['label' => 'Order Foods', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_order_food, 'url' => ['view', 'id' => $model->id_order_food]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-food-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

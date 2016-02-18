<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\OrderFood */

$this->title = 'Create Order Food';
$this->params['breadcrumbs'][] = ['label' => 'Order Foods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-food-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

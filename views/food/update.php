<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Food */

$this->title = 'Update Food: ' . ' ' . $model->id_food;
$this->params['breadcrumbs'][] = ['label' => 'Foods', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_food, 'url' => ['view', 'id' => $model->id_food]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="food-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\data\Pagination;

use yii\grid\GridView;
use yii\data\ActiveDataProvider;
$this->title = 'Restoran';
$this->params['breadcrumbs'][] = $this->title;
/*$pagination = $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => 5,
        ]);*/
?>

<h1>restoran/index</h1>
<h2>Популярные блюда</h2>
<ul>
    
    
<?php 
$queryVar = $queryPopFood->all();
array_splice($queryVar,5);
foreach ($queryVar as $key): ?>
    <li>
        <?= Html::encode("{$key->name_food} ({$key->cnt_food})") ?>:
        <?= $key->cnt_food ?>
    </li>
<?php endforeach; ?>
</ul>

<h2>Сумма за выручки за день</h2>
<ul>
    
    
<?php 
$queryVar2 = $querySumMany->all();
//array_splice($queryVar2,5);
foreach ($queryVar2 as $key):
    echo $key->sumFromPrice;
    

    
    ?>
    <li>
        <!--?= Html::encode("{$key->sumFromPrice} ({$key->id_order})") ?>:
        <!--?= $key->cnt_food ?-->
    </li>
<?php endforeach; ?>
</ul>


<p>
    
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>

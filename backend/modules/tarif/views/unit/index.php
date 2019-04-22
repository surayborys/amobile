<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Единицы измерения/тарификации';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unit-index">
   

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать новую единицу измерения/тарификации', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

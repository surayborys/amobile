<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Офисы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="office-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить новый офис', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'city_id',
                'format' => 'html',
                'value' => function($office){
                    return  $office->city->title;
                }
            ],
            'address',
            'lat',
            'lng',
            //'work_hours',
            //'break_hours',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

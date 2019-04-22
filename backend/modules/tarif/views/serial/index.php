<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Serial;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Серии тарифов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="serial-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать новую серию тарифов', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            [
                'attribute' => 'status_active',
                'format' => 'html',
                'value' => function($serial){
                    return  $serial->status_active == Serial::SERIAL_STATUS_ACTIVE ? 'Активная' : 'Неактивная';
                }
            ],
            //'order_weight',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

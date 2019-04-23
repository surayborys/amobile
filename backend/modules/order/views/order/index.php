<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заявки на подключение';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'fullname',
            'phone_number',
            //'email:email',
            'mode',
            //'office_id',
            //'city',
            //'street',
            //'housing',
            //'house',
            //'apartment_office_num',
            'created_at',
            'performed_on',
            //'tarif_id',
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => function($order){
                    return  $order->status == \backend\models\Order::STATUS_NEW ? 'Новая' : 'Обработанная';
                }
            ],
            
            ['class' => 'yii\grid\ActionColumn','template'=>'{update} {view}'],
        ],
    ]); ?>


</div>

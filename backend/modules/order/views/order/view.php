<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Order */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Пометить как обработанную', ['update', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы собираетесь сменить статус заявки на обработанную. хотите продолжить?',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'fullname',
            'phone_number',
            'email:email',
            [
                'attribute' => 'mode',
                'format' => 'html',
                'value' => function($ord){
                    if($ord->mode == \backend\models\Order::MODE_COURIER) {
                        return 'Курьером';
                    }
                     if($ord->mode == \backend\models\Order::MODE_IN_OFFICE) {
                        return 'В офисе';
                    }
                     
                }
            ],
            'office_id',
            'city',
            'street',
            'housing',
            'house',
            'apartment_office_num',
            'created_at',
            'performed_on',
            [
                'attribute' => 'tarif_id',
                'format' => 'html',
                'value' => function($ord){
                    return \backend\models\Tarif::findOne(['id'=>$ord->tarif_id])->gen_title;
                }
            ],
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => function($ord){
                    return $ord->status == \backend\models\Order::STATUS_NEW ? 'Новая' : 'Обработанная';
                }
            ],
        ],
    ]) ?>

</div>

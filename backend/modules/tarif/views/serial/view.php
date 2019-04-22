<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Serial;

/* @var $this yii\web\View */
/* @var $model backend\models\Serial */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Serials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<a href="/admin/tarif/serial"><span class="glyphicon glyphicon-arrow-left"></span>вернуться к списку всех серий</a><br>
<a href="/admin/tarif/serial/update?id=<?=$model['id']?>"><span class="glyphicon glyphicon-pencil"></span>редактировать текущую серию</a>
<hr>

<div class="serial-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'title',
             [
                'attribute' => 'status_active',
                'format' => 'html',
                'value' => function($serial) {
                    return $serial->status_active == Serial::SERIAL_STATUS_ACTIVE ? 'Активная' : 'Неактивная';
                }
            ],
            'order_weight',
        ],
    ]) ?>

</div>

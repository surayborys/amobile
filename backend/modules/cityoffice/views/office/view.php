<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Office */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Offices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<a href="/admin/cityoffice/office"><span class="glyphicon glyphicon-arrow-left"></span>вернуться к списку всех офисов</a><br>
<a href="/admin/cityoffice/office/update?id=<?=$model['id']?>"><span class="glyphicon glyphicon-pencil"></span>редактировать текущий офис</a>
<hr>
<div class="office-view">

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
            'city_id',
            'address',
            'lat',
            'lng',
            'work_hours',
            'break_hours',
        ],
    ]) ?>

</div>

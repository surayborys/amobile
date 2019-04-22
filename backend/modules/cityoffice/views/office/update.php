<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Office */

$this->title = 'Редактировать офис с : ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Offices', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<a href="/admin/cityoffice/office"><span class="glyphicon glyphicon-arrow-left"></span>вернуться к списку всех офисов</a><br>
<hr>
<div class="office-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

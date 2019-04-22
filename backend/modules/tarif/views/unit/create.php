<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Unit */

$this->title = 'Создать единицу измерения';
$this->params['breadcrumbs'][] = ['label' => 'Units', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unit-create">
    <a href="/admin/tarif/unit"><span class="glyphicon glyphicon-arrow-left"></span>вернуться к списку всех единиц</a><br>


    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

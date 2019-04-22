<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Serial */

$this->title = 'Создать серию';
$this->params['breadcrumbs'][] = ['label' => 'Serials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="serial-create">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <a href="/admin/tarif/serial"><span class="glyphicon glyphicon-arrow-left"></span>вернуться к списку всех серий</a><br>
    <hr>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

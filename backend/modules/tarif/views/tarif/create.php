<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tarif */

$this->title = 'Создать тариф';
$this->params['breadcrumbs'][] = ['label' => 'Tarifs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tarif-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

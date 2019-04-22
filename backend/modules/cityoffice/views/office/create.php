<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Office */

$this->title = 'Добавить офис';
$this->params['breadcrumbs'][] = ['label' => 'Offices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<a href="/admin/cityoffice/office"><span class="glyphicon glyphicon-arrow-left"></span>вернуться к списку всех офисов</a><br>
<hr>
<div class="office-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

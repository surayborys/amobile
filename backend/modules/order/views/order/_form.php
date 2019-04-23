<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Order;

/* @var $this yii\web\View */
/* @var $model backend\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status')->dropDownList([
        Order::STATUS_NEW => 'Необработанная',
        Order::STATUS_PERFORMED => 'Обработанная'
    ])->hint('Для смены статуса заявки выберите статус "Обработанная в списке"') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

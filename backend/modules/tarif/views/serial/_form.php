<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Serial */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="serial-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_active')->dropDownList([$model::SERIAL_STATUS_ACTIVE=>'Активная', $model::SERIAL_STATUS_UNACTIVE=>'Неактивная']) ?>

    <?= $form->field($model, 'order_weight')->dropDownList([0, 10, 20, 30, 40, 50 ,70, 100])->hint('установаите 0, если не требуется специальных условий для отображения') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

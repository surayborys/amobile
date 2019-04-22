<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\City;

/* @var $this yii\web\View */
/* @var $model backend\models\Office */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="office-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'city_id')->dropDownList(yii\helpers\ArrayHelper::map(City::find()->all(), 'id', 'title')) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true])->hint('Введите адрес, например, пр. Аиааира, д. 55') ?>

    <?= $form->field($model, 'lat')->textInput()->hint('Введите координату широты в формате 00.0000') ?>

    <?= $form->field($model, 'lng')->textInput()->hint('Введите координату долготы в формате 00.0000') ?>

    <?= $form->field($model, 'work_hours')->textInput(['maxlength' => true])->hint('Пример: с 9:00 до 18:00') ?>

    <?= $form->field($model, 'break_hours')->textInput(['maxlength' => true])->hint('Пример: с 12:00 до 13:00') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

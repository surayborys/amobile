<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Serial;
use backend\models\Unit;

/* @var $this yii\web\View */
/* @var $model backend\models\Tarif */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tarif-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'gen_title')->textInput(['maxlength' => true])->hint('Введите название тарифа') ?>

    <?= $form->field($model, 'gen_serial_id')->dropDownList(ArrayHelper::map(Serial::find()->all(), 'id', 'title')) ?>

    <?= $form->field($model, 'gen_4g_optimal')->dropDownList([$model::TARIF_4G=>'Да', $model::TARIF_NO_OPTIMAL_VAL=>'Нет']) ?>

    <?= $form->field($model, 'gen_calls_optimal')->dropDownList([$model::TARIF_OPTIMAL_FOR_CALLS=>'Да', $model::TARIF_NO_OPTIMAL_VAL=>'Нет']) ?>

    <?= $form->field($model, 'gen_short_desc')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'gen_advantage_1_bold')->textInput(['maxlength' => true])->hint('Не более 1-3 слов из контекста') ?>

    <?= $form->field($model, 'gen_advantage_1_desc')->textInput(['maxlength' => true])->hint('...продолжайте описание по контесту') ?>

    <?= $form->field($model, 'gen_advantage_2_bold')->textInput(['maxlength' => true])->hint('Не более 1-3 слов из контекста') ?>

    <?= $form->field($model, 'gen_advantage_2_desc')->textInput(['maxlength' => true])->hint('...продолжайте описание по контесту')  ?>

    <?= $form->field($model, 'gen_advantage_3_bold')->textInput(['maxlength' => true])->hint('Не более 1-3 слов из контекста') ?>

    <?= $form->field($model, 'gen_advantage_3_desc')->textInput(['maxlength' => true])->hint('...продолжайте описание по контесту') ?>

    <?= $form->field($model, 'gen_cost_val')->textInput() ?>

    <?= $form->field($model, 'gen_cost_UM_id')->dropDownList(ArrayHelper::map(Unit::find()->all(), 'id', 'title'), ['prompt' => '--не устанавливать--']) ?>

    <?= $form->field($model, 'cond_full_cost')->textInput() ?>

    <?= $form->field($model, 'cond_full_cost_UM_id')->dropDownList(ArrayHelper::map(Unit::find()->all(), 'id', 'title'), ['prompt' => '--не устанавливать--'])?>

    <?= $form->field($model, 'cond_connect_cost')->textInput() ?>

    <?= $form->field($model, 'cond_connect_cost_UM_id')->dropDownList(ArrayHelper::map(Unit::find()->all(), 'id', 'title'), ['prompt' => '--не устанавливать--']) ?>

    <?= $form->field($model, 'inc_minutes_sms_abhasia')->textInput() ?>

    <?= $form->field($model, 'inc_minutes_sms_abhasia_UM_id')->dropDownList(ArrayHelper::map(Unit::find()->all(), 'id', 'title'), ['prompt' => '--не устанавливать--']) ?>

    <?= $form->field($model, 'inc_minutes_amobile')->textInput() ?>

    <?= $form->field($model, 'inc_minutes_amobile_UM_id')->dropDownList(ArrayHelper::map(Unit::find()->all(), 'id', 'title'), ['prompt' => '--не устанавливать--']) ?>

    <?= $form->field($model, 'inc_minutes_stationar')->textInput() ?>

    <?= $form->field($model, 'inc_minutes_stationar_UM_id')->dropDownList(ArrayHelper::map(Unit::find()->all(), 'id', 'title'), ['prompt' => '--не устанавливать--']) ?>

    <?= $form->field($model, 'inc_minutes_inernational')->textInput() ?>

    <?= $form->field($model, 'inc_minutes_inernational_UM_id')->dropDownList(ArrayHelper::map(Unit::find()->all(), 'id', 'title'), ['prompt' => '--не устанавливать--'])?>

    <?= $form->field($model, 'inc_prepaid_minutes_sms')->textInput() ?>

    <?= $form->field($model, 'inc_prepaid_minutes_sms_UM_id')->dropDownList(ArrayHelper::map(Unit::find()->all(), 'id', 'title'), ['prompt' => '--не устанавливать--'])?>

    <?= $form->field($model, 'inc_prepaid_internet')->textInput() ?>

    <?= $form->field($model, 'inc_prepaid_internet_UM_id')->dropDownList(ArrayHelper::map(Unit::find()->all(), 'id', 'title'), ['prompt' => '--не устанавливать--'])?>

    <?= $form->field($model, 'inc_prepaid_international')->textInput() ?>

    <?= $form->field($model, 'inc_prepaid_international_UM_id')->dropDownList(ArrayHelper::map(Unit::find()->all(), 'id', 'title'), ['prompt' => '--не устанавливать--'])?>

    <?= $form->field($model, 'internet_traffic_cost')->textInput() ?>

    <?= $form->field($model, 'internet_traffic_cost_UM_id')->dropDownList(ArrayHelper::map(Unit::find()->all(), 'id', 'title'), ['prompt' => '--не устанавливать--']) ?>

    <?= $form->field($model, 'sms_out_cost')->textInput() ?>

    <?= $form->field($model, 'sms_cost_UM_id')->dropDownList(ArrayHelper::map(Unit::find()->all(), 'id', 'title'), ['prompt' => '--не устанавливать--']) ?>

    <?= $form->field($model, 'sms_in_cost')->textInput() ?>

    <?= $form->field($model, 'videocall_in_cost')->textInput() ?>

    <?= $form->field($model, 'videocall_cost_UM_id')->dropDownList(ArrayHelper::map(Unit::find()->all(), 'id', 'title'), ['prompt' => '--не устанавливать--']) ?>

    <?= $form->field($model, 'videocall_out_cost')->textInput() ?>

    <?= $form->field($model, 'overpaid_call_amobile')->textInput() ?>

    <?= $form->field($model, 'overpaid_call_UM_id')->dropDownList(ArrayHelper::map(Unit::find()->all(), 'id', 'title'), ['prompt' => '--не устанавливать--']) ?>

    <?= $form->field($model, 'overpaid_call_abhasia')->textInput() ?>

    <?= $form->field($model, 'overpaid_call_international')->textInput() ?>

    <?= $form->field($model, 'overpaid_call_corporate')->textInput() ?>

    <?= $form->field($model, 'inter_russia_call')->textInput() ?>

    <?= $form->field($model, 'inter_call_UM_id')->dropDownList(ArrayHelper::map(Unit::find()->all(), 'id', 'title'), ['prompt' => '--не устанавливать--'])?>

    <?= $form->field($model, 'inter_CIS_turkey_baltic')->textInput() ?>

    <?= $form->field($model, 'inter_europe')->textInput() ?>

    <?= $form->field($model, 'inter_usa_canada')->textInput() ?>

    <?= $form->field($model, 'inter_rest_countries')->textInput() ?>

    <?= $form->field($model, 'astericsed1_desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'astericsed2_desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'astericsed3_desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'astericsed4_desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->dropDownList([$model::TARIF_STATUS_ACTIVE=>'Актививный тариф', $model::TARIF_STATUS_NON_ACTIVE => 'Неактивный тариф']) ?>

    <?= $form->field($model, 'inc_internet')->textInput() ?>

    <?= $form->field($model, 'inc_internet_UM_id')->dropDownList(ArrayHelper::map(Unit::find()->all(), 'id', 'title'), ['prompt' => '--не устанавливать--']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

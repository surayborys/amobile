<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tarif */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tarifs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tarif-view">

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
            'gen_title',
            'gen_serial_id',
            'gen_4g_optimal',
            'gen_calls_optimal',
            'gen_short_desc',
            'gen_advantage_1_bold',
            'gen_advantage_1_desc',
            'gen_advantage_2_bold',
            'gen_advantage_2_desc',
            'gen_advantage_3_bold',
            'gen_advantage_3_desc',
            'gen_cost_val',
            'gen_cost_UM_id',
            'cond_full_cost',
            'cond_full_cost_UM_id',
            'cond_connect_cost',
            'cond_connect_cost_UM_id',
            'inc_minutes_sms_abhasia',
            'inc_minutes_sms_abhasia_UM_id',
            'inc_minutes_amobile',
            'inc_minutes_amobile_UM_id',
            'inc_minutes_stationar',
            'inc_minutes_stationar_UM_id',
            'inc_minutes_inernational',
            'inc_minutes_inernational_UM_id',
            'inc_prepaid_minutes_sms',
            'inc_prepaid_minutes_sms_UM_id',
            'inc_prepaid_internet',
            'inc_prepaid_internet_UM_id',
            'inc_prepaid_international',
            'inc_prepaid_international_UM_id',
            'internet_traffic_cost',
            'internet_traffic_cost_UM_id',
            'sms_out_cost',
            'sms_cost_UM_id',
            'sms_in_cost',
            'videocall_in_cost',
            'videocall_cost_UM_id',
            'videocall_out_cost',
            'overpaid_call_amobile',
            'overpaid_call_UM_id',
            'overpaid_call_abhasia',
            'overpaid_call_international',
            'overpaid_call_corporate',
            'inter_russia_call',
            'inter_call_UM_id',
            'inter_CIS_turkey_baltic',
            'inter_europe',
            'inter_usa_canada',
            'inter_rest_countries',
            'astericsed1_desc:ntext',
            'astericsed2_desc:ntext',
            'astericsed3_desc:ntext',
            'astericsed4_desc:ntext',
            'status',
            'inc_internet',
            'inc_internet_UM_id',
        ],
    ]) ?>

</div>

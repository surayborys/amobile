<?php
use backend\widgets\singleTarif\SingleTarif;

/* @var $this yii\web\View */
/* @var $model asArray(backend\models\Tarif) */

$this->title = $model['gen_title'];
$this->params['breadcrumbs'][] = ['label' => 'Tarifs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tarif-view">
    <a href="/admin/tarif/tarif"><span class="glyphicon glyphicon-arrow-left"></span>вернуться к списку всех тарифов</a><br>
    <a href="/admin/tarif/tarif/update?id=<?=$model['id']?>"><span class="glyphicon glyphicon-pencil"></span>редактировать текущий тариф</a>
    <hr>
    <?= SingleTarif::widget(['tarif' => $model])?>
</div>

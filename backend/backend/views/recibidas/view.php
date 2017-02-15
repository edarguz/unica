<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Recibidas */

$this->title = $model->id_recibidas;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recibidas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recibidas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_recibidas], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_recibidas], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_recibidas',
            'fecha',
            'consecutivo',
            'entidad',
            'persona',
            'fecha_doc',
            'asunto:ntext',
            'anexos',
            'id_proceso',
            'id_funcionario',
            'id_serie',
            'id_subserie',
            'id_tipo_doc',
            'archivado_TRD',
            'documento',
            'archivo',
            'firma',
        ],
    ]) ?>

</div>

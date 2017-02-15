<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Despachada */

$this->title = $model->id_despachada;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Despachadas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="despachada-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_despachada], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_despachada], [
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
          'id_despachada',
            'fecha_envio',
            'consecutivo',
            'id_proceso',
            'entidad',
            'persona',
            'asunto:ntext',
            'anexos',
            'devolucion',
            'fecha_recibo',
            'firma',
        ],
    ]) ?>

</div>

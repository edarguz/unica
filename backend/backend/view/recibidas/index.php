<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\RecibidasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Recibidas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recibidas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Recibidas'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_recibidas',
            'fecha',
            'entidad',
            'persona',
            'fecha_doc',
            // 'asunto:ntext',
            // 'anexos',
            // 'id_proceso',
            // 'id_funcionario',
            // 'id_serie',
            // 'id_subserie',
            // 'id_tipo_doc',
            // 'archivado_TRD',
            // 'documento',
            // 'firma',
            // 'archivo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Recibidas */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Recibidas',
]) . $model->id_recibidas;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recibidas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_recibidas, 'url' => ['view', 'id' => $model->id_recibidas]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="recibidas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

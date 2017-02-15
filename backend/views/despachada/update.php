<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Despachada */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Despachada',
]) . $model->id_despachada;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Despachadas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_despachada, 'url' => ['view', 'id' => $model->id_despachada]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="despachada-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

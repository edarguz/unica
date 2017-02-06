<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Serie */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Serie',
]) . $model->id_serie;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Series'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_serie, 'url' => ['view', 'id' => $model->id_serie]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="serie-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

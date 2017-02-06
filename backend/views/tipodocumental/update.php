<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tipodocumental */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Tipodocumental',
]) . $model->id_tipodocumental;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipodocumentals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tipodocumental, 'url' => ['view', 'id' => $model->id_tipodocumental]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tipodocumental-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

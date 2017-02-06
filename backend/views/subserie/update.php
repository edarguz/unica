<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Subserie */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Subserie',
]) . $model->id_subserie;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Subseries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_subserie, 'url' => ['view', 'id' => $model->id_subserie]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="subserie-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

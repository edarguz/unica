<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\TipodocumentalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipodocumental-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_tipodocumental') ?>

    <?= $form->field($model, 'codigo') ?>

    <?= $form->field($model, 'tipodocumental') ?>

    <?= $form->field($model, 'id_subserie') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

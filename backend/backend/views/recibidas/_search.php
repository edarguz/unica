<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\RecibidasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recibidas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_recibidas') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'consecutivo') ?>

    <?= $form->field($model, 'entidad') ?>

    <?= $form->field($model, 'persona') ?>

    <?php // echo $form->field($model, 'fecha_doc') ?>

    <?php // echo $form->field($model, 'asunto') ?>

    <?php // echo $form->field($model, 'anexos') ?>

    <?php // echo $form->field($model, 'id_proceso') ?>

    <?php // echo $form->field($model, 'id_funcionario') ?>

    <?php // echo $form->field($model, 'id_serie') ?>

    <?php // echo $form->field($model, 'id_subserie') ?>

    <?php // echo $form->field($model, 'id_tipo_doc') ?>

    <?php // echo $form->field($model, 'archivado_TRD') ?>

    <?php // echo $form->field($model, 'documento') ?>

    <?php // echo $form->field($model, 'archivo') ?>

    <?php // echo $form->field($model, 'firma') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

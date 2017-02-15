<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Recibidas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recibidas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_recibidas')->textInput() ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'consecutivo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'entidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'persona')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_doc')->textInput() ?>

    <?= $form->field($model, 'asunto')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'anexos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_proceso')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_funcionario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_serie')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_subserie')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_tipo_doc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'archivado_TRD')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'documento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'archivo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'firma')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

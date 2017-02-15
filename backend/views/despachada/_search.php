<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\DespachadaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="despachada-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_despachada') ?>

    <?= $form->field($model, 'fecha_envio') ?>

    <?= $form->field($model, 'consecutivo') ?>

    <?= $form->field($model, 'id_proceso') ?>

    <?= $form->field($model, 'entidad') ?>

    <?php // echo $form->field($model, 'persona') ?>

    <?php // echo $form->field($model, 'asunto') ?>

    <?php // echo $form->field($model, 'anexos') ?>

    <?php // echo $form->field($model, 'devolucion') ?>

    <?php // echo $form->field($model, 'fecha_recibo') ?>

    <?php // echo $form->field($model, 'firma') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

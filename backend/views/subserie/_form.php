<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2; 
use yii\helpers\ArrayHelper;
use backend\models\Serie;

/* @var $this yii\web\View */
/* @var $model app\models\Subserie */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subserie-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subserie')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_serie')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Serie::find()->all(), 'id_serie',
        'serie'),         'language' => 'es',         'options' => ['placeholder'
        => 'Seleccione serie...'],         'pluginOptions' => [
        'allowClear' => true         ],     ]);
   
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2; 
use yii\helpers\ArrayHelper;
use backend\models\Subserie;

/* @var $this yii\web\View */
/* @var $model app\models\Tipodocumental */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipodocumental-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipodocumental')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_subserie')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Subserie::find()->all(), 'id_subserie',
        'subserie'),         'language' => 'es',         'options' => ['placeholder'
        => 'Seleccione subserie...'],         'pluginOptions' => [
        'allowClear' => true         ],     ]);
   
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

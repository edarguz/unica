<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Funcionario;
use backend\models\Proceso;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2; 
use kartik\date\DatePicker;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Proceso */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proceso-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'proceso')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_funcionario', ['labelOptions'=>['style'=>'color:green']] )->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Funcionario::find()->all(), 'id_funcionario', 'nombres'),
        'language' => 'es',
        'pluginOptions' => ['highlight'=>true],
        'options' => ['placeholder' => 'Seleccione funcionario...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
   
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Guardar') : Yii::t('app', 'Actuzalizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

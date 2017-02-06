<?php

use yii\helpers\Html;
use kartik\builder\Form;
use kartik\widgets\ActiveForm;
use kartik\builder\FormGrid;
use backend\models\Funcionario;
use backend\models\Serie;
use backend\models\Subserie;
use backend\models\Tipodocumental;
use backend\models\Proceso;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2; 
use kartik\date\DatePicker;
use yii\bootstrap\Modal;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Recibidas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recibidas-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>



    <div class="form">

    <div class="panel panel-primary">

    <div class="panel-heading"><h4><i class="glyphicon glyphicon-list-alt"> </i> Ingreso de comunicaciones recibidas Unimayor </h4></div>

     <div class="panel-body">



    <?= FormGrid::widget(
    [
        'model'=>$model,
        'form'=>$form,
        'autoGenerateColumns'=>true,
       
       'rows'=>[

               [
               
               'contentBefore'=>'<legend class="text-info"><small>Comunicaciones recibidads Unidad de correspondencia</small></legend>',
                
                'attributes'=> [ 

                    'entidad'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Nombre entidad...']],

                    'persona'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Nombre persona...']],
                   
                    'fecha_doc'=>['type'=>Form::INPUT_WIDGET, 'widgetClass'=>'\kartik\widgets\DatePicker', 
                      'options' => [ 'pluginOptions' => [
                            'format' => 'yyyy-mm-dd',
                            'todayHighlight' => true, 
                            'autoclose'=>true,],],


                    ],             

                   
                    ]

                ],

                [
                'attributes'=>[
                    'asunto'=>['type'=>Form::INPUT_TEXTAREA, 'options'=>['placeholder'=>'Asunto...']],
                    
                    
                ]
                ],  


                [
                
                
                'attributes'=> [ 


                    'id_funcionario' => [
                                    'type'=>Form::INPUT_WIDGET, 
                                    'widgetClass'=>'kartik\select2\Select2',
                                    'options' => [
                                                    'data' => ArrayHelper::map(Funcionario::find()->asArray()->all(), 'id_funcionario', 'nombres'),
                                                    'options' => ['placeholder' => Yii::t('app','Seleccione funcionario')],
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                ],

                    ],

                    'anexos'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Anexos...']],
                    
                    'id_proceso' => [
                                    'type'=>Form::INPUT_WIDGET, 
                                    'widgetClass'=>'kartik\select2\Select2',
                                    'options' => [
                                                    'data' => ArrayHelper::map(Proceso::find()->asArray()->all(), 'id_proceso', 'proceso'),
                                                    'options' => ['placeholder' => Yii::t('app','Seleccione proceso')],
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                ],

                    ],
                   
                    ]
                ],  

                [

                'contentBefore'=>'<legend class="text-info"><small>Tablas de retención documental</small></legend>',
                                
                'attributes'=> [ 

               
                    'id_serie' => [
                                    'type'=>Form::INPUT_WIDGET, 
                                    'widgetClass'=>'kartik\select2\Select2',
                                    'options' => [
                                                    'data' => ArrayHelper::map(Serie::find()->asArray()->all(), 'id_serie', 'serie'),
                                                    'options' => ['placeholder' => Yii::t('app','Seleccione serie')],
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                ],

                    ],

                    'id_subserie' => [
                                    'type'=>Form::INPUT_WIDGET, 
                                    'widgetClass'=>'kartik\select2\Select2',
                                    'options' => [
                                                    'data' => ArrayHelper::map(Subserie::find()->asArray()->all(), 'id_subserie', 'subserie'),
                                                    'options' => ['placeholder' => Yii::t('app','Seleccione subserie')],
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                ],

                    ],
                    
                    'id_tipo_doc' => [
                                    'type'=>Form::INPUT_WIDGET, 
                                    'widgetClass'=>'kartik\select2\Select2',
                                    'options' => [
                                                    'data' => ArrayHelper::map(Tipodocumental::find()->asArray()->all(), 'id_tipodocumental', 'tipodocumental'),
                                                    'options' => ['placeholder' => Yii::t('app','Seleccione tipo documental')],
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                ],

                    ],
                   
                    ]
                ],  


                [
                'attributes'=>[
                    
                    'documento'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Nombre del documento...']],

                    'file'=>[
                        'type'=>Form::INPUT_WIDGET,
                        'widgetClass'=>'\kartik\widgets\FileInput',
                        'options' => [
                        'options'=>['accept'=>'text/pdf'],
                        'language' => 'es',
                        'pluginOptions'=>[
                        'allowedFileExtensions'=>['pdf'],
                        'showUpload' => false,
                        'browseLabel' => '',
                        'removeLabel' => '',
                        'showPreview' => false,
                        ]
                        ],
                        'hint'=>'Seleccione archivo PDF'
                    ],

                    //'firma'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Firma...']],




                    
                ]
                ],  



      ],
     
    ]); ?>

   
   

     </div>
     </div>
      </div>
       </div>

   
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Guardar') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

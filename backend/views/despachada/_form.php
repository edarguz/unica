<?php


use yii\helpers\Html;
use kartik\builder\Form;
use kartik\widgets\ActiveForm;
use kartik\builder\FormGrid;
use backend\models\Funcionario;
use backend\models\proceso;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2; 
use kartik\date\DatePicker;
use yii\bootstrap\Modal;


/* @var $this yii\web\View */
/* @var $model backend\models\Despachada */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="despachada-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>



    <div class="form">

    <div class="panel panel-primary">

    <div class="panel-heading"><h4><i class="glyphicon glyphicon-briefcase"> </i> Ingreso de comunicaciones despachadas Unimayor </h4></div>

     <div class="panel-body">



    <?= FormGrid::widget(
    [
        'model'=>$model,
        'form'=>$form,
        'autoGenerateColumns'=>true,
       
       'rows'=>[

               [
               
               'contentBefore'=>'<legend class="text-info"><small>Comunicaciones despachadas Unidad de correspondencia</small></legend>',
                
                'attributes'=> [ 

                                  
                    'fecha_envio'=>['type'=>Form::INPUT_WIDGET, 'widgetClass'=>'\kartik\widgets\DatePicker', 
                      'options' => [ 'pluginOptions' => [
                            'format' => 'yyyy-mm-dd',
                            'todayHighlight' => true, 
                            'autoclose'=>true,],],


                    ],  

                    'consecutivo'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Número consecutivo...']],

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

                'attributes'=>[

                    'entidad'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Nombre entidad...']],

                    'persona'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Nombre persona...']],
                    
                                      
                    
                    ]

                ],  


                 [

                'attributes'=>[

                                        
                    'asunto'=>['type'=>Form::INPUT_TEXTAREA, 'options'=>['placeholder'=>'Asunto...']],
                    
                    
                    ]

                ],  


                [
                                
                'attributes'=> [ 

                    'anexos'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'anexos ...']],
                   
                    'devolucion'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'devolución ...']],
                    
                     'fecha_recibo'=>['type'=>Form::INPUT_WIDGET, 'widgetClass'=>'\kartik\widgets\DatePicker', 
                      'options' => [ 'pluginOptions' => [
                            'format' => 'yyyy-mm-dd',
                            'todayHighlight' => true, 
                            'autoclose'=>true,],],


                    ],  
                   
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

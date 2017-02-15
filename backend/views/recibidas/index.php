<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use backend\models\Funcionario;
use yii\bootstrap\Collapse;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\RecibidasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


//$this->title = Yii::t('app', 'Recibidas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recibidas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

     <p>
        <?= Html::a(Yii::t('app', '<i class="glyphicon glyphicon-plus"></i>'), ['create'], ['class' => 'btn btn-success'])
                

                 . ' '.
            Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['class' => 'btn btn-warning', 'title'=>Yii::t('app', 'Resetear Grid')])


         ?>
    </p>
<?php Pjax::begin(); ?>    

  <?= GridView::widget([
    'dataProvider'=>$dataProvider,
    'filterModel'=>$searchModel,
    //'showPageSummary'=>true,
    'pjax'=>true,
    'striped'=>true,
    'condensed'=>true,
    'responsive'=>true,
    'responsiveWrap'=>true,
    'resizableColumns'=>true,
    'hover'=>true,

      'toolbar' =>  [
        // ['content'=>
        //     Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button', 'title'=>Yii::t('app', 'Agregar programa'), 
        //         'class'=>'btn btn-success',
        //         'id' => 'activity-index-link',
        //         'data-toggle' => 'modal',
        //         'data-target' => '#modal',
        //         'data-url' => Url::to(['create']),
        //         'data-pjax' => '0',

        //         ]) . ' '.
        //     Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['class' => 'btn btn-warning', 'title'=>Yii::t('app', 'Resetear Grid')]),
        // 'footer'=>false
        // ],

        '{export}',
        '{toggleData}'
    ],
    
    'panel' => [
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-paperclip"></i>     Comunicaciones recibidas</h3>',
        'type'=>'primary',
        // 'before'=> Html::a('<i class="glyphicon glyphicon-plus"></i>', '#', [
        //     'id' => 'activity-index-link',
        //     'class' => 'btn btn-success',  
        //     'data-toggle' => 'modal',
        //     'data-target' => '#modal',
        //     'data-url' => Url::to(['create']),
        //     'data-pjax' => '0',
        // ]),

        // 'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['class' => 'btn btn-warning']),
        // 'footer'=>false
    ],
    'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
    'headerRowOptions'=>['class'=>'kartik-sheet-style'],
    'filterRowOptions'=>['class'=>'kartik-sheet-style'],

        'columns' => [
            ['class'=>'kartik\grid\SerialColumn'],

            [
                'attribute' => 'fecha',
                'format'=>'raw',
                'headerOptions' => ['style'=>'text-align:center'],
                'width'=>'100px',
                'vAlign'=>'middle',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'fecha',
                    'options' => ['placeholder' => 'Fecha radicación'],
                    'pluginOptions' => [
                        'id' => 'fecha2',
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd',
                        'startView' => 'year',
                    ]
                ])
            ],
            'consecutivo',
            'entidad',
            'persona',
           
            [
                'attribute' => 'fecha_doc',
                'format'=>'raw',
                'headerOptions' => ['style'=>'text-align:center'],
                'width'=>'100px',
                'vAlign'=>'middle',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'fecha_doc',
                    'options' => ['placeholder' => ''],
                    'pluginOptions' => [
                        'id' => 'fecha2',
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd',
                        'startView' => 'year',
                    ]
                ])
            ],
            'asunto:ntext',
            'anexos',
            'id_proceso',
            [
                'attribute' => 'id_funcionario',
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
                'hAlign'=>'right',
                
               
            ],
            //'id_serie',
            //'id_subserie',
            //'id_tipo_doc',
            'archivado_TRD',
            'documento',
            

            [
              'attribute' => 'archivo',
              'format' => 'raw',
              'value' => function ($model) {   
                     if ($model->image_web_filename!='')
                     return '<img src="'.Yii::$app->homeUrl. '/uploads/status/'.$model->image_web_filename.'" width="50px" height="auto">'; else return 'no image';
                  },
            ],

            ['class' => 'kartik\grid\ActionColumn',
                          'header' => 'Acciones',
                          'template' => '{update}{delete}',
                          
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>

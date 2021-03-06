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
/* @var $searchModel app\models\search\ProcesoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Procesos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proceso-index">

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
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon glyphicon-cog"></i> Procesos</h3>',
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
            
                'attribute' => 'proceso',
                'format'=>'raw',
                'width'=>'200px',
                'vAlign'=>'middle',
                'hAlign'=>'left',
               
               
            ],


            [
                'attribute' => 'id_funcionario',
                'filter'=>Funcionario::get_funcionarioName(), 
                'value'=> 'funcionario.fullName',
                'format'=>'raw',
                'width'=>'200px',
                'vAlign'=>'middle',
                'hAlign'=>'left',
               
               
            ],

            ['class' => 'kartik\grid\ActionColumn',
                          'header' => 'Acciones',
                          'template' => '{update}{delete}',
                          
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>

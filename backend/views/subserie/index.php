<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use backend\models\Serie;
use yii\bootstrap\Collapse;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SubserieSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Subseries documentales');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subserie-index">

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

    'panel' => [
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon glyphicon-pushpin"></i> Subserie documental Unimayor</h3>',
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
        'columns' => [
            ['class'=>'kartik\grid\SerialColumn'],

            //'id_subserie',
           
            [
                'attribute' => 'codigo',
                'format'=>'raw',
                'width'=>'200px',
                'vAlign'=>'middle',
                'hAlign'=>'left',
            ],

            [
                'attribute' => 'subserie',
                'format'=>'raw',
                'width'=>'200px',
                'vAlign'=>'middle',
                'hAlign'=>'left',
            ],

            [
                'attribute' => 'id_serie',
                //'filter'=>Funcionario::get_funcionarioName(), 
                'value'=> 'serie.serie',
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

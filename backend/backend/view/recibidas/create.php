<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Recibidas */

$this->title = Yii::t('app', 'Create Recibidas');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recibidas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recibidas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

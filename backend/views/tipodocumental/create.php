<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tipodocumental */

$this->title = Yii::t('app', 'Create Tipodocumental');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipodocumentals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipodocumental-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

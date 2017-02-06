<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Subserie */

$this->title = Yii::t('app', 'Create Subserie');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Subseries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subserie-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

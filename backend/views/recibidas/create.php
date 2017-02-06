<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Recibidas */

$this->title = Yii::t('app', 'Nueva comunicación recibida');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recibidas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recibidas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

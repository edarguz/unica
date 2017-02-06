<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '.\images\cmc.png',
        'brandLabel' => 'Unidad de correspondencia Unimayor v1.0',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Inicio', 'url' => ['/site/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {


         $menuItems[]=['label' =>'Tablas de retención',
                    'items' => [
                        ['label' => 'Series', 'url' => ['/serie']],
                        ['label' => 'Subseries', 'url' => ['/subserie']],
                        ['label' => 'Tipos documentales', 'url' => ['/tipodocumental']],
                       
                        ],
                ];

                $menuItems[]=['label' =>'Recursos humanos',
                    'items' => [
                        ['label' => 'Procesos', 'url' => ['/proceso']],
                        ['label' => 'Funcionarios', 'url' => ['/funcionario']],
                                              
                        ],
                ];

                $menuItems[]=['label' =>'Unidad de correspondencia',
                                    'items' => [
                                        ['label' => 'Comunicaciones recibidas', 'url' => ['/recibidas']],
                                        ['label' => 'Comunicaciones despachadas', 'url' => ['/despachadas']],
                                                              
                                        ],
                ];


        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left"><img src ="/unica/images/cmc.png"> Institución Universitaria Colegio Mayor del Cauca <?= date('Y') ?></p>
        <p class="pull-right">Powered: edarguz</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

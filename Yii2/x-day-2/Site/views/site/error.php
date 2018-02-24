<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */

/* @var $exception Exception */

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error" style="
">

    <?php
    NavBar::begin([
        'brandLabel' => "Клиника",
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [

            Yii::$app->user->identity->isAdmin ? (

            ['label' => 'Админ панель', 'url' => ['/admin']]) :

            ['label' => 'Главная', 'url' => ['/site/index']],
            ['label' => 'О нас', 'url' => ['/site/index#about']],
            ['label' => 'Услуги', 'url' => ['/site/index#service']],
            ['label' => 'Сотрудники', 'url' => ['/site/index#team']],
            ['label' => 'Регистрация', 'url' => ['/auth/signup']],

            Yii::$app->user->isGuest ? (
            ['label' => 'Войти', 'url' => ['/auth/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/auth/logout'], 'post')
                . Html::submitButton('Выйти  (' . Yii::$app->user->identity->name . ')', ['class' => 'btn btn-link logout'])
                . Html::endForm()
                . '</li>'

            ),

            !Yii::$app->user->identity->isAdmin && !Yii::$app->user->isGuest ? (
                '<li>'
                . Html::beginForm(['/users'], 'post')
                . Html::submitButton('Личный кабинет', ['class' => 'btn btn-link logout'])
                . Html::endForm()
                . '</li>'
            ) : (
            ''
            ),

        ],
    ]);
    NavBar::end();
    ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        The above error occurred while the Web server was processing your request.
    </p>
    <p>
        Please contact us if you think this is a server error. Thank you.
    </p>

</div>

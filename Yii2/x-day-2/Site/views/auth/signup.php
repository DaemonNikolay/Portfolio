<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>

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

        Yii::$app->user->identity->isAdmin ? (['label' => 'Админ панель', 'url' => ['/admin']]) : (''),

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

<div class="site-login">


    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>


    <h1><?= Html::encode($this->title) ?></h1>

    <p>Заполните все поля для регистрации на сайте.</p>

    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'surname')->textInput() ?>

    <?= $form->field($model, 'patronymic')->textInput() ?>

    <?= $form->field($model, 'email')->textInput() ?>

    <?= $form->field($model, 'password')->passwordInput() ?>


    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>

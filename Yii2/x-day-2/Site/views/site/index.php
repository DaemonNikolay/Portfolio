<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

$this->title = 'Клиника';
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
        ['label' => 'О нас', 'url' => ['#about']],
        ['label' => 'Услуги', 'url' => ['#service']],
        ['label' => 'Сотрудники', 'url' => ['#team']],
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

<section class="slider" id="home">
    <div class="container-fluid">
        <div class="row">
            <div id="carouselHacked" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="header-backup"></div>
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="../web/public/img/slide-one.jpg" alt="">
                        <div class="carousel-caption">

<!--                            <p>Здоровье - это всё!</p>-->
                            <img class="logo" src="/web/public/img/logo.png" />
                            <h1>Клиника</h1>
                            <p>Морозовой</p>
<!--                            <button class="moreDetailed">Подробнее</button>-->
                        </div>
                    </div>
                    <div class="item">
                        <img src="../web/public/img/slide-two.jpg" alt="">
                        <div class="carousel-caption">
                            <img class="logo" src="/web/public/img/logo.png" />
                            <h1>Клиника</h1>
                            <p>Морозовой</p>
<!--                            <p>Здоровье - это всё!</p>-->
<!--                            <button class="moreDetailed">Подробнее</button>-->
                        </div>
                    </div>
                    <div class="item">
                        <img src="../web/public/img/slide-three.jpg" alt="">
                        <div class="carousel-caption">
                            <img class="logo" src="/web/public/img/logo.png" />
                            <h1>Клиника</h1>
                            <p>Морозовой</p>
<!--                            <p>Здоровье - это всё!</p>-->
<!--                            <button class="moreDetailed">Подробнее</button>-->
                        </div>
                    </div>
                    <div class="item">
                        <img src="../web/public/img/slide-four.jpg" alt="">
                        <div class="carousel-caption">

                            <img class="logo" src="/web/public/img/logo.png" />
                            <h1>Клиника</h1>
                            <p>Морозовой</p>
<!--                            <p>Здоровье - это всё!</p>-->
<!--                            <button class="moreDetailed">Подробнее</button>-->
                        </div>
                    </div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#carouselHacked" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carouselHacked" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</section><!-- end of slider section -->

<section class="about text-center" id="about">
    <div class="container">
        <div class="row">
            <h2>О нас</h2>
            <h4>Эх, чужак! Общий съём цен шляп (юфть) — вдрызг! Любя, съешь щипцы, — вздохнёт мэр, — кайф жгуч. Шеф
                взъярён тчк щипцы с эхом гудбай Жюль.</h4>
            <div class="col-md-4 col-sm-6">
                <div class="single-about-detail clearfix">
                    <div class="about-img">
                        <img class="img-responsive" src="../web/public/img/item1.jpg" alt="">
                    </div>
                    <div class="about-details">
                        <div class="pentagon-text">
                            <h1></h1>
                        </div>
                        <h3>Здесь супер слоган</h3>
                        <p>Любя, съешь щипцы, — вздохнёт мэр, — кайф жгуч. Шеф взъярён тчк щипцы с эхом гудбай Жюль. Эй,
                            жлоб! Где туз? Прячь юных съёмщиц в шкаф. Экс-граф? Плюш изъят. Бьём чуждый цен хвощ! Эх,
                            чужак! Общий съём цен шляп (юфть) — вдрызг! Любя, съешь щипцы, — вздохнёт мэр, — кайф
                            жгуч.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="single-about-detail">
                    <div class="about-img">
                        <img class="img-responsive" src="../web/public/img/item2.jpg" alt="">
                    </div>
                    <div class="about-details">
                        <div class="pentagon-text">
                            <h1></h1>
                        </div>

                        <h3>Здесь супер слоган</h3>
                        <p>Любя, съешь щипцы, — вздохнёт мэр, — кайф жгуч. Шеф взъярён тчк щипцы с эхом гудбай Жюль. Эй,
                            жлоб! Где туз? Прячь юных съёмщиц в шкаф. Экс-граф? Плюш изъят. Бьём чуждый цен хвощ! Эх,
                            чужак! Общий съём цен шляп (юфть) — вдрызг! Любя, съешь щипцы, — вздохнёт мэр, — кайф
                            жгуч.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="single-about-detail">
                    <div class="about-img">
                        <img class="img-responsive" src="../web/public/img/item3.jpg" alt="">
                    </div>
                    <div class="about-details">
                        <div class="pentagon-text">
                            <h1></h1>
                        </div>
                        <h3>Здесь супер слоган</h3>
                        <p>Любя, съешь щипцы, — вздохнёт мэр, — кайф жгуч. Шеф взъярён тчк щипцы с эхом гудбай Жюль. Эй,
                            жлоб! Где туз? Прячь юных съёмщиц в шкаф. Экс-граф? Плюш изъят. Бьём чуждый цен хвощ! Эх,
                            чужак! Общий съём цен шляп (юфть) — вдрызг! Любя, съешь щипцы, — вздохнёт мэр, — кайф
                            жгуч.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- end of about section -->

<!-- service section starts here -->
<section class="service text-center" id="service">
    <div class="container">
        <div class="row">
            <h2>Наши услуги</h2>
            <h4>Вылечим так, что больше не потребуется!</h4>
            <div class="col-md-3 col-sm-6">
                <div class="single-service">
                    <div class="single-service-img">
                        <div class="service-img">
                            <img class="heart img-responsive" src="../web/public/img/service1.png" alt="">
                        </div>
                    </div>
                    <h3>Сердечные беды</h3>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-service">
                    <div class="single-service-img">
                        <div class="service-img">
                            <img class="brain img-responsive" src="../web/public/img/service2.png" alt="">
                        </div>
                    </div>
                    <h3>Проблемы с головой</h3>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-service">
                    <div class="single-service-img">
                        <div class="service-img">
                            <img class="knee img-responsive" src="../web/public/img/service3.png" alt="">
                        </div>
                    </div>
                    <h3>Боли в суставах</h3>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-service">
                    <div class="single-service-img">
                        <div class="service-img">
                            <img class="bone img-responsive" src="../web/public/img/service4.png" alt="">
                        </div>
                    </div>
                    <h3>Общие проблемы</h3>
                </div>
            </div>
        </div>
    </div>
</section><!-- end of service section -->

<!-- team section -->
<section class="team" id="team">
    <div class="container">
        <div class="row">
            <div class="team-heading text-center">
                <h2>Наши специалисты</h2>
                <h4>Лучшие медики Державы! Лечат раз и навсегда!</h4>
            </div>
            <div class="col-md-2 single-member col-sm-4">
                <div class="person">
                    <img class="img-responsive" src="../web/public/img/member1.jpg" alt="member-1">
                </div>
                <div class="person-detail">
                    <div class="arrow-bottom"></div>
                    <h3>Доктор 1</h3>
                    <p>Любя, съешь щипцы, — вздохнёт мэр, — кайф жгуч. Шеф взъярён тчк щипцы с эхом гудбай Жюль. Эй,
                        жлоб! Где туз? Прячь юных </p>
                </div>
            </div>
            <div class="col-md-2 single-member col-sm-4">
                <div class="person-detail">
                    <div class="arrow-top"></div>
                    <h3>Доктор 2</h3>
                    <p>Любя, съешь щипцы, — вздохнёт мэр, — кайф жгуч. Шеф взъярён тчк щипцы с эхом гудбай Жюль. Эй,
                        жлоб! Где туз? Прячь юных</p>
                </div>
                <div class="person">
                    <img class="img-responsive" src="../web/public/img/member2.jpg" alt="member-2">
                </div>
            </div>
            <div class="col-md-2 single-member col-sm-4">
                <div class="person">
                    <img class="img-responsive" src="../web/public/img/member3.jpg" alt="member-3">
                </div>
                <div class="person-detail">
                    <div class="arrow-bottom"></div>
                    <h3>Доктор 3</h3>
                    <p>Любя, съешь щипцы, — вздохнёт мэр, — кайф жгуч. Шеф взъярён тчк щипцы с эхом гудбай Жюль. Эй,
                        жлоб! Где туз? Прячь юных </p>
                </div>
            </div>
            <div class="col-md-2 single-member col-sm-4">
                <div class="person-detail">
                    <div class="arrow-top"></div>
                    <h3>Доктор 4</h3>
                    <p>Любя, съешь щипцы, — вздохнёт мэр, — кайф жгуч. Шеф взъярён тчк щипцы с эхом гудбай Жюль. Эй,
                        жлоб! Где туз? Прячь юных</p>
                </div>
                <div class="person">
                    <img class="img-responsive" src="../web/public/img/member4.jpg" alt="member-4">
                </div>
            </div>
            <div class="col-md-2 single-member col-sm-4">
                <div class="person">
                    <img class="img-responsive" src="../web/public/img/member5.jpg" alt="member-5">
                </div>
                <div class="person-detail">
                    <div class="arrow-bottom"></div>
                    <h3>Доктор 5</h3>
                    <p>Любя, съешь щипцы, — вздохнёт мэр, — кайф жгуч. Шеф взъярён тчк щипцы с эхом гудбай Жюль. Эй,
                        жлоб! Где туз? Прячь юных</p>
                </div>
            </div>
            <div class="col-md-2 single-member col-sm-4">
                <div class="person-detail">
                    <div class="arrow-top"></div>
                    <h3>Доктор 6</h3>
                    <p>Любя, съешь щипцы, — вздохнёт мэр, — кайф жгуч. Шеф взъярён тчк щипцы с эхом гудбай Жюль. Эй,
                        жлоб! Где туз? Прячь юных</p>
                </div>
                <div class="person">
                    <img class="img-responsive" src="../web/public/img/member6.jpg" alt="member-5">
                </div>
            </div>
        </div>
    </div>
</section><!-- end of team section -->
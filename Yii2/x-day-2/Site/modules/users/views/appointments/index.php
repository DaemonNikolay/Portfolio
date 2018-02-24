<?php

use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Appointments;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AppointmentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Записаться';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appointments-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Записаться на приём', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
    $dataProvider = new ActiveDataProvider([
        'query' => Appointments::find(),
        'pagination' => [
            'pageSize' => 10,
        ],
    ]);
    ?>


    <?= GridView::widget([
        'summary' => 'Всего <b>{end}</b> записей',
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',],

            [
                'attribute' => 'user',
                'label' => 'Пациент',
                'value' => 'user.name'
            ],

            [
                'attribute' => 'specialist',
                'label' => 'Врач',
                'value' => 'specialist.surname'
            ],

            [
                'attribute' => 'specialty',
                'label' => 'Должность',
                'value' => 'specialist.specialty'
            ],
            'date_of_admission',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

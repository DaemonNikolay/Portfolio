<?php

use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;
use app\models\Specialists;
use yii\data\Pagination;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SpecialistsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Специалисты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="specialists-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить специалиста', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Импорт из XML', ['upload'], ['class' => 'btn btn-default']) ?>
    </p>

    <?php
    $dataProvider = new ActiveDataProvider([
        'query' => Specialists::find(),
        'pagination' => [
            'pageSize' => 4,
        ],
    ]);
    ?>

    <?= GridView::widget([
        'summary' => 'Всего <b>{totalCount}</b> записей',
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'surname',
            'name',
            'patronymic',
            'specialty',
//            'email:email',
            [
                'format' => 'html',
                'label' => 'Фото',
                'value' => function ($data) {
                    return Html::img($data->getImage(), ['width' => 200]);
                }
            ],
            // 'phone',
            // 'image',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);

    ?>
</div>

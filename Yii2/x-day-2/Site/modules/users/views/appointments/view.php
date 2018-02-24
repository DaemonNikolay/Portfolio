<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Appointments */
/* @var $specialist app\models\Appointments */

$this->title = $model->user->surname . ' -> ' . $model->specialist->surname;
$this->params['breadcrumbs'][] = ['label' => 'Appointments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appointments-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,

        'attributes' => [
            'user_id'=>[
                'attribute' => 'specialist',
                'label' => 'Специалист',
                'value' => $model->user->surname,
            ],
            'specialist_id'=>[
                'attribute' => 'specialist',
                'label' => 'Специалист',
                'value' => $model->specialist->surname,
            ],
            'date_of_admission',
        ],
    ]) ?>

</div>

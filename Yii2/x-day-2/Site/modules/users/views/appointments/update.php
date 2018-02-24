<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Appointments */
/* @var $specialist app\models\Appointments */

$this->title = 'Изменить запись';
$this->params['breadcrumbs'][] = ['label' => 'Запись на приём', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user->surname, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';

//var_dump($this->title);

//die;

?>
<div class="appointments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'specialist' => $specialist
    ]) ?>

</div>

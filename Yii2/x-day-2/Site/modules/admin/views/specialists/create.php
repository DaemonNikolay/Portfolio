<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Specialists */

$this->title = 'Добавить специалиста';
$this->params['breadcrumbs'][] = ['label' => 'Специалисты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="specialists-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

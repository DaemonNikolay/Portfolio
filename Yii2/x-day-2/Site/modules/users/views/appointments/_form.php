<?php

use kartik\datetime\DateTimePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Appointments */
/* @var $specialist app\models\Appointments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="appointments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $model->user_id = Yii::$app->user->id; ?>

    <?= $form->field($model, 'specialist_id')->dropDownList(ArrayHelper::map($specialist, 'id', 'surname'))->label('Выберите специалиста'); ?>

    <?php
    if ($model->date_of_admission) {
        $model->date_of_admission = date("d.m.Y H:i", (integer)$model->date_of_admission);
    }
    $currentDate = new DateTime();

    echo $form->field($model, 'date_of_admission')->widget(DateTimePicker::className(), [
        'name' => 'date_of_admission',
        'language' => 'ru',
        'type' => DateTimePicker::TYPE_INPUT,
        'options' => ['placeholder' => 'Ввод даты/времени...'],
        'convertFormat' => true,
        'value' => date("d.m.Y h:i", (integer)$model->date_of_admission),
        'pluginOptions' => [
            'format' => 'dd.MM.yyyy hh:i',
            'autoclose' => true,
            'weekStart' => 1, //неделя начинается с понедельника
            'startDate' => $currentDate->format('d.m.Y H:i'),
            'todayBtn' => true, //снизу кнопка "сегодня",
        ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

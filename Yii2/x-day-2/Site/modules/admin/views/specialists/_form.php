<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;

use app\models\Specialists;

/* @var $this yii\web\View */
/* @var $model app\models\Specialists */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="specialists-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>

    <?
    $listData = Specialists::find()
        ->select('specialty as label')
        ->asArray()
        ->all();

    echo $form->field($model, 'specialty')->widget(
        AutoComplete::className(), [
        'clientOptions' => [
            'source' => $listData,
        ],
        'options' => [
            'class' => 'form-control'
        ]
    ]);
    ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

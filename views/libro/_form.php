<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Libro $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="libro-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'título')->textInput(['maxlength' => true]) ?>

    <?= Html::img($model->imagen, [
        'width' => '100px',
        'style' => 'border-radius: 8px; filter: drop-shadow(8px 8px 2px rgba(0,0,0,0.3));'
    ]) ?>

    <?= $form->field($model, 'archivo')->fileInput(['class' => 'form-control']) ?>
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

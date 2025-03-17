<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>

<?php 

if ($mensaje) {
    echo Html::tag('div', Html::encode($mensaje), ['class' => 'alert alert-danger']);
}

?>

<h1 class="text-center display-4">Prueba a sumar dos dígitos</h1>

<?php $formulario = ActiveForm::begin();?>
<?= $formulario -> field($model, 'valorA')?>
<?= $formulario -> field($model, 'valorB')?>

<div class="mb-3">
<?= Html::submitButton('Enviar', ['class'=> 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end();?>


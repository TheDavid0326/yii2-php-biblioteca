<?php 

use yii\helpers\Html;
use yii\widgets\LinkPager;

?>

<h1 class= 'text-center display-4'>Libros a la venta</h1>
<div class="row">

<?php foreach ($libros as $libro):?>

    <div class="col-sm-4">
        <div class="card" style="width: 18rem;">
            
            <?= Html::img($libro->imagen, ['width'=> '150px', 'class'=>'card-img-top rounded']) ?>
            <div class="card-body">
            <h2 class="card-title text-center"><?= Html::encode($libro->título);?></h2>
            </div>
        </div>
    </div>

<?php endforeach; ?>
</div>

<?php echo LinkPager::widget([
    'pagination' => $pagination,
    'options' => ['class' => 'pagination justify-content-center'],
    'linkContainerOptions' => ['class' => 'page-item mx-1'], // Añade margen horizontal
    'linkOptions' => ['class' => 'page-link'],
    'disabledListItemSubTagOptions' => ['tag' => 'a', 'class' => 'page-link'],

]); ?>
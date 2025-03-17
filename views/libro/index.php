<?php

use app\models\Libro;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\LibroSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Libros';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="libro-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Libro', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        // Definidos en actionIndex de LibroController
        // $searchModel = new LibroSearch();
        // $dataProvider = $searchModel->search($this->request->queryParams);
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager' => [
            'options' => ['class' => 'pagination justify-content-center'],
            'linkContainerOptions' => ['class' => 'page-item mx-1'], // Añade margen horizontal
            'linkOptions' => ['class' => 'page-link'],
            'disabledListItemSubTagOptions' => ['tag' => 'a', 'class' => 'page-link'],
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'título',
            [
                'attribute' => 'imagen',
                'format' => 'html',  // Le decimos a Yii que tratemos el valor como HTML
                'value' => function ($model) {
                    return Html::img($model->imagen, ['alt' => 'Imagen del libro', 'width' => '100px']);
                },
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Libro $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>

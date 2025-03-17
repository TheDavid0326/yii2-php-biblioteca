<?php

use yii\helpers\Url;
use yii\helpers\Html;

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Disfruta de Tu Biblioteca Personal</h1>

        <p class="lead">Una aplicación sencilla y eficaz para gestionar tu colección de libros, desde clásicos literarios hasta tus últimas adquisiciones.</p>

        <?php if (Yii::$app->user->isGuest): ?>
            <p><a class="btn btn-lg btn-success" href=<?= Url::to(['site/login']) ?> >Inicia sesión para acceder a tu Biblioteca Privada</a></p>
        <?php else: ?>
            <form action="<?= Url::to(['site/logout']) ?>" method="post" style="display: inline;">
                <?= Html::hiddenInput(Yii::$app->request->csrfParam, Yii::$app->request->csrfToken) ?>
                <button type="submit" class="btn btn-lg btn-danger">Cierra sesión para volver a Biblioteca Pública</button>
            </form>
        <?php endif; ?>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4 mb-3">
                <h2>Organiza Tu Colección de Libros</h2>

                <p>Con nuestra aplicación, puedes mantener un registro detallado de todos tus libros. 
                    Añade títulos, autores, géneros y más, todo en un solo lugar. 
                    Ideal para bibliófilos que desean tener su colección siempre ordenada y accesible.</p>

                <!-- <p><a class="btn btn-outline-secondary" href="https://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p> -->
            </div>
            <div class="col-lg-4 mb-3">
                <h2>Gestión Sencilla e Intuitiva</h2>

                <p>Nuestra plataforma está diseñada para que cualquier persona pueda usarla sin complicaciones. 
                    Con solo unos clics, puedes añadir, editar o eliminar libros. ¡Mantén tu biblioteca actualizada sin esfuerzo!</p>

                <!--<p><a class="btn btn-outline-secondary" href="https://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>-->
            </div>
            <div class="col-lg-4">
                <h2>Adaptada a Tus Necesidades</h2>

                <p>Ya sea que tengas 10 libros o 100, nuestra aplicación se adapta a ti. 
                    Filtra por género, autor o título, y encuentra rápidamente lo que buscas. 
                    Además, puedes añadir portadas personalizadas para que tu biblioteca sea única.</p>

                <!--<p><a class="btn btn-outline-secondary" href="https://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p> -->
            </div>
        </div>

    </div>
</div>

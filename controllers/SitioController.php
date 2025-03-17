<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl; // O AccessController
use yii\web\Controller;

use app\models\FormularioForm;

class SitioController extends Controller
{
    public function actionInicio() {
        $model = new FormularioForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()){
            
            $valorRespuesta = ('El resultado es: ' . $model->valorA + $model->valorB);
            return $this->render('inicio', ['mensaje' => $valorRespuesta, 'model' => $model]);
        }
        /*
        Se le pasa un array asociativo y no: [$model, $usuario, $config]
        De lo contrario en la vista habría que usar:

        echo $data[0]->nombre;
        echo $data[1
        */
        return $this->render('inicio', ['mensaje' => "", 'model'=>$model]);
    }
}


?>
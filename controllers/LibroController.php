<?php

namespace app\controllers;

use app\models\Libro;
use app\models\LibroSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use yii\web\UploadedFile;
use yii\data\Pagination;
use Yii;

use function PHPUnit\Framework\fileExists;

/**
 * LibroController implements the CRUD actions for Libro model.
 */
class LibroController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class, // La clase AccessControl será la responsable de gestionar el acceso
                    'rules' => [
                        [
                            'actions' => ['lista'],
                            'allow' => true,
                            'roles' => ['?'], 
                        ],
                        [
                            'allow' => true,
                            'roles' => ['@'], // Solo permite acceso a usuarios autenticados al controlador
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'], // Permite solo solicitudes POST para "delete"
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Libro models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new LibroSearch();
        $dataProvider = $searchModel->search($this->request->queryParams); // Si no hay parametros, se obtienen todos los libros

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Libro model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    /**
     * Updates an existing Libro model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) ) {
            
            if (fileExists($model->imagen)) {
                unlink($model->imagen);
            }

            $this->subirFoto($model);

            if ($model->validate()) {
                $model->save(false);
                return $this->redirect(['view', 'id' => $model->id]);
            }
            
        }

        // $model->save();
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Libro model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        // Findmodel ya devuelve un objeto modelo que está vinculado a ese registro específico de la BD
        // Cualquier cambio en el modelo se verá reflejado en la base de datos.
        $model = $this->findModel($id);
        
        if (fileExists($model->imagen)) {
            unlink($model->imagen);
        }

        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Libro model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Libro the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    
    public function actionLista() {

        $model = Libro::find();

        $pagination = new Pagination([
            'defaultPageSize' => 3,
            'totalCount' => $model->count(),
        ]);

        $libros = $model->orderBy('título')->offset($pagination->offset)->limit($pagination->limit)->all();

        return $this->render('lista', ['libros' => $libros, 'pagination' => $pagination]);
    }
    
    protected function findModel($id)
    {
        if (($model = Libro::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    
    /**
     * Creates a new Libro model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Libro();
    
        if ($this->request->isPost && $model->load($this->request->post())) {

                // Los objetos se pasan por referencia automáticamente
                $this->subirFoto($model);

                if ($model->validate()){
                    $model->save(false);
                    return $this->redirect(['view', 'id' => $model->id]);
                }
        }
    
        return $this->render('create', [
            'model' => $model,
        ]);
    }

// Ejemplo de $_POST y $_FILES en Yii2,

/* Con load solo los campos que vienen en $_POST['Libro'] se asignan al modelo

$_POST = [
    '_csrf' => 'csrf_token_aquí',
    'Libro' => [
        'título' => 'El señor de los anillos',
    ],
];

Con getInstance($model, 'archivo'):
1️⃣ Tomar el nombre de la clase del modelo($model): (Libro).
2️⃣ Buscar en $_FILES['Libro'].
3️⃣ Dentro de $_FILES['Libro'], buscar la clave 'archivo'.

$_FILES = [
    'Libro' => [
        'name' => [
            'archivo' => 'portada.jpg',
        ],
        'type' => [
            'archivo' => 'image/jpeg',
        ],
        'tmp_name' => [
            'archivo' => 'C:\\xampp\\tmp\\phpA468.tmp',
        ],
        'error' => [
            'archivo' => 0,
        ],
        'size' => [
            'archivo' => 102400, // Tamaño en bytes (100KB)
        ],
    ],
];
    */

    protected function subirFoto($model) {
        
        $model->archivo = UploadedFile::getInstance($model, 'archivo');

        // Verifica si se ha cargado un archivo
        
        if (!$model->archivo) {
            Yii::$app->session->setFlash('error', 'No se recibió ningún archivo.');
            Yii::debug('No se recibió ningún archivo.', 'upload'); // Agrega debug para el error
            return;
        }

            $uploadDir = 'uploads/';
                if (!is_dir($uploadDir)) {
                    // Crea el directorio uploads/ si no existe
                    mkdir($uploadDir, 0777, true);
                }
                
                // Especifica el directorio donde se guardará el archivo
                $rutaArchivo = 'uploads/'. $model->archivo->baseName. '.'. $model->archivo->extension;

                // Guarda el archivo en el directorio especificado
                if($model->archivo->saveAs($rutaArchivo)) {
                    // Asigna la ruta del archivo al campo 'imagen' del modelo
                    $model->imagen = $rutaArchivo;
                } else {
                    // Si hubo algún error al guardar el archivo, se muestra un mensaje de error
                    Yii::$app->session->setFlash('error', 'Error al subir la imagen.');
                }


        }
}
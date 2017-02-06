<?php

namespace backend\controllers;

use Yii;
use backend\models\Recibidas;
use backend\models\search\RecibidasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * RecibidasController implements the CRUD actions for Recibidas model.
 */
class RecibidasController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Recibidas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RecibidasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Recibidas model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Recibidas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Recibidas();

        if ($model->load(Yii::$app->request->post())) {

            $fileName = $model->documento;
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->file->saveAs( 'uploads/'.$fileName.'-'.$model->fecha_doc.'.'.$model->file->extension );

            //Guardar el path en la base de datos
            $model->archivo = 'uploads/'.$fileName.'.'.$model->file->extension;
            $model->fecha = date('Y-m-d h:m:s');
            $model->archivado_TRD = $model->id_serie.'.'.$model->id_subserie.'.'.$model->id_tipo_doc;
            $model->fileName = null;
            $model->save();

            return $this->redirect(['index', 'id' => $model->id_recibidas]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Recibidas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_recibidas]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Recibidas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Recibidas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Recibidas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Recibidas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
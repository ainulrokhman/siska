<?php

namespace app\controllers;

use Yii;
use app\models\Mahasiswa;
use app\models\MahasiswaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * MahasiswaController implements the CRUD actions for Mahasiswa model.
 */
class MahasiswaController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Mahasiswa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MahasiswaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Mahasiswa model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Mahasiswa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Mahasiswa();
        
        if ($model->load(Yii::$app->request->post())) {

            // ambil data File Upload
            $pasFoto = UploadedFile::getInstance($model, 'foto');

            if (!is_null($pasFoto)) {

                $tmp = explode('.', $pasFoto->name);
                $ext = end($tmp);

                $tmp = explode(' ', $model->nama_lengkap);
                $namaAkhir = end($tmp);

                $fileName = $namaAkhir
                    .'_'.Yii::$app->security->generateRandomString()
                    .'.'.$ext;
                
                Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/img/foto/';

                $path = Yii::$app->params['uploadPath'] . $fileName;

                $model->foto_path = '/img/foto/'. $fileName;

                $pasFoto->saveAs($path);
            }

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                var_dump($model->getErrors());
                die();
            }            
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Mahasiswa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            // ambil data File Upload
            $pasFoto = UploadedFile::getInstance($model, 'foto');

            if (!is_null($pasFoto)) {

                $tmp = explode('.', $pasFoto->name);
                $ext = end($tmp);

                $tmp = explode(' ', $model->nama_lengkap);
                $namaAkhir = end($tmp);

                $fileName = $namaAkhir
                    .'_'.Yii::$app->security->generateRandomString()
                    .'.'.$ext;
                
                Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/img/foto/';

                $path = Yii::$app->params['uploadPath'] . $fileName;

                $model->foto_path = '/img/foto/'. $fileName;

                $pasFoto->saveAs($path);
            }

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                var_dump($model->getErrors());
                die();
            }            
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Mahasiswa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Mahasiswa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Mahasiswa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mahasiswa::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

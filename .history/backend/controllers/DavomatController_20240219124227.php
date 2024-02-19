<?php

namespace backend\controllers;

use common\models\Davomat;
use common\models\DavomatSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Exception;
use Yii;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\helpers\VarDumper;


/**
 * DavomatController implements the CRUD actions for Davomat model.
 */
class DavomatController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                    [
                        'actions' => ['view', 'index'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Davomat models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DavomatSearch(); 
        $post = Yii::$app->request->post();
        if ($post) { 
            // Formdan gelen verileri kontrol etme
            if (isset($post['date_start']) && isset($post['date_end'])) {
                
                echo '<pre>';
                    var_dump($post);die();
                echo '</pre>';
                
                
            } else {
                echo "Başlangıç ve bitiş tarihleri formdan gelmedi!";
            }
        }
         
         $searchModel->date_start = $date_start; // Başlangıç tarihi
         $searchModel->date_end = $date_end;    

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
      // $dataProvider = $searchModel->search(Yii::$app->request->post());

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Davomat model.
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
     * Creates a new Davomat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    // public function actionCreate()
    // {

    //     $model = new Davomat();

    //     if ($this->request->isPost) {
    //         if ($model->load($this->request->post())) {
    //             $model->image = UploadedFile::getInstance($model,'image');
    //             $ImageId = rand(1,99999999);
               
    //               $model->image->saveAs(Yii::getAlias('@fileUrl').'/uploads/'.$ImageId.'.'.$model->image->extension);
    //               $model->file = 'uploads/'.$ImageId.'.'.$model->image->extension;
    //              $model->save();
                
    //             return $this->redirect(['view', 'id' => $model->id]);
    //         }
    //     } else {
    //         $model->loadDefaultValues();
    //     }

    //     return $this->render('create', [
    //         'model' => $model,
    //     ]);
    // }

    /**
     * Updates an existing Davomat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Davomat model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Davomat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Davomat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Davomat::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}

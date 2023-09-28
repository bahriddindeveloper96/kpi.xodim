<?php

namespace backend\controllers;
use common\models\Worked;
use common\models\Kpi;
use common\models\WorkedSearch;
use common\models\Incentive;
use common\models\IncentiveSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * IncentiveController implements the CRUD actions for Incentive model.
 */
class IncentiveController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Incentive models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new IncentiveSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Incentive model.
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
     * Creates a new Incentive model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($id)
    {
        
        $worked = WorkedSearch::findOne(['user_id'=>$id]);
        $one_bonus = ($worked->mission->one_ball / $worked->mission->plan_a)*$worked->mission_one;
        $two_bonus = ($worked->mission->two_ball / $worked->mission->plan_b)*$worked->mission_two;
        $three_bonus = ($worked->mission->three_ball / $worked->mission->plan_c)*$worked->mission_three;
        $all_bonus = $one_bonus + $two_bonus + $three_bonus; 
      
        $kpis = Kpi::find()->all(); 
        foreach($kpis as $kpi){
            if($kpi->old_result > $all_bonus ){
                $summa = 0;
            }
            elseif($kpi->old_result <= $all_bonus OR $kpi->end_result >= $all_bonus ){
                $summas = $kpi->summa;
            }
            elseif($kpi->end_result <= $all_bonus ){
                $summas = 'korporativ';
            }
           
        }
        

        $model = new Incentive();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'worked'=> $worked,
            'all_bonus' => $all_bonus,
            'kpis' => $kpis,
            'summas'=> $summas,

        ]);
    }

    /**
     * Updates an existing Incentive model.
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
     * Deletes an existing Incentive model.
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
     * Finds the Incentive model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Incentive the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Incentive::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

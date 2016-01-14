<?php

namespace frontend\controllers;

use app\models\HashtagDescription;
use Yii;
use app\models\Hashtag;
use app\models\HashtagSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HashtagController implements the CRUD actions for Hashtag model.
 */
class HashtagController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Hashtag models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HashtagSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Hashtag model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Hashtag model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAdd()
    {
        $model = new Hashtag();
        $modelDescription = new HashtagDescription();
        if ($model->load(Yii::$app->request->post()) && $modelDescription->load(Yii::$app->request->post())) {
            $modelDescription->hashtag = 0;
            $modelDescription->user = !Yii::$app->user->isGuest ? Yii::$app->user->id : 0;
            if($model->validate() && $modelDescription->validate()){
                $model->save();
                $modelDescription->hashtag = $model->id;
                $modelDescription->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('create', [
            'model' => $model,
            'modelDescription' => $modelDescription,
        ]);
    }


    /**
     * Finds the Hashtag model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Hashtag the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Hashtag::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}

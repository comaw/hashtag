<?php

namespace frontend\controllers;

use app\models\HashtagDescription;
use app\models\HashtagDescriptionLike;
use Yii;
use app\models\Hashtag;
use app\models\HashtagSearch;
use yii\helpers\Json;
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
     * Lists all Hashtag models.
     * @return mixed
     */
    public function actionSearch()
    {
        $model = new Hashtag();
        $tags = [];
        if(Yii::$app->request->post('tagsearch')){
            $tag = ltrim(Yii::$app->request->post('tagsearch'), '#').'%';
            $tags = Hashtag::find()->where(['like', 'tag', $tag, false])->limit(50)->orderBy("tag asc")->all();
        }
        return $this->render('search', [
            'model' => $model,
            'tags' => $tags,
        ]);
    }

    public function actionLike($id)
    {
        if(Yii::$app->user->isGuest){
            $r = [];
            $r['e'] = Yii::t('app', 'Нужно войти на сайт под своим логином или зарегистрироваться');
            echo Json::encode($r);
            Yii::$app->end();
        }

        $model = HashtagDescription::find()->where("id = :id", [':id' => $id])->one();
        if(!$model){
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
        $like = HashtagDescriptionLike::find()->where("description = :description AND user = :user", [
            ':description' => $model->id,
            ':user' => Yii::$app->user->id,
        ])->one();
        if($like){
            $r = [];
            $r['e'] = Yii::t('app', 'Ваш голос уже учтен!');
            echo Json::encode($r);
            Yii::$app->end();
        }
        $model->likes = $model->likes + 1;
        $model->save();
        $like = new HashtagDescriptionLike();
        $like->description = $model->id;
        $like->user = Yii::$app->user->id;
        if($like->validate()){
            $like->save();
        }
        $r = [];
        $r['likes'] = (int)$model->likes;
        echo Json::encode($r);
    }

    /**
     * Displays a single Hashtag model.
     * @param string $tag
     * @return mixed
     */
    public function actionView($tag)
    {
        $tag = ltrim($tag, '#');
        $model = $this->findModel($tag);
        $newDescription = new HashtagDescription();
        if ($newDescription->load(Yii::$app->request->post())) {
            $newDescription->hashtag = $model->id;
            $newDescription->user = !Yii::$app->user->isGuest ? Yii::$app->user->id : 0;
            if($newDescription->validate()){
                $newDescription->save();
                return $this->refresh();
            }
        }
        return $this->render('view', [
            'model' => $model,
            'newDescription' => $newDescription,
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
                return $this->redirect(['view', 'tag' => $model->tag]);
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
        if (($model = Hashtag::find()->where("tag = :tag", [':tag' => $id])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}

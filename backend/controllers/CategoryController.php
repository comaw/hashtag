<?php

namespace backend\controllers;

use common\UrlHelp;
use Yii;
use app\models\Category;
use app\models\CategorySearch;
use backend\ext\BaseController;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;


/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends BaseController
{

    /**
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Category model.
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
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Category();

        if ($model->load(Yii::$app->request->post())) {
            $model->url = UrlHelp::translateUrl($model->name);
            if($model->validate()){
                $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                if($model->imageFile) {
                    if ($imgName = $model->upload($model->url)) {
                        $model->img = $imgName;
                    }
                }
                $model->imageFile = null;
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->url = UrlHelp::translateUrl($model->url);
            if($model->validate()){
                $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                if($model->imageFile) {
                    if ($imgName = $model->upload($model->url)) {
                        $model->img = $imgName;
                    }
                }
                $model->imageFile = null;
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Category model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        Category::delImg($model->img);
        $model->delete();
        return $this->redirect(['index']);
    }

    public function actionImgdel($id){
        $model = $this->findModel($id);
        Category::delImg($model->img);
        $model->img = null;
        $model->save();
        return $this->redirect(UrlHelp::toRoute(['category/update', 'id' => $model->id]));
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}

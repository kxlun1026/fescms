<?php

namespace frontend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use common\models\Content;
use common\models\ContentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Category;
use common\models\Page;

/**
 * ContentController implements the CRUD actions for Content model.
 */
class ContentController extends Controller
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
     * Lists all Content models.
     * @return mixed
     */
    public function actionIndex($catdir = '')
    {
        $categoryModel = Category::findOne(['catdir' => $catdir]);
        if (empty($categoryModel)) {
            throw new NotFoundHttpException('None page named ' . $catdir);
        }
        $categorys = Category::getCategory();
        if ($categoryModel->parentid == 0) {
            $catids = [$categoryModel->id];
            $category = [];
            foreach ($categorys as $cat) {
                if ($cat['parentid'] != $categoryModel->id) continue;
                $catids[] = $cat['id'];
                $category[] = $cat;
            }
            $where = ['in', 'catid', $catids];
        } else {
            $category = [];
            foreach ($categorys as $cat) {
                if ($cat['parentid'] != $categoryModel->parentid) continue;
                $category[] = $cat;
            }
            $where = ['catid' => $categoryModel->id];
        }
        if ($categoryModel->type == 0) {
            $query = Content::find()->where($where)->orderBy('id DESC');
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]);
            $template = 'category_news';
            $categoryModel->list_template != "" && $template = $categoryModel->list_template;
            
            
            return $this->render($template, [
                'dataProvider' => $dataProvider,
                'category' => $category,
                'categoryModel' => $categoryModel,
            ]);
        } else {
            $model = Page::findOne(['catid' => $categoryModel->id]);
            $template = $categoryModel->page_template ? $categoryModel->page_template : 'page';
            return $this->render($template, [
                'model' => $model,
                'category' => $category,
                'categoryModel' => $categoryModel,
            ]);
        }
        
    }

    /**
     * Displays a single Content model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        //exit('view/'.$id);
        $model = $this->findModel($id);
        $categoryModel = Category::findOne($model->catid);
        $template = 'show_news';
        $categoryModel->show_template != "" && $template = $categoryModel->show_template;
        $model->template != "" && $template = $model->template;
        return $this->render($template, [
            'model' => $model,
            'categoryModel' => $categoryModel,
        ]);
    }

    /**
     * Finds the Content model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Content the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Content::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

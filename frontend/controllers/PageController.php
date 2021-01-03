<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Page;
use yii\web\NotFoundHttpException;

class PageController extends Controller
{
    
    /**
     * 单页
     *
     * @param string $name
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionView($catdir = '')
    {
        if ($catdir == '') {
            $catdir = Yii::$app->getRequest()->getPathInfo();
        }
        $model = Page::findOne(['catdir' => $catdir]);
        if (empty($model)) {
            throw new NotFoundHttpException('None page named ' . $catdir);
        }
        $template = $catdir;
        $model->template != "" && $template = $model->template;
        return $this->render($template, [
            'model' => $model,
        ]);
    }
    
}
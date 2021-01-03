<?php

namespace backend\controllers;

use Yii;
use common\models\UserGroup;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\actions\DeleteAction;
use backend\actions\SortAction;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;

/**
 * GroupController implements the CRUD actions for UserGroup model.
 */
class GroupController extends Controller
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
     * Lists all UserGroup models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => UserGroup::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actions()
    {
        return [
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => UserGroup::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => UserGroup::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => UserGroup::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => UserGroup::className(),
            ],
        ];
    }
}

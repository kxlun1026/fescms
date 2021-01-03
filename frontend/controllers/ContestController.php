<?php
namespace frontend\controllers;

use Yii;
use yii\web\UploadedFile;
use common\helpers\Util;
use common\models\ContestData;
use common\models\ContestType;
use common\models\User;

class ContestController extends BaseController
{
    
    public function actionIndex()
    {
        $model = new ContestData();
        if (Yii::$app->request->isPost) {
            $model->user_id = Yii::$app->user->identity->id;
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                $model->file = UploadedFile::getInstance($model, 'file');
                if ($model->upload()) {
                    $model->save(false);
                    return $this->redirect(['notify']);
                }
            }
            
        }
        $types = ContestType::getTypes();
        return $this->render('index', [
            'model' => $model,
            'types' => $types
        ]);
    }
    
    public function actionNotify()
    {
        return $this->render('notify');
    }
    
    public function actionSearch($role)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $q = Yii::$app->request->get('q');
        $query = User::find()->select(['member.id','member.fullname'])
        ->joinWith('profile')
        ->where(['member.role_id' => $role, 'member.status' => User::STATUS_ACTIVE])
        ->andFilterWhere(['like', 'member.fullname', $q])
        ->asArray()
        ->all();
        $status = 0;
        if ($query) $status = 1;
        return ['status' => $status, 'data' => $query];
    }
    

}

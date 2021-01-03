<?php
namespace frontend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use frontend\models\User;
use common\helpers\Util;
use frontend\models\EmailForm;
use frontend\models\MobileForm;
use frontend\models\ChangePasswordForm;
use common\models\Profile;
use common\models\ContestData;

class MemberController extends BaseController
{
    
    
    public function actionIndex()
    {
        $profile = Profile::findOne(['user_id' => Yii::$app->user->identity->id]);
        return $this->render('index', ['profile' => $profile]);
    }
    
    public function actionProfile()
    {
        $user = User::findOne(Yii::$app->user->identity->id);
        $profile = Profile::findOne(['user_id' => Yii::$app->user->identity->id]);
        if ($user->role_id == User::TYPE_STUDENT) {
            $profile->scenario = Profile::SCENARIO_STUDENT;
        } else {
            $profile->scenario = Profile::SCENARIO_TEACHER;
        }
        
        if ($user->load(Yii::$app->request->post()) && $profile->load(Yii::$app->request->post())) {
            $isValid = $user->validate();
            $isValid = $profile->validate() && $isValid;
            if ($isValid) {
                $user->save(false);
                $profile->save(false);
                Yii::$app->session->setFlash('success', '个人资料修改成功！');
                return $this->redirect(['member/index']);
            }
        }
        return $this->render('profile', ['user' => $user, 'profile' => $profile]);
    }
    
    public function actionContest()
    {
        
        $query = ContestData::find()->where(['user_id' => Yii::$app->user->identity->id])->orderBy('id DESC');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $this->render('contest', [
            'dataProvider' => $dataProvider
        ]);
    }
    
    public function actionContestUpdate($id)
    {
        $model = ContestData::findOne($id);
        return $this->render('contest-update', [
            'model' => $model
        ]);
    }
    
    public function actionChangepwd()
    {
        $model = new ChangePasswordForm();
        $request = Yii::$app->request;
        if ($request->isPost) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            if ($model->load(Yii::$app->request->post()) && $model->update()) {
                return ['status' => 1, 'msg' => '修改成功！'];
            } else {
                $tmp_error = $model->getFirstErrors();
                foreach($model->activeAttributes() as $error) {
                    if(isset( $tmp_error[$error]) && !empty($tmp_error[$error])){
                        return ['status' => 0, 'msg' => $tmp_error[$error]];
                    }
                }
            }
            return ['status' => 0, 'msg' => '修改失败！'];
        }
        
        return $this->render('changepwd', [
            'model' => $model,
        ]);
    }
    

}

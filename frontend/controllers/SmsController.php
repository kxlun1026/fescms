<?php
namespace frontend\controllers;

use yii\web\Controller;
use common\components\dysms\AliSms;

class SmsController extends Controller
{
    public function actionIndex()
    {
        $signName = '泰伯';
        $templateCode= 'C123456';
        $phoneNumbers = '15001321055';
        $data = ['code'=>12323];
        
        $accessKeyId = 'weweewew';
        $accessKeySecret = 'sfdsdfsdfdsf';
        $sendsms = new AliSms($accessKeyId, $accessKeySecret);
        $response = $sendsms->SendSms($signName, $templateCode, $phoneNumbers, $data);
        print_r($response);
    }
}
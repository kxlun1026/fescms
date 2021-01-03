<?php
/**
 * PayController.php
 * @author: allen
 * @date  2020年4月28日下午5:12:09
 * @copyright  Copyright igkcms
 */
namespace frontend\controllers;


use yii\web\Controller;
use common\components\payment\wxpay\WxPay;
use common\components\payment\alipay\AliPay;


class PayController extends Controller
{
    public $enableCsrfValidation = false;//关闭csrf
    public function actionIndex()
    {
        $config = [
            'appid' => '',
            'mch_id' => '',
            'key' => '',
            'app_secret' => '',
        ];
        $payment = new WxPay($config);
        $openid = $payment->GetOpenid();
        
        $order['title'] = 'sddsds';
        $order['trade_sn'] = 'trade_sn';
        $order['total_fee'] = '100';
        //$result = $pay->createAppPay($order);
        $result = $payment->createMiniPay($order);
        var_dump($result);
        exit();
        
        
    }
    
    //微信jsapi支付
    public function actionJsapi()
    {
        $config = [
            'appid' => '',
            'mch_id' => '',
            'key' => '',
            'app_secret' => '',
        ];
        $payment = new WxPay($config);
        $openid = $payment->GetOpenid();
        
        $order['title'] = 'sddsds';
        $order['trade_sn'] = 'trade_sn';
        $order['total_fee'] = '100';
        $order['openid'] = $openid;
        $order['total_fee'] = '100';
        $order['notify_url'] = 'http://yii.com/index.php';
        
        //$result = $pay->createAppPay($order);
        $result = $payment->createMiniPay($order);
        $jsApiParameters = $payment->GetJsApiParameters($order);
        var_dump($jsApiParameters);
        exit();
        
        
    }
    
    public function actionWxnotify()
    {
        $config = [
            'appid' => '',
            'mch_id' => '',
            'key' => '',
            'app_secret' => '',
        ];
        $payment = new WxPay($config);
        //查询订单
        $result = $payment->QueryOrder();
        if ($result){
            //订单支付成功处理逻辑
            
        }
        
        //var_dump($result);
        //exit();
        $payment->Handle($result,false);//回复微信支付结果
    }
    
    //支付宝APP
    public function actionAlipayapp()
    {
        $alipay_config = [
            'app_id' => '',
            'merchant_private_key' => '',
            'alipay_public_key' => '',
        ];
        $order['title'] = '泰伯网是的都深深地';
        $order['trade_sn'] = '20200430233223';
        $order['total_fee'] = '100';
        $order['body'] = '泰伯网是的都深深地';
        $order['notify_url'] = 'http://yii.com/index.php';
        $order['return_url'] = 'http://yii.com/index.php';
        $payment = new AliPay($alipay_config);
        $result = $payment->createWapPay($order);
        return $this->renderPartial('pay', [
            'result' => $result,
        ]);
        
        //echo $result;
        //var_dump($result);
        //exit();
    }
    
    /**
     * 支付宝异步回调
     *@param:
     *@return:
     */
    public function actionAlipaynotify()
    {
        $payment = new AliPay($alipay_config);
        $result = $payment->rsaCheckV1($_POST, NULL, "RSA2");
        if ($result) {
            //支付成功
            //商户订单号
            $out_trade_no = $_POST['out_trade_no'];
            
            //支付宝交易号
            $trade_no = $_POST['trade_no'];
            
            //交易状态
            $trade_status = $_POST['trade_status'];
            if($trade_status == 'TRADE_FINISHED' || $trade_status == 'TRADE_SUCCESS') {
                
                //判断该笔订单是否在商户网站中已经做过处理
                //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
                //请务必判断请求时的total_amount与通知时获取的total_fee为一致的
                //如果有做过处理，不执行商户的业务程序
                
                //注意：
                //退款日期超过可退款期限后（如三个月可退款），支付宝系统发送该交易状态通知
            }
            echo "success";//请不要修改或删除
        } else {
            //验证失败
            echo "fail";//请不要修改或删除
        }
        exit;
    }
    
    /**
     * 支付宝同步回调
     *@param:
     *@return:
     */
    public function actionAlipayreturn()
    {
        $payment = new AliPay($alipay_config);
        $result = $payment->rsaCheckV1($_GET, NULL, "RSA2");
        if($result) {//验证成功
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //请在这里加上商户的业务逻辑程序代码
            
            //——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
            //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表
            
            //商户订单号
            
            $out_trade_no = htmlspecialchars($_GET['out_trade_no']);
            
            //支付宝交易号
            
            $trade_no = htmlspecialchars($_GET['trade_no']);
            
            echo "验证成功<br />外部订单号：".$out_trade_no;
            
            //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
            
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        }else {
            //验证失败
            echo "验证失败";
        }
    }
}
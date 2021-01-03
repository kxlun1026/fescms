<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '重置密码';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container py-5">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<?php $form = ActiveForm::begin(['id' => 'reset-form', 'options' => ['class' => 'login-form shadow-sm'],
			    'enableClientScript' => false,
			]); ?>
			    <div class="login-head">
			    	<h2><?= Html::encode($this->title) ?></h2>
			    	<p>请填写账号绑定的邮箱。 重置密码的链接将发送到邮箱里。</p>
			    </div>
				<?= $form->field($model, 'email')->textInput(['autofocus' => true, 'placeholder' => '输入邮箱地址'])->label(false) ?>
				
				<?= Html::submitButton('提交', ['class' => 'btn btn-primary btn-block', 'name' => 'reset-button']) ?>
			<?php ActiveForm::end(); ?>
			
		</div>
	</div>
</div>

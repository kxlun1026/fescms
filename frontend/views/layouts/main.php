<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
$this->title = $this->title ? $this->title.' - ' : '';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark" id="homeheader">
  <div class="container">
  <a class="navbar-brand" href="#">WGDC2021</a>
  
  <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbars" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
  <div class="collapse navbar-collapse" id="navbars">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active"> <?= Html::a('首页', ['site/index'], ['class' => 'nav-link']) ?> </li>
      <li class="nav-item"> <?= Html::a('报名参赛', ['contest/index'], ['class' => 'nav-link']) ?> </li>
      <li class="nav-item"> <?= Html::a('竞赛介绍', ['content/index', 'catdir' => 'jiabin'], ['class' => 'nav-link']) ?> </li>
      <li class="nav-item"> <?= Html::a('竞赛分组', ['/content/index', 'catdir' => 'jiabin'], ['class' => 'nav-link']) ?> </li>
      <li class="nav-item"> <?= Html::a('竞赛辅导', ['/content/index','catdir'=>'2020'], ['class' => 'nav-link']) ?> </li>
      <li class="nav-item"> <?= Html::a('作品展示', ['/content/index','catdir'=>'2020'], ['class' => 'nav-link']) ?> </li>
      <li class="nav-item"> <?= Html::a('技术咨询区', ['/content/index','catdir'=>'2020'], ['class' => 'nav-link']) ?> </li>
      <li class="nav-item"> <?= Html::a('竞赛新闻', ['/content/index','catdir'=>'2020'], ['class' => 'nav-link']) ?> </li>
      <li class="nav-item"> <?= Html::a('个人中心', ['/member/index'], ['class' => 'nav-link']) ?> </li>
    </ul>
    <?php if (Yii::$app->user->isGuest):?>
    <div class="navbar-user">
	  <a class="btn btn-success btn-sm my-2 my-sm-0 mr-2 px-3" href="<?= Url::toRoute(['site/login']) ?>"> 登录 </a>
      <a class="btn btn-outline-success btn-sm my-2 my-sm-0 px-3" href="<?= Url::toRoute(['site/signup']) ?>"> 注册 </a>
	</div>
	<?php else:?>
	<div class="navbar-user dropdown">
	  <a class="dropdown-toggle" href="#" role="button" id="userMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    <i>a</i><span class="user-name"><?=Yii::$app->user->identity->username;?></span>
	  </a>
	  <div class="dropdown-menu dropdown-menu-md-right" aria-labelledby="userMenu">
	    <a class="dropdown-item" href="<?= Url::toRoute(['member/index']) ?>">个人中心</a>
	    <a class="dropdown-item" href="<?= Url::toRoute(['member/ticket']) ?>">活动门票</a>
	    <a class="dropdown-item" href="<?= Url::toRoute(['member/order']) ?>">活动订单</a>
		<div class="dropdown-divider"></div>
	    <a class="dropdown-item logout" href="<?= Url::toRoute(['site/logout']) ?>">退出</a>
	  </div>
	</div>
    <form class="form-inline my-2 my-lg-0">
      
    </form>
    <?php endif;?>
  </div>
  </div>
</nav>

<?= $content ?>

<footer class="footer">
	<div class="container py-5">
		<div class="row">
			<div class="col-6 col-md">
				<div class="heading-footer"><h5>赞助参展</h5></div>
				<ul class="list-unstyled text-small">
					<li class="pb-2">xx先生</li>
					<li class="pb-2">13212364569</li>
					<li class="pb-2">sssssdds@ssss.com</li>
				</ul>
			</div>
			<div class="col-6 col-md">
				<div class="heading-footer"><h5>媒体合作</h5></div>
				<ul class="list-unstyled text-small">
					<li class="pb-2">xx先生</li>
					<li class="pb-2">13212364569</li>
					<li class="pb-2">sssssdds@ssss.com</li>
				</ul>
			</div>
			<div class="col-6 col-md">
				<div class="heading-footer"><h5>票务咨询</h5></div>
				<ul class="list-unstyled text-small">
					<li class="pb-2">xx先生</li>
					<li class="pb-2">13212364569</li>
					<li class="pb-2">sssssdds@ssss.com</li>
				</ul>
			</div>
			
		</div>
	</div>
	<div class="copyright">
        <div class="container">&copy; <?= date('Y') ?>  All right reserved. Development by igkcms</div>
    </div>
</footer>


<?php $this->endBody() ?>
<?= $this->render('_flash') ?>
</body>
</html>
<?php $this->endPage() ?>

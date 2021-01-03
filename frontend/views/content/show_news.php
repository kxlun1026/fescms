<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Content */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<section class="bg-img1 kit-overlay1" style="background-image: url(images/bg-05.jpg);">
			<div class="container page-banner d-flex flex-column justify-content-center align-items-center">
				<h2 class=""><?= Html::encode($categoryModel->catname) ?> </h2>
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="#">Home</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Library</li>
				  </ol>
				</nav>
			</div>
		</section>
		
		<section class="section">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-9">
						<div class="article">
							<h1><?= Html::encode($this->title) ?></h1>
							<div class="article-date"><i class="fa fa-calendar"></i> <?= date('Y-m-d', $model->created_at) ?></div>
						
							<div class="article-content">
								<?= $model->content ?>
						
						
							</div>
						</div>
						
					</div>
				</div>
			</div>
		
		</section>

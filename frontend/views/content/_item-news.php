<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

	<div class="card mb-4 shadow-sm news-card h-100">
		<a class="hover-img" href="<?= Url::toRoute(['content/view', 'id' => $model->id]) ?>"><?= Html::img($model->thumb, ['alt' => $model->title, 'class' => 'card-img-top']) ?></a>
		<div class="card-body">
			<h4><a href="<?= Url::toRoute(['content/view', 'id' => $model->id]) ?>" class="trans-02"><?= $model->title ?></a></h4>
			<div class="card-date"><i class="fa fa-calendar"></i> <?= date('Y-m-d', $model->created_at) ?></div>
			<p class="card-text"><?= $model->description ?></p>
			<a href="<?= Url::toRoute(['content/view', 'id' => $model->id]) ?>" class="btn btn-outline-secondary">查看详情</a>
		</div>
	</div>


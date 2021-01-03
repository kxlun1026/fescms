<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="hover-card">
		<div class="hover-card-inner"><?= Html::img($model->thumb, ['alt' => $model->title, 'class' => 'img-fluid']) ?>
			<div class="hover-card-box d-flex flex-column justify-content-center align-items-center"><a href="<?= Url::toRoute(['content/view', 'id' => $model->id]) ?>" class="hover-card-link">查看详情</a></div>
		</div>
		<h6 class="text-center"><a href="<?= Url::toRoute(['content/view', 'id' => $model->id]) ?>"><?= $model->title ?> </a></h6>
	</div>



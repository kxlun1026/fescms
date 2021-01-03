<?php

use yii\helpers\Html;
use common\widgets\ListView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Content */

$this->title = $categoryModel->catname;
$this->params['breadcrumbs'][] = ['label' => 'Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>
<section class="bg-img1 kit-overlay1" style="background-image: url(images/bg-05.jpg);">
			<div class="container page-banner d-flex flex-column justify-content-center align-items-center">
				<h2 class=""><?=Html::encode($categoryModel->catname)?> </h2>
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
				<div class="d-flex justify-content-center mb-5">
				<?php 
				if ($category) {
				    $active = $categoryModel->parentid == 0 ? ' active' : '';
				    echo '<a class="cat-item'.$active.'" href="'.Url::toRoute(['content/index', 'catdir' => 'product']).'">全部</a>';
				foreach ($category as $r):?>
					<a class="cat-item<?=$r['catid'] == $categoryModel->catid ? ' active' : '';?>" href="<?=Url::toRoute(['content/index', 'catdir' => $r['catdir']])?>"><?=Html::encode($r['catname'])?></a>
				<?php endforeach;}?>
				</div>
				
				<?= ListView::widget([
				    'id' => 'newslist',
                    'dataProvider' => $dataProvider,
				    'options' => ['class' => 'row'],
				    'itemOptions' => [
				        'tag' => 'div',
				        'class' => 'col-md-4'
				    ],
				    'itemView' => '_item-product',
				    'layout' => '{items}{pager}',
				    'pager' => [
				        'maxButtonCount' => 10,
				        'nextPageLabel' => '下一页',
				        'prevPageLabel' => '上一页',
				    ],
                ]) ?>
				
				
			</div>
		</section>

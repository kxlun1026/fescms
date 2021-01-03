<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Content */

?>
<style>
img{max-width:100%; margin:20px auto;}
</style>
<div class="content-view">

    <?= Html::img(Yii::$app->config->site_upload_url.$model->filepath) ?>

</div>

<?php

use yii\helpers\Html;
use backend\widgets\ActiveForm;

?>

<div class="card no-borders">
  
  <div class="card-body">
 
    <?php $form = ActiveForm::begin(); ?>

<div class="form-group field-category-catname required">
<label class="col-sm-3 control-label">目录名称</label>
<div class="col-sm-8"><input type="text" class="form-control" name="dirname"><div class="help-block"></div></div>
</div>
    <div class="form-group">
                    <div class="col-sm-2 col-sm-offset-3">
                        <button class="btn btn-primary btn-block" type="submit">创建</button>
                    </div>
                </div>

    <?php ActiveForm::end(); ?>
  </div>
</div>



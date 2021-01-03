<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>

<div class="row state-overview m-t-20">
  <div class="col-lg-3 col-sm-6">
    <section class="card">
      <div class="symbol terques"><i class="fa fa-user"></i></div>
      <div class="value">
        <h1 class="count">495</h1>
        <p>用户</p>
      </div>
    </section>
  </div>
  <div class="col-lg-3 col-sm-6">
    <section class="card">
      <div class="symbol red"><i class="fa fa-tags"></i></div>
      <div class="value">
        <h1 class=" count2">947</h1>
        <p>文章</p>
      </div>
    </section>
  </div>
  <div class="col-lg-3 col-sm-6">
    <section class="card">
      <div class="symbol yellow"><i class="fa fa-shopping-cart"></i></div>
      <div class="value">
        <h1 class=" count3">328</h1>
        <p>栏目</p>
      </div>
    </section>
  </div>
  <div class="col-lg-3 col-sm-6">
    <section class="card">
      <div class="symbol blue"><i class="fa fa-bar-chart-o"></i></div>
      <div class="value">
        <h1 class=" count4">10328</h1>
        <p>附件</p>
      </div>
    </section>
  </div>
</div>

<div class="row m-t-20">
    <div class="col-sm-6">
        <div class="card">
          <div class="card-header">
            <h4>我的个人信息</h4>
          </div>
          <div class="card-body">
            <ul class="list-group">
              <li class="list-group-item">您好，<?= Yii::$app->getUser()->getIdentity()->username ?></li>
              <li class="list-group-item "> <strong>所属角色</strong>：
                <?= Yii::$app->getUser()->getIdentity()->getRolesNameString()?>
              </li>
              <li class="list-group-item "> <strong>上次登录时间</strong>：
                <?= date('Y-m-d H:i:s', Yii::$app->user->identity->prev_login_time)?>
              </li>
              <li class="list-group-item "> <strong>上次登录IP</strong>：
                <?= Yii::$app->getUser()->getIdentity()->prev_login_ip?>
              </li>
              
            </ul>
            
          </div>
        </div>
      
    </div>
    <div class="col-sm-6">
        <div class="card">
          <div class="card-header">
            <h4>系统信息</h4>
          </div>
          <div class="card-body">
            <ul class="list-group">
              <li class="list-group-item"> <span class="badge bg-primary">&nbsp;&nbsp;</span><strong>IGKCMS</strong>:
                <?= Yii::$app->getVersion() ?>
              </li>
              <li class="list-group-item "> <span class="badge bg-info">&nbsp;&nbsp;</span> <strong>Web Server</strong>:
                <?= $info['OPERATING_ENVIRONMENT'] ?>
              </li>
              <li class="list-group-item "> <span class="badge bg-info">&nbsp;&nbsp;</span> <strong>PHP版本</strong>:
                <?= $info['PHP_VERSION'] ?>
              </li>
              <li class="list-group-item"> <span class="badge bg-success">&nbsp;&nbsp;</span> <strong>
                数据库信息
                </strong>:
                <?= $info['DB_INFO'] ?>
              </li>
              <li class="list-group-item"> <span class="badge bg-success">&nbsp;&nbsp;</span> <strong>
                文件上传限制
                </strong>:
                <?= $info['UPLOAD_MAX_FILE_SIZE'] ?>
              </li>
              <li class="list-group-item"> <span class="badge bg-success">&nbsp;&nbsp;</span> <strong>
                脚本超时限制
                </strong>:
                <?= $info['MAX_EXECUTION_TIME'] ?>
              </li>
              <li class="list-group-item"> <span class="badge bg-danger">&nbsp;&nbsp;</span> <strong>
                PHP执行方式
                </strong>:
                <?= $info['PHP_RUN_MODE'] ?>
              </li>
            </ul>
            
            
          </div>
        </div>
    </div>
</div>

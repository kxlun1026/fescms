<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>

<div class="row m-t-20">
	<!-- begin col-3 -->
	<div class="col-md-3 col-xs-6">
		<div class="widget widget-stats bg-green p-20">
			<div class="stats-icon"><i class="fa fa-users"></i></div>
			<div class="stats-info">
				<h4>用户</h4>
				<p>3,291,922</p>	
			</div>
		</div>
	</div>
	<!-- end col-3 -->
	<!-- begin col-3 -->
	<div class="col-md-3 col-xs-6">
		<div class="widget widget-stats bg-blue p-20">
			<div class="stats-icon"><i class="fa fa-desktop"></i></div>
			<div class="stats-info">
				<h4>参赛报名</h4>
				<p>20.44%</p>	
			</div>
		</div>
	</div>
	<!-- end col-3 -->
	<!-- begin col-3 -->
	<div class="col-md-3 col-xs-6">
		<div class="widget widget-stats bg-purple p-20">
			<div class="stats-icon"><i class="fa fa-file-text"></i></div>
			<div class="stats-info">
				<h4>文章</h4>
				<p>1,291,922</p>	
			</div>
		</div>
	</div>
	<!-- end col-3 -->
	<!-- begin col-3 -->
	<div class="col-md-3 col-xs-6">
		<div class="widget widget-stats bg-red p-20">
			<div class="stats-icon"><i class="fa fa-paperclip"></i></div>
			<div class="stats-info">
				<h4>附件</h4>
				<p>00:12:23</p>	
			</div>
		</div>
	</div>
	<!-- end col-3 -->
</div>


<div class="row m-t-20">
    <div class="col-sm-6">
        <div class="card">
          <div class="card-header">
            <h4>个人信息</h4>
          </div>
          <div class="card-body p-20">
            <div class="media media-sm">
				<a href="javascript:;" class="pull-left">
					<img src="statics/images/user-13.jpg" class="media-object rounded-corner">
				</a>
				<div class="media-body">
					<h4 class="media-heading m-t-10">您好，<?= Yii::$app->getUser()->getIdentity()->username ?></h4>
					<p>角色：<?= Yii::$app->getUser()->getIdentity()->getRolesNameString()?></p>
				</div>
			</div>
			<hr>
            <ul class="list-group clear-list">
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
          <div class="card-body p-r-25 p-l-25">
            <ul class="list-group service-list">
              <li class="list-group-item "><span class="pull-right text-muted"><?= $info['OPERATING_ENVIRONMENT'] ?></span> <span class="badge bg-green">&nbsp;&nbsp;</span> <strong>Web Server</strong>:
                
              </li>
              <li class="list-group-item "><span class="pull-right text-muted"><?= $info['PHP_VERSION'] ?></span> <span class="badge bg-aqua">&nbsp;&nbsp;</span> <strong>PHP版本</strong>:
                
              </li>
              <li class="list-group-item"><span class="pull-right text-muted"><?= $info['DB_INFO'] ?></span> <span class="badge bg-blue">&nbsp;&nbsp;</span> <strong>
                数据库信息
                </strong>:
                
              </li>
              <li class="list-group-item"><span class="pull-right text-muted"><?= $info['UPLOAD_MAX_FILE_SIZE'] ?></span> <span class="badge bg-purple">&nbsp;&nbsp;</span> <strong>
                文件上传限制
                </strong>:
                
              </li>
              <li class="list-group-item"><span class="pull-right text-muted"><?= $info['MAX_EXECUTION_TIME'] ?></span> <span class="badge bg-red">&nbsp;&nbsp;</span> <strong>
                脚本超时限制
                </strong>:
                
              </li>
            </ul>
            
            
          </div>
        </div>
    </div>
</div>

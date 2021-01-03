<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\widgets\JsBlock;

$this->title = '';

?>
<div id="app">
	<div class="container my-5">
		<ul class="nav-step step-dots">
			<li class="nav-step-item complete" :class="{ 'active': step>=1 }"><span>创建团队</span><a href="javascript:;"></a></li>
			<li class="nav-step-item" :class="{ 'active': step>=2 }"><span>添加组员</span><a href="javascript:;"></a></li>
			<li class="nav-step-item" :class="{ 'active': step>=3 }"><span>添加指导老师</span><a href="javascript:;"></a></li>
			<li class="nav-step-item" :class="{ 'active': step>=4 }"><span>上传项目计划书</span><a href="javascript:;"></a></li>
		</ul>
		<div class="row justify-content-center mt-5">
			<div class="col-8">
				<?= Html::beginForm(['index'], 'post', ['id' => 'contestform', 'enctype' => 'multipart/form-data']) ?>
				<div class="tab-content" id="tabContent">
					<div class="tab-pane fade" :class="{ 'show active': step==1 }" id="step-1">
						<div class="form-group mb-5 pb-2 border-bottom">
							<h6><strong>请选择您要参加的赛事类型</strong></h6>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">选择参赛内容</label>
							<div class="col-sm-10">
							    <?= Html::activeDropDownList($model, 'type_id', ArrayHelper::map($types, 'id', 'name'), ['class' => 'form-control', 'v-model' => 'type',  'prompt' => '选择参赛内容']) ?>
								
							</div>
						</div>
						<div class="form-group row mb-5">
							<label class="col-sm-2 col-form-label">作品名称</label>
							<div class="col-sm-10">
								<?= Html::activeInput('text', $model, 'title', ['class' => 'form-control', 'v-model' => 'title', 'placeholder' => '请输入作品名称']) ?>
								
							</div>
						</div>
					</div>
					<div class="tab-pane fade" :class="{ 'show active': step==2 }" id="step-2">
						<div class="form-group pb-3 border-bottom">
							<h6><strong>添加团队成员！</strong></h6>
							<small class="form-text text-muted">
								(最多可以添加3个成员，个人组请不要添加，添加无效)
							</small>
						</div>
						<div class="form-inline">
							<input type="text" class="form-control mb-2 mr-sm-2" name="q" v-model="studentKeyword" placeholder="输入队友姓名">

							<button type="button" class="btn btn-primary mb-2" @click="searchStudent">查找</button>
						</div>
						<small class="form-text text-muted mb-3">
							输入队友姓名，点击“查找”按钮，等待查询结果，进行添加
						</small>
						<div class="py-2 px-3 mb-3 bg-light text-dark">待选队员</div>
						<div class="row cansai-userlist">
							<div class="col-6" v-for="(item,index) in studentData" :key="index">
								<div class="media">
									<img class="align-self-start mr-3" src="images/default_head.png">
									<div class="media-body">
										<h5>{{item.name}}</h5>
										<p>{{item.school}} {{item.college}}</p>
									</div>
									<div class="align-self-center ml-auto">
										<button type="button" class="btn btn-sm" :class="[item.selected == 1 ? 'btn-secondary' : 'btn-success']" :disabled="item.selected == 1" @click="selectUser(item)">+ 添加</button>
									</div>
								</div>
							</div>
						</div>
						<div class="py-2 px-3 mb-3 bg-light text-dark">已选队员</div>
						<div class="d-flex userselect">
							<div class="alert alert-success" v-for="(item,index) in selectedStudent">
								<button type="button" class="close" @click="cancelUser(item)">
									<span aria-hidden="true">&times;</span>
								</button>
								<div class="media">
									<img class="align-self-start mr-3" src="images/default_head.png">
									<div class="media-body">
										<h5>{{item.name}}</h5>
										<p>已添加</p>
									</div>

								</div>
							</div>
							
						</div>

					</div>
					<div class="tab-pane fade" :class="{ 'show active': step==3 }" id="step-3">
						
						<div class="form-group pb-3 border-bottom">
							<h6><strong>添加指导老师</strong></h6>
							<small class="form-text text-muted">
								(每组可填加 0-2名指导老师)
							</small>
						</div>
						<div class="form-inline">
							<input type="text" class="form-control mb-2 mr-sm-2" name="q" v-model="teacherKeyword" placeholder="输入老师姓名">
						
							<button type="button" class="btn btn-primary mb-2" @click="searchTeacher">查找</button>
						</div>
						<small class="form-text text-muted mb-3">
							输入老师姓名，点击“查找”按钮，等待查询结果，进行添加
						</small>
						<div class="py-2 px-3 mb-3 bg-light text-dark">待选老师</div>
						<div class="row cansai-userlist">
							<div class="col-6" v-for="(item,index) in teacherData">
								<div class="media">
									<img class="align-self-start mr-3" src="images/default_head.png">
									<div class="media-body">
										<h5>{{item.name}}</h5>
										<p>{{item.company}} {{item.teaching}}</p>
									</div>
									<div class="align-self-center ml-auto">
										<button type="button" class="btn btn-sm" :class="[item.selected == 1 ? 'btn-secondary' : 'btn-success']" :disabled="item.selected == 1" @click="selectUser(item,1)">+ 添加</button>
									</div>
								</div>
							</div>
						</div>
						<div class="py-2 px-3 mb-3 bg-light text-dark">已选老师</div>
						<div class="d-flex userselect">
							<div class="alert alert-success" v-for="(item,index) in selectedTeacher">
								<button type="button" class="close" @click="cancelUser(item,1)">
									<span aria-hidden="true">&times;</span>
								</button>
								<div class="media">
									<img class="align-self-start mr-3" src="images/default_head.png">
									<div class="media-body">
										<h5>{{item.name}}</h5>
										<p>已添加</p>
									</div>
						
								</div>
							</div>
							
						</div>
					</div>
					<div class="tab-pane fade" :class="{ 'show active': step==4 }" id="step-4">
						<div class="form-group pb-3 border-bottom">
							<h6><strong>上传报名计划书</strong></h6>
							<small class="form-text text-muted">
								(未上传项目计划书则无法完成报名，组长可在“我的组队”中确认是否功能提交报名)
							</small>
						</div>
						<div class="form-group">
							<label>上传文件</label>
							<div class="custom-file">
								<?= Html::activeInput('file', $model, 'file', ['class' => 'custom-file-input', 'v-on:change' => 'getFile']) ?>
								<label class="custom-file-label" for="customFile">选择文件</label>
							</div>
							<small id="passwordHelpBlock" class="form-text text-muted">
                              
                            </small>
						</div>
					</div>
				</div>
				<hr>
				<div class="text-right">
					<button type="button" class="btn btn-info mr-3" v-if="prevStatus" @click="prev">上一步</button>
					<button type="button" class="btn btn-primary" v-if="nextStatus" @click="next">下一步</button>
					<button type="button" class="btn btn-primary" v-if="step==4" @click="submitBuyForm">确认提交</button>
				</div>
				<input type="hidden" name="student" >
				<?= Html::activeInput('hidden', $model, 'student', ['v-model' => 'student']) ?>
				<?= Html::activeInput('hidden', $model, 'teacher', ['v-model' => 'teacher']) ?>
				<?= Html::endForm() ?>
			</div>
		</div>


	</div>
</div>
<?php JsBlock::begin() ?>
<script>
	var ticket = {
		name: '',
		mobile: '',
		email: ''
	};
	var a, b;
	a = [1,2];
	b = a.join(",");
	console.log(b);
	var vm = new Vue({
		el: '#app',
		data: {
			studentData: [],
			selectedStudent: [],
			studentKeyword:'',
			students:[],
			teacherData: [],
			selectedTeacher: [],
			teacherKeyword:'',
			teachers:[],
			//student:'',
			//teacher:'',
			step:1,
			prevStatus:false,
			nextStatus:true,
			type:'',
			title:'',
			upFile:'',
		},
		computed: {
			student: function () {
				return this.students.join(',')
			},
			teacher: function () {
				return this.teachers.join(',')
			}
		},
		methods: {
			prev() {
				this.step--;
				if(this.step == 1){
					this.prevStatus = false;
				}else{
					this.prevStatus = true;
				}
				this.nextStatus = true;
			},
			next() {
				switch(this.step){
					case 1:
					if(this.type == 0 || !this.title){
						swal({text:'参赛内容和作品名称不能为空',icon:'error',buttons: false,timer: 2000,});
						return false;
					}
					break;
				}
				this.step++;
				if(this.step > 1 && this.step < 4){
					this.nextStatus = true;
					this.prevStatus = true;
				}else{
					this.nextStatus = false;
				}
			},
			searchStudent() {
				var that = this;
				$.getJSON("<?=Url::toRoute(['search'])?>",{role:1,q:this.studentKeyword},function(res){
					const datas = res.data.map((item) => {
						return {
							id: item.id,
							name: item.fullname,
							school: item.profile.school,
							college: item.profile.college,
							selected: 0
						};
					});
					that.studentData = datas;
					console.log(JSON.stringify(that.studentData))
		        });
				/* let result = [
					{id:1,fullname:'所得税',school:'北京大学',college:'计算机工程学院'},
					{id:2,fullname:'的奋斗',school:'清华大学',college:'地理测绘工程学院'}
				];
				const data = result.map((item) => {
					return {
						id: item.id,
						name: item.fullname,
						school: item.school,
						college: item.college,
						selected: 0
					};
				});
				this.studentData = data;
				console.log(JSON.stringify(this.studentData)) */
				
			},
			searchTeacher() {
				var that = this;
				$.getJSON("<?=Url::toRoute(['search'])?>",{role:2,q:this.teacherKeyword},function(res){
					const datas = res.data.map((item) => {
						return {
							id: item.id,
							name: item.fullname,
							company: item.profile.company,
							teaching: item.profile.teaching,
							selected: 0
						};
					});
					that.teacherData = datas;
					console.log(JSON.stringify(that.teacherData))
		        });
				
			},
			selectUser(item, type = 0) {
				if(type == 0){
					this.students.push(item.id);
					this.selectedStudent.push(item);
				}else{
					this.teachers.push(item.id);
					this.selectedTeacher.push(item);
				}
				this.initData(item.id, 0, type);
				
			},
			cancelUser(item, type = 0){
				if(type == 0){
					for(let i = 0; i < this.selectedStudent.length; i++){
						if(this.selectedStudent[i].id == item.id){
							this.selectedStudent.splice(i,1);
						}
					}
				}else{
					for(let i = 0; i < this.selectedTeacher.length; i++){
						if(this.selectedTeacher[i].id == item.id){
							this.selectedTeacher.splice(i,1);
						}
					}
				}
				this.initData(item.id, 1, type);
			},
			initData(id, s = 0, type = 0){
				if(type == 0){
					for(let i = 0; i < this.studentData.length; i++){
						if(this.studentData[i].id == id){
							if(s == 0){
								this.studentData[i].selected = 1;
							}else{
								this.studentData[i].selected = 0;
							}
						}
					}
				}else{
					for(let i = 0; i < this.teacherData.length; i++){
						if(this.teacherData[i].id == id){
							if(s == 0){
								this.teacherData[i].selected = 1;
							}else{
								this.teacherData[i].selected = 0;
							}
						}
					}
				}
				console.log(JSON.stringify(this.studentData))
			},
			getFile(e){
				this.upFile = e.target.files[0].name
			},
			submitBuyForm(){
				if(!this.upFile){
					swal({text:'请选择上传的报名计划书',icon:'error',buttons: false,timer: 2000,});
					return false;
				}
				$('#contestform').submit();
			}
		},
	});
</script>
<?php JsBlock::end() ?>
		
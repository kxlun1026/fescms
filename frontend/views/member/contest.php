<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use common\widgets\JsBlock;

$this->title = '修改资料';
?>
<div class="container my-5">
	<div class="row">
		<div class="col-md-3">
		<?= $this->render('_left') ?>
		</div>
		<div class="col-md-9">
			<div class="card">
				<div class="card-body">
					<div class="headline d-flex justify-content-between">
						<h4 class="head-title">我的组队</h4>
					</div>
					<div class="mt-4">
					<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'attribute' => 'id',
            'headerOptions' => [
                'width' => '80'
            ]
        ],
        'num',
        'title',
        'student',
        'teacher',
        'status',
        [
            'class' => 'yii\grid\ActionColumn',
            'header' => '操作', 
            'template' => '{update} {delete}',
            'headerOptions' => [
                'width' => 90
            ], 
            'buttons' => [
                'update' => function ($url, $model, $key) {
                    return Html::a('<i class="fa fa-edit"></i> 编辑', $url, [
                        'class' => 'mr-3',
                        'title' => '编辑',
                        'data-pjax' => '0'
                    ]);
                },
                'delete' => function ($url, $model, $key) {
                    return Html::a('<i class="fa fa-trash"></i> 删除', [
                        'delete',
                        'id' => $key
                    ],
                    [
                        'class' => '',
                        'title' => '删除',
                        'data-method' => 'post',
                        'data-params' => '{"id":' . $key . '}',
                        'data' => [
                            'confirm' => '您确定要删除该数据吗？'
                        ]
                    ]);
                }
            ],
        ]
    ],
    'layout' => "{items}\n{summary}\n{pager}",
    'tableOptions' => [
        'class' => 'table table-bordered table-hover'
    ], 
    'showHeader' => true,
    'emptyText' => '暂时没有任何数据！',
    'emptyTextOptions' => [
        'style' => 'color:red;font-weight:bold'
    ],
    'showOnEmpty' => true,
    'pager' => [
        'firstPageLabel' => '首页',
        'prevPageLabel' => '上一页',
        'nextPageLabel' => '下一页',
        'lastPageLabel' => '尾页'
    ]
]);?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php JsBlock::begin()?>
<script>

</script>
<?php JsBlock::end()?>
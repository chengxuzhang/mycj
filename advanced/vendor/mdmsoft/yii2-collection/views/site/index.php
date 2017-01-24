<?php

use yii\helpers\Html;
use mdm\collection\RightAsset;
use mdm\collection\AutocompleteAsset;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = Yii::t('rbac-collection', 'Site');
$this->params['breadcrumbs'][] = $this->title;

AutocompleteAsset::register($this);// 注册js
RightAsset::register($this);// 注册js
?>

<style type="text/css">
div#rMenu {position:absolute; visibility:hidden; top:0; background-color: #555;text-align: left;padding: 2px;}
div#rMenu ul li{
	margin: 1px 0;
	padding: 0 5px;
	cursor: pointer;
	list-style: none outside none;
	background-color: #DFDFDF;
}
div.content_wrap {width: 100%;height:380px;}
div.content_wrap div.left{float: left;width: 100%;}
div.content_wrap div.right{float: right;width: 340px;}
div.zTreeDemoBackground {width:100%;height:370px;text-align:left;}

ul.ztree {margin-top: 10px;border: 1px solid #617775;background: #f0f6e4;width:100%;height:360px;overflow-y:scroll;overflow-x:auto;}
ul.log {border: 1px solid #617775;background: #f0f6e4;width:100%;height:170px;overflow: hidden;}
ul.log.small {height:45px;}
ul.log li {color: #666666;list-style: none;padding-left: 10px;}
ul.log li.dark {background-color: #E3E3E3;}

.ztree li span.button.add {margin-left:2px; margin-right: -1px; background-position:-144px 0; vertical-align:top; *vertical-align:middle}
</style>

	<SCRIPT type="text/javascript">
		<!--
		var setting = {
			view: {
				dblClickExpand: false,
				showLine: false,
				selectedMulti: false,
			},
			data: {
				simpleData: {
					enable: true
				}
			},
			callback: {
				beforeClick: function(treeId, treeNode) {
					var zTree = $.fn.zTree.getZTreeObj("treeDemo");
					if (treeNode.isParent) {
						zTree.expandNode(treeNode);
						return false;
					} else {
						// demoIframe.attr("src",treeNode.file + ".html");
						// return true;
						console.log('hi');
					}
				},
				// onClick: onClick,
			}
		};

		<?php
			echo 'var zNodes=[';
			foreach ($nodeData as $key => $val) {
				$id = $val["id"];
				$pid = $val['pid'];
				$name = $val['name'];
				$iconSkin = $val['type']==10?'pIcon01':'icon01';
				$type = $val['type'];
				echo '{ id:'.$id.', pId:'.$pid.', name:"'.$name.'", open:true, iconSkin:"'.$iconSkin.'", type:'.$type.'},';
			}
			echo '];';
		?>

		function onClick(e,treeId, treeNode) {
			var zTree = $.fn.zTree.getZTreeObj("treeDemo");
			zTree.expandNode(treeNode);
			return false;
		}

		function postFun(data,that){
			if(data.status == 1){
				zNodes = [];
				$.each(data.data,function(k,v){
					var iconSkin = v.type==10?'pIcon01':'icon01';
					var node = {id:v.id,pId:v.pid,name:v.name,open:true,iconSkin:iconSkin,type:v.type};
					zNodes.push(node);
				});
				$.fn.zTree.init($("#treeDemo"), setting, zNodes);
				that.removeClass('disabled').attr('autocomplete','on').prop('disabled',false);
				$(".layui-layer-close").click();
				$("input[name='Node[name]']").val("");
			}
			if(data.status == 0){
				layer.msg(data.message,function(){
					that.removeClass('disabled').attr('autocomplete','on').prop('disabled',false);
				});
			}
		}

		function getFun(data){
			if(data.status == 1){
				zNodes = [];
				$.each(data.data,function(k,v){
					var iconSkin = v.type==10?'pIcon01':'icon01';
					var node = {id:v.id,pId:v.pid,name:v.name,open:true,iconSkin:iconSkin,type:v.type};
					zNodes.push(node);
				});
				$.fn.zTree.init($("#treeDemo"), setting, zNodes);
			}
			if(data.status == 0){
				layer.msg(data.message);
			}
		}

		$(document).ready(function(){
			$.fn.zTree.init($("#treeDemo"), setting, zNodes);
		});
		//-->
	</SCRIPT>


<script type="text/javascript">
$(function(){
	var menu = new BootstrapMenu('.node_name', {
	   fetchElementData: function($rowElem) {
	   	var data = $rowElem.data();
	    return data;
	  },
	  actionsGroups: [
	  	['createTask','createGroup'],
	  	['runTask','editTask'],
    	['deleteTask','deleteGroup'],
    	['renameNode'],
  	  ],
	  actions: {
		  createGroup:{
		  	iconClass:'fa-folder',
		    name: '新建分组',
		    onClick: function(row) {
				$("input[name='Node[pid]']").val(row.rowId);
				$("input[name='Node[type]']").val(10);
		      	layer.open({
				    type: 1,
				    title: '新建分组',
				    shadeClose: true,
				    skin: 'layui-layer-rim', //加上边框
				    shade: 0.3,
				    shade: false,
				    maxmin: false, //开启最大化最小化按钮
				    area: ['350px', '200px'],
				    scrollbar: false,
				    content: $("#createNode"),
			    });
		    },
	    isEnabled: function(row) {
	        return row.rowType==10?true:false;
	      }
		  },
		  createTask:{
		  	iconClass:'fa-plus',
		    name: '新建任务',
		    onClick: function(row) {
		    	$("input[name='Node[pid]']").val(row.rowId);
				$("input[name='Node[type]']").val(20);
		      	layer.open({
				    type: 1,
				    title: '新建任务',
				    shadeClose: true,
				    skin: 'layui-layer-rim', //加上边框
				    shade: 0.3,
				    shade: false,
				    maxmin: false, //开启最大化最小化按钮
				    area: ['350px', '200px'],
				    scrollbar: false,
				    content: $("#createNode"),
			    });
		    },
	    isEnabled: function(row) {
	        return row.rowType==10?true:false;
	      }
		  },
		editTask:{
			iconClass:'fa-pencil',
			name:'编辑规则',
			onClick:function(row){
				layer.open({
				    type: 2,
				    title: '编辑规则',
				    shadeClose: true,
				    skin: 'layui-layer-rim', //加上边框
				    shade: 0.3,
				    shade: false,
				    maxmin: true, //开启最大化最小化按钮
				    area: ['900px', '600px'],
				    scrollbar: false,
				    content: '<?= Url::to(['article/create']) ?>',
			    });
			},
	    isEnabled: function(row) {
	        return row.rowType==20?true:false;
	      }
		},
	  runTask:{
	  	iconClass:'fa-magnet',
	  	name:'开始采集',
	  	onClick:function(row){
	  		console.log(row);
	  	},
	    isEnabled: function(row) {
	        return row.rowType==20?true:false;
	      }
	  },
	  deleteTask:{
	  	iconClass:'fa-trash',
	    name: '删除任务',
	    onClick: function(row) {
	    	if(!confirm('确认要执行该操作吗?')){
                return false;
            }
            $.getJSON('<?= Url::to(['node/delete']) ?>',{id:row.rowId},function(data){
            	getFun(data);
            });
	    },
	    isShown: function(row) {
	        return row.rowType==20?true:false;
	      }
	  },
	  renameNode:{
	  	iconClass:'fa-sign-out',
	  	'name':'重命名',
	  	'onClick':function(row){
			$("#updateNode input[name='Node[name]']").val(row.rowName);
			$("form.form-update-node").attr("action","<?= Url::to(['node/update']) ?>?id="+row.rowId);
		    layer.open({
			    type: 1,
			    title: '重命名',
			    shadeClose: true,
			    skin: 'layui-layer-rim', //加上边框
			    shade: 0.3,
			    shade: false,
			    maxmin: false, //开启最大化最小化按钮
			    area: ['350px', '200px'],
			    scrollbar: false,
			    content: $("#updateNode"),
			});
	  	}
	  },
	  deleteGroup:{
	  	iconClass:'fa-trash',
	    name: '删除分组',
	    onClick: function(row) {
	    	if(!confirm('确认要执行该操作吗?')){
                return false;
            }
            $.getJSON('<?= Url::to(['node/delete']) ?>',{id:row.rowId},function(data){
            	getFun(data);
            });
	    },
	    isShown: function(row) {
	        return row.rowType==10?true:false;
	      }
	  }
	}
	});
})
</script>

<div class="article-index" style="overflow: hidden;">
	<div class="col-lg-3 col-md-3 col-sm-12 hidden-xs">
		<div class="content_wrap">
			<div class="btn-group">
				<?= Html::a('新建任务','javascript:;',['class'=>'btn btn-default btn-xs create-node','data-row-type'=>20]) ?>
				<?= Html::a('新建分组','javascript:;',['class'=>'btn btn-default btn-xs create-node','data-row-type'=>10]) ?>
			</div>
			<div class="zTreeDemoBackground left">
				<ul id="treeDemo" class="ztree"></ul>
			</div>
		</div>
	</div>

	<div class="col-lg-9 col-md-9 col-sm-12">
		<IFRAME ID="testIframe" Name="testIframe" FRAMEBORDER=0 SCROLLING=AUTO width=100% style="overflow: hidden;" SRC="<?= Url::to(['article/index']) ?>"></IFRAME>
	</div>
</div>

<div id="createNode" style="display: none;padding: 10px;">
	<?php $form = ActiveForm::begin([
		'action' => Url::to(['node/create']),
		'method' => 'post',
		'options' => ['class' => 'form-node'],
	]); ?>

    <?php // $form->field($nodeModel, 'pid')->textInput() ?>

    <?= $form->field($nodeModel, 'name')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($nodeModel, 'type')->textInput() ?>

    <div class="form-group">
    	<?php  echo Html::activeHiddenInput($nodeModel,'pid'); ?>
    	<?php  echo Html::activeHiddenInput($nodeModel,'type'); ?>
        <?= Html::submitButton($nodeModel->isNewRecord ? '保存' : '保存', ['class' => $nodeModel->isNewRecord ? 'btn btn-success ajax-post' : 'btn btn-primary ajax-post', 'target-form'=>'form-node']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<div id="updateNode" style="display: none;padding: 10px;">
	<?php $form = ActiveForm::begin([
		'action' => Url::to(['node/update']),
		'method' => 'post',
		'options' => ['class' => 'form-update-node'],
	]); ?>

    <?= $form->field($nodeModel, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($nodeModel->isNewRecord ? '保存' : '保存', ['class' => $nodeModel->isNewRecord ? 'btn btn-success ajax-post' : 'btn btn-primary ajax-post', 'target-form'=>'form-update-node']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<script type="text/javascript">
$(function(){
	$(".create-node").click(function(){
		var type = $(this).data('rowType');
		$("input[name='Node[pid]']").val(0);
		$("input[name='Node[type]']").val(type);
		layer.open({
			type: 1,
		    title: type==10?'新建分组':'新建任务',
		    shadeClose: true,
		    skin: 'layui-layer-rim', //加上边框
		    shade: 0.3,
		    shade: false,
		    maxmin: false, //开启最大化最小化按钮
		    area: ['350px', '200px'],
		    scrollbar: false,
		    content: $("#createNode"),
		});
	})
})
</script>
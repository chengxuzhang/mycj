<?php

use yii\helpers\Html;
use mdm\collection\RightAsset;
use mdm\collection\AutocompleteAsset;
use yii\helpers\Url;

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

		var zNodes =[
			{ id:1, pId:0, name:"根 Root", open:true, iconSkin:"pIcon01", type:10},
			{ id:11, pId:1, name:"父节点 1-1", open:true, iconSkin:"pIcon01", type:10},
			{ id:111, pId:11, name:"叶子节点 1-1-1", iconSkin:"icon01", type:20},
			{ id:112, pId:11, name:"叶子节点 1-1-2", iconSkin:"icon01", type:20},
			{ id:113, pId:11, name:"叶子节点 1-1-3", iconSkin:"icon01", type:20},
			{ id:114, pId:11, name:"叶子节点 1-1-4", iconSkin:"icon01", type:20},
			{ id:12, pId:1, name:"父节点 1-2", open:true, iconSkin:"pIcon01", type:10},
			{ id:121, pId:12, name:"叶子节点 1-2-1", iconSkin:"icon01", type:20},
			{ id:122, pId:12, name:"叶子节点 1-2-2", iconSkin:"icon01", type:20},
			{ id:123, pId:12, name:"叶子节点 1-2-3", iconSkin:"icon01", type:20},
			{ id:124, pId:12, name:"叶子节点 1-2-4", iconSkin:"icon01", type:20},
			{ id:133, pId:13, name:"2222", iconSkin:"icon01", type:20},
			{ id:13, pId:1, name:"父节点 1-3", open:true, iconSkin:"pIcon01", type:10},
			{ id:131, pId:13, name:"叶子节点 1-3-1", iconSkin:"icon01", type:20},
			{ id:132, pId:13, name:"叶子节点 1-3-2", iconSkin:"icon01", type:20},
			{ id:134, pId:13, name:"叶子节点 1-3-4", iconSkin:"icon01", type:20}
		];

		function onClick(e,treeId, treeNode) {
			var zTree = $.fn.zTree.getZTreeObj("treeDemo");
			zTree.expandNode(treeNode);
			return false;
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
		      console.log(row);
		    },
	    isEnabled: function(row) {
	        return row.rowType==10?true:false;
	      }
		  },
		  createTask:{
		  	iconClass:'fa-plus',
		    name: '新建任务',
		    onClick: function(row) {
		      console.log(row);
		    },
	    isEnabled: function(row) {
	        return row.rowType==10?true:false;
	      }
		  },
		editTask:{
			iconClass:'fa-pencil',
			name:'编辑规则',
			onClick:function(row){
				console.log(row);
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
	      console.log(row);
	    },
	    isShown: function(row) {
	        return row.rowGroup==1?false:true;
	      }
	  },
	  renameNode:{
	  	iconClass:'fa-sign-out',
	  	'name':'重命名',
	  	'onClick':function(row){
	  		console.log(row);
	  	}
	  },
	  deleteGroup:{
	  	iconClass:'fa-trash',
	    name: '删除分组',
	    onClick: function(row) {
	      console.log(row);
	    },
	    isShown: function(row) {
	        return row.rowGroup==1?true:false;
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
				<?= Html::a('新建任务','javascript:;',['class'=>'btn btn-default btn-xs']) ?>
				<?= Html::a('新建分组','javascript:;',['class'=>'btn btn-default btn-xs']) ?>
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

<div id="menu" style="display: none;">
	
</div>
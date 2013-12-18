<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>家餐网后台系统</title>
<meta name="keywords" content="" />
<meta name="description" content=" 家餐网后台  - jiacan.me" />
<meta name="generator" content="jiacan1.0" />
<meta name="author" content="jiacan" />
<meta name="copyright" content="2009-2012 jiacan" />
<meta name="MSSmartTagsPreventParsing" content="True" />
<meta http-equiv="MSThemeCompatible" content="Yes" />
<link rel="stylesheet" type="text/css" href="/mealOrdering/webcss/common/images/common.css"/>
<link rel="stylesheet" type="text/css" href="/mealOrdering/webcss/common/images/expand.css"/>
<link rel="stylesheet" type="text/css" href="/mealOrdering/webcss/admin/images/css.css"/>
<script src="<?php echo cls_config::get("dirpath","base");?>/common.php?app=sys&app_act=web.config&app_ajax=1"></script>
<script src="/mealOrdering/webcss/common/js/kj.js"></script>
<script src="/mealOrdering/webcss/common/js/kj.rule.js"></script>
<script src="/mealOrdering/webcss/common/js/kj.ajax.js"></script>
<script src="/mealOrdering/webcss/common/js/kj.dialog.js"></script>
<script src="/mealOrdering/webcss/common/js/kj.alert.js"></script>
<script src="/mealOrdering/webcss/common/js/kj.page.js"></script>
<script src="/mealOrdering/webcss/common/js/date.js"></script>
<script src="/mealOrdering/webcss/common/js/kj.pic.js"></script>
<script src="/mealOrdering/webcss/common/js/kj.windiv.js"></script>
<script src="/mealOrdering/webcss/admin/admin.js"></script>
<style>
body{overflow:hidden}
</style>
<?php if($app!='index'){?>
<script>
	kj.onload(function(){
		kj.handler(".pTxt1","focus",function(){
			kj.delClassName(this , "pTxt1");
			kj.addClassName(this , "pTxt2");
		});
		kj.handler(".pTxt1","blur",function(){
			kj.delClassName(this , "pTxt2");
			kj.addClassName(this , "pTxt1");
		});

		//设置 menu 移动效果
		kj.handler(".pMenu li","mouseover",function(){
			if(this.className == "" ) this.className = "z_sel";
		});
		kj.handler(".pMenu li","mouseout",function(){
			if(this.className == "z_sel" ) this.className = "";
		});
		//全选效果
		kj.handler(":selall","click",function(){
			var tr = kj.parent( "input<<name,selid[]" , "div");
			if(this.checked) {
				kj.addClassName(tr,'pRowSel');
				kj.set("input<<name,selid[]","checked",true);
				kj.set("input<<name,selid2[]","checked",true);
			} else {
				kj.delClassName(tr,'pRowSel');
				kj.set("input<<name,selid[]","checked",false);
				kj.set("input<<name,selid2[]","checked",false);
			}
		});
		kj.handler("input<<name,/^selid/i","click",function(){
			var tr = kj.parent( this , "div");
			if(this.checked) {
				kj.delClassName(tr,'pRowMove');
				kj.addClassName(tr,'pRowSel');
			} else {
				kj.delClassName(tr,'pRowSel');
			}
		});
		inc_resize();
	});

	//浏览器改变大小时调整大小
	kj.onresize(function() {
		inc_resize();
	});
	//框架宽高自适应
	function inc_resize() {
		if(kj.obj("#id_frame_main")){
			return;
		}
		var obj_table = kj.obj('#id_table');
		var lng_h = 0;
		if(kj.obj('#id_pMenu'))	lng_h += kj.h('#id_pMenu');
		if(kj.obj('#id_pPage'))	lng_h += kj.h('#id_pPage');
		if(kj.obj('#id_pFootAct'))	lng_h += kj.h('#id_pFootAct');
		if(kj.obj('#id_pMain_1'))	lng_h += kj.h('#id_pMain_1');
		var arr = kj.obj('.btnMenuDiv');
		for(var i = 0; i<arr.length; i++) {
			if(arr[i] && arr[i].style.display!='none')	lng_h += kj.h(arr[i]);
		}

		kj.h("#id_main" , document.documentElement.clientHeight - lng_h);
		kj.w("#id_main" , document.documentElement.clientWidth-10);
		if( kj.obj("#id_table_box") ) {
			var list_h = document.documentElement.clientHeight - lng_h - kj.h("#id_table_title") -15;
			kj.h("#id_table_list" , list_h);
			if(admin.table.list1 && admin.table.list1.w > document.documentElement.clientWidth-10) {
				//kj.w("#id_table_list" , admin.table.list1.w);
			} else {
				kj.w("#id_table_list" , document.documentElement.clientWidth-10);
			}
			//kj.w("#id_table" , document.documentElement.clientWidth-30);
			//当表表超出框架时，自滚动条样式
			var h1=kj.h("#id_table");
			if( list_h < h1 ) {
				kj.set("#id_table_list","style.overflowY","scroll");
			}
			kj.handler("#id_y_li li","mouseout",function(){
				if(this.className == "z_sel" ) this.className = "";
			});
		} else {
			//编辑页时默认显示滚动条
			kj.set("#id_main","style.overflowY","scroll");
		}
	}
	//弹框显示编辑页面
	function master_open(obj) {
		var app_act = "edit";
		if('app_act' in obj) app_act = obj.app_act;
		if( !('url' in obj) ) {
			var app = "<?php echo $app;?>";
			var app_module = "<?php echo $app_module;?>";
			var id = "<?php echo $get_id;?>";
			if('app' in obj) app = obj.app;
			if('app_module' in obj) app_module = obj.app_module;
			if('app_act' in obj) app_act = obj.app_act;
			if('id' in obj) id = obj.id;
			obj.url = "?app=" + encodeURIComponent(app) + "&app_module=" + encodeURIComponent(app_module) + "&app_act=" + encodeURIComponent(app_act) + "&id=" + id;
		}
		obj.id = '<?php echo $app_module;?>_<?php echo $app;?>_' + app_act + '_' + obj.id;
		obj.id = obj.id.replace(/\./g , '');
		parent.show_edit(obj);
	}
</script>
<?php }?>
</head>
<body scroll="no">
<a name="hash_start" style="float:left"></a>
<form name="frm_main" action="?" method="post">
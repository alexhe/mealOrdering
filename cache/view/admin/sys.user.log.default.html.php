<?php include cls_resolve::on_resolve('/admin\/header')?>
<div class="pMenu" id="id_pMenu">
	<li onclick="admin.act('');" class="sel">管理</li>
	<li onclick="admin.menu_display(0);" class = "btnMenu">查找</li>
	<li onclick="admin.menu_display(1);" class = "btnMenu">清理</li>
	<li class="fdpic" onclick="master_open({url:'common.php?app=config&app_module=user&dir=<?php echo $app_dir;?>&filename=sys&key=sys.user.log',title:'设置字段',w:400});">&nbsp;</li>
</div>
<div class="btnMenuDiv" id="id_btnMenuDiv"<?php if($arr_list['issearch']==0){?> style="display:none"<?php }?>>
<li>操作时间：<input type="text" name="s_time1" value="<?php echo fun_get::get('s_time1');?>" class='pTxtDate' onfocus="new Calendar().show(this);"> 到 <input type="text" name="s_time2" value="<?php echo fun_get::get('s_time2');?>" class='pTxtDate' onfocus="new Calendar().show(this);"></li>
<li>关 键 字：<input type="text" name="s_key" value="<?php echo fun_get::get('s_key');?>" class='pTxt1'>　<input type="button" name="btn_s_ok" value="查找" class="pBtn" onclick="admin.search();"> 　<input type="button" name="btn_s_clear" value="清空" class="pBtn" onclick="admin.clear_search();"></li>
</table>
</div>
<div class="btnMenuDiv" id="id_pDeleteDiv" style="display:none">
<li>时间：<input type="text" name="del_time1" value="<?php echo fun_get::get('del_time1');?>" class='pTxtDate' onfocus="new Calendar().show(this);"> 到 <input type="text" name="del_time2" value="<?php echo fun_get::get('del_time2');?>" class='pTxtDate' onfocus="new Calendar().show(this);"></li> 　<input type="button" name="btn_s_clear" value="清除" class="pBtn" onclick="admin.frm_ajax('delete');"></li>
</table>
</div>
<div class="pMain" id="id_main">
<div class="pTableBox" id="id_table_box">
	<div class='pTableTit' id="id_table_title">
		<?php foreach($arr_list["tabtit"] as $item){ ?>
			<li><span class="x_tit"<?php if($item["w"]>0){?> style="width:<?php echo $item["w"];?>px"<?php }?> onclick="admin.table.list1.sort('<?php echo $item['key'];?>')"><?php echo $item["name"];?>
			<?php if(isset($arr_list['sort'][$item['key']])){?><img src="/mealOrdering/webcss/admin/images/sort_<?php echo $arr_list['sort'][$item['key']];?>.png"><?php }?></span><span class="x_split"></span></li>
		<?php }?>
	</div>
	<div class="pTableList" id="id_table_list">
		<div class='pTable' id="id_table">
			<?php foreach($arr_list['list'] as $item){ ?>
			<div class='pTabRow'>
				<?php foreach($arr_list["tabtd"] as $field){ ?>
					<li><?php if(empty($item[$field])){?>&nbsp;<?php } else { ?><?php echo $item[$field];?><?php }?></li>
				<?php }?>
			</div>
			<?php }?>
		</div>
	</div>
</div>
</div>
<div class="pPage" id="id_pPage">
<?php echo $arr_list['pagebtns'];?>
</div>
<script src="/mealOrdering/webcss/admin/admin.table.js"></script>
<script>
//初始化表格控件
kj.onload(function(){
admin.table.list1.init('#id_table_title' , '#id_table');
});
//自动保存
admin.table.list1.save_resize = function() {
	var lng_w = (kj.w(this.field));
	kj.ajax.get("common.php?app=config&app_module=user&dir=<?php echo $app_dir;?>&app_act=save_resize&filename=sys&key=sys.user.log&index=" + this.fieldsindex + "&w=" + lng_w , function(data){
		//alert(data);
	});

}
admin.table.list1.sort = function(key) {
	kj.ajax.get("common.php?app=config&app_module=user&dir=<?php echo $app_dir;?>&filename=sys&app_act=sort&key=sys.user.log&sortby=" + key , function(data){
			var obj_data=kj.json(data);
			if(!obj_data.isnull) {
				admin.refresh();
			}
	});
}

</script>
<?php include cls_resolve::on_resolve('/admin\/footer')?>
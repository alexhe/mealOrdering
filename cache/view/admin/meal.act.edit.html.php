<?php include cls_resolve::on_resolve('/admin\/header')?>
<script>
//保存时效验规则
admin.rule['save'] =[
];
//店铺选择回调函数
function shop1_callback(o) {
	if("id" in o) kj.obj("#id_act_shop_id").value=o.id;
	if("name" in o) kj.obj("#id_act_shop").innerHTML = o.name;
	kj.hide("#windivshop_id_windiv");
}

</script>
<div class="pMenu" id="id_pMenu">
	<li class="sel" onclick="admin.edittabel(0);">基本信息</li>
</div>
<div class="pMain" id="id_main">
<input type="hidden" name="act_where_val" value="">
<input type="hidden" name="act_method_val" value="">
		<input type="hidden" name="act_shop_id" value="0" id="id_act_shop_id">
<table class='pEditTable'>
<tr class='pTabTitRow'><td class='pTabTitCol' colspan="2"></td></tr>
	<td class="pTabColName">名称：</td><td class="pTabColVal"><input type="input" name="act_name" value="<?php echo $editinfo['act_name'];?>" class='pTxt1 pTxtL150'></td>
	</tr>
<tr>
	<td class="pTabColName">开始时间：</td><td class="pTabColVal"><input type="input" name="act_starttime" value="<?php echo $editinfo['act_starttime'];?>" class='pTxt1 pTxtL150' onfocus="new Calendar().show(this);"></td>
	</tr>
<tr>
	<td class="pTabColName">结束时间：</td><td class="pTabColVal"><input type="input" name="act_endtime" value="<?php echo $editinfo['act_endtime'];?>" class='pTxt1 pTxtL150' onfocus="new Calendar().show(this);"></td>
	</tr>
<tr>
	<td class="pTabColName">条 件：</td>
	<td class="pTabColVal">
		<select name="act_where" onchange="thisjs.act_where(this.value);">
		<?php foreach($arr_where as $item=>$key){ ?>
			<option value="<?php echo $key;?>"<?php if($key==$editinfo['act_where']){?> selected<?php }?>><?php echo $item;?></option>
		<?php }?>
		</select><br><br>
		<span id="id_where_1" style="display:none"><input type="input" name="act_where_val_1" value="<?php if($editinfo['act_where']=='1'){?><?php echo $editinfo['act_where_val'];?><?php }?>" class='pTxt1 pTxtL60'>&nbsp;￥</span>
		<span id="id_where_2" style="display:none">
		<select name="act_where_val_2_1">
		<?php for($i=8;$i<24;$i++){ ?>
		<option value="<?php echo $i;?>00"<?php if(isset($editinfo['act_where_val1']) && $editinfo['act_where_val1']==$i*100){?> selected<?php }?>><?php echo $i;?>:00</option>
		<option value="<?php echo $i;?>30"<?php if(isset($editinfo['act_where_val1']) && $editinfo['act_where_val1']==($i*100+30)){?> selected<?php }?>><?php echo $i;?>:30</option>
		<?php }?>
		</select> 到 <select name="act_where_val_2_2">
		<?php for($i=8;$i<24;$i++){ ?>
		<option value="<?php echo $i;?>00"<?php if(isset($editinfo['act_where_val2']) && $editinfo['act_where_val2']==$i*100){?> selected<?php }?>><?php echo $i;?>:00</option>
		<option value="<?php echo $i;?>30"<?php if(isset($editinfo['act_where_val2']) && $editinfo['act_where_val2']==($i*100+30)){?> selected<?php }?>><?php echo $i;?>:30</option>
		<?php }?>
		</select>
		</span>
		<span id="id_where_3" style="display:none"><input type="input" name="act_where_val_3" value="<?php if($editinfo['act_where']=='3'){?><?php echo $editinfo['act_where_val'];?><?php }?>" class='pTxt1 pTxtL60'>&nbsp;份</span>
		<span id="id_where_4" style="display:none">
		<select name="act_where_val_4_1">
		<?php for($i=8;$i<24;$i++){ ?>
		<option value="<?php echo $i;?>00"<?php if(isset($editinfo['act_where_val1']) && $editinfo['act_where_val1']==$i*100){?> selected<?php }?>><?php echo $i;?>:00</option>
		<option value="<?php echo $i;?>30"<?php if(isset($editinfo['act_where_val1']) && $editinfo['act_where_val1']==($i*100+30)){?> selected<?php }?>><?php echo $i;?>:30</option>
		<?php }?>
		</select> 到 <select name="act_where_val_4_2">
		<?php for($i=8;$i<24;$i++){ ?>
		<option value="<?php echo $i;?>00"<?php if(isset($editinfo['act_where_val2']) && $editinfo['act_where_val2']==$i*100){?> selected<?php }?>><?php echo $i;?>:00</option>
		<option value="<?php echo $i;?>30"<?php if(isset($editinfo['act_where_val2']) && $editinfo['act_where_val2']==($i*100+30)){?> selected<?php }?>><?php echo $i;?>:30</option>
		<?php }?>
		</select>
		&nbsp;&nbsp;<input type="input" name="act_where_val_4_3" value="<?php if($editinfo['act_where']=='4'){?><?php echo $editinfo['act_where_val3'];?><?php }?>" class='pTxt1 pTxtL60'>&nbsp;份
		</span>
		<span id="id_where_5" style="display:none">
		<select name="act_where_val_5">
			<option value="01">明天</option>
			<option value="02">后天</option>
		</select>
		</span>
	</td></tr>
<tr>
	<td class="pTabColName">优 惠：</td>
	<td class="pTabColVal">
		<select name="act_method" onchange="thisjs.act_method(this.value);">
		<?php foreach($arr_method as $item=>$key){ ?>
			<option value="<?php echo $key;?>"<?php if($key==$editinfo['act_method']){?> selected<?php }?>><?php echo $item;?></option>
		<?php }?>
		</select><br><br>
		<span id="id_method_1" style="display:none"><input type="input" name="act_method_val_1" value="<?php if($editinfo['act_method']=='1'){?><?php echo $editinfo['act_method_val'];?><?php }?>" class='pTxt1 pTxtL200'></span>
		<span id="id_method_2" style="display:none"><input type="input" name="act_method_val_2" value="<?php if($editinfo['act_method']=='2'){?><?php echo $editinfo['act_method_val'];?><?php }?>" class='pTxt1 pTxtL60'>&nbsp;折</span>
		<span id="id_method_3" style="display:none"><input type="input" name="act_method_val_3" value="<?php if($editinfo['act_method']=='3'){?><?php echo $editinfo['act_method_val'];?><?php }?>" class='pTxt1 pTxtL60'>&nbsp;分</span>
		<span id="id_method_4" style="display:none"><input type="input" name="act_method_val_4" value="<?php if($editinfo['act_method']=='4'){?><?php echo $editinfo['act_method_val'];?><?php }?>" class='pTxt1 pTxtL60'>&nbsp;倍</span>
		<span id="id_method_5" style="display:none"><input type="input" name="act_method_val_5" value="<?php if($editinfo['act_method']=='5'){?><?php echo $editinfo['act_method_val'];?><?php }?>" class='pTxt1 pTxtL60'>&nbsp;￥</span>
		<span id="id_method_6" style="display:none"><input type="input" name="act_method_val_6" value="<?php if($editinfo['act_method']=='6'){?><?php echo $editinfo['act_method_val'];?><?php }?>" class='pTxt1 pTxtL60'>&nbsp;￥</span>
	</td></tr>
<tr>
	<td class="pTabColName">状 态：</td>
	<td class="pTabColVal">
		<select name="act_state">
		<?php foreach($arr_state as $item=>$key){ ?>
			<option value="<?php echo $key;?>"<?php if($key==$editinfo['act_state']){?> selected<?php }?>><?php echo $item;?></option>
		<?php }?>
		</select>
	</td></tr>
<tr>
	<td class="pTabColName">备注：</td><td class="pTabColVal"><textarea cols="50" rows="5" name="act_beta" class='pTxt1'><?php echo $editinfo['act_beta'];?></textarea></td>
	</tr>

</table>
</div>
<div class="pFootAct" id="id_pFootAct">
	<li>
	<input type="button" name="dosubmit" value="保存" onclick="thisjs.save();" class="pBtn">
	</li>
</div>
<script>
var thisjs = new function() {
	this.act_where = function(val) {
		(val == '1')? kj.show('#id_where_1') : kj.hide('#id_where_1');
		(val == '2')? kj.show('#id_where_2') : kj.hide('#id_where_2');
		(val == '3')? kj.show('#id_where_3') : kj.hide('#id_where_3');
		(val == '4')? kj.show('#id_where_4') : kj.hide('#id_where_4');
		(val == '5')? kj.show('#id_where_5') : kj.hide('#id_where_5');
	}
	this.act_method = function(val) {
		(val == '1')? kj.show('#id_method_1') : kj.hide('#id_method_1');
		(val == '2')? kj.show('#id_method_2') : kj.hide('#id_method_2');
		(val == '3')? kj.show('#id_method_3') : kj.hide('#id_method_3');
		(val == '4')? kj.show('#id_method_4') : kj.hide('#id_method_4');
		(val == '5')? kj.show('#id_method_5') : kj.hide('#id_method_5');
		(val == '6')? kj.show('#id_method_6') : kj.hide('#id_method_6');
	}
	this.save = function() {
		var where = document.frm_main.act_where.value;
		var method = document.frm_main.act_method.value;
		if(where == 2) {
			//指定时间，用逗号分隔
			document.frm_main.act_where_val.value = document.frm_main.act_where_val_2_1.value+","+ document.frm_main.act_where_val_2_2.value;
		} else if(where == 4) {
			document.frm_main.act_where_val.value = document.frm_main.act_where_val_4_1.value+","+ document.frm_main.act_where_val_4_2.value+","+ document.frm_main.act_where_val_4_3.value;
		} else {
			document.frm_main.act_where_val.value = document.frm_main['act_where_val_'+where].value;
		}
		document.frm_main.act_method_val.value = document.frm_main['act_method_val_'+method].value;
		admin.frm_ajax('save');
	}
}
kj.onload(function(){
	thisjs.act_where(document.frm_main.act_where.value);
	thisjs.act_method(document.frm_main.act_method.value);
});
</script>
<?php include cls_resolve::on_resolve('/admin\/footer')?>
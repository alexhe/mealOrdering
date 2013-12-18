<?php include cls_resolve::on_resolve('/admin\/header')?>
<style>
.shop5{float:left;width:680px;margin-bottom:20px;text-align:left}
.shop5 .x_tit{float:left;width:680px;border-bottom:1px #ff8800 solid;padding-bottom:10px;margin-bottom:10px}
.shop5 .x_li1{float:left;width:650px;padding:0px 0px 0px 30px}
.shop5 .x_li1 li{float:left;margin:3px 10px 0px 0px}
.shop5 .x_li1 .x_col1{color:#0000ff}
.shop5 .x_li1 .x_col2{float:right;width:100px}
.shop5 .x_li1 .x_col3{float:right;width:100px;color:#ff0000;font-size:18px}
.shop5 .x_info1{float:left;width:650px;padding:5px 0px 0px 30px;line-height:30px;}
.shop5 .x_info2{float:left;width:650px;padding:5px 0px 0px 30px;line-height:30px;border:1px #cccccc dotted;background:#f8f8f8}
</style>
<div class="pMain" id="id_main">
	<div class="shop5" style="margin-top:20px">
		<div class="x_tit"><font style="color:#ff8800"><?php echo $order_list['detail']['order_time'];?></font></div>
		<?php foreach($order_list['detail']['menu'] as $menu){ ?>
			<div class="x_li1">
				<li class="x_col1">
				<?php $price=0;?>
				<?php foreach($menu['id'] as $item_menu){ ?>
					<?php $price+=$order_list['price']['id_'.$item_menu];?>
					<?php echo $order_list['menu']['id_'.$item_menu]['menu_title'];?>&nbsp;&nbsp;
				<?php }?>
				</li>
				<li class="x_col3">￥<?php echo $price*$menu['num'];?></li>
				<li class="x_col2"><?php echo $menu['num'];?>份</li>
			</div>
		<?php }?>
		<div class="x_info1">总计 ￥<?php echo $order_list['detail']['order_total'];?><?php if(!empty($order_list['detail']['order_score_money'])){?> - 抵扣 ￥<?php echo $order_list['detail']['order_score_money'];?><?php }?><?php if(!empty($order_list['detail']['order_favorable'])){?> - 优惠 ￥<?php echo $order_list['detail']['order_favorable'];?><?php }?> = 应收：<font class="txt_redB" style='font-size:18px'>￥<?php echo $order_list['detail']['order_total_pay'];?></font>
		<br>送餐时间：<font class="txt_redB"><?php echo $order_list['time'];?> <?php echo $order_list['day'];?></font>
		<?php if(!empty($order_list['detail']['order_ticket'])){?>
		<br><font>索取发票：￥<?php echo $order_list['detail']['order_ticket'];?></font>
		<?php }?>
		</div>
		<div class="x_info2">
		<?php echo $order_list['detail']['order_name'];?>/<?php echo $order_list['detail']['order_sex'];?><br><?php echo $order_list['detail']["order_area"];?> — <?php echo $order_list['detail']['order_louhao1'];?> <?php if(!empty($order_list['detail']['order_company'])){?> —<?php echo $order_list['detail']['order_company'];?><?php if(!empty($order_list['detail']['order_depart'])){?>/<?php echo $order_list['detail']['order_depart'];?><?php }?><?php }?>
		<br><?php if(!empty($order_list['detail']['order_tel'])){?>固话：<?php echo $order_list['detail']['order_tel'];?><?php if(!empty($order_list['detail']['order_telext'])){?> 转 <?php echo $order_list['detail']['order_telext'];?><?php }?><?php }?><?php if(!empty($order_list['detail']['order_tel']) && !empty($order_list['detail']['order_mobile'])){?> / <?php }?><?php if(!empty($order_list['detail']['order_mobile'])){?>手机：<?php echo $order_list['detail']['order_mobile'];?><?php }?>
		<?php if(!empty($order_list['detail']['order_act_ids'])){?>
		<br><span style="color:#ff8800"><?php echo $order_list['detail']['order_act_ids'];?></span>
		<?php }?>
		</div>
		<div class="x_info1">
				<br><br>
		<input type="button" name="btnedit" value="打印" onclick="thisjs.print();" class="pBtn">&nbsp;
		</div>
	</div>
</div>
<script>
var thisjs = new function() {
	this.print = function() {
		vReturnValue = window.showModelessDialog('/common.php?app_module=meal&app=call&app_act=print&order_id=<?php echo fun_get::get("id");?>', 'win_print', "dialogHeight:500px;dialogWidth:<?php echo $print_width;?>px");
	}
}
</script>
<?php include cls_resolve::on_resolve('/admin\/footer')?>
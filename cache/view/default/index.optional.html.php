<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo cls_config::get("site_title","sys");?>-店铺管理</title>
<meta name="keywords" content="<?php echo cls_config::get("keywords","sys");?>"/>
<meta name="description" content="<?php echo cls_config::get("description","sys");?>"/>
<link rel="stylesheet" type="text/css" href="/mealOrdering/webcss/common/images/common.css"/>
<link rel="stylesheet" type="text/css" href="/mealOrdering/webcss/common/images/expand.css"/>
<link rel="stylesheet" type="text/css" href="/mealOrdering/webcss/default/images/css.css"/>
<script src="<?php echo cls_config::get("dirpath","base");?>/common.php?app=sys&app_act=web.config&app_ajax=1"></script>
<script src="/mealOrdering/webcss/common/js/kj.js"></script>
<script src="/mealOrdering/webcss/common/js/kj.dialog.js"></script>
</head>
<body>
<?php include cls_resolve::on_resolve('/default\/header')?>
<div class="main">
	<div class="right">
		<div class="x_topbg">&nbsp;</div>
		<div class="x_box1">
			<div class="x_tit">订餐时间</div>
			<div class="x_cont">
			<li>午餐：9:00 - 13:00</li>
			<li>晚餐：17:00 - 19:30</li>
			<li>注：周末或其他时间用餐，请提前来电</li>
			<li>电话订餐：0755-8888888</li>
			</div>
		</div>
		<div class="x_bootbg">&nbsp;</div>
		<div class="h_3">&nbsp;</div>
		<div class="x_topbg">&nbsp;</div>
		<div class="x_list1">
			<li class="x_tit">活动公告</li>
			<?php foreach($arr_activitie as $item){ ?>
			<li><a href="?app_act=news.view&id=<?php echo $item['article_id'];?>" target="_blank"><?php echo $item['article_title'];?></a></li>
			<?php }?>
		</div>
		<div class="x_bootbg">&nbsp;</div>
		<div class="h_3" id="id_cart_position">&nbsp;</div>
		<div style="float:left;width:241px" id="id_cart">
			<div class="x_topbg">&nbsp;</div>
			<div class="cart_float">
				<div class="cart_tit">我的饭盒</div>
					<div class="cart_box">
						<div class="x_box" id="id_cart_box">
						</div>
						<div class="x_info a1" id="id_cart_info"></div>
						<div class="x_btn"><input type="button" name="btn_new" value="增加一人" class="btn_bg1" onclick="thisjs.cart_new(true);">&nbsp;&nbsp;<input type="button" name="btn_ok" value="提交订单" class="btn_bg1" onclick="thisjs.cart_submit();"></div>
					</div>
			</div>
			<div class="x_bootbg">&nbsp;</div>
		</div>
	</div>
	<?php foreach($arr_menu["list"] as $item){ ?>
	<div class="div_tit2 main_w2"><span class="x_l"><h4><?php echo $item["name"];?></h4></span></div>
	<div class="div_menu1 main_w3">
		<?php foreach($item['list'] as $menu){ ?>
			<div class="x_box<?php if(!empty($menu['menu_attribute'])){?> menu_tips_<?php echo $menu['menu_attribute'];?><?php }?>"<?php if($menu['num']>0&&$cfg_opentime['nowindex']>0){?> onmouseover="kj.addClassName(this,'x_sel');" onmouseout="kj.delClassName(this,'x_sel');" onclick="thisjs.cart_add({id:'<?php echo $menu['menu_id'];?>',name:'<?php echo $menu['menu_title'];?>',pic:'<?php echo $menu['menu_pic_small'];?>',price:'<?php echo $menu['menu_price'];?>',type:'<?php echo $menu['menu_type'];?>'});"<?php } else { ?>style='cursor:default'<?php }?>>
				<li class='x_tit'>【<?php echo $menu['menu_title'];?>】</li>
				<li class='x_intro'>主料：<?php echo $menu['menu_intro'];?></li>
				<li class='x_pic'><img src="<?php echo $menu['menu_pic'];?>"></li>
				<li class='x_tip<?php if($cfg_opentime['nowindex']>0){?><?php if($menu['num']>0){?> menu_state_on<?php } else { ?> menu_state_off<?php }?><?php } else if($cfg_opentime['havenext']==1) { ?> menu_state_wait<?php } else { ?> menu_state_tomorrow<?php }?>'><font style="font-size:40px;"><?php echo $menu['price_int'];?></font>.<?php echo $menu['price_float'];?></li>
			</div>
		<?php }?>
	</div>
	<?php }?>
</div>
<script>
var thisjs = new function() {
	this.defaulttop = 0;
	this.defaultleft = 0;
	//配置信息:minprice = 单份订单最小价格 , 单份订单最多菜品数 , 单份订单最多菜数(不算饭与汤)
	this.cfg = {minprice:<?php echo $optional_select['minprice'];?> ,maxnum:<?php echo $optional_select['maxnum'];?> , maxcainum:<?php echo $optional_select['maxcainum'];?> , mintotal:<?php echo $optional_select['mintotal'];?>};
	//默认加载米饭
	<?php if(isset($menu_rice['menu_id'])){?>
		this.rice = {id:'<?php echo $menu_rice['menu_id'];?>',name:'<?php echo $menu_rice['menu_title'];?>',pic:'<?php echo $menu_rice['menu_pic_small'];?>',price:'<?php echo $menu_rice['menu_price'];?>',type:'<?php echo $menu_rice['menu_type'];?>'};
	<?php } else { ?>
		this.rice = false;
	<?php }?>
	this.cart = [];
	this.index = -1;
	this.total = 0;
	this.cart_add = function(o) {
		var ii , i ;
		var index = this.cart[this.index].length;
		//规则检测
		if(index >= this.cfg.maxnum) {
			alert("温馨提示：为了您的健康，我们建议您单人用餐 最好不要超过" + this.cfg.maxnum + "种！");
			return;
		}
		if(o.type == 3) {
			ii = 0;
			for(i = 0; i < index ; i++) {
				if(this.cart[this.index][i].type == 3) ii++;
			}
			if(ii >= this.cfg.maxcainum) {
				alert("温馨提示：为了您的健康，我们建议您用餐 菜品 最好控制在" + this.cfg.maxcainum + "种以内！");
				return;
			}
		}
		//检查如果是套餐,并且此次已经点有餐时，则自动增加一人用餐
		if(index>0 && (o.type==6 || this.cart[this.index][0].type==6)) {
			if(!this.cart_new(false)) return false;
			index = 0;
		}
		this.cart[this.index][index] = o;
		var objbox = kj.obj("#id_cart_box");
		//添加选中菜品缩略图
		var html = '';
		if( o.type==6) {
			html = '<li class="x_menu2" style="background:url'+'(' + o.pic + ') no-repeat;" onmouseover="kj.show(kj.obj(\'img\',this));"  onmouseout="kj.hide(kj.obj(\'img\',this));" onclick="thisjs.cart_del('+index+')" title="'+o.name+'"><img src="/mealOrdering/webcss/default/images/btn_del.gif" style="display:none"></li>';
		} else {
			html = '<li class="x_menu" style="background:url'+'(' + o.pic + ') no-repeat;" onmouseover="kj.show(kj.obj(\'img\',this));"  onmouseout="kj.hide(kj.obj(\'img\',this));" onclick="thisjs.cart_del('+index+')" title="'+o.name+'"><img src="/mealOrdering/webcss/default/images/btn_del.gif" style="display:none"></li>';
			//非第三个时，显示加号
			i = index+1;
			if(i%3 != 0) html += '<li class="x_plus">&nbsp;</li>';
		}
		objbox.innerHTML = objbox.innerHTML + html;
		//总金额加
		this.total += kj.toint(o.price);
		this.refresh_info();
	}
	//新增一人 , type=3 表示套餐，不加饭
	this.cart_new = function(rice) {
		var price = 0;
		//检查当前订餐是否合格
		if(this.index>=0) {
			for(i = 0; i < this.cart[this.index].length ; i++) {
				price+=kj.toint(this.cart[this.index][i].price);
			}
			if(price < this.cfg.minprice) {
				alert("温馨提示：单份消费价格不得低于"+this.cfg.minprice+"元，不便之处还请您多多包涵！");
				return false;
			}
		}
		this.index=this.cart.length;
		this.cart[this.cart.length] = [];
		var objbox = kj.obj("#id_cart_box");
		objbox.innerHTML = '';
		//自动加饭
		if(rice && this.rice) {
			this.cart_add(this.rice);
		} else {
			this.refresh_info();
		}
		return true;
	}
	//删除选中菜品
	this.cart_del = function(index) {
		//总金额减
		this.total -= kj.toint(this.cart[this.index][index].price);
		this.cart[this.index].removeat(index);
		this.cart_go(this.index);
	}
	//刷新提示信息
	this.refresh_info = function() {
		var arr_act=[], html_act = '';
		var type_1=0,type_2=0,type_3=0,price=0;
		var len = this.cart[this.index].length;
		index = this.index;
		var num = index+1;
		var totalnum = this.cart.length;
		//if(totalnum==1 && this.cart[this.index].length<1) totalnum = 0;
		for(var i = 0 ; i < len ; i++) {
			if(this.cart[index][i].type==1) {
				type_1++;
			} else if(this.cart[index][i].type==2) {
				type_2++;
			} else if(this.cart[index][i].type==3) {
				type_3++;
			}
			price+=kj.toint(this.cart[this.index][i].price);
		}
		var html = '第'+num+'份餐&nbsp;&nbsp;<font color="#888888">';
		if(this.cart[this.index].length>0) arr_act[arr_act.length] = '<a href="javascript:thisjs.cart_remove();">删除</a>';
		if(num>1) arr_act[arr_act.length] = '<a href="javascript:thisjs.cart_go('+(num-2)+');">上份</a>';
		if(num < totalnum) arr_act[arr_act.length] = '<a href="javascript:thisjs.cart_go('+(num)+');">下份</a>';
		if(arr_act.length>0) html_act='[ '+arr_act.join("，")+' ]';
		if(this.cart[this.index].length>0 && this.cart[this.index][0].type==6) {
			html += html_act + '<br><font color="#0000ff">套餐金额：'+price+'元</font><br>共'+totalnum+'份，总金额：'+this.total+'元';
		} else{
			html +=html_act+'<br>用餐标准：'+type_3+'菜'+type_2+'汤'+type_1+'饭'
			html += '<br>小计金额：'+price+'元<br>共'+totalnum+'份，总金额：'+this.total+'元';
		}
		var objbox = kj.obj("#id_cart_info");
		objbox.innerHTML = html;
	}
	//跳到指定餐
	this.cart_go = function(index) {
		this.index = index;
		var len = this.cart[this.index].length;
		html = '';
		for(var i = 0 ; i < len ; i++) {
			if(this.cart[this.index][0].type!=6) {
				html += '<li class="x_menu" style="background:url'+'(' + this.cart[this.index][i].pic + ') no-repeat;" onmouseover="kj.show(kj.obj(\'img\',this));"  onmouseout="kj.hide(kj.obj(\'img\',this));" onclick="thisjs.cart_del('+i+')" title="'+this.cart[this.index][i].name+'"><img src="/mealOrdering/webcss/default/images/btn_del.gif" style="display:none"></li>';
				j = i+1;
				if(j%3 != 0) html += '<li class="x_plus">&nbsp;</li>';
			} else {
				html += '<li class="x_menu2" style="background:url'+'(' + this.cart[this.index][i].pic + ') no-repeat;" onmouseover="kj.show(kj.obj(\'img\',this));"  onmouseout="kj.hide(kj.obj(\'img\',this));" onclick="thisjs.cart_del('+i+')" title="'+this.cart[this.index][i].name+'"><img src="/mealOrdering/webcss/default/images/btn_del.gif" style="display:none"></li>';
				break;
			}
		}
		var objbox = kj.obj("#id_cart_box");
		objbox.innerHTML = html;
		this.refresh_info();
	}
	//删除当前份
	this.cart_remove = function() {
		var i = this.index;
		var j;
		for(j = 0 ; j < this.cart[i].length ; j++) {
			this.total -= kj.toint(this.cart[i][j].price);
		}
		this.cart.removeat(i);
		if(this.cart.length>i) {
			this.cart_go(i);
		} else if(this.cart.length>0) {
			this.cart_go(this.cart.length-1);
		} else {
			this.index = -1;
			this.cart_new(false);
		}
	}
	//提交，保存到cookie
	this.cart_submit = function() {
		//检查是否已点餐
		if(this.cart.length<1 || this.cart[0].length<1) {
			alert("温馨提示：您的购物车是空的，请先点餐！");
			return false;
		}
		//检查当前点餐是否已满足条件
		var price = 0;
		for(i = 0; i < this.cart[this.index].length ; i++) {
			price+=kj.toint(this.cart[this.index][i].price);
		}
		if(this.cart[this.index]>0 && price < this.cfg.minprice) {
			alert("温馨提示：单份消费价格不得低于"+this.cfg.minprice+"元，不便之处还请您多多包涵！");
			return false;
		}
		//点餐价格是否达到起送价
		if(this.total < this.mintotal) {
			alert("温馨提示：由于人力成本等问题，外卖定餐需起送不得低于"+this.mintotal+"元，不便之处还请您多多包涵！");
			return false;
		}
		var i,arr_1=[],arr_2=[];
		for(i = 0 ; i < this.cart.length ; i++ ) {
			arr_2=[] ;
			for(j = 0 ; j < this.cart[i].length ; j++) {
				arr_2[arr_2.length] = this.cart[i][j].id;
			}
			if(this.cart[i].length>0) arr_1[arr_1.length] = arr_2.join(",");
		}
		var str = kj.cookie_get("cart_ids");
		var arr = [];
		if(str) arr = str.split("||");
		for(i = 0 ; i < arr.length ; i++) {
			arr_2 = arr[i].split(":");
			if(arr_2[0] == '0') {
				arr.removeat(i);break;
			}
		}
		arr[arr.length] = "0:" + arr_1.join("|");
		var str_ids = arr.join("||");
		kj.cookie_set("cart_ids" , str_ids , 24);

		window.location.href = "?app_act=cart";

	}
	this.cart_init = function() {
		<?php if($cfg_opentime['nowindex']>0){?>
		var is_new = true;
		<?php foreach($arr_menu['cart'] as $cart){ ?>
			if(is_new) {
				this.cart_new(false);
				is_new = false;
			}
			<?php foreach($cart as $menu){ ?>
				<?php if(isset($arr_menu["cart_menu"]["id_".$menu])){?>
				this.cart_add({id:'<?php echo $arr_menu["cart_menu"]["id_".$menu]['menu_id'];?>',name:'<?php echo $arr_menu["cart_menu"]["id_".$menu]['menu_title'];?>',pic:'<?php echo $arr_menu["cart_menu"]["id_".$menu]['menu_pic_small'];?>',price:'<?php echo $arr_menu["cart_menu"]["id_".$menu]['menu_price'];?>',type:'<?php echo $arr_menu["cart_menu"]["id_".$menu]['menu_type'];?>'});
				is_new = true;
				<?php }?>
			<?php }?>
		<?php }?>
		<?php if(count($arr_menu['cart'])<1){?>
			this.cart_new(false);
		<?php }?>
		<?php }?>
	}
	this.cart_position = function() {
		var t = document.documentElement.scrollTop || document.body.scrollTop;  
		var top_div = document.getElementById( "top_div" ); 
		if( t >= thisjs.defaulttop ) { 
		   kj.set("#id_cart",'style.position','fixed');
		   kj.set("#id_cart",'style.top','50px');
		   if(thisjs.defaultleft>300) kj.set("#id_cart",'style.left',thisjs.defaultleft + 'px');
		} else { 
		   kj.set("#id_cart",'style.position','static');
		  // kj.set("#id_cart",'style.top','100px');
		} 
	}
}
kj.onload(function(){
	thisjs.cart_init();
	var offset = kj.offset("#id_cart_position");
	thisjs.defaulttop = offset.top+20;
	thisjs.defaultleft = offset.left;
	thisjs.cart_position();
});
window.onscroll = function(){ 
	thisjs.cart_position();
} 
</script>
<?php include cls_resolve::on_resolve('/default\/footer')?>
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo cls_config::get("site_title","sys");?>-用户登录</title>
<meta name="keywords" content="<?php echo cls_config::get("keywords","sys");?>"/>
<meta name="description" content="<?php echo cls_config::get("description","sys");?>"/>
<link rel="stylesheet" type="text/css" href="/mealOrdering/webcss/common/images/common.css"/>
<link rel="stylesheet" type="text/css" href="/mealOrdering/webcss/common/images/expand.css"/>
<link rel="stylesheet" type="text/css" href="/mealOrdering/webcss/default/images/css.css"/>
<script src="<?php echo cls_config::get("dirpath","base");?>/common.php?app=sys&app_act=web.config&app_ajax=1"></script>
<script src="/mealOrdering/webcss/common/js/kj.js"></script>
<script src="/mealOrdering/webcss/common/js/kj.ajax.js"></script>
<script src="/mealOrdering/webcss/common/js/kj.dialog.js"></script>
</head>
<body>
<?php include cls_resolve::on_resolve('/default\/header')?>
<div class="main">
	<form name="frmlogin" method="post" action="common.php?app=sys&app_act=login.verify" onsubmit="return thisjs.on_login();">
		<?php $rnd=rand(1,9);?>
		<div class="login_b"><img src="/mealOrdering/webcss/default/images/login0<?php echo $rnd;?>.jpg"></div>
		<div class="login_c">
			<div class="login_c1"><?php if(cls_config::get('rule_uname','user')=='email'){?>邮箱：<?php } else if(cls_config::get('rule_uname','user')=='mobile') { ?>手机：<?php } else { ?>用户名：<?php }?></div>
			<div class="login_c2">
				<input type="text" name="uname" class="pTxt1 pTxtL250"/>
				<div id="id_verify" style="display:none" onmouseover="kj.show(this);"><br><img src="/mealOrdering/webcss/default/" id="id_verify_pic" onclick="thisjs.verify_refresh();"></div>
			</div>
			<div class="login_c1">密码：</div>
			<div class="login_c2">			
<input name="pwd" type="password" class="pTxt1 pTxtL250"/></div>
			<div class="login_c1 verify_code"<?php if(!$verfifycode){?> style="display:none"<?php }?>>验证码：</div>
			<div class="login_c2 verify_code"<?php if(!$verfifycode){?> style="display:none"<?php }?>><input name="verifycode" type="text" class="pTxt1 pTxtL100"  onfocus="thisjs.show_verify('#id_verify');"/></div>

			<div class="login_c1"></div>
			<div class="login_c2"><label><input type="checkbox" name="autologin" value="1" checked>下次自动登录</label></div>
			<div class="login_c3"><input type="submit" name="btn_submit" value="" style="background:url(/mealOrdering/webcss/default/images/btn_submit2.gif) no-repeat;width:185px;height:55px;border:0px"></div>
			<div class="login_c4"><a href="?app=index&app_act=findpwd">[ 找回密码 ]</a></div>
			
			<div class="login_c5">一分钟轻松注册，就可以方便订餐！[<a href="?app=index&app_act=reg" class="link_red2"> 免费注册 </a>]</div>
		</div>
		<input type="hidden" name="jump_fromurl" value="<?php echo $jump_fromurl;?>" id="id_jump_fromurl">
	</form>
</div>
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
});

var thisjs = new function() {
	this.is_verify = <?php if($verfifycode){?>true<?php } else { ?>false<?php }?>;
	this.on_login = function() {
		kj.ajax.post(document.frmlogin , function(data) {
			var obj_data=kj.json(data);
			if(obj_data.isnull) {
				alert("系统繁忙，请稍后再来试试");
			} else {
				if(obj_data.code == 0) {
					var url = kj.obj("#id_jump_fromurl").value;
					if(url) {
						window.open(url , "_self");
					} else {
						window.open("<?php echo cls_config::get("dirpath","base");?>/" , "_self");
					}
				} else {
					if(thisjs.is_verify) {
						thisjs.verify_refresh();
					}
					if('msg' in obj_data && obj_data.msg) {
						alert(obj_data.msg);
					} else {
						alert("系统繁忙，请稍后再来试试");
					}
					if('show_code' in obj_data && obj_data.show_code == '1') {
						thisjs.is_verify = true;
						kj.show(".verify_code");
					}
					if(obj_data.code == '4') document.frmlogin.uname.focus();
					if(obj_data.code == '3') document.frmlogin.pwd.focus();
					if(obj_data.code == '11') document.frmlogin.verifycode.focus();
				}
			}
		});
		return false;
	}

	this.show_verify = function() {
		var objpic = kj.obj("#id_verify_pic");
		if(objpic.src.indexOf("verifycode")<0) {
			objpic.src = '<?php echo cls_config::get("dirpath","base");?>/common.php?app=sys&app_act=verifycode';
			kj.handler(document.documentElement,"click",function(e){
				var arr = new Array('img' , 'input');
				var target = kj.event_target(e);
				if(target.name!='verifycode' && target.id!='id_verify_pic') {
					kj.hide('#id_verify');
				}
			});
		}
		kj.show('#id_verify');
	}
	this.verify_refresh = function() {
		kj.obj("#id_verify_pic").src='<?php echo cls_config::get("web_url","base");?>/common.php?app=sys&app_act=verifycode&app_contenttype=img&app_rnd='+Math.random();
	}

}
</script>
<style>
#id_verify{position:absolute;width:130px}
</style>
<?php include cls_resolve::on_resolve('/default\/footer')?>
</body>
</html>
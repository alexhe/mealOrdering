<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户登录</title>
<meta name="keywords" content="" />
<link rel="stylesheet" type="text/css" href="/mealOrdering/webcss/common/images/common.css"/>
<link rel="stylesheet" type="text/css" href="/mealOrdering/webcss/common/images/css.css"/>
<script src="<?php echo cls_config::get("dirpath","base");?>/common.php?app=sys&app_act=web.config&app_ajax=1"></script>
<script src="/mealOrdering/webcss/common/js/kj.js"></script>
<script src="/mealOrdering/webcss/common/js/kj.rule.js"></script>
<script src="/mealOrdering/webcss/common/js/kj.ajax.js"></script>
<style>
.me_main{margin:50px auto 0px auto;width:333px;text-align:center}
.loginbox{float:left;width:333px;border:1px #cccccc solid}
.loginbox .tit{float:left;width:280px;height:36px;background:url(/mealOrdering/webcss/common/images/bg_1.jpg) no-repeat;text-align:left;font-weight:bold;padding:9px 0px 0px 53px}
.loginbox .logintab{float:left;width:300px;padding:10px 0px 0px 50px}
.loginbox .logintab .tab{float:left}
.loginbox .logintab td{text-align:left;font-size:14px;height:25px;}
</style>
<script>
var thisjs = new function() {
	this.is_verify = <?php if(cls_obj::get("cls_user")->is_verifycode()==false){?>false<?php } else { ?>true<?php }?>;
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
						document.frmlogin.verifycode.value='';
					}
					if('show_code' in obj_data && obj_data.show_code == '1') {
						thisjs.is_verify = true;
						kj.show("#id_verify_code");
					}
					if('msg' in obj_data && obj_data.msg) {
						alert(obj_data.msg);
					} else {
						alert("系统繁忙，请稍后再来试试");
					}
				}
			}
		});
	}

	this.show_verify = function() {
		var objpic = kj.obj("#id_verify_pic");
		if(objpic.src.indexOf("verifycode")<0) {
			objpic.src = '<?php echo cls_config::get("url","base");?>/common.php?app=sys&app_act=verifycode';
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
		kj.obj("#id_verify_pic").src = kj.cfg('dirpath') + '/common.php?app=sys&app_act=verifycode&app_contenttype=img&app_rnd='+Math.random();
	}
}
</script>
<style>
#id_verify{position:absolute;width:130px}
</style>
</head>
<body>
<div class="me_main">
<div class="sp_w1"></div>
<div class="loginbox">
	<div class="tit"><h3>用户登录入口</h3></div>
	<div class="logintab">
		<table class="tab">
		<form name="frmlogin" method="post" action="?app=<?php echo $app;?>&app_module=<?php echo $app_module;?>&app_act=login.verify" onsubmit="return false;">
		<tr><td>用户名：</td><td><div id="id_verify" style="display:none" onmouseover="kj.show(this);"><img src="/mealOrdering/webcss/common/" id="id_verify_pic" onclick="this.src='<?php echo cls_config::get("url","base");?>/common.php?app=sys&app_act=verifycode&app_contenttype=img&app_rnd='+Math.random();"></div><input type="text" name="uname" value="" class="pTxt1 pTxtL200" onfocus="kj.hide('#id_verify');"></td></tr>
		<tr><td>密　码：</td><td><input type="password" name="pwd" class="pTxt1 pTxtL200" onfocus="kj.hide('#id_verify');"></td></tr>
		<tr id="id_verify_code"<?php if(cls_obj::get("cls_user")->is_verifycode()==false){?> style="display:none"<?php }?>><td>验证码：</td><td><span style="float:left"><input type="text" name="verifycode" class="pTxt1 pTxtL60" onfocus="thisjs.show_verify('#id_verify');"></span></td></tr>
		<tr><td></td><td><input type="submit" name="loginok" value=" 登录 " class="pSubmit" onclick="thisjs.on_login();">&nbsp;&nbsp;<label><input type="checkbox" name="autologin" value="1" checked>下次自动登录</label></td></tr>
		<input type="hidden" name="jump_fromurl" value="<?php echo $jump_fromurl;?>" id="id_jump_fromurl">
		</form>
		</table>
	</div>
</div>
</div>
</body>
</html>
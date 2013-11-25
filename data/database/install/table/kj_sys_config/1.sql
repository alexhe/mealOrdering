#-----------------添加记录表--- kj_sys_config
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('4','upload_allow','1','是否允许上传','1','','bool','other','0','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('5','upload_onlogin','1','上传是否需要登陆','1','','bool','other','0','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('6','upload_count','5','一次上传数量','1','','int','other','0','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('7','upload_filesize','1','单个文件上传大小(M)','1','','int','other','0','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('8','upload_allowext','jpeg|jpg|gif|bmp|rar|doc|mp3|rm|wma|txt|zip|swf','允许上传类型','1','','array','other','0','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('9','upload_noallowext','exe|php|html|htm|js|jsp|asp|aspx','禁止上传类型','1','','array','other','0','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('26','user_state','1','新注册会员默认状态','1','1=&gt;通过\n0=&gt;待审','list','user','1','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('25','ads_position','首页A=&gt;A\r首页B=&gt;B\r首页C=&gt;C\r首页D=&gt;D\r首页E=&gt;E\r站点顶部=&gt;webA\r个人中心头部=&gt;userA\r个人中心提醒=&gt;userB\r企业中心头部=&gt;companyA\r企业中心提醒=&gt;companyB','广告位','1','','array','other','0','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('62','allow_resize','1','是否生成缩略图','1','','bool','other','0','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('98','menu_unit','份盘碗杯锅碟','菜品单位(以换行分隔)','1','','array','meal','11','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('99','allow_maxsize','2','上传大小限制(单位M)','1','','int','upload','1','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('100','allow_ext','jpg\ngif\nbmp\njpeg\nrar\nzip\nmp3\npng','允许上传的文件类型(以换行分隔)','1','','array','upload','2','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('101','allow_no_ext','exe\nphp\njs\nhtm\nhtml\nasp\naspx\njsp\ncgi','不允许上传的文件类型，优先于允许的类型(以换行分隔)','1','','array','upload','3','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('102','pic_autosmall','0','是否生成缩略图','1','','bool','upload','4','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('103','pic_autosmall_w','100','默认缩略图宽(px)','1','','int','upload','5','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('104','pic_autosmall_h','80','默认缩略图高(px)','1','','int','upload','6','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('105','pic_max_w','0','上传图片最大宽度，超过则自动缩成设置的值，0 表示不限','1','','int','upload','7','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('106','pic_watermark','0','图片是否加水印','1','','bool','upload','8','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('107','pic_watermark_pos','9','水印位置(取值范围1-9)','1','','int','upload','9','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('108','pic_watermark_type','pic','水印类型','1','pic=&gt;图片\nfont=&gt;文字','list','upload','10','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('109','pic_watermark_font','/upload/attatch/1/samll.jpg','当水印类型选择为文字时填写要打水印的文字，为图片时，填图片路径(如：/upload/img/a.jpg)','1','','str','upload','11','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('110','food_rice_default','330','默认加饭id (当中式自选模式下默认自动添饭，如果未设置则不会自动加)','1','','int','meal','11','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('111','attribute','头条\n最新\n热门','文章属性','1','','array','article','0','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('112','pm_starttime','15:00:00','下午开始时间(当日菜单区分上下午时用到)','1','','str','meal','11','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('114','ticket_list','0=&gt;暂不需要发票\n100=&gt;100元发票 - 需要消耗100积分\n200=&gt;200元发票 - 需要消耗200积分\n300=&gt;300元发票 - 需要消耗300积分\n400=&gt;400元发票 - 需要消耗400积分\n500=&gt;500元发票 - 需要消耗500积分','积分换发票(格式：100=&gt;100积分  表示：需要100积分,前面的100表示值，只能是数值，后面的“100积分”是说明可以任意修改)','1','','array','meal','10','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('115','day_opentime','900,1500=&gt;9点 至 15点\n1500,1930=&gt;15点 至 19点30','每天开放时间,可以设多个时间段900,1300 表示9点到13点','1','','array','meal','16','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('116','score_money_scale','0.01','积分兑换现金比例(0则表示关闭积分兑换功能)','1','','int','meal','9','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('118','arrive_time','1115=&gt;11：15 之前\n1130=&gt;11：30 之前\n1145=&gt;11：45 之前\n1200=&gt;12：00 之前\n1215=&gt;12：15 之前\n1230=&gt;12：30 之前\n1245=&gt;12：45 之前\n1300=&gt;13：00 之前\n1400=&gt;14：00 之前\n1730=&gt;17：30 之前\n1800=&gt;18：00 之前\n1830=&gt;18：30 之前\n1900=&gt;19：00 之前\n1930=&gt;19：30 之前\n2000=&gt;20：00 之前\n2030=&gt;20：30 之前\n2359=&gt;23：59 之前','送餐时间(格式：1230=&gt;12:30之前  其中1230 表示12点30分，以此类推,后面是说明)','1','','array','meal','10','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('119','admin_log','10','管理日志保留天数','1','','int','cache','0','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('120','sys_log','5','系统日志保留份数','1','','int','cache','0','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('121','data_back','2','备份数据保留份数','1','','int','cache','0','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('123','asseter_main_group_id','3','总资产管理组对应id','1','','int','erp','0','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('124','asseter_group_id','4','资产管理员对应id','1','','int','erp','0','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('242','reg_verify','0','显示注册验证码','0','0=&gt;code=&gt;验证码email=&gt;邮箱验证(需安装邮件组件)sms=&gt;短信验证(需安装短信组件)','bool','user','0','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('125','login_verify','show_code=&gt;1\nstop_num=&gt;3\nstop_time=&gt;3\nstop_unit=&gt;i','登录验证配置：show_code=错误多少次需要验证码登录，stop_num=错误多少次禁止登录，stop_time=禁止多长时间，stop_unit=时间单位(d:天,h:时,i:分,s:秒)','1','','array','user','6','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('175','score_mode','1','积分抵扣模式','0','0=&gt;关闭\n1=&gt;开通','list','meal','8','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('129','keywords','135top在线订餐系统，php订餐系统，免费开源订餐系统','网站seo关健词','1','','textarea','sys','4','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('130','description','135top在线订餐系统，php订餐系统，免费开源订餐系统','网站seo描述','1','','textarea','sys','3','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('131','site_title','135top在线订餐','网站名称','1','','str','sys','2','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('132','title','在线订餐','分享标题','1','','str','share','0','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('133','pic','/webcss/default/images/logo.jpg','图片','1','','str','share','0','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('134','cont','在线订餐，您身身边的订餐','内容','1','','textarea','share','0','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('135','max_info_num','5','用户最多可创建收货信息数量','1','','int','meal','12','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('173','dispatch_min_price','10','最抵起送价','0','','int','meal','3','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('138','one_order_num','20','单份订单最多允许点餐份数','1','','int','meal','4','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('139','paymethod','a:1:{i:0;s:12:\"afterpayment\";}','支付方式（预付款与在线付款需要安装支付接口才生效）','1','afterpayment=&gt;货到付款\nrepayment=&gt;预付款支付\nonlinepayment=&gt;在线付款','chk','meal','5','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('140','pay_timeout','10','订单支付超时时间设置（单位：分钟）,如果支付成功了，但订单超时了，金额将被转到预付款中','1','','int','meal','6','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('248','config_module','sys=&gt;系统\nuser=&gt;用户\nmeal=&gt;店铺\nupload=&gt;上传\narticle=&gt;文章\ncache=&gt;缓存\nshare=&gt;分享\nemail=&gt;邮件\nview=&gt;显示设置\nsms=&gt;短信','模块配置','1','','array','sys','1','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('148','order_overtime','5','多少分钟商家未处理订单，作超时处理，后台来单显示用到，方便管理员审单','1','','int','meal','13','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('172','arrive_delay','30','提前下单时间','0','','int','meal','14','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('170','reg_switch_info','网站试运营阶段，暂时只接受邀请注册','关闭或邀请注册时，提示用户信息','1','','str','user','4','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('169','reg_switch','0','注册选项','1','0=&gt;开通注册\n1=&gt;关闭注册\n2=&gt;邀请注册','list','user','3','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('171','reg_invite_code','8888','注册邀请码(在注册选项为：邀请注册时用到)','1','','str','user','5','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('174','shop_mode','1','店铺运营模式','0','1=&gt;默认\n2=&gt;中式自选\n3=&gt;混合','list','meal','7','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('178','optional_select','minprice=&gt;5\nmaxnum=&gt;6\nmaxcainum=&gt;4\nmintotal=&gt;10','minprice : 单份订单最小价格 ;maxnum : 单份订单最多菜品数 ; maxcainum : 单份订单最多菜数(不算饭与汤) ; mintotal : 单份最低金额','0','','array','meal','6','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('230','pic_watermark_font_path','/upload/font/simkai.ttf','如果水印类型选择为文字水印时，需要指定水印字体文件地址（如：/upload/font/simkai.ttf) 字体可以去官网下载','0','','str','upload','12','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('231','pic_watermark_color','#ff0000','水印字体颜色(仅在文字水印时有效)','0','','str','upload','13','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('232','pic_watermark_quality','100','水印透明度 取值：0-100 越大越清晰，图片文字都有效','0','','str','upload','14','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('233','pic_watermark_size','30','水印字体大小','0','','str','upload','15','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('258','username','135top','邮件服务器登陆账号','0','','str','email','0','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('257','port','25','设置邮件服务器的端口，默认为25','0','','str','email','0','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('256','password','','邮件服务器登陆密码','0','','str','email','0','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('255','host','smtp.126.com','设置邮件服务器的地址','0','','str','email','0','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('254','fromname','135top订餐系统','设置发件人的姓名','0','','str','email','0','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('253','from','135top@126.com','设置发件人的邮箱地址','0','','str','email','0','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('240','rule_uname','default','注册账号格式','0','default=&gt;长度在2-16位，不能包函特殊字符\nrule1=&gt;英文、数字、下划线，长度在4-16位的字符\nemail=&gt;邮箱\nmobile=&gt;手机号码','list','user','0','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('241','rule_pwd','4-16','用户密码长度：(如：4-16 表示，大于等于4,小于等于16)','0','','str','user','0','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('288','neworder_sms_tel','','收到新订单时，短信通知的手机号，可为多个手机将随机发送，为空则不发短信','0','','str','sms','6','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('249','msg_options','a:2:{i:0;s:5:\"login\";i:1;s:3:\"tel\";}','顾客留言配置','0','login=&gt;须要登录\nname=&gt;名称必填\nemail=&gt;邮箱必填\ntel=&gt;电话必填','chk','sys','5','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('250','index_group','price','首页默认分组','0','price=&gt;价格\ngroup=&gt;菜品分组','list','view','0','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('251','shop_name','快捷订餐系统','店铺名称','0','','str','view','0','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('252','shop_logo','/webcss/default/images/logo.png','店铺logo','0','','str','view','0','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('287','cancel_user_beta','#shopname#提醒您：由于#cont#，您可以登录网站重新订餐','当店铺取消订单时，提示用户的消息内容 #cont# 为店铺回复的内容,可以调整其位置','0','','textarea','sms','5','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('286','cancel_call_user','1','店铺短信取消订单时，是否将取消信息转发给用户','0','','bool','sms','4','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('285','count_pwd','','短信密码','0','','str','sms','3','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('283','state','0','开启短信','0','','bool','sms','1','');
INSERT INTO `{DB_PRE}sys_config` (`config_id`,`config_name`,`config_val`,`config_intro`,`config_readonly`,`config_list`,`config_type`,`config_module`,`config_sort`,`config_env`) values('284','count_id','','短信账号(需要从官网购买)','0','','str','sms','2','');

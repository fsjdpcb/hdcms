<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."category (`cid`,`pid`,`catname`,`catdir`,`cat_keyworks`,`cat_description`,`index_tpl`,`list_tpl`,`arc_tpl`,`cat_html_url`,`arc_html_url`,`mid`,`cattype`,`arc_url_type`,`cat_url_type`,`cat_redirecturl`,`catorder`,`cat_show`,`cat_seo_title`,`cat_seo_description`,`add_reward`,`show_credits`,`repeat_charge_day`,`allow_user_set_credits`,`member_send_state`)
						VALUES(1,0,'案例展示','case','','提交案例，可以让更多的人知道你的网站!','image_index.html','image_list.html','article_default.html','{catdir}/{cid}{page}.html','{catdir}/{y}/{m}{d}/{aid}.html',1,2,2,2,'',100,1,'提交案例','',1,0,1,1,0)");
$db->exe("REPLACE INTO ".$db_prefix."category (`cid`,`pid`,`catname`,`catdir`,`cat_keyworks`,`cat_description`,`index_tpl`,`list_tpl`,`arc_tpl`,`cat_html_url`,`arc_html_url`,`mid`,`cattype`,`arc_url_type`,`cat_url_type`,`cat_redirecturl`,`catorder`,`cat_show`,`cat_seo_title`,`cat_seo_description`,`add_reward`,`show_credits`,`repeat_charge_day`,`allow_user_set_credits`,`member_send_state`)
						VALUES(2,0,'模板下载','template','','所有模板免费使用，可以用在任何商业用途！','article_index.html','image_list.html','download_default.html','{catdir}/{cid}{page}.html','{catdir}/{y}/{m}{d}/{aid}.html',2,2,2,2,'',100,1,'提交模板','',1,0,1,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."category (`cid`,`pid`,`catname`,`catdir`,`cat_keyworks`,`cat_description`,`index_tpl`,`list_tpl`,`arc_tpl`,`cat_html_url`,`arc_html_url`,`mid`,`cattype`,`arc_url_type`,`cat_url_type`,`cat_redirecturl`,`catorder`,`cat_show`,`cat_seo_title`,`cat_seo_description`,`add_reward`,`show_credits`,`repeat_charge_day`,`allow_user_set_credits`,`member_send_state`)
						VALUES(3,0,'模块插件','addon','','所在插件与模块均免费使用！','download_index.html','download_list.html','download_default.html','{catdir}/{cid}{page}.html','{catdir}/{y}/{m}{d}/{aid}.html',2,2,2,2,'',100,1,'','',1,0,1,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."category (`cid`,`pid`,`catname`,`catdir`,`cat_keyworks`,`cat_description`,`index_tpl`,`list_tpl`,`arc_tpl`,`cat_html_url`,`arc_html_url`,`mid`,`cattype`,`arc_url_type`,`cat_url_type`,`cat_redirecturl`,`catorder`,`cat_show`,`cat_seo_title`,`cat_seo_description`,`add_reward`,`show_credits`,`repeat_charge_day`,`allow_user_set_credits`,`member_send_state`)
						VALUES(4,0,'CMS帮助','hdcms','','使用交流，问题求助社区','article_index.html','cms_help_list.html','article_default.html','{catdir}/{cid}{page}.html','{catdir}/{y}/{m}{d}/{aid}.html',1,1,2,2,'',100,1,'','',1,0,1,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."category (`cid`,`pid`,`catname`,`catdir`,`cat_keyworks`,`cat_description`,`index_tpl`,`list_tpl`,`arc_tpl`,`cat_html_url`,`arc_html_url`,`mid`,`cattype`,`arc_url_type`,`cat_url_type`,`cat_redirecturl`,`catorder`,`cat_show`,`cat_seo_title`,`cat_seo_description`,`add_reward`,`show_credits`,`repeat_charge_day`,`allow_user_set_credits`,`member_send_state`)
						VALUES(5,0,'论坛','luntan','','','article_index.html','article_list.html','article_default.html','{catdir}/{cid}{page}.html','{catdir}/{y}/{m}{d}/{aid}.html',1,3,2,2,'http://bbs.houdunwang.com',1001,1,'','',1,0,1,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."category (`cid`,`pid`,`catname`,`catdir`,`cat_keyworks`,`cat_description`,`index_tpl`,`list_tpl`,`arc_tpl`,`cat_html_url`,`arc_html_url`,`mid`,`cattype`,`arc_url_type`,`cat_url_type`,`cat_redirecturl`,`catorder`,`cat_show`,`cat_seo_title`,`cat_seo_description`,`add_reward`,`show_credits`,`repeat_charge_day`,`allow_user_set_credits`,`member_send_state`)
						VALUES(6,4,'标签使用','help/tag','','','article_index.html','cms_help_list.html','article_default.html','{catdir}/{cid}{page}.html','{catdir}/{y}/{m}{d}/{aid}.html',1,1,2,2,'',2,1,'','',1,0,1,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."category (`cid`,`pid`,`catname`,`catdir`,`cat_keyworks`,`cat_description`,`index_tpl`,`list_tpl`,`arc_tpl`,`cat_html_url`,`arc_html_url`,`mid`,`cattype`,`arc_url_type`,`cat_url_type`,`cat_redirecturl`,`catorder`,`cat_show`,`cat_seo_title`,`cat_seo_description`,`add_reward`,`show_credits`,`repeat_charge_day`,`allow_user_set_credits`,`member_send_state`)
						VALUES(7,4,'安装使用','help/setup','','','article_index.html','cms_help_list.html','article_default.html','{catdir}/{cid}{page}.html','{catdir}/{y}/{m}{d}/{aid}.html',1,1,2,2,'',1,1,'','',1,0,1,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."category (`cid`,`pid`,`catname`,`catdir`,`cat_keyworks`,`cat_description`,`index_tpl`,`list_tpl`,`arc_tpl`,`cat_html_url`,`arc_html_url`,`mid`,`cattype`,`arc_url_type`,`cat_url_type`,`cat_redirecturl`,`catorder`,`cat_show`,`cat_seo_title`,`cat_seo_description`,`add_reward`,`show_credits`,`repeat_charge_day`,`allow_user_set_credits`,`member_send_state`)
						VALUES(8,4,'模块插件','help/addon','','','article_index.html','cms_help_list.html','article_default.html','{catdir}/{cid}{page}.html','{catdir}/{y}/{m}{d}/{aid}.html',1,1,2,2,'',3,1,'','',1,0,1,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."category (`cid`,`pid`,`catname`,`catdir`,`cat_keyworks`,`cat_description`,`index_tpl`,`list_tpl`,`arc_tpl`,`cat_html_url`,`arc_html_url`,`mid`,`cattype`,`arc_url_type`,`cat_url_type`,`cat_redirecturl`,`catorder`,`cat_show`,`cat_seo_title`,`cat_seo_description`,`add_reward`,`show_credits`,`repeat_charge_day`,`allow_user_set_credits`,`member_send_state`)
						VALUES(9,0,'框架帮助','hdphp','','','article_index.html','hdphp_help_list.html','article_default.html','{catdir}/{cid}{page}.html','{catdir}/{y}/{m}{d}/{aid}.html',1,1,2,2,'',100,1,'','',1,0,1,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."category (`cid`,`pid`,`catname`,`catdir`,`cat_keyworks`,`cat_description`,`index_tpl`,`list_tpl`,`arc_tpl`,`cat_html_url`,`arc_html_url`,`mid`,`cattype`,`arc_url_type`,`cat_url_type`,`cat_redirecturl`,`catorder`,`cat_show`,`cat_seo_title`,`cat_seo_description`,`add_reward`,`show_credits`,`repeat_charge_day`,`allow_user_set_credits`,`member_send_state`)
						VALUES(12,9,'模板标签','hdphp/tag','','','article_index.html','hdphp_help_list.html','article_default.html','{catdir}/{cid}{page}.html','{catdir}/{y}/{m}{d}/{aid}.html',1,1,2,2,'',2,1,'','',1,0,1,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."category (`cid`,`pid`,`catname`,`catdir`,`cat_keyworks`,`cat_description`,`index_tpl`,`list_tpl`,`arc_tpl`,`cat_html_url`,`arc_html_url`,`mid`,`cattype`,`arc_url_type`,`cat_url_type`,`cat_redirecturl`,`catorder`,`cat_show`,`cat_seo_title`,`cat_seo_description`,`add_reward`,`show_credits`,`repeat_charge_day`,`allow_user_set_credits`,`member_send_state`)
						VALUES(11,9,'起步知识','hdphp/base','','','article_index.html','hdphp_help_list.html','article_default.html','{catdir}/{cid}{page}.html','{catdir}/{y}/{m}{d}/{aid}.html',1,1,2,2,'',1,1,'','',1,0,1,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."category (`cid`,`pid`,`catname`,`catdir`,`cat_keyworks`,`cat_description`,`index_tpl`,`list_tpl`,`arc_tpl`,`cat_html_url`,`arc_html_url`,`mid`,`cattype`,`arc_url_type`,`cat_url_type`,`cat_redirecturl`,`catorder`,`cat_show`,`cat_seo_title`,`cat_seo_description`,`add_reward`,`show_credits`,`repeat_charge_day`,`allow_user_set_credits`,`member_send_state`)
						VALUES(13,9,'数据模型','hdphp/model','','','article_index.html','hdphp_help_list.html','article_default.html','{catdir}/{cid}{page}.html','{catdir}/{y}/{m}{d}/{aid}.html',1,1,2,2,'',100,1,'','',1,0,1,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."category (`cid`,`pid`,`catname`,`catdir`,`cat_keyworks`,`cat_description`,`index_tpl`,`list_tpl`,`arc_tpl`,`cat_html_url`,`arc_html_url`,`mid`,`cattype`,`arc_url_type`,`cat_url_type`,`cat_redirecturl`,`catorder`,`cat_show`,`cat_seo_title`,`cat_seo_description`,`add_reward`,`show_credits`,`repeat_charge_day`,`allow_user_set_credits`,`member_send_state`)
						VALUES(14,3,'模块','addon/module','','所有模块免费使用！','article_index.html','download_list.html','download_default.html','{catdir}/{cid}{page}.html','{catdir}/{y}/{m}{d}/{aid}.html',2,1,2,2,'',100,1,'提交模块','',1,0,1,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."category (`cid`,`pid`,`catname`,`catdir`,`cat_keyworks`,`cat_description`,`index_tpl`,`list_tpl`,`arc_tpl`,`cat_html_url`,`arc_html_url`,`mid`,`cattype`,`arc_url_type`,`cat_url_type`,`cat_redirecturl`,`catorder`,`cat_show`,`cat_seo_title`,`cat_seo_description`,`add_reward`,`show_credits`,`repeat_charge_day`,`allow_user_set_credits`,`member_send_state`)
						VALUES(15,3,'插件','addon/plugin','','所有插件免费使用！','article_index.html','download_list.html','download_default.html','{catdir}/{cid}{page}.html','{catdir}/{y}/{m}{d}/{aid}.html',2,1,2,2,'',100,1,'提交插件','',1,0,1,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."category (`cid`,`pid`,`catname`,`catdir`,`cat_keyworks`,`cat_description`,`index_tpl`,`list_tpl`,`arc_tpl`,`cat_html_url`,`arc_html_url`,`mid`,`cattype`,`arc_url_type`,`cat_url_type`,`cat_redirecturl`,`catorder`,`cat_show`,`cat_seo_title`,`cat_seo_description`,`add_reward`,`show_credits`,`repeat_charge_day`,`allow_user_set_credits`,`member_send_state`)
						VALUES(51,1,'企业网站','case/qiyewangzhan','','提交案例，可以让更多的人知道你的网站!','article_index.html','image_list.html','article_default.html','{catdir}/{cid}{page}.html','{catdir}/{y}/{m}{d}/{aid}.html',1,1,2,2,'',100,1,'提交案例','',0,0,1,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."category (`cid`,`pid`,`catname`,`catdir`,`cat_keyworks`,`cat_description`,`index_tpl`,`list_tpl`,`arc_tpl`,`cat_html_url`,`arc_html_url`,`mid`,`cattype`,`arc_url_type`,`cat_url_type`,`cat_redirecturl`,`catorder`,`cat_show`,`cat_seo_title`,`cat_seo_description`,`add_reward`,`show_credits`,`repeat_charge_day`,`allow_user_set_credits`,`member_send_state`)
						VALUES(52,1,'行业门户','case/xingyemenhu','','提交案例，可以让更多的人知道你的网站!','article_index.html','image_list.html','article_default.html','{catdir}/{cid}{page}.html','{catdir}/{y}/{m}{d}/{aid}.html',1,1,2,2,'',100,1,'提交案例','',0,0,1,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."category (`cid`,`pid`,`catname`,`catdir`,`cat_keyworks`,`cat_description`,`index_tpl`,`list_tpl`,`arc_tpl`,`cat_html_url`,`arc_html_url`,`mid`,`cattype`,`arc_url_type`,`cat_url_type`,`cat_redirecturl`,`catorder`,`cat_show`,`cat_seo_title`,`cat_seo_description`,`add_reward`,`show_credits`,`repeat_charge_day`,`allow_user_set_credits`,`member_send_state`)
						VALUES(53,2,'企业网站','template/qiyewangzhan','','','article_index.html','article_list.html','article_default.html','{catdir}/{cid}{page}.html','{catdir}/{y}/{m}{d}/{aid}.html',1,1,2,2,'',100,1,'','',0,0,1,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."category (`cid`,`pid`,`catname`,`catdir`,`cat_keyworks`,`cat_description`,`index_tpl`,`list_tpl`,`arc_tpl`,`cat_html_url`,`arc_html_url`,`mid`,`cattype`,`arc_url_type`,`cat_url_type`,`cat_redirecturl`,`catorder`,`cat_show`,`cat_seo_title`,`cat_seo_description`,`add_reward`,`show_credits`,`repeat_charge_day`,`allow_user_set_credits`,`member_send_state`)
						VALUES(54,2,'行业门户','template/xingyemenhu','','','article_index.html','article_list.html','article_default.html','{catdir}/{cid}{page}.html','{catdir}/{y}/{m}{d}/{aid}.html',2,1,2,2,'',100,1,'','',0,0,1,1,1)");

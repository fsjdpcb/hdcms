<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('1','内容','Admin','','','','','1','2','0','8','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('2','内容管理','Admin','','','','','1','2','1','10','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('16','系统','Admin','','','','','1','1','0','10','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('21','后台菜单管理','Admin','Node','index','','','1','1','19','100','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('3','附件管理','Admin','Attachment','index','','','1','1','10','100','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('12','数据备份','Admin','Backup','backup','','','1','1','79','100','1','1')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('10','内容相关管理','Admin','','','','','1','1','1','12','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('13','栏目管理','Admin','Category','index','','','1','1','2','20','1','1')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('14','模型管理','Admin','Model','index','','','1','1','10','100','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('15','推荐位','Admin','Flag','index','mid=1','','1','1','10','100','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('19','系统设置','Admin','','','','','1','1','16','100','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('4','文章列表','Admin','Content','index','','','1','2','2','10','1','1')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('11','管理员设置','Admin','','','','','1','1','16','100','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('17','管理员管理','Admin','Administrator','index','','','1','1','11','100','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('18','角色管理','Admin','Role','index','','','1','1','11','100','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('20','网站配置','Admin','Config','edit','','','1','1','19','90','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('5','生成静态','Admin','','','','','1','1','1','11','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('6','批量更新栏目页','Admin','Html','createCategory','','生成栏目页','1','1','5','102','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('8','生成首页','Admin','Html','createIndex','','生成首页','1','1','5','101','1','1')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('9','批量更新内容页','Admin','Html','createContent','','生成内容页','1','1','5','103','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('28','修改密码','Admin','Personal','editPassword','','','1','2','29','100','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('27','修改个人信息','Admin','Personal','editInfo','','','1','2','29','100','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('26','我的面板','Admin','','','','','1','2','0','100','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('29','个人信息','Admin','','','','','1','2','26','100','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('61','一键更新','Admin','Html','createAll','','一键更新全站','1','1','5','100','1','1')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('30','会员','Admin','','','','','1','1','0','100','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('31','会员管理','Admin','','','','','1','1','30','100','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('32','会员管理','Admin','User','index','','','1','1','31','100','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('33','审核会员','Admin','User','index','user_status=0','','1','1','31','100','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('34','会员组管理','Admin','','','','','1','1','30','100','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('35','管理会员组','Admin','Group','index','','','1','1','34','100','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('36','模板','Admin','','','','','1','1','0','100','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('37','模板管理','Admin','','','','','1','1','36','100','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('38','模板风格','Admin','TemplateStyle','styleList','','','1','1','37','90','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('70','标签云','Admin','Tag','index','','','1','1','10','100','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('69','搜索关键词','Admin','Search','index','','','1','1','79','100','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('79','其他操作','Admin','','','','','1','1','1','100','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('80','导航菜单','Admin','Navigation','index','','','1','1','79','100','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('91','插件','Admin','','','','','1','1','0','1000','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('92','插件管理','Admin','','','','','1','1','91','99','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('93','插件管理','Admin','Plugin','plugin_list','','','1','1','92','100','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('180','审核文章','Admin','ContentAudit','content','mid=1','','1','1','2','11','1','1')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('156','BUG管理','Admin','Bug','showBug','','','1','1','154','100','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('184','添加栏目','Admin','Category','add','','','0','1','2','21','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('185','删除栏目','Admin','Category','del','','','0','1','2','22','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('186','修改栏目','Admin','Category','edit','','','0','1','2','23','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('187','批量修改栏目','Admin','Category','BulkEdit','','','0','1','2','24','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`title`,`module`,`control`,`action`,`param`,`comment`,`state`,`type`,`pid`,`list_order`,`is_system`,`favorite`)
						VALUES('200','数据库内容替换','Admin','Table','contentReplace','','','1','1','79','100','1','0')");
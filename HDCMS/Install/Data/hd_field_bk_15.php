<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(104,1,1,'input',1,'content','readpoint','阅读收费','金币',1,1,106,'a:3:{s:4:\"size\";s:3:\"100\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}','','0','','',0,'',0,0,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(103,1,1,'box',1,'content','content_status','状态','',1,1,112,'a:3:{s:7:\"options\";s:26:\"1|审核通过,0|待审查\";s:9:\"form_type\";s:5:\"radio\";s:7:\"default\";s:1:\"1\";}','','0','','',0,'',0,0,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(101,1,1,'content',2,'content_data','content','正文','',1,1,100,'','','0','','',0,'',0,1,0,1)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(102,1,1,'number',1,'content','click','点击数','',1,1,111,'a:4:{s:11:\"num_integer\";s:1:\"6\";s:11:\"num_decimal\";s:1:\"2\";s:4:\"size\";s:3:\"150\";s:7:\"default\";s:3:\"100\";}','','0','','',0,'',0,0,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(98,1,1,'flag',1,'content','flag','属性','',1,1,4,'','','0','','',0,'',0,1,1,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(99,1,1,'title',1,'content','title','标题','',1,1,1,'a:2:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";}','','0','100','',1,'',0,1,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(100,1,1,'input',1,'content','tag','TAG','',1,0,101,'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}','','0','','',0,'',0,1,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(96,1,1,'thumb',1,'content','thumb','缩略图','',1,1,3,'s:0:\"\";','','','','',0,'',0,0,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(97,1,1,'input',1,'content','html_path','html文件名','',1,1,107,'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}','','0','','',0,'',0,1,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(94,1,1,'cid',1,'content','cid','栏目','',1,1,2,'s:0:\"\";','','1','','',1,'请选择栏目',0,1,0,1)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(95,1,1,'input',1,'content','seo_title','SEO标题','',1,1,5,'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}','','','','',0,'',0,1,1,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(92,1,1,'datetime',1,'content','addtime','添加时间','',1,1,105,'a:1:{s:6:\"format\";s:1:\"1\";}','','0','','',0,'',0,0,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(93,1,1,'input',1,'content','redirecturl','转向链接','',1,1,104,'a:3:{s:4:\"size\";s:3:\"150\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}','','0','','/^http:///',0,'',0,0,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(90,1,1,'template',1,'content','template','模板','',1,1,108,'','','0','','',0,'',0,1,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(91,1,1,'box',1,'content','url_type','文章访问方式','',1,1,109,'a:3:{s:7:\"options\";s:45:\"1|静态访问,2|动态访问 ,3|继承栏目\";s:9:\"form_type\";s:5:\"radio\";s:7:\"default\";s:1:\"3\";}','','0','','',0,'',0,1,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(89,1,1,'number',1,'content','arc_sort','排序','',1,1,110,'a:5:{s:10:\"field_type\";s:9:\"mediumint\";s:11:\"num_integer\";s:1:\"6\";s:11:\"num_decimal\";s:1:\"2\";s:4:\"size\";s:3:\"150\";s:7:\"default\";s:3:\"100\";}','','0','','',0,'',0,0,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(88,1,1,'input',1,'content','keywords','关键字','',1,1,102,'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}','','0','','',0,'',0,1,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(87,1,1,'textarea',1,'content','description','描述','',1,1,103,'a:3:{s:5:\"width\";s:3:\"500\";s:6:\"height\";s:3:\"100\";s:7:\"default\";s:0:\"\";}','','0','','',0,'',0,1,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(139,2,1,'flag',1,'download','flag','属性','',1,1,4,'','','0','','',0,'',0,1,1,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(140,2,1,'title',1,'download','title','标题','',1,1,1,'a:2:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";}','','0','100','',1,'',0,1,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(137,2,1,'thumb',1,'download','thumb','缩略图','',1,1,3,'','','0','','',0,'',0,0,0,1)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(138,2,1,'input',1,'download','html_path','html文件名','',1,1,108,'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}','','0','','',0,'',0,1,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(135,2,1,'cid',1,'download','cid','栏目','',1,1,2,'','','0','','',0,'',0,1,0,1)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(136,2,1,'input',1,'download','seo_title','SEO标题','',1,1,5,'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}','','0','','',0,'',0,1,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(133,2,1,'datetime',1,'download','addtime','添加时间','',1,1,106,'a:1:{s:6:\"format\";s:1:\"1\";}','','0','','',0,'',0,0,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(134,2,1,'input',1,'download','redirecturl','转向链接','',1,1,105,'a:3:{s:4:\"size\";s:3:\"150\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}','','0','','/^http:///',0,'',0,0,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(132,2,1,'box',1,'download','url_type','文章访问方式','',1,1,120,'a:3:{s:7:\"options\";s:45:\"1|静态访问,2|动态访问 ,3|继承栏目\";s:9:\"form_type\";s:5:\"radio\";s:7:\"default\";s:1:\"3\";}','','0','','',0,'',0,1,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(131,2,1,'template',1,'download','template','模板','',1,1,109,'','','0','','',0,'',0,1,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(130,2,1,'number',1,'download','arc_sort','排序','',1,1,121,'a:5:{s:10:\"field_type\";s:9:\"mediumint\";s:11:\"num_integer\";s:1:\"6\";s:11:\"num_decimal\";s:1:\"2\";s:4:\"size\";s:3:\"150\";s:7:\"default\";s:3:\"100\";}','','0','','',0,'',0,0,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(129,2,1,'input',1,'download','keywords','关键字','',1,1,102,'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}','','0','','',0,'',0,1,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(128,2,1,'textarea',1,'download','description','描述','',1,1,103,'a:3:{s:5:\"width\";s:3:\"500\";s:6:\"height\";s:3:\"100\";s:7:\"default\";s:0:\"\";}','','0','','',0,'',0,1,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(141,2,1,'input',1,'download','tag','TAG','',1,0,101,'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}','','0','','',0,'',0,1,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(142,2,1,'content',2,'download_data','content','正文','',1,1,100,'','','0','','',0,'',0,1,0,1)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(143,2,1,'number',1,'download','click','点击数','',1,1,122,'a:4:{s:11:\"num_integer\";s:1:\"6\";s:11:\"num_decimal\";s:1:\"2\";s:4:\"size\";s:3:\"150\";s:7:\"default\";s:3:\"100\";}','','0','','',0,'',0,0,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(144,2,1,'box',1,'download','content_status','状态','',1,1,123,'a:3:{s:7:\"options\";s:26:\"1|审核通过,0|待审查\";s:9:\"form_type\";s:5:\"radio\";s:7:\"default\";s:1:\"1\";}','','0','','',0,'',0,0,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(145,2,1,'input',1,'download','readpoint','阅读收费','金币',1,1,107,'a:3:{s:4:\"size\";s:3:\"100\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}','','0','','',0,'',0,0,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(146,2,1,'files',1,'download','files','本地下载','',1,0,6,'a:3:{s:10:\"allow_size\";s:1:\"2\";s:3:\"num\";s:2:\"10\";s:8:\"filetype\";s:15:\"zip,rar,doc,ppt\";}','','0','','',1,'',0,1,0,1)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(150,2,1,'box',1,'download','language','软件语言','',1,0,7,'a:3:{s:7:\"options\";s:117:\"英文|英文,简体中文|简体中文,繁体中文|繁体中文,多国语言|多国语言,其他语言|其他语言\";s:9:\"form_type\";s:6:\"select\";s:7:\"default\";s:6:\"英文\";}','','0','','',0,'',0,1,0,1)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(148,2,1,'input',1,'download','system','软件平台','',1,0,8,'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:21:\"Win2000/WinXP/Win2003\";s:8:\"ispasswd\";s:1:\"0\";}','','0','','',0,'',0,1,0,1)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(151,2,1,'box',1,'download','softtype','软件类型','',1,0,9,'a:3:{s:7:\"options\";s:117:\"国产软件|国产软件,国外软件|国外软件,汉化补丁|汉化补丁,程序源码|程序源码,其他|其他\";s:9:\"form_type\";s:5:\"radio\";s:7:\"default\";s:12:\"国产软件\";}','','0','','',0,'',0,1,0,1)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(152,2,1,'input',1,'download','version','版本号','',1,0,10,'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}','','0','','',0,'',0,1,0,1)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(153,3,1,'textarea',1,'picture','description','描述','',1,1,103,'a:3:{s:5:\"width\";s:3:\"500\";s:6:\"height\";s:3:\"100\";s:7:\"default\";s:0:\"\";}','','0','','',0,'',0,1,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(154,3,1,'input',1,'picture','keywords','关键字','',1,1,102,'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}','','0','','',0,'',0,1,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(155,3,1,'number',1,'picture','arc_sort','排序','',1,1,111,'a:5:{s:10:\"field_type\";s:9:\"mediumint\";s:11:\"num_integer\";s:1:\"6\";s:11:\"num_decimal\";s:1:\"2\";s:4:\"size\";s:3:\"150\";s:7:\"default\";s:3:\"100\";}','','0','','',0,'',0,0,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(156,3,1,'template',1,'picture','template','模板','',1,1,109,'','','0','','',0,'',0,1,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(157,3,1,'box',1,'picture','url_type','文章访问方式','',1,1,110,'a:3:{s:7:\"options\";s:45:\"1|静态访问,2|动态访问 ,3|继承栏目\";s:9:\"form_type\";s:5:\"radio\";s:7:\"default\";s:1:\"3\";}','','0','','',0,'',0,1,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(158,3,1,'datetime',1,'picture','addtime','添加时间','',1,1,106,'a:1:{s:6:\"format\";s:1:\"1\";}','','0','','',0,'',0,0,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(159,3,1,'input',1,'picture','redirecturl','转向链接','',1,1,105,'a:3:{s:4:\"size\";s:3:\"150\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}','','0','','/^http:///',0,'',0,0,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(160,3,1,'cid',1,'picture','cid','栏目','',1,1,2,'','','0','','',0,'',0,1,0,1)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(161,3,1,'input',1,'picture','seo_title','SEO标题','',1,1,5,'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}','','0','','',0,'',0,1,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(162,3,1,'thumb',1,'picture','thumb','缩略图','',1,1,3,'','','0','','',0,'',0,0,0,1)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(163,3,1,'input',1,'picture','html_path','html文件名','',1,1,108,'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}','','0','','',0,'',0,1,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(164,3,1,'flag',1,'picture','flag','属性','',1,1,4,'','','0','','',0,'',0,1,1,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(165,3,1,'title',1,'picture','title','标题','',1,1,1,'a:2:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";}','','0','100','',1,'',0,1,1,1)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(166,3,1,'input',1,'picture','tag','TAG','',1,0,101,'a:3:{s:4:\"size\";s:3:\"300\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}','','0','','',0,'',0,1,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(167,3,1,'content',2,'picture_data','content','正文','',1,1,100,'','','0','','',0,'',0,1,0,1)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(168,3,1,'number',1,'picture','click','点击数','',1,1,112,'a:4:{s:11:\"num_integer\";s:1:\"6\";s:11:\"num_decimal\";s:1:\"2\";s:4:\"size\";s:3:\"150\";s:7:\"default\";s:3:\"100\";}','','0','','',0,'',0,0,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(169,3,1,'box',1,'picture','content_status','状态','',1,1,113,'a:3:{s:7:\"options\";s:26:\"1|审核通过,0|待审查\";s:9:\"form_type\";s:5:\"radio\";s:7:\"default\";s:1:\"1\";}','','0','','',0,'',0,0,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(170,3,1,'input',1,'picture','readpoint','阅读收费','金币',1,1,107,'a:3:{s:4:\"size\";s:3:\"100\";s:7:\"default\";s:0:\"\";s:8:\"ispasswd\";s:1:\"0\";}','','0','','',0,'',0,0,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."field (`fid`,`mid`,`status`,`field_type`,`table_type`,`table_name`,`field_name`,`title`,`tips`,`enable`,`is_system`,`fieldsort`,`set`,`css`,`minlength`,`maxlength`,`validate`,`required`,`error`,`isunique`,`isbase`,`issearch`,`isadd`)
						VALUES(171,3,1,'images',1,'picture','pics','组图','',1,0,6,'a:2:{s:10:\"allow_size\";s:1:\"2\";s:3:\"num\";s:2:\"50\";}','','0','','',0,'',0,1,0,1)");

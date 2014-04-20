<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."link_config (`id`,`webname`,`url`,`logo`,`email`,`comment`,`allow`,`code`,`qq`) VALUES('1','hdphp开源社区','http://www.hdphp.com','hd/Plugin/Link/Data/logo.png','houdunwang@gmail.com','1、请先在贵站做好后盾网的友情链接<br/>
2、将右侧‘文字链接’或‘图片链接’代码复制到贵站<br/>
3、凡开通我站友情链接且内容健康的网站，经管理员审核后，将显示在此友情链接页面<br/>
4、首页友情连接，要求pr>=2、alexa < 10000；其他页面连接根据具体页面而定（请具体咨询）<br/>
5、贵网站要在百度google都有记录收录，且网站访问速度不能太慢','1','1','2300071698')");

<?php

/**
 * Comment 插件
 * @author 后盾向军 <houdunwangxj@gmail.com>
 */
class CommentAddon extends Addon
{

    //插件信息
    public $info = array(
        'name' => 'Comment',
        'title' => '评论',
        'description' => '评论',
        'status' => 1,
        'author' => '后盾网向军',
        'version' => '1.0',
        'has_adminlist' => 1,
    );

    //安装
    public function install()
    {
        if (!M()->exe("DROP TABLE IF EXISTS `" . C('DB_PREFIX') . "addon_comment`")) return false;
        return M()->exe("CREATE TABLE `" . C('DB_PREFIX') . "addon_comment` (
  `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '评论ID',
  `userid` int(10) unsigned DEFAULT NULL COMMENT '用户ID',
  `username` char(50) DEFAULT NULL COMMENT '用户名',
  `comment_status` tinyint(1) DEFAULT NULL COMMENT '评论状态',
  `content` text COMMENT '评论内容',
  `create_time` int(11) DEFAULT NULL,
  `reply` tinyint(1) DEFAULT NULL COMMENT '是否为回复',
  `ip` char(15) DEFAULT NULL COMMENT '用户IP地址',
  `direction` tinyint(1) DEFAULT '0' COMMENT '评论方向{0:无方向,1:正文,2:反方,3:中立}',
  `mid` smallint(5) unsigned DEFAULT NULL,
  `cid` smallint(5) unsigned DEFAULT NULL,
  `aid` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `mid_cid_aid` (`mid`,`cid`,`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");
    }

    //卸载
    public function uninstall()
    {
        return M()->exe("DROP TABLE IF EXISTS `" . C('DB_PREFIX') . "addon_comment`");
    }

    //实现的app_begin钩子方法
    public function APP_BEGIN($param)
    {
        //加载模板标签
//        C('TPL_TAGS', array('@.Addons.Comment.Tag.CommentTag'));
//        p(C('tpl_tags'));
    }
}
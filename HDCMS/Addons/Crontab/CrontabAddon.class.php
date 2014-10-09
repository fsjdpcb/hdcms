<?php

/**
 * Crontab 插件
 * @author 后盾向军 <houdunwangxj@gmail.com>
 */
class CrontabAddon extends Addon
{

    //插件信息
    public $info = array(
        'name' => 'Crontab',
        'title' => '计划任务',
        'description' => '计划任务',
        'status' => 1,
        'author' => '后盾向军',
        'version' => '1.0',
        'has_adminlist' => 1,
    );

    //安装
    public function install()
    {
        $db_prefix=C('DB_PREFIX');
        if (!M()->exe("DROP TABLE IF EXISTS `" . $db_prefix . "addon_crontab`")) return false;
        $status= M()->exe("CREATE TABLE `" .$db_prefix. "addon_crontab` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '任务名称',
  `classname` varchar(255) DEFAULT NULL COMMENT '执行类名称',
  `username` char(50) DEFAULT NULL COMMENT '管理员帐号',
  `mday` tinyint(4) DEFAULT NULL,
  `hours` tinyint(4) DEFAULT NULL,
  `minutes` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='计划任务'");
        M()->exe("INSERT INTO `{$db_prefix}addon_crontab` VALUES ('1', '更新文章', 'AutoSendArticle', 'admin', '0', '0', '10')");
        M()->exe("INSERT INTO `hd_addon_crontab` VALUES ('2', '生成首页静态', 'CreateIndexHtml', 'admin', '0', '0', '10')");
        if(!$status)return false;
        if (!M()->exe("DROP TABLE IF EXISTS `" . $db_prefix . "addon_crontab_log`")) return false;
        $status= M()->exe("CREATE TABLE `" .$db_prefix. "addon_crontab_log` (
 `lid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id` int(11) DEFAULT NULL COMMENT '计划任务id',
  `runtime` int(11) DEFAULT NULL COMMENT '执行时间',
  PRIMARY KEY (`lid`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
        if(!$status)return false;
        return true;
    }

    //卸载
    public function uninstall()
    {
        $db_prefix=C('DB_PREFIX');
        if (!M()->exe("DROP TABLE IF EXISTS `" . $db_prefix . "addon_crontab`")) return false;
        if (!M()->exe("DROP TABLE IF EXISTS `" . $db_prefix . "addon_crontab_log`")) return false;
        return true;
    }

    //实现的APP_BEGIN钩子方法
    public function APP_BEGIN($param)
    {
        $crontab = M()->join('__addon_crontab_log__ l RIGHT JOIN __addon_crontab__ c  ON c.id=l.id')->all();
        $time = getdate();
        if (empty($crontab)) return;
        $classData = array();
        foreach ($crontab as $c) {
            $runtime = $c['runtime'];//旧的执行时间
            //验证时间
            if (date('m') == date('m', $runtime)) {//同月时验证
                $nextTime = $runtime + ($c['mday'] * 24 * 3600) + ($c['hours'] * 3600) + ($c['minutes'] * 60);
                if ($nextTime>time()) continue;
            }
            $classData[] = $c['classname'];//准备执行的程序
        }
        //执行程序
        foreach ($classData as $class) {
            $file = APP_ADDON_PATH . 'Crontab/Soft/' . $class . '.class.php';
            //检测类文件
            if (!is_file($file)) continue;
            require_cache($file);
            if (!class_exists($class)) continue;//检测类
            if (!method_exists($class, 'run')) continue;//检测方法
            $obj = new $class;
            $obj->run();
            $ids = M('addon_crontab')->getField('id', true);
            $map['id'] = array('NOT IN', $ids, 'OR');
            $map['id'] = array('EQ', $c['id']);
            M('addon_crontab_log')->where($map)->del();
            M('addon_crontab_log')->add(array('id' => $c['id'], 'runtime' => time()));
        }
    }
}

































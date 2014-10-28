<?php

/**
 * ContentKeywords 插件
 * @author 后盾向军 <houdunwangxj@gmail.com>
 */
class ContentKeywordsAddon extends Addon
{

    //插件信息
    public $info = array(
        'name' => 'ContentKeywords',
        'title' => '内容关键词替换',
        'description' => '文章内容关键词替换',
        'status' => 1,
        'author' => '后盾网向军',
        'version' => '1.0',
        'has_adminlist' => 1,
    );

    //安装
    public function install()
    {
        if (!M()->exe("DROP TABLE IF EXISTS `" . C('DB_PREFIX') . "addon_content_keywords`")) return false;
        return M()->exe("CREATE TABLE `" . C('DB_PREFIX') . "addon_content_keywords` (
   `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `word` varchar(100) DEFAULT NULL,
  `replace_word` varchar(100) DEFAULT NULL,
  `nums` smallint(6) DEFAULT '1' COMMENT '替换次数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;");
    }

    //卸载
    public function uninstall()
    {
        return M()->exe("DROP TABLE IF EXISTS `" . C('DB_PREFIX') . "addon_content_keywords`");
    }

    //实现的CONTENT_SHOW钩子方法
    public function CONTENT_SHOW(&$param)
    {
        //内容
        if (empty($param['content'])) return;
        $content = $param['content'];
        //获得关键词
        $word = M('addon_content_keywords')->all();
        foreach ($word as $w) {
            $nums=intval($w['nums']);
            $word=str_replace('/','',$w['word']);
            $content = preg_replace('/'.$word.'/s', $w['replace_word'],$content,$nums);
        }
        $param['content'] = $content;
    }
}
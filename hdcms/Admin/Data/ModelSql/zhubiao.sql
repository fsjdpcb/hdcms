CREATE TABLE `@pre@@table@`(
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `cid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '栏目cid',
  `uid` int(10) unsigned NOT NULL COMMENT '用户uid',
  `title` char(100) NOT NULL DEFAULT '' COMMENT '标题',
  `flag` set('热门','置顶','推荐','图片','精华','幻灯片','站长推荐') DEFAULT NULL,
  `new_window` tinyint(1) NOT NULL DEFAULT '0' COMMENT '新窗口打开',
  `seo_title` char(100) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `thumb` varchar(255) NOT NULL DEFAULT '' COMMENT '缩略图',
  `click` int(6) NOT NULL DEFAULT '0' COMMENT '点击数',
  `source` char(60) NOT NULL DEFAULT '' COMMENT '来源',
  `redirecturl` varchar(255) NOT NULL DEFAULT '' COMMENT '转向链接',
  `html_path` varchar(255) NOT NULL DEFAULT '' COMMENT '自定义生成的静态文件地址',
  `addtime` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `updatetime` int(10) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `color` char(7) NOT NULL DEFAULT '' COMMENT '标题颜色',
  `template` varchar(255) NOT NULL DEFAULT '' COMMENT '模板',
  `url_type` tinyint(80) NOT NULL DEFAULT '3' COMMENT '文章访问方式  1 静态访问  2 动态访问  3 继承栏目',
  `arc_sort` mediumint(6) NOT NULL DEFAULT '0' COMMENT '排序',
  `content_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '文章状态  1 已审核 0 未审核',
  `keywords` varchar(100) NOT NULL DEFAULT '' COMMENT '关键字',
  `description` varchar(255) DEFAULT NULL COMMENT '描述',
  `favorites` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '收藏数',
  `comment_num` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '评论数',
  PRIMARY KEY (`aid`),
  KEY `uid` (`uid`),
  KEY `cid` (`cid`),
  KEY `flag` (`flag`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='文章表';

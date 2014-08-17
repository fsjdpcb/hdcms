CREATE TABLE `@pre@@table@_data` (
  `aid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文章主表ID',
  `content` text COMMENT '内容',
  `allow_comment` tinyint(80) NOT NULL DEFAULT '3' COMMENT '允许评论',
  KEY `aid` (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章正文表';
<?php

class ModelModel extends Model
{
    //表名
    public $table = 'model';
    //模型id
    private $_mid;
    //模型缓存
    private $model;
    //自动完成
    public $auto = array(
        //模型表名小写
        array("table_name", "strtolower", 'function', 1, 3),
        //控制器首字母大写
        array("model_name", "ucfirst", 'function', 1, 3),
    );
    //自动验证
    public $validate = array(
        array("model_name", "nonull", "模型名称不能为空", 1, 3),
        array("table_name", "nonull", "表名不能为空", 1, 3)
    );

    //构造函数
    public function __init()
    {
        $this->_mid = Q('mid', NULL, 'intval');
        $this->model = cache('model');
    }

    //创建模型表
    public function create_model_table()
    {
        //类型  基本模型|独立模型（只有主表）
        $type = Q('type', 1, 'intval');
        //主表
        $masterTable = C("DB_PREFIX") . strtolower($_POST['table_name']);
        $masterSql = <<<str
                    -- -----------------------------------------------------
                    -- 主表
                    -- -----------------------------------------------------
                    CREATE TABLE `{$masterTable}` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `cid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '栏目cid',
  `title` char(100) NOT NULL DEFAULT '' COMMENT '标题',
  `flag` set('热门','置顶','推荐','图片','精华','幻灯片','站长推荐') DEFAULT NULL,
  `new_window` tinyint(1) NOT NULL DEFAULT '0' COMMENT '新窗口打开',
  `seo_title` char(100) NOT NULL DEFAULT '' COMMENT '标题',
  `thumb` char(200) NOT NULL DEFAULT '' COMMENT '缩略图',
  `click` mediumint(9) NOT NULL DEFAULT '0' COMMENT '点击次数',
  `source` char(30) NOT NULL DEFAULT '' COMMENT '来源',
  `redirecturl` char(100) NOT NULL DEFAULT '' COMMENT '转向链接',
  `html_path` varchar(255) NOT NULL DEFAULT '' COMMENT '自定义生成的静态文件地址',
  `allowreply` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否允许回复',
  `addtime` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `updatetime` int(10) NOT NULL DEFAULT '0' COMMENT '发布时间 ',
  `color` char(7) NOT NULL DEFAULT '' COMMENT '标题颜色',
  `template` varchar(255) NOT NULL DEFAULT '' COMMENT '模板',
  `url_type` tinyint(1) NOT NULL DEFAULT '3' COMMENT '文章访问方式  1 静态访问  2 动态访问  3 继承栏目',
  `arc_sort` int(10) unsigned NOT NULL DEFAULT '100' COMMENT '排序',
  `state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 已审核 0 未审核',
  `keywords` char(100) NOT NULL DEFAULT '' COMMENT '关键字',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `uid` int(10) unsigned NOT NULL COMMENT '用户uid',
  `favorites` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '收藏数',
  `comment_num` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '评论数',
  `read_credits` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '阅读金币',
  PRIMARY KEY (`aid`),
  KEY `cid` (`cid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章表';;
str;
        //创建主表
        if(!$this->exe($masterSql)){
            $this->error='创建主表失败';
        }
        //基本模型-->创建附表
        if ($type == 1) {
            $slaveTable = $masterTable . '_data';
            $slaveSql = <<<str
                -- -----------------------------------------------------
                -- 从表
                -- -----------------------------------------------------
                CREATE TABLE `{$slaveTable}` (
  `aid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文章主表ID',
  `content` text COMMENT '正文',
  KEY `aid` (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章正文表';
str;

            $this->exe($slaveSql);
        }
        return true;
    }

    /**
     * 添加模型
     */
    public function add_model()
    {
        //创建模型表
        if ($this->create()) {
            if ($this->create_model_table()) {
                //向模型表添加模型信息
                return $this->add();
            }
        }
    }

    /**
     * 修改模型
     */
    public function edit_model()
    {
        if ($this->create()) {
            return $this->save();
        }
    }

    /**
     * 删除模型
     */
    public function del_model()
    {
        //判断是否有栏目在使用模型
        $db= M();
        if ($db->table('category')->find("mid={$this->_mid}")) {
            $this->error = '请先删除模型栏目';
        } else {
            //查找当前模型信息
            $model = $this->find($this->_mid);
            $table = C("DB_PREFIX") . $this->model[$this->_mid]['table_name'];
            //删除主表与表字段缓存
            if ($db->exe("DROP TABLE IF EXISTS $table")) {
                $db->exe("DROP TABLE IF EXISTS {$table}_data");
                //删除模型字段信息
                $db->table("field")->where("mid={$this->_mid}")->del();
                //删除表记录
                $this->del($this->_mid);
                //删除模型字段缓存
                return F($this->_mid, NULL, FIELD_CACHE_PATH);
            }
        }
    }

    //更新模型缓存
    public function update_cache()
    {
        $model = $this->order(array("m_order" => "desc"))->all();
        $data = array();
        foreach ($model as $d) {
            $data[$d['mid']] = $d;
        }
        return F("model", $data);
    }


    public function __after_insert($data)
    {
        $this->update_cache();
    }

    public function __after_update($data)
    {
        $this->update_cache();
    }

    public function __after_delete($data)
    {
        $this->update_cache();
    }

}
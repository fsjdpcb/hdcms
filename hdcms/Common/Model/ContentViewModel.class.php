<?php

/**
 * 内容视图模型
 * Class ContentModel
 */
class ContentViewModel extends ViewModel
{
    //模型对象
    static private $instance = array();

    //实例化模型对象
    static public function getInstance($mid)
    {
        if (!isset(self::$instance[$mid])) {
            $modelCache = F('model', false, CACHE_DATA_PATH);
            $table = $modelCache[$mid]['table_name'];
            $model = new self($table);
            $model->view[$table] = array('_type' => "INNER");
            //副表
            $model->view[$table . '_data'] = array('_type' => 'INNER', '_on' => $table . ".aid={$table}_data.aid");
            //栏目表
            $model->view['category'] = array('_type' => 'INNER', '_on' => "category.cid=$table.cid");
            //会员表
            $model->view['user'] = array('_on' => "user.uid=$table.uid");
            self::$instance[$mid] = $model;
            return $model;
        } else {
            return self::$instance[$mid];
        }
    }

}

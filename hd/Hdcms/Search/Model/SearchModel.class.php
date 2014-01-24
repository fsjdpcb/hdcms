<?php

class SearchModel extends Model
{
    //表
    public $table = "search";

    //构造函数
    public function __init()
    {
    }

    //关键词搜索
    public function search()
    {
        $searchWord = Q("search");
        //关键词验证
        if (!$searchWord)
            return false;
        //===========================查询条件====================================
        //关键词模式 OR AND
        $kwtype = Q("kwtype", 1, "intval") == 1 ? " OR " : " AND ";
        $where = "";
        //发表时间
        $starttime = Q("post.starttime", NULL, "intval");
        if ($starttime) {
            $addtime = $starttime * 3600 * 24;
            $where .= " addtime>$addtime $kwtype";
        }
        //栏目cid
        $cid = Q("cid", NULL, "intval");
        if ($cid) {
            $where .= " cid = $cid $kwtype";
        }
        //去除and or
        if (!empty($where)) {
            $this->where = substr($where, 0, strlen($kwtype));
        }
        //搜索内容
        $where .= $this->kwtype . " title LIKE '%{$searchWord}%'";
        $searchtype = Q("searchtype", "titlekeyword");
        //搜索keywords字段
        if ($searchtype == 'titlekeyword') {
            $where .= $kwtype . " keywords LIKE '%{$searchWord}%'";
        }
        //===========================查询条件====================================
        $db = M("Content");
        //显示条数
        $pagerow = Q("pagerow", 10, "intval");
        //总条数
        $count = $db->where($where)->count();
        //页码处理
        $page = new Page($count, $pagerow);
        //排序
        $order = Q("post.orderby") ? Q("post.orderby") . " DESC " : " aid DESC ";
        //获得搜索结果
        $result = $db->where($where)->limit($page->limit())->order($order)->all();
        //=======================修改搜索词记数=================================
        $total = $this->where("name='{$searchWord}'")->getField("total");
        $total = $total ? $total + 1 : 1;
        $this->replace(array("name" => $searchWord, "total" => $total));
        //=======================修改搜索词记数=================================
        return array(
            "data" => $result, //数据
            "page" => $page->show() //分页
        );
    }
}
<?php

/**
 * 内容视图模型
 * Class ContentViewModel
 */
class ContentViewModel extends ViewModel
{
    //表
    public $table;
    //副表
    protected $_stable;
    //模型mid
    protected $_mid;
    //栏目id
    protected $_cid;
    //文章id
    protected $_aid;
    //模型缓存
    protected $_model;
    //栏目缓存
    protected $_category;

    /**
     * 构造函数
     * $options=array('mid'=>模型mid)
     */
    public function __init($options)
    {
        //----------------缓存数据
        $this->_category = F("category");
        $this->_model = F("model");
        $this->_mid = isset($options['mid']) ? intval($options['mid']) : Q('mid', 1, 'intval');
        $this->_cid = Q('cid', null, 'intval');
        $this->_aid = Q('aid', null, 'intval');
        //主表
        $this->table = $this->_model[$this->_mid]['table_name'];
        //副表
        $this->_stable = $this->table . '_data';
        //表关联
        $this->view = array(
            //栏目表
            'category' => array(
                'type' => INNER_JOIN,
                'on' => $this->table . '.cid=category.cid'
            ),
            "user" => array(
                'type' => INNER_JOIN,
                'on' => $this->table . '.uid=user.uid'
            )
        );
    }

    /**
     * 获得列表页内容
     */
    public function get_article()
    {
        //文章开始时间
        if ($beginTime = Q('search_begin_time', NULL, 'strtotime'))
            $where[] = "addtime>=$beginTime";
        //文章结束时间
        if ($endTime = Q('search_end_time', NULL, 'strtotime'))
            $where[] = "addtime<=$endTime";
        //文章属性flag
        if ($flag = Q('flag', NULL, ''))
            $where[] = "find_in_set('$flag',flag)";
        //文章关键词
        $searchKeyword = Q("search_keyword");
        //----------------------------------------------按类型搜索
        $searchType = Q("search_type");
        if ($searchType && $searchKeyword) {
            switch ($searchType) {
                case 1:
                    //按标题
                    $where[] = "title like '%{$searchKeyword}%'";
                    break;
                case 2:
                    //按简介
                    $where[] = $this->tableFull.".description like '%{$searchKeyword}%'";
                    break;
                case 3:
                    //按用户名
                    $where[] = "username like '%{$searchKeyword}%'";
                    break;
                case 4:
                    //按用户uid
                    $where[] = C('DB_PREFIX').'user.uid=' . intval($searchKeyword);
                    break;
            }
        }
        //文档状态
        $where[]=$this->tableFull.'.state='.Q('state',1,'intval');
        //-------------------------设置当前栏目与子栏目条件
        $_cat = Data::channelList($this->_category,$this->_cid);
        $_cid=array($this->_cid);
        foreach($_cat as $c){
            $_cid[]=$c['cid'];
        }
        $where[]=C('DB_PREFIX').'category.cid IN ('.implode(',',$_cid).')';
        //-----------------------------------搜索条件----------------------
        //总记录数
        $count = $this->join('category,user')->where($where)->count();
        $page = new Page($count, 15);
        $page_list = $page->show();
        //获得文章列表
        $field = "title,username,aid,arc_sort,catname,updatetime,flag,".$this->tableFull.".state,".
                    $this->tableFull.".cid,".C("DB_PREFIX").'category.mid';
        $data = $this->field($field)->where($where)->order('arc_sort ASC')->all();
        return array('page' => $page_list, 'data' => $data);
    }
}
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
            ),
            "model" => array(
                'type' => INNER_JOIN,
                'on' => 'model.mid=category.mid'
            ),
            'content_tag' => array(
                'type' => LEFT_JOIN,
                'on' => 'content.aid=content_tag.aid'
            ),
            'tag' => array(
                'type' => LEFT_JOIN,
                "on" => "content_tag.tid=tag.tid"
            )
        );
        //副表关联
        $this->view [$this->_stable] = array(
            'type' => INNER_JOIN,
            'on' => $this->table . ".aid={$this->table}_data.aid"
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
        //按类型搜索
        $searchType = Q("search_type");
        if ($searchType && $searchKeyword) {
            switch ($searchType) {
                case 1:
                    //按标题
                    $where[] = "title like '%{$searchKeyword}%'";
                    break;
                case 2:
                    //按简介
                    $where[] = "description like '%{$searchKeyword}%'";
                    break;
                case 3:
                    //按用户名
                    $where[] = "author like '%{$searchKeyword}%'";
                    break;
                case 4:
                    //按用户aid
                    $where[] = 'aid=' . intval($searchKeyword);
                    break;
                case 5:
                    //按tag搜索
                    $where[] = "tag ='$searchKeyword'";
                    break;
            }
        }
        /**
         * 文章状态：1 已审核 0未审核 只有管理组可以指定文章状态
         */
        if (session('admin')) {
            $where[] = $this->tableFull . '.state=' . Q('state', 1, 'intval');
        } else {
            $where[] = $this->tableFull . '.state=1';
        }
        //=================设置不前栏目与子栏目条件
        $_cat = Data::channelList($this->_category,$this->_cid);
        $_cid=array($this->_cid);
        foreach($_cat as $c){
            $_cid[]=$c['cid'];
        }
        $where[]=$this->tableFull.'.cid IN ('.implode(',',$_cid).')';
        //组合SQL中WHERE的部分
        $where = implode(" AND ", $where);
        //关联表
        $join = 'user,content_tag,tag';
        //---------------------搜索条件----------------------
        //总记录数
        $pre = C('DB_PREFIX');
        //统计count的sql
        $sql = "select count(*) AS c from (SELECT {$this->tableFull}.aid FROM {$pre}content_tag
                JOIN {$pre}tag  ON {$pre}content_tag.tid={$pre}tag.tid
                RIGHT JOIN {$this->tableFull} ON {$this->tableFull}.aid = {$pre}content_tag.aid
                INNER JOIN {$pre}category ON {$this->tableFull}.cid = {$pre}category.cid AND {$pre}category.cid={$this->tableFull}.cid
                WHERE $where GROUP BY {$this->tableFull}.aid) AS g";
        $count = $this->join(null)->query($sql);
        $page = new Page($count[0]['c'], 15);
        $page_list = $page->show();
        //获得文章列表
        $sql = "SELECT * FROM {$pre}content_tag
                JOIN {$pre}tag  ON {$pre}content_tag.tid={$pre}tag.tid
                RIGHT JOIN {$this->tableFull} ON {$this->tableFull}.aid = {$pre}content_tag.aid
                INNER JOIN {$pre}category ON {$this->tableFull}.cid = {$pre}category.cid AND {$pre}category.cid={$this->tableFull}.cid
                INNER JOIN {$pre}user ON {$this->tableFull}.uid = {$pre}user.uid
                WHERE $where GROUP BY {$this->tableFull}.aid ORDER BY {$this->tableFull}.aid DESC LIMIT " . $page->limit(true);
        $data = $this->join()->query($sql);
        return array('page' => $page_list, 'data' => $data);
    }
}
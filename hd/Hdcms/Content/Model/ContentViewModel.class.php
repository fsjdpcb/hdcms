<?php

/**
 * 内容视图模型
 * Class ContentViewModel
 */
class ContentViewModel extends ViewModel
{
    //表
    public $table = 'content';
    //栏目id
    private $_cid;
    //模型mid
    private $_mid;
    //模型缓存
    private $_model;
    //栏目缓存
    private $_category;

    //获得内容
    public function __init()
    {
        $this->_cid = Q('cid', NULL, 'intval');
        $this->_mid = Q('mid', NULL, 'intval');
        $this->_category = F("category", false, CATEGORY_CACHE_PATH);
        $this->_model = F("model", false, MODEL_CACHE_PATH);
        if (!$this->_cid) {
            halt("ContentViewModel没有可操作的cid");
        }
        $this->_mid = $this->_category[$this->_cid]['mid'];
        //模型表
        $this->table = $this->_model[$this->_mid]['tablename'];
        //关联栏目表
        $this->view = array(
            "category" => array(
                "type" => INNER_JOIN,
                "on" => $this->table . ".cid=category.cid"
            )
        );
        //属性表
        $this->view['content_flag'] = array(
            "type" => LEFT_JOIN,
            "on" => $this->table . ".aid=content_flag.aid"
        );
        //副表关联
        if ($this->_model[$this->_mid]['type'] == 1) {
            $this->view [$this->table . '_data'] = array(
                "type" => INNER_JOIN,
                "on" => $this->table . ".aid={$this->table}_data.aid"
            );
        }
    }

    /**
     * 获得内容列表数据
     * 这是根据搜索内容获得，用于content模块方法
     */
    public function get_content()
    {
        //---------------------搜索条件----------------------
        //文章开始时间
        if ($beginTime = Q('search_begin_time', NULL, 'strtotime'))
            $where[] = "addtime>=$beginTime";
        //文章结束时间
        if ($endTime = Q('search_end_time', NULL, 'strtotime'))
            $where[] = "addtime<=$endTime";
        //文章属性flag
        if ($flag = Q('search_flag', NULL, ''))
            $where[] = C("DB_PREFIX") . "content_flag.fid=$flag";
        //文章关键词
        $searchKeyword = Q("post.search_keyword");
        //按类型搜索
        $searchType = Q("post.search_type");
        if ($searchType && $searchKeyword) {
            switch ($searchType) {
                case 1:
                    //按标题
                    $where[] = $this->tableFull . ".title like '%{$searchKeyword}%'";
                    break;
                case 2:
                    //按简介
                    $where[] = $this->tableFull . ".description like '%{$searchKeyword}%'";
                    break;
                case 3:
                    //按用户名
                    $where[] = $this->tableFull . ".author like '%{$searchKeyword}%'";
                    break;
                case 4:
                    //按用户aid
                    $where[] = $this->tableFull . ".aid=" . intval($searchKeyword);
                    break;
            }
        }
        //文章状态：1 已审核 0未审核
        $where[] = "status=".Q("status", 1, "intval");
        //按栏目
        $where[] =$this->tableFull. ".cid=" . $this->_cid;
        //---------------------搜索条件----------------------

        //主键id
        $pri = $this->tableFull.'.aid';
        //总条数
        foreach($where as $w){
            $w.=' AND ';
        }
        //表前缀
        $pre =C("DB_PREFIX");
        //总记录数SQL
        $sql = "SELECT COUNT(*) AS c FROM (
            SELECT $pri FROM  {$this->tableFull} INNER JOIN {$pre}category  ON {$this->tableFull}.cid={$pre}category.cid
            LEFT JOIN {$pre}content_flag  ON {$this->tableFull}.aid={$pre}content_flag.aid
            WHERE ".substr($w,0,-4)."
            GROUP BY $pri) AS t";
        $result= M()->query($sql);
        $count = $result[0]['c'];
        //根据配置文件设置显示条数
        $page = new Page($count, C("ADMIN_LIST_ROW"));
        //字段集
        $field = $pri .','.$this->tableFull. ".cid,title,arc_sort,status,catname,author,updatetime";
        //文章数据
        $data = $this->field($field)->where($where)->group($pri)->order('arc_sort ASC,aid DESC')->limit($page->limit())->all();
        firephp($where);
        //为每篇文章添加属性字符串
        if ($data) {
            $flag = K("ContentFlag");
            foreach ($data as $n => $d) {
                $f = $flag->field("flagname")->where(array("aid" => $d['aid'], 'cid' => $this->_cid))->all();
                if (!empty($f) && is_array($f)) {
                    $s_flag = "[<font color='red'>";
                    foreach ($f as $_f) {
                        $s_flag .= $_f['flagname'] . "&nbsp;";
                    }
                    $data[$n]['flag'] = substr($s_flag, 0, -6) . "]</font>";
                }
            }
        }
        return array('data'=>$data,'page'=>$page->show());
    }
}
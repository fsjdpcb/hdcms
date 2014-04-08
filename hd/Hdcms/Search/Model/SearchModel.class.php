<?php
import('Url', 'hd.Hdcms.Index.Lib');

/**
 * 搜索列表
 * Class SearchModel
 */
class SearchModel extends ViewModel
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
    }


    //关键词搜索
    public function search()
    {
        //搜索内容
        $word = Q("word", NULL, 'htmlspecialchars,trim,strip_tags');
        //搜索类型
        $type = Q("type", NULL, 'htmlspecialchars,trim,strip_tags,strtolower');
        if (empty($word))
            return false;
        //===========================查询条件====================================
        switch ($type) {
            case 'tag':
                $count = $this->where("tag='$word'")->group($this->tableFull . '.aid')->count();
                $page = new Page($count, 10);
                $data = $this->where("tag='$word'")->group($this->tableFull . '.aid')->all();
                if (!empty($data)) {
                    foreach ($data as $n => $d) {
                        $d['url'] = Url::get_content_url($d);
                        $data[$n] = $d;
                    }
                }
                return array('page' => $page->show(), 'data' => $data);
                break;
        }
    }
}
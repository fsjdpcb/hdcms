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
    //模型mid
    protected $_mid;
    //模型缓存
    protected $_model;
    //栏目缓存
    protected $_category;

    /**
     * 构造函数
     * $options=array('mid'=>模型mid)
     */
    public function __init()
    {
        //----------------缓存数据
        $this->_category = cache("category");
        $this->_model = cache("model");
        $this->_mid = Q('mid', 1, 'intval');
        //主表
        $this->table = $this->_model[$this->_mid]['table_name'];
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
            default:
                $where = $this->tableFull.".state=1 AND tag='{$word}'";
                $count = $this->where($where)->group($this->tableFull . '.aid')->count();
                $page = new Page($count, 10);
                $data = $this->where($where)->group($this->tableFull . '.aid')->all();
                if (!empty($data)) {
                    foreach ($data as $n => $d) {
                        $d['url'] = Url::get_content_url($d);
                        $data[$n] = $d;
                    }
                }
                $data= array('page' => $page->show(), 'data' => $data);
                break;
        }
        //记录搜索关键词
        $db = M('search');
        $total = $db->where('mid=' . $this->_mid)->where("word='$word'")->getField('total');
        $total = $total ? $total + 1 : 1;
        $db->replace(
            array(
                'mid' => $this->_mid,
                'word' => $word,
                'total' => $total
            )
        );
        return $data;
    }
}
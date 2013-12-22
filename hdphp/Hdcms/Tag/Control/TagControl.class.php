<?php
/**
 * 内容tag管理
 * Class TagControl
 * @author <houdunwangxj@gmail.com>
 */
class TagControl extends AuthControl
{
    private $db;

    public function __init()
    {
        parent::__init();
        $this->db = K("tag");
    }

    //显示关键词列表
    public function index()
    {
        $page = new Page($this->db->count(), C("ADMIN_LIST_ROW'"));
        $data = $this->db->limit($page->limit())->order("tid DESC")->all();
        $this->assign("data", $data);
        $this->assign("page", $page->show());
        $this->display();
    }

    //删除tag
    public function del()
    {
        $tid = Q("post.tid");
        if (!empty($tid)) {
            foreach ($tid as $i) {
                $this->db->del(intval($i));
            }
            $this->_ajax(1);
        }
    }

    //修改tag
    public function edit()
    {
        if (IS_POST) {
            if ($this->db->save()) {
                $this->_ajax(1);
            }
        } else {
            $tid = Q("get.tid", NULL, "intval");
            $field = $this->db->find($tid);
            $this->assign("field", $field);
            $this->display();
        }
    }
    //添加tag
    public function add()
    {
        if (IS_POST) {
            if ($this->db->add()) {
                $this->_ajax(1);
            }
        } else {
            $this->display();
        }
    }
}
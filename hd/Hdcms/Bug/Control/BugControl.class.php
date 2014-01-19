<?php

/**
 *
 * Class IndexControl
 */
class BugControl extends AuthControl
{
    //模型
    private $_db;
    //角色rid
    private $_rid;

    public function __init()
    {
        parent::__init();
        $this->_db = M("bug");
    }

    //bug管理列表
    public function showBug()
    {
        //bug类型，用于获取数据条件
        $status = Q("get.status", 1, "intval");
        $where = "status=$status";
        //统计
        $count = $this->_db->where($where)->count();
        //分页处理
        $page = new Page($count);
        $this->page = $page->show();
        //分配BUG数据
        $this->data = $this->_db->where($where)->limit($page->limit())->order("bid DESC")->all();
        $this->display();
    }

    //反馈bug
    public function feedback()
    {
        $this->display();
    }

    //解决反馈
    public function resolve()
    {
        if (IS_POST) {
            if ($this->_db->save()) {
                $this->ajax(array('state' => 1, 'message' => '处理成功'));
            }
        } else {
            //问题id
            $bid = Q("bid", NULL, "intval");
            if ($bid) {
                $this->field = $this->_db->find($bid);
                $this->display();
            }
        }
    }

    //删除反馈
    public function del()
    {
        $bid = Q("post.bid", NULL);
        if ($bid) {
            if ($this->_db->del($bid)) {
                $this->ajax(array('state' => 1, 'message' => '删除成功'));
            }
        }
    }
}

?>
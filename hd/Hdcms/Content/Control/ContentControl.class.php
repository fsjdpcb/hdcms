<?php

/**
 * 后台内容管理
 * Class ContentControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class ContentControl extends AuthControl
{
    //栏目缓存
    private $_category;
    //模型缓存
    private $_model;
    //模型mid
    private $_mid;
    //栏目cid
    private $_cid;
    //文章aid
    private $_aid;
    //模型对象
    private $_db;

    //构造函数
    public function __init()
    {
        //父类构造函数
        parent::__init();
        $this->_model = F("model", false);
        $this->_category = F("category", false);
        $this->_cid = Q("cid", NULL, "intval");
        $this->_aid = Q("aid", NULL, "intval");
        $this->_mid = Q('mid', null, 'intval');
        if (!isset($this->_model[$this->_mid])) {
            $this->error("模型不存在！");
        }
        if (!isset($this->_category[$this->_cid])) {
            $this->error("栏目不存在！");
        }
        $this->_db = K("Content");
        //验证权限
        $this->check_auth();
    }

    /**
     * 验证操作权限
     */
    private function check_auth()
    {
        switch (strtolower(METHOD)) {
            //查看
            case 'content':
                break;
            case 'add':
                break;
            case 'edit':
                break;
            case 'del':
                break;
            case 'audit':
                break;
        }
    }

    //已审核文章内容页列表
    public function content()
    {
        $this->assign(K("ContentView")->search());
        //分配属性flag
        $this->flag = F('flag');
        $this->display();
    }

    //更新排序
    public function update_order()
    {
        $arc_order = Q("post.arc_order");
        if (!empty($arc_order)) {
            foreach ($arc_order as $aid => $order) {
                $aid = intval($aid);
                $order = intval($order);
                $data = array("aid" => $aid, "arc_sort" => $order);
                $this->_db->join(false)->trigger(false)->save($data);
            }
        }
        $this->_ajax(1, '更改排序成功');
    }

    /**
     * 添加文章
     */
    public function add()
    {
        if (IS_POST) {
            if ($this->_db->add_content()) {
                $this->_ajax(1, '发表成功！');
            }
        } else {
            //分配属性
            $this->flag = F('flag');
            //分配栏目
            $this->category = $this->_category[$this->_cid];
            //分配自定义字段界面
            $this->custom_field = $this->_db->get_current_field_view();
            $this->display();
        }
    }


    //修改文章
    public function edit()
    {
        //添加文章神图
        if (IS_POST) {
            if ($this->_db->edit_content()) {
                $this->_ajax(1, '修改文章成功');
            }
        } else {
            $aid = Q("aid", null, "intval");
            if ($aid) {
                //文章字段数据
                $this->field = $this->_db->get_one_content($aid);
                //FLAG属性
                $this->flag = F('flag');
                //自定义字段处理
                $this->custom_field = $this->_db->get_current_field_view($aid);
                $this->display();
            }
        }
    }

    //删除文章
    public function del()
    {
        $aids = Q("request.aid");
        if (!empty($aids)) {
            if (!is_array($aids)) {
                $aids = array($aids);
            }
            foreach ($aids as $aid)
                $this->_db->del_content($aid);
            $this->_ajax(1, '删除成功');
        } else {
            $this->_ajax(0, '参数错误');
        }

    }

    //审核或取消审核
    public function audit()
    {
        //1 审核  0 取消审核
        $state = Q("status", 1, "intval");
        //文章id
        $aids = Q("post.aid");
        foreach ($aids as $aid) {
            $this->_db->join()->trigger()->save(array("aid" => $aid, "state" => $state));
        }
        $this->_ajax(1, '操作成功！');
    }

    /**
     * 移动文章
     */
    public function move_content()
    {
        if (IS_POST) {
            //移动方式  1 从指定ID  2 从指定栏目
            $from_type = Q("post.from_type", NULL, "intval");
            //目标栏目cid
            $to_cid = Q("post.to_cid", NULL, 'intval');
            if ($to_cid) {
                switch ($from_type) {
                    case 1:
                        //移动aid
                        $aid = Q("post.aid", NULL, "trim");
                        $aid = explode("|", $aid);
                        if ($aid && is_array($aid)) {
                            foreach ($aid as $id) {
                                if (is_numeric($id))
                                    $this->_db->trigger()->join()->save(array("aid" => $id, "cid" => $to_cid));
                            }
                        }
                        break;
                    case 2:
                        //来源栏目cid
                        $from_cid = Q("post.from_cid", NULL, 'intval');
                        if ($from_cid) {
                            foreach ($from_cid as $d) {
                                if (is_numeric($d))
                                    $this->_db->trigger()->join()->where("cid=$d")->save(array("cid" => $to_cid));
                            }
                        }
                        break;
                }
            }
            $this->_ajax(1, '移动成功！');
        } else {
            $category = $this->_category;
            foreach ($category as $n => $v) {
                $category[$n]['selected'] = '';
                if ($this->_cid == $v['cid']) {
                    $category[$n]['selected'] = "selected";
                }
                //非本栏目模型关闭
                if ($this->_mid != $v['mid']) {
                    $category[$n]['disabled'] = 'disabled';
                }
            }
            $this->category = $category;
            $this->display();
        }
    }

}









































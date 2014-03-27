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
        if ($this->_cid) {
            if (!isset($this->_category[$this->_cid])) {
                $this->error("栏目不存在！");
            }
            $this->_mid = $this->_category[$this->_cid]['mid'];
            $this->_db = K("Content");
        }
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

    /**
     * 选择栏目
     */
    public function index()
    {
        $this->display();
    }

    /**
     * 异步获得目录树，内容左侧目录列表
     */
    public function ajax_category_ztree()
    {
        $category = array();
        foreach ($this->_category as $n => $cat) {
            $data = array();
            if ($cat['cattype'] != 3) {
                $data['id'] = $cat['cid'];
                $data['pId'] = $cat['pid'];
                $data['url'] = U('content', array('cid' => $cat['cid'], 'state' => 1));
                $data['target'] = 'content';
                $data['open'] = true;
                $data['name'] = $cat['catname'] . "({$cat['cid']})";
                $category[] = $data;
            }
        }
        $this->ajax($category);
    }

    //已审核文章内容页列表
    public function content()
    {
        $db = K("ContentView");
        //---------------------搜索条件----------------------
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
                    $where[] = "aid=" . intval($searchKeyword);
                    break;
            }
        }
        //文章状态：1 已审核 0未审核
        $where[] = $db->tableFull . ".state=" . Q("state", 1, "intval");
        //搜索栏目
        $cid = Q('cid', null, 'intval');
        if (Q("cid")) {
            $cid = array($cid);
            //获得所有子栏目
            $sCategory = Data::channelList($this->_category, $this->_cid);
            foreach ($sCategory as $cat) {
                $cid[] = $cat['cid'];
            }
            $where[] = $db->tableFull . '.cid IN(' . implode(',', $cid) . ')';
        }
        //组合SQL中WHERE的部分
        $where = implode(" AND ", $where);
        //---------------------搜索条件----------------------
        //总记录数
        $count = $db->join('category')->where($where)->count();
        $page = new Page($count, C("ADMIN_LIST_ROW"));
        $this->page = $page->show();
        $this->data = $db->where($where)->join('category,user,model')->order('arc_sort ASC,aid DESC')->limit($page->limit())->all();
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
            //模型type为1时即标准模型，显示编辑器、关键字等字段
            $this->model = $this->_model[$this->_mid];
            //自定义字段
            import('Field/Model/FieldModel');
            //FieldModel模型使用mid参数
            $_REQUEST['mid'] = $this->_mid;
            $fieldModel = new FieldModel();
            $this->custom_field = $fieldModel->field_view();
            $this->display();
        }
    }


    //修改文章
    public function edit()
    {
        //添加文章神图
        if (IS_POST) {
            if ($this->_db->edit_content()) {
                $this->ajax(array('state' => 1, 'message' => '修改文章成功'));
            }
        } else {
            $aid = Q("aid", null, "intval");
            if ($aid) {
                //文章字段数据
                $field = $this->_db->find($aid);
                //分配栏目
                $this->category = $this->_category[$this->_cid];
                //模型type为1时即标准模型，显示编辑器、关键字等字段
                $this->model = $this->_model[$this->_mid];
                //FLAG属性
                $this->flag = F('flag');
                $field['thumb_img'] = empty($field['thumb']) || !is_file($field['thumb']) ? __ROOT__ . '/hd/static/img/upload-pic.png' : __ROOT__ . '/' . $field['thumb'];
                $this->field = $field;
                //自定义字段处理
                import('Field/Model/FieldModel');
                //FieldModel模型使用mid参数
                $_REQUEST['mid'] = $this->_mid;
                $fieldModel = new FieldModel();
                $this->custom_field = $fieldModel->field_view($field);
                $this->display();
            }
        }
    }

    //删除文章
    public function del()
    {
        $aids = Q("request.aid");
        $cid = Q('cid', null, 'intval');
        if (!empty($aids) && $cid) {
            if (!is_array($aids)) {
                $aids = array($aids);
            }
            foreach ($aids as $aid)
                $this->_db->del_content($cid, $aid);
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









































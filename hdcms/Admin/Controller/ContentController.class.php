<?php

/**
 * 内容管理
 * Class ContentController
 * @author 向军 <houdunwangxj@gmail.com>
 */
class ContentController extends AuthController
{
    private $category, $model, $cid, $mid;
    //权限验证的动作
    private $authAction = array('add', 'edit', 'del', 'show', 'order', 'audit', 'move');

    public function __init()
    {
        $this->category = F('category', false, CACHE_DATA_PATH);
        $this->model = F('model', false, CACHE_DATA_PATH);
        $this->cid = Q('cid', 0, 'intval');
        $this->mid = Q('mid', 0, 'intval');
        //验证模型mid
        if ($this->mid) {
            if (!$this->mid || !isset($this->model[$this->mid])) {
                $this->error('模型不存在');
            }
        }
        //验证栏目cid
        if ($this->cid) {
            if (!isset($this->category[$this->cid])) {
                $this->error('栏目不存在');
            }
        }
        //验证权限
        if (!$this->checkAccess()) {
            $this->error('你没有操作权限');
        }
    }

    //验证操作权限
    public function checkAccess()
    {
        if (in_array(ACTION, $this->authAction)) {
            return true;
        }
        return true;
    }

    //内容栏目选择页
    public function index()
    {
        $this->display();
    }

    //异步获得目录树，内容左侧目录列表
    public function ajaxCategoryZtree()
    {
        $category = array();
        if (!empty($this->category)) {
            foreach ($this->category as $n => $cat) {
                $data = array();
                //过滤掉外部链接栏目
                if ($cat['cattype'] != 3) {
                    //单文章栏目
                    if ($cat['cattype'] == 4) {
                        $link = __WEB__ . "?m=Admin&c=show&a=single&cid={$cat['cid']}&mid={$cat['mid']}";
                        $url = "javascript:hd_open_window(\"$link\")";
                    } else if ($cat['cattype'] == 1) {
                        $url = U('show', array('cid' => $cat['cid'], 'mid' => $cat['mid'], 'content_status' => 1));
                    } else {
                        $url = 'javascript:;';
                    }
                    $data['id'] = $cat['cid'];
                    $data['pid'] = $cat['pid'];
                    $data['url'] = $url;
                    $data['target'] = 'content';
                    $data['open'] = true;
                    $data['name'] = $cat['catname'];
                    $category[] = $data;
                }
            }
        }
        $this->ajax($category);
    }

    //内容列表
    public function show()
    {
        $ContentModel = ContentViewModel::getInstance($this->mid);
        //文章状态
        $content_status = Q('content_status', 1, 'intval');
        $where = array();
        $where[] = "content_status=$content_status";
        //按时间搜索
        $search_begin_time = Q('search_begin_time', 0, 'strtotime');
        if ($search_begin_time) {
            $where[] = "addtime>=$search_begin_time";
        }
        $search_end_time = Q('search_end_time', null, 'strtotime');
        if ($search_end_time) {
            $where[] = "addtime<=$search_end_time";
        }
        //按flag搜索
        if ($flag = Q('flag')) {
            $where[] = "find_in_set('$flag',flag)";
        }
        //按字段类型
        if (!empty($_POST['search_type']) && !empty($_POST['search_keyword'])) {
            $search_keyword = $_POST['search_keyword'];
            switch (strtolower($_POST['search_type'])) {
                case 1 :
                    //标题
                    $where[] = "title LIKE '%$search_keyword%'";
                    break;
                case 2 :
                    //简介
                    $where[] = "description LIKE '%$search_keyword%'";
                    break;
                case 3 :
                    //用户名
                    $where[] = "username ='$search_keyword'";
                    break;
                case 4 :
                    //用户uid
                    $where[] = "user.uid =$search_keyword";
                    break;
            }
        }

        $where[] = "category.cid=" . $this->cid;
        $page = new Page($ContentModel->where($where)->count(), 15);
        $data = $ContentModel->where($where)->limit($page->limit())->order(array("arc_sort" => "ASC", 'addtime' => "DESC"))->all();
        $this->assign('flag', F($this->mid, false, CACHE_FLAG_PATH));
        $this->assign('data', $data);
        $this->assign('page', $page->show());
        $this->display();
    }

    //单文章管理
    public function single()
    {
        $cid = Q('cid', 0, 'intval');
        $ContentModel = ContentModel::getInstance($this->mid);
        $content = $ContentModel->where(array('cid' => $cid))->find();
        if ($content) {
            $_REQUEST['aid'] = $content['aid'];
            $this->edit($_POST);
        } else {
            $this->add();
        }
    }

    //添加文章
    public function add()
    {
        if (IS_POST) {
            $ContentModel = new Content();
            if ($ContentModel->add($_POST)) {
                $this->success('发表成功！');
            } else {
                $this->error($ContentModel->error);
            }
        } else {
            //获取分配字段
            $model = K('ContentForm');
            $this->assign('form', $model->get());
            //分配验证规则
            $this->assign('formValidate', $model->formValidate);
            $this->display();
        }
    }

    //修改文章
    public function edit()
    {
        if (IS_POST) {
            $ContentModel = new Content();
            if ($ContentModel->edit()) {
                $this->success('发表成功！');
            } else {
                $this->error($ContentModel->error);
            }
        } else {
            $aid = Q('aid', 0, 'intval');
            if (!$aid) {
                $this->error('参数错误');
            }
            $ContentModel = ContentModel::getInstance($this->mid);
            $editData = $ContentModel->find($aid);
            //获取分配字段
            $form = K('ContentForm');
            $this->assign('form', $form->get($editData));
            //分配验证规则
            $this->assign('formValidate', $form->formValidate);
            $this->assign('editData', $editData);
            $this->display();
        }
    }

    //删除文章
    public function del()
    {
        if (!$this->ContentAccess->isDel($this->_cid)) {
            $this->error('没有操作权限');
        }
        $aid = Q('aid', 0);
        if ($aid) {
            $ContentModel = new Content($this->mid);
            if ($ContentModel->del($aid)) {
                $this->success('删除成功');
            } else {
                $this->error($ContentModel->error);
            }
        } else {
            $this->error('参数错误');
        }
    }

    //排序
    public function order()
    {
        if (!$this->ContentAccess->isOrder($this->_cid)) {
            $this->error('没有操作权限');
        }
        $arc_order = Q('arc_order');
        if (!empty($arc_order) && is_array($arc_order)) {
            $ContentModel = ContentModel::getInstance($this->mid);
            foreach ($arc_order as $aid => $order) {
                $ContentModel->join(null)->save(array('aid' => $aid, 'arc_sort' => $order));
            }
        }
        $this->success('排序成功');
    }

    //审核文章
    public function audit()
    {
        if (!$this->ContentAccess->isAudit($this->_cid)) {
            $this->error('没有操作权限');
        }
        $content_state = Q('content_state', 0, 'intval');
        $aids = Q('aid');
        if (!empty($aids) && is_array($aids)) {
            $ContentModel = ContentModel::getInstance($this->mid);
            foreach ($aids as $aid) {
                $ContentModel->save(array('aid' => $aid, 'content_state' => $content_state));
            }
        }
        $this->success('操作成功');
    }

    //移动文章
    public function move()
    {
        if (!$this->ContentAccess->isMove($this->_cid)) {
            $this->error('没有操作权限');
        }
        if (IS_POST) {
            $ContentModel = ContentModel::getInstance($this->mid);
            //移动方式  1 从指定ID  2 从指定栏目
            $from_type = Q("post.from_type", NULL, "intval");
            //目标栏目cid
            $to_cid = Q("post.to_cid", NULL, 'intval');
            if ($to_cid) {
                switch ($from_type) {
                    case 1 :
                        //移动aid
                        $aid = Q("post.aid", NULL, "trim");
                        $aid = explode("|", $aid);
                        if ($aid && is_array($aid)) {
                            foreach ($aid as $id) {
                                if (is_numeric($id))
                                    $ContentModel->join(null)->save(array("aid" => $id, "cid" => $to_cid));
                            }
                        }
                        break;
                    case 2 :
                        //来源栏目cid
                        $from_cid = Q("post.from_cid", NULL, 'intval');
                        if ($from_cid) {
                            foreach ($from_cid as $d) {
                                if (is_numeric($d))
                                    $ContentModel->join(null)->where("cid=$d")->save(array("cid" => $to_cid));
                            }
                        }
                        break;
                }
            }
            $this->success('移动成功！');
        } else {
            $category = array();
            foreach ($this->category as $n => $v) {
                //排除非本模型或外部链接类型栏目或单文章栏目
                if ($v['mid'] != $this->mid || $v['cattype'] == 3 || $v['cattype'] == 4) {
                    continue;
                }
                $selected = '';
                if ($this->cid == $v['cid']) {
                    $v['selected'] = "selected";
                }
                //非本栏目模型关闭
                if ($v['cattype'] != 1) {
                    $v['disabled'] = 'disabled';
                }
                $category[$n] = $v;
            }
            $this->category = $category;
            $this->display();
        }
    }

}

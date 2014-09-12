<?php

/**
 * 会员中心内容管理
 * Class ContentController
 * @author 向军 <houdunwangxj@gmail.com>
 */
class ContentController extends AuthController
{
    private $category, $model, $cid, $mid;
    //权限验证的动作
    private $authAction = array('add', 'edit', 'del', 'content');

    public function __init()
    {
        $this->category = S('category');
        $this->model = S('model');
        $this->cid = Q('cid', null, 'intval');
        $this->mid = Q('mid', 0, 'intval');
        //验证模型mid
        if (!$this->mid || !isset($this->model[$this->mid])) {
            $this->error('模型不存在', U('content', array('mid' => 1)));
        }
        //验证栏目cid
        if (!is_null($this->cid)) {
            if (!isset($this->category[$this->cid])) {
                $this->error('请选择栏目');
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
        if ($_SESSION['user']['web_master']) {
            return true;
        } else if (!$_SESSION['user']['admin'] && in_array(ACTION, $this->authAction) && $this->cid) {
            $access = M('category_access')->where(array('admin' => 0, 'cid' => $this->cid))->getField('rid,`add`,`edit`,`del`,`content`');
            //栏目没有设置管理员权限时，验证通过
            return !empty($access) && $access[$_SESSION['user']['rid']][ACTION];
        }
        return true;
    }

    //内容列表
    public function content()
    {
        $ContentModel = ContentViewModel::getInstance($this->mid);
        $where[] = "category.mid=" . $this->mid;
        $where[] = 'user.uid=' . $_SESSION['user']['uid'];
        $page = new Page($ContentModel->where($where)->count(), 10);
        $data = $ContentModel->where($where)->limit($page->limit())->order('arc_sort ASC,addtime DESC')->all();
        $this->assign('data', $data);
        $this->assign('model', $this->model[$this->mid]);
        $this->assign('page', $page->show());
        $this->display();
    }

    //添加文章
    public function add()
    {
        if (IS_POST) {
            $ContentModel = new Content();
            if ($ContentModel->add($_POST)) {
                $this->success('发表成功！', U('content', array('mid' => $this->mid)));
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
        if ($aid = Q('aid', 0)) {
            $ContentModel = new Content();
            if ($ContentModel->del($aid)) {
                $this->success('删除成功');
            } else {
                $this->error($ContentModel->error);
            }
        } else {
            $this->error('参数错误');
        }
    }
}
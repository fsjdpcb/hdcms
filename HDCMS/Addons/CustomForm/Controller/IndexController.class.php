<?php

/**
 * CustomForm 插件
 * @author 后盾向军 <houdunwangxj@gmail.com>
 */
class IndexController extends AddonController
{
    private $db;
    private $gid;//表单组

    public function __init()
    {
        $this->db = K('Data');
        $this->gid = Q('gid', 0, 'intval');
        if (!$this->gid) {
            $this->error('参数错误');
        }
    }

    //会员提交表单
    public function submit()
    {
        if (IS_POST) {
            if ($this->db->addForm()) {
                $this->success('提交成功');
            } else {
                $this->error($this->db->error);
            }
        } else {
            //表单组
            $group = K('FormGroup')->find($this->gid);
            $this->assign('group', $group);
            //表单列表
            $field = K('FormField')->get($this->gid);
            $this->assign('field', $field);
            $this->display(MODULE_PATH . 'Template/' . $this->gid . '.php');
        }
    }
}
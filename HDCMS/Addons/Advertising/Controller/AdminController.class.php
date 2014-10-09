<?php

/**
 * Advertising 广告位插件
 * @author 后盾向军 <houdunwangxj@gmail.com>
 */
class AdminController extends AddonAuthController
{
    private $db;

    public function __init()
    {
        $this->db = M('addon_advertising_postion');
    }

    public function index()
    {
        $this->assign('data', $this->db->all());
        $this->display();
    }
    //修改广告位
    public function edit()
    {
        if (IS_POST) {
            $status = $this->db->save();
            if ($status) {
                $this->success('操作成功', 'index');
            } else {
                $this->error('操作失败');
            }
        } else {
            $posid=Q('posid');
            $this->field = $this->db->find($posid);
            $this->display();
        }
    }
    //添加广告位
    public function add()
    {
        if (IS_POST) {
            $status = $this->db->add();
            if ($status) {
                $this->success('操作成功', 'index');
            } else {
                $this->error('操作失败');
            }
        } else {
            $this->display();
        }
    }
    public function del(){
        $posid=Q('posid');
        M('addon_advertising_ad')->where("posid=$posid")->del();
        if($this->db->del($posid)){
            $this->success('操作成功', 'index');
        } else {
            $this->error('操作失败');
        }
    }
}
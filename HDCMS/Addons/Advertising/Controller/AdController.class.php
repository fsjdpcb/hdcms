<?php

/**
 * 广告管理
 * Class AdController
 * @author 后盾向军 <2300071698@qq.com>
 */
class AdController extends AddonAuthController
{
    private $db;
    private $position;//广告位

    public function __init()
    {
        $this->db = K('Ad');
        $this->position = M('addon_advertising_postion');
    }

    //广告列表
    public function index()
    {
        $this->assign('data', $this->db->all());
        $this->display();
    }

    //修改广告
    public function edit()
    {
        if (IS_POST) {
            $_POST['data'] = $this->formatData($_POST['data']);
            $_POST['start_time'] = strtotime($_POST['start_time']);
            $_POST['end_time'] = strtotime($_POST['end_time']);
            if ($this->db->save()) {
                $this->success('添加成功', 'index');
            } else {
                $this->error('添加失败');
            }
        } else {
            $id = Q('id');
            //分配广告位
            $this->assign('position', $this->position->all());
            //获取原数据
            $field = $this->db->find($id);
            $field['data'] = unserialize($field['data']);
            $this->assign('field', $field);
            $this->display();
        }
    }

    //添加广告
    public function add()
    {
        if (IS_POST) {
            $_POST['data'] = $this->formatData($_POST['data']);
            $_POST['start_time'] = strtotime($_POST['start_time']);
            $_POST['end_time'] = strtotime($_POST['end_time']);
            if ($this->db->add()) {
                $this->success('添加成功', 'index');
            } else {
                $this->error('添加失败');
            }
        } else {
            //分配广告位
            $this->assign('position', $this->position->all());
            $this->display();
        }
    }

    public function del()
    {
        $id = Q('id');
        if ($this->db->del($id)) {
            $this->success('删除成功', 'index');
        } else {
            $this->error('删除失败');
        }
    }

    //格式化图片数据
    private function formatData($data)
    {
        if (empty($data)) return '';
        $ad = array();
        foreach ($data['url'] as $id => $url) {
            $ad[$id]['title'] = $data['title'][$id];
            $ad[$id]['url'] = $data['url'][$id];
            $ad[$id]['image'] = $data['image'][$id];
        }
        return serialize($ad);
    }

    //广告预览
    public function showAd()
    {
        $this->display();
        touch(APP_ADDON_PATH.'Advertising/View/Ad/showAd.php');
    }
}
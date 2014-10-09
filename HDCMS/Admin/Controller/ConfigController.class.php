<?php

/**
 * 后台网站配置管理
 * Class ConfigControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class ConfigController extends AuthController
{
    private $db;

    public function __init()
    {
        $this->db = K('config');
    }

    //删除配置
    public function del()
    {
        if ($this->db->delConfig()) {
            $this->success('操作成功');
        } else {
            $this->error($this->db->error);
        }
    }

    //添加配置项
    public function add()
    {
        if (IS_POST) {
            if ($this->db->addConfig()) {
                $this->success('添加成功!');
            } else {
                $this->error($this->db->error);
            }
        } else {
            $configGroup = $this->db->getConfigGroup();
            $this->assign("configGroup", $configGroup);
            $this->display();
        }
    }

    //添加与编辑配置时检测标题
    public function check_title()
    {
        $title = $_POST['title'];
        if ($id = Q('id')) {
            $map['id'] = array('NEQ', $id);
        }
        $map['title'] = array('EQ', $title);
        echo $this->db->where($map)->find() ? 0 : 1;
        exit;
    }

    //添加与编辑配置时检测变量名
    public function check_name()
    {
        $name = $_POST['name'];
        if ($id = Q('id')) {
            $map['id'] = array('NEQ', $id);
        }
        $map['name'] = array('EQ', $name);
        echo $this->db->where($map)->find() ? 0 : 1;
        exit;
    }

    //修改网站配置(基本配置）
    public function webConfig()
    {
        if (IS_POST) {
            if ($this->db->editWebConfig()) {
                $this->success("修改成功");
            } else {
                $this->error($this->db->error);
            }
        } else {
            //分配配置组
            $data = $this->db->getConfig();
            $this->assign('data', $data);
            $this->display();
        }
    }

    //水印设置
    public function water()
    {
        if (IS_POST) {
            $_POST = array_filter($_POST);
            foreach ($_POST as $name => $value) {
                $this->db->where("name='{$name}'")->save(array('value' => $value));
            }
            //更新缓存
            $this->db->updateCache();
            $this->success('设置成功');
        } else {
            $config = M('config')->where(array('cgid' => array('IN', 5)))->getField('name,value,message,title');
            $this->assign('config', $config);
            $this->display();
        }
    }

    //水印设置
    public function email()
    {
        if (IS_POST) {
            $_POST = array_filter($_POST);
            foreach ($_POST as $name => $value) {
                $this->db->where("name='{$name}'")->save(array('value' => $value));
            }
            //更新缓存
            $this->db->updateCache();
            $this->success('设置成功');
        } else {
            $config = M('config')->where(array('cgid' => array('IN', 4)))->getField('name,value,message,show_type,title');
            $this->assign('config', $config);
            $this->display();
        }
    }

    //验证EMAIL发送
    public function checkEmail()
    {
        $Config = array(
            'EMAIL_USERNAME' => $_POST['EMAIL_USERNAME'],
            'EMAIL_PASSWORD' => $_POST['EMAIL_PASSWORD'],
            'EMAIL_HOST' => $_POST['EMAIL_HOST'],
            'EMAIL_PORT' => $_POST['EMAIL_PORT'],
            'EMAIL_SSL' => false,
            'EMAIL_CHARSET' => 'utf-8',
            'EMAIL_FORMMAIL' => $_POST['EMAIL_USERNAME'],
            'EMAIL_FROMNAME' => $_POST['EMAIL_FROMNAME'],
        );
        C($Config);
        $status = Mail::send("houdunwangxj@gmail.com", "houdunwangxj@gmail.com", "HDCMS系统测试邮件", "使用者网站:" . __HOST__);
        if ($status) {
            $this->success('邮箱配置正确，发送正常!');
        } else {
            $this->error('邮箱配置错误...');
        }
    }

    //更新缓存
    public function updateCache()
    {
        if ($this->db->updateCache()) {
            $this->success('缓存更新成功！');
        } else {
            $this->error($this->db->error);
        }
    }
}
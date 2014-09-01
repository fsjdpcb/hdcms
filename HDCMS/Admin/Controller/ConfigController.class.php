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
        $id = Q('id', 0, 'intval');
        if ($this->db->del($id)) {
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
            $this->display();
        }
    }

    //修改
    public function edit()
    {
        if (IS_POST) {
            if ($this->db->saveConfig()) {
                $this->success("修改成功");
            } else {
                $this->error($this->db->error);
            }
        } else {
            $data = $this->db->where(array('type' => array('NOT IN', array('water', 'template'))))->order('order_list ASC')->all();
            $config = array();
            foreach ($data as $d) {
                $config[$d['name']] = $d;
            }
            foreach ($config as $name => $c) {
                switch ($c['show_type']) {
                    case 'password' :
                        $config[$name]['html'] = "<input type='password' name='{$c['name']}' value='{$c['value']}' class='w250'/>";
                        break;
                    case 'text' :
                        $config[$name]['html'] = "<input type='text' name='{$c['name']}' value='{$c['value']}' class='w250'/>";
                        break;
                    //布尔
                    case 'radio' :
                        $Yes = $No = '';
                        if ($c['value'] == 1) {
                            $Yes = "checked='checked'";
                        } else {
                            $No = "checked='checked'";
                        }
                        $config[$name]['html'] = "<label><input type='radio' name='{$c['name']}' value='1'  $Yes/> 是</label>
                                        <label><input type='radio' name='{$c['name']}' value='0' $No/> 否</label>";
                        break;
                    //多行文本
                    case 'textarea' :
                        $config[$name]['html'] = "<textarea class='w250 h100' name='{$c['name']}'>{$c['value']}</textarea>";
                        break;
                    //会员组
                    case 'group':
                        $group = M('role')->where("admin<>1")->all();
                        $html = "<select name='{$c['name']}'>";
                        foreach ($group as $g) {
                            $selected = C('DEFAULT_GROUP') == $g['rid'] ? 'selected=""' : '';
                            $html .= "<option value='{$g['rid']}' $selected>{$g['rname']}</option>";
                        }
                        $html .= "</selected>";
                        $config[$name]['html'] = $html;
                }
            }
            $this->assign("config", $config);
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
            $config = M('config')->where(array('type' => array('IN', 'water')))->getField('name,value,message,title');
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
            $config = M('config')->where(array('type' => array('IN', 'email')))->getField('name,value,message,show_type,title');
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
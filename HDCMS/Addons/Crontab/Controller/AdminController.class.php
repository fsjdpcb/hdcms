<?php

/**
 * Crontab 插件
 * @author 后盾向军 <houdunwangxj@gmail.com>
 */
class AdminController extends AddonAuthController
{

    private $db;

    public function __init()
    {
        $this->db = M('addon_crontab');
    }

    public function index()
    {
        $this->assign('data', $this->db->all());
        $this->display();
    }

    //删除任务
    public function del()
    {
        $id = Q('id', 0, 'intval');
        if ($this->db->del($id)) {
            $this->success('删除成功', 'index');
        } else {
            $this->error('删除失败');
        }
    }
    //修改任务
    public function edit()
    {
        if (IS_POST) {
            $_POST['username'] = $_SESSION['user']['username'];
            if ($this->db->save()) {
                $this->success('添加成功', 'index');
            } else {
                $this->error('添加失败');
            }
        } else {
            $id=Q('id',0,'intval');
            //执行程序文件
            $class = $this->getRunFile();
            $this->assign('field',$this->db->find($id));
            $this->assign('class', $class);
            $this->display();
        }
    }
    //添加任务
    public function add()
    {
        if (IS_POST) {
            $_POST['username'] = $_SESSION['user']['username'];
            if ($this->db->add()) {
                $this->success('添加成功', 'index');
            } else {
                $this->error('添加失败');
            }
        } else {
            //执行程序文件
            $class = $this->getRunFile();
            $this->assign('class', $class);
            $this->display();
        }
    }

    //执行程序文件
    public function getRunFile()
    {
        $file = glob(APP_ADDON_PATH . 'Crontab/Soft/*.class.php');
        $classData = array();
        if (empty($file)) return array();
        foreach ($file as $f) {
            require_cache($f);
            $class = substr(basename($f), 0, strpos(basename($f), '.class'));
            if (!class_exists($class)) continue;//检测类
            if (!method_exists($class, 'run')) continue;//检测方法
            $vars = get_class_vars($class);//获得类属性
            if (!isset($vars['title'])) continue;//检测属性
            $d['class'] = $class;
            $d['title'] = $vars['title'];
            $classData[] = $d;
        }
        return $classData;
    }
}
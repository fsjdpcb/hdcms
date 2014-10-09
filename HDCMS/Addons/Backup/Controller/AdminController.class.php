<?php

/**
 * 数据库备份模块
 * Class BackupControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class AdminController extends AddonAuthController
{
    //构造函数
    public function __init()
    {
    }

    //备份列表
    public function index()
    {
        $file = Dir::tree(APP_PATH . "backup");
        $dir = array();
        foreach ($file as $f) {
            if (is_dir($f['path'])) {
                $dir[] = $f;
            }
        }
        $this->assign("dir", $dir);
        $this->display();
    }

    //数据备份
    public function backup_db()
    {
        $result = Backup::backup(
            array(
                'size' => Q("size", 2000000, "intval"),
                'dir' => APP_PATH . 'backup/' . date("Ymdhis"),
                'table' => Q('table'),
                'structure' => Q('structure', 0)
            )
        );
        if ($result['status'] == 'success') {
            $this->success($result['message'], U('index', array('app' => 'Addon')));
        } else {
            $this->success($result['message'], $result['url'], 0.2);
        }
    }

    //配置数据备份
    public function backup()
    {
        $this->assign("table", M()->getTableInfo());
        $this->display();
    }

    //还原数据
    public function recovery()
    {
        $dir = APP_PATH . "Backup/" . Q("dir");
        $result = Backup::recovery(array('dir' => $dir));
        if ($result['status'] == 'success') {
            $this->success($result['message'], U('index'));
        } else {
            $this->success($result['message'], $result['url'], 0.2);
        }
    }

    //数据还原成功显示的信息
    public function recoverySuccess()
    {
        O("CacheControl", "all", array("type" => false));
        $this->success("数据还原成功", "index", 1);
    }

    //备份完成
    public function backupSuccess()
    {
        $this->success("备份成功", "index", 1);
    }

    //优化表
    public function optimize()
    {
        if (!empty($_POST['table'])) {
            $table = $_POST['table'];
            M()->optimize($table);
            $this->success('优化表成功');
        }
    }

    //修复表
    public function repair()
    {
        if (!empty($_POST['table'])) {
            $table = $_POST['table'];
            M()->repair($table);
            $this->success('修复表成功');
        }

    }

    //删除备份目录
    public function del()
    {
        $dir = $_POST['dir'];
        foreach ($dir as $d) {
            if (!Dir::del(APP_PATH . 'backup/' . $d)) {
                $this->error('删除失败');
            }
        }
        $this->success('删除成功');
    }

}
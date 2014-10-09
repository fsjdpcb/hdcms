<?php

/**
 * 数据表内容替换模块
 * @author hdxj<houdunwangxj@gmail.com>
 */
class AdminController extends AddonAuthController
{
    //字段内容替换
    public function index()
    {
        if (IS_POST) {
            $WHERE = !empty($_POST['replacewhere']) ? " WHERE {$_POST['replacewhere']}" : '';
            $VALUE = "replace({$_POST['field']},'{$_POST['searchcontent']}','{$_POST['replacecontent']}')";
            $sql = "UPDATE " . $_POST['table'] . " SET {$_POST['field']}=$VALUE $WHERE";
            if (M()->exe($sql)) {
                $this->success('替换成功!');
            } else {
                $this->error('替换失败...');
            }
        } else {
            $tableInfo = M()->getTableInfo();
            $tables = $tableInfo['table'];
            $this->assign("tablesJson", json_encode($tables));
            $this->assign('tables', $tables);
            $this->display();
        }
    }

    //验证码
    public function code()
    {
        $code = new Code(80,25,'','',3,15);
        $code->show();
    }

    //验证码验证
    public function checkCode()
    {
        if (empty($_POST['code'])) {
            echo 0;
            exit;
        } else if (strtoupper($_POST['code']) != $_SESSION['code']) {
            echo 0;
            exit;
        } else {
            echo 1;
            exit;
        }
    }

}

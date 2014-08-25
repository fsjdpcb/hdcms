<?php

/**
 * 模型管理
 * @author 向军 <houdunwangxj@gmail.com>
 */
class ModelModel extends Model
{
    //表名
    public $table = 'model';
    //模型mid
    private $mid;
    //模型缓存
    private $model;

    public function __init()
    {
        $this->mid = Q('mid', 0, 'intval');
        $this->model = S('model');
    }

    /**
     * 添加模型
     */
    public function addModel()
    {
        Q('model_name', '', 'trim');
        Q('table_name', '', 'strtolower,trim');
        $this->validate = array(array('model_name', 'nonull', '模型名称不能为空', 2, 1), array('table_name', 'nonull', '表名不能为空', 2, 1));
        //验证表是否存在
        if ($this->tableExists($_POST['table_name'])) {
            $this->error = '数据表已经存在';
            return false;
        }
        //验证模型名称验证
        if (M('model')->find(array('model_name' => $_POST['model_name']))) {
            $this->error = '模型已经存在';
            return false;
        }
        //创建模型表
        if ($this->create()) {
            $table_name = $this->data['table_name'];
            if ($this->createModelSql($table_name)) {
                //向模型表添加模型信息
                $mid = $this->add();
                if ($mid) {
                    //创建Field表信息(初始模型字段)
                    $db = M();
                    $db_prefix = C("DB_PREFIX");
                    $table = $table_name;
                    require MODULE_PATH . '/Data/ModelSql/FieldInit.php';
                    if ($this->updateCache()) {
                        //更新字段缓存
                        $_REQUEST['mid'] = $mid;
                        $ModelField = new FieldModel();
                        $ModelField->updateCache();
                        //更新文章属性缓存
                        $FlagModel = new FlagModel();
                        $FlagModel->updateCache();
                        return $mid;
                    }
                } else {
                    return false;
                }
            }
        }
    }

    //修改模型
    public function editModel()
    {
        //验证mid
        if (!$this->mid || !isset($this->model[$this->mid])) {
            $this->error = '模型不存在';
            return false;
        }
        Q('model_name', '', 'trim');
        //验证模型名称验证
        if (M('model')->where("model_name='{$_POST['model_name']}' && mid<>{$this->mid}")->find()) {
            $this->error = '模型名已经存在';
            return false;
        }
        $this->validate = array(array('model_name', 'nonull', '模型名称不能为空', 2, 2));
        if ($this->create()) {
            if (!$this->save()) {
                $this->error = '更新模型失败';
            } else {
                if (!$this->updateCache()) {
                    return false;
                } else {
                    return true;
                }
            }
        }
    }

    /**
     * 创建模型表
     */
    public function createModelSql($tableName)
    {
        $zhubiaoSql = file_get_contents(MODULE_PATH . 'Data/ModelSql/zhubiao.sql');
        $fuBiaoSql = file_get_contents(MODULE_PATH . 'Data/ModelSql/zhubiao_data.sql');
        $zhubiaoSql = preg_replace(array('/@pre@/', '/@table@/'), array(C("DB_PREFIX"), $tableName), $zhubiaoSql);
        $Model = M();
        if ($Model->runSql($zhubiaoSql) === false) {
            $this->error = '创建主表失败';
            return false;
        }
        $fuBiaoSql = preg_replace(array('/@pre@/', '/@table@/'), array(C("DB_PREFIX"), $tableName), $fuBiaoSql);
        if ($Model->runSql($fuBiaoSql) === false) {
            $this->error = '创建副表失败';
            return false;
        }
        return true;
    }

    /**
     * 删除模型
     */
    public function delModel()
    {
        if (!$this->mid || !isset($this->model[$this->mid])) {
            $this->error = '模型不存在';
            return false;
        }
        //验证栏目信息
        if (M('category')->find(array('mid' => $this->mid))) {
            $this->error = '请先删除模型栏目';
            return false;
        }
        $table = $this->model[$this->mid]['table_name'];
        $delTable = $this->delTable(array($table, $table . '_data'));
        if ($delTable === true) {
            //删除表记录
            if ($this->del($this->mid)) {
                //删除模型字段信息并更新字段缓存
                $this->table("field")->where("mid={$this->mid}")->del();
                //删除字段缓存文件
                S('field' . $this->mid, null);
                //删除模型flag缓存
                S('field' . $this->mid, null);
                //更新模型缓存
                return $this->updateCache();
            }
        }
    }

    //删除表
    private function delTable(array $tableArr)
    {
        foreach ($tableArr as $table) {
            if ($this->tableExists($table)) {
                if (!$this->dropTable($table)) {
                    $this->error = '删除表失败';
                    return false;
                }
            }
        }
        return true;
    }

    //更新模型缓存
    public function updateCache()
    {
        $model = M('model')->order('mid ASC')->all();
        $cache = array();
        if (!empty($model)) {
            foreach ($model as $m) {
                $cache[$m['mid']] = $m;
            }
        }
        $stat = S('model', $cache, 0);
        if ($stat) {
            return true;
        } else {
            $this->error = '缓存更新失败';
            return false;
        }
    }
}
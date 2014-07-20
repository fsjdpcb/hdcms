<?php

/**
 * 模型字段
 * @author hdxj <houdunwangxj@gmail.com>
 */
class FieldModel extends Model
{
    //表
    public $table = "field";
    //模型mid
    private $mid;
    //字段缓存
    private $field;
    //模型缓存
    private $model;
    //前台投稿不允许隐藏的字段
    static public $NoAllowHide = array('title', 'cid');
    //不允许删除的字段
    static public $NoAllowDelete = array('title', 'cid', 'addtime', 'arc_sort');
    //不允许禁用的字段
    static public $NoAllowForbidden = array('title', 'cid', 'addtime', 'arc_sort');
    //自动验证
    public $validate = array(
        array('field_name', 'nonull', '字段名不能为空', 2, 1), //字段类型
        array('field_type', 'nonull', '字段类型不能为空', 2, 3), //字段类型
        array('set', 'nonull', '字段参数错误', 2, 3), //字段参数
    );
    //自动完成
    public $auto = array(
        array("set", "serialize", "function", 1, 3), //字段参数
        array("table_name", "_table_name", "method", 2, 1), //表名
        array("field_name", "strtolower", "function", 2, 1), //字段名
    );

    //模型表自动完成，获得表名
    public function _table_name($v)
    {
        //表类型  1 主表  2 副表 0 编辑时没有此字段
        $table_type = Q('table_type', 0, 'intval');
        //添加字段处理
        if ($table_type) {
            switch ($table_type) {
                case 1: //主表
                    $table = $this->model[$this->mid]['table_name'];
                    break;
                case 2: //副表
                    $table = $this->model[$this->mid]['table_name'] . '_data';
                    break;
            }
        } else { //修改字段时，因为不能更改表，所以使用原来的表
            $table = $this->field[$_POST['field_name']]['table_name'];
        }
        return $table;
    }

    /**
     * 构造函数
     */
    public function __init()
    {
        $this->mid = Q('mid', 0, 'intval');
        //字段所在表模型信息
        $this->model = F("model", false, CACHE_DATA_PATH);
        //字段缓存
        $this->field = F($this->mid, false, CACHE_FIELD_PATH);
    }

    /**
     * 删除字段
     * @return mixed
     */
    public function delField()
    {
        $fid = Q('fid');
        if (!$fid) {
            $this->error = '参数错误';
            return false;
        }
        //获得字段信息
        $field = M('field')->find($fid);
        //检测字段是否存在
        if ($this->fieldExists($field['field_name'], $field['table_name'])) {
            //删除表字段
            $sql = "ALTER TABLE " . C("DB_PREFIX") . $field['table_name'] . " DROP " . $field['field_name'];
            if (!$this->exe($sql)) {
                $this->error = '删除表字段失败';
                return false;
            }
        }
        //删除字段表记录
        $this->del($fid);
        if ($this->updateCache()) {
            return true;
        }
    }

    //添加自定义字段
    public function addField()
    {
        if ($this->create()) {
            $method = $this->data['field_type'];
            //设置set等字段值
            $this->$method();
            //修改表结构
            if ($this->alterTableField()) {
                if ($this->add()) {
                    $this->updateCache();
                    return true;
                } else {
                    $this->error = '添加字段失败';
                }
            }
        }

    }

    //修改字段
    public function editField()
    {
        if ($this->create()) {
            $method = $this->data['field_type'];
            $this->$method();
            //修改表结构
            $state = $this->save();
            if ($state) {
                $this->updateCache();
                return true;
            } else {
                $this->error = '修改字段失败';
            }
        }
    }

    //修改表字段
    public function alterTableField()
    {
        switch ($this->data['field_type']) {
            case "title" :
                //标题
                $field = $this->data['field_name'] . " char(100) NOT NULL DEFAULT ''";
                break;
            case "flag" :
                $flag = F('flag', false, CACHE_FLAG_PATH);
                //标题
                $field = $this->data['field_name'] . " set('" . implode("','", $flag) . "') DEFAULT NULL";
                break;
            case "tag" :
                //tag
                $field = $this->data['field_name'] . " VARCHAR(255) NOT NULL DEFAULT ''";
                break;
            case "cid" :
                $field = $this->data['field_name'] . " smallint(5) unsigned NOT NULL DEFAULT '0'";
                break;
            case "content" :
                //正文
                $field = '`' . $this->data['field_name'] . '`' . " TEXT";
                break;
            case "template" :
                //选择模板
                $field = '`' . $this->data['field_name'] . '`' . " VARCHAR(255) NOT NULL DEFAULT ''";
                break;
            case "thumb" :
                //缩略图
                $field = '`' . $this->data['field_name'] . '`' . " VARCHAR(255) NOT NULL DEFAULT ''";
                break;
            case "input" :
                $field = $this->data['field_name'] . " VARCHAR(255) NOT NULL DEFAULT ''";
                break;
            case "number" :
                $set = $this->data['set'];
                if ($set['field_type'] == 'decimal') {
                    $e = isset($set['num_decimal']) ? $set['num_decimal'] : 0;
                    $field = $this->data['field_name'] . " DECIMAL({$set['num_integer']},{$e}) NOT NULL DEFAULT 0";
                } else {
                    $field = $this->data['field_name'] . " {$set['field_type']}({$set['num_integer']}) NOT NULL DEFAULT 0";
                }
                break;
            case "textarea" :
                $field = '`' . $this->data['field_name'] . '`' . " TEXT";
                break;
            case "editor" :
                $field = '`' . $this->data['field_name'] . '`' . " TEXT";
                break;
            case "image" :
                $field = '`' . $this->data['field_name'] . '`' . " VARCHAR(255) NOT NULL DEFAULT ''";
                break;
            case "images" :
                $field = '`' . $this->data['field_name'] . '`' . " MEDIUMTEXT";
                break;
            case "files" :
                $field = '`' . $this->data['field_name'] . '`' . " MEDIUMTEXT";
                break;
            case "box" :
                //checkbox radio select
                $field = '`' . $this->data['field_name'] . '`' . " CHAR(80) NOT NULL DEFAULT ''";
                break;
            case "datetime" :
                $field = '`' . $this->data['field_name'] . '`' . " int(10) NOT NULL DEFAULT 0";
                break;
        }
        //修改或添加字段
        $sql = "ALTER TABLE " . C("DB_PREFIX") . $this->data['table_name'] . " ADD " . $field;
        if (M()->exe($sql)) {
            return true;
        } else {
            $this->error = '修改表结构失败';
            return false;
        }
    }

    //更新字段缓存
    public function updateCache()
    {
        //查找当模型所有字段信息
        $ModelField = M("field");
        $fieldData = $ModelField->where("mid={$this->mid}")->order('fieldsort ASC')->all();
        $cacheData = array();
        if (!empty($fieldData)) {
            foreach ($fieldData as $field) {
                $field['set'] = unserialize($field['set']);
                $cacheData[$field['field_name']] = $field;
            }
        }
        if (!F($this->mid, $cacheData, CACHE_FIELD_PATH)) {
            $this->error = '更新字段缓存失败';
            return false;
        } else {
            $this->updateTableFieldCache();
            return true;
        }
    }

    //更新Content表字段结构缓存
    public function updateTableFieldCache()
    {
        $cache = array(APP_TABLE_PATH . C('DB_DATABASE') . '.' . $this->tableFull, APP_TABLE_PATH . C('DB_DATABASE') . '.' . $this->tableFull . '_data');
        foreach ($cache as $c) {
            if (is_file($c) && is_writeable(dirname($c)))
                @unlink($c);
        }
        return true;
    }

    //标题字段
    private function title()
    {
    }

    //缩略图
    private function thumb()
    {
    }

    //模板
    private function template()
    {
    }

    //栏目选择
    private function cid()
    {
    }

    //文章内容
    private function content()
    {
    }

    //Flag文章属性
    private function flag()
    {
    }

    //文本字段
    private function input()
    {
    }

    //多行文本
    private function textarea()
    {
    }

    //数字
    private function number()
    {
    }

    //选项
    private function box()
    {
        $options = String::toSemiangle($this->data['set']['options']);
        $this->data['set']['options'] = str_replace(' ', '', $options);
    }

    //编辑器
    private function editor()
    {
    }

    //单图上传
    private function image()
    {
    }

    //多图上传
    private function images()
    {
    }

    //日期时间
    private function datetime()
    {
    }

    //文件上传
    private function files()
    {
    }

}
<?php

/**
 * 属性flag
 * Class FlagModel
 * @author hdxj
 */
class FlagModel extends Model
{
    public $table = "content";
    //缓存
    public $_flag;
    public $validate = array(
        array('value', 'nonull', '标签值不能为空', 1, 3),
    );

    //构造函数
    public function __init()
    {
        $this->_flag = F('flag');
    }

    //删除属性
    public function del_flag()
    {
        //大于7的属性可以删除（用户定义）
        if (isset($_POST['number']) && intval($_POST['number']) > 6) {
            unset($this->_flag[$_POST['number']]);
            return $this->alter_table();
        }
    }

    /**
     * 修改属性
     */
    public function edit_flag()
    {
        if (!empty($_POST['flag'])) {
            $this->_flag = $_POST['flag'];
            return $this->alter_table();
        }
    }

    /**
     * 添加属性
     */
    public function add_flag()
    {
        if ($this->create()) {
            $this->_flag[] = $_POST['value'];
            return $this->alter_table();
        }
    }

    /**
     * 修改表结构
     */
    private function alter_table()
    {
        $sql = "ALTER TABLE " . C('DB_PREFIX') . "content MODIFY flag set('" . implode("','", $this->_flag) . "')";
        if ($this->exe($sql)) {
            return $this->update_cache();
        }
    }

    /**
     * 更新缓存
     */
    public function update_cache()
    {
        $result = M()->query('DESC '.C('DB_PREFIX').'content');
        foreach ($result as $field) {
            if ($field['Field'] == 'flag') {
                $tmp = substr($field['Type'], 4, -2);
                $flag = explode(',', str_replace("'", '', $tmp));
                break;
            }
        }
        return F("flag", $flag);
    }

    public function __after_delete($data)
    {
        $this->update_cache();
    }
}

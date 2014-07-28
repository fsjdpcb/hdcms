<?php

/**
 * 属性flag
 * Class FlagModel
 * @author hdxj
 */
class FlagModel extends Model
{
    public $table;
    private $mid;
    private $contentTable;
    //缓存
    public $flag;

    //构造函数
    public function __init()
    {
        $this->mid = Q('mid', 0, 'intval');
        $model = F('model', false, CACHE_DATA_PATH);
        if (!isset($model[$this->mid])) {
            $this->error = '模型不存在';
            return false;
        }
        $this->flag = F($this->mid, false, CACHE_FLAG_PATH);
        $this->contentTable = $model[$this->mid]['table_name'];
    }

    //删除属性
    public function delFlag($index)
    {
        $flag = $this->flag;
        unset($flag[$index]);
        $sql = "ALTER TABLE " . C('DB_PREFIX') . $this->contentTable . " MODIFY flag set('" . implode("','", $flag) . "')";
        if (!$this->exe($sql)) {
            $this->error = '修改表失败';
            return false;
        }
        return $this->updateCache();
    }

    /**
     * 修改属性
     */
    public function editFlag($mid, $data)
    {
        if (!empty($data)) {
            $sql = "ALTER TABLE " . C('DB_PREFIX') . $this->contentTable." MODIFY flag set('" . implode("','", $data) . "')";
            if (!$this->exe($sql)) {
                $this->error = '修改表失败';
                return false;
            }
        }
       return $this->updateCache($mid);
    }

    /**
     * 添加属性
     */
    public function addFlag($flag)
    {
        $this->flag[] = $flag;
        $sql = "ALTER TABLE " . C('DB_PREFIX') . $this->contentTable . " MODIFY flag set('" . implode("','", $this->flag) . "')";
        if (!$this->exe($sql)) {
            $this->error = '修改表失败';
            return false;
        }
        $this->updateCache();
        return true;
    }

    /**
     * 更新缓存
     */
    public function updateCache()
    {
        $result = M()->query('DESC ' . C('DB_PREFIX') . $this->contentTable);
        $flag = array();
        foreach ($result as $field) {
            if ($field['Field'] == 'flag') {
                $tmp = substr($field['Type'], 4, -2);
                $flag = explode(',', str_replace("'", '', $tmp));
                break;
            }
        }
        return F($this->mid, $flag, CACHE_FLAG_PATH);
    }

}

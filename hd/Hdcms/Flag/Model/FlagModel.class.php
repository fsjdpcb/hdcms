<?php

/**
 * 属性flag
 * Class FlagModel
 * @author hdxj
 */
class FlagModel extends CommonModel
{
    public $table = "flag";

    //删除属性
    public function del_flag()
    {
        $fid = Q("fid", null, "intval");
        if ($fid) {
            //删除内容属性表中数据
            if ($this->table("content_flag")->where("fid=$fid")->del()) {
                return $this->del($fid);
            }
        }
    }

    /**
     * 修改属性
     */
    public function edit_flag()
    {
        if (!empty($_POST['flag'])) {
            foreach ($_POST['flag'] as $fid => $data) {
                $data['fid'] = $fid;
                $this->trigger()->save($data);
            }
            $this->update_cache();
            return true;
        }
    }

    /**
     * 添加属性
     */
    public function add_flag()
    {
        if ($this->create()) {
            return $this->add();
        }
    }

    /**
     * 更新缓存
     */
    public function update_cache()
    {
        $flag = $this->getField('fid,flagname,system', true);
        return F('flag', $flag);
    }

    public function __after_update($data)
    {
        $this->update_cache();
    }

    public function __after_insert($data)
    {
        $this->update_cache();
    }
    public function __after_delete($data)
    {
        $this->update_cache();
    }
}

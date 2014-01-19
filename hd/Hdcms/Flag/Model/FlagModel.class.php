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
                $this->save($data);
            }
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

}

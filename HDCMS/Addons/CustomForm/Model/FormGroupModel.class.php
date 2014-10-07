<?php

/**
 * 自定义字段组管理
 * Class AddonFormGroupModel
 * @author 后盾向军 <2300071698@qq.com>
 */
class FormGroupModel extends Model
{
    //操作表
    public $table = 'addon_custom_form_group';

    //构造函数
    public function __init()
    {
    }

    //添加表单组
    public function addFormGroup()
    {
        if ($gid = $this->add()) {
            //复制模板
            copy(MODULE_VIEW_PATH . 'Data/default.php', MODULE_PATH . 'Template/' . $gid . '.php');
            return true;
        }
    }

    //修改表单组
    public function editFormGroup()
    {
        if ($this->save()) {
            return true;
        }
    }

    //删除表单组
    public function delFormGroup()
    {
        $gid = Q('gid');
        if ($this->del($gid)) {
            //删除表单字段数据
            $map['gid'] = array('EQ', $gid);
            $this->table('addon_custom_form_field')->where($map)->del();
            //删除用记提交的表单数据
            $this->table('addon_custom_form_data')->where($map)->del();
            //删除模板文件
            @unlink(MODULE_PATH . 'Template/' . $gid . '.php');
            return true;
        }
    }
}
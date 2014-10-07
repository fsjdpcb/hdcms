<?php

/**
 * 字段管理
 * Class AddonFormGroupModel
 * @author 后盾向军 <2300071698@qq.com>
 */
class FormFieldModel extends ViewModel
{
    //操作表
    public $table = 'addon_custom_form_field';

    //构造函数
    public function __init()
    {
    }

    public $view = array(
        'addon_custom_form_field' => array('_type' => 'INNER'),
        'addon_custom_form_group' => array('_on' => 'addon_custom_form_field.gid=addon_custom_form_group.gid')
    );

    //添加表单组
    public function addField()
    {
        if ($gid = $this->add()) {
            return true;
        }
    }

    //修改表单组
    public function editField()
    {
        if ($this->save()) {
            return true;
        }
    }

    //删除表单组
    public function delField()
    {
        $gid = Q('fid');
        if ($this->del($gid)) {
            return true;
        }
    }

    //获取表单字段，用于会员提交
    public function get($gid, $data = null)
    {
        $map['gid'] = array('EQ', $gid);
        $formField = $this->relation('addon_custom_form_field')->where($map)->all();
        foreach ($formField as $id => $field) {
            $func = '_' . $field['show_type'];
            $formField[$id]['_html'] = $this->$func($field, $data);
        }
        return $formField;
    }

    private function _text($field, $data)
    {
        $value = $data ? $data[$field['name']] : $field['value'];
        return "<input type='text' name='{$field['name']}' value='{$value}' class='w300'/>";
    }

    private function _radio($field, $data)
    {
        $value = $data ? $data[$field['name']] : $field['value'];
        $info = explode(',', $field['info']);
        $html = '';
        foreach ($info as $radio) {
            $data = explode('|', $radio);//[0]值如1  [1]描述如开启
            $checked = $data[0] == $value ? ' checked="checked" ' : '';
            $html .= "<label><input type='radio' name='{$field['name']}' value='{$value}' $checked/> {$data[1]}</label> ";
        }
        return $html;
    }

    private function _textarea($field, $data)
    {
        $value = $data ? $data[$field['name']] : $field['value'];
        return "<textarea class='w300 h100' name='{$field['name']}'>{$value}</textarea>";
    }

    //列表选项
    private function _select($field, $data)
    {
        $value = $data ? $data[$field['name']] : $field['value'];
        $info = explode(',', $field['info']);
        $html = "<select name='{$field['name']}' class='w300'>";
        foreach ($info as $radio) {
            $data = explode('|', $radio);//[0]值如1  [1]描述如开启
            $selected = $data[0] == $value ? ' selected="selected" ' : '';
            $html .= "<option value='{$data[0]}' $selected> {$data[1]}</option> ";
        }
        $html .= "</select>";
        return $html;
    }
}
















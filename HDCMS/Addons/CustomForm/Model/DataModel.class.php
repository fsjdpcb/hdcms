<?php

/**
 * 会员表单数据管理
 * Class DataModel
 * @author 后盾向军 <2300071698@qq.com>
 */
class DataModel extends ViewModel
{
    //操作表
    public $table = 'addon_custom_form_data';

    //构造函数
    public function __init()
    {
    }

    public $view = array(
        'addon_custom_form_data' => array('_type' => 'INNER'),
        'addon_custom_form_group' => array('_on' => 'addon_custom_form_data.gid=addon_custom_form_group.gid', '_type' => 'LEFT'),
        'user' => array('_on' => 'addon_custom_form_data.uid=user.uid'),
    );

    //添加表单组
    public function addForm()
    {
        $data['data'] = serialize($_POST);
        $data['addtime'] = time();
        $data['gid'] = Q('gid', 0, 'intval');
        $data['uid'] = $_SESSION['user']['uid'];
        if ($gid = $this->add($data)) {
            return true;
        } else {
            $this->error = '提交失败，请稍候重试';
        }
    }

    //后台显示会员提交表单列表
    public function getForm()
    {
        $gid = Q('gid', 0, 'intval');
        $status=Q('status',0,'intval');
        $page = new Page(10);
        $map='';
        if($gid){
            $map['_string']="addon_custom_form_data.gid=$gid";
        }
        if($status){
            $map['status']=array('EQ',$status);
        }
        $data = $this->where($map)->limit($page->limit())->order('addtime DESC')->all();
        return array('data' => $data, 'page' => $page->show());
    }

    //获得一条表单数据
    public function get()
    {
        //表单id
        $id = Q('id', 0, 'intval');
        $data = $this->find($id);
        $data['data'] = unserialize($data['data']);
        $map['gid'] = array('EQ', $data['gid']);
        $formField = M('addon_custom_form_field')->where($map)->all();
        foreach ($formField as $id => $field) {
            $func = '_' . $field['show_type'];
            $formField[$id]['_html'] = $this->$func($field, $data['data']);
        }
        return $formField;
    }

    private function _text($field, $data)
    {
        return $data && isset($data[$field['name']]) ? $data[$field['name']] : $field['value'];
    }

    private function _email($field, $data)
    {
        return $data && isset($data[$field['name']]) ? $data[$field['name']] : $field['value'];
    }

    private function _radio($field, $data)
    {
        $value = $data && isset($data[$field['name']]) ? $data[$field['name']] : $field['value'];
        $info = explode(',', $field['info']);
        $html = '';
        foreach ($info as $radio) {
            $data = explode('|', $radio);//[0]值如1  [1]描述如开启
            if ($data[0] == $value) {
                $html = $data[1];
            }
        }
        return $html;
    }

    private function _textarea($field, $data)
    {
        return $data && isset($data[$field['name']]) ? $data[$field['name']] : $field['value'];
    }

    //列表选项
    private function _select($field, $data)
    {
        $value = $data && isset($data[$field['name']]) ? $data[$field['name']] : $field['value'];
        $info = explode(',', $field['info']);
        $html = "";
        foreach ($info as $radio) {
            $data = explode('|', $radio);//[0]值如1  [1]描述如开启
            $selected = $data[0] == $value ? ' selected="selected" ' : '';
            if ($data[0] == $value) {
                $html = $data[1];
            }
        }
        return $html;
    }
}
















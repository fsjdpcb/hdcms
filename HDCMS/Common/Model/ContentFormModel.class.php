<?php

/**
 * 添加、删除文章时表单显示处理
 * @author hdxj <houdunwangxj@gmail.com>
 */
class ContentFormModel extends Model
{
    //表
    public $table = "field";
    //模型mid
    private $mid;
    //栏目cid
    private $cid;
    //文章aid
    private $aid;
    //字段缓存
    private $field;
    //模型缓存
    private $model;
    //表单验证
    public $formValidate = array();
    //编辑时的字段数据
    private $editData;

    //构造函数
    public function __init()
    {
        $this->mid = Q("mid", 0, "intval");
        $this->cid = Q("cid", 0, "intval");
        $this->aid = Q("aid", 0, "intval");
        //字段所在表模型信息
        $this->model = S("model");
        //字段缓存
        $this->field = S('field' . $this->mid);
    }

    /**
     * 编辑与修改动作时根据不同字段类型获取界面
     * @param array $data 编辑数据时的数据
     * @return string
     */
    public function get($data = array())
    {
        //编辑时的字段数据
        $this->editData = $data;
        //所有字段信息
        $form = array();
        foreach ($this->field as $field) {
            //禁用字段不处理
            if ($field['status'] == 0) {
                continue;
            }
            //前台投稿字段过滤
            if ($field['isadd'] == 0 && MODULE == 'Member') {
                continue;
            }
            //表单值  添加时使用set['default'] 编辑时使用data数据
            $value = isset($this->editData[$field['field_name']]) ? $this->editData[$field['field_name']] : (isset($field['set']['default']) ? $field['set']['default'] : '');
            //处理函数
            $function = $field['field_type'];
            //是否为基本字段，基本字段在左侧显示
            $isbase = intval($field['isbase']) ? 'base' : 'nobase';
            $field['form'] = $this->$function($field, $value);
            //设置验证规则
            $this->setValidateRule($field, $value);
            //验证规则
            if (MODULE == 'Member') {
                $form[] = $field;
            } else {
                $form[$isbase][] = $field;
            }
        }
        //编辑验证规则为合法的JS格式
        $this->validateCompileJs();
        return $form;
    }

    //编辑验证规则为合法的JS格式
    protected function validateCompileJs()
    {
        $va = array();
        foreach ($this->formValidate as $field => $value) {
            $rule = $error = array();
            foreach ($value['rule'] as $r => $func) {
                $rule[] = $r . ':' . $func;
            }
            foreach ($value['error'] as $e => $msg) {
                $error[] = $e . ":'$msg'";
            }
            $message = empty($value['message']) ? '' : $value['message'];
            $va[] = $field . ':{rule:{' . implode(',', $rule) . '},error:{' . implode(',', $error) . '},message:"' . $message . '"}';
        }
        $this->formValidate = '{' . implode(',', $va) . '}';
    }

    /**
     * 设置验证规则
     * @param $field 字段信息
     * @param $value 字段值
     */
    protected function setValidateRule($field, $value)
    {
        //设置验证规则
        $validate = array('rule' => array(), 'error' => array(), 'message' => '');
        //必须输入项
        if ((int)$field['required']) {
            $validate['rule']['required'] = 1;
            $validate['error']['required'] = $field['title'] . '不能为空';
        }
        //有验证规则
        if (!empty($field['validate'])) {
            $validate['rule']['regexp'] = '/' . str_replace('/', '\/', (substr($field['validate'], 1, -1))) . '/';
            $validate['error']['regexp'] = empty($field['error']) ? '输入错误' : $field['error'];
        }
        //最小长度
        if (!empty($field['minlength'])) {
            $validate['rule']['minlen'] = (int)$field['minlength'];
            $validate['error']['minlen'] = '不能少于' . (int)$field['minlength'] . '个字';
        }
        //最大长度
        if (!empty($field['maxlength'])) {
            $validate['rule']['maxlen'] = (int)$field['maxlength'];
            $validate['error']['maxlen'] = '不能超过' . (int)$field['maxlength'] . '个字';
        }
        //字段提示
        if (!empty($field['tips'])) {
            $validate['message'] = $field['tips'];
        }
        $this->formValidate[$field['field_name']] = $validate;
    }

    //Input字段
    private function input($field, $value)
    {
        $set = $field['set'];
        //表单类型
        $type = $set['ispasswd'] == 1 ? "password" : "text";
        return "<input style=\"width:{$set['size']}px\" type=\"{$type}\" class=\"{$field['css']}\" name=\"{$field['field_name']}\" value=\"$value\"/>";
    }

    //tag字段
    private function tag($field, $value)
    {
        //编辑文章时获取TAG
        if($this->aid){
            $map['mid']=$this->mid;
            $map['aid']=$this->aid;
            $tag = K('ContentTag')->where($map)->group('tag.tid')->getField('tag', true);
            $value= $tag?implode(',',$tag):'';
        }
        $set = $field['set'];
        //表单类型
        return "<input style=\"width:{$set['size']}px\" type=\"text\" class=\"{$field['css']}\" name=\"{$field['field_name']}\" value=\"$value\"/>";
    }

    //Input字段
    private function number($field, $value)
    {
        $set = $field['set'];
        //表单类型
        return "<input style=\"width:{$set['size']}px\" type=\"text\" class=\"{$field['css']}\" name=\"{$field['field_name']}\" value=\"$value\"/>";
    }

    //Title标题字段
    private function title($field, $value)
    {
        $set = $field['set'];
        if (MODULE != 'Member') {
            $color = isset($this->editData['color']) ? $this->editData['color'] : '';
            if (isset($this->editData['new_window']) && $this->editData['new_window'] == 1) {
                $new_window = 'checked=""';
            } else {
                $new_window = '';
            }
            return '<input id="title" type="text" name="' . $field['field_name'] . '" style="width:' . $set['size'] . 'px" class="title ' . $field['css'] . '" value="' . $value . '">
                        <label class="checkbox inline">
                            	标题颜色 <input type="text" name="color" class="w60" value="' . $color . '">
                        </label>
                        <button type="button" onclick="selectColor(this,\'color\')" class="hd-cancel">选取颜色</button>
                        <label class="checkbox inline">
                            <input type="checkbox" name="new_window" value="1" ' . $new_window . '> 新窗口打开
                        </label>
                        <span id="hd_' . $field['field_name'] . '"></span>';
        } else {
            return "<input type='text' name='{$field['field_name']}' value='$value' class='w300'/>";
        }
    }

    //文章Flag属性如推荐、置顶等
    private function flag($field, $value)
    {
        $flag = S('flag' . $this->mid);
        $set = $field['set'];
        if (!empty($value)) {
            $value = explode(',', $value);
        }
        $form = '';
        foreach ($flag as $N => $f) {
            $checked = "";
            if (!empty($value)) {
                if (in_array($f, $value)) {
                    $checked = 'checked=""';
                }
            }
            $form .= '<label class="checkbox inline">
					<input type="checkbox" name="flag[]" value="' . $f . '" ' . $checked . '> 
                                	' . $f . '[' . ($N + 1) . ']</label>';
        }
        return $form;
    }

    //栏目cid
    private function cid($field, $value)
    {
        //栏目权限模型
        $categoryAccessModel = K('CategoryAccess');
        $categoryData = M('category')->all();
        $category = Data::tree($categoryData, 'catname');
        $html = "<select name='cid'>";
        $html .= "<option value='0'>==选择栏目==</option>";
        foreach ($category as $cat) {
            //外部链接关闭投稿
            if (in_array($cat['cattype'], array(3))) continue;
            //会员关闭单文章投稿
            if (MODULE == 'Member' && $cat['cattype'] == 4) continue;
            //非本模型栏目不显示
            if ($this->mid != $cat['mid']) continue;
            //单文章与普通栏目需要验证权限
            $action = isset($_GET['aid']) ? 'edit' : 'add';
            if (!$categoryAccessModel->checkAccess($cat['cid'], $_SESSION['user']['rid'], $action)) {
                continue;
            }
            //除单文章与普通栏目外不可以发表
            $disabled = in_array($cat['cattype'], array(1, 4)) ? '' : ' disabled="" ';
            //当前栏目默认选中
            $selected = $this->cid == $cat['cid'] ? 'selected=""' : '';
            $html .= "<option value='{$cat['cid']}' $disabled $selected>{$cat['_name']}</option>";
        }
        $html .= "</select>";
        return $html;
    }

    //栏目文本域
    private function textarea($field, $value)
    {
        $set = $field['set'];
        return "<textarea class=\"{$field['css']}\" name=\"{$field['field_name']}\" style=\"width:{$set['width']}px;height:{$set['height']}px\">{$value}</textarea>";
    }

    //模板选择
    private function template($field, $value)
    {
        $set = $field['set'];
        return '<input style="width:300px;" type="text" id="' . $field['field_name'] . '" name="' . $field['field_name'] . '" value="' . $value . '" onfocus="select_template(\'' . $field['field_name'] . '\');">
                        <button class="hd-cancel-small" type="button" onclick="select_template(\'' . $field['field_name'] . '\');">选择模板</button>';
    }

    //文章正文
    private function content($field, $value)
    {
        if (MODULE != 'Member') {
            //自动截取内容为摘要
            $AUTO_DESC = C('AUTO_DESC') ? 'checked=""' : '';
            $DOWN_REMOTE_PIC = C('DOWN_REMOTE_PIC') ? 'checked=""' : '';
            $AUTO_THUMB = C('AUTO_THUMB') ? 'checked=""' : '';
            $html = tag('ueditor', array("name" => $field['field_name'], "content" => $value, "height" => 300));
            $html .= '
			<div class="editor_set control-group">
                <label class="checkbox inline">
                    <input type="checkbox" name="down_remote_pic" value="1" ' . $DOWN_REMOTE_PIC . '/>下载远程图片
                </label>
                <label class="checkbox inline">
                    <input type="checkbox" name="auto_desc" value="1" ' . $AUTO_DESC . '/>截取内容
                </label>
                <label class="checkbox inline">
                    <input type="text" value="200" class="w80" name="auto_desc_length"> 字符至内容摘要
                </label>&nbsp;&nbsp;&nbsp;
                <label class="checkbox inline">
                    <input type="checkbox" name="auto_thumb" value="1" ' . $AUTO_THUMB . '/>获取内容第
                </label>
                <label class="checkbox inline">
                    <input type="text" class="w80" value="1" name="auto_thumb_num">张图片作为缩略图
                </label>
            </div>';
        } else {
            $html = tag('ueditor', array("name" => $field['field_name'], "content" => $value, "height" => 300));
        }
        return $html;
    }

    //编辑器
    private function editor($field, $value)
    {
        return tag('ueditor', array("name" => $field['field_name'], "content" => $value, "style" => $field['set']['style'], "height" => $field['set']['height']));
    }

    //选项radio,select,checkbox
    private function box($field, $value)
    {
        $set = $field['set'];
        //表单值
        $_v = explode(",", $set['options']);
        $options = array();
        foreach ($_v as $p) {
            $p = explode("|", $p);
            $options[$p[0]] = $p[1];
        }
        $h = '';
        //select添加select
        if ($set['form_type'] == 'select') {
            $h .= "<select name='{$field['field_name']}'>";
        }
        foreach ($options as $v => $text) {
            switch ($set['form_type']) {
                case "radio" :
                    $checked = $value == $v ? 'checked=""' : '';
                    $h .= "<label><input type='radio' name=\"{$field['field_name']}\" value=\"{$v}\" {$checked}/> {$text}</label>&nbsp;&nbsp;";
                    break;
                case "checkbox" :
                    $s = explode(",", $value);
                    $checked = in_array($v, $s) ? 'checked=""' : '';
                    $h .= "<label><input type='checkbox' name=\"{$field['field_name']}[]\" value=\"{$v}\" {$checked}/> {$text}</label> ";
                    break;
                case "select" :
                    $selected = $value == $v ? 'selected=""' : "";
                    $h .= "<option name=\"{$field['field_name']}\" value=\"{$v}\" {$selected}> {$text}</option>";
                    break;
            }
        }
        if ($set['form_type'] == 'select') {
            $h .= "</select>";
        }
        return $h;
    }

    //日期Date
    private function datetime($field, $value)
    {
        $set = $field['set'];
        $format = array("Y-m-d", "Y/m/d H:i:s", "H:i:s");
        $value = empty($value) ? date($format[$set['format']]) : date($format[$set['format']], $value);
        //默认值
        $h = "<input type='text' id='{$field['field_name']}' name='{$field['field_name']}' value='$value' class='w150'/>";
        $format = array("yyyy-MM-dd", "yyyy/MM/dd HH:mm:ss", "HH:mm:ss");
        $h .= "<script>$('#{$field['field_name']}').calendar({format: '" . $format[$set['format']] . "'});</script>";
        return $h;
    }

    //缩略图
    private function thumb($field, $value)
    {
        if (MODULE != 'Member') {
            $src = empty($value) ? __APP__ . '/Static/image/upload_pic.png' : __ROOT__ . '/' . $value;
            $fieldName = $field['field_name'];
            return '  <img id="' . $fieldName . '" src="' . $src . '" style="cursor: pointer;width:145px;height:123px;margin-bottom:5px;" onclick="file_upload({id:\'' . $fieldName . '\',type:\'thumb\',num:1,name:\'' . $fieldName . '\'})">
                        <input type="hidden" name="' . $fieldName . '" value="' . $value . '"/>
                        <button type="button" class="hd-cancel-small" onclick="file_upload({id:\'' . $fieldName . '\',type:\'thumb\',num:1,name:\'' . $fieldName . '\'})">上传图片</button>
                        &nbsp;&nbsp;
                        <button type="button" class="hd-cancel-small" onclick="remove_thumb(this)">取消上传</button>';
        } else {
            $id = "img_" . $field['field_name'];
            $path = isset($value) ? $value : "";
            $src = !empty($value) ? __ROOT__ . '/' . $value : "";
            $options = json_encode(array('id' => $id, 'type' => 'image', 'num' => 1, 'name' => $field['field_name'], 'allow_size' => '2MB'));
            $h = "<input id='$id' type='text' name='" . $field['field_name'] . "'  value='$path' src='$src' class='w300 images' onmouseover='view_image(this)' readonly=''/> ";
            $h .= "<button class='hd-cancel-small' onclick='file_upload($options)' type='button'>上传图片</button>&nbsp;&nbsp;";
            $h .= "<button class='hd-cancel-small' onclick='remove_upload_one_img(this)' type='button'>移除</button>";
            $h .= " <span id='hd_{$field['field_name']}' class='{$field['field_name']} validate-message'>" . $field['tips'] . "</span>";
            return $h;
        }
    }

    //单张图
    private function image($field, $value)
    {
        $id = "img_" . $field['field_name'];
        $path = isset($value) ? $value : "";
        $src = !empty($value) ? __ROOT__ . '/' . $value : "";
        $options = json_encode(array('id' => $id, 'type' => 'image', 'num' => 1, 'name' => $field['field_name'], 'allow_size' => $field['set']['allow_size']));
        $h = "<input id='$id' type='text' name='" . $field['field_name'] . "'  value='$path' src='$src' class='w300 images' onmouseover='view_image(this)' readonly=''/> ";
        $h .= "<button class='hd-cancel-small' onclick='file_upload($options)' type='button'>上传图片</button>&nbsp;&nbsp;";
        $h .= "<button class='hd-cancel-small' onclick='remove_upload_one_img(this)' type='button'>移除</button>";
        $h .= " <span id='hd_{$field['field_name']}' class='{$field['field_name']} validate-message'>" . $field['tips'] . "</span>";
        return $h;
    }

    //多图上传
    private function images($field, $value)
    {
        $set = $field['set'];
        $id = "img_" . $field['field_name'];
        //允许上传数量
        $num = $set['num'];
        //已经上传图片
        if (!empty($value)) {
            $img = unserialize($value);
            $num = $num - count($img);
        }
        $h = "<fieldset class='img_list'>
<legend style='color:#666;font-size: 12px;line-height: 25px;padding: 0px 10px; text-align:center;margin: 0px;'>图片列表</legend>
<center>
<div style='color:#666;font-size:12px;margin-bottom: 5px;'>
您最多可以同时上传
<span style='color:red' id='hd_up_{$id}'>$num</span>
张图片
</div>
</center>
<div id='$id' class='picList'>";
        if (!empty($value)) {
            $imgData = unserialize($value);
            if (!empty($img) && is_array($img)) {
                $h .= '<ul>';
                foreach ($imgData as $img) {
                    $h .= "<li><div class='img'><img src='" . __ROOT__ . "/" . $img['path'] . "' style='width:135px;height:135px;'/>";
                    $h .= "<a href='javascript:;' onclick='remove_upload(this,\"{$id}\")'>X</a>";
                    $h .= "</div>";
                    $h .= "<input type='hidden' name='" . $field['field_name'] . "[path][]'  value='" . $img['path'] . "' src='" . __ROOT__ . '/' .  $img['path'] . "' class='w400 images'/> ";
                    $h .= "<input type='text' name='" . $field['field_name'] . "[alt][]' value='" . $img['alt'] . "' placeholder='图片描述...'/>";
                    $h .= "</li>";
                }
                $h .= '</ul>';
            }
        }
        $options = json_encode(array('id' => $id, 'type' => 'images', 'num' => $num, 'name' => $field['field_name'], 'allow_size' => $field['set']['allow_size']));
        $h .= "</div>
</fieldset>
<button class='hd-cancel-small' onclick='file_upload({$options})' type='button'>上传图片</button>";
        $h .= " <span class='{$field['field_name']} validate-message'>" . $field['tips'] . "</span>";
        return $h;
    }

    //多文件上传
    private function files($field, $value)
    {
        $set = $field['set'];
        $id = $field['field_name'];
        //允许上传数量
        $num = $set['num'];
        //已经上传图片
        if (!empty($value)) {
            $img = unserialize($value);
            $num = $num - count($img);
        }
        $h = "<fieldset class='img_list'>
<legend style='color:#666;font-size: 12px;line-height: 25px;padding: 0px 10px; text-align:center;margin: 0px;'>文件列表</legend>
<center>
<div style='color:#666;font-size:12px;margin-bottom: 5px;'>
您最多可以同时上传
<span style='color:red' id='hd_up_{$id}'>$num</span>
个文件
</div>
</center>
<div id='$id' class='fileList'>";
        if (!empty($value)) {
            $fileData = unserialize($value);
            if (!empty($fileData) && is_array($fileData)) {
                $h .= '<ul>';
                foreach ($fileData as $file) {
                    $h .= "<li style='width:98%'>";
                    $h .= "<img src='" . __HDPHP_EXTEND__ . "/Org/Uploadify/default.png' style='width:50px;height:50px;'/>";
                    $h .= "&nbsp;&nbsp;地址: <input type='text' name='" . $field['field_name'] . "[path][]'  value='" . $file['path'] . "' style='width:28%' readonly=''/> ";
                    $h .= "&nbsp;&nbsp;描述: <input type='text' name='" . $field['field_name'] . "[alt][]' style='width:35%' value='" . $file['alt'] . "'/>";
                    $h .= "&nbsp;&nbsp;<a href='javascript:;' onclick='remove_upload(this,\"{$id}\")'>删除</a>";
                    $h .= "</li>";
                }
                $h .= '</ul>';
            }
        }
        $options = json_encode(array('id' => $id, 'type' => 'files', 'num' => $num, 'name' => $field['field_name'], 'filetype' => $set['filetype']));
        $h .= "</div>
</fieldset>
<button class='hd-cancel-small' onclick='file_upload($options)' type='button'>上传文件</button>";
        $h .= " <span class='{$field['field_name']} validate-message'>" . $field['tips'] . "</span>";
        return $h;
    }

}
<?php

//表字段缓存
class FieldModel extends Model
{
    //表
    public $table = "field";
    //字段id
    private $_fid;
    //模型mid
    private $_mid;
    //字段缓存
    private $_field;
    //模型缓存
    private $_model;
    //自动完成
    public $auto = array(
        //模型表名小写
        array("table_name", "_table_name", "method", 2, 1),
        //控制器首字母大写
        array("set", "_field_set", "method", 1, 3),
    );
    //自动验证
    public $validate = array(
        array("title", "nonull", "标题不能为空", 1, 3),
        array("field_name", "nonull", "字段名不能为空", 1, 3)
    );

    //构造函数
    public function __init()
    {
        $this->_fid = Q('fid', NULL, 'intval');
        $this->_mid = Q("mid", NULL, "intval");
        //字段所在表模型信息
        $this->_model = F("model", false);
        //字段缓存
        $this->_field = F($this->_mid, false, FIELD_CACHE_PATH);
    }

    //添加字段时，通过自动完成设置表名
    public function _table_name()
    {
        $table = $this->_model[$this->_mid]['tablename'];
        return Q('table_type') == 1 ? $table : $table . "_data";
    }

    //set字段自动完成处理
    public function _field_set($set)
    {
        $set['message'] = isset($set['message']) ? $set['message'] : "";
        $set['error'] = isset($set['error']) ? $set['error'] : "";
        $set['css'] = isset($set['css']) ? $set['css'] : "";
        $set['validation'] = empty($set['validation']) ? "false" : $set['validation'];
        $set['width'] = isset($set['width']) ? $set['width'] : "";
        $set['height'] = isset($set['height']) ? $set['height'] : "";
        $set['default'] = isset($set['default']) ? $set['default'] : "";
        $set['required'] = isset($set['required']) ? $set['required'] : "";
        $set['options'] = isset($set['options']) ? String::toSemiangle($set['options']) : "";
        return serialize($set);
    }

    /**
     * 删除字段
     * @return mixed
     */
    public function del_field()
    {
        //获得字段信息
        $field = $this->_field[$this->_fid];
        //检测字段是否存在
        if ($this->fieldExists($field['field_name'], $field['table_name'])) {
            //删除表字段
            $sql = "ALTER TABLE " . C("DB_PREFIX") . $field['table_name'] .
                " DROP " . $field['field_name'];
            $this->exe($sql);
        }
        //删除字段表记录
        return $this->del($this->_fid);
    }

    //添加自定义字段
    public function add_field()
    {
        if ($this->create()) {
            //修改表结构
            if ($this->alter_table_field()) {
                return $this->add();
            }
        }

    }

    //添加表字段
    public function alter_table_field()
    {
        //主表
        $table = $this->_model[$this->_mid]['tablename'];
        //table_type字段所在表 1 主表  2 附表
        $table = Q('table_type') == 1 ? $table : $table . '_data';
        //SQL
        switch ($_POST['show_type']) {
            case "input":
                $_field = $_POST['field_name'] . " VARCHAR(255) NOT NULL DEFAULT ''";
                break;
            case "number":
                //整数位数
                $p = $_POST['set']['num_integer'];
                //小数位数
                $e = isset($_POST['set']['num_decimal']) ? $_POST['set']['num_decimal'] : 0;
                $_field = $_POST['field_name'] . " DECIMAL({$p},{$e}) NOT NULL DEFAULT 0";
                break;
            case "textarea":
                $_field = '`' . $_POST['field_name'] . '`' . " TEXT";
                break;
            case "editor":
                $_field = '`' . $_POST['field_name'] . '`' . " TEXT";
                break;
            case "image":
                $_field = '`' . $_POST['field_name'] . '`' . " VARCHAR(100) NOT NULL DEFAULT ''";
                break;
            case "images":
                $_field = '`' . $_POST['field_name'] . '`' . " MEDIUMTEXT";
                break;
            case "select":
                $_field = '`' . $_POST['field_name'] . '`' . " CHAR(80) NOT NULL DEFAULT ''";
                break;
            case "date":
                $_field = '`' . $_POST['field_name'] . '`' . " int(10) NOT NULL DEFAULT 0";
                break;
        }
        //修改或添加字段
        $sql = "ALTER TABLE " . C("DB_PREFIX") . $table . " ADD " . $_field;
        return M()->exe($sql);
    }

    //更新字段缓存
    public function update_cache()
    {
        //查找当模型所有字段信息
        $field = $this->where("mid={$this->_mid}")->all();
        $_cache = array();
        if (is_array($field) && !empty($field)) {
            foreach ($field as $f) {
                if (isset($f['set']) && !empty($f['set'])) {
                    //返序列化set字段
                    $f["set"] = unserialize($f['set']);
                } else {
                    $f['set'] = array();
                }
                $_cache[$f['fid']] = $f;
            }
        }
        //删除Content表结构缓存
        is_dir("./Temp/hdcms/Content/Table") && Dir::del("./Temp/hdcms/Content/Table");
        return F($this->_mid, $_cache, FIELD_CACHE_PATH);
    }

    /**
     * 自定义字段
     * @param array $data 编辑数据时的数据
     * @return string
     */
    public function field_view($data = array())
    {
        //当前模型字段缓存
        $field = F($this->_mid, false, FIELD_CACHE_PATH);
        $h = "";
        if (is_array($field) and !empty($field)) {
            foreach ($field as $f) {
                $ac = "_" . $f['show_type'];
                //表单值  添加时使用set['default'] 编辑时使用data数据
                $value = isset($data[$f['field_name']]) ? $data[$f['field_name']] : $f['set']['default'];
                $h .= $this->$ac($f, $value);
            }
        }
        return $h;
    }

    //文本框
    private function _input($f, $value)
    {
        $set = $f['set'];
        //表单类型
        $type = $set['ispasswd'] == 1 ? "password" : "text";
        //验证
        $valid = "field_check(this,{$set['validation']},'{$set['message']}','{$set['error']}',{$set['required']})";
        $h = "<tr><th>{$f['title']}</th><td>";
        $h .= "<input onblur=\"{$valid}\" style=\"width:{$set['size']}px\" type=\"{$type}\" class=\"{$set['css']}\" name=\"{$f['field_name']}\" value=\"$value\"/>";
        $h .= " <span class='{$f['field_name']} validate-message'>" . $set['message'] . "</span>";
        $h .= "</td>";
        $h .= "</tr>";
        return $h;
    }

    //选项列表
    private function _select($f, $value)
    {
        $set = $f['set'];
        //表单值
        $_v = explode(",", $set['options']);
        $options = array();
        foreach ($_v as $n => $p) {
            $p = explode("|", $p);
            $options[$p[0]] = $p[1];
        }
        $h = "<tr><th>{$f['title']}</th><td>";
        //select添加select
        if ($set['form_type'] == 'select') {
            $h .= "<select name='{$f['field_name']}'>";
        }
        foreach ($options as $text => $v) {
            switch ($set['form_type']) {
                case "radio":
                    $checked = $value == $v ? "checked='checked'" : "";
                    $h .= "<label><input type='radio' name=\"{$f['field_name']}\" value=\"{$v}\" {$checked}/> {$text}</label> ";
                    break;
                case "checkbox":
                    $s = explode(",", $value);
                    $checked = in_array($v, $s) ? "checked='checked'" : "";
                    $h .= "<label><input type='checkbox' name=\"{$f['field_name']}[]\" value=\"{$v}\" {$checked}/> {$text}</label> ";
                    break;
                case "select":
                    $selected = $value == $v ? "selected='selected'" : "";
                    $h .= "<option name=\"{$f['field_name']}\" value=\"{$v}\" {$selected}> {$text}</option>";
                    break;
            }
        }
        if ($set['form_type'] == 'select') {
            $h .= "</select>";
        }
        $h .= "</td>";
        $h .= "</tr>";
        return $h;
    }

    //数字
    private function _number($f, $value)
    {
        $set = $f['set'];
        //验证
        $valid = "field_check(this,{$set['validation']},'{$set['message']}','{$set['error']}',{$set['required']})";
        $h = "<tr><th>{$f['title']}</th><td>";
        $h .= "<input onblur=\"{$valid}\" style=\"width:{$set['size']}\" class=\"{$set['css']}\" name=\"{$f['field_name']}\" value=\"$value\"/>";
        $h .= " <span class='{$f['field_name']} validate-message'>" . $set['message'] . "</span>";
        $h .= "</td>";
        $h .= "</tr>";
        return $h;
    }

    //文本域
    private function _textarea($f, $value)
    {
        $set = $f['set'];
        //验证
        $valid = "field_check(this,{$set['validation']},'{$set['message']}','{$set['error']}',{$set['required']})";
        //默认值
        $h = "<tr><th>{$f['title']}</th><td>";
        $h .= "<textarea onblur=\"{$valid}\" class=\"{$set['css']}\" name=\"{$f['field_name']}\" style=\"width:{$set['width']}px;height:{$set['height']}px\">{$value}</textarea>";
        $h .= " <span class='{$f['field_name']} validate-message'>" . $set['message'] . "</span>";
        $h .= "</td>";
        $h .= "</tr>";
        return $h;
    }

    //文本域
    private function _editor($f, $value)
    {
        $set = $f['set'];
        $h = "<tr><th>{$f['title']}</th><td>";
        $h .= tag("ueditor", array("name" => $f['field_name'], "content" => $value, "height" => $set['height']));
        $h .= " <span class='{$f['field_name']} validate-message'>" . $set['message'] . "</span>";
        $h .= "</td>";
        $h .= "</tr>";
        return $h;
    }

    //单图
    private function _image($f, $value)
    {
        $set = $f['set'];
        $id = "img_" . $f['field_name'];
        $h = "<tr><th>{$f['title']}</th><td>";
        $path = isset($value) ? $value : "";
        $src = !empty($value) ? __ROOT__ . '/' . $value : "";
        $h .= "<input id='$id' type='text' name='" . $f['field_name'] . "'  value='$path' src='$src' class='w300 images'/> ";
        $h .= "<button class='hd-cancel-small' onclick='file_upload(\"$id\",\"image\",1,\"{$f['field_name']}\")' type='button'>上传图片</button>&nbsp;&nbsp;";
        $h .= "<button class='hd-cancel-small' onclick='remove_upload_one_img(this)' type='button'>移除</button>";
        $h .= " <span class='{$f['field_name']} validate-message'>" . $set['message'] . "</span>";
        $h .= "</td>";
        $h .= "</tr>";
        return $h;
    }

    //多图
    private function _images($f, $value)
    {
        $set = $f['set'];
        $id = "img_" . $f['field_name'];
        //允许上传数量
        $num = $set['num'];
        //已经上传图片
        if (!empty($value)) {
            $img = unserialize($value);
            if (is_array($img))
                $num = $num - count($img);
        }
        $h = "<tr><th>{$f['title']}</th><td>";
        $h .= "<fieldset class='img_list'>
<legend style='color:#666;font-size: 12px;line-height: 25px;padding: 0px 10px; text-align:center;margin: 0px;'>图片列表</legend>
<center>
<div style='color:#666;font-size:12px;margin-bottom: 5px;'>
您最多可以同时上传
<span style='color:red' id='hd_up_{$id}'>$num</span>
张
</div>
</center>
<div id='$id' class='picList'>";
        if (!empty($value)) {
            $img = unserialize($value);
            if (!empty($img) && is_array($img)) {
                $h .= '<ul>';
                foreach ($img as $i) {
                    if (!empty($i['path'])) {
                        $h .= "<li><input type='text' name='" . $f['field_name'] . "[url][]'  value='" . $i['path'] . "' src='" . __ROOT__ . '/' . $i['path'] . "' class='w400 images'/> ";
                        $h .= "<input type='text' name='" . $f['field_name'] . "[alt][]' class='w200' value='" . $i['alt'] . "'/>";
                        $h .= " <a href='javascript:;' class='hd-cancel-small' onclick='remove_upload(this,\"$id\",\"images\");'>移除</a>";
                        $h .= "</li>";
                    }
                }
                $h .= '</ul>';
            }
        }
        $h .= "</div>
</fieldset>
<button class='hd-cancel-small' onclick='file_upload(\"$id\",\"images\",$num,\"{$f['field_name']}\")' type='button'>上传图片</button>";
        $h .= " <span class='{$f['field_name']} validate-message'>" . $set['message'] . "</span>";
        $h .= "</td>";
        $h .= "</tr>";
        return $h;
    }

    //时间
    private function _date($f, $value)
    {

        $set = $f['set'];
        $format = array("Y-m-d", "Y/m/d H:i:s", "H:i:s");
        $value = empty($value) ? "" : date($format[$set['format']], $value);
        //默认值
        $h = "<tr><th>{$f['title']}</th><td>";
        $h .= "<input type='text' id='{$f['field_name']}' name='{$f['field_name']}' value='$value' class='w150'/>";
        $format = array("yyyy-MM-dd", "yyyy/MM/dd HH:mm:ss", "HH:mm:ss");
        $h .= "<script>$('#{$f['field_name']}').calendar({format: '" . $format[$set['format']] . "'});</script>";
        $h .= "</td>";
        $h .= "</tr>";
        return $h;
    }


    public function __after_delete($data)
    {
        $this->update_cache();
    }

    public function __after_update($data)
    {
        $this->update_cache();
    }

    public function __after_insert($data)
    {
        $this->update_cache();
    }
}
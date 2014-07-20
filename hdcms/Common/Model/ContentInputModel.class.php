<?php

/**
 * 添加数据时前期处理
 */
class ContentInputModel
{
    //字段缓存
    private $field;
    private $mid;
    //栏目缓存
    private $category;
    //不需要处理的字段
    private $noDealField = array('aid', 'cid', 'mid', 'favorites', 'comment_num', 'read_credits', 'new_window');

    /**
     * 构造函数
     * @param int $mid 模型mid
     */
    public function __construct($mid)
    {
        $this->mid = $mid;
        $this->field = F($this->mid, false, CACHE_FIELD_PATH);
        $this->category = F('category', false, CACHE_DATA_PATH);
    }

    /**
     * 获得入库数据
     * @return array|bool
     */
    public function get()
    {
        $data = $_POST;
        //作者uid
        $data['uid'] = session('uid');
        //添加时间
        $data['addtime'] = empty($data['addtime']) ? date("Y/m/d H:i:s") : $data['addtime'];
        //修改时间
        $data['updatetime'] = time();
        //前台会员设置文章状态
        if (!IS_ADMIN) {
            $data['content_status'] = $this->category[$data['cid']]['member_send_state'];
        }
        //文章模型
        $ContentModel = ContentModel::getInstance($this->mid);
        //没有添加内容时初始设置
        if (empty($data['content'])) {
            $data['content'] = '';
        }
        //自动提取文章描述
        if (empty($data['description'])) {
            $len = isset($data['auto_desc_length']) ? $data['auto_desc_length'] : 200;
            $data['description'] = mb_substr(strip_tags($data['content']), 0, $len, 'utf-8');
        }
        //自动提取关键字
        if (empty($data['keywords'])) {
            $description = preg_replace("@\s@is", "", $data['description']);
            $words = String::splitWord($description);
            //没有分词不处理
            if (!empty($words)) {
                $i = 0;
                $k = "";
                foreach ($words as $w => $id) {
                    $k .= $w . ",";
                    $i++;
                    if ($i > 8)
                        break;
                }
                $data['keywords'] = substr($k, 0, -1);
            }
        }
        foreach ($this->field as $field => $fieldInfo) {
            //字段set选项
            $set = $fieldInfo['set'];
            //不需要处理的字段
            if (in_array($field, $this->noDealField)) {
                continue;
            }
            //字段二次处理方法
            $METHOD = $fieldInfo['field_type'];
            if (method_exists($this, $METHOD) && isset($data[$field])) {
                if ($fieldInfo['table_type'] == 1) { //主表数据
                    $Value = $this->$METHOD($fieldInfo, $data[$field]);
                    $data[$field] = $Value;
                } else { //副表
                    $Value = $this->$METHOD($fieldInfo, $data[$field]);
                    $data[$fieldInfo['table_name']][$field] = $Value;
                }
            }
            //如果字段设置唯一性验证时执行验证操作
            if ((int)$fieldInfo['isunique'] == 1) {
                if (M($fieldInfo['table_name'])->where($field . "='$Value'")->find()) {
                    $this->error = $fieldInfo['title'] . '已经存在';
                    return false;
                }
            }
            //模型自动验证规则设置
            $validateRule = array();
            //验证时间 1 有这个表单就验证  2 必须验证 3 表单不为空才验证
            $validateOccasion = (int)$fieldInfo['required'] ? 2 : 3;
            //设置验证规则
            if (isset($set['minlength']) && isset($set['maxlength'])) {
                $maxlength = (int)$set['maxlength'];
                $minlength = (int)$set['minlength'];
                if ($maxlength > $minlength) {
                    $validateRule[] = array($field, "minlen:$minlength", $fieldInfo['title'] . " 数量不能小于{$minlength}个字", $validateOccasion, 3);
                    $validateRule[] = array($field, "maxlen:$maxlength", $fieldInfo['title'] . " 数量不能大于{$maxlength}个字", $validateOccasion, 3);
                }
            }
            //验证规则
            if (!empty($fieldInfo['validate'])) {
                $regexp = $fieldInfo['validate'];
                $error = empty($fieldInfo['error']) ? $fieldInfo['title'] . ' 输入错误' : $set['error'];
                $validateRule[] = array($field, "regexp:$regexp", $error, $validateOccasion, 3);
            }
            //必须输入验证
            if ($fieldInfo['required'] == 1) {
                $validateRule[] = array($field, "nonull", $fieldInfo['title'] . ' 不能为空', $validateOccasion, 3);
            }
            //模型Validate属性设置验证规则
            if (!empty($validateRule)) {
                foreach ($validateRule as $validate) {
                    $ContentModel->addValidate($validate);
                }
            }
        }
        //如果没有缩略图时，删除图片属性
        if (empty($data['thumb'])) { //没有缩略图时，删除图片属性
            if (false !== $k = array_search('图片', $data['flag'])) {
                unset($data['flag'][$k]);
            }
        } else {
            $data['flag'][] = '图片';
        }
        $data['flag'] = implode(',', array_unique($data['flag']));
        return $data;
    }

    //标题字段
    private function title($fieldInfo, $value)
    {
        return htmlspecialchars(trim($value));
    }

    //缩略图
    private function thumb($fieldInfo, $value)
    {
        //提取内容第n张图为缩略图
        if (isset($_POST['auto_thumb']) && $_POST['auto_thumb'] == 1 && isset($_POST['content']) && extension_exists('curl')) {
            if (preg_match_all('/(src)=([\'"]?)([^\'">]+\.(jpg|jpeg|png|gif))\2/is', $_POST['content'], $matchData, PREG_PATTERN_ORDER)) {
                $num = (int)$_POST['auto_thumb_num'] - 1;
                if (isset($matchData[0][$num])) {
                    $Attachment = new Attachment();
                    $value = $Attachment->download($matchData[0][$num], array('jpg', 'gif', 'jpeg', 'png'), $this->mid);
                    if ($value) {
                        return trim(str_replace(__ROOT__, '', preg_replace('/src=(\'|")|[\'"]|\s/i', '', $value)), '/');
                    }
                }
            }
        }
        //没有设置自动提取时的处理
        return trim(str_replace(__ROOT__, '', $value), '/');
    }

    //模板选择
    private function template($fieldInfo, $value)
    {
        return str_replace(ROOT_PATH, '', trim($value));
    }

    //栏目选择
    private function cid($fieldInfo, $value)
    {
        return (int)$value;
    }

    //文章内容
    private function content($fieldInfo, $value)
    {
        if (empty($value)) {
            return $value;
        }
        //下载内容图片
        if (isset($_POST['down_remote_pic']) && $_POST['down_remote_pic'] == 1 && extension_exists('curl')) {
            $Attachment = new Attachment();
            $value = $Attachment->download($value, array('jpg', 'gif', 'jpeg', 'png'), $this->mid);
        }
        return $value;
    }

    //Flag文章属性
    private function flag($fieldInfo, $value)
    {
        if (empty($value)) {
            $value = array();
        }
        $flagCache = F($this->mid, false, CACHE_FLAG_PATH);
        $data = array();
        foreach ($value as $flag) {
            if (!in_array($flag, $flagCache)) {
                continue;
            }
            $data[] = $flag;
        }
        return $data;
    }

    //文本字段
    private function input($fieldInfo, $value)
    {
        return htmlspecialchars(trim($value));
    }

    //多行文本
    private function textarea($fieldInfo, $value)
    {
        return htmlspecialchars(trim($value));
    }

    //数字
    private function number($fieldInfo, $value)
    {
        $set = $fieldInfo['set'];
        $field_type = isset($set['field_type']) ? $set['field_type'] : 'int';
        switch ($field_type) {
            case "decimal" :
                return floatval($value);
            default :
                return intval($value);
        }
    }

    //选项
    private function box($fieldInfo, $value)
    {
        $set = $fieldInfo['set'];
        //checkbox连接成字符串，数据库中以字符串形式记录
        if ($set['form_type'] == 'checkbox') {
            return implode(',', $value);
        } else { //radio等类型
            return $value;
        }
    }

    //编辑器
    private function editor($fieldInfo, $value)
    {
        return $value;
    }

    //单图上传
    private function image($fieldInfo, $value)
    {
        return $value;
    }

    //多图上传
    private function images($fieldInfo, $value)
    {
        return serialize($value);
    }

    //日期时间
    private function datetime($fieldInfo, $value)
    {
        return strtotime($value);
    }

    //文件上传
    private function files($fieldInfo, $value)
    {
        return serialize($value);
    }

}

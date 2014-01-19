<?php

class ContentModel extends RelationModel
{
    //栏目id
    private $_cid;
    //模型mid
    private $_mid;
    //模型缓存
    private $_model;
    //栏目缓存
    private $_category;
    //字段缓存
    private $_field;
    //自动完成
    public $auto = array(
        array('addtime', 'time', 'function', 2, 1),
        array('updatetime', 'get_update_time', 'method', 2, 3),
        array('uid', 'get_uid', 'method', 2, 1)
    );

    //添加内容时获得发布者id
    protected function get_uid()
    {
        return session('uid');
    }

    //修改时间处理
    protected function get_update_time($v)
    {
        return empty($v) ? time() : strtotime($v);
    }

    //获得内容
    public function __construct()
    {
        $this->_category = F("category", false, CATEGORY_CACHE_PATH);
        $this->_model = F("model", false, MODEL_CACHE_PATH);
        $this->_cid = Q("cid", null, "intval");
        $mid = Q("mid", NULL, "intval");
        $this->_mid = $mid ? $mid : $this->_category[$this->_cid]['mid'];
        $this->_field = F($this->_mid, false, FIELD_CACHE_PATH);
        //模型表
        $this->table = $this->_model[$this->_mid]['tablename'];
        if (is_null($this->table)) {
            halt("没有可操作的表,缺少cid或mid参数");
        }
        //关联栏目表
        $this->join = array(
            "category" => array(
                "type" => BELONGS_TO,
                "foreign_key" => "cid",
                "parent_key" => "cid",
                "field" => array("cid", "catname", "mid")
            ),
            "content_flag" => array(
                "type" => HAS_MANY,
                "foreign_key" => "aid",
                "parent_key" => "aid"
            )
        );
        //副表关联
        if ($this->_model[$this->_mid]['type'] == 1) {
            $this->join[$this->table . '_data'] = array(
                "type" => HAS_ONE,
                "foreign_key" => "aid",
                "parent_key" => "aid"
            );
        }
        parent::__construct();
    }

    /**
     * 添加内容
     */
    public function add_content()
    {
        if ($this->create()) {
            return $this->add();
        }
    }

    /**
     * 修改文章
     * @return mixed
     */
    public function edit_content()
    {
        $aid = Q("aid", NULL, 'intval');
        if ($aid) {
            if ($this->create()) {
                return $this->save();
            }
        }
    }

    //下载远程图片
    private function _down_remote_pic(&$data)
    {
        //服务器是否允许远程下载
        $php_ini = @ini_get("allow_url_fopen");
        $allowDown = isset($data['down_remote_pic']) ? intval($data['down_remote_pic']) : false;
        if ($php_ini && $allowDown) {
            $table = $this->table . '_data';
            if (isset($data[$table]) && isset($data[$table]['content'])) {
                $content = & $data[$this->table . '_data']['content'];
                //查找所有图片
                preg_match_all("@<img.*?src=['\"](http://.*?[jpg|jpeg|png|gif])['\"].*?>@i", $content, $imgs);
                if (empty($imgs[1])) {
                    return false;
                }
                import("Upload.Control.UploadControl");
                $upload = new UploadControl();
                foreach ($imgs[1] as $img) {
                    //本站图片不进行处理
                    if (strstr($img, __ROOT__)) continue;;
                    if ($d_img = $upload->down_remote_pic($img)) {
                        $content = preg_replace("@$img@", $d_img, $content);
                    }
                }
            }
        }
    }

    //移除没有选中的flag
    private function _format_flag(&$data)
    {
        if (isset($data['content_flag'])) {
            $flag = $data['content_flag'];
            $data['content_flag'] = array();
            foreach ($flag as $f) {
                if (isset($f['fid'])) {
                    $data['content_flag'][$f['fid']] = $f;
                }
            }
        }
    }

    /**
     * 组织$_POST自定义字段KEY与值
     * 如果自定义字段为附表时，加附表名
     * 如果是图片images等特殊字段，重新格式化值，比如images使用序列化处理
     * 经过本函数做用的数据才可以正常插入到数据库中
     * @param $data POST来的入库数据
     */
    private function _current_field_data(&$data)
    {
        foreach ($data as $field_name => $post) {
            //获得字段信息
            if ($field = $this->_get_field_info($field_name)) {
                $_v = $this->_get_field_value($field, $post);
                //副表字段时，添加表附表名
                if ($field['table_type'] == 2) {
                    $data[$field['table_name']][$field_name] = $_v;
                    unset($data[$field_name]);
                } else {
                    $data[$field_name] = $_v;
                }
            }
        }
    }

    /**
     * 获得自定义字段结构信息
     * @param $field_name Post来的字段Key
     * @return null
     */
    private function _get_field_info($field_name)
    {
        if ($this->_field) {
            foreach ($this->_field as $info) {
                if ($info['field_name'] == $field_name) {
                    return $info;
                }
            }
        }
        return null;
    }

    /**
     * 添加与删除文章时处理自定义字段的值
     * 根据字段类型，设置合法的字段值
     * 比如images就要考虑为了序列化，合并为一个字符串
     * @param $field 自定义表单信息（包含表单名，表单默认值等，所有这个自定义字段的信息)
     * @param $postData 表户提交的表单Post数据
     * @return int|string
     */
    private function _get_field_value($field, $postData)
    {
        /**
         * 如果是图片字段
         * 将值记录到$_SESSION['use_upload_file']中
         * 当文章上传完成后，修改upload上传表，上传文件状态
         * 这是为了考虑图片等上传资源的已使用或未使用状态的
         * 如果这个图片原来已经使用了，后面的修改上传表操作，就不对他作用
         */
        if (!isset($_SESSION['uses_upload_file']))
            $_SESSION['uses_upload_file'] = array();
        /**
         * 根据显示类型做不同处理
         */
        switch ($field['show_type']) {
            case 'image':
                if (!empty($v)) {
                    //记录图片上传主文件名，用于后面修改upload表
                    $info = pathinfo($postData);
                    $_SESSION['upload_file'][$info['filename']] = 1;
                }
                return $postData;
                break;
            case 'images':
                $d = array();
                foreach ($postData['url'] as $n => $path) {
                    if (!empty($path)) {
                        $d[$n]['path'] = $path;
                        $d[$n]['alt'] = isset($v['alt'][$n]) ? $v['alt'][$n] : "";
                        //记录图片上传主文件名，用于后面修改upload表
                        $info = pathinfo($path);
                        $_SESSION['upload_file'][$info['filename']] = 1;;
                    }
                }
                return serialize($d);
            case 'select':
                /**
                 * 下拉列表框处理
                 * 根据多选与单选做不同处理
                 */
                $d = '';
                if (is_array($postData) && !empty($v)) {
                    foreach ($postData as $c) {
                        $d .= $c . ',';
                    }
                    $d = substr($d, 0, -1);
                } else if (is_numeric($postData)) {
                    $d = intval($postData);
                }
                return $d;
            case "date":
                //日期类型返回时间戳
                return strtotime($postData);
            default:
                //其他情况不做处理
                return $postData;
        }
    }

    /**
     * 编辑商品时获得属性flag
     * 将当前商品使用的Flag选中
     * @param $aid 文章id
     * @return mixed
     */
    public function get_content_flag($aid)
    {
        $db = M("flag");
        $flag = $db->all();
        $data = $db->table("content_flag")->where(array("aid" => $aid, "cid" => $this->_cid))->all();
        //当前文章属性
        $cur = array();
        if ($data) {
            foreach ($data as $d) {
                $cur[$d['fid']] = $d;
            }
        }
        //所有属性
        foreach ($flag as $n => $f) {
            $checked = isset($cur[$f['fid']]) ? "checked='checked'" : '';
            $flag[$f['fid']]['status'] = isset($cur[$f['fid']]) ? true : false;
            $flag[$f['fid']]['html'] = "
            <input type='hidden' name='content_flag[{$f['fid']}][cid]' value='{$this->_cid}'/>
            <label class='checkbox inline'><input type='checkbox' name='content_flag[{$f['fid']}][fid]'
            value='{$f['fid']}' $checked/> " . $f['flagname'] . "</label>";
        }
        return $flag;
    }

    /**
     * 图片Flag属性处理
     * 如果没有缩略图时删除文章的图片Flag属性
     * @param $data
     */
    private function _remove_img_flag(&$data)
    {
        if (isset($data['thumb']) && !empty($data['thumb'])) {
            $data['content_flag'][4] = array("fid" => 4, "cid" => $this->_cid);
        } else {
            if (isset($data['content_flag'][4])) {
                unset($data['content_flag'][4]);

            }
        }
    }

    /**
     * 从正文中提出第n张图为缩略图
     * 本功能需要发表文章时勾选了字获取内容第N张图为缩略图Checkbox
     * 如果缩略图字段不为空时（已经上传缩略图）不做任何处理
     * @param $data
     * @return bool
     */
    private function _get_content_pic(&$data)
    {
        //服务器是否允许远程下载
        $php_ini = @ini_get("allow_url_fopen");
        //有正文时处理
        if ($php_ini && isset($data['auto_thumb']) && $data['auto_thumb'] == 1 && empty($data['thumb'])) {
            $content = $data[$this->table . '_data']['content'];
            //取得所有图片
            preg_match_all("@<img.*?src=['\"](http://.*?[jpg|jpeg|png|gif])['\"].*?>@i", $content, $imgs);
            //没有图片不进行缩略图自动处理
            if (empty($imgs[1])) {
                return false;
            }
            //取第几张图为缩略图
            $num = isset($this->data['auto_thumb_num']) && intval($data['auto_thumb_num']) > 1 ? intval($data['auto_thumb_num']) : 1;
            $num--;
            //是否存在这张图
            if (isset($imgs[1][$num]) && !empty($imgs[1][$num])) {
                import("Upload.Control.UploadControl");
                $upload = new UploadControl();
                $d_img = $upload->down_remote_pic($imgs[1][$num]);
                if (preg_match("@" . __ROOT__ . "@", $d_img)) {
                    $data['thumb'] = str_ireplace(__ROOT__ . '/', "", $d_img);
                }

            }
        }
    }

    /**
     * 自动截取内容摘要
     * 需要发表文章时选择了'截取内容'Checkbox
     * 如果摘要有数据，不执行内容截取
     * @param $data
     */
    private function _get_description(&$data)
    {
        if (isset($data['description'])) {
            $table = $this->table . '_data';
            $description = $data['description'];
            $content = $data[$table]['content'];
            if (empty($description) && $data['auto_desc'] == 1) {
                //截取长度
                $len = intval($data['auto_desc_length']) ? intval($data['auto_desc_length']) : 100;
                $content = str_replace('&nbsp;', '', @strip_tags($content));
                $data['description'] = mb_substr(trim($content), 0, $len, "utf8");
            }
        }
    }

    //当关键字为空时，根据摘要内容提出关键字
    private function _get_keywords(&$data)
    {
        if (isset($data['keywords'])) {
            $keywords = $data['keywords'];
            $description = preg_replace("@[\s\w]@is", "", $data['description']);
            if (empty($keywords)) {
                $words = String::splitWord($description);
                //没有分词不处理
                if (empty($words)) return;
                $i = 0;
                $k = "";
                foreach ($words as $w => $id) {
                    $k .= $w . ",";
                    $i++;
                    if ($i > 8) break;
                }
                $data['keywords'] = substr($k, 0, -1);
            }
        }
    }

    //修改内容tag
    private function _update_tag($aid)
    {
        $keywords = $this->join()->where("aid=$aid")->getField('keywords');
        if (!empty($keywords)) {
            import('Tag/Model/TagModel');
            $db = K("Tag");
            foreach (explode(',', $keywords) as $tag) {
                $_POST['tag_name'] = $tag;
                $db->add_tag();
            }
        }
    }

    //添加与修改后执行的动作
    private function _after_action($data)
    {
        $aid = Q('aid') ? Q('aid') : $data[$this->table];
        //修改文件上传表upload
        $this->_update_upload_table($aid);
        //修改内容tag
        $this->_update_tag($aid);
        //获得文章的静态html地址
        $html = get_content_html(M($this->table)->find($aid));
        if (!is_null($html)) {
            //生成静态
            $_GET['cid'] = $this->_cid;
            $_GET['aid'] = $this->result[$this->table];
            ob_start();
            O("Index.Control.IndexControl", "content");
            $con = ob_get_clean();
            $dir = dirname($html);
            is_dir($dir) or dir_create($dir, 0755);
            file_put_contents($html, $con);
        }
    }

    //插入与编辑成功后修改文件上传表  使用__after_add等触发器调用
    private function _update_upload_table($aid)
    {
        //修改本次上传图片（新图片）
        $data = array(
            "mid" => $this->_mid,
            "cid" => $this->_cid,
            "aid" => $aid
        );
        $upload = session('upload_file');
        $db = M("upload");
        if (!empty($upload)) {
            foreach ($upload as $filename => $i) {
                $db->where = array('uid' => session('uid'), 'filename' => $filename, 'aid' => 0);
                $db->save($data);
            }
        }
        //删除SESSION中上传文件数据
        session('upload_file', array());
    }

    //插入与编辑前执行的动作
    private function _before_action(&$data)
    {
        //设置缩略图
        $this->_get_content_pic($data);
        //下载远程图片
        $this->_down_remote_pic($data);
        //移除没有选中的flag
        $this->_format_flag($data);
        //处理参数，将复选框值合并
        $this->_current_field_data($data);
        //如果没有缩略图时删除图片属性
        $this->_remove_img_flag($data);
        //摘要为空时截取内容做为摘要
        $this->_get_description($data);
        //关键字处理
        $this->_get_keywords($data);
    }


    public function __before_insert(&$data)
    {
        $this->_before_action($data);
    }

    public function __before_update(&$data)
    {
        $this->_before_action($data);
    }

    public function __after_insert($data)
    {
        if ($data)
            $this->_after_action($data);
    }

    public function __after_update($data)
    {
        //操作成功后执行回调函数
        if ($data)
            $this->_after_action($data);
    }


}
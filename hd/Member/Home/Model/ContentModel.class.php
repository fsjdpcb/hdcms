<?php
import('Template', 'hd.Hdcms.Index.Lib');
import('Url', 'hd.Hdcms.Index.Lib');
import('PublicControl', 'hd.Hdcms.Index.Control');
import('ArticleControl', 'hd.Hdcms.Index.Control');
import('ArticleModel', 'hd.Hdcms.Index.Model');
import('ContentTag', 'hd.Hdcms.Index.Lib');
import('TagModel', 'hd.Hdcms.Tag.Model');
import('FieldModel', 'hd.Hdcms.Field.Model');
import('UploadControl', 'hd.Hdcms.Upload.Control');
/**
 * 管理员文章内容管理
 * Class ContentModel
 */
class ContentModel extends RelationModel
{
    //模型mid
    private $_mid;
    //栏目cid
    private $_cid;
    //文章aid
    private $_aid;
    //模型缓存
    private $_model;
    //栏目缓存
    private $_category;
    //副表
    private $_stable;
    //字段缓存
    private $_field;
    //自动完成
    public $auto = array(
        //新增文章时的添加时间
        array('addtime', 'time', 'function', 2, 1),
        //更新时间
        array('updatetime', 'get_update_time', 'method', 2, 3),
        //发布者id
        array('uid', '_auto_uid', 'method', 2, 3),
        //属性flag字段
        array('flag', '_auto_flag', 'method', 2, 3),
        //投稿状态
        array('state', '_state', 'method', 2, 3),
        //关键字
        array('keywords', '_keywords', 'method', 2, 3)
    );

    //内容关键字自动完成处理
    protected function _keywords($v)
    {
        return str_replace('，', ',', $v);
    }

    //投稿状态
    protected function _state($v)
    {
        $category = F('category');
        return $category[Q('cid')]['member_send_state'];
    }

    //添加内容时获得发布者id
    protected function _auto_uid()
    {
        return session('uid');
    }

    //自动验证
    public $validate = array(
        array('title', 'nonull', '标题不能为空', 1, 3),
        array('content', 'nonull', '内容不能为空', 1, 3)
    );

    //修改时间处理
    protected function get_update_time($v)
    {
        return empty($v) ? time() : strtotime($v);
    }

    //获得内容
    public function __init()
    {
        $this->_model = F("model");
        $this->_category = F("category");
        $this->_cid = Q("cid", null, "intval");
        $this->_aid = Q('aid', NULL, 'intval');
        $this->_mid = $this->_cid ? $this->_category[$this->_cid]['mid'] : 1;
        //自定义字段
        $this->_field = F($this->_mid, false, FIELD_CACHE_PATH);
        //主表
        $this->table = $this->_model[$this->_mid]['table_name'];
        if (is_null($this->table)) {
            halt("没有可操作的表,缺少cid或mid参数");
        }
        //副表
        $this->_stable = $this->table . '_data';
        //关联栏目表
        $this->join = array(
            "category" => array(
                "type" => BELONGS_TO,
                "foreign_key" => "cid",
                "parent_key" => "cid",
                "field" => array("cid", "catname", "mid")
            )
        );
        //关联副表
        $this->join[$this->_stable] = array(
            "type" => HAS_ONE,
            "foreign_key" => "aid",
            "parent_key" => "aid"
        );
    }

    /**
     * 获得内容数据（单一文章）
     */
    public function get_one_content()
    {
        if (!isset($_SESSION['admin'])) {
            $this->where('uid=' . $_SESSION['uid']);
        }
        $field = $this->find($this->_aid);
        if ($field) {
            //缩略图
            $field['thumb_img'] = empty($field['thumb']) || !is_file($field['thumb']) ? __ROOT__ . '/hd/static/img/upload-pic.png' : __ROOT__ . '/' . $field['thumb'];
            //当前文章tag
            $tags = K('Tag')->where(array('mid' => $this->_mid, 'aid' => $this->_aid))->getField('tag', true);
            if ($tags) {
                $tmp = array();
                foreach ($tags as $t) {
                    $tmp[] = $t;
                }
                $tag = implode(',', $tmp);
            } else {
                $tag = '';
            }
            $field['tag'] = $tag;
            //获得栏目标签
            return $field;
        }
    }

    /**
     * 获得自定义字段的编辑与添加的视图界面
     * @param null $aid 文章aid
     * @return string
     */
    public function get_current_field_view($aid = null)
    {
        //自定义字段
        $db = new FieldModel();
        if (is_null($aid)) {
            $field = array();
        } else {
            $field = $this->find($aid);
        }
        return $db->field_view($field);
    }

    /**
     * 删除文章
     * @param $aid 文章aid
     * @return boolean
     */
    public function del_content($aid)
    {
        $aid = intval($aid);
        //删除文章
        if ($this->del($aid)) {
            //删除tag
            M('content_tag')->where(array('cid' => $this->_cid, 'aid' => $aid))->del();
            //删除评论
            $this->table("comment")->where("cid =$this->_cid and aid=$aid")->del();
            return true;
        }
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
        if ($this->create()) {
            return $this->save();
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
        //设置附表content字段数据
        $data[$this->_stable]['content'] = $data['content'];
        foreach ($data as $field_name => $post) {
            //获得字段信息
            if ($field = $this->_get_field_info($field_name)) {
                $_v = $this->_get_field_value($field, $post);
                //添加副表表名
                $data[$this->_stable][$field_name] = $_v;
                unset($data[$field_name]);
            }
        }
    }

    /**
     * 获得自定义字段结构信息
     * @param string $field_name Post来的字段Key
     * @return null
     */
    private function _get_field_info($field_name)
    {
        //如果有自定义字段时处理
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
         * 根据显示类型做不同处理
         */
        switch ($field['show_type']) {
            case 'image':
                return $postData;
            case 'images':
                $d = array();
                foreach ($postData['path'] as $n => $path) {
                    if (!empty($path)) {
                        $d[$n]['path'] = $path;
                        $d[$n]['alt'] = isset($postData['alt'][$n]) ? $postData['alt'][$n] : "";
                    }
                }
                return serialize($d);
            case 'files':
                $d = array();
                foreach ($postData['path'] as $n => $path) {
                    if (!empty($path)) {
                        $d[$n]['path'] = $path;
                        $d[$n]['alt'] = isset($postData['alt'][$n]) ? $postData['alt'][$n] : "";
                        //下载积分
                        $d[$n]['credits'] = isset($postData['credits'][$n]) ? intval($postData['credits'][$n]) : 0;
                    }
                }
                return serialize($d);
                break;
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
     * 获得缩略图
     * 如果有$_POST['thumb']时，取此值，否则根据从内容中取图
     * 从正文中提出第n张图为缩略图
     * 本功能需要发表文章时勾选了字获取内容第N张图为缩略图Checkbox
     * 如果缩略图字段不为空时（已经上传缩略图）不做任何处理
     * @param $data
     * @return bool
     */
    private function _get_thumb_pic(&$data)
    {
        /**
         * 会员中心上传文章使用uploadify表单
         * 后台使用input表单
         * 以下是处理会员中心上传的情况
         */
        if (isset($_POST['thumb']) && isset($_POST['thumb'][1]['path']) && is_file($_POST['thumb'][1]['path'])) {
            $data['thumb'] = $_POST['thumb'][1]['path'];
        }
    }


    //当关键字为空时，根据摘要内容提出关键字
    private function _get_keywords(&$data)
    {
        $data['keywords'] = String::toSemiangle($data['tag']);
    }

    //修改内容tag
    private function _update_tag($aid)
    {
        $tag = Q('tag', null);
        //内容tag表
        $content_tag = M('content_tag');
        //删除旧tag数据
        $content_tag->where("mid={$this->_mid} and aid=$aid")->del();
        if ($tag) {
            //替换全角
            $tag = String::toSemiangle($tag);
            //没有tag时不处理
            if (empty($tag)) return;
            //拆分tag标签
            $tags = explode(',', $tag);
            $tags = array_unique($tags);
            $tag_db = K("Tag");
            foreach ($tags as $tag) {
                $tid = $tag_db->add_tag($tag);
                //添加新tag数据
                $content_tag->add(array('tid' => $tid, 'aid' => $aid, 'mid' => $this->_mid, 'cid' => $this->_cid, 'uid' => session('uid')));
            }
        }
    }

    //插入与编辑成功后修改文件上传表  使用__after_add等触发器调用
    private function _update_upload_table($aid)
    {
        M('upload')->where('uid=' . $_SESSION['uid'])->save(array('state' => 1));
    }

    //添加与修改后执行的动作
    private function _after_action($data)
    {
        //文章aid
        $aid = Q('aid') ? Q('aid') : $data[$this->table];
        //修改文件上传表upload
        $this->_update_upload_table($aid);
        //修改内容tag
        $this->_update_tag($aid);
        //获得文章的静态html地址
        $html = Url::get_content_html(M($this->table)->find($aid));

        if ($html) {
            $_GET = $this->find($aid);
            //生成静态
            ob_start();
            $_REQUEST['mid']=$this->_mid;
            $_REQUEST['cid']=$this->_cid;
            $_REQUEST['aid']=$aid;
            $obj = new ArticleControl();
            $obj->show();
            $con = ob_get_clean();
            $dir = dirname($html);
            is_dir($dir) or dir_create($dir, 0755);
            file_put_contents($html, $con);
        }
    }

    public function __before_insert(&$data)
    {
        //设置缩略图
        $this->_get_thumb_pic($data);
        //关键字处理
        $this->_get_keywords($data);
        //处理参数，将复选框值合并
        $this->_current_field_data($data);

    }

    public function __before_update(&$data)
    {
        //设置缩略图
        $this->_get_thumb_pic($data);
        //关键字处理
        $this->_get_keywords($data);
        //处理参数，将复选框值合并
        $this->_current_field_data($data);
    }

    public function __after_insert($data)
    {
        //------------------------------------修改会员金币数
        $credits = session('credits');
        //修改分员投稿积分
        $add_reward = $this->_category[$this->_cid]['add_reward'];
        M('user')->where('uid=' . session('uid'))->save(array('credits', $credits + $add_reward));
        //更新会员session
        session('credits', $credits + $add_reward);

        if ($data)
            $this->_after_action($data);
    }

    public function __after_update($data)
    {
        //操作成功后执行回调函数
        if ($data)
            $this->_after_action($data);
    }

    public function __after_delete($data)
    {
        //------------------------------------修改会员金币数
        $credits = session('credits');
        //栏目配置奖励积分
        $add_reward = $this->_category[$this->_cid]['add_reward'];
        $s = max(0, $credits - $add_reward);
        //修改分员投稿积分
        M('user')->where('uid=' . session('uid'))->save(array('credits', $s));
        //更新会员session
        session('credits', $s);
    }

}
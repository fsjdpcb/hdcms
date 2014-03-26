<?php
//导入栏目操作模型
import('CategoryModel', 'hd/Hdcms/Category/Model');

/**
 * 文章管理
 * Class ContentControl
 */
class ContentControl extends MemberAuthControl
{
    //栏目缓存
    private $_category;
    //模型缓存
    private $_model;
    //模型mid
    private $_mid;
    //栏目cid
    private $_cid;
    //文章aid
    private $_aid;
    //模型对象
    private $_db;

    //构造函数
    public function __init()
    {
        //父类构造函数
        parent::__init();
        $this->_model = F("model", false);
        $this->_category = F("category", false);
        $this->_cid = Q("cid", NULL, "intval");
        $this->_aid = Q("aid", NULL, "intval");
        if ($this->_cid) {
            if (!isset($this->_category[$this->_cid])) {
                $this->error("栏目不存在！");
            }
            $this->_mid = $this->_category[$this->_cid]['mid'];
        } else {
            $this->_mid = 1;
        }
        $this->_db = K("MemberContent");
    }

    /**
     * 文章列表
     */
    public function index()
    {
        /**
         * 分配数据
         * page=>页码
         * data=>文章内容
         */
        $db = K('MemberContentView');
        $this->assign($db->get_content());
        $this->display();
    }

    /**
     * 选择发表文章栏目
     */
    public function select_category()
    {
        header("Content-type:text/html;charset=utf-8");
        $rid = session('rid');
        //分配栏目
        $category = Data::tree(F("category"), 'catname');
        $data = array();
        /**
         * 只选择有权限的栏目，过滤掉没有发表权限的栏目
         */
        foreach ($category as $n => $v) {
            $v['disabled'] = $v['cattype'] == 1 ? '' : ' disabled="disabled" ';
            if (empty($v['access'])) {
                $data[$n] = $v;
            } else if (isset($v['access'][$rid]) && $v['access'][$rid]['add'] == 1) {
                $data[$n] = $v;
            }
        }
        $this->data = $data;
        $this->display();
    }

    /**
     * 发表文章
     */
    public function add()
    {

        if (IS_POST) {
            if ($this->_db->add_content()) {
                $credits = $this->_category[$this->_cid]['add_reward'];
                $this->_ajax(1, "发表成功！增加{$credits}个金币");
            } else {
                $this->_ajax(0, $this->_db->error);
            }
        } else {
            $cid = Q('cid', null, 'intval');
            if (!$cid) {
                _404('请求非法');
            }
            //分配栏目
            $this->category = $this->_category[$cid];
            //模型type为1时即标准模型，显示编辑器、关键字等字段
            $this->model = $this->_model[$this->_mid];
            //自定义字段
            import('FieldModel', 'hd/Hdcms/Field/Model');
            //FieldModel模型使用mid参数
            $_REQUEST['mid'] = $this->_category[$cid]['mid'];
            $fieldModel = new FieldModel();
            $this->custom_field = $fieldModel->field_view();
            $this->display();
        }
    }

    /**
     * keditor 编辑器图片上传处理方法
     */
    public function keditor_upload()
    {
        import('UploadControl', 'hd.Hdcms.Upload.Control');
        O('UploadControl', __FUNCTION__);
    }

    /**
     * keditor 编辑器图片上传处理方法
     */
    public function hd_uploadify()
    {
        //文件保存目录
        $_POST['upload_dir'] = "./upload/" . Q("get.dir", "content") . "/" . date("Y") . '/' . date("m") . '/' . date("d") . '/';
        import('UploadControl', 'hd.Hdcms.Upload.Control');
        O('UploadControl', __FUNCTION__);
    }

    /**
     * 修改文章
     */
    public function edit()
    {
        //修改文章
        if (IS_POST) {
            if ($this->_db->edit_content()) {
                $this->_ajax(1, '修改文章成功');
            }
        } else {
            if ($this->_aid and $this->_cid) {
                $field = $this->_db->where("aid={$this->_aid} and uid=" . session('uid'))->find();
                if (!$field) {
                    $this->error('文章不存在参数错误');
                }
                //分配栏目
                $this->category = $this->_category[$this->_cid];
                //模型type为1时即标准模型，显示编辑器、关键字等字段
                $this->model = $this->_model[$this->_mid];

                $field['thumb_img'] = empty($field['thumb']) || !is_file($field['thumb']) ? __ROOT__ . '/hd/static/img/upload-pic.png' : __ROOT__ . '/' . $field['thumb'];
                $this->field = $field;
                //自定义字段处理
                import('Field/Model/FieldModel');
                //FieldModel模型使用mid参数
                $_REQUEST['mid'] = $this->_category[$this->_cid]['mid'];
                //自定义字段
                import('FieldModel', 'hd/Hdcms/Field/Model');
                $fieldModel = new FieldModel();
                $this->custom_field = $fieldModel->field_view($field);
                $this->display();
            }
        }
    }

    /**
     * 删除文章
     */
    public function del()
    {
        $aid = Q('aid', null, 'intval');
        $cid = Q('cid', null, 'intval');
        if ($aid) {
            if ($this->_db->del_content($cid, $aid, session('uid'))) {
                $this->_ajax(1, '删除成功');
            }
        } else {
            $this->_ajax(0, 'aid参数错误');
        }
    }
}
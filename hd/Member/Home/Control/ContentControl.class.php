<?php

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
     * 发表文章
     */
    public function add()
    {
        if (IS_POST) {
            if ($this->_db->add_content()) {
                $this->_ajax(1, '发表成功！');
            }
        } else {
            //分配栏目
            $this->category = $this->_category;
            //模型type为1时即标准模型，显示编辑器、关键字等字段
            $this->model = $this->_model[$this->_mid];
            //自定义字段
            import('FieldModel', 'hd/Hdcms/Field/Model');
            //FieldModel模型使用mid参数
            $_REQUEST['mid'] = $this->_mid;
            $fieldModel = new FieldModel();
            $this->custom_field = $fieldModel->field_view();
            $this->display();
        }
    }
}
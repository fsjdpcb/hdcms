<?php

/**
 * 内容关键字搜索
 * Class IndexControl
 * @author <houdunwangxj@gmail.com>
 */
class SearchControl extends Control
{
    //数据模型
    private $_db;
    //栏目
    private $_category;
    //模型
    private $_model;

    public function __init()
    {
        $this->_category = cache("category");
        $this->_model = cache("model");
        $this->_db = K("Search");
    }

    //高级搜索
    public function index()
    {
        $this->category = $this->_category;
        $this->model = $this->_model;
        $this->display("./template/plug/search.html");
    }

    //搜索内容
    public function search()
    {
        if (!Q('word')) {
            $this->error("搜索内容不能为空");
        } else {
            $data = $this->_db->search();
            $this->assign($data);
            $this->display();
        }
    }

    /**热门搜索词
     * 前台通过js调用
     * <script type="text/javascript" src="__ROOT__/index.php?a=Search&c=Search&m=search_word&row=10"></script>
     */
    public function search_word()
    {
        $row = Q("get.row", 10, "intval");
        $db = M("search");
        $result = $db->limit($row)->all();
        $str = "";
        if (!empty($result)) {
            foreach ($result as $field) {
                $field['url'] = __ROOT__ . '/index.php?a=Search&c=Search&m=search&word=' . $field['word'];
                $str .= " <a href='{$field['url']}'>{$field['word']}</a>";
            }
        }
        echo "document.write('" . addslashes($str) . "')";
        exit;
    }
}
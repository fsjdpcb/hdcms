<?php

/**
 * 内容关键字搜索(只适应文章模型）
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
        $this->_category = F("category", false, CATEGORY_CACHE_PATH);
        $this->_model = F("model", false, MODEL_CACHE_PATH);
        $_REQUEST['cid'] = M("category")->where('mid=1')->getField('cid');
        import('Index.Model.SearchModel');
        $this->_db = K("Search");
    }

    //高级搜索
    public function index()
    {
        $this->_category = $this->_category;
        $this->_model = $this->_model;
        $this->display("./template/common/search.html");
    }

    //搜索内容
    public function search()
    {
        $result = $this->_db->search();
        $this->assign("data", $result['data']);
        $this->assign("page", $result['page']);
        $this->display("./template/common/search_list.html");
    }

    /**搜索关键词
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
                $field['url'] = __ROOT__ . '/index.php?a=Search&c=Search&m=search&search=' . $field['name'];
                $str .= " <a href='{$field['url']}'>{$field['name']}</a>";
            }
        }
        echo "document.write('" . addslashes($str) . "')";
        exit;
    }
}
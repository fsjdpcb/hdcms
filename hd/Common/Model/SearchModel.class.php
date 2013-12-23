<?php
class SearchModel extends Model
{
    public $table = "search";
    //搜索词
    public $searchWord;
    //搜索条件
    private $where = "";
    //排序方式
    private $order;
    //内容模型
    private $content;

    //内容模型
    public function __construct()
    {
        parent::__construct();

        //过滤函数
        $this->searchWord = Q("request.search", NULL);
        //内容模型
        $mid = Q("post.mid", 1, "intval");
        $_GET['mid'] = max($mid, 1);
        $this->content = K("ContentView");
    }

    //关键词搜索
    public function search()
    {
        //关键词验证
        if (!$this->searchWord) {
            return false;
        }
        //获得where条件
        $this->get_where();
        //排序方式
        $this->set_order();
        //显示条数
        $pagerow = Q("post.pagerow", 10, "intval");
        //总条数
        $count = $this->content->join()->where($this->where)->count();
        //页码处理
        $page = new Page($count, $pagerow);
        //获得搜索结果
        $result = $this->content->join()->where($this->where)->limit($page->limit())->order($this->order)->all();
        //修改搜索次数
        $this->update_search_total();
        return array(
            "data" => $result,
            "page" => $page->show()
        );
    }

    //排序类型
    private function set_order()
    {
        $this->order = Q("post.orderby") ? Q("post.orderby") . " DESC " : " aid DESC ";
    }

    //获得where条件
    private function get_where()
    {
        //关键词模式 OR AND
        $kwtype = Q("post.kwtype", 1, "intval") == 1 ? " OR " : " AND ";
        $where = "";
        //发表时间
        $starttime = Q("post.starttime", NULL, "intval");
        if ($starttime) {
            $addtime = $starttime * 3600 * 24;
            $where .= " addtime>$addtime $kwtype";
        }
        //栏目cid
        $cid = Q("post.cid", NULL, "intval");
        if ($cid) {
            $where .= " cid = $cid $kwtype";
        }

        if (!empty($where)) {
            $this->where = substr($where, 0, strlen($kwtype));
        }
        //搜索内容
        $where .= $this->kwtype . " title LIKE '%{$this->searchWord}%'";
        $searchtype = Q("post.searchtype", "searchtype");
        //搜索keywords字段
        if ($searchtype == 'titlekeyword') {
            $where .= $kwtype . " keywords LIKE '%{$this->searchWord}%'";
        }
        $this->where = $where;
    }

    //修改搜索词记数
    private function update_search_total()
    {
        $total = $this->where("name='{$this->searchWord}'")->getField("total");
        $total = $total ? $total + 1 : 1;
        //修改次数
        $this->replace(array("name" => $this->searchWord, "total" => $total));
    }
}
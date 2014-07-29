<?php

/**
 * 内容关键字搜索
 * Class IndexController
 * @author <houdunwangxj@gmail.com>
 */
class SearchController extends Controller
{
    private $category;
    private $model;
    private $mid;
    private $cid;

    public function __init()
    {
        $this->category = F("category", false, CACHE_DATA_PATH);
        $this->model = F("model", false, CACHE_DATA_PATH);
        $mid = Q('mid', 0, 'intval');
        $this->mid = $mid ? $mid : 1;
        $this->cid = Q('cid', 0, 'intval');
        if ($this->mid && !isset($this->model[$this->mid])) {
            $this->error('模型不存在');
        }
        if ($this->cid && !isset($this->model[$this->cid])) {
            $this->error('栏目不存在');
        }
    }

    //高级搜索
    public function index()
    {
        $this->category = F("category", false, CACHE_DATA_PATH);
        $this->model = F("model", false, CACHE_DATA_PATH);
        $this->display("template/plug/search.html");
    }

    //搜索内容
    public function search()
    {
        $word = Q('word', '', 'htmlspecialchars,addslashes,strip_tags');
        if (!$word) $this->error("搜索内容不能为空");
        //=====================记录搜索词
        $SearchTotal = M('search')->where(array('word' => $word))->getField('total');
        M('search')->replace(array('word' => $word, 'total' => $SearchTotal + 1));
        $pre = C('DB_PREFIX');
        $seachType = Q('type', 'title');
        $db = ContentViewModel::getInstance($this->mid);
        if ($seachType == 'tag') {
            $model = M();
            $countSql = "SELECT count(*) AS c FROM
						(SELECT distinct(aid) FROM {$pre}tag AS t INNER JOIN {$pre}content_tag AS ct ON t.tid=ct.tid WHERE tag='{$word}' AND mid=1 GROUP BY aid) AS c";
            $count = $model->query($countSql);
            $page = new Page($count[0]['c'], 15);
            $sql = "SELECT * FROM {$pre}category as cat JOIN {$db->tableFull} AS c  ON cat.cid = c.cid JOIN {$pre}content_tag AS ct  ON c.aid=ct.aid INNER
										JOIN {$pre}tag AS t ON t.tid=ct.tid WHERE t.tag='{$word}' LIMIT " . $page->limit(true);
            $data = $model->query($sql);
        } else {
            $where = array();
            if ($this->cid) {
                $cidData = getCategory($this->cid);
                $where[] = $pre . "category.cid IN(" . implode(',', $cidData) . ")";
            }
            if (!empty($_GET['search_begin_time'])) {
                $where[] = "addtime>=" . strtotime($_GET['search_begin_time']);
            }
            if (!empty($_GET['search_end_time'])) {
                $where[] = "addtime<=" . strtotime($_GET['search_end_time']);
            }
            switch ($seachType) {
                case 'title' :
                    $where[] = "title like '%{$word}%'";
                    $count = $db->relation($db->table . ',category')->where($where)->count();
                    $page = new Page($count, 15);
                    $data = $db->relation($db->table . ',category')->where($where)->all();
                    break;
                case 'description' :
                    $where[] = "description like '%{$word}%'";
                    $count = $db->relation($db->table . ',category')->where($where)->count();
                    $page = new Page($count, 15);
                    $data = $db->relation($db->table . ',category')->where($where)->all();
                    break;
                case 'username' :
                    $where[] = "username like '%{$word}%'";
                    $count = $db->relation($db->table . ',category')->where($where)->count();
                    $page = new Page($count, 15);
                    $data = $db->relation($db->table . ',category')->where($where)->all();
                    break;
            }
        }
        $this->assign('searchModel', $this->model);
        $this->assign('searchCategory', $this->category);
        $this->assign('page', $page);
        $this->assign('data', $data);
        $this->display();
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

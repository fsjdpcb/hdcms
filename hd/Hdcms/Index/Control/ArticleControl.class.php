<?php
import('ArticleModel', 'hd.Hdcms.Index.Model');

/**
 * 内容页
 * Class ContentControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class ArticleControl extends PublicControl
{
    //模型
    protected $_db;
    //模型mid
    protected $_mid;
    //栏目id
    protected $_cid;
    //文章id
    protected $_aid;
    //文章主表
    protected $_table;
    //模型缓存
    protected $_model;
    //栏目缓存
    protected $_category;

    //构造函数
    public function __init()
    {
        //----------------------设置变量----------------------
        $this->_model = cache("model");
        $this->_category = cache("category");
        $this->_mid = Q('mid', null, 'intval');
        $this->_cid = Q("cid", null, "intval");
        $this->_aid = Q("aid", null, "intval");
        $this->_db = K('Article');
        if ($this->_cid) {
            if (!$this->_model[$this->_category[$this->_cid]['mid']]) {
                _404('参数错误');
            }
        }
    }

    //内容页
    public function show()
    {
        if ($this->_cid && $this->_aid) {
            $access = $this->_category[$this->_cid]['access']['user'];
            if (!empty($access)) {
                if (!isset($_SESSION['uid'])) {
                    $this->error('请登录后访问');
                } else if (!check_category_access($this->_cid, 'show')) {
                    $this->error('你没有访问权限');
                }
            }
            $field = $this->_db->get_one();
            if ($field) {
                $field['caturl'] = U("Index/Category/category", array("cid" => $field['cid']));
                $field['source'] = empty($field['source']) ? C("WEBNAME") : $field['source'];
                //获得内容模板
                $tpl = Template::get_content_tpl($this->_aid, $this->_cid);
                $field['time'] = date("Y/m/d", $field['addtime']);
                $field['date_before'] = date_before($field['addtime']);
                $field['commentnum'] = M("comment")->where("cid=" . $this->_cid . " AND aid=" . $this->_aid)->count();
                $this->hdcms = $field;
                $this->display($tpl, C('cache_article'));
            }
        }
    }

    //获得评论数
    public function get_comment_num()
    {
        $aid = Q('aid', null, 'intval');
        if ($aid) {
            $count = M('comment')->where("aid={$aid}")->cache(60)->count('');
            echo "document.write($count);";
            exit;
        }
    }

    //修改文章点击次数
    public function updateClick()
    {
        $model = M("model")->find($this->_get("mid", "intval"));
        $table = $model['table_name'];
        $aid = $this->_get("aid", "intval");
        $data = array(
            "aid" => $aid,
            "click" => "click+1"
        );
        $db = M($table);
        $db->inc("click", "aid=$aid", 1);
        $field = $db->find($aid);
        echo "document.write({$field['click']})";
        exit;
    }

    //修改点击数
    public function get_click()
    {
        $aid = Q("aid", NULL, "intval");
        $this->_db = K("Content");
        $this->_db->join(NULL)->inc("click", "aid=$aid", 1);
        $field = $this->_db->JOIN(NULL)->find($aid);
        echo "document.write({$field['click']})";
        exit;
    }

    /**
     * 加入收藏夹
     */
    public function add_favorite()
    {
        $data = array(
            'mid' => $this->_mid,
            'cid' => $this->_cid,
            'aid' => $this->_aid,
            'uid' => $_SESSION['uid']
        );
        M("favorite")->where($data)->del();
        if (M("favorite")->add($data)) {
            $this->_ajax(1, '添加收藏夹成功!');
        } else {
            $this->_ajax(0, '添加失败');
        }
    }
}
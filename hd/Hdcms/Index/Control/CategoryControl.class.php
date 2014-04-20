<?php
import('CategoryModel', 'hd.Hdcms.Index.Model');

/**
 * 栏目列表
 * Class IndexControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class CategoryControl extends PublicControl
{
    //模型
    protected $_db;

    //模型mid
    protected $_mid;
    //栏目id
    protected $_cid;
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
        $this->_db = K('Category');
        if (!$this->_cid) {
            _404('缺少GET参数CID错误');
        }
        if (!isset($this->_category[$this->_cid])) {
            _404('栏目不存在');
        }

    }

    //显示栏目列表
    public function category()
    {
        if ($this->_cid) {
            //当前操作栏目
            $category = $this->_category[$this->_cid];
            //外部链接，直接跳转
            if ($category['cattype'] == 3) {
                go($category['cat_redirecturl']);
            } else {
                $field =$this->_db->find($this->_cid);
				$field['son_category']=Data::channelList($this->_category,$this->_cid);
				$db = K('Article');
				$where = C('DB_PREFIX').'category.cid='.$this->_cid." OR pid=".$this->_cid;
				$field['article_num']=$db->join('category')->where($where)->count();
				$field['comment_num']=$db->join('category')->where($where)->sum('comment_num');
                $this->assign("hdcms", $field);
                $tpl = Template::get_category_tpl($this->_cid);
                $this->display($tpl, C('cache_category'));
            }
        }
    }
}
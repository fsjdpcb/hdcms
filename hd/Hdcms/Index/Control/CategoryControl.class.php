<?php

/**
 * 栏目列表
 * Class IndexControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class CategoryControl extends PublicControl
{
    //构造函数
    public function __init()
    {
        parent::__init();
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
                $field = M("category")->find($this->_cid);
                $this->assign("hdcms", $field);
                $tpl = get_category_tpl($this->_cid);
                if (is_file($tpl))
                    $this->display($tpl);
            }
        }
    }
}

?>
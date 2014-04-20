<?php

/**
 * 单页面
 * Class SingleControl
 */
class SingleControl extends PublicControl
{
	private $_category;
    //构造函数
    public function __init()
    {
    	$this->_category = cache('category');
    }

    //单文章显示内容
    public function show()
    {
        $cid = Q('cid', NULL, 'intval');
        if ($cid) {
            $field = M('content_single')->where("cid=$cid")->find();
			$field['time']=date("Y-m-d",$field['updatetime']);
            $tpl = 'template/' . C("WEB_STYLE").'/'.($field['template']?$field['template']:$this->_category[$cid]['arc_tpl']);
            if (is_file($tpl)) {
                $this->hdcms = $field;
                $this->display($tpl);
            }
        }

    }
}

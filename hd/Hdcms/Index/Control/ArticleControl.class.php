<?php

/**
 * 内容页
 * Class ContentControl
 * @author 向军 <houdunwangxj@gmail.com>
 */
class ArticleControl extends PublicControl
{
    //内容页
    public function show()
    {
        if ($this->_aid) {
            import('Content.Model.ContentViewModel');
            $db = new ContentViewModel();
            $field = $db->where($db->tableFull . ".aid=" . $this->_aid)->find();
            if ($field) {
                $field['caturl'] = U("category", array("cid" => $field['cid']));
                $field['source'] = empty($field['source']) ? C("WEBNAME") : $field['source'];
                //获得内容模板
                $tpl = Template::get_content_tpl($this->_aid, $this->_cid);
                if (is_file($tpl)) {
                    $field['time'] = date("Y/m/d");
                    $this->hdcms = $field;
                    $this->display($tpl);
                } else {
                    $this->template_error($tpl);
                }
            }
        }
    }
    //获得评论数
    public function get_comment_num(){
        $aid=Q('aid',null,'intval');
        if($aid){
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
}
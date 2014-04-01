<?php

/**
 * 内容Tag管理
 * Class TagModel
 */
class TagModel extends ViewModel
{
    public $table = "tag";

    public function __init()
    {
    }

    //关联表
    public $view = array(
        'content_tag' => array(
            'type' => INNER_JOIN, //指定连接方式
            'on' => 'tag.tid=content_tag.tid', //关联条件
        )
    );

    /**
     * 用于添加文章时设置tag标签
     * @param null $tagName 标签名
     */
    public function add_tag($tagName = null)
    {
        $tagName = $tagName ? $tagName : Q('tag');
        if ($this->create() && $tagName) {
            $field = $this->where("tag='$tagName'")->find();
            if ($field) {
                $this->replace(array("tag" => $tagName, "total" => $field['total'] + 1));
                return $field['tid'];
            } else {
                return $this->replace(array("tag" => $tagName, "total" => 1));
            }

        }
    }

    /**
     * 删除标签
     * @param $tid
     * @return boolean
     */
    public function del_tag($tid)
    {
        if ($this->del($tid)) {
            $this->table('content_tag')->where("tid=$tid")->del();
            return true;
        }
    }
}
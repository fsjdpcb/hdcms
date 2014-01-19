<?php

/**
 * 内容Tag管理
 * Class TagModel
 */
class TagModel extends Model
{
    public $table = "tag";

    public function __init()
    {
    }

    /**
     * 添加内容tag
     */
    public function add_tag()
    {
        if ($this->create()) {
            $tag_name = Q("post.tag_name");
            $total = $this->where("tag_name='$tag_name'")->getField("total");
            $total = $total ? $total + 1 : 1;
            $this->replace(array("tag_name" => $tag_name, "total" => $total));
        }
    }
}
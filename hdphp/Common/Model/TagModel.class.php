<?php
/**
 * 内容Tag管理
 * Class TagModel
 */
class TagModel extends Model
{
    public $table = "tag";

    //内容模型
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 添加内容tag
     * @param $tag array()
     */
    public function add_tag($tag)
    {
        if (!empty($tag) && is_array($tag)) {
            foreach ($tag as $name => $v) {
                $total = $this->where("name='$name'")->getField("total");
                $total = $total ? $total + 1 : 1;
                $this->replace(array("name" => $name, "total" => $total));
            }
        }
    }
}
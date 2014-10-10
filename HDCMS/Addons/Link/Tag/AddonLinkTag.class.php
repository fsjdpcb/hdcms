<?php

/**
 * 友情链接
 * Class AddonLinkTag
 * @author 向军 <2300071698@qq.com>
 */
class AddonLinkTag
{
    public $tag = array(
        'addon_comment_list' => array('block' => 1, 'level' => 4),
    );
    //获得最新评论
    public function _addon_link_list($attr, $content)
    {
        $row = isset($attr['row']) ? $attr['row'] : 10;
        $php = <<<str
        <?php
            \$db=M('addon_link');
            \$data =\$db->limit($row)->all();
            foreach(\$data as \$field):
        ?>
str;
        $php .= $content;
        $php .= "<?php endforeach;?>";
        return $php;
    }
}
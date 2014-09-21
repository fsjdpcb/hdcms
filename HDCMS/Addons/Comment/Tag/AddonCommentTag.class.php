<?php
class AddonCommentTag
{
    public $tag = array(
        'addon_comment_list' => array('block' => 1, 'level' => 4),
    );
    //获得最新评论
    public function _addon_comment_list($attr, $content)
    {
        $row = isset($attr['row']) ? $attr['row'] : 20;
        $len = isset($attr['len']) ? $attr['len'] : 20;
        $php = <<<str
        <?php
            \$db=M();
            \$data =\$db->join('__user__ u JOIN __addon_comment__ c ON u.rid=c.userid')->limit($row)->all();
            foreach(\$data as \$field):
                \$field['userlink'] = ' __ROOT__/index.php?m=Member&c=Space&a=index&uid=' . \$field['uid'];
                \$field['url']='__WEB__?m=Index&c=Index&a=content&mid='.\$field['mid'].'&cid='.\$field['cid'].'&aid='.\$field['aid'];
                \$field['content'] =mb_substr(\$field['content'],0,$len,'utf-8');
                \$field['icon']='__ROOT__/'.\$field['icon'];
            ?>
str;
        $php .= $content;
        $php .= "<?php endforeach;?>";
        return $php;
    }
}
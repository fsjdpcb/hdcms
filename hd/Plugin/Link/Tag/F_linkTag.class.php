<?php

class F_linkTag
{
    public $tag = array(
        'flink' => array('block' => 1, 'level' => 4)
    );

    /**
     * 友情链接显示
     * @param $attr 属性
     * @param $content 内容
     * @return int
     */
    public function _flink($attr, $content)
    {
        //友链类型 image 图片  text 非图片链接 all 所有链接
        $type = isset($attr['type']) ? $attr['type'] : 'all';
        //分类id
        $tid = isset($attr['tid']) ? $attr['tid'] : '';
        $php = <<<str
        <?php
        \$type='$type';\$tid='$tid';
        //导入模型
        require_cache("hd/Plugin/Link/Model/LinkModel.class.php");
        \$db = K('Link');
        switch(\$type){
            case 'image':
                \$db->where('logo<>""');
                break;
            case 'text':
                 \$db->where('logo=""');
                break;
            case 'all':
            default:
        }
        if(\$tid){
            \$db->where(C('DB_PREFIX')."link.tid=\$tid");
        }
        \$link = \$db->where('state=1')->all();
        foreach (\$link as \$field):
            \$field['logo'] = "__ROOT__/" . \$field['logo'];
            \$field['link'] = '<a href="'.\$field['url'].'" target="_blank">'.\$field['webname'].'</a>';
        ?>
str;
        $php .= $content;
        $php .= <<<str
        <?php
        endforeach;
        ?>
str;
        return $php;
    }
}
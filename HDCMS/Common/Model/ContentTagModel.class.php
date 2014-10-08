<?php

/**
 * 文章Tag模型
 * Class TagModel
 * @author 后盾向军 <2300071698@qq.com>
 */
class ContentTagModel extends ViewModel
{
    public $table = 'content_tag';
    public $view = array(
        'content_tag' => array('_type' => 'INNER'),
        'tag' => array('_on' => 'content_tag.tid=tag.tid')
    );

    /**
     * 获取指定文章的tag
     * 结果如：“CMS,后盾网,hdphp”形式
     */
    public function getContentTag($aid)
    {
        $data = $this->where("aid=$aid")->getField('tag', true);
        if (!$data) return '';
        return implode(',', $data);
    }

    /**
     * 使用与getContentTag类型，只是加上链接
     * @param $aid
     * @return string
     */
    public function getContentTagLink($aid)
    {
        $data = $this->where("aid=$aid")->getField('tag,tag,mid');
        if (!$data) return '';
        $link = '';
        foreach ($data as $d) {
            $url = U('Search/Index/index', array('g' => 'Addons', 'type' => 'tag', 'wd' => $d['tag'], 'mid' => $d['mid']));
            $link .= "<a href='{$url}'>{$d['tag']}</a>";
        }
        return $link;
    }

    /**
     * @param $mid 模型mid
     * @param $tag Tag文字
     * @return array|null
     */
    public function getContentAid($mid, $tag)
    {
        $map['mid'] = array('EQ', $mid);
        $map['tag'] = array('EQ', $tag);
        $data = $this->where($map)->getField('aid', true);
        return $data ? array_unique($data) : array(0);
    }
}
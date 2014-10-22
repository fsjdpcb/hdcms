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
     * @param $mid 模型mid
     * @param $aid 文章aid
     * @param bool $link tag加链接
     * @return string
     */
    public function getContentTag($mid, $aid)
    {
        $map['mid'] = $mid;
        $map['aid'] = $aid;
        $data = $this->where($map)->group('tag.tid')->getField('tag', true);
        //没有tag
        if (!$data) return '';
        $html = '';
        foreach ($data as $d) {
            $url = U('Search/Index/index', array('g' => 'Addons', 'type' => 'tag', 'wd' => $d, 'mid' => $mid));
            $html .= "<a href='{$url}'>{$d}</a> ";
        }
        return $html;
    }

    /**
     * 根据tag获得指定文章
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
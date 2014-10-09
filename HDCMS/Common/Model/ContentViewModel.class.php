<?php

/**
 * 内容视图模型
 * Class ContentModel
 */
class ContentViewModel extends ViewModel
{
    //模型对象
    static private $instance = array();
    //副表
    protected $stable;
    //模型mid
    protected $mid;

    //实例化模型对象
    static public function getInstance($mid)
    {
        if (!isset(self::$instance[$mid])) {
            $modelCache = S('model');
            $table = $modelCache[$mid]['table_name'];
            $model = new self($table);
            $model->stable = $table . '_data'; //副表名
            $model->mid = $mid;
            $model->view[$table] = array('_type' => "INNER");
            $model->view['category'] = array('_type' => 'INNER', '_on' => "category.cid={$table}.cid");
            $model->view['user'] = array('_type' => 'INNER', '_on' => "user.uid={$table}.uid");
            $model->view['model'] = array('_type' => 'INNER', '_on' => 'model.mid=category.mid');
            $model->view[$table . '_data'] = array('_on' => $table . ".aid={$table}_data.aid");
            self::$instance[$mid] = $model;
            return $model;
        } else {
            return self::$instance[$mid];
        }
    }

    //获得文章内容
    public function getOne($aid)
    {
        $field = $this->where($this->table . ".aid=$aid")->find();
        return $field ? $this->formatField($field) : array();
    }

    //对字段数据二次处理，如规范链接、图片地址等
    public function formatField($field)
    {
        $cache = S('field' . $field['mid']);
        foreach ($field as $name => $value) {
            if(!isset($cache[$name]))continue;
            switch ($cache[$name]['field_type']) {
                case 'thumb':
                    $field[$name] = $field[$name] ? __ROOT__ . '/' . $field[$name] : '';
                    break;
                case 'image':
                    $field[$name] = $field[$name] ? __ROOT__ . '/' . $field[$name] : '';
                    break;
                case 'images':
                    $field[$name] = unserialize($field[$name]);
                    break;
                case 'files':
                    $field[$name] = unserialize($field[$name]);
                    break;
            }
        }
        //头像
        $field['icon'] = empty($field['icon']) ? __ROOT__ . "/data/image/user/150.png" : __ROOT__ . '/' . $field['icon'];
        //URL地址
        $field['url'] = Url::getContentUrl($field);
        //栏目图片
        $field['catimage'] = $field['catimage'] ? __ROOT__ . '/' . $field['catimage'] : '';
        //栏目url
        $field['caturl'] = Url::getCategoryUrl($field);
        //获得文章Tag(链接)
        $field['tag'] = K('ContentTag')->getContentTagLink($field['aid']);
        //发表时间
        $field['time'] = date("Y-m-d", $field['addtime']);
        //多久前发表
        $field['date_before'] = date_before($field['addtime']);
        return $field;
    }

    //获得文章tag
    private function getTag($aid)
    {
        $pre = C('DB_PREFIX');
        $sql = "SELECT tag FROM {$pre}tag AS t JOIN {$pre}content_tag AS ct ON
                t.tid=ct.tid WHERE mid={$this->mid} AND aid={$aid}";
        $tag_result = M()->query($sql);
        $tag = '';
        if (!empty($tag_result)) {
            foreach ($tag_result as $t) {
                $url = U('Index/Search/search', array('word' => $t['tag'], 'type' => 'tag'));
                $tag .= " <a href=\"$url\">{$t['tag']}</a>";
            }
        }
        return $tag;
    }
}

<?php

class SingleModel extends Model
{
    //表
    public $table = 'content_single';
    //文章aid
    private $_aid;

    public function __init()
    {
        $this->_aid = Q('aid', NULL, 'intval');
    }

    //自动完成
    public $auto = array(
        array('addtime', 'time', 'function', 2, 1),
        array('updatetime', 'get_update_time', 'method', 2, 3),
        array('uid', 'get_uid', 'method', 2, 1)
    );

    //添加内容时获得发布者id
    protected function get_uid()
    {
        return session('uid');
    }

    //修改时间处理
    protected function get_update_time($v)
    {
        return empty($v) ? time() : strtotime($v);
    }

    /**
     * 添加内容
     */
    public function add_content()
    {
        if ($this->create()) {
            return $this->add();
        }
    }

    /**
     * 修改内容
     */
    public function edit_content()
    {
        if ($this->create()) {
            return $this->save();
        }
    }

    /**
     * 生成静态文件
     * @param $data
     */
    protected function create_html_file($data)
    {
        $aid = $this->_aid ? $this->_aid : $data;
        if ($aid) {
            $field = $this->find($aid);
            if ($field['ishtml'] == 1) {
                $file = empty($field['html_path']) ? $aid . '.html' : str_replace('{aid}', $aid, $field['html_path']);
                $html = C("HTML_PATH") . '/' . $file;
                ob_start();
                O("Index.Control.SingleControl", "Single");
                $con = ob_get_clean();
                $dir = dirname($html);
                is_dir($dir) or dir_create($dir, 0755);
                file_put_contents($html, $con);
            }
        }
    }

    public function __after_insert($data)
    {
        $this->create_html_file($data);
    }

    public function __after_update($data)
    {
        $this->create_html_file($data);
    }

}
<?php

/**
 * 上传附件管理
 * Class AttachmentControl
 */
class AttachmentController extends AuthController
{
    private $db;

    public function __init()
    {
        $this->db = K("Upload");
    }

    //显示列表
    public function index()
    {
        $count = $this->db->count();
        $page = new Page($count);
        $this->page = $page->show();
        $upload = $this->db->order("id desc")->limit($page->limit())->all();
        if ($upload) {
            foreach ($upload as $id => $v) {
                if ($v['image'] == 1 && is_file($v['path'])) {
                    $upload[$id]['pic'] = __ROOT__ . '/' . $v['path'];
                } else {
                    $upload[$id]['pic'] = __COMMON__ . '/static/img/upload-pic.png';
                }
            }
        }
        $this->assign('upload', $upload);
        $this->display();
    }

    //删除附件
    public function del()
    {
        $id = Q("id", null, "intval");p($id);exit;
        if ($id) {
            $file = $this->db->find($id);
            is_file($file['path']) and unlink($file['path']);
            $this->db->del($id);
            $this->success("删除成功!");
        }
    }

    //批量删除
    public function BulkDel()
    {
        $ids = Q('ids');
        if ($ids && is_array($ids)) {
            $Model = K("Upload");
            foreach ($ids as $id) {
                $Model->del($id);
            }
            $this->success("删除成功!");
        } else {
            $this->error('参数错误');
        }
    }

}

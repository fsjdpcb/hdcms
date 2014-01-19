<?php
class UploadModel extends Model
{
    //将上传文件写入数据表upload
    public function insert_to_table($data)
    {
        $data['cid'] = Q("get.cid", 0, "intval");
        $data['mid'] = Q("get.mid", 0, "intval");
        $data['aid'] = 0;
        $data['uid'] = $_SESSION['uid'];
        if ($id = $this->add($data)) {
            $this->save_to_session($data['filename']);
            return $id;
        }
        return false;
    }

    /**
     * 将上传成功的图缓存到session
     * @param $filename 主文件名
     */
    public function save_to_session($filename)
    {
        if (!isset($_SESSION['upload_file'])) {
            $_SESSION['upload_file'] = array();
        }
        $_SESSION['upload_file'][$filename] = 1;
    }

    /**
     * 删除上传文件（只适应用于上传插件中的删除动作)
     * 同时删除session中记录
     * @param $file
     */
    public function del_file($file)
    {
        if (is_array($file)) {
            foreach ($file as $f) {
                //当前图片id
                foreach ($_SESSION['upload_file'] as $id => $path) {
                    if ($path == $f) {
                        if (@unlink($f)) {
                            if ($this->where(array("id" => $id))->del()) {
                                unset($_SESSION['upload_file'][$id]);
                            }
                        }
                    }
                }
            }
        }
    }
}
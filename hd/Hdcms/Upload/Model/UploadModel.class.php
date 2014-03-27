<?php

/**
 * 上传资源管理
 * Class UploadModel
 */
class UploadModel extends Model
{
    public $table = 'upload';

    /**
     * 将上传文件写入数据表upload
     * 文章完成添加后，更新aid记录
     * @param $data
     * @return bool
     */
    public function save_to_table($data)
    {
        $data['uid'] = session('uid');
        return $this->add($data);
    }
}
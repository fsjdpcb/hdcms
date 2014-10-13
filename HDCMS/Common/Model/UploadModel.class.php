<?php

/**
 * 附件表
 * Class UploadModel
 * @author 后盾向军 <2300071698@qq.com>
 */
class UploadModel extends ViewModel
{
    public $table = 'upload';
    public $view = array(
        'upload' => array('_type' => 'INNER'),
        'user' => array('_on' => '__upload__.uid=__user__.uid')
    );
}

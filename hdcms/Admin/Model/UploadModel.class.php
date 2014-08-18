<?php

//附件表
class UploadModel extends ViewModel
{
    public $table = 'upload';
    public $view = array(
        'upload' => array('_type' => 'INNER'),
        'user' => array('_on' => '__upload__.uid=__user__.uid')
    );
}

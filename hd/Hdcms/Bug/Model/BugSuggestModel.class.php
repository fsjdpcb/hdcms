<?php

/**
 * HDCMS Bug
 * Class BugModel
 */
class BugSuggestModel extends Model
{
    //操作表
    public $table = 'bug';
    //自动完成
    public $auto = array(
        array('addtime')
    );

    /**
     * 反馈建议
     */
    public function add_suggest()
    {
        $_POST['addtime'] = time();
        return $this->add();
    }
}
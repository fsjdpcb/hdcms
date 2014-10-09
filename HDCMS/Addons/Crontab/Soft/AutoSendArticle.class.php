<?php

/**
 * 定时发表文章
 * Class AutoSendArticle
 * @author 后盾向军 <2300071698@qq.com>
 */
class AutoSendArticle
{
    public $title = '定时发表文章';

    //定时执行方法
    public function run()
    {
        $model = S('model');
        foreach ($model as $m) {
            $map['content_status'] = array('EQ', 2);
            $map['auto_send_time'] = array('LT', time());
            M($m['table_name'])->where($map)->save(array('content_status' => 1));
        }
    }
}
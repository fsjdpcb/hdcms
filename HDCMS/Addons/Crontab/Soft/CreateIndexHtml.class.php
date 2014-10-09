<?php

/**
 * 定时生成首页静态
 * Class AutoSendArticle
 * @author 后盾向军 <2300071698@qq.com>
 */
class CreateIndexHtml
{
    public $title = '生成首页静态';

    //定时执行方法
    public function run()
    {
        $html = new Html();
        $html->index();
    }
}
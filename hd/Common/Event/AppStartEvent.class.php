<?php

/**
 * 应用开始事件处理类
 * Class AppStartEvent
 * @author 向军 <houdunwangxj@gmail.com>
 */
class AppStartEvent extends Event
{
    public function run(&$options)
    {
        $this->set_const();
        $this->check_install();
    }

    //设置常量
    private function set_const()
    {
        //表字段缓存
        define("FIELD_CACHE_PATH", 'data/Cache/Field/');
        //JS文件缓存目录
        define("JS_CACHE_PATH", 'data/Cache/Js/');
        //视图缓存目录(模板显示数据)
        define("CONTENT_CACHE_PATH", 'data/Cache/Content/');
    }

    //验证安装
    public function check_install()
    {

        if (is_dir('install') && !file_exists('install/lock.php')) {
            echo "<script>
                top.location.href='install/';
            </script>";
            exit;
        }
    }
}
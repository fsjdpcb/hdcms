<?php
/**
 * Cc 插件
 * @author 后盾向军 <houdunwangxj@gmail.com>
 */
class CcAddon extends Addon
{

    //插件信息
    public $info = array(
        'name' => 'Cc',
        'title' => '示例',
        'description' => '这是一个临时描述',
        'status' => 1,
        'author' => '无名',
        'version' => '0.1',
        'has_adminlist' => 1,
    );

    //安装
    public function install()
    {
        return true;
    }

    //卸载
    public function uninstall()
    {
        return true;
    }
    //实现的pageHeader钩子方法
    public function pageHeader($param){
    }

    //实现的pageFooter钩子方法
    public function pageFooter($param){
    }

    //实现的app_begin钩子方法
    public function app_begin($param){
    }

    //实现的conent_edit_begin钩子方法
    public function conent_edit_begin($param){
    }

    //实现的content_edit_end钩子方法
    public function content_edit_end($param){
    }

    //实现的content_del钩子方法
    public function content_del($param){
    }

    //实现的content_add_begin钩子方法
    public function content_add_begin($param){
    }

    //实现的content_add_end钩子方法
    public function content_add_end($param){
    }
}
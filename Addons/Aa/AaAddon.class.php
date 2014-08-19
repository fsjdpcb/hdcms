<?php
/**
 * Aa 插件
 * @author 后盾向军 <houdunwangxj@gmail.com>
 */
class AaAddon extends Addon
{

    //插件信息
    public $info = array(
        'name' => 'Aa',
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
}
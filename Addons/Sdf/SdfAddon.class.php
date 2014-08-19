<?php
/**
 * Sdf 插件
 * @author 后盾向军 <houdunwangxj@gmail.com>
 */
class SdfAddon extends Addon
{

    //插件信息
    public $info = array(
        'name' => 'Sdf',
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
    }}
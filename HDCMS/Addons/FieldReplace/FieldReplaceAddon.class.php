<?php
/**
 * FieldReplace 插件
 * @author 后盾向军 <houdunwangxj@gmail.com>
 */
class FieldReplaceAddon extends Addon
{

    //插件信息
    public $info = array(
        'name' => 'FieldReplace',
        'title' => '数据库内容替换',
        'description' => '数据库内容替换',
        'status' => 1,
        'author' => '后盾网向军',
        'version' => '1.0',
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
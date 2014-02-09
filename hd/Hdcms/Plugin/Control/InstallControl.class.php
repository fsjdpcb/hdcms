<?php

/**
 * 插件安装
 * Class InstallControl
 */
class InstallControl extends AuthControl
{
    private $_db;
    //插件名
    private $_plug;

    public function __init()
    {
        //插件名称（目录）
        $plug = Q('plug');
        if ($plug) {
            $this->_db = K('Plugin');
            $this->_plug = $plug;
        } else {
            $this->error('参数错误');
        }
    }

    //安装插件
    public function install()
    {
        if (IS_POST) {
            //安装插件
            if ($this->_db->install_plugin($this->_plug)) {
                $this->_ajax(1, '插件安装成功');
            }
        } else {
            //分配配置项
            $plug = array_change_key_case_d(require 'hd/Plugin/' . $this->_plug . '/Config/config.php');
            $plug['plug'] = $this->_plug;
            $this->plug = $plug;
            $this->display();
        }
    }

    //卸载插件
    public function uninstall()
    {
        if (IS_POST) {
            //卸载插件
            if ($this->_db->uninstall_plugin($this->_plug)) {
                //删除文件
                if (Q('del_file')) {
                    dir::del('hd/Plugin/' . $this->_plug);
                }
                $this->_ajax(1, '插件卸载成功');
            }
        } else {
            //分配配置项
            $plug = array_change_key_case_d(require 'hd/Plugin/' . $this->_plug . '/Config/config.php');
            $plug['plug'] = $this->_plug;
            $this->plug = $plug;
            $this->display();
        }
    }

    //使用帮助
    public function help()
    {
        $help_file = "hd/Plugin/" . $this->_plug . '/Data/help.php';
        if (is_file($help_file)) {
            $this->help = file_get_contents($help_file);
            $this->display();
        }
    }
}
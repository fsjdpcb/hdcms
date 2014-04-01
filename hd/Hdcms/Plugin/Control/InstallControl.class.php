<?php

/**
 * 插件安装
 * Class InstallControl
 */
class InstallControl extends AuthControl
{
    private $_db;
    //插件名
    private $_plugin;
    //插件配置错误如数据表文件不存在等
    private $_error;
    //插件目录
    private $_dir;

    public function __init()
    {
        //插件名称（目录）
        $this->_plugin = Q('plugin');
        //插件目录
        $this->_dir = 'hd/Plugin/' . $this->_plugin . '/';
        //模型
        $this->_db = K('Plugin');
        if (!$this->_plugin) {
            $this->error('参数错误');
        }
        if (!$this->check_plugin()) {
            $this->error($this->_error);
        }
    }

    /**
     * 验证插件
     */
    private function check_plugin()
    {
        //安装sql检测
        if (!is_file($this->_dir . 'Data/install.sql')) {
            $this->_error = '安装sql文件install.sql不存在';
            return false;
        }
        //删除sql
        if (!is_file($this->_dir . 'Data/uninstall.sql')) {
            $this->_error = '删除Sql文件uninstall.sql不存在';
            return false;
        }
        //删除sql
        if (!is_file($this->_dir . 'Data/help.php')) {
            $this->_error = '插件帮助文件help.php不存在';
            return false;
        }
        //检测配置文件
        if (!is_file($this->_dir . 'Config/config.php')) {
            $this->_error = '配置文件config.php不存在';
            return false;
        }
        return true;
    }

    //安装插件
    public function install()
    {
        if (IS_POST) {
            //安装插件
            if ($this->_db->install_plugin($this->_plugin)) {
                $this->_ajax(1, '插件安装成功');
            } else {
                $this->_ajax(0, $this->_db->error);
            }
        } else {
            //分配配置项
            $field = array_change_key_case_d(require 'hd/Plugin/' . $this->_plugin . '/Config/config.php');
            $field['plugin'] = $this->_plugin;
            $this->field = $field;
            $this->display();
        }
    }

    //卸载插件
    public function uninstall()
    {
        if (IS_POST) {
            //卸载插件
            if ($this->_db->uninstall_plugin($this->_plugin)) {
                //删除文件
                if (Q('del_dir')) {
                    if (!dir::del($this->_dir)) {
                        $this->_ajax(0, '插件目录删除失败');
                    }
                }
                $this->_ajax(1, '插件卸载成功');
            } else {
                $this->_ajax(0, $this->_db->error);
            }
        } else {
            //分配配置项
            $field = array_change_key_case_d(require 'hd/Plugin/' . $this->_plugin . '/Config/config.php');
            $field['plugin'] = $this->_plugin;
            $this->field = $field;
            $this->display();
        }
    }

    //使用帮助
    public function help()
    {
        $help_file = "hd/Plugin/" . $this->_plugin . '/Data/help.php';
        if (is_file($help_file)) {
            $this->help = file_get_contents($help_file);
            $this->display();
        }
    }
}
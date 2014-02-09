<?php

/**
 * 插件管理
 * Class PluginControl
 */
class PluginControl extends AuthControl
{
    //模型
    private $_db;

    public function __init()
    {
        parent::__init();
        $this->_db = K('Plugin');
    }

    /**
     * 插件列表
     */
    public function plugin_list()
    {
        $this->plugin = $this->_db->get_all_plugin();
        $this->display();
    }


}
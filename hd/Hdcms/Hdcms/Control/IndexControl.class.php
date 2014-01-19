<?php
//导入菜单模型
import('Menu.Model.MenuModel');
/**
 * 后台首页
 * Class IndexControl
 * @category Admin
 * @author 向军 <houdunwangxj@gmail.com>
 */
class IndexControl extends AuthControl
{
    //内容模型对象
    private $_db;

    public function __init()
    {
        parent::__init();
        $this->_db = K("Menu");
    }

    //后台首页
    function index()
    {

        //获得顶级菜单
        $this->top_menu = $this->_db->get_top_menu();
        //获得常用菜单
        $this->favorite_menu = $this->_db->get_favorite_menu();
        $this->display();
    }

    //反馈
    public function feedback()
    {
        $this->display();
    }


}

?>
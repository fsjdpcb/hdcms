<?php
/**
 * 后台首页
 * Class IndexControl
 * @category Admin
 * @author 向军 <houdunwangxj@gmail.com>
 */
class IndexControl extends AuthControl
{
    /**
     * 后台首页
     */
    function index()
    {
    	$db = K("Menu");
        //获得顶级菜单
        $this->top_menu = $db->get_top_menu();
        //获得常用菜单
        $this->favorite_menu = $db->get_favorite_menu();
        $this->display();
    }
	
    /**
     * 欢迎页
     */
    public function welcome()
    {
        $this->display();
    }
}

?>
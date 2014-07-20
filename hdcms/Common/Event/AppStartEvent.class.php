<?php

/**
 * 应用开始事件处理类
 * Class AppStartEvent
 * @author 向军 <houdunwangxj@gmail.com>
 */
class AppStartEvent extends Event {
	public function run(&$options) {
		$this -> check_install();
        //是否登录
        defined("IS_LOGIN")		    or define("IS_LOGIN", isset($_SESSION['uid']));
        //是否为管理员
        defined("IS_ADMIN") 		or define("IS_ADMIN",IS_LOGIN && $_SESSION['admin'] == 1);
        //超级管理员
        defined("IS_SUPER_ADMIN") 	or define("IS_SUPER_ADMIN",IS_LOGIN && (strtolower(C("WEB_MASTER")) == strtolower($_SESSION['username']) || $_SESSION['rid']==1));
        //是否锁定
        defined('IS_LOCK')			or define('IS_LOCK',IS_LOGIN && $_SESSION['user_state']==1 && $_SESSION['lock_end_time']<time());
        //数据缓存目录 栏目|模型|节点|角色
        define('CACHE_DATA_PATH','data/cache/Data/');
		//表字段缓存
		define("CACHE_FIELD_PATH", 'data/cache/Field/');
		//Flag模型属性缓存（推荐、置顶）
		define("CACHE_FLAG_PATH", 'data/cache/Flag/');
		//常用菜单缓存
		define('CACHE_MENU_PATH', 'data/cache/Menu/');
		//文章缓存
		define("CACHE_CONTENT_PATH", 'data/cache/Content/');
		//模板目录
        defined("__TEMPLATE__") or define("__TEMPLATE__", __ROOT__ . "/template/" . C("WEB_STYLE"));
	}

	//验证安装
	public function check_install() {
		if (is_dir('install') && !file_exists('install/lock.php')) {
			echo "<script>
                top.location.href='install/';
            </script>";
			exit ;
		}
	}

}

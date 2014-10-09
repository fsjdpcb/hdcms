<?php

/**
 * 应用开始事件处理类
 * Class AppStartEvent
 * @author 向军 <houdunwangxj@gmail.com>
 */
class AppInitHook
{
    //运行钓子
    public function run(&$options)
    {
        //检测安装
        if (!file_exists(APP_PATH . 'Install/Lock.php')) {
            if (MODULE != 'Install') {
                go(U('Install/Index/index'));
            }
        } else {
            $this->UserSessionInit(); //初始用户session
            $this->defineConst(); //定义常量
            $this->loadAddons(); //加载插件
        }
    }

    //初始会员session
    private function UserSessionInit()
    {
        if (!isset($_SESSION['user'])) {
            $_SESSION['user'] = array();
            $_SESSION['user']['web_master'] = false; //超级管理员
            $_SESSION['user']['uid'] = 0; //会员uid
            $_SESSION['user']['rid'] = 4; //角色rid
            $_SESSION['user']['admin'] = 0; //管理员
            $_SESSION['user']['icon'] = __ROOT__ . '/HDCMS/Static/image/user.png'; //头像
        }
    }

    //声明常量
    private function defineConst()
    {
        define("__TEMPLATE__", __ROOT__ . "/Template/" . C("WEB_STYLE"));
    }

    //加载系统插件
    private function loadAddons()
    {
        $data = S('hooks');
        if (!$data || DEBUG) {
            $hooks = M('hooks')->getField('name,addons', true);
            foreach ($hooks as $key => $value) {
                if ($value) {
                    $map['status'] = 1;
                    $names = explode(',', $value);
                    $map['name'] = array('IN', $names);
                    $data = M('addons')->where($map)->getField('id,name');
                    if ($data) {
                        $addons = array_intersect($names, $data);
                        Hook::add($key, $addons);
                    }
                }
            }
            S('hooks', Hook::get());
            //插件标签
            $tpl_tags = array();
            $data = M('addons')->getField('id,name');
            if ($data) {
                foreach ($data as $addon) {
                    if (is_file("HDCMS/Addons/{$addon}/Tag/Addon{$addon}Tag.class.php")) {
                        $tpl_tags[] = "@.Addons.{$addon}.Tag.Addon{$addon}Tag";
                    }
                }
            }
            S('HookTag', array_unique($tpl_tags));
            C('TPL_TAGS', array_unique(array_merge(C('TPL_TAGS'), S('HookTag'))));
        } else {
            Hook::import($data, false);
            C('TPL_TAGS', array_unique(array_merge(C('TPL_TAGS'), S('HookTag'))));
        }
    }
}
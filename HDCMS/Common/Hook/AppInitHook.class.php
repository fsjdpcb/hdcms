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
            $this->defineConst(); //定义常量
            $this->loadAddons(); //加载插件
        }
    }

    //声明常量
    private function defineConst()
    {
        define("__TEMPLATE__", __ROOT__ . "/template/" . C("WEB_STYLE"));
    }

    //加载系统插件
    private function loadAddons()
    {
        $data = S('hooks');
        if (!$data) {
            $hooks = M('Hooks')->getField('name,addons', true);
            foreach ($hooks as $key => $value) {
                if ($value) {
                    $map['status'] = 1;
                    $names = explode(',', $value);
                    $map['name'] = array('IN', $names);
                    $data = M('Addons')->where($map)->getField('id,name');
                    if ($data) {
                        $addons = array_intersect($names, $data);
                        Hook::add($key, $addons);
                    }
                }
            }
            S('hooks', Hook::get());
            //插件标签
            $tpl_tags = array();
            $data = M('Addons')->getField('id,name');
            if ($data) {
                foreach ($data as $addon) {
                    if (is_file("HDCMS/Addons/{$addon}/Tag/{$addon}Tag.class.php")) {
                        $tpl_tags[] = "@.Addons.{$addon}.Tag.{$addon}Tag";
                    }
                }
            }
            S('HookTag', array_unique($tpl_tags));
        } else {
            Hook::import($data, false);
            C('TPL_TAGS', array_unique(array_merge(C('TPL_TAGS'), S('HookTag'))));
        }
    }
}
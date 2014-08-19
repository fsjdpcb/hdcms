<?php

/**
 * 应用开始事件处理类
 * Class AppStartEvent
 * @author 向军 <houdunwangxj@gmail.com>
 */
class AppInitHook{
	public function run(&$options) {
        if(isset($_GET['admin'])){
            header("location:index.php?m=admin");exit;
        }
        $data = S('hooks');
        if(!$data){
            $hooks = M('Hooks')->getField('name,addons',true);
            foreach ($hooks as $key => $value) {
                if($value){
                    $map['status']  =   1;
                    $names          =   explode(',',$value);
                    $map['name']    =   array('IN',$names);
                    $data = M('Addons')->where($map)->getField('id,name');
                    if($data){
                        $addons = array_intersect($names, $data);
                        Hook::add($key,$addons);
                    }
                }
            }
            S('hooks',Hook::get());
        }else{
            Hook::import($data,false);
        }
        //--------------安装检测--------------
//        if (!file_exists('install/lock.php')) {
//            echo "<script>
//                top.location.href='install/';
//            </script>";
//            exit ;
//        }
	}

}

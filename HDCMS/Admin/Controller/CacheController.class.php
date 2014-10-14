<?php

/**
 * 更新缓存
 * @author hdxj <houdunwangxj@gmail.com>
 */
class CacheController extends AuthController
{
    public function updateCache()
    {
        $actionCache = S('updateCacheAction');
        if ($actionCache) {
            while ($action = array_shift($actionCache)) {
                switch ($action) {
                    case "Config" :
                        $Model = K("Config");
                        $Model->updateCache();
                        $message = '网站配置更新完毕...';
                        break;
                    case "Model" :
                        $Model = K("Model");
                        $Model->updateCache();
                        $message = '模型更新完毕...';
                        break;
                    case "Field" :
                        $ModelCache = S("model");
                        foreach ($ModelCache as $mid => $data) {
                            $_REQUEST['mid'] = $mid;
                            $Model = new FieldModel();
                            $Model->updateCache($mid);
                        }
                        $message = '字段更新完毕...';
                        break;
                    case "Category" :
                        $Model = K('Category');
                        $Model->updateCache();
                        $message = '栏目更新完毕...';
                        break;
                    case "Node" :
                        $Model = K("Node");
                        $Model->updateCache();
                        $message = '栏目更新完毕...';
                        break;
                    case "Role" :
                        $Model = K("Role");
                        $Model->updateCache();
                        $message = '角色更新完毕...';
                        break;
                    case "Flag" :
                        $ModelCache = S("model");
                        foreach ($ModelCache as $mid => $data) {
                            $_REQUEST['mid'] = $mid;
                            $Model = new FlagModel();
                            $Model->updateCache();
                        }
                        $message = 'Flag属性更新完毕...';
                        break;
                }
                S('updateCacheAction',$actionCache);
                $this->success($message, U('updateCache'), 0);
            }
        } else {
            $this->success('缓存更新成功...<script>setTimeout(function(){top.location.reload(true)},1000);</script>', U('index'),5);
        }
    }

    //结束
    public function index()
    {
        if (IS_POST) {
            is_file(TEMP_PATH . '~Boot.php') && unlink(TEMP_PATH . '~Boot.php');
            Dir::del('Temp/Compile');
            Dir::del('Temp/Content');
            Dir::del('Temp/Table');
            //缓存更新动作
            S('updateCacheAction', $_POST['Action']);
            $this->success('准备更新...', U('updateCache', array('action' => 'Config')), 1);
        } else {
            $this->display();
        }
    }

}

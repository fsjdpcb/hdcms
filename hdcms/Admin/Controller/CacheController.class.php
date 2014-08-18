<?php

/**
 * 更新缓存
 * @author hdxj <houdunwangxj@gmail.com>
 */
class CacheController extends AuthController
{
    public function updateCache()
    {
        $ActionCache = S('updateCache');
        if ($ActionCache) {
            $action = array_shift($ActionCache);
            S('updateCache', $ActionCache);
            switch ($action) {
                case "Config" :
                    $Model = K("Config");
                    $Model->updateCache();
                    $this->success('网站配置更新完毕...', U("updateCache"), 0);
                    break;
                case "Model" :
                    $Model = K("Model");
                    $Model->updateCache();
                    $this->success('模型更新完毕...', U("updateCache"), 0);
                    break;
                case "Field" :
                    $ModelCache = S("model");
                    foreach ($ModelCache as $mid => $data) {
                        $_REQUEST['mid'] = $mid;
                        $Model = new FieldModel();
                        $Model->updateCache($mid);
                    }
                    $this->success('字段更新完毕...', U("updateCache"), 0);
                    break;
                case "Category" :
                    $Model = K('Category');
                    $Model->updateCache();
                    $this->success('栏目更新完毕...', U("updateCache"), 0);
                    break;
                case "Node" :
                    $Model = K("Node");
                    $Model->updateCache();
                    $this->success('权限节点更新完毕...', U("updateCache"), 0);
                    break;
                case "Table" :
                    Dir::del('temp/Table');
                    $this->success('数据表更新完毕...', U("updateCache"), 0);
                    break;
                case "Role" :
                    $Model = K("Role");
                    $Model->updateCache();
                    $this->success('角色更新完毕...', U("updateCache"), 0);
                    break;
                case "Flag" :
                    $ModelCache = S("model");
                    foreach ($ModelCache as $mid => $data) {
                        $_REQUEST['mid'] = $mid;
                        $Model = new FlagModel();
                        $Model->updateCache();
                    }
                    $this->success('Flag更新完毕...', U("updateCache"), 0);
                    break;
            }
        } else {
            Dir::del('Compile');
            $this->success('缓存更新成功...', U('index'), 0);
        }
    }

    //结束
    public function index()
    {
        if (IS_POST) {
            $Action = Q('Action');
            S("updateCache", $Action);
            $this->success('准备更新...', U('updateCache'), 1);
        } else {
            $this->display();
        }
    }

}

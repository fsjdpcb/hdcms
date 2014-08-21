<?php

/**
 * 网站配置模型
 * Class ConfigModel
 * @author hdxj <houdunwangxj@gmail.com>
 */
class ConfigModel extends Model
{
    public $table = "config";

    //删除配置
    public function delConfig($id)
    {
        $this->del($id);
        return $this->updateCache();
    }

    //添加配置
    public function addConfig()
    {
        Q('post.name', '', 'strtoupper');
        //验证变量名
        if (M('config')->find(array('name' => $_POST['name']))) {
            $this->error = '变量名已经存在';
            return false;
        }
        $this->add();
        return $this->updateCache();
    }

    //修改配置文件
    public function saveConfig()
    {
        $configData=$_POST;
        if (!is_array($configData)) {
            $this->error = '数据不能为空';
            return false;
        }
        //上传文件大小
        if (intval($configData['ALLOW_SIZE']) < 100000) {
            $this->error = '上传文件大小不能小于100KB';
            return false;
        }
        //允许上传类型
        if (empty($configData['ALLOW_TYPE'])) {
            $this->error = '允许上传类型不能为空';
            return false;
        }
        $order_list = $configData['order_list'];
        unset($configData['order_list']);
        $configData = array_change_key_case_d($configData, 1);
        foreach ($configData as $name => $value) {
            $name = strtoupper($name);
            $this->where(array('name' => $name))->save(array('name' => $name, 'value' => $value, 'order_list' => $order_list[$name]));
        }
        return $this->updateCache();
    }

    //更新配置文件
    public function updateCache()
    {
        $configData = $this->order('order_list ASC')->all();
        $data = array();
        foreach ($configData as $c) {
            $name = strtoupper($c['name']);
            $data[$name] = $c['value'];
        }
        //写入配置文件
        $content = "<?php if (!defined('HDPHP_PATH')) exit; \nreturn " . var_export($data, true) . ";\n?>";
        return file_put_contents(APP_CONFIG_PATH."config.inc.php", $content);
    }
}
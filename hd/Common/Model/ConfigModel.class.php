<?php
/**
 * 权限模型
 * Class AccessModel
 * @author hdxj <houdunwangxj@gmail.com>
 */
class ConfigModel extends Model {
	public $table = "config";
	//修改配置文件
	public function saveConfig($configData) {
		if (!is_array($configData)) {
			$this -> error = '数据不能为空';
			return false;
		}
		$configData =array_change_key_case_d($configData,1);
		foreach ($configData AS $name => $value) {
			$this -> where(array('name' => $name)) -> save(array('name' => $name,'value' => $value));
		}
		return $this -> updateCache();
	}
	//更新配置文件
	public function updateCache() {
		$configData = $this -> order('order_list ASC') -> all();
		$data = array();
		foreach ($configData as $c) {
			$name = strtoupper($c['name']);
			$data[$name] = $c['value'];
		}
		//写入配置文件
		$content = "<?php if (!defined('HDPHP_PATH')) exit; \nreturn " . var_export($data, true) . ";\n?>";
		return file_put_contents("data/config/config.inc.php", $content);
	}

}

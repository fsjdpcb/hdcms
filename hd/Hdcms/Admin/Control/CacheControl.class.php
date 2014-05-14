<?php
/**
 * 更新缓存
 * @author hdxj <houdunwangxj@gmail.com>
 */
class CacheControl extends AuthControl {
	public function updateCache() {
		$action =Q('Action','Config');
		switch($action){
			case "Config":
				$Model = K("Config");
				$Model->updateCache();
				$this->success('网站配置更新完毕...',U("updateCache",array('Action'=>'Model')),0);
				break;
			case "Model":
				$Model = K("Model");
				$Model->updateCache();
				$this->success('模型更新完毕...',U("updateCache",array('Action'=>'Field')),0);
				break;
			case "Field":
				$Model = new ModelFieldModel(1);
				$ModelCache=cache("model");
				foreach($ModelCache as $mid=>$data){
					$Model->updateCache($mid);
				}
				$this->success('字段更新完毕...',U("updateCache",array('Action'=>'Category')),0);
				break;
			case "Category":
				$Model = K("Category");
				$Model->updateCache();
				$this->success('栏目更新完毕...',U("updateCache",array('Action'=>'Node')),0);
				break;
			case "Node":
				$Model = K("Node");
				$Model->updateCache();
				$this->success('权限节点更新完毕...',U("updateCache",array('Action'=>'Role')),0);
				break;
			case "Role":
				$Model = K("Role");
				$Model->updateCache();
				$this->success('角色更新完毕...',U("updateCache",array('Action'=>'Flag')),0);
				break;
			case "Flag":
				$Model = new FlagModel(1);
				$ModelCache=cache("model");
				foreach($ModelCache as $mid=>$data){
					$Model->updateCache($mid);
				}
				$this->success('Flag更新完毕...',U("updateCache",array('Action'=>'DelFile')),0);
				break;
			case 'DelFile':
				Dir::del('temp');
				$this->success('缓存文件更新完毕...',U("updateCache",array('Action'=>'End')),0);
				break;
			case 'End':
				$this -> success('缓存更新成功', U('index'),0);
				break;
		}
	}
	//结束
	public function index() {
		$this->display();
	}

}

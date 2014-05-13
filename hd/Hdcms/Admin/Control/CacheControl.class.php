<?php
/**
 * 更新缓存
 * @author hdxj <houdunwangxj@gmail.com>
 */
class CacheControl extends AuthControl {
	public function updateCache() {
		if ($begin = Q('get.begin')) {
			$cache = array('Model' => '内容模型', 'Config' => '网站配置', 'Category' => '网站栏目', 'Node' => '权限节点', 'Role' => '角色');
			F('updateCache', $cache);
			$this -> success('初始化完成...', __METH__,0);
		} else {
			$cache = F('updateCache');
			if (!$cache) {
				$this -> success('缓存更新完毕', U('index'),0);
			} else {
				$Name = key($cache);
				$Title = current($cache);
				$Model = K($Name);
				if ($Model -> updateCache()) {
					unset($cache[$Name]);
					F('updateCache', $cache);
					$this -> success('['.$Title . ']缓存更新成功', __METH__,0);
				}
			}
		}
	}

	//结束
	public function index() {
		$this->display();
	}

}

<?php
/**
 * 验证栏目权限
 * @param int $cid 栏目cid
 * @param strint @action 动作 [add,edit,del,order,move,audit]
 */
function check_category_access($cid,$action){
		//当前栏目缓存数据
		$category = cache('category');
    	$cat = $category[$cid];
    	$action = strtolower($action);
    	//管理员,站长或栏目没有设置权限控制时验证通过
       if($_SESSION['rid']==1 || $_SESSION['WEB_MASTER']){
       		return true;     		
       }else if(!in_array($action,array('add','edit','del','order','move','audit'))){
       		return true;
       }else if(empty($cat['access']['admin'])){
       		return true;
       }else{
       		$access = $cat['access']['admin'];
       		$rid = $_SESSION['rid'];
       		if(!isset($access[$rid]))return false;
	        switch ($action) {
	            case 'add':
	            	if($access[$rid]['add']==0)
	            		return false;
	                break;
	            case 'edit':
	            	if($access[$rid]['edit']==0)
	            		return false;
	                break;
	            case 'del':
	            	if($access[$rid]['del']==0)
	            		return false;
	                break;
	           	case 'order':
	           		if($access[$rid]['order']==0)
	            		return false;
	                break;
	           	case 'move':
	           		if($access[$rid]['move']==0)
	            		return false;
	                break;
	            case 'audit':
	            	if($access[$rid]['audit']==0)
	            		return false;
	            	//审核
	                break;
	        }
	        return true;
    	}
}
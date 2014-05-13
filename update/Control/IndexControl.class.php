<?php
//测试控制器类
class IndexControl extends Control{
    public function index(){
       $this->display();
    }
    //执行更新
    public function update(){
    	$this->UpdateDatabase();
    	$this->UpdateFiles();
    }
    //数据表
    private function UpdateDatabase(){
    	$sqlFile = require 'data/sql.sql';
    	if(is_file($sqlFile)){
    		$sqlData = file_get_contents($sqlFile);
		$Model = M();
		if ($Model -> runSql($zhubiaoSql) === false) {
			$this->error('更新失败!',U('index'));
		}
    	}
    	return true;
    }
    //文件
    private function UpdateFiles(){
    	return true;
    }
}
?>
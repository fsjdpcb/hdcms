<?php
class VersionControl extends Control {
	//验证HDCMS版本状态
	public function checkVersion() {
		C(require 'hd/Common/Config/version.php');
		$ServerVersion = str_replace('.', '', C('HDCMS_VERSION'));
		$ClientVersion = str_replace('.', '', $_GET['version']);
		if ($ServerVersion > $ClientVersion) {
			$url = 'http://www.hdphp.com';
			$message = "HDCMS有更新！最新版本" . C('HDCMS_VERSION') . "<br/>";
			$message .= "<a href='$url' target='_blank' style='color:red;font-size:14px;'>立即获取</a>";
			$script="checkVersion(\"$message\")";
			echo $script;exit;
		}
	}

}

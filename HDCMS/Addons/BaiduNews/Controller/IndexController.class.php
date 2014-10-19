<?php
/**
 * BaiduNews 插件
 * @author 后盾向军 <houdunwangxj@gmail.com>
 */

class IndexController extends AddonController {

    public function index() {
        go(__ROOT__.'/HDCMS/Addons/BaiduNews/Data/baidunews.xml');
    }
}
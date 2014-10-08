<?php

/**
 * 广告管理模型
 * Class AdModel
 * @author 后盾网向军 <2300071698@qq.com>
 */
class AdModel extends ViewModel
{
    public $table = 'addon_advertising_ad';
    public $view = array(
        'addon_advertising_ad' => array('_type' => 'INNER'),
        'addon_advertising_postion' => array('_on' => 'addon_advertising_ad.posid=addon_advertising_postion.posid')
    );
}
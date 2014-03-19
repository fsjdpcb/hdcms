<?php
if (!defined("HDPHP_PATH")) exit;


/**
 * 获取指定栏目的所有子栏目（包含栏目本身）
 * @param $cid 栏目cid
 * @return array
 */
function get_son_category($cid)
{
    $data = array();
    $cid = explode(',', $cid);
    foreach ($cid as $id) {
        $data[] = $id;
        $son_category = Data::channelList(F('category'), intval($id));
        if ($son_category) {
            foreach ($son_category as $c) {
                $data[] = $c['cid'];
            }
        }
    }
    return $data;
}


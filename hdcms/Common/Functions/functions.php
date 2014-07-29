<?php
/**
 * 获得栏目
 * @param $cid 栏目cid
 * @param int $type 1 子栏目  2 父栏目
 * @param int $return 1 只有cid  2 内容
 * @return array
 */
function getCategory($cid, $type = 1, $return = 1)
{
    $cid=intval($cid);
    $cache = F('category',false,CACHE_DATA_PATH);
    $cat = $catid = array();
    if ($type == 1) { //子栏目
        $cat = Data::channelList($cache, $cid);
    } else if ($type == 2) { //父栏目
        $cat = parentChannel($cache, $cid);
    }
    if ($return == 1) { //返回cid
        foreach ($cat as $c) {
            $catid[] = $c['cid'];
        }
        $catid[] = $cid;
        return $catid;
    } else if ($return == 2) { //返回所有栏目数据
        $cat[] = $cache[$cid];
    }
    return $cat;
}

<?php
/**
 * 截取长度
 */
function hd_substr($v, $len = 20, $end = '...')
{
    return mb_substr($v, 0, $len, 'utf-8') . $end;
}
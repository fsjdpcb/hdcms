<?php

/**
 * 前面页面Script调用的登录框
 * Class UserControl
 */
class MemberControl extends CommonControl
{
    //显示会员登录框
    public function Member()
    {
        $con = preg_replace('@\n|\r@','',($this->fetch()));
        echo "document.write('$con');";
        exit;
    }
}
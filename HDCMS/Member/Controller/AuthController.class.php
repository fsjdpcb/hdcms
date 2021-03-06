<?php

/**
 * 会员中心基类
 * Class AuthController
 * @author 后盾向军 <houdunwangxj@gmail.com>
 */
class AuthController extends Controller
{
    public function __construct()
    {
        if (!$_SESSION['user']['uid']) {
            go('Login/login');
        }
        //会员中心关闭
        if(!C('MEMBER_OPEN')){
            $this->success('会员中心暂时关闭....',__ROOT__,3);
        }
        parent::__construct();
    }
}
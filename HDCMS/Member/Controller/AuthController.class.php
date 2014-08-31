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
        if (!session('user')) {
            go('Login/login');
        }
        parent::__construct();
    }
}
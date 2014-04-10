<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>锁定会员</title>
    <hdjs/>
    <js file="__CONTROL_TPL__/js/edit.js"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="{|U:'User/index'}">会员列表</a></li>
            <li><a href="javascript:;" class="action">锁定会员</a></li>
        </ul>
    </div>
    <div class="title-header">锁定会员</div>
    <form method="post" class="hd-form" onsubmit="return hd_submit(this,'{|U:'User/index'}')">
        <input type="hidden" name="uid" class="w300" value="{$field.uid}"/>
        <table class="table1">
            <tr>
                <th class="w100">用户名</th>
                <td>
                    {$field.username}
                </td>
            </tr>
            <tr>
                <th class="w100">昵称</th>
                <td>
                    {$field.nickname}
                </td>
            </tr>
            <tr>
                <th class="w100">锁定期限</th>
                <td>
                    <label>
                        <input type="radio" name="lock_end_time" value="9999999999"/> 永久锁定&nbsp;&nbsp;
                    </label>
                    <label>
                        <input type="radio" name="lock_end_time" value="<?php echo time()+30*3660;?>"/> 一个月
                    </label>&nbsp;&nbsp;
                    <label>
                        <input type="radio" name="lock_end_time" value="<?php echo time()+3*30*3660;?>"/> 三个月
                    </label>&nbsp;&nbsp;
                    <label>
                        <input type="radio" name="lock_end_time" value="0" checked="checked"/> 不锁定
                    </label>
                </td>
            </tr>
            <tr>
                <th class="w100">禁止IP访问</th>
                <td>
                    <label>
                        <input type="checkbox" name="deny_ip" value="<?php echo ip_get_client();?>"/> 是
                    </label>
                </td>
            </tr>

        </table>
        <div class="position-bottom">
            <input type="submit" value="确定" class="hd-success"/>
        </div>
    </form>
</div>
</body>
</html>
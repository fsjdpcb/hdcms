<include file="__PUBLIC__/header.php"/>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="{|U:'index'}" class="action">会员列表</a></li>
            <li><a href="{|U:'add'}">添加会员</a></li>
        </ul>
    </div>
    <table class="table2 hd-form">
        <thead>
        <tr>
            <td class="w30">uid</td>
            <td>昵称</td>
            <td class="w200">帐号</td>
            <td CLASS="W300">会员组</td>
            <td class="w150">登录时间</td>
            <td class="w100">注册IP</td>
            <td class="w100">最近登录IP</td>
            <td class="w100">积分</td>
            <td class="w150">操作</td>
        </tr>
        </thead>
        <list from="$data" name="d">
            <tr>
                <td>{$d.uid}</td>
                <td>{$d.nickname}</td>
                <td>{$d.username}</td>
                <td>{$d.rname}</td>
                <td>{$d.logintime|date:'Y-m-d H:i:s',@@}</td>
                <td>{$d.regip}</td>
                <td>{$d.lastip}</td>
                <td>{$d.credits}</td>
                <td>
                    <if value="$d.username eq C('WEB_MASTER')">
                        修改 | 锁定 | 删除
                    <else>
                        <a href="{|U:'edit',array('uid'=>$d['uid'])}">修改</a>
                        <span class="line">|</span>
                        <?php if($d['lock_end_time']<time()){?>
                            <a href="javascript:;" onclick="hd_ajax('{|U:'lock'}',{uid:{$d['uid']},lock:1})">
                            锁定</a>
                        <?php }else{?>
                            <a href="javascript:;" onclick="hd_ajax('{|U:'lock'}',{uid:{$d['uid']},lock:0})">
                                <font color="red">解锁</font>	</a>
                        <?php }?>
                        <span class="line">|</span>
                        <a href="{|U:'del',array('uid'=>$d['uid'])}">删除</a>
                    </if>
                </td>
            </tr>
        </list>
    </table>
    <div class="h60"></div>
</div>
</body>
</html>
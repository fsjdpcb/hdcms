/**
 * 会员登录处理类
 * @type {{create_element: create_element, show: show, close: close}}
 */
var login = {
    /**
     * 创建登录div
     */
    create_element: function () {
        if ($("#login_window").length > 0) {
            //隐藏背景
            $("div#login_window_bg").show();
            //隐藏登录框
            $("div#login_window").show();
        } else {
            var html = '<div id="login_window">\
                <span id="close_login_window" onclick="login.close()">x</span>\
                <div class="error-pop"></div>\
                <div class="login_title">\
                    <a href="?a=Login&c=Login&m=reg&g=Member">注册帐号</a>\
                    <span>登录</span>\
                    </div>\
                        <div class="login_form">\
                            <form id="formLogin" method="post">\
                                <div>\
                                    <input type="text" name="username" id="username" class="input-text"\
                                    style="width: 100%; padding-left: 10px;"\
                                    placeholder="用户名/邮箱"/>\
                                </div>\
                                <div>\
                                    <input type="password" name="password" class="input-text" id="password"\
                                    style="width: 100%; padding-left: 10px;" placeholder="密码"/>\
                                </div>\
                                <input type="submit" class="my-btn-submit" value="登录"/>\
                            </form>\
                        </div>\
                    </div>\
                <div id="login_window_bg">\
                </div>';
            $("body").append(html);
        }
    },
    /**
     * 前台应用JS
     */
    show: function () {
        //创建登录div
        this.create_element();
        //会员登录
        $("#formLogin").submit(function () {
            //隐藏信息提示div
            $('div.error-pop').hide();
            //验证用户名
            var url = '?a=Login&c=Login&m=login&g=Member';
            $.post(url, $(this).serialize(), function (data) {
                if (data == 'success') {
                    login.close();
                } else {
                    $('div.error-pop').show().html(data);
                }
            }, 'json')
            return false;
        })
    },
    /**
     * 隐藏登录框
     */
    close: function () {
        //隐藏背景
        $("div#login_window_bg").hide();
        //隐藏登录框
        $("div#login_window").hide();
    }
}
//加入收藏
function add_favorite(mid, cid, aid) {
    $.post('index.php?a=Index&c=Article&m=add_favorite', {mid: mid, cid: cid, aid: aid}, function (data) {
        if (data.state == 1) {
            alert('添加成功!');
        } else {
            alert('添加失败');
        }
    }, 'json');
}
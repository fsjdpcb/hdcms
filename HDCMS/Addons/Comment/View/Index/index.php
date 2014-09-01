<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{$hd.config.webname}</title>
    <css file="__CONTROLLER_VIEW__/css/css.css"/>
    <jquery/>
</head>
<body onload="iframe_height()">
<div id="wrap">
    <div class="hd-comment">
        <form action="{|U:'addComment'}" method="post" onsubmit="return on_submit()">
            <div class="send">
                <h5>
                    <strong>我来说两句</strong>
            <span>
                已有<font color="#FF0000">{$count}</font>条评论
            </span>
                </h5>

                <div class="posn">
                    我的态度：
                    <label>
                        <input type="radio" name="direction" value="1">
                        <img src="__CONTROLLER_VIEW__/image/zheng.png">
                    </label>
                    <label>
                        <input type="radio" name="direction" value="2">
                        <img src="__CONTROLLER_VIEW__/image/fan.png">
                    </label>
                    <label>
                        <input type="radio" name="direction" value="3" checked="">
                        <img src="__CONTROLLER_VIEW__/image/zhong.png">
                    </label>
                </div>
                <input type="hidden" name="mid" value="{$hd.get.mid}"/>
                <input type="hidden" name="cid" value="{$hd.get.cid}"/>
                <input type="hidden" name="aid" value="{$hd.get.aid}"/>
                <input type="hidden" name="reply" value="0"/>
                <textarea name="content"></textarea>

                <div class="btn-submit">
                    <input type="submit" value="发表"/>
                </div>

                <div class="hd-comment-login">
                    <if value="$hd.session.user">
                        {$hd.session.user.username} <a href="__ROOT__/index.php?m=Member&c=Login&a=out">退出</a>
                        <else>
                            <a href="__ROOT__/index.php?m=Member&c=Login&a=login">登录</a> <span> | </span>
                            <a href="__ROOT__/index.php?m=Member&c=Login&a=reg">注册</a>
                            <span style="color:red">需要登陆才可发布评论</span>
                    </if>
                </div>
            </div>
        </form>
        <if value="$data">
            <div class="comment-list">
                <list from="$data" name="$d">
                    <h5>
                        <if value="$d.direction eq 1">
                            <img src="__CONTROLLER_VIEW__/image/zheng.png">
                        </if>
                        <if value="$d.direction eq 2">
                            <img src="__CONTROLLER_VIEW__/image/fan.png">
                        </if>
                        <if value="$d.direction eq 3">
                            <img src="__CONTROLLER_VIEW__/image/zhong.png">
                        </if>
                        {$d.username} <span class="time">({$d.create_time|date:"Y-m-d H:i",@@} )</span>
                    </h5>

                    <div class="comment-content" id="{$d.comment_id}">
                        {$d.content}
                        <div class="comment-reply">
                            <a href="javascript:void(0)" onclick="reply({$d.comment_id})">回复</a>
                        </div>
                        <div class="reply" id="reply-{$d.comment_id}">
                            <form action="{|U:'addComment',array('comment_id'=>$d['comment_id'])}" method="post"
                                  onsubmit="return on_submit()">
                                <input type="hidden" name="mid" value="{$hd.get.mid}"/>
                                <input type="hidden" name="cid" value="{$hd.get.cid}"/>
                                <input type="hidden" name="aid" value="{$hd.get.aid}"/>
                                <textarea name="content"></textarea>

                                <div class="btn-submit">
                                    <input type="submit" value="发表"/>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="line"></div>
                </list>
            </div>
            <div class="page1">
                {$page}
            </div>
        </if>
    </div>
</div>
<script>
    function reply(comment_id) {
        var div = '#reply-' + comment_id;//回复文本框
        if ($(div + ':hidden').length) {
            $(div).show();
        } else {
            $(div).hide();
        }
        iframe_height();
    }
    function on_submit() {
        iframe_height(150);
    }
    function iframe_height(height) {
        var height = height ? height : $('#wrap').outerHeight(true);
        $(top.document).find('#comment_iframe').css('height', height + 50);
    }
</script>
</body>
</html>
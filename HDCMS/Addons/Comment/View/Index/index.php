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
    <div class="top-menu">
        <a href="__ROOT__">返回首页</a> |
        <a href="__WEB__?m=Index&c=Index&a=content&mid={$hd.get.mid}&cid={$hd.get.cid}&aid={$hd.get.aid}">查看文章</a>
    </div>
    <div class="hd-comment">

        <form action="{|U:'addComment'}" method="post" onsubmit="return on_submit()">
            <div class="send">
                <if value="!$hd.const.IS_LOGIN && !C('ADDON.TOURISTS_COMMENT')">
                    <div class="user-nologin">需要<a href="__WEB__?m=Member&c=Login&a=login" target="_blank">登录</a>
                        后方可回复，如果你还没有账号你可以<a href="__WEB__?m=Member&c=Login&a=reg" target="_blank" >注册</a>一个账号。</div>
                </if>
            <h5>
                    <strong>已有{$count}条评论</strong>
                    <span>
                        <a href="__URL__" target="_blank">查看所有评论</a>
                    </span>
            </h5>
                <if value="$hd.const.IS_LOGIN || C('ADDON.TOURISTS_COMMENT')">
                    <if value="C('ADDON.VOTE')">
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
                    </if>
                    <input type="hidden" name="mid" value="{$hd.get.mid}"/>
                    <input type="hidden" name="cid" value="{$hd.get.cid}"/>
                    <input type="hidden" name="aid" value="{$hd.get.aid}"/>
                    <input type="hidden" name="reply" value="0"/>
                    <textarea name="content"></textarea>

                    <div class="btn-submit">
                        <input type="submit" value="发表"/>
                    </div>

                    <div class="hd-comment-login">
                        <if value="$hd.const.IS_LOGIN">
                            {$hd.session.user.username} <a href="__ROOT__/index.php?m=Member&c=Login&a=out">退出</a>
                        </if>
                    </div>
                </if>
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
                            <if value="$hd.const.IS_LOGIN || C('ADDON.TOURISTS_COMMENT')">
                            <a href="javascript:void(0)" onclick="reply({$d.comment_id})">回复</a>
                                </if>
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
    if(top==window){
        $(".top-menu").show();
    }
</script>
</body>
</html>
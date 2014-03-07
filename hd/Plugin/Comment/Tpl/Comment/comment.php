<?php //评论列表(用于Ajax加载评论使用模板);?>
<list from="$comment" name="$c">
    <div id="comment-1" class="answer-item">
        <!--头像-->
        <div class="ans-user">
            <a class="user" href="/user/460">
                <img src="__ROOT__/{$c.favicon}">
            </a>
        </div>
        <!--头像-->
        <!--评论内容-->
        <div class="ans-con">
            <div class="con-hd">
                <a href="/user/460">{$c.from_username}</a>
                <span style="color:#999;margin-right:10px;">{$c.pubtime|date_before}</span>
                <a class="reply" href="javascript:;">回复</a>
            </div>
            <div class="con-bd">
                <p>
                    {$c.content}
                </p>
            </div>
            <!--回复-->

            <div class="con-comments hidden" data-answer-id="722">
                <div class="comment-list" data-answer-id="722"></div>
                <div class="ans-user">
                    <a class="user" href="/user/460">
                        <img src="http://tp2.sinaimg.cn/1778942741/50/5644924815/1">
                    </a>
                </div>
                <div class="comment-publish">
                    <div class="comment-reply-con">
                        <textarea class="comment-content input-block-level" data-answer-id="722"
                                  placeholder="我也来说两句"></textarea>
                    </div>
                    <div class="btn btn-success btn-sm" data-answer-id="722">提交评论</div>
                </div>
            </div>
            <!--回复-->
            <!--回复列表-->
            <if value="$c._reply">
            <div class="con-comments" data-answer-id="714">
                <list from="$c._reply" name="$r">
                    <div class="comment-item clearfix">
                        <div class="con">
                                    <span class="author vcard item">
                                    <a class="value url fn" href="/user/264" rel="author">{$r.from_username}</a>
                                    <if value="$r.to_username">
                                        @ <a class="value url fn" href="/user/264" rel="author">{$r.to_username}</a>
                                    </span>
                                    </if>：
                            <span class="content">{$r.content}</span>
                            <span class="time">{$c.pubtime|date_before}</span>
                            <span class="action">
                                <a href="javascript:;" class="reply">回复</a>
                            </span>
                        </div>
                        <!--回复-->
                        <div class="con-comments hidden" data-answer-id="722">
                            <div class="comment-list" data-answer-id="722"></div>
                            <div class="ans-user">
                                <a class="user" href="/user/460">
                                    <img src="http://tp2.sinaimg.cn/1778942741/50/5644924815/1">
                                </a>
                            </div>
                            <div class="comment-publish">
                                <div class="comment-reply-con">
                                    <textarea class="comment-content input-block-level" placeholder="我也来说两句"></textarea>
                                </div>
                                <div class="btn btn-success btn-sm" data-answer-id="722">提交评论</div>
                            </div>
                        </div>
                        <!--回复-->
                    </div>
                </list>
            </div>
            </if>
        </div>
    </div>
</list>
<!--评论内容-->
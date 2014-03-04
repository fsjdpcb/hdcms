<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title><?php echo $hdcms['title'];?></title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/../hdjs/jquery-1.8.2.min.js'></script>

    <link href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"><script src="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/js/bootstrap.min.js"></script>
  <!--[if lte IE 6]>
  <link rel="stylesheet" type="text/css" href="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/ie6/css/bootstrap-ie6.css">
  <![endif]-->
      <!--[if lt IE 9]>
<script type="text/javascript" src="http://localhost/hdphp/hdphp/Extend/Org/bootstrap/html5shiv.js"></script>
<![endif]-->
    <link rel="stylesheet" href="http://localhost/hdcms/template/hdphp/css/article.css"/>
    <link rel="stylesheet" href="http://localhost/hdcms/template/hdphp/css/comment.css"/>
</head>
<body>


<div id="top">
    <div class="nav">
        <ul class="site-nav">
                        <?php
            $nid='';
            $db = M('navigation');
            if($nid){
                $db->where='nid IN('.$nid.')';
            }
            $result = $db->order('list_order ASC,nid DESC')->where('state=1')->all();
            if($result):
                foreach($result as $field):
                  $field['url']=str_ireplace('[ROOT]','http://localhost/hdcms',$field['url']);
                  $field['link']='<a href="'.$field['url'].'" target="'.$field['target'].'">'.$field['title'].'</a>';
                ?>
                <li>
                    <a href='<?php echo $field['url'];?>'><?php echo $field['title'];?></a>
                </li>
            <?php endforeach;endif;?>
        </ul>
        <ul class="log">
            <li>
                <a id="login-link" href="http://segmentfault.com/user/login">登录</a>
            </li>
            <li>
                <a href="http://segmentfault.com/user/register">注册</a>
            </li>
        </ul>
    </div>
</div>
<!--顶部-->
<div id="wrap">
    <div class="content">
        <h1>
            <?php echo $hdcms['title'];?>
        </h1>

        <div class="info">
            <a href="#" class="author"><?php echo $hdcms['author'];?></a>
            <!--帐号信息-->
            <div id="user_info" style="display: none;">
                <img src="image/face.jpg"/><b>df</b>
            </div>
            ·
            <span>浏览：<?php echo $hdcms['click'];?> 发布日期：<?php echo $hdcms['time'];?> </span>
            <span>分类：</span> <a href=""><?php echo $hdcms['catname'];?></a>
            <a class="reply" href="#content">回复</a>
        </div>
        <p>
            <?php echo $hdcms['content'];?>
        </p>


    </div>
    <div class="list-right">
        <div class="wrap">
            <h3>热点推荐</h3>
            <ul>
                <li>
                    <a href="">github中可以访问系统粘贴板里的图片是怎么实现的？</a>
                    <span>1小时前</span>
                </li>
                <li>
                    <a href="">github中可以访问系统粘贴板里的图片是怎么实现的？</a>
                    <span>1小时前</span>
                </li>
                <li>
                    <a href="">github中可以访问系统粘贴板里的图片是怎么实现的？</a>
                    <span>1小时前</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="comment">
        <div id="hdcms-comment">
            <div class="hd">回答</div>
            <div id="comment-1" class="answer-item">
                <!--头像-->
                <div class="ans-user">
                    <a class="user" href="/user/460">
                        <img src="http://tp2.sinaimg.cn/1778942741/50/5644924815/1">
                    </a>
                </div>
                <!--头像-->
                <!--评论内容-->
                <div class="ans-con">
                    <div class="con-hd">
                        <a href="/user/460">Yun.kou</a>
                        <span style="color:#333;"> ，web设计师 前端重构 致力于设计与前端一体设计</span>
                    </div>
                    <div class="con-bd">
                        <p>没亲测，遇到类似问题， 试试 safari浏览器。</p>
                    </div>
                    <div class="con-action">
                        <span style="color:#999;margin-right:10px;">2天前</span>
                        <a class="add_comment" data-answer-id="722" href="#">
                            <span class="glyphicon glyphicon-comment"></span>
                            回复 0
                        </a>
                    </div>
                    <!--回复-->
                    <div class="con-comments" data-answer-id="714">
                        <div class="comment-list" data-answer-id="714">
                            <div class="comment-item clearfix">
                                <div class="con">
                                    <span class="author vcard item">
                                    <a class="value url fn" href="/user/264" rel="author">米粽粽</a>
                                    @
                                    <a class="value url fn" href="/user/264" rel="author">后盾网向军</a>
                                    </span>：
                                    <span class="content">除了括号，还有很多函数表达式的写法，比如 ! ~ + void，只要能达到`function`不被解析成声明的效果，都可以。</span>
                                    <span class="time">5天前</span>
                                    <span class="action">
                                    <a href="javascript:;" class="reply" data-nick="米粽粽">回复</a>
                                    </span>
                                </div>
                            </div>
                            <div class="comment-item clearfix">
                                <div class="con">
                                    <span class="author vcard item">
                                    <a class="value url fn" href="/user/264" rel="author">米粽粽</a>
                                    @
                                    <a class="value url fn" href="/user/264" rel="author">后盾网向军</a>
                                    </span>：
                                    <span class="content">除了括号，还有很多函数表达式的写法，比如 ! ~ + void，只要能达到`function`不被解析成声明的效果，都可以。</span>
                                    <span class="time">5天前</span>
                                    <span class="action">
                                    <a href="javascript:;" class="reply" data-nick="米粽粽">回复</a>
                                    </span>
                                </div>
                                <!--回复-->
                                <div class="con-comments " data-answer-id="722">
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
                                        <div class="btn comment-submit" data-answer-id="722">提交评论</div>
                                    </div>
                                </div>
                                <!--回复-->
                            </div>
                        </div>
                    </div>

                </div>
                <!--评论内容-->
            </div>

            <div class="hd">我来回答</div>
            <form action="">
                <input type="hidden" name="mid" value="<?php echo $hdcms['mid'];?>"/>
                <input type="hidden" name="cid" value="<?php echo $hdcms['cid'];?>"/>
                <input type="hidden" name="aid" value="<?php echo $hdcms['aid'];?>"/>
                <input type="hidden" name="title" value="<?php echo $hdcms['title'];?>"/>

                <div class="comment-content">
                    <textarea name="content" id="content" placeholder="我也来说两名..."></textarea>
                    <input type="submit" class="btn" value="发表"/>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
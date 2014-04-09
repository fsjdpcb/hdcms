<!DOCTYPE html>
<html>
<head>
    <title>修改资料</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <hdjs/>
    <jcrop/>
    <bootstrap/>
    <link rel="stylesheet/less" href="__CONTROL_TPL__/css/css.less?ver=1.0 "/>
    <less/>
    <js file="__CONTROL_TPL__/js/cropFace.js"/>
    <script type="text/javascript" src="__CONTROL_TPL__/uploadify/jquery.uploadify.min.js"></script>
    <link rel="stylesheet" type="text/css" href="__CONTROL_TPL__/uploadify/uploadify.css"/>

</head>
<body>

<header class="header center-block">
    <h1>
        <a href="__ROOT__">后盾网  人人做后盾</a>
    </h1>
</header>
<nav class="top-menu">
    <div class="nav center-block">
        <a href="__ROOT__">首页</a>
        <a href="__ROOT__/index.php?a=Home&c=Content&m=index&g=Member">我的文章</a>
        <a href="__ROOT__/index.php?<?php echo $_SESSION['domain']?$_SESSION['domain']:$_SESSION['uid'];?>" target="_blank">个人主页</a>
        <a href="__ROOT__/index.php?a=Login&c=Login&m=quit&g=Member" class="pull-right">退出</a>
    </div>
</nav>
<article class="center-block main">
<section class="menu">
    <div class="center-block user">
        <a href="__ROOT__/index.php?<?php echo $_SESSION['domain']?$_SESSION['domain']:$_SESSION['uid'];?>" target="_blank">
            <img src="{$hd.session.icon150}" title="个人空间"/>
        </a>
        <p class="nickname">
            <span class="glyphicon glyphicon-user"></span> <b>{$hd.session.nickname}</b></p>

        <p class="edit-nickname" data-toggle="modal" data-target="#myModal">
            <span class="glyphicon glyphicon-cog"></span> 修改昵称
        </p>

        <p>
            金币：{$hd.session.credits} <br/>
        </p>
        <!--修改昵称 start--->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="height:200px;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">修改昵称</h4>
                    </div>
                    <div class="modal-body" style="margin-left: 100px;margin-top:20px;">
                        <form method="post" class="hd-form" id="edit_nickname" onsubmit="return false;">
                            <input type="text" name="nickname" value="{$hd.session.nickname}" class="h40 w300"/>
                            <button type="submit" class="btn btn-primary">保存</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <script>
            //修改昵称
            $("#edit_nickname").submit(function () {
                var nickname = $.trim($("input[name=nickname]").val());
                if (!nickname) {
                    alert('昵称不能为空');
                    return false;
                }
                $('#myModal').modal('hide');
                $.post("{|U:'Home/User/edit_nickname',array('g'=>'Member')}", $(this).serialize(), function (data) {
                    if (data.state == 1) {
                        $('p.nickname b').html(nickname);
                        $('input[name=nickname]').val(nickname);
                    }
                }, 'json')
            })
        </script>
        <!--修改昵称 end--->
    </div>
    <nav>
        <a href="__ROOT__/index.php?a=Home&c=User&m=edit&g=Member">
            <span class="glyphicon glyphicon-fire"></span>
            修改资料
        </a>
        <a href="__ROOT__/index.php?a=Home&c=Content&m=index&g=Member">
            <span class="glyphicon glyphicon-book"></span>
            我的文章
        </a>
        <a href="__ROOT__/index.php?a=Home&c=Message&m=index&g=Member">
            <span class="glyphicon glyphicon-comment"></span>
            我的消息
            <span class="badge">{$message_count}</span>
        </a>
        <a href="__ROOT__/index.php?a=Home&c=Favorite&m=index&g=Member">
            <span class="glyphicon glyphicon-folder-open"></span>
            我的收藏
        </a>
    </nav>
</section>
<section class="edit-user">
    <div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="active"><a href="#edit-base" data-toggle="tab">基本信息</a></li>
            <li><a href="#edit-face" data-toggle="tab">修改头像</a></li>
            <li><a href="#edit-password" data-toggle="tab">修改密码</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="edit-base">
                <form action="{|U:'edit_message',array('g'=>'Member')}" method="post"
                      onsubmit="return hd_submit(this)">
                    <table>
                        <tr>
                            <th>
                                <img src="{$hd.session.icon100}" class="face"/>
                            </th>
                            <td class="field" colspan="2">
                                <textarea name="description" style="height: 100px;" placeholder="请输入个性签名">{$field.description}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>个性域名</th>
                            <td class="field">
                                www.hdphp.com/
                                <input type="text" name="domain" value="{$field.domain}"/>
                            </td>
                            <td>

                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td class="field">
                                <input type="submit" class="btn btn-primary" value="确定"/>
                            </td>
                            <td>

                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="tab-pane" id="edit-face">
                <form action="{|U:'set_face',array('g'=>'Member')}" method="post" onsubmit="return hd_submit(this,'{|U:'edit',array('g'=>'Member')}')">
                    <div class="source-face">
                        <div style="position:relative;border:solid 1px #999;width: 250px;height: 250px;overflow: hidden;margin-bottom:10px;">
                            <!--上传头像按钮 Start-->
                            <script>
                                $(function () {
                                    $('#file_upload').uploadify({
                                        'swf': '__CONTROL_TPL__/uploadify/uploadify.swf',
                                        'uploader': '__CONTROL__&m=upload_face&g=Member',
                                        'removeCompleted' : false,
                                        'buttonImage': '__CONTROL_TPL__/uploadify/select_face.png',
                                        'fileTypeExts' : '*.jpg; *.png',
                                        'multi'    : false,
                                        'fileSizeLimit' : '2MB',
                                        'width': 250,
                                        'height': 250,
                                        'removeCompleted':true,
                                        'formData': {'<?php echo session_name();?>': '<?php echo session_id();?>'},
                                        'onUploadSuccess': function (file, data, response) {
                                            eval('data=' + data);
                                            if (data.state == 1) {
                                                var img = data.message.url;
                                                $("#target").attr("src", img);
                                                $("div.jcrop-holder img").attr("src", img);
                                                $("#preview150").attr("src", img);
                                                $("#preview100").attr("src", img);
                                                $("#preview50").attr("src", img);
                                                $("input[name=img_face]").val(data.message.path);
                                                $("#buttons").show();
                                                $("#face_upload").hide();
                                                $("#SWFUpload_0_0").remove();
                                            } else {
                                                alert(data.message);
                                            }
                                        }
                                    });
                                });
                                //重新上传头像
                                function reset_upload(){
                                    $("#buttons").hide();
                                    $("#face_upload").show();
                                }
                            </script>
                            <div id="face_upload">
                                <input type="file" name="file_upload" id="file_upload"/>
                            </div>
                            <!--上传头像按钮 End-->
                            <img src="__CONTROL_TPL__/images/select_face.png" id="target" style="display: none"/>
                        </div>
                        <div id="buttons" style="display: none">
                        <button class="btn btn-primary">保存</button>
                        <button class="btn btn-default" onclick="reset_upload();" type="button">重新上传</button>
                        </div>
                    </div>
                    <div class="face-preview">
                        <h2>头像预览</h2>

                        <div class="help">
                            请注意中小尺寸的头像是否清晰
                        </div>

                        <div class="face">
                            <div style="width:150px;height:150px;overflow:hidden;">
                                <img src="{$hd.session.icon150}" id="preview150" alt="Preview">
                            </div>
                            <p>
                                头像尺寸150X150
                            </p>
                        </div>
                        <div class="face">
                            <div style="width:100px;height:100px;overflow:hidden;">
                                <img src="{$hd.session.icon100}" id="preview100" alt="Preview">
                            </div>
                            <p>
                                头像尺寸100X100
                            </p>
                        </div>
                        <div class="face">
                            <div style="width:50px;height:50px;overflow:hidden;">
                                <img src="{$hd.session.icon50}" id="preview50" alt="Preview">
                            </div>
                            <p>
                                头像尺寸50X50
                            </p>
                        </div>
                    </div>
                    <input type="hidden" name="img_face" value=""/>
                    <input type="hidden" size="4" id="x1" name="x1" value="0"/>
                    <input type="hidden" size="4" id="y1" name="y1" value="0"/>
                    <input type="hidden" size="4" id="x2" name="x2" value="249"/>
                    <input type="hidden" size="4" id="y2" name="y2" value="249"/>
                    <input type="hidden" size="4" id="w" name="w" value="250"/>
                    <input type="hidden" size="4" id="h" name="h" value="250"/>
                </form>
            </div>
            <div class="tab-pane" id="edit-password">
                <form id="edit_password" action="{|U:'edit_password',array('g'=>'Member')}"
                      onsubmit="return hd_submit(this)">
                    <table>
                        <tr>
                            <th>当前密码</th>
                            <td class="field">
                                <input type="password" name="password"/>
                            </td>
                            <td class="w200">
                                <span id="hd_password"></span>
                            </td>
                        </tr>
                        <tr>
                            <th>新密码</th>
                            <td class="field">
                                <input type="password" name="newpassword"/>
                            </td>
                            <td>
                                <span id="hd_newpassword"></span>
                            </td>
                        </tr>
                        <tr>
                            <th>重复密码</th>
                            <td class="field">
                                <input type="password" name="passwordc"/>
                            </td>
                            <td>
                                <span id="hd_passwordc"></span>
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td class="field">
                                <input type="submit" class="btn btn-primary" value="确定"/>
                            </td>
                            <td>

                            </td>
                        </tr>
                    </table>
                </form>
                <script>
                    $("#edit_password").validate({
                        password: {
                            rule: {
                                required: true,
                                ajax: CONTROL + '&m=check_password&g=Member'
                            },
                            error: {
                                required: "不能为空",
                                ajax: '原密码错误'
                            },
                            success: '输入正确'
                        },
                        newpassword: {
                            rule: {
                                required: true
                            },
                            error: {
                                required: "不能为空"
                            }
                        },
                        passwordc: {
                            rule: {
                                required: true,
                                confirm: 'password'
                            },
                            error: {
                                required: "不能为空",
                                confirm: '两次密码不一致'
                            }
                        }
                    })
                </script>
            </div>
        </div>
    </div>
</section>
</article>
<footer class="container">
    <nav>
        <a href="#">PHP培训</a>
        <a href="#">HDPHP框架</a>
        <a href="#">论坛</a>
    </nav>
    Copyright © 2014 so.com All Rights Reserved <a href="#">京公安网备11000000000006</a>
</footer>
</body>
</html>
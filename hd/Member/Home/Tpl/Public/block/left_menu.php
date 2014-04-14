<section class="menu">
    <div class="center-block user">
        <a href="__ROOT__?{$hd.session.domain}" target="_blank">
            <img src="__ROOT__/{$hd.session.icon150}" onmouseover="user.show(this,{$hd.session.uid})"/>
        </a>
        <p class="nickname">
            <span class="glyphicon glyphicon-user"></span> <b>{$hd.session.nickname}</b></p>
        <p class="edit-nickname" data-toggle="modal" data-target="#myModal">
            <span class="glyphicon glyphicon-cog"></span> 修改昵称
        </p>
        <p>
            金&nbsp;&nbsp;&nbsp; 币：{$hd.session.credits} <br/>
        </p>
        <p>
            会员组：{$hd.session.rname} <br/>
        </p>
        <!--修改昵称 start--->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog"  >
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
            $("#edit_nickname").submit(function(){
                var nickname = $.trim($("input[name=nickname]").val());
                if(!nickname){
                    alert('昵称不能为空');
                    return false;
                }
                $('#myModal').modal('hide');
                $.post("{|U:'Home/User/edit_nickname',array('g'=>'Member')}",$(this).serialize(),function(data){
                    if(data.state==1){
                        $('p.nickname b').html(nickname);
                        $('input[name=nickname]').val(nickname);
                    }
                },'json')
            })
        </script>
        <!--修改昵称 end--->
    </div>
    <nav>
        <a href="__ROOT__/index.php?a=Home&c=Dynamic&m=index&g=Member">
            <span class="glyphicon glyphicon-share"></span>
            好友动态
        </a>
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
        <a href="__ROOT__/index.php?a=Home&c=Follow&m=fans&g=Member">
            <span class="glyphicon glyphicon-send"></span>
            我的粉丝
        </a><a href="__ROOT__/index.php?a=Home&c=Follow&m=follow&g=Member">
            <span class="glyphicon glyphicon-tower"></span>
            我的关注
        </a>
    </nav>
</section>
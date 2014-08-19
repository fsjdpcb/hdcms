<include file="__PUBLIC__/header.php"/>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="{|U:'index'}">插件管理</a></li>
            <li><a href="{|U:'add'}">添加插件</a></li>
        </ul>
    </div>
    <div class="title-header"><strong>{$data.config.title}</strong>插件设置</div>
    <form method="post" class="hd-form">
        <input type="hidden" name="id" value="{$hd.get.id}"/>
        <table class="table1">
            <foreach from="$configFile" key="$name" value="$config">
                <?php $formName="config[$name]";?>
                <tr>
                    <th class="w150">{$config.title}</th>
                    <td>
                        <switch value="$config.type">
                            <case value="text">
                                <input type="text" name="{$formName}" value="{$config.value}" style="{$config.style}"/>
                            </case>
                            <case value="password">
                                <input type="password" name="{$formName}" value="{$config.value}" style="{$config.style}"/>
                            </case>
                            <case value="hidden">
                                <input type="hidden" name="{$formName}" value="{$config.value}" style="{$config.style}"/>
                            </case>
                            <case value="radio">
                                <foreach from="$config['options']" key="$rvalue" value="$rtitle">
                                    <label><input type="radio" name="{$formName}" value="{$rvalue}" style="{$config.style}" <if value="$config.value eq $rvalue">checked=""</if>/> {$rtitle}</label>
                                </foreach>
                            </case>
                            <case value="checkbox">
                                <foreach from="$config['options']" key="$rvalue" value="$rtitle">
                                    <label><input type="checkbox" name="{$formName}[]" value="{$rvalue}" style="{$config.style}" <if value="in_array($rvalue,$config['value'])">checked=""</if>/> {$rtitle}</label>
                                </foreach>
                            </case>
                            <case value="select">
                                <select name="{$formName}">
                                <foreach from="$config['options']" key="$svalue" value="$stitle">
                                    <option value="{$rvalue}" <if value="$config.value eq $svalue">selected=""</if>>{$stitle}</option>
                                </foreach>
                                </select>
                            </case>
                            <case value="textarea">
                                <textarea name="{$formName}" style="{$config.style}" class="w300 h100">{$config.value}</textarea>
                            </case>
                            <case value="image">
                                <input id='{$name}' type='text' name='{$formName}'  value='{$config.value}' src='<if value="{$config.value}">__ROOT__/{$config.value}</if>' class='w300 images' onmouseover='view_image(this)' readonly=''/>
                                <button class='hd-cancel-small' onclick='file_upload({"id":"{$name}","type":"image","num":1,"name":"a","allow_size":"2"})' type='button'>上传图片</button>
                                &nbsp;&nbsp;<button class='hd-cancel-small' onclick='remove_upload_one_img(this)' type='button'>移除</button>
                            </case>
                            <case value="group">
                                <?php $member_role=S('member_role');?>
                                    <foreach from="$member_role" key="$rvalue" value="$role">
                                        <label><input type="checkbox" name="{$formName}[]" value="{$role['rid']}" <if value="in_array($role['rid'],$config['value'])">checked=""</if>/> {$role.rname}</label>
                                    </foreach>
                            </case>
                            <case value="editor">
                                {|tag:'ueditor',array('name'=>$formName,'content'=>$config['value'])}
                            </case>
                        </switch>
                    </td>
                </tr>
            </foreach>
        </table>
        <div class="position-bottom">
            <input type="submit" value="确定" class="hd-success"/>
        </div>
    </form>
</div>
<script>
    function file_upload(options) {
        //多文件(图片与文件)上传时，判断是否已经超出了允许上传的图片数量
        var url = WEB + "?m=Admin&c=ContentUpload&a=index&id=" + options.id + "&type=" + options.type + "&num=" + options.num + "&name=" + options.name+'&allow_size='+options.allow_size;
        $.modal({
            title : '文件上传',
            width : 650,
            height : 505,
            content : '<iframe frameborder=0 scrolling="no" style="height:100%;border:none;" src="' + url + '"></iframe>'
        });
    }
    /**
     * 删除单图上传的图片（自定义字段）
     * @param obj 按钮对象
     */
    function remove_upload_one_img(obj) {
        $(obj).parent().find('input').val('').attr('src', '');
    }

    //预览单张图片
    function view_image(obj) {
        var src = $(obj).attr('src');
        var id = $(obj).attr('id');
        var viewImg = $('#view_' + id);
        //删除预览图
        if (viewImg.length >= 1) {
            viewImg.remove();
        }
        //鼠标移除时删除预览图
        $(obj).mouseout(function(){
            $('#view_' + id).remove();
        })
        if (src) {
            var offset = $(obj).offset();
            var _left = 320+offset.left+"px";
            var _top = offset.top-75+"px";
            var html = '<img src="' + src + '" style="border:solid 5px #dcdcdc;position:absolute;z-index:1000;height:100px;left:'+_left+';top:'+_top+';" id="view_'+id+'"/>';
            $('body').append(html);
        }
    }
</script>
</body>
</html>
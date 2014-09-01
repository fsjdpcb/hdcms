<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>评论管理</title>
    <hdjs/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li>
                <a href="{|U:index}" class="action">
                    评论列表
                </a>
            </li>
        </ul>
    </div>
    <table class="table2 hd-form">
        <thead>
        <tr>
            <td class="w30">comment_id</td>
            <td class="w50">会员</td>
            <td>评论内容</td>
            <td class="w100">ip</td>
            <td class="w100">操作</td>
        </tr>
        </thead>
        <tbody>
        <list from="$data" name="c">
            <tr>
            <td>{$c.comment_id}</td>
            <td>{$c.username}</td>
             <td>
                 <?php
                    $pos =strrpos($c['content'],'<span></span>');
                     echo substr($c['content'],$pos);
                 ?>
             </td>
            <td>{$c.ip}</td>
            <td>
                <a href="javascript:;" onclick="confirm('确定删除吗？')?location.href='{|U:del,array('comment_id'=>$c['comment_id'])}':''">删除</a> |
                <a href="__ROOT__/index.php?m=Index&c=Index&a=content&mid={$c.mid}&cid={$c.cid}&aid={$c.aid}" target="_blank">查看文章</a>
            </td>
            </tr>
        </list>
        </tbody>
    </table>
</div>

</body>
</html>
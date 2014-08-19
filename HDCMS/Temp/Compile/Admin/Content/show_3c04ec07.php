<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if (!defined('HDPHP_PATH')) exit(); ?>
<!doctype html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <title>系统后台 - <?php echo C("webname");?> - by HDCMS</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdphp/hdphp/hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/hdjs/js/hdjs.js'></script>
<script src='http://localhost/hdphp/hdphp/hdjs/js/slide.js'></script>
<script src='http://localhost/hdphp/hdphp/hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
HOST = '<?php echo $GLOBALS['user']['HOST'];?>';
ROOT = '<?php echo $GLOBALS['user']['ROOT'];?>';
WEB = '<?php echo $GLOBALS['user']['WEB'];?>';
URL = '<?php echo $GLOBALS['user']['URL'];?>';
APP = '<?php echo $GLOBALS['user']['APP'];?>';
COMMON = '<?php echo $GLOBALS['user']['COMMON'];?>';
HDPHP = '<?php echo $GLOBALS['user']['HDPHP'];?>';
HDPHPDATA = '<?php echo $GLOBALS['user']['HDPHPDATA'];?>';
HDPHPEXTEND = '<?php echo $GLOBALS['user']['HDPHPEXTEND'];?>';
MODULE = '<?php echo $GLOBALS['user']['MODULE'];?>';
CONTROLLER = '<?php echo $GLOBALS['user']['CONTROLLER'];?>';
ACTION = '<?php echo $GLOBALS['user']['ACTION'];?>';
STATIC = '<?php echo $GLOBALS['user']['STATIC'];?>';
HDPHPTPL = '<?php echo $GLOBALS['user']['HDPHPTPL'];?>';
VIEW = '<?php echo $GLOBALS['user']['VIEW'];?>';
PUBLIC = '<?php echo $GLOBALS['user']['PUBLIC'];?>';
CONTROLLERVIEW = '<?php echo $GLOBALS['user']['CONTROLLERVIEW'];?>';
HISTORY = '<?php echo $GLOBALS['user']['HISTORY'];?>';
</script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/HDCMS/Admin/View/Public/common.css"/>
</head>
	<body>
		<div class="wrap">
			<form class="hd-form" method="post">
				<input type="hidden" name="m" value="content"/>
				<input type="hidden" name="mid" value="<?php echo $_GET['mid'];?>"/>
				<input type="hidden" name="cid" value="<?php echo $_GET['cid'];?>"/>
				<input type="hidden" name="state" value="<?php echo $_GET['state'];?>"/>
				<div class="search">
					添加时间：
					<input id="begin_time" placeholder="开始时间" readonly="readonly" class="w80" type="text" value="" name="search_begin_time">
					<script>
						$('#begin_time').calendar({
							format : 'yyyy-MM-dd'
						});
					</script>
					-
					<input id="end_time" placeholder="结束时间" readonly="readonly" class="w80" type="text" value="" name="search_end_time">
					<script>
						$('#end_time').calendar({
							format : 'yyyy-MM-dd'
						});
					</script>
					&nbsp;&nbsp;&nbsp;
					<select name="flag" class="w100">
						<option selected="" value="">全部</option>
						<?php $hd["list"]["f"]["total"]=0;if(isset($flag) && !empty($flag)):$_id_f=0;$_index_f=0;$lastf=min(1000,count($flag));
$hd["list"]["f"]["first"]=true;
$hd["list"]["f"]["last"]=false;
$_total_f=ceil($lastf/1);$hd["list"]["f"]["total"]=$_total_f;
$_data_f = array_slice($flag,0,$lastf);
if(count($_data_f)==0):echo "";
else:
foreach($_data_f as $key=>$f):
if(($_id_f)%1==0):$_id_f++;else:$_id_f++;continue;endif;
$hd["list"]["f"]["index"]=++$_index_f;
if($_index_f>=$_total_f):$hd["list"]["f"]["last"]=true;endif;?>

							<option value="<?php echo $f;?>" <?php if($_POST['flag'] == $f){?>selected=''<?php }?>><?php echo $f;?></option>
						<?php $hd["list"]["f"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
					</select>
					&nbsp;&nbsp;&nbsp;
					<select name="search_type" class="w100">
						<option value="1" <?php if($_GET['search_type'] == 1){?>selected=''<?php }?>>标题</option>
						<option value="2" <?php if($_GET['search_type'] == 2){?>selected=''<?php }?>>简介</option>
						<option value="3" <?php if($_GET['search_type'] == 3){?>selected=''<?php }?>>用户名</option>
						<option value="4" <?php if($_GET['search_type'] == 4){?>selected=''<?php }?>>用户uid</option>
					</select>&nbsp;&nbsp;&nbsp;
					关键字：
					<input class="w200" type="text" placeholder="请输入关键字..." value="<?php echo $_POST['search_keyword'];?>" name="search_keyword">
					<button class="hd-cancel" type="submit">
						搜索
					</button>
				</div>
			</form>
			<div class="menu_list">
				<ul>
					<li>
						<a href="<?php echo U('show',array('mid'=>$_GET['mid'],'cid'=>$_GET['cid'],'content_status'=>1));?>"
						<?php if($_GET['content_status']==1){?>class="action"<?php }?> >
							内容列表
						</a>
					</li>
					<li>
						<a href="<?php echo U('show',array('mid'=>$_GET['mid'],'cid'=>$_GET['cid'],'content_status'=>0));?>"
						<?php if($_GET['content_status']==0){?>class="action"<?php }?> >
							未审核
						</a>
					</li>
					<li>
						<a href="javascript:;" onclick="hd_open_window('<?php echo U(add,array('cid'=>$_GET['cid'],'mid'=>$_GET['mid']));?>')">
							添加内容
						</a>
					</li>
				</ul>
			</div>
			<table class="table2 hd-form">
				<thead>
					<tr>
						<td class="w30">
						<input type="checkbox" id="select_all"/>
						</td>
						<td class="w30">aid</td>
						<td class="w30">cid</td>
						<td class="w30">排序</td>
						<td>标题</td>
						<td class="w50">状态</td>
						<td class="w100">作者</td>
						<td class="w80">修改时间</td>
						<td class="w120">操作</td>
					</tr>
				</thead>
				<?php $hd["list"]["c"]["total"]=0;if(isset($data) && !empty($data)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($data));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($data,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

					<tr>
						<td>
						<input type="checkbox" name="aid[]" value="<?php echo $c['aid'];?>"/>
						</td>
						<td><?php echo $c['aid'];?></td>
						<td><?php echo $c['cid'];?></td>
						<td>
						<input type="text" class="w30" value="<?php echo $c['arc_sort'];?>" name="arc_order[<?php echo $c['aid'];?>]"/>
						</td>
						<td>
						<a href="<?php echo U('Index/Index/content',array('mid'=>$_GET['mid'],'cid'=>$_GET['cid'],'aid'=>$c['aid']));?>" target="_blank">
							<?php echo $c['title'];?>
						</a>
						<?php if($c['flag']){?>
							<span style="color:#FF0000"> [<?php echo $c['flag'];?>]</span>
						<?php }?></td>
						<td>
						<?php if($c['content_status'] == 1){?>
							已审核
							<?php  }else{ ?>
								未审核
						<?php }?></td>
						<td><?php echo $c['username'];?></td>
						<td><?php echo date('Y-m-d',$c['updatetime']);?></td>
						<td>
						<a href="<?php echo Url::getContentUrl($c);?>" target="_blank">
							访问
						</a><span
						class="line">|</span>
						<a href="javascript:hd_open_window('<?php echo U(edit,array('cid'=>$_GET['cid'],'mid'=>$_GET['mid'],'aid'=>$c['aid']));?>')">编辑
						</a><span class="line">|</span>
						<a href="javascript:" onclick="hd_confirm('确认删除吗？',function(){hd_ajax('<?php echo U('del');?>',{aid:<?php echo $c['aid'];?>,cid:<?php echo $c['cid'];?>,mid:<?php echo $c['mid'];?>})})">
							删除
						</a>
						</td>
					</tr>
				<?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
			</table>
			<div class="page1">
				<?php echo $page;?>
			</div>

        </div>
        <div class="position-bottom">
            <input type="button" class="hd-cancel" value="全选" onclick="select_all('.table2')"/>
            <input type="button" class="hd-cancel" value="反选" onclick="reverse_select('.table2')"/>
            <input type="button" class="hd-cancel" onclick="order(<?php echo $_GET['mid'];?>,<?php echo $_GET['cid'];?>)" value="更改排序"/>
            <input type="button" class="hd-cancel" onclick="del(<?php echo $_GET['mid'];?>,<?php echo $_GET['cid'];?>)" value="批量删除"/>
            <input type="button" class="hd-cancel" onclick="audit(<?php echo $_GET['mid'];?>,<?php echo $_GET['cid'];?>,1)" value="审核"/>
            <input type="button" class="hd-cancel" onclick="audit(<?php echo $_GET['mid'];?>,<?php echo $_GET['cid'];?>,0)" value="取消审核"/>
            <input type="button" class="hd-cancel" onclick="move(<?php echo $_GET['mid'];?>,<?php echo $_GET['cid'];?>)" value="批量移动"/>
        </div>
        <script>
            //全选
            $("input#select_all").click(function () {
                $("[type='checkbox']").attr("checked", $(this).attr("checked") == "checked");
            })
            //全选文章
            function select_all() {
                $("[type='checkbox']").attr("checked", "checked");
            }
            //反选文章
            function reverse_select() {
                $("[type='checkbox']").attr("checked", function () {
                    return !$(this).attr("checked") == 1;
                });
            }
            //更新排序
            function order(mid,cid) {
                if ($("input[type='text']").length == 0) {
                    alert('没有文章用来排序！');
                    return false;
                }
                var data = $("input[type='text']").serialize();
                hd_ajax(CONTROLLER + "&a=order&mid="+mid+"&cid=" + cid, data);
            }
            /**
             * 删除文章
             * @param mid
             * @param cid
             * @param aid
             */
            function del(mid,cid,aid) {
                //单文章删除
                if (aid) {
                    var ids = {aid: aid}
                } else {//多文章删除
                    var aids = $("input:checked").serialize();
                }
                if (aids) {
                    hd_confirm('确定要删除文章吗?',function(){
                        $.ajax({
                            type: "POST",
                            url: CONTROLLER + "&a=del" + "&mid=" + mid+"&cid="+cid,
                            dataType: "JSON",
                            cache: false,
                            data: aids,
                            success: function (data) {
                                if (data.status == 1) {
                                    $.dialog({
                                        message: data.message,
                                        type: "success",
                                        close_handler: function () {
                                            location.href = URL;
                                        }
                                    });
                                } else {
                                    $.dialog({
                                        message: data.message,
                                        type: "error",
                                        close_handler: function () {
                                            location.href = URL;
                                        }
                                    });
                                }
                            }
                        })
                    })
                } else {
                    $.dialog({message: '请选择文章', type: "error"});
                }
            }
            //设置状态
            function audit(mid,cid, state) {
                //单文章删除
                var ids = $("input:checked").serialize();
                if (ids) {
                    $.ajax({
                        type: "POST",
                        url: CONTROLLER + "&a=audit" + "&status=" + state + "&mid="+mid+"&cid=" + cid,
                        dataType: "JSON",
                        cache: false,
                        data: ids,
                        success: function (data) {
                            if (data.status == 1) {
                                $.dialog({
                                    message: data.message,
                                    type: "success",
                                    close_handler: function () {
                                        location.href = URL;
                                    }
                                });
                            } else {
                                $.dialog({
                                    message: data.message,
                                    type: "error",
                                    close_handler: function () {
                                        location.href = URL;
                                    }
                                });
                            }
                        }
                    })
                } else {
                    $.dialog({message: '请选择文章', type: "error"});
                }
            }
            /**
             * 移动文章
             * @param mid 模型mid
             * @param cid 当前栏目
             */
            function move(mid,cid) {
                var aid = '';
                $("input[name*=aid]:checked").each(function (i) {
                    aid += $(this).val() + "|";
                })
                aid = aid.slice(0, -1);
                if (aid) {
                    $.modal({
                        width: 600, height: 420,
                        title: '移动文章',
                        content: '<iframe style="width: 100%;height: 99%;" src="' + CONTROLLER + '&a=move&mid='+mid+'&cid=' + cid + '&aid=' + aid + '" frameborder="0"></iframe>'
                    })
                } else {
                    $.dialog({message: '请选择文章', type: "error"});
                }
            }
        </script>
	</body>
</html>
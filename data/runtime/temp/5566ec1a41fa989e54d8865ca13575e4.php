<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:55:"/Users/ima/GitHub/rhaphp/themes/pc/mp/mp/autoreply.html";i:1505625608;s:63:"/Users/ima/GitHub/rhaphp/themes/pc/mp/../admin/common/base.html";i:1505801784;s:64:"/Users/ima/GitHub/rhaphp/themes/pc/mp/common/autoreplay_nav.html";i:1505625608;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <title>RhaPHP - 二哈公众号管理系统</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="__STATIC__/admin/css/admin_base.css" />
    <script type="text/javascript" src="__STATIC__/jquery/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="__STATIC__/layui/layui.js"></script>
    <link rel="stylesheet" type="text/css" href="__STATIC__/layui/css/layui.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/icon/icon.css" />
    
</head>
<body class="trade-order">
<div class="topbar" id="gotop">
    <div class="wrap">
        <ul>
            <li>你好，<a class="name" href="" id="username"><?php echo $admin['admin_name']; ?></a>
                <?php if(!(empty($mpInfo) || (($mpInfo instanceof \think\Collection || $mpInfo instanceof \think\Paginator ) && $mpInfo->isEmpty()))): ?>
                <span class="quit">当前公众号：<a href="<?php echo url('mp/index/index',['mid'=>$mpInfo['id']]); ?>"><?php echo $mpInfo['name']; ?></a><i style="font-size: 9px; margin-left: 5px;"><?php echo getMpType($mpInfo['type']); ?></i>
                    <?php if($mpInfo['valid_status'] == '1'): ?>
                    <i style="font-size: 9px; margin-left: 5px;">已接入</i>
                    <?php else: ?>
                    <i style="font-size: 9px; margin-left: 5px; color: red">未接入</i>
                    <?php endif; ?>
                </span>
                <a class="quit" href="<?php echo url('mp/index/mplist'); ?>">切换公众号</a>
                <?php endif; ?>

                <a class="quit" href="<?php echo url('admin/Login/out'); ?>"><i class="rha-icon">&#xe696;</i>退出</a>
            </li>
            <li>
                <a href="<?php echo url('mp/Message/messagelist'); ?>"><i class="layui-icon">&#xe645;</i>用户消息<span class="num-feed rhaphp-msg-user show" style="display: none;">0</span></a>
            </li>

        </ul>
    </div>
</div>
<div class="header">
    <div class="wrap">
        <div class="logo">
            <h1 class="main-logo"><a href="<?php echo url('mp/mp/index'); ?>">RhaPHP</a></h1>
            <div class="sub-logo"></div>
        </div>
        <div class="nav">
            <ul>
                <?php if(is_array($t_menu) || $t_menu instanceof \think\Collection || $t_menu instanceof \think\Paginator): $i = 0; $__LIST__ = $t_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$t): $mod = ($i % 2 );++$i;?>
                <li class="<?php if($topNode == $t['url']): ?>selected<?php endif; ?>"><a href="<?php echo url($t['url']); ?>"><?php echo $t['name']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
</div>
<div class="container_body wrap">
    <div class="sidebar">
        <div class="menu">
            <?php if(is_array($menu) || $menu instanceof \think\Collection || $menu instanceof \think\Paginator): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$t): $mod = ($i % 2 );++$i;?>
            <dl>
                <dt><i class="type-ico ico-trade rha-icon <?php if($t['shows'] == '1'): endif; ?>"><?php echo $t['icon']; ?></i><?php echo $t['name']; ?></dt>
                <?php if(is_array($t['child']) || $t['child'] instanceof \think\Collection || $t['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $t['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?>
                <dd class="<?php if($c['shows'] == '1'): ?>selected<?php endif; ?>"><a href="<?php echo url($c['url']); ?>"><?php echo $c['name']; ?></a></dd>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </dl>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            
            <dl>
                <?php  if(!isset($menu_app))$menu_app=null; if($menu_app != ''): ?><dt><i class="type-ico ico-trade rha-icon">&#xe6f0;</i>应用扩展</dt><?php endif; if(is_array($menu_app) || $menu_app instanceof \think\Collection || $menu_app instanceof \think\Paginator): $i = 0; $__LIST__ = $menu_app;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <dd class=""><a href="<?php echo url('mp/App/index',['name'=>$v['addon'],'type'=>'news','mid'=>$mid]); ?>"><?php echo $v['name']; ?></a></dd>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </dl>
        </div>
    </div>
    <div class="content" id="tradeSearchBd">
        <?php if(isset($menu_tile) OR $menu_title != ''): ?>
        <div class="content-hd">
            <h2><?php echo $menu_title; ?>
<a href="<?php echo url('addKeyword'); ?>" id="addkw" class="layui-btn layui-btn-normal layui-btn-small rha-nav-title">增加关键词</a>
</h2>
        </div>
        <?php endif; ?>
        
<div class="layui-tab" style="padding: 0px 10px 0px 10px;">
    <ul class="layui-tab-title">
        <li <?php if($action_name == 'autoreply'): ?>class="layui-this"<?php endif; ?>> <a href="<?php echo url('autoreply'); ?>">关键词回复</a></li>
        <li <?php if($action_name == 'special'): ?>class="layui-this"<?php endif; ?>><a href="<?php echo url('special'); ?>">特殊消息/事件</a></li>
        <!--<li <?php if($action_name == 'autoreply'): ?>class="layui-this"<?php endif; ?>>事件回复</li>-->
        <!--<li <?php if($action_name == 'autoreply'): ?>class="layui-this"<?php endif; ?>>未识别回复</li>-->
    </ul>
</div>
<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
    <ul class="layui-tab-title">
        <li <?php if($type == 'text'): ?>class="layui-this"<?php endif; ?> ><a href="<?php echo url('mp/Mp/autoReply',['type'=>'text']); ?>">回复文字</a></li>
        <li <?php if($type == 'news'): ?>class="layui-this"<?php endif; ?>><a href="<?php echo url('mp/Mp/autoReply',['type'=>'news']); ?>">回复图文</a></li>
        <li <?php if($type == 'addon'): ?>class="layui-this"<?php endif; ?>><a href="<?php echo url('mp/Mp/autoReply',['type'=>'addon']); ?>">回复应用</a></li>
        <li <?php if($type == 'voice'): ?>class="layui-this"<?php endif; ?>><a href="<?php echo url('mp/Mp/autoReply',['type'=>'voice']); ?>">回复语音</a></li>
        <li <?php if($type == 'image'): ?>class="layui-this"<?php endif; ?>><a href="<?php echo url('mp/Mp/autoReply',['type'=>'image']); ?>">回复图片</a></li>
        <li <?php if($type == 'video'): ?>class="layui-this"<?php endif; ?>><a href="<?php echo url('mp/Mp/autoReply',['type'=>'video']); ?>">回复视频</a></li>
        <li <?php if($type == 'music'): ?>class="layui-this"<?php endif; ?>><a href="<?php echo url('mp/Mp/autoReply',['type'=>'music']); ?>">回复音乐</a></li>
    </ul>
    <div class="layui-tab-content">

        <?php switch($type): case "text": ?>
        <table class="layui-table" lay-skin="line">
            <colgroup>
                <col width="120">
                <col >
                <col width="100" >
                <col width="120">
            </colgroup>
                    <thead>
                    <tr>
                        <th>关键词</th>
                        <th>回复内容</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <tr>
                        <td><?php echo $vo['keyword']; ?></td>
                        <td><?php echo $vo['content']; ?></td>
                        <td><?php if($vo['status']=='1'): ?>使用中<?php else: ?>已停用<?php endif; ?></td>
                        <td>
                            <div class="">
                                <?php if($vo['status']=='1'): ?>
                                <a class="rha-bt-a" href="javascript:;" onclick="updateReply('<?php echo $vo['id']; ?>','0')">停用</a>
                                <?php else: ?>
                                <a class="rha-bt-a" href="javascript:;" onclick="updateReply('<?php echo $vo['id']; ?>','1')">开启</a>
                                <?php endif; ?>
                                <a class="rha-bt-a" href="javascript:;" onclick="delReply('<?php echo $vo['id']; ?>')">删除</a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            <?php echo $data->render(); break; case "news": ?>
                <table class="layui-table" lay-skin="line">
                    <col width="120">
                    <col width="200">
                    <col width="150">
                    <col width="">
                    <col width="100" >
                    <col width="120">
                    <thead>
                    <tr>
                        <th>关键词</th>
                        <th>标题</th>
                        <th>封面图</th>
                        <th>图文描述</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <tr>
                        <td><?php echo $vo['keyword']; ?></td>
                        <td><?php echo $vo['title']; ?></td>
                        <td>
                            <div  style="padding: 5px; border: #e6e6e6 solid 1px; width:160px; float: left; ">
                            <img class="form_logo" src="<?php echo $vo['url']; ?>" style="max-width: none" width="160" height="100">
                            </div>
                        </td>
                        <td><?php echo $vo['content']; ?></td>
                        <td><?php if($vo['status']=='1'): ?>使用中<?php else: ?>已停用<?php endif; ?></td>
                        <td>
                            <div class="">
                                <?php if($vo['status']=='1'): ?>
                                <a class="rha-bt-a" href="javascript:;" onclick="updateReply('<?php echo $vo['id']; ?>','0')">停用</a>
                                <?php else: ?>
                                <a class="rha-bt-a" href="javascript:;" onclick="updateReply('<?php echo $vo['id']; ?>','1')">开启</a>
                                <?php endif; ?>
                                <a class="rha-bt-a" href="javascript:;" onclick="delReply('<?php echo $vo['id']; ?>')">删除</a>

                            </div>
                        </td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
        <?php echo $data->render(); break; case "addon": ?>
        <table class="layui-table" lay-skin="line">
            <col width="120">
            <col width="200">
            <col width="" >
            <col width="100">
            <col width="120">
            <thead>
            <tr>
                <th>关键词</th>
                <th>应用名称</th>
                <th>应用简介</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><?php echo $vo['keyword']; ?></td>
                <td>
                    <div  style=" float: left; ">
                        <img class="form_logo" src="<?php echo $vo['logo']; ?>" width="30" height="30"><?php echo $vo['name']; ?>
                    </div>
                    </td>
                <td><?php echo $vo['desc']; ?></td>
                <td><?php if($vo['status']=='1'): ?>使用中<?php else: ?>已停用<?php endif; ?></td>
                <td>
                    <?php if($vo['status']=='1'): ?>
                    <a class="rha-bt-a" href="javascript:;" onclick="updateReply('<?php echo $vo['id']; ?>','0')">停用</a>
                    <?php else: ?>
                    <a class="rha-bt-a" href="javascript:;" onclick="updateReply('<?php echo $vo['id']; ?>','1')">开启</a>
                    <?php endif; ?>
                    <a class="rha-bt-a" href="javascript:;" onclick="delReply('<?php echo $vo['id']; ?>')">删除</a>

                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>

        <?php break; case "voice": ?>
        <table class="layui-table" lay-skin="line">
            <col width="">
            <col width="">
            <col width="" >
            <col width="100">
            <col width="120">
            <thead>
            <tr>
                <th>关键词</th>
                <th>语音名称</th>
                <th>语音资源|媒体ID</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><?php echo $vo['keyword']; ?></td>
                <td><?php echo $vo['title']; ?></td>
                <td><?php echo $vo['url']; ?></td>
                <td><?php if($vo['status']=='1'): ?>使用中<?php else: ?>已停用<?php endif; ?></td>
                <td>
                    <?php if($vo['status']=='1'): ?>
                    <a class="rha-bt-a" href="javascript:;" onclick="updateReply('<?php echo $vo['id']; ?>','0')">停用</a>
                    <?php else: ?>
                    <a class="rha-bt-a" href="javascript:;" onclick="updateReply('<?php echo $vo['id']; ?>','1')">开启</a>
                    <?php endif; ?>
                    <a class="rha-bt-a" href="javascript:;" onclick="delReply('<?php echo $vo['id']; ?>')">删除</a>

                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <?php echo $data->render(); break; case "image": ?>
        <table class="layui-table" lay-skin="line">
            <col width="">
            <col width="100">
            <col width="" >
            <col width="100">
            <col width="120">
            <thead>
            <tr>
                <th>关键词</th>
                <th>类型</th>
                <th>封面图</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><?php echo $vo['keyword']; ?></td>
                <td><?php if($vo['status_type'] == '1'): ?> 永久
                    <?php elseif($vo['status_type'] == '0'): ?>临时
                    <?php endif; ?></td>
                <td>
                    <div  style="padding: 5px; border: #e6e6e6 solid 1px; width:160px; float: left; ">
                        <img class="form_logo" src="<?php echo $vo['url']; ?>" style="max-width: none" width="160" height="100">
                    </div>
                </td>

                <td><?php if($vo['status']=='1'): ?>使用中<?php else: ?>已停用<?php endif; ?></td>
                <td>
                    <?php if($vo['status']=='1'): ?>
                    <a class="rha-bt-a" href="javascript:;" onclick="updateReply('<?php echo $vo['id']; ?>','0')">停用</a>
                    <?php else: ?>
                    <a class="rha-bt-a" href="javascript:;" onclick="updateReply('<?php echo $vo['id']; ?>','1')">开启</a>
                    <?php endif; ?>
                    <a class="rha-bt-a" href="javascript:;" onclick="delReply('<?php echo $vo['id']; ?>')">删除</a>

                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <?php echo $data->render(); break; case "video": ?>
        <table class="layui-table" lay-skin="line">
            <col width="">
            <col width="100">
            <col width="" >
            <col width="" >
            <col width="100">
            <col width="120">
            <thead>
            <tr>
                <th>关键词</th>
                <th>类型</th>
                <th>视频标题|媒体ID</th>
                <th>视频地址</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><?php echo $vo['keyword']; ?></td>
                <td><?php if($vo['status_type'] == '1'): ?> 永久
                    <?php elseif($vo['status_type'] == '0'): ?>临时
                    <?php endif; ?></td>
                <td>
                    <?php echo $vo['title']; ?>
                </td>
                <td>
                    <?php echo $vo['url']; ?>
                </td>
                <td><?php if($vo['status']=='1'): ?>使用中<?php else: ?>已停用<?php endif; ?></td>
                <td>
                    <?php if($vo['status']=='1'): ?>
                    <a class="rha-bt-a" href="javascript:;" onclick="updateReply('<?php echo $vo['id']; ?>','0')">停用</a>
                    <?php else: ?>
                    <a class="rha-bt-a" href="javascript:;" onclick="updateReply('<?php echo $vo['id']; ?>','1')">开启</a>
                    <?php endif; ?>
                    <a class="rha-bt-a" href="javascript:;" onclick="delReply('<?php echo $vo['id']; ?>')">删除</a>

                </td>

            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <?php echo $data->render(); break; case "music": ?>
        <table class="layui-table" lay-skin="line">
            <col width="80">
            <col width="100">
            <col width="" >
            <col width="" >
            <col width="100">
            <col width="120">
            <thead>
            <tr>
                <th>关键词</th>
                <th>音乐标题</th>
                <th>链接地址</th>
                <th>音乐描述</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><?php echo $vo['keyword']; ?></td>
                <td><?php echo $vo['title']; ?></td>
                <td>
                    <?php echo $vo['url']; ?>
                </td>
                <td><?php echo $vo['content']; ?></td>
                <td><?php if($vo['status']=='1'): ?>使用中<?php else: ?>已停用<?php endif; ?></td>
                <td>
                    <?php if($vo['status']=='1'): ?>
                    <a class="rha-bt-a" href="javascript:;" onclick="updateReply('<?php echo $vo['id']; ?>','0')">停用</a>
                    <?php else: ?>
                    <a class="rha-bt-a" href="javascript:;" onclick="updateReply('<?php echo $vo['id']; ?>','1')">开启</a>
                    <?php endif; ?>
                    <a class="rha-bt-a" href="javascript:;" onclick="delReply('<?php echo $vo['id']; ?>')">删除</a>

                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <?php echo $data->render(); break; endswitch; ?>
    </div>
</div>
<script>
    function delReply(id) {
        layui.use('layer', function(){
            var layer = layui.layer;
            layer.confirm('你确定需要删除吗？', {
                btn: ['是','不'] //按钮
            }, function(){
                $.post("<?php echo url('mp/Mp/delRule'); ?>",{'id':id},function (res) {
                    if(res.status==1){
                        layer.alert(res.msg,function (index) {
                            window.location.reload();
                            layer.close(index);
                        })

                    }else{
                        layer.alert(res.msg)
                    }
                })
            }, function(){

            });
        });

    }
    function updateReply(id,status) {
        layui.use('layer', function(){
            var layer = layui.layer;
                $.post("<?php echo url('mp/Mp/updateRule'); ?>",{'id':id,'status':status},function (res) {
                    if(res.status==1){
                        layer.msg(res.msg,{icon:1,time:2000},function (index) {
                            window.location.reload();

                        })

                    }else{
                        layer.alert(res.msg)
                    }
                })
        });
    }

</script>

    </div>
</div>
<div class="footer">
    <div class="wrap">
        <!--请遵守安装使用协议，未经允许不得删除或者屏蔽有关RhaPHP字样-->
        <a href="http://www.rhaphp.com" target="_blank">官方社区</a>
        <i class="vs">|</i>
        Powered By RhaPHP<?php echo $copy['version']; ?> 二哈系统 Copyright © 2017 All Rights Reserved.
    </div>
</div>
</body>
<script>
    layui.use('element', function(){
        var element = layui.element;
    });
    function getMaterial(paramName,type){
        layer.open({
            type: 2,
            title: '选择素材',
            shadeClose: true,
            shade: 0.8,
            area: ['750px', '480px'],
            content: '<?php echo getHostDomain(); ?>/index.php/mp/Material/getMeterial/type/'+type+'/param/'+paramName //iframe的url
        });
    }
    function controllerByVal(value,paramName,type) {
        $('.form_'+paramName).attr('src',value);
        $("input[name="+paramName+"]").val(value);
    }
    $(function () {
         setInterval(getMsgTotal,10000);
        function getMsgTotal() {
            $.get("<?php echo url('mp/Message/getMsgStatusTotal'); ?>",{},function (res) {
                if(res.msgTotal==0){
                    //TODO
                }else{
                    $('.rhaphp-msg-user').show();
                    $('.rhaphp-msg-user').text(res.msgTotal);
                }

            })
        }
    })
</script>
</html>
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<!--[if IE 8]> <html lang="zh-cn" class="ie8"> <![endif]-->

<!--[if IE 9]> <html lang="zh-cn" class="ie9"> <![endif]-->

<!--[if !IE]><!--> <html lang="zh-cn"> <!--<![endif]-->

<!-- BEGIN HEAD -->

<head>

    <meta charset="utf-8" />

    <title><?php echo ($site["name"]); ?> | <?php echo ($title); ?></title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <meta content="<?php echo ($site["description"]); ?>" name="description" />

    <meta content="<?php echo ($site["author"]); ?>" name="author" />

    <!-- BEGIN GLOBAL MANDATORY STYLES -->

    <link href="/Public/media/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

    <link href="/Public/media/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>

    <link href="/Public/media/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

    <link href="/Public/media/css/style-metro.css" rel="stylesheet" type="text/css"/>

    <link href="/Public/media/css/style.css" rel="stylesheet" type="text/css"/>

    <link href="/Public/media/css/style-responsive.css" rel="stylesheet" type="text/css"/>

    <link href="/Public/media/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>

    <link href="/Public/media/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    

    <link href="/Public/media/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

    <link href="/Public/media/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>


    <link href="/Public/media/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

    <link href="/Public/media/css/style-metro.css" rel="stylesheet" type="text/css"/>

    <link href="/Public/media/css/style.css" rel="stylesheet" type="text/css"/>

    <link href="/Public/media/css/style-responsive.css" rel="stylesheet" type="text/css"/>

    <link href="/Public/media/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>

    <link href="/Public/media/css/uniform.default.css" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" type="text/css" href="/Public/media/css/datetimepicker.css" />

    <!--<link rel="stylesheet" type="text/css" href="/Public/media/css/timepicker.css" />-->
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL STYLES -->

    <link rel="stylesheet" type="text/css" href="/Public/media/css/select2_metro.css" />

    <link rel="stylesheet" href="/Public/media/css/DT_bootstrap.css" />



    <!-- END GLOBAL MANDATORY STYLES -->

    <link rel="shortcut icon" href="/Public/media/image/favicon.ico" />

</head>

<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class="page-header-fixed ">

<!-- BEGIN HEADER -->

<div class="header navbar navbar-inverse navbar-fixed-top">

    <!-- BEGIN TOP NAVIGATION BAR -->

    <!-- BEGIN TOP NAVIGATION BAR -->

<div class="navbar-inner">

    <div class="container-fluid">

        <!-- BEGIN LOGO -->

        <a class="brand" href="<?php echo U('Index/index');?>">

            <img src="/Public/media/image/logo.png" alt="logo" />

        </a>

        <!-- END LOGO -->

        <!-- BEGIN RESPONSIVE MENU TOGGLER -->

        <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">

            <img src="/Public/media/image/menu-toggler.png" alt="" />

        </a>

        <!-- END RESPONSIVE MENU TOGGLER -->

        <!-- BEGIN TOP NAVIGATION MENU -->

        <ul class="nav pull-right">

            <!-- BEGIN NOTIFICATION DROPDOWN -->

            <!--<li class="dropdown" id="header_notification_bar">-->

                <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown">-->

                    <!--<i class="icon-warning-sign"></i>-->

                    <!--<span class="badge">6</span>-->

                <!--</a>-->

                <!--<ul class="dropdown-menu extended notification">-->

                    <!--<li>-->

                        <!--<p>You have 14 new notifications</p>-->

                    <!--</li>-->

                    <!--<li>-->

                        <!--<a href="#">-->

                            <!--<span class="label label-success"><i class="icon-plus"></i></span>-->

                            <!--New user registered.-->

                            <!--<span class="time">Just now</span>-->

                        <!--</a>-->

                    <!--</li>-->

                    <!--<li>-->

                        <!--<a href="#">-->

                            <!--<span class="label label-important"><i class="icon-bolt"></i></span>-->

                            <!--Server #12 overloaded.-->

                            <!--<span class="time">15 mins</span>-->

                        <!--</a>-->

                    <!--</li>-->

                    <!--<li>-->

                        <!--<a href="#">-->

                            <!--<span class="label label-warning"><i class="icon-bell"></i></span>-->

                            <!--Server #2 not respoding.-->

                            <!--<span class="time">22 mins</span>-->

                        <!--</a>-->

                    <!--</li>-->

                    <!--<li>-->

                        <!--<a href="#">-->

                            <!--<span class="label label-info"><i class="icon-bullhorn"></i></span>-->

                            <!--Application error.-->

                            <!--<span class="time">40 mins</span>-->

                        <!--</a>-->

                    <!--</li>-->

                    <!--<li>-->

                        <!--<a href="#">-->

                            <!--<span class="label label-important"><i class="icon-bolt"></i></span>-->

                            <!--Database overloaded 68%.-->

                            <!--<span class="time">2 hrs</span>-->

                        <!--</a>-->

                    <!--</li>-->

                    <!--<li>-->

                        <!--<a href="#">-->

                            <!--<span class="label label-important"><i class="icon-bolt"></i></span>-->

                            <!--2 user IP blocked.-->

                            <!--<span class="time">5 hrs</span>-->

                        <!--</a>-->

                    <!--</li>-->

                    <!--<li class="external">-->

                        <!--<a href="#">See all notifications <i class="m-icon-swapright"></i></a>-->

                    <!--</li>-->

                <!--</ul>-->

            <!--</li>-->

            <!-- END NOTIFICATION DROPDOWN -->

            <!-- BEGIN INBOX DROPDOWN -->

            <!--<li class="dropdown" id="header_inbox_bar">-->

                <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown">-->

                    <!--<i class="icon-envelope"></i>-->

                    <!--<span class="badge">5</span>-->

                <!--</a>-->

                <!--<ul class="dropdown-menu extended inbox">-->

                    <!--<li>-->

                        <!--<p>You have 12 new messages</p>-->

                    <!--</li>-->

                    <!--<li>-->

                        <!--<a href="inbox.html?a=view">-->

                            <!--<span class="photo"><img src="/Public/media/image/avatar2.jpg" alt="" /></span>-->

								<!--<span class="subject">-->

								<!--<span class="from">Lisa Wong</span>-->

								<!--<span class="time">Just Now</span>-->

								<!--</span>-->

								<!--<span class="message">-->

								<!--Vivamus sed auctor nibh congue nibh. auctor nibh-->

								<!--auctor nibh...-->

								<!--</span>-->

                        <!--</a>-->

                    <!--</li>-->

                    <!--<li>-->

                        <!--<a href="inbox.html?a=view">-->

                            <!--<span class="photo"><img src="/Public/media/image/avatar3.jpg" alt="" /></span>-->

								<!--<span class="subject">-->

								<!--<span class="from">Richard Doe</span>-->

								<!--<span class="time">16 mins</span>-->

								<!--</span>-->

								<!--<span class="message">-->

								<!--Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh-->

								<!--auctor nibh...-->

								<!--</span>-->

                        <!--</a>-->

                    <!--</li>-->

                    <!--<li>-->

                        <!--<a href="inbox.html?a=view">-->

                            <!--<span class="photo"><img src="/Public/media/image/avatar1.jpg" alt="" /></span>-->

								<!--<span class="subject">-->

								<!--<span class="from">Bob Nilson</span>-->

								<!--<span class="time">2 hrs</span>-->

								<!--</span>-->

								<!--<span class="message">-->

								<!--Vivamus sed nibh auctor nibh congue nibh. auctor nibh-->

								<!--auctor nibh...-->

								<!--</span>-->

                        <!--</a>-->

                    <!--</li>-->

                    <!--<li class="external">-->

                        <!--<a href="inbox.html">See all messages <i class="m-icon-swapright"></i></a>-->

                    <!--</li>-->

                <!--</ul>-->

            <!--</li>-->

            <!-- END INBOX DROPDOWN -->

            <!-- BEGIN TODO DROPDOWN -->

            <!--<li class="dropdown" id="header_task_bar">-->

                <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown">-->

                    <!--<i class="icon-tasks"></i>-->

                    <!--<span class="badge">5</span>-->

                <!--</a>-->

                <!--<ul class="dropdown-menu extended tasks">-->

                    <!--<li>-->

                        <!--<p>You have 12 pending tasks</p>-->

                    <!--</li>-->

                    <!--<li>-->

                        <!--<a href="#">-->

								<!--<span class="task">-->

								<!--<span class="desc">New release v1.2</span>-->

								<!--<span class="percent">30%</span>-->

								<!--</span>-->

								<!--<span class="progress progress-success ">-->

								<!--<span style="width: 30%;" class="bar"></span>-->

								<!--</span>-->

                        <!--</a>-->

                    <!--</li>-->

                    <!--<li>-->

                        <!--<a href="#">-->

								<!--<span class="task">-->

								<!--<span class="desc">Application deployment</span>-->

								<!--<span class="percent">65%</span>-->

								<!--</span>-->

								<!--<span class="progress progress-danger progress-striped active">-->

								<!--<span style="width: 65%;" class="bar"></span>-->

								<!--</span>-->

                        <!--</a>-->

                    <!--</li>-->

                    <!--<li>-->

                        <!--<a href="#">-->

								<!--<span class="task">-->

								<!--<span class="desc">Mobile app release</span>-->

								<!--<span class="percent">98%</span>-->

								<!--</span>-->

								<!--<span class="progress progress-success">-->

								<!--<span style="width: 98%;" class="bar"></span>-->

								<!--</span>-->

                        <!--</a>-->

                    <!--</li>-->

                    <!--<li>-->

                        <!--<a href="#">-->

								<!--<span class="task">-->

								<!--<span class="desc">Database migration</span>-->

								<!--<span class="percent">10%</span>-->

								<!--</span>-->

								<!--<span class="progress progress-warning progress-striped">-->

								<!--<span style="width: 10%;" class="bar"></span>-->

								<!--</span>-->

                        <!--</a>-->

                    <!--</li>-->

                    <!--<li>-->

                        <!--<a href="#">-->

								<!--<span class="task">-->

								<!--<span class="desc">Web server upgrade</span>-->

								<!--<span class="percent">58%</span>-->

								<!--</span>-->

								<!--<span class="progress progress-info">-->

								<!--<span style="width: 58%;" class="bar"></span>-->

								<!--</span>-->

                        <!--</a>-->

                    <!--</li>-->

                    <!--<li>-->

                        <!--<a href="#">-->

								<!--<span class="task">-->

								<!--<span class="desc">Mobile development</span>-->

								<!--<span class="percent">85%</span>-->

								<!--</span>-->

								<!--<span class="progress progress-success">-->

								<!--<span style="width: 85%;" class="bar"></span>-->

								<!--</span>-->

                        <!--</a>-->

                    <!--</li>-->

                    <!--<li class="external">-->

                        <!--<a href="#">See all tasks <i class="m-icon-swapright"></i></a>-->

                    <!--</li>-->

                <!--</ul>-->

            <!--</li>-->

            <!-- END TODO DROPDOWN -->

            <!-- BEGIN USER LOGIN DROPDOWN -->

            <li class="dropdown user">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                    <img alt="" src="/Public/media/image/avatar1_small.jpg" />

                    <span class="username"><?php $user = S('user');echo $user['nickname']; ?></span>

                    <i class="icon-angle-down"></i>

                </a>

                <ul class="dropdown-menu">

                    <li><a href="<?php echo U('User/profile');?>"><i class="icon-user"></i>我的资料</a></li>

                    <!--<li><a href="page_calendar.html"><i class="icon-calendar"></i> My Calendar</a></li>-->

                    <!--<li><a href="inbox.html"><i class="icon-envelope"></i> My Inbox(3)</a></li>-->

                    <!--<li><a href="#"><i class="icon-tasks"></i> My Tasks</a></li>-->

                    <!--<li class="divider"></li>-->

                    <!--<li><a href="extra_lock.html"><i class="icon-lock"></i> Lock Screen</a></li>-->

                    <li><a href="<?php echo U('User/logout');?>"><i class="icon-key"></i> 退出</a></li>

                </ul>

            </li>

            <!-- END USER LOGIN DROPDOWN -->

        </ul>

        <!-- END TOP NAVIGATION MENU -->

    </div>

</div>

<!-- END TOP NAVIGATION BAR -->

    <!-- END TOP NAVIGATION BAR -->

</div>

<!-- END HEADER -->

<!-- BEGIN CONTAINER -->

<div class="page-container row-fluid">

    　<!-- BEGIN SIDEBAR -->

<div class="page-sidebar nav-collapse collapse">

    <!-- BEGIN SIDEBAR MENU -->

    <ul class="page-sidebar-menu">

        <li>

            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->

            <div class="sidebar-toggler hidden-phone"></div>

            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->

        </li>

        <li>

            <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->

            <form class="sidebar-search">

                <!--<div class="input-box">-->

                    <!--<a href="javascript:;" class="remove"></a>-->

                    <!--<input type="text" placeholder="Search..." />-->

                    <!--<input type="button" class="submit" value=" " />-->

                <!--</div>-->

            </form>

            <!-- END RESPONSIVE QUICK SEARCH FORM -->

        </li>

        <li class="
            <?php if($controller == 'Index' ): ?>active<?php endif; ?>
        start ">

        <a href="<?php echo U('Index/index');?>">

            <i class="icon-home"></i>

            <span class="title">首页</span>

        </a>

        </li>
        <li class="
             <?php if($controller == 'Member' or $controller == 'Card' ): ?>active<?php endif; ?>
        ">
        <a href="javascript:;">
            <i class="icon-th"></i>
            <span class="title">会员管理</span>
            <span class="selected"></span>
            <!--<span class="arrow open"></span>-->
                    <span class="arrow
                     <?php if($controller == 'Member' or $controller == 'Card' ): ?>open<?php endif; ?>
            "></span>

        </a>

        <ul class="sub-menu">

            <li
            <?php if($uri == 'Member/index' ): ?>class="active"<?php endif; ?>
            >

            <a href="<?php echo U('Member/index');?>">

                会员列表</a>

            </li>
            <li
            <?php if($uri == 'Card/index' ): ?>class="active"<?php endif; ?>
            >

            <a href="<?php echo U('Card/index');?>">

                会员卡列表</a>

            </li>
        </ul>

        </li>
        <li class="">
            <a href="javascript:;">
                <i class="icon-sitemap"></i>
                <span class="title">微信卡券管理</span>
                <span class="selected"></span>
                <span class="arrow"></span>

            </a>

            <ul class="sub-menu">
                <li >
                    <a href="layout_horizontal_sidebar_menu.html">
                        微信卡券列表</a>
                </li>
            </ul>

        </li>
        <li class="
        <?php if($controller == 'Notice' ): ?>active<?php endif; ?>
        ">
            <a href="javascript:;">
                <i class="icon-sitemap"></i>
                <span class="title">公告管理</span>
                <span class="selected"></span>
                <span class="arrow <?php if($controller == 'Notice' ): ?>open<?php endif; ?>"></span>

            </a>

            <ul class="sub-menu">
                <li
                <?php if($uri == 'Notice/index' ): ?>class="active"<?php endif; ?>
                >
                    <a href="<?php echo U('Notice/index');?>">
                        公告列表</a>
                </li>
            </ul>

        </li>
        <li class="
        <?php if($controller == 'Site' ): ?>active<?php endif; ?>
        ">
            <a href="javascript:;">
                <i class="icon-sitemap"></i>
                <span class="title">站点管理</span>
                <span class="selected"></span>
                <span class="arrow <?php if($controller == 'Site' ): ?>open<?php endif; ?>"></span>
            </a>
            <ul class="sub-menu">
                <li
                <?php if($uri == 'Site/index' ): ?>class="active"<?php endif; ?>
                >
                    <a href="<?php echo U('Site/index');?>">
                        站点信息</a>
                </li>
            </ul>
        </li>
        <li class="
            <?php if($controller == 'User' ): ?>active<?php endif; ?>
        last">
        <a href="javascript:;">
            <i class="icon-user"></i>
            <span class="title">用户管理</span>
                    <span class="arrow
                    <?php if($controller == 'User' ): ?>open<?php endif; ?>
            "></span>
        </a>
        <ul class="sub-menu">
            <li
            <?php if($uri == 'User/index' ): ?>class="active"<?php endif; ?>
            >
            <a href="<?php echo U('User/index');?>">
                用户列表</a>
            </li>
            <!--<li-->
            <!--<?php if($uri == '' ): ?>class="active"<?php endif; ?>-->
            <!--&gt;-->
            <!--<a href="login.html">-->
                <!--用户组管理</a>-->
            <!--</li>-->
            <!--<li >-->
                <!--<a href="login.html">-->
                    <!--用户组权限管理</a>-->
            <!--</li>-->

        </ul>

        </li>
    </ul>

    <!-- END SIDEBAR MENU -->

</div>

<!-- END SIDEBAR -->

    <!-- BEGIN PAGE -->

    <div class="page-content">

        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

        <div id="portlet-config" class="modal hide">

            <div class="modal-header">

                <button data-dismiss="modal" class="close" type="button"></button>

                <h3>portlet Settings</h3>

            </div>

            <div class="modal-body">

                <p>Here will be a configuration form</p>

            </div>

        </div>
        <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <!-- BEGIN PAGE CONTAINER-->
        <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
                <div class="span12">
                    <h3 class="page-title">
                        <?php echo ($page_title); ?> <small><?php echo ($title); ?></small>
                    </h3>
                    <ul class="breadcrumb">
                        <?php if($uri != 'Index/index' ): ?><li>
                                <i class="icon-home"></i>
                                <a href="<?php echo U('Index/index');?>">首页</a>
                                <i class="icon-angle-right"></i>
                            </li>
                            <li>
                                <a href="#"><?php echo ($page_title); ?></a>
                            </li>
                            <?php else: ?>
                            <li>
                                <i class="icon-home"></i>
                                <a href="#">首页</a>

                            </li><?php endif; ?>
                    </ul>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->

            <div class="row-fluid">

                <div class="span12">

                    
<div class="portlet box light-grey">

    <div class="portlet-title">

        <div class="caption"><i class="icon-globe"></i>管理表单</div>

        <div class="tools">

            <a href="javascript:;" class="collapse"></a>

            <!--<a href="#portlet-config" data-toggle="modal" class="config"></a>-->

            <!--<a href="javascript:;" class="reload"></a>-->

            <!--<a href="javascript:;" class="remove"></a>-->

        </div>

    </div>

    <div class="portlet-body">

        <div class="clearfix">

            <div class="btn-group">

                <button href="#addModal" id="sample_editable_1_new" data-toggle="modal" class="btn green">
                     新增 <i class="icon-plus"></i>
                </button>
            </div>
            <div class="btn-group">

                <button id="sample_editable_1_delete" class="btn green">
                    删除 <i class="icon-minus"></i>
                </button>

            </div>
            <div style="display: inline-block;padding-left: 40px;width:600px;text-align: right; " >
                <form action="<?php echo U('Card/index');?>" method="post" style="margin: 0;">
                    <input type="text" name="search_card" value="<?php echo ($search["search_card"]); ?>" placeholder="请输入查询的会员卡号"/>
                    <input type="hidden" name="searchForm" value="1">
                    <button type="submit" class="btn  green" style="margin-bottom:10px; ">查询</button>
                </form>
            </div>
            <div class="btn-group pull-right">
                <button class="btn dropdown-toggle" data-toggle="dropdown">工具 <i class="icon-angle-down"></i>
                </button>
                <ul class="dropdown-menu pull-right">
                    <!--<li><a href="#">打印</a></li>-->
                    <!--<li><a href="#">保存为PDF</a></li>-->
                    <li><a href="<?php echo U('Card/outExcel');?>">导出到Excel</a></li>
                    <li> <a id="inExcel" href="javascript:;">导入Excel</a>
                        <form n id="excelForm" action="<?php echo U('Card/inExcel');?>"  method="post"  enctype="multipart/form-data">
                            <input  class="hidden" type="file" name="excel_file" id="excel_file" />
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <table class="table table-striped table-bordered" id="sample_1">
            <thead>
            <tr>
                <th style="width:8px;" >
                    <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                    <div style="display: none;" id="temp"></div>
                </th>
                <th  >卡号</th>
                <th  >密码</th>
                <th>是否激活</th>
                <th >激活时间</th>
                <th >所属会员</th>
                <th>创建时间</th>
                <th>操作</th>
            </tr>

            </thead>

            <tbody>
            <?php if(!empty($list["list"])): if(is_array($list["list"])): $i = 0; $__LIST__ = $list["list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="odd gradeX" id="<?php echo ($vo["id"]); ?>">
                    <td><input type="checkbox" name="id" class="checkboxes" value="<?php echo ($vo["id"]); ?>" /></td>
                    <td class="editable" data-name="vip_card" data-id="<?php echo ($vo["id"]); ?>"><?php echo ($vo["vip_card"]); ?></td>
                    <td class="editable" data-name="vip_card_password" data-id="<?php echo ($vo["id"]); ?>"><?php echo ($vo["vip_card_password"]); ?></td>
                    <td  data-name="status" data-id="<?php echo ($vo["id"]); ?>"><?php if($vo["status"] == 1): ?><span class="label label-success">已激活</span>
                        <?php else: ?><span class="label label-danger">未激活</span><?php endif; ?></td>
                    <td class="" data-name="active_time"><?php echo (date("Y-m-d H:i",$vo["active_time"])); ?></td>
                    <td class="" data-name="active_time"><?php echo ($vo["member"]["name"]); ?></td>
                    <td class="" data-name="create_at"><?php echo (date("Y-m-d H:i",$vo["create_at"])); ?></td>
                    <td><?php if($vo["status"] == 1): ?><a href="javascript:enable(<?php echo ($vo["id"]); ?>,0);">重置</a>
                        <?php else: ?><a href="javascript:enable(<?php echo ($vo["id"]); ?>,1);">激活</a><?php endif; ?></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>

            </tbody>
        </table>
        <div class="pagination-right"><?php echo ($list["page"]); ?></div>

    </div>

    <!-- Modal -->
    <div id="addModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h3 id="addModalLabel">新增会员卡</h3>
        </div>
        <form action="<?php echo U('Card/create');?>" id="addForm" method="post" class="form-horizontal">
            <div class="modal-body">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <div class="control-group">
                        <label class="control-label">会员卡号</label>
                        <div class="controls">
                            <input type="text" id="vip_card" name="vip_card" class="span6 m-wrap" />
                            <span class="help-inline"></span>
                        </div>

                    </div>
                    <div class="control-group">
                        <label class="control-label">会员卡密码</label>

                        <div class="controls">

                            <input type="text" id="vip_card_password" name="vip_card_password"  class="span6 m-wrap" />

                            <span class="help-inline"></span>

                        </div>

                    </div>
                </div>
            </div>
            <div class="form-actions modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">取消</button>
                <button type="submit" class="btn blue">保存</button>
            </div>
        </form>
    </div>
    <div id="updateModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h3 id="updateModalLabel">修改会员信息</h3>
        </div>
        <form  id="updateForm" method="post" class="form-horizontal">
            <div class="modal-body">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <div class="control-group">
                        <label class="control-label">会员姓名</label>
                        <div class="controls">
                            <input type="hidden" id="update_id" name="update_id"/>
                            <input type="text" id="update_name" name="update_name" class="span6 m-wrap" />
                            <span class="help-inline"></span>
                        </div>

                    </div>
                    <div class="control-group">

                        <label class="control-label">会员生日</label>

                        <div class="controls">

                            <input type="text" id="update_birth" name="update_birth" readonly class="span6 m-wrap" />

                            <span class="help-inline"></span>

                        </div>

                    </div>
                    <div class="control-group">

                        <label class="control-label">会员手机</label>

                        <div class="controls">

                            <input type="text" name="update_phone" id="update_phone" class="span6 m-wrap" />

                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">是否启用</label>
                        <div class="controls">
                            <select class="span6 chosen" id="update_status" name="update_status" data-placeholder="Choose a Category" tabindex="1">
                                <option value="1">启用</option>
                                <option value="0">禁用</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-actions modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">取消</button>
                <button type="submit" class="btn blue">保存</button>
            </div>
        </form>
    </div>

    <div id="cardModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="cardModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h3 id="cardModalLabel">会员卡列表</h3>
        </div>
        <div class="modal-body" id="cardModalBody">


        </div>
        <div class="form-actions modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">取消</button>
            <!--<button type="submit" class="btn blue">保存</button>-->
        </div>
    </div>

</div>


                </div>

            </div>

            <!-- END PAGE CONTENT-->

        </div>

        <!-- END PAGE CONTAINER-->
    </div>
    <!-- END PAGE -->

</div>

<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->

<div class="footer">

    <div class="footer-inner">

        2013 &copy; Metronic by keenthemes.

    </div>

    <div class="footer-tools">

			<span class="go-top">

			<i class="icon-angle-up"></i>

			</span>

    </div>

</div>

<!-- END FOOTER -->

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

<!-- BEGIN CORE PLUGINS -->




    <!-- BEGIN CORE PLUGINS -->
    <!--<script src="http://static.runoob.com/assets/jquery-validation-1.14.0/lib/jquery.js"></script>-->
    <script src="/Public/media/js/jquery-1.10.1.min.js" type="text/javascript"></script>

    <script src="/Public/media/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>

    <!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->

    <!--<script src="/Public/media/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>-->

    <script src="/Public/media/js/bootstrap.min.js" type="text/javascript"></script>

    <!--[if lt IE 9]>

    <script src="/Public/media/js/excanvas.min.js"></script>

    <script src="/Public/media/js/respond.min.js"></script>

    <![endif]-->

    <script src="/Public/media/js/jquery.slimscroll.min.js" type="text/javascript"></script>

    <script src="/Public/media/js/jquery.blockui.min.js" type="text/javascript"></script>

    <script src="/Public/media/js/jquery.cookie.min.js" type="text/javascript"></script>

    <script src="/Public/media/js/jquery.uniform.min.js" type="text/javascript" ></script>

    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->

    <!--<script type="text/javascript" src="/Public/media/js/select2.min.js"></script>-->

    <!--<script type="text/javascript" src="/Public/media/js/jquery.dataTables.js"></script>-->

    <!--<script type="text/javascript" src="/Public/media/js/DT_bootstrap.js"></script>-->

    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script type="text/javascript" src="/Public/media/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="/Public/media/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="/Public/media/js/bootstrap-timepicker.js"></script>

    <script type="text/javascript" src="/Public/media/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/Public/media/js/editable-table.js"></script>
    <script type="text/javascript" src="/Public/media/js/jquery.ui.widget.js"></script>
    <script type="text/javascript" src="/Public/media/js/jquery.iframe-transport.js"></script>
    <script type="text/javascript" src="/Public/media/js/jquery.fileupload.js"></script>
    <script src="/Public/media/js/app.js"></script>
    <script src="/Public/media/js/card-managed.js"></script>

    <script>


        jQuery(document).ready(function() {
            enableUrl = "<?php echo U('Card/changeStatus');?>";

            App.init();

            CardManage.init();
        });


    </script>

    <!--<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script></body>-->



</html>
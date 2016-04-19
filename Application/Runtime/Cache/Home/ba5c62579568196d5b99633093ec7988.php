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

    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL STYLES -->

    <link rel="stylesheet" type="text/css" href="/Public/media/css/bootstrap-fileupload.css" />

    <link rel="stylesheet" type="text/css" href="/Public/media/css/jquery.gritter.css" />

    <link rel="stylesheet" type="text/css" href="/Public/media/css/chosen.css" />

    <link rel="stylesheet" type="text/css" href="/Public/media/css/select2_metro.css" />

    <link rel="stylesheet" type="text/css" href="/Public/media/css/jquery.tagsinput.css" />

    <link rel="stylesheet" type="text/css" href="/Public/media/css/clockface.css" />

    <link rel="stylesheet" type="text/css" href="/Public/media/css/bootstrap-wysihtml5.css" />

    <link rel="stylesheet" type="text/css" href="/Public/media/css/datepicker.css" />

    <link rel="stylesheet" type="text/css" href="/Public/media/css/timepicker.css" />

    <link rel="stylesheet" type="text/css" href="/Public/media/css/colorpicker.css" />

    <link rel="stylesheet" type="text/css" href="/Public/media/css/bootstrap-toggle-buttons.css" />

    <link rel="stylesheet" type="text/css" href="/Public/media/css/daterangepicker.css" />

    <link rel="stylesheet" type="text/css" href="/Public/media/css/datetimepicker.css" />

    <link rel="stylesheet" type="text/css" href="/Public/media/css/multi-select-metro.css" />

    <link href="/Public/media/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>

    <!-- END PAGE LEVEL STYLES -->

    <link rel="shortcut icon" href="/Public/media/image/favicon.ico" />


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

                <div class="input-box">

                    <a href="javascript:;" class="remove"></a>

                    <input type="text" placeholder="Search..." />

                    <input type="button" class="submit" value=" " />

                </div>

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
             <?php if($uri == 'Member' ): ?>active<?php endif; ?>
        ">
        <a href="javascript:;">
            <i class="icon-th"></i>
            <span class="title">会员管理</span>
            <span class="selected"></span>
            <!--<span class="arrow open"></span>-->
                    <span class="arrow
                     <?php if($controller == 'Member' ): ?>open<?php endif; ?>
            "></span>

        </a>

        <ul class="sub-menu">

            <li
            <?php if($uri == 'Member/index' ): ?>active<?php endif; ?>
            >

            <a href="<?php echo U('Member/index');?>">

                会员列表</a>

            </li>
            <li
            <?php if($uri == 'Member/index' ): ?>active<?php endif; ?>
            >

            <a href="<?php echo U('Member/index');?>">

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
        <li class="">
            <a href="javascript:;">
                <i class="icon-sitemap"></i>
                <span class="title">公告管理</span>
                <span class="selected"></span>
                <span class="arrow"></span>

            </a>

            <ul class="sub-menu">
                <li >
                    <a href="layout_horizontal_sidebar_menu.html">
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
            <li
            <?php if($uri == '' ): ?>class="active"<?php endif; ?>
            >
            <a href="login.html">
                用户组管理</a>
            </li>
            <li >
                <a href="login.html">
                    用户组权限管理</a>
            </li>

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

                    
    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption"><i class="icon-reorder"></i>我的基本信息</div>
        </div>

        <div class="portlet-body form">

            <table class="table table-striped table-bordered" id="sample_1">
                <thead>
                <tr>
                    <th><div style="display: none;" id="temp"></div>属性</th>
                    <th >属性值</th>
                    <th >提示</th>
                </tr>
                </thead>
                <tbody>
                <?php if(!empty($userInfo)): ?><tr class="odd gradeX">
                        <td class="input-title"><input style="display: none;"/>登陆名</td>
                        <td class="input-value editable"  data-id="<?php echo ($userInfo["id"]); ?> data-name="name"><?php echo ($userInfo["name"]); ?></td>
                        <td class="input-tips"><input style="display: none;"/><?php echo L('site_name_tips');?></td>
                    </tr>
                    <tr class="odd gradeX">
                        <td class="input-title"><input style="display: none;"/>昵称</td>
                        <td class="input-value editable"  data-id="<?php echo ($userInfo["id"]); ?>" data-name="nickname"><?php echo ($userInfo["nickname"]); ?></td>
                        <td class="input-tips"><input style="display: none;"/><?php echo L('site_keywords_tips');?> </td>
                    </tr>
                    <tr class="odd gradeX">
                        <td class="input-title"><input style="display: none;"/>邮箱</td>
                        <td class="input-value editable"  data-id="<?php echo ($userInfo["id"]); ?>" data-name="email"><?php echo ($userInfo["email"]); ?></td>
                        <td class="input-tips"><input style="display: none;"/><?php echo L('site_description_tips');?> </td>
                    </tr>
                    <tr class="odd gradeX">
                        <td class="input-title"><input style="display: none;"/>密码</td>
                        <td class="input-value editable"  data-id="<?php echo ($userInfo["id"]); ?>" data-name="password">******</td>
                        <td class="input-tips"><input style="display: none;"/><?php echo L('site_description_tips');?> </td>
                    </tr>

                    <tr class="odd gradeX">
                        <td class="input-title"><input style="display: none;"/>创建时间</td>
                        <td class="input-value "  data-id="<?php echo ($userInfo["id"]); ?>" data-name="create_at" ><?php echo (date('Y-m-d H:i',$userInfo["create_at"])); ?></td>
                        <td class="input-tips"><input style="display: none;"/><?php echo L('site_description_tips');?> </td>
                    </tr>
                    <tr class="odd gradeX">
                        <td class="input-title"><input style="display: none;"/>更新时间</td>
                        <td class="input-value "  data-id="<?php echo ($userInfo["id"]); ?>" data-name="description"><?php echo (date('Y-m-d H:i',$userInfo["update_at"])); ?></td>
                        <td class="input-tips"><input style="display: none;"/><?php echo L('site_description_tips');?> </td>
                    </tr><?php endif; ?>

                </tbody>
            </table>

        </div>

    </div>

    <!-- END SAMPLE FORM PORTLET-->


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





    <script src="/Public/media/js/jquery-1.10.1.min.js" type="text/javascript"></script>

    <script src="/Public/media/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>

    <!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->

    <script src="/Public/media/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>

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

    <script type="text/javascript" src="/Public/media/js/ckeditor.js"></script>

    <script type="text/javascript" src="/Public/media/js/bootstrap-fileupload.js"></script>

    <script type="text/javascript" src="/Public/media/js/chosen.jquery.min.js"></script>

    <script type="text/javascript" src="/Public/media/js/select2.min.js"></script>

    <script type="text/javascript" src="/Public/media/js/wysihtml5-0.3.0.js"></script>

    <script type="text/javascript" src="/Public/media/js/bootstrap-wysihtml5.js"></script>

    <script type="text/javascript" src="/Public/media/js/jquery.tagsinput.min.js"></script>

    <script type="text/javascript" src="/Public/media/js/jquery.toggle.buttons.js"></script>

    <script type="text/javascript" src="/Public/media/js/bootstrap-datepicker.js"></script>

    <script type="text/javascript" src="/Public/media/js/bootstrap-datetimepicker.js"></script>

    <script type="text/javascript" src="/Public/media/js/clockface.js"></script>

    <script type="text/javascript" src="/Public/media/js/date.js"></script>

    <script type="text/javascript" src="/Public/media/js/daterangepicker.js"></script>

    <script type="text/javascript" src="/Public/media/js/bootstrap-colorpicker.js"></script>

    <script type="text/javascript" src="/Public/media/js/bootstrap-timepicker.js"></script>

    <script type="text/javascript" src="/Public/media/js/jquery.inputmask.bundle.min.js"></script>

    <script type="text/javascript" src="/Public/media/js/jquery.input-ip-address-control-1.0.min.js"></script>

    <script type="text/javascript" src="/Public/media/js/jquery.multi-select.js"></script>

    <script src="/Public/media/js/bootstrap-modal.js" type="text/javascript" ></script>

    <script src="/Public/media/js/bootstrap-modalmanager.js" type="text/javascript" ></script>

    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->

    <script src="/Public/media/js/app.js"></script>

    <script type="text/javascript" src="/Public/media/js/editable-table.js"></script>

    <!--<script src="/Public/media/js/form-components.js"></script>-->
    <script src="/Public/media/js/table-managed.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->

    <script>

        jQuery(document).ready(function() {

            // initiate layout and plugins

            App.init();

            TableManaged.init();

        });

    </script>

    <!-- END JAVASCRIPTS -->


</html>
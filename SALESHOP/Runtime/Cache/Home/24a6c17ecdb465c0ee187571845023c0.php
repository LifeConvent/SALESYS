<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Olive Enterprise">
    <!-- END META -->

    <!-- BEGIN SHORTCUT ICON -->
    <link rel="shortcut icon" href="/SALESYS/Public/img/favicon.ico">
    <!-- END SHORTCUT ICON -->
    <title>
        CES - 课程评价管理系统
    </title>
    <!-- BEGIN STYLESHEET-->
    <link href="/SALESYS/Public/css/bootstrap.min.css" rel="stylesheet"><!-- BOOTSTRAP CSS -->
    <link href="/SALESYS/Public/css/bootstrap-reset.css" rel="stylesheet"><!-- BOOTSTRAP CSS -->
    <link href="/SALESYS/Public/assets/font-awesome/css/font-awesome.css" rel="stylesheet"><!-- 字体 -->
    <link href="/SALESYS/Public/css/style.css" rel="stylesheet"><!-- THEME BASIC CSS -->
    <link href="/SALESYS/Public/css/style-responsive.css" rel="stylesheet"><!-- THEME RESPONSIVE CSS -->
    <link rel="stylesheet" type="text/css" href="/SALESYS/Public/assets/nestable/jquery.nestable.css"><!-- NESTABLE CSS -->
    <link href="/SALESYS/Public/css/sco.message.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="/SALESYS/Public/js/html5shiv.js">
    </script>
    <script src="/SALESYS/Public/js/respond.min.js">
    </script>
    <![endif]-->
    <!-- END STYLESHEET-->
</head>
<script type="text/javascript">
    var HOST = "http://localhost/SALESYS/";
</script>
<body id="body">
<!-- SECTION -->
<section id="container">

    
<!-- 头栏 -->
<header class="header white-bg">

    <!-- SIDEBAR TOGGLE BUTTON -->
    <div class="sidebar-toggle-box">
        <div data-placement="right" class="fa fa-bars tooltips">
        </div>
    </div>
    <!-- SIDEBAR TOGGLE BUTTON  END-->

    <a href="" class="logo">
        CES
          <span>
            课程评价管理系统
          </span>
    </a>

    <!-- 头栏通知 -->
    <nav class="nav notify-row dis-none" id="top_menu">

        <ul class="nav top-menu">

            <!-- 待办事项／任务栏 -->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <i class="fa fa-tasks"></i>
                    <span class="badge bg-success">5</span>
                </a>

                <ul class="dropdown-menu extended tasks-bar">
                    <li class="notify-arrow notify-arrow-blue">
                    </li>
                    <li>
                        <p class="blue">
                            您有5项任务待完成
                        </p>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">
                                    第一项
                                </div>
                                <div class="percent">
                                    40%
                                </div>
                            </div>
                            <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-success set-40" role="progressbar"
                                     aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                        <span class="sr-only">
                                          40% Complete (success)
                                        </span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">
                                    第二项
                                </div>
                                <div class="percent">
                                    60%
                                </div>
                            </div>
                            <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-warning set-60" role="progressbar"
                                     aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                                        <span class="sr-only">
                                          60% Complete (warning)
                                        </span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">
                                    第三项
                                </div>
                                <div class="percent">
                                    87%
                                </div>
                            </div>
                            <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-info set-87" role="progressbar"
                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                        <span class="sr-only">
                                          87% 完成
                                        </span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">
                                    第四项
                                </div>
                                <div class="percent">
                                    33%
                                </div>
                            </div>
                            <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-danger set-33" role="progressbar"
                                     aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                        <span class="sr-only">
                                          33% 完成 (danger)
                                        </span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">
                                    第五项
                                </div>
                                <div class="percent">
                                    45%
                                </div>
                            </div>
                            <div class="progress progress-striped active">
                                <div class="progress-bar set-45" role="progressbar" aria-valuenow="45"
                                     aria-valuemin="0" aria-valuemax="100">
                                        <span class="sr-only">
                                          45% 完成
                                        </span>
                                </div>

                            </div>
                        </a>
                    </li>
                    <li class="external">
                        <a href="#">
                            查看所有任务
                        </a>
                    </li>
                </ul>

            </li>
            <!-- 待办事项／任务栏 -->

            <!-- 系统提示 -->
            <li id="header_notification_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <i class="fa fa-bell-o">
                    </i>
                <span class="badge bg-warning">
                  5
                </span>
                </a>
                <ul class="dropdown-menu extended notification">
                    <li class="notify-arrow notify-arrow-blue">
                    </li>
                    <li>
                        <p class="blue">
                            您有5项新提示
                        </p>
                    </li>
                    <li>
                        <a href="#">
                    <span class="label label-danger">
                      <i class="fa fa-bolt">
                      </i>
                    </span>
                            首要
                    <span class="small italic">
                      34 mins
                    </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                    <span class="label label-warning">
                      <i class="fa fa-bell">
                      </i>
                    </span>
                            第一项
                    <span class="small italic">
                      1 小时
                    </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                    <span class="label label-danger">
                      <i class="fa fa-bolt">
                      </i>
                    </span>
                            第二项
                    <span class="small italic">
                      4 小时
                    </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                    <span class="label label-success">
                      <i class="fa fa-plus">
                      </i>
                    </span>
                            第三项
                    <span class="small italic">
                      现在
                    </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                    <span class="label label-primary">
                      <i class="fa fa-bullhorn">
                      </i>
                    </span>
                            第四项
                    <span class="small italic">
                      10 分钟
                    </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            查看所有事项
                        </a>
                    </li>
                </ul>
            </li>
            <!-- 系统提示 -->

        </ul>

    </nav>
    <!-- 头栏通知 -->


    <!-- 登录状态下拉表  -->
    <div class="top-nav ">
        <ul class="nav pull-right top-menu">

            <li>
                <input type="text" class="form-control search" placeholder="查找">
            </li>

            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#" style="margin-top:4px">
                            <span class="username" style="padding-left:6px">
                              <?php echo ($username); ?>
                            </span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <li class="log-arrow-up">
                    </li>
                    <li>
                        <a href="#">
                            <i class=" fa fa-suitcase">
                            </i>
                            文件中心
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-cog">
                            </i>
                            设置
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-bell-o">
                            </i>
                            通知
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo U('Home/Method/back');?>">
                            <i class="fa fa-key"></i>
                            退出
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- 登录状态下拉表  -->

</header>
<!-- 头栏 -->
    <!-- 边栏 -->
<aside>
    <div id="sidebar" class="nav-collapse">
        <ul class="sidebar-menu" id="nav-accordion">

            <!--主菜单-->
            <li>
                <a href="<?php echo U('Home/Home/home');?>" id="home">
                    <i class="fa fa-dashboard"></i>
                        <span style="font-size: 14px;">
                          统计分析
                        </span>
                </a>
            </li>

            <!--菜单一-->
            <li class="sub-menu">
                <a href="javascript:;" id="weChat">
                    <i class="fa fa-laptop"></i>
                            <span style="font-size: 14px;">
                              微信服务
                            </span>
                            <span class="label label-success span-sidebar">
                              3
                            </span>
                </a>
                <ul class="sub" id="weChat_sub">
                    <li id="weChat_menu">
                        <a href="<?php echo U('Home/WeChat/setWeChatMenu');?>" style="font-size: 12px;">
                            公众号菜单设置
                        </a>
                    </li>
                    <li id="weChat_groupSend">
                        <a href="<?php echo U('Home/WeChat/messageGroupSend');?>" style="font-size: 12px;">
                            公众号消息群发
                        </a>
                    </li>
                    <li id="weChat_autoSend">
                        <a href="<?php echo U('Home/WeChat/setAutoRes');?>" style="font-size: 12px;">
                            用户消息回复设置
                        </a>
                    </li>
                    <li class="dis-none">
                        <a href="" target="_blank" style="font-size: 12px;">
                            用户标签管理
                        </a>
                    </li>
                </ul>
            </li>

            <!--菜单二-->
            <li class="sub-menu">
                <a href="javascript:;" id="user">
                    <i class="fa fa-book">
                    </i>
                            <span style="font-size: 14px;">
                              用户管理
                            </span>
                            <span class="label label-info span-sidebar">
                              1
                            </span>
                </a>
                <ul class="sub" id="user_sub">
                    <li id="user_manager">
                        <a href="<?php echo U('Home/UserManage/userManage');?>" style="font-size: 12px;">
                            用户信息管理
                        </a>
                    </li>
                    <li class="dis-none">
                        <a href="">
                            子菜单
                        </a>
                    </li>
                    <li class="dis-none">
                        <a href="">
                            子菜单
                        </a>
                    </li>
                </ul>
            </li>

            <!--菜单三-->
            <li class="sub-menu">
                <a href="javascript:;" id="course">
                    <i class="fa fa-cogs">
                    </i>
                            <span style="font-size: 14px;">
                              课程管理
                            </span>
                            <span class="label label-primary span-sidebar">
                              5
                            </span>
                </a>

                <ul class="sub" id="course_sub">
                    <li id="course_info">
                        <a href="<?php echo U('Home/CourseManage/courseManage');?>" style="font-size: 12px;">
                            课程信息管理
                        </a>
                    </li>
                    <li id="course_survey">
                        <a href="<?php echo U('Home/CourseManage/surveyManage');?>" style="font-size: 12px;">
                            课程问卷管理
                        </a>
                    </li>
                    <li id="course_survey_publish">
                        <a href="<?php echo U('Home/CourseManage/surveyPublish');?>" style="font-size: 12px;">
                            课程问卷发布
                        </a>
                    </li>
                    <li id="course_count">
                        <a href="<?php echo U('Home/CourseManage/surveyCondition');?>" style="font-size: 12px;">
                            问卷完成情况
                        </a>
                    </li>
                    <li id="course_survey_demo_publish">
                        <a href="<?php echo U('Home/CourseManage/coursePublish');?>" style="font-size: 12px;">
                            按课程发布模版问卷
                        </a>
                    </li>
                </ul>
            </li>

            <!--菜单四-->
            <li class="sub-menu">
                <a href="javascript:;" id="data">
                    <i class="fa fa-tasks">
                    </i>
                            <span style="font-size: 14px;">
                              数据管理
                            </span>
                            <span class="label label-info span-sidebar">
                              2
                            </span>
                </a>

                <ul class="sub" id="data_sub">
                    <li id="data_course">
                        <a href="<?php echo U('Home/DataManage/userCourse');?>" style="font-size: 12px;">
                             系统数据维护
                        </a>
                    </li>
                    <!--<li id="data_sys_course">-->
                        <!--<a href="<?php echo U('Home/DataManage/sysCourse');?>" style="font-size: 12px;">-->
                            <!--系统课程维护-->
                        <!--</a>-->
                    <!--</li>-->
                    <!--<li id="data_user_info">-->
                        <!--<a href="<?php echo U('Home/DataManage/userInfo');?>" style="font-size: 12px;">-->
                            <!--用户信息维护-->
                        <!--</a>-->
                    <!--</li>-->
                    <li id="data_count">
                        <a href="<?php echo U('Home/DataManage/surveyCount');?>" style="font-size: 12px;">
                            评价结果统计
                        </a>
                    </li>
                    <li class="dis-none">
                        <a href="">
                            子菜单
                        </a>
                    </li>
                    <li class="dis-none">
                        <a href="">
                            子菜单
                        </a>
                    </li>
                </ul>
            </li>

            <!--登陆界面-->
            <li>
                <a href="<?php echo U('Home/Method/back');?>">
                    <i class="fa fa-user">
                    </i>
                        <span style="font-size: 14px;">
                           登录页面
                        </span>
                </a>
            </li>
        </ul>
    </div>
</aside>
<!-- 边栏 -->

    <!-- 主窗体 -->
    <section id="main-content">

        <!-- 主容器  -->
        <section class="wrapper">

            <!--微信菜单设置注意事项-->
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h1 class="panel-title-red">
                        微信菜单设置注意事项：
                    </h1>
                </div>
                <div class="panel-body" rows="8">
                    1、自定义菜单最多包括3个一级菜单，每个一级菜单最多包含5个二级菜单。<br>
                    2、一级菜单最多4个汉字，二级菜单最多7个汉字，多出来的部分将会以“...”代替。<br>
                    3、创建自定义菜单后，由于微信客户端缓存，需要24小时微信客户端才会展现出来。测试时可以尝试取消关注公众账号后再次关注，则可以看到创建后的效果。<br>
                    <br><br><br><br><br>
                </div>
            </div>

            <!--微信菜单设置-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            微信菜单设置

                            <span class="tools pull-right">

                                <div id="nestable_list_menu" class="data-action-div">
                                    <a href="javascript:;" data-action="expand-all">
                                        展开菜单
                                    </a>
                                    <a href="javascript:;" data-action="collapse-all" class="data-action-a">
                                        合并菜单
                                    </a>
                                </div>
                                <div class="right">
                                    <a href="javascript:;" onclick="refreshRequset();"
                                       class="fa fa-rotate-right data-action-refresh">
                                    </a>
                                    <a href="javascript:;" onclick="checkNestable();" class="data-action-submit">
                                        提交菜单设置
                                    </a>
                                </div>

                            </span>
                        </header>
                        <div class="panel-body">
                            <div class="dd col-lg-12" id="nestable_list_1">
                                <ol class="col-lg-12 dd-list">

                                    <li class="dd-item dd3-item" data-id="1" id="nestable1" style="display:block">
                                        <div class="dd-handle dd3-handle"></div>
                                        <div class="dd3-content-et">
                                            <div class="order-left-20">
                                                <label class="order-label">1</label>
                                            </div>
                                            <input type="text" id="nestable-1-menu" placeholder="请输入菜单名称："
                                                   class="nestable-et order_input" style="display:block">

                                            <div class="order-left-10" id="nestable-1-2">
                                                <label class="order-label">2</label>
                                            </div>
                                            <label class="order-label left" id="nestable-1-hint">请选择菜单类型:</label>

                                            <select class="dd3-content-et m-bot15 order-select" id="nestable-1-type"
                                                    style="display:block">
                                                <option value="view">链接</option>
                                                <option value="click">文本</option>
                                            </select>

                                            <div class="order-left-10" id="nestable-1-3">
                                                <label class="order-label">3</label>
                                            </div>
                                            <input type="text" placeholder="请输入链接url地址或文本内容："
                                                   class="nestable-et order_input width-250" id="nestable-1-content"
                                                   style="display:block">

                                            <div class="bg-order-delete-ol">
                                                <a href="javascript:;" onclick="nesTableHide('nestable1');"
                                                   class="fa order-delete" data-toggle="modal"><label>删除所有</label></a>
                                            </div>

                                            <div class="netsable-add-bg" id="nestable-add-2">
                                                <a href="javascript:;" onclick="addNestable('nestable2');"><label
                                                        class="nestable-add">+</label></a>
                                            </div>
                                        </div>

                                        <ol class="dd-list">
                                            <li class="dd-item dd3-item dis-none" id="nestable2" data-id="2"
                                                style="display:none">
                                                <div class="dd-handle dd3-handle"></div>
                                                <div class="dd3-content-et">
                                                    <div class="order-left-20">
                                                        <label class="order-label">1</label>
                                                    </div>
                                                    <input type="text" id="nestable-2-menu"
                                                           class="nestable-et order_input" style="display:block">

                                                    <div class="order-left-10">
                                                        <label class="order-label">2</label>
                                                    </div>
                                                    <label class="order-label left">请选择菜单类型:</label>

                                                    <select class="dd3-content-et m-bot15 order-select"
                                                            id="nestable-2-type" style="display:block">
                                                        <option value="view">链接</option>
                                                        <option value="click">文本</option>
                                                    </select>

                                                    <div class="order-left-10">
                                                        <label class="order-label">3</label>
                                                    </div>
                                                    <input type="text" class="nestable-et order_input width-250"
                                                           placeholder="请输入链接url地址或文本内容："
                                                           id="nestable-2-content" style="display:block">

                                                    <div class="bg-order-delete" id="nestable-2-delete">
                                                        <a onclick="nesTableHide('nestable2');" class="fa order-delete"><label>删除</label></a>
                                                    </div>

                                                    <div class="netsable-add-bg" id="nestable-add-3">
                                                        <a href="javascript:;"
                                                           onclick="addNestable('nestable3');"><label
                                                                class="nestable-add">+</label></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="dd-item dd3-item dis-none" id="nestable3" data-id="3"
                                                style="display:none">
                                                <div class="dd-handle dd3-handle"></div>
                                                <div class="dd3-content-et">
                                                    <div class="order-left-20">
                                                        <label class="order-label">1</label>
                                                    </div>
                                                    <input type="text" id="nestable-3-menu"
                                                           class="nestable-et order_input" style="display:block">

                                                    <div class="order-left-10">
                                                        <label class="order-label">2</label>
                                                    </div>
                                                    <label class="order-label left">请选择菜单类型:</label>

                                                    <select class="dd3-content-et m-bot15 order-select"
                                                            id="nestable-3-type" style="display:block">
                                                        <option value="view">链接</option>
                                                        <option value="click">文本</option>
                                                    </select>

                                                    <div class="order-left-10">
                                                        <label class="order-label">3</label>
                                                    </div>
                                                    <input type="text" class="nestable-et order_input width-250"
                                                           id="nestable-3-content" style="display:block">

                                                    <div class="bg-order-delete" id="nestable-3-delete">
                                                        <a onclick="nesTableHide('nestable3');" class="fa order-delete"><label>删除</label></a>
                                                    </div>

                                                    <div class="netsable-add-bg" id="nestable-add-4">
                                                        <a href="javascript:;"
                                                           onclick="addNestable('nestable4');"><label
                                                                class="nestable-add">+</label></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="dd-item dd3-item dis-none" id="nestable4" data-id="4"
                                                style="display:none">
                                                <div class="dd-handle dd3-handle"></div>
                                                <div class="dd3-content-et">
                                                    <div class="order-left-20">
                                                        <label class="order-label">1</label>
                                                    </div>
                                                    <input type="text" id="nestable-4-menu"
                                                           class="nestable-et order_input" style="display:block">

                                                    <div class="order-left-10">
                                                        <label class="order-label">2</label>
                                                    </div>
                                                    <label class="order-label left">请选择菜单类型:</label>

                                                    <select class="dd3-content-et m-bot15 order-select"
                                                            id="nestable-4-type" style="display:block">
                                                        <option value="view">链接</option>
                                                        <option value="click">文本</option>
                                                    </select>

                                                    <div class="order-left-10">
                                                        <label class="order-label">3</label>
                                                    </div>
                                                    <input type="text" class="nestable-et order_input width-250"
                                                           id="nestable-4-content" style="display:block">

                                                    <div class="bg-order-delete" id="nestable-4-delete">
                                                        <a onclick="nesTableHide('nestable4');" class="fa order-delete"><label>删除</label></a>
                                                    </div>

                                                    <div class="netsable-add-bg" id="nestable-add-5">
                                                        <a href="javascript:;"
                                                           onclick="addNestable('nestable5');"><label
                                                                class="nestable-add">+</label></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="dd-item dd3-item dis-none" id="nestable5" data-id="5"
                                                style="display:none">
                                                <div class="dd-handle dd3-handle"></div>
                                                <div class="dd3-content-et">
                                                    <div class="order-left-20">
                                                        <label class="order-label">1</label>
                                                    </div>
                                                    <input type="text" id="nestable-5-menu"
                                                           class="nestable-et order_input" style="display:block">

                                                    <div class="order-left-10">
                                                        <label class="order-label">2</label>
                                                    </div>
                                                    <label class="order-label left">请选择菜单类型:</label>

                                                    <select class="dd3-content-et m-bot15 order-select"
                                                            id="nestable-5-type" style="display:block">
                                                        <option value="view">链接</option>
                                                        <option value="click">文本</option>
                                                    </select>

                                                    <div class="order-left-10">
                                                        <label class="order-label">3</label>
                                                    </div>
                                                    <input type="text" class="nestable-et order_input width-250"
                                                           id="nestable-5-content" style="display:block">

                                                    <div class="bg-order-delete" id="nestable-5-delete">
                                                        <a onclick="nesTableHide('nestable5');" class="fa order-delete"><label>删除</label></a>
                                                    </div>

                                                    <div class="netsable-add-bg" id="nestable-add-6">
                                                        <a href="javascript:;"
                                                           onclick="addNestable('nestable6');"><label
                                                                class="nestable-add">+</label></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="dd-item dd3-item dis-none" id="nestable6" data-id="6"
                                                style="display:none">
                                                <div class="dd-handle dd3-handle"></div>
                                                <div class="dd3-content-et">
                                                    <div class="order-left-20">
                                                        <label class="order-label">1</label>
                                                    </div>
                                                    <input type="text" id="nestable-6-menu"
                                                           class="nestable-et order_input" style="display:block">

                                                    <div class="order-left-10">
                                                        <label class="order-label">2</label>
                                                    </div>
                                                    <label class="order-label left">请选择菜单类型:</label>

                                                    <select class="dd3-content-et m-bot15 order-select"
                                                            id="nestable-6-type" style="display:block">
                                                        <option value="view">链接</option>
                                                        <option value="click">文本</option>
                                                    </select>

                                                    <div class="order-left-10">
                                                        <label class="order-label">3</label>
                                                    </div>
                                                    <input type="text" class="nestable-et order_input width-250"
                                                           id="nestable-6-content" style="display:block">

                                                    <div class="bg-order-delete">
                                                        <a onclick="nesTableHide('nestable6');" class="fa order-delete"><label>删除</label></a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ol>
                                    </li>

                                    <li class="dd-item dd3-item" data-id="7" id="nestable7" style="display:block">
                                        <div class="dd-handle dd3-handle"></div>
                                        <div class="dd3-content-et">
                                            <div class="order-left-20">
                                                <label class="order-label">1</label>
                                            </div>
                                            <input type="text" id="nestable-7-menu" placeholder="请输入菜单名称："
                                                   class="nestable-et order_input" style="display:block">

                                            <div class="order-left-10" id="nestable-7-2">
                                                <label class="order-label">2</label>
                                            </div>
                                            <label class="order-label left" id="nestable-7-hint">请选择菜单类型:</label>

                                            <select class="dd3-content-et m-bot15 order-select" id="nestable-7-type"
                                                    style="display:block">
                                                <option value="view">链接</option>
                                                <option value="click">文本</option>
                                            </select>

                                            <div class="order-left-10" id="nestable-7-3">
                                                <label class="order-label">3</label>
                                            </div>
                                            <input type="text" placeholder="请输入链接url地址或文本内容："
                                                   class="nestable-et order_input width-250" id="nestable-7-content"
                                                   style="display:block">

                                            <div class="bg-order-delete-ol">
                                                <a onclick="nesTableHide('nestable7');" class="fa order-delete"><label>删除所有</label></a>
                                            </div>

                                            <div class="netsable-add-bg" id="nestable-add-8">
                                                <a href="javascript:;" onclick="addNestable('nestable8');"><label
                                                        class="nestable-add">+</label></a>
                                            </div>

                                        </div>

                                        <ol class="dd-list">
                                            <li class="dd-item dd3-item dis-none" id="nestable8" data-id="8"
                                                style="display:none">
                                                <div class="dd-handle dd3-handle"></div>
                                                <div class="dd3-content-et">
                                                    <div class="order-left-20">
                                                        <label class="order-label">1</label>
                                                    </div>
                                                    <input type="text" id="nestable-8-menu"
                                                           class="nestable-et order_input" style="display:block">

                                                    <div class="order-left-10">
                                                        <label class="order-label">2</label>
                                                    </div>
                                                    <label class="order-label left">请选择菜单类型:</label>

                                                    <select class="dd3-content-et m-bot15 order-select"
                                                            id="nestable-8-type" style="display:block">
                                                        <option value="view">链接</option>
                                                        <option value="click">文本</option>
                                                    </select>

                                                    <div class="order-left-10">
                                                        <label class="order-label">3</label>
                                                    </div>
                                                    <input type="text" class="nestable-et order_input width-250"
                                                           placeholder="请输入链接url地址或文本内容："
                                                           id="nestable-8-content" style="display:block">

                                                    <div class="bg-order-delete" id="nestable-8-delete">
                                                        <a onclick="nesTableHide('nestable8');" class="fa order-delete"><label>删除</label></a>
                                                    </div>

                                                    <div class="netsable-add-bg" id="nestable-add-9">
                                                        <a href="javascript:;"
                                                           onclick="addNestable('nestable9');"><label
                                                                class="nestable-add">+</label></a>
                                                    </div>

                                                </div>
                                            </li>
                                            <li class="dd-item dd3-item dis-none" id="nestable9" data-id="9"
                                                style="display:none">
                                                <div class="dd-handle dd3-handle"></div>
                                                <div class="dd3-content-et">
                                                    <div class="order-left-20">
                                                        <label class="order-label">1</label>
                                                    </div>
                                                    <input type="text" id="nestable-9-menu"
                                                           class="nestable-et order_input" style="display:block">

                                                    <div class="order-left-10">
                                                        <label class="order-label">2</label>
                                                    </div>
                                                    <label class="order-label left">请选择菜单类型:</label>

                                                    <select class="dd3-content-et m-bot15 order-select"
                                                            id="nestable-9-type" style="display:block">
                                                        <option value="view">链接</option>
                                                        <option value="click">文本</option>
                                                    </select>

                                                    <div class="order-left-10">
                                                        <label class="order-label">3</label>
                                                    </div>
                                                    <input type="text" class="nestable-et order_input width-250"
                                                           id="nestable-9-content" style="display:block">

                                                    <div class="bg-order-delete" id="nestable-9-delete">
                                                        <a onclick="nesTableHide('nestable9');" class="fa order-delete"><label>删除</label></a>
                                                    </div>

                                                    <div class="netsable-add-bg" id="nestable-add-10">
                                                        <a href="javascript:;"
                                                           onclick="addNestable('nestable10');"><label
                                                                class="nestable-add">+</label></a>
                                                    </div>

                                                </div>
                                            </li>
                                            <li class="dd-item dd3-item dis-none" id="nestable10" data-id="10"
                                                style="display:none">
                                                <div class="dd-handle dd3-handle"></div>
                                                <div class="dd3-content-et">
                                                    <div class="order-left-20">
                                                        <label class="order-label">1</label>
                                                    </div>
                                                    <input type="text" id="nestable-10-menu"
                                                           class="nestable-et order_input" style="display:block">

                                                    <div class="order-left-10">
                                                        <label class="order-label">2</label>
                                                    </div>
                                                    <label class="order-label left">请选择菜单类型:</label>

                                                    <select class="dd3-content-et m-bot15 order-select"
                                                            id="nestable-10-type" style="display:block">
                                                        <option value="view">链接</option>
                                                        <option value="click">文本</option>
                                                    </select>

                                                    <div class="order-left-10">
                                                        <label class="order-label">3</label>
                                                    </div>
                                                    <input type="text" class="nestable-et order_input width-250"
                                                           id="nestable-10-content" style="display:block">

                                                    <div class="bg-order-delete" id="nestable-10-delete">
                                                        <a onclick="nesTableHide('nestable10');"
                                                           class="fa order-delete"><label>删除</label></a>
                                                    </div>

                                                    <div class="netsable-add-bg" id="nestable-add-11">
                                                        <a href="javascript:;"
                                                           onclick="addNestable('nestable11');"><label
                                                                class="nestable-add">+</label></a>
                                                    </div>

                                                </div>
                                            </li>
                                            <li class="dd-item dd3-item dis-none" id="nestable11" data-id="11"
                                                style="display:none">
                                                <div class="dd-handle dd3-handle"></div>
                                                <div class="dd3-content-et">
                                                    <div class="order-left-20">
                                                        <label class="order-label">1</label>
                                                    </div>
                                                    <input type="text" id="nestable-11-menu"
                                                           class="nestable-et order_input" style="display:block">

                                                    <div class="order-left-10">
                                                        <label class="order-label">2</label>
                                                    </div>
                                                    <label class="order-label left">请选择菜单类型:</label>

                                                    <select class="dd3-content-et m-bot15 order-select"
                                                            id="nestable-11-type" style="display:block">
                                                        <option value="view">链接</option>
                                                        <option value="click">文本</option>
                                                    </select>

                                                    <div class="order-left-10">
                                                        <label class="order-label">3</label>
                                                    </div>
                                                    <input type="text" class="nestable-et order_input width-250"
                                                           id="nestable-11-content" style="display:block">

                                                    <div class="bg-order-delete" id="nestable-11-delete">
                                                        <a onclick="nesTableHide('nestable11');"
                                                           class="fa order-delete"><label>删除</label></a>
                                                    </div>

                                                    <div class="netsable-add-bg" id="nestable-add-12">
                                                        <a href="javascript:;"
                                                           onclick="addNestable('nestable12');"><label
                                                                class="nestable-add">+</label></a>
                                                    </div>

                                                </div>
                                            </li>
                                            <li class="dd-item dd3-item dis-none" id="nestable12" data-id="12"
                                                style="display:none">
                                                <div class="dd-handle dd3-handle"></div>
                                                <div class="dd3-content-et">
                                                    <div class="order-left-20">
                                                        <label class="order-label">1</label>
                                                    </div>
                                                    <input type="text" id="nestable-12-menu"
                                                           class="nestable-et order_input" style="display:block">

                                                    <div class="order-left-10">
                                                        <label class="order-label">2</label>
                                                    </div>
                                                    <label class="order-label left">请选择菜单类型:</label>

                                                    <select class="dd3-content-et m-bot15 order-select"
                                                            id="nestable-12-type" style="display:block">
                                                        <option value="view">链接</option>
                                                        <option value="click">文本</option>
                                                    </select>

                                                    <div class="order-left-10">
                                                        <label class="order-label">3</label>
                                                    </div>
                                                    <input type="text" class="nestable-et order_input width-250"
                                                           id="nestable-12-content" style="display:block">

                                                    <div class="bg-order-delete">
                                                        <a onclick="nesTableHide('nestable12');"
                                                           class="fa order-delete"><label>删除</label></a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ol>
                                    </li>

                                    <li class="dd-item dd3-item" data-id="13" id="nestable13" style="display:block">
                                        <div class="dd-handle dd3-handle"></div>
                                        <div class="dd3-content-et">
                                            <div class="order-left-20">
                                                <label class="order-label">1</label>
                                            </div>
                                            <input type="text" id="nestable-13-menu" placeholder="请输入菜单名称："
                                                   class="nestable-et order_input" style="display:block">

                                            <div class="order-left-10" id="nestable-13-2">
                                                <label class="order-label">2</label>
                                            </div>
                                            <label class="order-label left" id="nestable-13-hint">请选择菜单类型:</label>

                                            <select class="dd3-content-et m-bot15 order-select" id="nestable-13-type"
                                                    style="display:block">
                                                <option value="view">链接</option>
                                                <option value="click">文本</option>
                                            </select>

                                            <div class="order-left-10" id="nestable-13-3">
                                                <label class="order-label">3</label>
                                            </div>
                                            <input type="text" placeholder="请输入链接url地址或文本内容："
                                                   class="nestable-et order_input width-250" id="nestable-13-content"
                                                   style="display:block">

                                            <div class="bg-order-delete-ol">
                                                <a onclick="nesTableHide('nestable13');" class="fa order-delete"><label>删除所有</label></a>
                                            </div>

                                            <div class="netsable-add-bg" id="nestable-add-14">
                                                <a href="javascript:;" onclick="addNestable('nestable14')"><label
                                                        class="nestable-add">+</label></a>
                                            </div>
                                        </div>

                                        <ol class="dd-list">
                                            <li class="dd-item dd3-item dis-none" id="nestable14" data-id="14"
                                                style="display:none">
                                                <div class="dd-handle dd3-handle"></div>
                                                <div class="dd3-content-et">
                                                    <div class="order-left-20">
                                                        <label class="order-label">1</label>
                                                    </div>
                                                    <input type="text" id="nestable-14-menu"
                                                           class="nestable-et order_input" style="display:block">

                                                    <div class="order-left-10">
                                                        <label class="order-label">2</label>
                                                    </div>
                                                    <label class="order-label left">请选择菜单类型:</label>

                                                    <select class="dd3-content-et m-bot15 order-select"
                                                            id="nestable-14-type" style="display:block">
                                                        <option value="view">链接</option>
                                                        <option value="click">文本</option>
                                                    </select>

                                                    <div class="order-left-10">
                                                        <label class="order-label">3</label>
                                                    </div>
                                                    <input type="text" class="nestable-et order_input width-250"
                                                           placeholder="请输入链接url地址或文本内容："
                                                           id="nestable-14-content" style="display:block">

                                                    <div class="bg-order-delete" id="nestable-14-delete">
                                                        <a onclick="nesTableHide('nestable14');"
                                                           class="fa order-delete"><label>删除</label></a>
                                                    </div>

                                                    <div class="netsable-add-bg" id="nestable-add-15">
                                                        <a href="javascript:;"
                                                           onclick="addNestable('nestable15');"><label
                                                                class="nestable-add">+</label></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="dd-item dd3-item dis-none" id="nestable15" data-id="15"
                                                style="display:none">
                                                <div class="dd-handle dd3-handle"></div>
                                                <div class="dd3-content-et">
                                                    <div class="order-left-20">
                                                        <label class="order-label">1</label>
                                                    </div>
                                                    <input type="text" id="nestable-15-menu"
                                                           class="nestable-et order_input" style="display:block">

                                                    <div class="order-left-10">
                                                        <label class="order-label">2</label>
                                                    </div>
                                                    <label class="order-label left">请选择菜单类型:</label>

                                                    <select class="dd3-content-et m-bot15 order-select"
                                                            id="nestable-15-type" style="display:block">
                                                        <option value="view">链接</option>
                                                        <option value="click">文本</option>
                                                    </select>

                                                    <div class="order-left-10">
                                                        <label class="order-label">3</label>
                                                    </div>
                                                    <input type="text" class="nestable-et order_input width-250"
                                                           id="nestable-15-content" style="display:block">

                                                    <div class="bg-order-delete" id="nestable-15-delete">
                                                        <a onclick="nesTableHide('nestable15');"
                                                           class="fa order-delete"><label>删除</label></a>
                                                    </div>

                                                    <div class="netsable-add-bg" id="nestable-add-16">
                                                        <a href="javascript:;"
                                                           onclick="addNestable('nestable16');"><label
                                                                class="nestable-add">+</label></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="dd-item dd3-item dis-none" id="nestable16" data-id="16"
                                                style="display:none">
                                                <div class="dd-handle dd3-handle"></div>
                                                <div class="dd3-content-et">
                                                    <div class="order-left-20">
                                                        <label class="order-label">1</label>
                                                    </div>
                                                    <input type="text" id="nestable-16-menu"
                                                           class="nestable-et order_input" style="display:block">

                                                    <div class="order-left-10">
                                                        <label class="order-label">2</label>
                                                    </div>
                                                    <label class="order-label left">请选择菜单类型:</label>

                                                    <select class="dd3-content-et m-bot15 order-select"
                                                            id="nestable-16-type" style="display:block">
                                                        <option value="view">链接</option>
                                                        <option value="click">文本</option>
                                                    </select>

                                                    <div class="order-left-10">
                                                        <label class="order-label">3</label>
                                                    </div>
                                                    <input type="text" class="nestable-et order_input width-250"
                                                           id="nestable-16-content" style="display:block">

                                                    <div class="bg-order-delete" id="nestable-16-delete">
                                                        <a onclick="nesTableHide('nestable16');"
                                                           class="fa order-delete"><label>删除</label></a>
                                                    </div>

                                                    <div class="netsable-add-bg" id="nestable-add-17">
                                                        <a href="javascript:;"
                                                           onclick="addNestable('nestable17');"><label
                                                                class="nestable-add">+</label></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="dd-item dd3-item dis-none" id="nestable17" data-id="17"
                                                style="display:none">
                                                <div class="dd-handle dd3-handle"></div>
                                                <div class="dd3-content-et">
                                                    <div class="order-left-20">
                                                        <label class="order-label">1</label>
                                                    </div>
                                                    <input type="text" id="nestable-17-menu"
                                                           class="nestable-et order_input" style="display:block">

                                                    <div class="order-left-10">
                                                        <label class="order-label">2</label>
                                                    </div>
                                                    <label class="order-label left">请选择菜单类型:</label>

                                                    <select class="dd3-content-et m-bot15 order-select"
                                                            id="nestable-17-type" style="display:block">
                                                        <option value="view">链接</option>
                                                        <option value="click">文本</option>
                                                    </select>

                                                    <div class="order-left-10">
                                                        <label class="order-label">3</label>
                                                    </div>
                                                    <input type="text" class="nestable-et order_input width-250"
                                                           id="nestable-17-content" style="display:block">

                                                    <div class="bg-order-delete" id="nestable-17-delete">
                                                        <a onclick="nesTableHide('nestable17');"
                                                           class="fa order-delete"><label>删除</label></a>
                                                    </div>

                                                    <div class="netsable-add-bg" id="nestable-add-18">
                                                        <a href="javascript:;"
                                                           onclick="addNestable('nestable18');"><label
                                                                class="nestable-add">+</label></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="dd-item dd3-item dis-none" id="nestable18" data-id="18"
                                                style="display:none">
                                                <div class="dd-handle dd3-handle"></div>
                                                <div class="dd3-content-et">
                                                    <div class="order-left-20">
                                                        <label class="order-label">1</label>
                                                    </div>
                                                    <input type="text" id="nestable-18-menu"
                                                           class="nestable-et order_input" style="display:block">

                                                    <div class="order-left-10">
                                                        <label class="order-label">2</label>
                                                    </div>
                                                    <label class="order-label left">请选择菜单类型:</label>

                                                    <select class="dd3-content-et m-bot15 order-select"
                                                            id="nestable-18-type" style="display:block">
                                                        <option value="view">链接</option>
                                                        <option value="click">文本</option>
                                                    </select>

                                                    <div class="order-left-10">
                                                        <label class="order-label">3</label>
                                                    </div>
                                                    <input type="text" class="nestable-et order_input width-250"
                                                           id="nestable-18-content" style="display:block">

                                                    <div class="bg-order-delete">
                                                        <a onclick="nesTableHide('nestable18');"
                                                           class="fa order-delete"><label>删除</label></a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ol>
                                    </li>

                                </ol>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            <!--测试用文本框-->
            <textarea id="nestable_list_1_output" rows="3" class="form-control" style="visibility:visible"></textarea>

        </section>
        <!-- 主容器  -->

        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">删除菜单提示</h4>
                    </div>
                    <div class="modal-body text-center">
                        <span class="left-30 red size-16">删除后将无法恢复！确认要删除该用户信息吗？</span>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">取消</button>
                        <button class="btn btn-warning" type="button" onclick="nesTableHide2();">确认</button>
                    </div>
                </div>
            </div>
            <span style="display:none" id="myModalHide"></span>
        </div>

        <div class="modal fade" id="myModal1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">刷新页面提示</h4>
                    </div>
                    <div class="modal-body">
                        页面刷新后将重置菜单！确认要刷新吗？
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">取消</button>
                        <button class="btn btn-warning" type="button" onclick="refresh();">确认</button>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- 主窗体 -->

    <!-- 尾 -->
<footer class="site-footer">
    <div class="text-center" style="margin-left:20%">
        2016 &copy; CES by
        <a href="" target="_blank">
            高彪
        </a>
        <a href="#" class="go-top">
            <i class="fa fa-angle-up">
            </i>
        </a>
    </div>
</footer>
<!-- 尾 -->

</section>
<!-- SECTION -->

<!-- JS -->

<!--<script src="/SALESYS/Public/js/jquery.js"></script>&lt;!&ndash; BASIC JQUERY LIB. JS &ndash;&gt;-->
<script src="/SALESYS/Public/js/jquery-3.1.1.min.js"></script><!-- BASIC JQUERY 1.8.3 LIB. JS -->
<script src="/SALESYS/Public/js/bootstrap.min.js"></script><!-- BOOTSTRAP JS -->
<script src="/SALESYS/Public/js/jquery.dcjqaccordion.2.7.js"></script><!-- 左侧子菜单栏显示 -->
<script src="/SALESYS/Public/js/jquery.scrollTo.min.js"></script><!-- SCROLLTO JS -->
<script src="/SALESYS/Public/js/jquery.nicescroll.js"></script><!-- NICESCROLL JS -->
<script src="/SALESYS/Public/js/respond.min.js"></script><!-- RESPOND JS -->
<script src="/SALESYS/Public/js/jquery.sparkline.js"></script><!-- SPARKLINE JS -->
<script src="/SALESYS/Public/js/sparkline-chart.js"></script><!-- SPARKLINE CHART JS -->
<script src="/SALESYS/Public/js/common-scripts.js"></script><!-- BASIC COMMON JS -->
<script src="/SALESYS/Public/assets/nestable/jquery.nestable.js"></script><!-- NESTABLE JS -->
<script src="/SALESYS/Public/js/nestable.js"></script><!-- NESTABLE FUNCTION JS -->
<script src="/SALESYS/Public/js/checkNestable.js"></script>
<script src="/SALESYS/Public/js/sco.message.js" type="text/javascript"></script>
<script src="/SALESYS/Public/js/WeChat/setWeChatMenu.js" type="text/javascript"></script>


<!-- JS -->

</body>
</html>
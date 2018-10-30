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
    <link rel="shortcut icon" href="/Public/img/favicon.ico">
    <!-- END SHORTCUT ICON -->
    <title>
        <?php echo ($TITLE); ?>
    </title>
    <!-- BEGIN STYLESHEET-->
    <link href="/Public/css/bootstrap.min.css" rel="stylesheet"><!-- BOOTSTRAP CSS -->
    <link href="/Public/css/bootstrap-reset.css" rel="stylesheet"><!-- BOOTSTRAP CSS -->
    <link href="/Public/assets/font-awesome/css/font-awesome.css" rel="stylesheet"><!-- 字体 -->
    <link href="/Public/css/style.css" rel="stylesheet"><!-- THEME BASIC CSS -->
    <link href="/Public/css/style-responsive.css" rel="stylesheet"><!-- THEME RESPONSIVE CSS -->
    <link href="/Public/assets/morris.js-0.4.3/morris.css" rel="stylesheet"><!-- MORRIS CHART CSS -->
    <link href="/Public/css/bootstrap-table.min.css" rel="stylesheet">
    <link href="/Public/js/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="/Public/css/sco.message.css" rel="stylesheet">
    <!--dashboard calendar-->
    <link href="/Public/css/clndr.css" rel="stylesheet"><!-- CALENDER CSS -->
    <!--[if lt IE 9]>
    <script src="/Public/js/html5shiv.js">
    </script>
    <script src="/Public/js/respond.min.js">
    </script>
    <![endif]-->
    <!-- END STYLESHEET-->
</head>
<script type="text/javascript">
    var HOST = "http://localhost/";
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
        DAY - POST
          <span>
           日报系统
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
                <a href="<?php echo U('Home/Sale/sale');?>" id="sale">
                    <i class="fa fa-dashboard"></i>
                        <span style="font-size: 14px;">
                          TC实时监控
                        </span>
                </a>
            </li>

            <!--菜单一-->
            <li class="sub-menu">
                <a href="javascript:;" id="weChat">
                    <i class="fa fa-laptop"></i>
                            <span style="font-size: 14px;">
                              日报查询
                            </span>
                            <span class="label label-success span-sidebar">
                              3
                            </span>
                </a>
                <ul class="sub" id="weChat_sub">
                    <li id="weChat_menu">
                        <a href="<?php echo U('Home/Home/Home');?>" style="font-size: 12px;">
                            单日日报查询
                        </a>
                    </li>
                    <li id="weChat_groupSend">
                        <a href="<?php echo U('Home/DayPost/dayPost');?>" style="font-size: 12px;">
                            区间日报查询
                        </a>
                    </li>
                    <li id="weChat_autoSend" class="dis-none">
                        <a href="<?php echo U('Home/WeChat/setAutoRes');?>" style="font-size: 12px;">
                            整体日报查询
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
                            登录用户管理
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
                              TC请求
                            </span>
                            <span class="label label-primary span-sidebar">
                              1
                            </span>
                </a>

                <ul class="sub" id="course_sub">
                    <li id="course_info">
                        <a href="<?php echo U('Home/CourseManage/courseManage');?>" style="font-size: 12px;">
                            TC刷新队列
                        </a>
                    </li>
                    <!--<li id="course_survey">-->
                        <!--<a href="<?php echo U('Home/CourseManage/surveyManage');?>" style="font-size: 12px;">-->
                            <!--课程问卷管理-->
                        <!--</a>-->
                    <!--</li>-->
                    <!--<li id="course_survey_publish">-->
                        <!--<a href="<?php echo U('Home/CourseManage/surveyPublish');?>" style="font-size: 12px;">-->
                            <!--课程问卷发布-->
                        <!--</a>-->
                    <!--</li>-->
                    <!--<li id="course_count">-->
                        <!--<a href="<?php echo U('Home/CourseManage/surveyCondition');?>" style="font-size: 12px;">-->
                            <!--问卷完成情况-->
                        <!--</a>-->
                    <!--</li>-->
                    <!--<li id="course_survey_demo_publish">-->
                        <!--<a href="<?php echo U('Home/CourseManage/coursePublish');?>" style="font-size: 12px;">-->
                            <!--按课程发布模版问卷-->
                        <!--</a>-->
                    <!--</li>-->
                </ul>
            </li>

            <!--菜单四-->
            <li class="sub-menu">
                <a href="javascript:;" id="data">
                    <i class="fa fa-tasks">
                    </i>
                            <span style="font-size: 14px;">
                              完成申请
                            </span>
                            <span class="label label-info span-sidebar">
                              2
                            </span>
                </a>

                <ul class="sub" id="data_sub">
                    <li id="data_course">
                        <a href="<?php echo U('Home/DataManage/userCourse');?>" style="font-size: 12px;">
                             待处理完成申请
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
                            提交完成申请
                        </a>
                    </li>
                    <!--<li class="dis-none">-->
                        <!--<a href="">-->
                            <!--子菜单-->
                        <!--</a>-->
                    <!--</li>-->
                    <!--<li class="dis-none">-->
                        <!--<a href="">-->
                            <!--子菜单-->
                        <!--</a>-->
                    <!--</li>-->
                </ul>
            </li>

            <!--主菜单-->
            <li class="sub-menu">
                <a href="javascript:;" id="home">
                    <i class="fa fa-dashboard"></i>
                        <span style="font-size: 14px;">
                          待确认队列
                        </span>
                        <span class="label label-info span-sidebar">
                            1
                        </span>
                </a>
                <ul class="sub" id="data_ub">
                    <li id="data_ount">
                        <a href="<?php echo U('Home/PersonDefineFinishWork/perDefine');?>" style="font-size: 12px;">
                            个人待确认
                        </a>
                    </li>
                    <!--<li id="data_unt">-->
                        <!--<a href="<?php echo U('Home/DataManage/surveyCount');?>" style="font-size: 12px;">-->
                            <!--机构待确认队列-->
                        <!--</a>-->
                    <!--</li>-->
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

            <div class="container-fluid" >
                <section class="panel">
                    <header class="panel-heading">
                        <div><button type="button" class="btn btn-primary reloadtc" style="float:left">刷新TC</button></div>
                        <div><button type="button" class="btn btn-primary exportreport" style="float:left;margin-left: 10pt">导出日报</button></div>
                        <div><button type="button" class="btn btn-primary exportdetail" style="float:left;margin-left: 10pt">导出明细</button></div>
                        <div class="tools" style="float:left;margin-left: 10pt">
                            <div style="width:250px;float:left" class="input-group date form_date" id="form_date1" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                <input class="form-control" size="16" type="text" value="" readonly>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                            <div style="width:50px;float:left;padding-left: 15px;margin-top: 5px"><strong>至</strong></div>
                            <div style="width:250px;float:left" class="input-group date form_date" id="form_date2" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input3" data-link-format="yyyy-mm-dd">
                                <input class="form-control" size="16" type="text" value="" readonly>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                        <input style="visibility:hidden" id="dtp_input2" value=""/>
                        <input style="visibility:hidden" id="dtp_input3" value=""/>
                    </header>
                    <div style="margin:0 5px">
                        <table id="daily_report2"></table>
                    </div>
                </section>
            </div>

            <!-- 第一行数据统计  -->
            <div class="row state-overview" style="visibility:hidden">

                <!--四个统计框-->
                <div class="col-lg-3 col-sm-6">

                    <section class="panel">

                        <div class="symbol">
                            <i class="fa fa-tags blue">
                            </i>
                        </div>

                        <div class="value">
                            <h1 class="count" style="display:none"><?php echo ($count); ?></h1>

                            <h1 class=" show_count">
                                0
                            </h1>

                            <p>
                                微信匹配用户总量
                            </p>
                        </div>

                    </section>

                </div>

                <div class="col-lg-3 col-sm-6">

                    <section class="panel">

                        <div class="symbol">
                            <i class="fa fa-tasks red">
                            </i>
                        </div>

                        <div class="value">
                            <h1 class="count1" style="display:none"><?php echo ($count1); ?></h1>

                            <h1 class=" show_count1">
                                0
                            </h1>

                            <p>
                                课程评价总数
                            </p>
                        </div>

                    </section>

                </div>

                <div class="col-lg-3 col-sm-6">

                    <section class="panel">

                        <div class="symbol">
                            <i class="fa fa-user yellow">
                            </i>
                        </div>

                        <div class="value">
                            <h1 class=" count2" style="display:none"><?php echo ($count2); ?></h1>

                            <h1 class=" show_count2">0</h1>

                            <p>
                                微信关注量
                            </p>
                        </div>

                    </section>

                </div>

                <div class="col-lg-3 col-sm-6">

                    <section class="panel">

                        <div class="symbol">
                            <i class="fa fa-plus purple">
                            </i>
                        </div>

                        <div class="value">
                            <h1 class=" count3" style="display:none"><?php echo ($count3); ?></h1>

                            <h1 class=" show_count3">
                                0
                            </h1>

                            <p>
                                新增用户数量
                            </p>
                        </div>

                    </section>

                </div>

            </div>
             <!--第一行数据统计-->

            <div class="col-lg-12" style="color:#5eb7dd;visibility:hidden">
                <section class="panel">
                    <header class="panel-heading">
                        微信匹配数量变化趋势
                    </header>
                    <div class="panel-body">
                        <div id="weixin-num" class="graph">
                        </div>
                    </div>
                </section>
            </div>

            <div class="col-lg-12" style="color:#fd6d4d;visibility:hidden">
                <section class="panel">
                    <header class="panel-heading">
                        课程评价数量变化趋势
                    </header>
                    <div class="panel-body">
                        <div id="ce-num" class="graph">
                        </div>
                    </div>
                </section>
            </div>

            <div class="col-lg-12" style="color:#f7d254;visibility:hidden">
                <section class="panel">
                    <header class="panel-heading">
                        微信关注量变化趋势
                    </header>
                    <div class="panel-body">
                        <div id="weixin-sub-num" class="graph">
                        </div>
                    </div>
                </section>
            </div>

            <!--<div class="col-lg-12" style="color:#a560f8">-->
                <!--<section class="panel">-->
                    <!--<header class="panel-heading">-->
                        <!--新增用户数量变化趋势-->
                    <!--</header>-->
                    <!--<div class="panel-body">-->
                        <!--<div id="weixin-new-num" class="graph">-->
                        <!--</div>-->
                    <!--</div>-->
                <!--</section>-->
            <!--</div>-->

        </section>
        <!-- 主容器  -->

    </section>
    <!-- 主窗体 -->

    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">删除自动回复提示</h4>
                </div>
                <div class="modal-body text-center">
                    <span class="left-30 red size-16">删除后将无法恢复！确认要删除自动回复吗？</span>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">取消</button>
                    <button class="btn btn-warning" type="button" onclick="deleteSub();">确认</button>
                </div>
            </div>
        </div>
        <span style="display:none" id="myModalHide"></span>
    </div>

    <!--<div class="zfb modal fade in">-->
        <!--<img src="zfb.png"  alt="扫描领红包" />-->
    <!--</div>-->

    <!-- 尾 -->
<footer class="site-footer">
    <div class="text-center" style="margin-left:20%">
        2018 &copy; DAY-POST by
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

    <p id="weChatMatch" style="display:none"><?php echo ($weChatMatch); ?></p>

    <p id="weChatSub" style="display:none"><?php echo ($weChatSub); ?></p>

    <p id="weChatNum" style="display:none"><?php echo ($weChatNum); ?></p>

    <p id="weCESNum" style="display:none"><?php echo ($weCESNum); ?></p>
</section>
<!-- SECTION -->

<!-- JS -->
<script src="/Public/js/jquery-3.1.1.min.js"></script><!-- BASIC JQUERY 1.8.3 LIB. JS -->
<script src="/Public/js/bootstrap.min.js"></script><!-- BOOTSTRAP JS -->
<script src="/Public/js/jquery.dcjqaccordion.2.7.js"></script><!-- 左侧子菜单栏显示 -->
<script src="/Public/js/jquery.scrollTo.min.js"></script><!-- SCROLLTO JS -->
<script src="/Public/js/jquery.nicescroll.js"></script><!-- NICESCROLL JS -->
<script src="/Public/js/respond.min.js"></script><!-- RESPOND JS -->
<script src="/Public/js/jquery.sparkline.js"></script><!-- SPARKLINE JS -->
<script src="/Public/js/sparkline-chart.js"></script><!-- SPARKLINE CHART JS -->
<script src="/Public/js/common-scripts.js"></script><!-- BASIC COMMON JS -->
<script src="/Public/js/bootstrap-table.min.js"></script><!-- SPARKLINE CHART JS -->
<script src="/Public/js/bootstrap-table-zh-CN.min.js"></script><!-- BASIC COMMON JS -->
<script src="/Public/js/sco.message.js" type="text/javascript"></script>
<!--统计框Morris-->
<script src="/Public/assets/morris.js-0.4.3/morris.min.js"></script><!-- MORRIS JS -->
<script src="/Public/assets/morris.js-0.4.3/raphael-min.js"></script><!-- MORRIS  JS -->
<script src="/Public/js/chart.js"></script><!-- CHART JS -->

<script src="/Public/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="/Public/js/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
<!--自定义-->
<!--<script src="/Public/js/Home/count.js"></script>-->
<!--<script src="/Public/js/Home/get-time.js"></script>-->
<!--<script src="/Public/js/Home/charts-home.js"></script>-->
<script src="/Public/js/FinishWorkDefine/perDefine.js"></script>
<script>

</script>
<!-- JS -->

</body>
</html>
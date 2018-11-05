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
    <link rel="stylesheet" type="text/css" href="/Public/assets/nestable/jquery.nestable.css"><!-- NESTABLE CSS -->
    <link href="/Public/css/sco.message.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/Public/css/bootstrap-table.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/css/userManage/modify-user.css">

    <!--[if lt IE 9]>
    <script src="/Public/js/html5shiv.js">
    </script>
    <script src="/Public/js/respond.min.js">
    </script>
    <![endif]-->
    <!-- END STYLESHEET-->
</head>
<script type="text/javascript">
    var HOST = "http://10.8.56.115/";
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
                <a href="<?php echo U('Home/Home/postHome');?>" id="sale">
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
                              2
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
                              数据管理
                            </span>
                            <span class="label label-primary span-sidebar">
                              1
                            </span>
                </a>

                <ul class="sub" id="course_sub">
                    <li id="course_info">
                        <a href="<?php echo U('Home/RequestPostDataLoad/loadData');?>" style="font-size: 12px;">
                            TC/数据加载
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
                    <div class="panel">
                        <header class="panel-heading">
                            <span><strong>新增用户: <span class="red"> 带*为必填或文字样例格式描述不可修改</span></strong></span>
                        </header>
                        <div class="panel-body">
                            <div class="col-sm-12">
                                <div class="col-sm-3"><span class="red">*</span><span><strong>用户账号: user_bx...</strong></span><input type="text" class="form-control add_user" id="user_account" placeholder="请输入用户账号"></div>
                                <div class="col-sm-3"><span class="red">*</span><span><strong>用户密码: user...</strong></span><input type="text" class="form-control add_user" id="user_pass" placeholder="请输入用户密码"></div>
                                <div class="col-sm-3"><span class="red">*</span><span><strong>用户类型: 1-管理员/2-机构组长/3-操作员</strong></span><input type="text" class="form-control add_user" id="user_type" placeholder="请输入用户类型"></div>
                                <div class="col-sm-3"><span class="red">*</span><span><strong>作业机构代码: 8647...</strong></span><input type="text" class="form-control add_user" id="user_organ_code" placeholder="请输入作业机构代码"></div>
                            </div>
                            <div class="col-sm-12" style="padding-top:10pt;">
                                <div class="col-sm-3" style="margin-top: 14pt"><span class="red">*</span><span><strong>作业机构名称: 分公司核保室/平度柜面...</strong></span><input type="text" class="form-control add_user" id="user_organ_name" placeholder="请输入作业机构名称"></div>
                                <div class="col-sm-3" style="margin-top: 14pt"><span class="red">*</span><span><strong>用户性别: 男/女</strong></span><input type="text" class="form-control add_user" id="user_sex" placeholder="请输入用户性别"></div>
                                <div class="col-sm-3" style="margin-top: 14pt"><span class="red">*</span><span><strong>所属公司: 总公司/河北分公司/高伟达...</strong></span><input type="text" class="form-control add_user" id="user_company" placeholder="请输入所属公司"></div>
                                <div class="col-sm-3"><span class="red">*</span><span><strong>作业范围: <span class="red">*</span>核保/<span class="red">*</span>保全复核/<span class="red">*</span>理赔审核/<span class="red">*</span>异地作业/柜面操作/技术支持...</strong></span><input type="text" class="form-control add_user" id="buss_area" placeholder="请输入作业范围"></div>
                            </div>
                            <div class="col-sm-12" style="padding-top:14pt;">
                                <div class="col-sm-3"><span class="red">*</span><span><strong>用户姓名: 用户...</strong></span><input type="text" class="form-control add_user" id="user_name" placeholder="请输入用户姓名"></div>
                                <!--<div class="col-sm-3"><span class="red">*</span><span><strong>用户性别: 男/女</strong></span><input type="text" class="form-control" id="user_sex" placeholder="请输入用户性别"></div>-->
                                <!--<div class="col-sm-3"><span class="red">*</span><span><strong>所属公司: 总公司/河北分公司/高伟达...</strong></span><input type="text" class="form-control" id="user_company" placeholder="请输入所属公司"></div>-->
                                <!--<div class="col-sm-3"><span class="red">*</span><span><strong>作业范围: 柜面操作/技术支持...</strong></span><input type="text" class="form-control" id="buss_area" placeholder="请输入作业范围"></div>-->
                            </div>
                            <div  class="col-sm-3" style="margin-top:10pt;margin-left:43.5%">
                                <button type="button" id="new_user" class="btn btn-primary exportreport" style="margin-left: 10pt">添加用户信息</button>
                            </div>
                        </div>
                    </div>
                <!--<div>-->
                    <!--<section class="panel">-->
                        <!--<header class="panel-heading">-->
                            <!--<span><strong>编辑用户</strong></span>-->
                        <!--</header>-->
                        <!--<div class="panel-body">-->
                            <!--<div class="col-sm-2"><input type="text" class="form-control" id="" placeholder="请输入用户账号"></div>-->
                            <!--<div><button type="button" id="modify_user" class="btn btn-primary exportreport" style="float:left;margin-left: 10pt">修改用户信息</button></div>-->
                        <!--</div>-->
                    <!--</section>-->
                <!--</div>-->
                <div>
                    <section class="panel">
                        <header class="panel-heading">
                            <span><strong>用户信息列表<span class="red">： 请先点击解锁后再修改用户信息</span></strong></span>
                        </header>
                        <div style="margin:0 5px;margin-top: 10pt;margin-left: 10pt">
                            <table id="user_list_table" style="table-layout: fixed;"></table>
                        </div>
                    </section>
                </div>

            <!--用户信息管理注意事项-->
            <!--<div class="panel panel-success">-->
                <!--<div class="panel-heading">-->
                    <!--<h1 class="panel-title-red">-->
                        <!--用户信息管理注意事项：-->
                    <!--</h1>-->
                <!--</div>-->
                <!--<div class="panel-body" rows="8">-->
                    <!--1、用户信息管理是指在本系统数据库中存储的可使用课程评价的用户信息。<br>-->
                    <!--2、搜索条件中姓名搜索方式支持模糊搜索，其他搜索条件仅支持精确搜索。<br>-->
                    <!--<br><br><br>-->
                <!--</div>-->
            <!--</div>-->

            <!--&lt;!&ndash;微信菜单设置&ndash;&gt;-->
            <!--<div class="row">-->

                <!--<div class="panel-body" style="padding-bottom:0px;">-->
                    <!--<div class="panel panel-primary">-->
                        <!--<div class="panel-heading">查询条件</div>-->
                        <!--<div class="panel-body">-->
                            <!--<form id="formSearch" class="form-horizontal">-->
                                <!--<div class="form-group" style="margin-top:15px">-->

                                    <!--<label class="control-label mar-left-10 left-f"-->
                                           <!--for="txt_search_graclass">账号：</label>-->

                                    <!--<div class="col-sm-2">-->
                                        <!--<input type="text" class="form-control" id="txt_search_graclass">-->
                                    <!--</div>-->

                                    <!--<label class="control-label left-f" for="txt_search_pro">专业：</label>-->

                                    <!--<select class="dd3-content-et m-bot15 order-select col-lg-2" id="txt_search_pro"-->
                                            <!--style="margin-top:3px">-->
                                        <!--<option value="">无</option>-->
                                        <!--<option value="1">计算机科学与技术</option>-->
                                        <!--<option value="2">信息安全</option>-->
                                        <!--<option value="3">信息与计算科学</option>-->
                                        <!--<option value="4">计算机科学与技术（中加方向）</option>-->
                                        <!--<option value="5">网络工程</option>-->
                                        <!--<option value="6">物联网工程</option>-->
                                        <!--<option value="7">通信工程</option>-->
                                    <!--</select>-->

                                    <!--<label class="control-label mar-left-10 left-f"-->
                                           <!--for="txt_search_class">班级：</label>-->

                                    <!--<div class="col-sm-2">-->
                                        <!--<input type="text" class="form-control" id="txt_search_class">-->
                                    <!--</div>-->

                                    <!--<label class="control-label mar-left-10 left-f"-->
                                           <!--for="txt_search_class">姓名：</label>-->

                                    <!--<div class="col-sm-2">-->
                                        <!--<input type="text" class="form-control" id="txt_search_name">-->
                                    <!--</div>-->

                                    <!--<div class="col-sm-1" style="text-align:left;">-->
                                        <!--<button type="button" style="margin-left:20px" onclick="show();"-->
                                                <!--id="btn_query"-->
                                                <!--class="btn btn-primary">查询-->
                                        <!--</button>-->
                                    <!--</div>-->
                                <!--</div>-->
                            <!--</form>-->
                        <!--</div>-->
                    <!--</div>-->

                    <!--<div>-->
                        <!--<div id="toolbar" class="btn-group">-->
                            <!--<button id="btn_delete" type="button" class="btn btn-danger">-->
                                <!--<span class="glyphicon" aria-hidden="true"></span>全部删除-->
                            <!--</button>-->
                        <!--</div>-->
                        <!--<table class="panel" id="table_user" data-page-list="[10, 25, 50, 100, ALL]"></table>-->
                    <!--</div>-->
                <!--</div>-->

            <!--</div>-->

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
            <!--测试用文本框-->
            <textarea id="list_output" rows="3" class="form-control" style="visibility:hidden"></textarea>

        </section>
        <!-- 主容器  -->

        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">删除用户信息提示</h4>
                    </div>
                    <div class="modal-body text-center">
                        <span class="left-30 red size-16">删除数据库中数据后无法恢复！确认要删除该用户信息吗？</span>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">取消</button>
                        <button class="btn btn-warning" type="button" onclick="deleteUser();">确认</button>
                    </div>
                </div>
            </div>
            <span style="display:none" id="myModalHide"></span>
        </div>

        <div class="modal fade" id="modifyUser">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title center">修改用户信息</h4>
                    </div>
                    <div class="panel-body" style="margin-top:20px;">

                        <div class="col-lg-12" style="margin-top:10px;">
                            <section class="panel">
                                <form class="form-horizontal tasi-form" method="get">
                                    <div class="form-group">
                                        <div>
                                            <span class="star-red">*</span>
                                        </div>
                                        <div class="order-left-10 modify-user-div">
                                            <label class="order-label modify-user-label">学 号：</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="modify_stu_num" disabled="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <span class="star-red">*</span>
                                        </div>
                                        <div class="order-left-10 modify-user-div">
                                            <label class="order-label modify-user-label">姓 名：</label>
                                        </div>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="modify_stu_name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <span class="star-red">*</span>
                                        </div>
                                        <div class="order-left-10 modify-user-div">
                                            <label class="order-label modify-user-label">性 别：</label>
                                        </div>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="modify_stu_sex">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <span class="star-red">*</span>
                                        </div>
                                        <div class="order-left-10 modify-user-div">
                                            <label class="order-label modify-user-label">年 级：</label>
                                        </div>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="modify_stu_graclass">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <span class="star-red">*</span>
                                        </div>
                                        <div class="order-left-10 modify-user-div">
                                            <label class="order-label modify-user-label">专 业：</label>
                                        </div>
                                        <select class="dd3-content-et m-bot15 order-select col-lg-9"
                                                style="margin-left:20px;"
                                                id="modify_stu_pro">
                                            <option value="">无</option>
                                            <option value="1">计算机科学与技术</option>
                                            <option value="2">信息安全</option>
                                            <option value="3">信息与计算科学</option>
                                            <option value="4">计算机科学与技术（中加方向）</option>
                                            <option value="5">网络工程</option>
                                            <option value="6">物联网工程</option>
                                            <option value="7">通信工程</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <span class="star-red">*</span>
                                        </div>
                                        <div class="order-left-10 modify-user-div">
                                            <label class="order-label modify-user-label">班 级：</label>
                                        </div>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="modify_stu_class">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <span class="star-white">*</span>
                                        </div>
                                        <div class="order-left-10 modify-user-div">
                                            <label class="order-label modify-user-label">电 话：</label>
                                        </div>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="modify_stu_phone">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <span class="star-white">*</span>
                                        </div>
                                        <div class="order-left-10 modify-user-div">
                                            <label class="order-label modify-user-label">QQ 号：</label>
                                        </div>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="modify_stu_qq">
                                        </div>
                                    </div>
                                </form>
                            </section>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">取消</button>
                        <button class="btn btn-warning" type="button" onclick="modifyUser();">确认</button>
                    </div>
                </div>
            </div>
            <textarea style="display:none" id="user_stu_num"></textarea>
            <textarea style="display:none" id="user_stu_name"></textarea>
            <textarea style="display:none" id="user_stu_graclass"></textarea>
            <textarea style="display:none" id="user_stu_pro"></textarea>
            <textarea style="display:none" id="user_stu_class"></textarea>
            <textarea style="display:none" id="user_stu_phone"></textarea>
            <textarea style="display:none" id="user_stu_sex"></textarea>
            <textarea style="display:none" id="user_stu_qq"></textarea>
        </div>
        <textarea id="username" style="display:none"><?php echo ($username); ?></textarea>
        <textarea id="usertype" style="display:none"><?php echo ($usertype); ?></textarea>


    </section>
    <!-- 主窗体 -->

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

</section>
<!-- SECTION -->

<!-- JS -->

<!--<script src="/Public/js/jquery.js"></script>&lt;!&ndash; BASIC JQUERY LIB. JS &ndash;&gt;-->
<script src="/Public/js/jquery-3.1.1.min.js"></script><!-- BASIC JQUERY 1.8.3 LIB. JS -->
<script src="/Public/js/bootstrap.min.js"></script><!-- BOOTSTRAP JS -->
<script src="/Public/js/jquery.dcjqaccordion.2.7.js"></script><!-- 左侧子菜单栏显示 -->
<script src="/Public/js/jquery.scrollTo.min.js"></script><!-- SCROLLTO JS -->
<script src="/Public/js/jquery.nicescroll.js"></script><!-- NICESCROLL JS -->
<script src="/Public/js/respond.min.js"></script><!-- RESPOND JS -->
<script src="/Public/js/jquery.sparkline.js"></script><!-- SPARKLINE JS -->
<script src="/Public/js/common-scripts.js"></script><!-- BASIC COMMON JS -->
<script src="/Public/js/sco.message.js" type="text/javascript"></script>
<script src="/Public/js/bootstrap-table.min.js"></script>
<script src="/Public/js/bootstrap-table-zh-CN.min.js"></script>
<script src="/Public/js/userManage/postUserManage.js" type="text/javascript"></script>
<!--<script src="/Public/js/userManage/userManage.js" type="text/javascript"></script>-->
<script type="text/javascript" src="/Public/js/bootstrap_above/bootstrap-table-develop/dist/bootstrap-table.js"></script>
<script type="text/javascript" src="/Public/js/bootstrap_above/bootstrap-table-develop/dist/locale/bootstrap-table-zh-CN.js"></script>
<script type="text/javascript" src="/Public/js/bootstrap_above/bootstrap-table-develop/dist/extensions/export/bootstrap-table-export.js"></script>

<script src="/Public/js/bootstrap_above/tableExport/libs/pdfmake/pdfmake.min.js"></script>
<script src="/Public/js/bootstrap_above/tableExport/libs/pdfmake/vfs_fonts.js"></script>
<script type="text/javascript" src="/Public/js/bootstrap_above/tableExport/libs/FileSaver/FileSaver.min.js"></script>
<script type="text/javascript" src="/Public/js/bootstrap_above/tableExport/libs/jsPDF/jspdf.min.js"></script>
<script type="text/javascript" src="/Public/js/bootstrap_above/tableExport/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>
<script type="text/javascript" src="/Public/js/bootstrap_above/tableExport/tableExport.js"></script>
<script src="/Public/js/md5.js" type="text/javascript"></script>


<script>

</script>
<!-- JS -->

</body>
</html>
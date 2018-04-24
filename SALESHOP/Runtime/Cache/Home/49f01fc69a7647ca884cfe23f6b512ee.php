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
    <link href="/SALESYS/Public/css/sco.message.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/SALESYS/Public/css/bootstrap-table.min.css">
    <link rel="stylesheet" type="text/css" href="/SALESYS/Public/css/setAutoRes/set-auto-list.css">

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

        <!-- 主容器1  -->
        <section class="wrapper" id="wrapper1" style="display:inline-block">

            <!--微信菜单设置注意事项-->
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h1 class="panel-title-red">
                        问卷完成情况注意事项：
                    </h1>
                </div>
                <div class="panel-body" rows="8">
                    1、问卷完成情况是指已发布的问卷截至目前的完成情况。<br>
                    2、问卷完成情况仅可修改是否完成以及完成者的学号。<br>
                    3、问卷完成情况可通过在数据表中选择后进行导出，点击导出EXCEL按钮即可导出选中数据。<br>
                    <br>
                </div>
            </div>

            <!--评价问卷管理-->
            <div class="row">
                <div class="panel-body" style="padding-bottom:0px;">
                    <div class="panel panel-primary">
                        <div class="panel-heading color-hui">查询条件</div>
                        <div class="panel-body">
                            <form id="formSearch" class="form-horizontal">
                                <div class="form-group" style="margin-top:15px">

                                    <!--问卷分组-->
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label pad-left">选择分组:
                                        </label>

                                        <div class="col-sm-9">
                                            <select id="survey_search_group" class="form-control">
                                                <option disabled="" value="0">问卷分组</option>
                                                <?php echo ($groupSelectList); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!--问卷分组-->


                                    <div class="form-group">
                                        <label class="control-label col-sm-2 pad-left"
                                               for="txt_search_survey_name">问卷名称：</label>

                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="txt_search_survey_name" placeholder="请输入问卷名称">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-2 pad-left"
                                               for="txt_search_stu_num">学号：</label>

                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="txt_search_stu_num" placeholder="请输入学号">
                                        </div>
                                    </div>


                                    <div class="form-group" style="margin-left:20%;margin-top: 20px;">
                                        <div class="col-sm-12">
                                            <button type="button" onclick="searchCondition();"
                                                    id="btn_query"
                                                    class="btn btn-primary col-sm-8">查询
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div>
                        <div id="toolbar_condition" class="btn-group">
                            <div>
                                <button id="btn_delete" type="button" class="btn btn-danger"
                                        onclick="setWeChatContent();">
                                    <span class="glyphicon" aria-hidden="true"></span>发送微信消息
                                </button>
                                <button id="btn_add" type="button" class="btn btn-primary" onclick="exportExcel();">
                                    <span class="glyphicon" aria-hidden="true"></span>导出EXCEL
                                </button>
                            </div>
                        </div>
                        <table class="panel" id="table_condition" data-page-list="[10, 25, 50, 100, ALL]"></table>
                    </div>
                </div>
            </div>

            <!--测试用文本框-->
            <textarea id="list_output" rows="3" class="form-control" style="visibility:hidden"></textarea>

        </section>
        <!-- 主容器1  -->

        <!-- 主容器2  -->
        <section class="wrapper" id="wrapper2" style="display:none">

            <!--问卷添加-->
            <div class="row">
                <div class="panel-body" style="padding-bottom:0px;">
                    <div class="panel panel-primary">
                        <div class="panel-heading color-hui">
                            <span>添加课程评价问卷</span>
                        </div>

                        <div class="panel-body">
                            <form id="formSearch_" class="form-horizontal">
                                <div class="form-group" style="margin-top:15px">

                                    <div class="panel-body">
                                        <form class="form-horizontal">
                                            <!--标题栏-->
                                            <div class="form-group" style="text-align:center">
                                                <button type="button" class="btn btn-info" style="width:60%">
                                                    添加课程评价问卷
                                                </button>
                                                <button type="button" class="btn btn-primary"
                                                        style="margin-left: 20px;"
                                                        onclick="goBack()">返回
                                                </button>
                                            </div>
                                            <!--标题栏-->

                                            <!--问卷等级-->
                                            <div class="form-group" id="survey_level">
                                                <label class="col-sm-2 control-label pad-left">
                                                    <span class="star-red">*</span>选择类型:</label>
                                                <label class="checkbox-inline">
                                                    <input type="radio" id="optionsRadios3" value="3"
                                                           name="survey_type" checked=""> 校级
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="radio" id="optionsRadios2" value="2"
                                                           name="survey_type"> 院级
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="radio" id="optionsRadios1" value="1"
                                                           name="survey_type"> 系级
                                                </label>
                                            </div>
                                            <!--问卷等级-->

                                            <!--问卷分组-->
                                            <div class="form-group" id="survey_group">
                                                <label class="col-sm-2 control-label pad-left">
                                                    <span class="star-red">*</span>选择分组:
                                                </label>

                                                <div class="col-sm-9">
                                                    <select id="survey_sub_group" class="form-control">
                                                        <option disabled="">问卷分组</option>
                                                        <?php echo ($groupSelectList); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--问卷分组-->

                                            <!--问卷名称-->
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label pad-left"><span
                                                        class="star-red">*</span>问卷名称:</label>

                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="new_survey_name"
                                                           placeholder="问卷名称">
                                                </div>
                                            </div>
                                            <!--问卷名称-->

                                            <!--问卷简介-->
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label pad-left">问卷简介:</label>

                                                <div class="col-sm-9">
                                                    <textarea class="form-control" rows="3" placeholder="请输入问卷简介，可不填"
                                                              id="new_survey_detail"></textarea>
                                                </div>
                                            </div>
                                            <!--问卷简介-->

                                            <!--问题列表及按钮-->
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label pad-left"><span
                                                        class="star-red">*</span>创建问题:</label>

                                                <div class="col-sm-6">
                                                    <ul class="list-group" id="QuestionList">
                                                        <li class="list-group-item color-hui text-white"
                                                            style="text-align:center;">
                                                            问卷列表信息
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-4" style="margin-top:3px;">
                                                    <div style="float: left;">
                                                        <button type="button" class="btn btn-primary"
                                                                onclick="selectSurveyDemo();">
                                                            选择模版问卷
                                                        </button>
                                                    </div>
                                                    <div style="float: left;margin-left: 10px;">
                                                        <button type="button" class="btn btn-primary"
                                                                onclick="addQuestion();">
                                                            添加问题
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--问题列表及按钮-->

                                            <!--隐藏排序及数量-->
                                            <div class="form-group" style="display:none;">
                                                <label class="col-sm-2 control-label">问卷排序:</label>

                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="new_survey_sort"
                                                           placeholder="分组排序" value="1">
                                                    <input type="text" class="form-control" id="q_count"
                                                           placeholder="问题数量" value="0">
                                                </div>
                                            </div>
                                            <!--隐藏排序及数量-->

                                            <!--提交-->
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="button" class="btn btn-success col-sm-10"
                                                            onclick="submitSurvey();">提交
                                                    </button>
                                                </div>
                                            </div>
                                            <!--提交-->

                                        </form>
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>


            <!--测试用文本框-->
            <textarea rows="10" class="form-control" style="visibility:hidden"></textarea>
        </section>
        <!-- 主容器2  -->

        <!--选择模版问卷模态-->
        <div class="modal fade" id="selectSurveyDemo">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">选择模版问卷</h4>
                    </div>
                    <div class="col-lg-11" style="margin-left:4%;margin-top: 3%;">
                        <div id="toolbar_demo" class="btn-group">
                            <div>
                                <button id="btn_delete_demo" type="button" class="btn btn-danger">
                                    <span class="glyphicon" aria-hidden="true"></span>全部删除
                                </button>
                                <button id="btn_add_demo" type="button" class="btn btn-primary">
                                    <span class="glyphicon" aria-hidden="true"></span>新增问卷
                                </button>
                            </div>
                        </div>
                        <table class="panel" id="table_survey_demo" data-page-list="[10, 25, 50, 100, ALL]"></table>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">取消</button>
                        <button class="btn btn-warning" type="button" onclick="submitDemo();">确认</button>
                    </div>
                </div>
            </div>
            <span style="display:none" id="selectDemoHide"></span>
        </div>
        <!--选择模版问卷模态-->

        <!--微信消息模态-->
        <div class="modal fade" id="modifyContent">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title center">发送消息内容</h4>
                    </div>
                    <div class="panel-body">
                        <div class="col-lg-12">
                            <section class="panel">
                                <textarea rows="8" class="form-control" id="txt_wechat_content"></textarea>
                            </section>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">取消</button>
                        <button class="btn btn-warning" type="button" onclick="sendWeChatMessage();">确认</button>
                    </div>
                </div>
            </div>
        </div>
        <!--微信消息模态-->

        <!--问卷完成情况维护模态-->
        <div class="modal fade" id="surveyModify">
            <div class="modal-dialog">
                <div class="modal-content" id="modify_survey">
                    <div class="modal-header center">
                        <button type="button" class="close" aria-hidden="true"></button>
                        <h4 class="modal-title">修改问卷完成情况</h4>
                    </div>

                    <div class="modal-body" style="width:100%;height:80%">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="post" action="">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-info btn-block">
                                            问卷完成情况
                                        </button>
                                    </div>

                                    <!--问卷名称-->
                                    <div class="form-group" style="margin-top: 20px;">
                                        <label class="col-sm-2"><span class="star-red">*</span>问卷名称:</label>

                                        <div class="col-sm-10" style="margin-top:-6px">
                                            <input type="text" class="form-control" id="modify_survey_name"
                                                   placeholder="问卷名称" disabled="">
                                        </div>
                                    </div>
                                    <!--问卷名称-->


                                    <!--是否匹配-->
                                    <div class="form-group">
                                        <label class="col-sm-2"><span class="star-red">*</span>是否匹配:</label>

                                        <div class="col-sm-10" style="margin-top:-6px">
                                            <input type="text" class="form-control" id="modify_survey_is_match"
                                                   placeholder="是否匹配" disabled="">
                                        </div>
                                    </div>
                                    <!--是否匹配-->

                                    <!--学号-->
                                    <div class="form-group">
                                        <label class="col-sm-2"><span class="star-red">*</span>学号:</label>

                                        <div class="col-sm-10" style="margin-top:-6px">
                                            <input type="text" class="form-control" id="modify_survey_num"
                                                   placeholder="学号">
                                        </div>
                                        <span class="red" style="margin-left: 20%;font-size: 10px">修改时请输入正确的学号</span>
                                    </div>
                                    <!--学号-->

                                    <!--是否完成-->
                                    <div class="form-group">
                                        <label class="col-sm-2"><span class="star-red">*</span>是否完成:</label>

                                        <div class="col-sm-10" style="margin-top:-6px">
                                            <input type="text" class="form-control" id="modify_survey_is_finish"
                                                   placeholder="请输入是或否">
                                        </div>
                                        <span class="red" style="margin-left: 20%;font-size: 10px">请输入是或否</span>
                                    </div>
                                    <!--是否完成-->
                                </form>
                            </div>

                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default" type="button">取消</button>
                                <button onclick="surveyConditionModify();" class="btn btn-warning" type="button">确认
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <input type="button" style="display:none" id="surveyHideName">
            <input type="button" style="display:none" id="surveyHideMatch">
            <input type="button" style="display:none" id="surveyHideStunum">
            <input type="button" style="display:none" id="surveyHideFinish">
        </div>
        <!--问卷完成情况维护模态-->

        <!--问卷分组维护模态-->
        <div class="modal fade" id="surveyGroupModify">
            <div class="modal-dialog">
                <div class="modal-content" id="show_survey_group">
                    <div class="modal-header">
                        <button type="button" class="close" aria-hidden="true"></button>
                        <h4 class="modal-title">问卷分组维护</h4>
                    </div>
                    <div class="col-lg-11" style="margin-left:4%;margin-top: 3%;">
                        <div id="toolbar_group" class="btn-group">
                            <button id="btn_add_group" type="button" class="btn btn-danger">
                                <span class="glyphicon" aria-hidden="true"></span>新增分组
                            </button>
                        </div>
                        <table class="panel" id="table_survey_group" data-page-list="[10, 25, 50, 100, ALL]"></table>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">取消</button>
                        <button data-dismiss="modal" class="btn btn-warning" type="button">确认</button>
                    </div>
                </div>

                <div class="modal-content" id="new_survey_group" style="display: none">
                    <div class="modal-header">
                        <button type="button" class="close" aria-hidden="true"></button>
                        <h4 class="modal-title">添加问卷分组</h4>
                    </div>

                    <div class="modal-body" style="width:100%;height:80%">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="post" action="">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-info btn-block" onclick="back_to_show();">
                                            返回查看分组
                                        </button>
                                    </div>

                                    <!--分组名称-->
                                    <div class="form-group">
                                        <label class="col-sm-2"><span class="star-red">*</span>分组名称:</label>

                                        <div class="col-sm-10" style="margin-top:-6px">
                                            <input type="text" class="form-control" id="survey_group_name"
                                                   placeholder="分组名称">
                                        </div>
                                    </div>
                                    <!--分组名称-->

                                </form>
                            </div>

                            <div class="modal-footer">
                                <button onclick="back_to_show();" class="btn btn-default" type="button">取消</button>
                                <button onclick="submitGroupModify();" class="btn btn-warning" type="button">确认</button>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-content" id="del_survey_group" style="display: none">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">删除问卷提示</h4>
                    </div>
                    <div class="modal-body text-center">
                        <span class="left-30 red size-16">删除后将无法恢复！确认要删除吗？</span>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">取消</button>
                        <button class="btn btn-warning" type="button" onclick="delSurveyGroup();">确认</button>
                    </div>
                </div>

                <div class="modal-content" id="modify_survey_group" style="display: none">
                    <div class="modal-header">
                        <button type="button" class="close" aria-hidden="true"></button>
                        <h4 class="modal-title">修改问卷分组</h4>
                    </div>

                    <div class="modal-body" style="width:100%;height:80%">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="post" action="">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-info btn-block" onclick="back_to_show();">
                                            返回查看分组
                                        </button>
                                    </div>

                                    <!--分组名称-->
                                    <div class="form-group">
                                        <label class="col-sm-2"><span class="star-red">*</span>分组ID:</label>

                                        <div class="col-sm-10" style="margin-top:-6px">
                                            <input type="text" class="form-control" id="modify_survey_group_id"
                                                   placeholder="分组ID" disabled="">
                                        </div>
                                    </div>
                                    <!--分组名称-->

                                    <!--分组名称-->
                                    <div class="form-group">
                                        <label class="col-sm-2"><span class="star-red">*</span>分组名称:</label>

                                        <div class="col-sm-10" style="margin-top:-6px">
                                            <input type="text" class="form-control" id="modify_survey_group_name"
                                                   placeholder="分组名称">
                                        </div>
                                    </div>
                                    <!--分组名称-->

                                </form>
                            </div>

                            <div class="modal-footer">
                                <button onclick="back_to_show();" class="btn btn-default" type="button">取消</button>
                                <button onclick="groupModify();" class="btn btn-warning" type="button">确认</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <input type="button" style="display:none" id="groupHideName">
            <input type="button" style="display:none" id="groupHideId">
        </div>
        <!--问卷分组维护模态-->

        <!--删除提示模态-->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">删除问卷提示</h4>
                    </div>
                    <div class="modal-body text-center">
                        <span class="left-30 red size-16">删除后将无法恢复！确认要删除吗？</span>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">取消</button>
                        <button class="btn btn-warning" type="button" onclick="delSurvey();">确认</button>
                    </div>
                </div>
            </div>
        </div>
        <!--删除提示模态-->

        <!--删除提示模态-->
        <div class="modal fade" id="errorCondition">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">删除问卷提示</h4>
                    </div>
                    <div class="modal-body text-center">
                        <span class="left-30 red size-16">删除后将无法恢复！确认要删除吗？</span>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">取消</button>
                        <button class="btn btn-warning" type="button" onclick="delCondition();">确认</button>
                    </div>
                </div>
            </div>

            <textarea id="condition_output" rows="3" class="form-control" style="visibility:hidden"></textarea>
        </div>
        <!--删除提示模态-->

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
<script src="/SALESYS/Public/js/surveyManage/surveyConditionStart.js"></script>
<script src="/SALESYS/Public/js/jquery.dcjqaccordion.2.7.js"></script><!-- 左侧子菜单栏显示 -->
<script src="/SALESYS/Public/js/jquery.scrollTo.min.js"></script><!-- SCROLLTO JS -->
<script src="/SALESYS/Public/js/jquery.nicescroll.js"></script><!-- NICESCROLL JS -->
<script src="/SALESYS/Public/js/respond.min.js"></script><!-- RESPOND JS -->
<script src="/SALESYS/Public/js/jquery.sparkline.js"></script><!-- SPARKLINE JS -->
<script src="/SALESYS/Public/js/common-scripts.js"></script><!-- BASIC COMMON JS -->
<script src="/SALESYS/Public/js/sco.message.js" type="text/javascript"></script>
<script src="/SALESYS/Public/js/bootstrap-table.min.js"></script>
<script src="/SALESYS/Public/js/bootstrap-table-zh-CN.min.js"></script>
<script src="/SALESYS/Public/js/surveyManage/surveyCondition.js"></script>

<!-- JS -->

</body>
</html>
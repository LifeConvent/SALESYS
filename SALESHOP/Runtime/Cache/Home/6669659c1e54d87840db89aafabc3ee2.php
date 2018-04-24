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
    <link href="/SALESYS/Public/assets/icheck/green.css" rel="stylesheet">

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
        SALE - SHOP
          <span>
            门店销售系统
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

            <!--评价问卷管理注意事项-->
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h1 class="panel-title-red">
                        评价问卷管理注意事项：
                    </h1>
                </div>
                <div class="panel-body" rows="8">
                    1、在页面可对问卷进行查询，修改编辑和模版选择操作。<br>
                    2、可通过本页面表哥上方的修改问卷分组按钮对问卷分组进行维护。<br>
                    3、因全部删除对数据影响较大，所需权限较高，暂未开通。<br>
                    4、课程模版问卷名称中包含的'【课程名】'会被替换为对应课程的课程名称。<br>
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
                                    <!--问卷等级-->
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label pad-left">选择类型:</label>

                                        <div class="col-sm-9">
                                            <select id="survey_search_level" class="form-control">
                                                <option value="0"> 无</option>
                                                <option value="3"> 校级</option>
                                                <option value="2"> 院级</option>
                                                <option value="1"> 系级</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--问卷等级-->

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
                                               for="txt_search_condition_input">问卷名称：</label>

                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="txt_search_condition_input"
                                                   placeholder="请输入问卷名称">
                                        </div>
                                    </div>


                                    <div class="form-group" style="margin-left:20%;margin-top: 20px;">
                                        <div class="col-sm-12">
                                            <button type="button" onclick="searchSurvey();"
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
                        <div id="toolbar" class="btn-group">
                            <div>
                                <button id="btn_delete" type="button" class="btn btn-danger">
                                    <span class="glyphicon" aria-hidden="true"></span>全部删除
                                </button>
                                <button id="btn_add" type="button" class="btn btn-primary">
                                    <span class="glyphicon" aria-hidden="true"></span>新增问卷
                                </button>
                                <button id="btn_edit" type="button" class="btn btn-info" onclick="showSelect();">
                                    <span class="glyphicon" aria-hidden="true"></span>问卷分组管理
                                </button>
                            </div>
                        </div>
                        <table class="panel" id="table_survey" data-page-list="[10, 25, 50, 100, ALL]"></table>
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
                                                        <option disabled="" value="0">问卷分组</option>
                                                        <?php echo ($groupSelectList_search); ?>
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
                                                    <li class="list-group-item color-hui text-white"
                                                        style="text-align:center;">
                                                        问卷列表信息
                                                    </li>
                                                    <ul class="list-group" id="QuestionList">
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
                                                    <div style="float: left;margin-left: 10px;">
                                                        <button type="button" class="btn btn-danger"
                                                                onclick="emptyQuestion();">
                                                            清空问题
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

                                            <div class='checkbox' style="padding: 10px;text-align:center;margin: 0 auto;">
                                                <label><input type='checkbox' name='is_demo' id='is_demo' value='1'><span style="margin-left: 10px;">是否同时设置为课程模版 </span></label>
                                            </div>


                                            <!--提交-->
                                            <div class="form-group" id="submit_new">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="button" class="btn btn-success col-sm-10"
                                                            onclick="submitSurvey();">提交
                                                    </button>
                                                </div>
                                            </div>
                                            <!--提交-->

                                            <!--提交-->
                                            <div class="form-group" style="display: none" id="submit_modify">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="button" class="btn btn-success col-sm-10"
                                                            onclick="submitModifySurvey();">提交
                                                    </button>
                                                </div>
                                                <textarea style="display: none" id="survey_id_hide"></textarea>
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

        <!--问题添加模态-->
        <div class="modal fade" id="newSurveyQuestion">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">课程评价问卷</h4>
                    </div>

                    <div class="modal-body" style="width:100%;height:80%">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="post" action="">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-info btn-block">添加问题</button>
                                    </div>

                                    <!--问题类型-->
                                    <div class="form-group">
                                        <label class="col-sm-2">
                                            <span class="star-red">*</span>问题等级:</label>

                                        <div style="margin-top:-8px" id="question_level">
                                            <label class="checkbox-inline">
                                                <input type="radio" id="optionsRadios33" value="3"
                                                       name="survey_type" checked=""> 校级
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" id="optionsRadios22" value="2"
                                                       name="survey_type"> 院级
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" id="optionsRadios11" value="1"
                                                       name="survey_type"> 系级
                                            </label>
                                        </div>
                                    </div>
                                    <!--问题类型-->

                                    <!--问题分组-->
                                    <div class="form-group" style="display:none;">
                                        <label class="col-sm-2">
                                            <span class="star-red">*</span>选择分组:
                                        </label>

                                        <div class="col-sm-10">
                                            <select id="Qusetion_group" class="form-control">
                                            </select>
                                        </div>
                                    </div>
                                    <!--问题分组-->

                                    <!--问题名称-->
                                    <div class="form-group">
                                        <label class="col-sm-2"><span class="star-red">*</span>问题名称:</label>

                                        <div class="col-sm-10" style="margin-top:-6px">
                                            <input type="text" class="form-control" id="Qtitle" placeholder="问题名称">
                                        </div>
                                    </div>
                                    <!--问题名称-->

                                    <!--问题备注-->
                                    <div class="form-group">
                                        <label class="col-sm-2" style="margin-top:8px;">问题备注:</label>

                                        <div class="col-sm-10">
                                            <input type="text" placeholder="问题别名" name="Qhint" id="Qhint"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <!--问题备注-->

                                    <!--是否必答-->
                                    <div class="form-group" id="is_must_radio">
                                        <label class="col-sm-2" style="margin-top:8px;"><span class="star-red">*</span>是否必答:</label>
                                        <label class="checkbox-inline">
                                            <input type="radio" name="Qismust" value="1" checked=""> 是
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="radio" name="Qismust" value="0"> 否
                                        </label>
                                    </div>
                                    <!--是否必答-->

                                    <!--题目前后描述-->
                                    <div class="form-group">
                                        <label class="col-sm-2">题前描述:</label>

                                        <div class="col-sm-10">
                                            <textarea class="form-control" placeholder="请输入题前描述，可不填" rows="3"
                                                      id="QBeforeHint"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2">题后描述:</label>

                                        <div class="col-sm-10">
                                            <textarea class="form-control" rows="3" placeholder="请输入题后描述，可不填"
                                                      id="QAfterHint"></textarea>
                                        </div>
                                    </div>
                                    <!--题目前后描述-->

                                    <!--隐藏的排序和是否有答案-->
                                    <div class="form-group" style="display:none;">
                                        <label class="col-sm-2">问题排序:</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="Qlistorder" placeholder="问题排序"
                                                   value="1">
                                        </div>
                                    </div>
                                    <div class="form-group" style="display:none;">
                                        <label class="col-sm-2">是否有答案:</label>
                                        <label class="checkbox-inline">
                                            <input type="radio" name="info[hasanswer]" value="1"> 无
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="radio" name="info[hasanswer]" value="2" checked=""> 有
                                        </label>
                                    </div>
                                    <!--隐藏的排序和是否有答案-->

                                    <!--题目类型-->
                                    <div id="Qtype" class="form-group">
                                        <label class="col-sm-2" style="margin-top:2px;"><span class="star-red">*</span>题目类型</label>

                                        <div class="col-sm-10">
                                            <label><input type="radio" value="1" onclick="qType(1)"
                                                          name="Qtype" checked>单选</label>
                                            <label><input type="radio" value="2" onclick="qType(2)"
                                                          name="Qtype">多选</label>
                                            <label><input type="radio" value="3" onclick="qType(3)"
                                                          name="Qtype">填空题</label>
                                        </div>
                                    </div>
                                    <!--题目类型-->

                                    <!-- 题目类型区别：题目选项和输入框-->
                                    <div id="gap_filling" style="display:none">
                                        <div class="form-group">
                                            <label class="col-sm-2" style="margin-top:5px;">题目选项</label>

                                            <div class="col-sm-10">
                                                <input type="text" name="myblank" disabled="true" placeholder="填空题不填"
                                                       class="form-control" style="width:50%;">
                                            </div>
                                        </div>
                                        <div id="inputsize" class="form-group">
                                            <label class="col-sm-2" style="margin-top:2px;">
                                                <span class="star-red">*</span>输入框
                                            </label>

                                            <div class="col-sm-10">
                                                <label><input type="radio" value="3" name="input_size">大</label>
                                                <label><input type="radio" value="2" name="input_size">中</label>
                                                <label><input type="radio" value="1" name="input_size" checked>小</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="simple_multiple_chioce" style="display:block">
                                        <div class="form-group" id="qusetion_options">
                                            <label class="col-sm-2" style="margin-top:5px;"><span
                                                    class="star-red">*</span>题目选项</label>

                                            <div class="col-sm-8" id="options_list">
                                                <div id="div_option1" style="display: block">
                                                    <div class="left-f">
                                                        <input type="text" name="" id="select_option1"
                                                               placeholder="请输入选项1的内容"
                                                               class="form-control col-sm-6">
                                                    </div>
                                                    <div class="left-f mar-left-10">
                                                        <button type='button' onclick='delQuestion(this);'
                                                                class='btn btn-danger left-f'><span>删除</span></button>
                                                    </div>
                                                </div>

                                            </div>

                                            <button type="button" class="btn btn-info col-sm-2"
                                                    onclick="addNewOption();">新增选项
                                            </button>

                                        </div>
                                    </div>
                                    <!-- 题目类型区别：题目选项和输入框-->

                                    <!--添加按钮-->
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="button" class="btn btn-success col-sm-10"
                                                    onclick="submitQuestion();">立即添加
                                            </button>
                                        </div>
                                    </div>
                                    <!--添加按钮-->

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <textarea style="display:none" id="res_id"></textarea>
            <textarea style="display:none" id="res_user_input"></textarea>
            <textarea style="display:none" id="res_sys_response"></textarea>
            <textarea style="display:none" id="res_sys_response_type"></textarea>
        </div>
        <!--问题添加模态-->

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
                                    <span class="glyphicon" aria-hidden="true"></span>单击选择问卷
                                </button>
                            </div>
                        </div>
                        <table class="panel" id="table_survey_demo" data-page-list="[10, 25, 50, 100, ALL]"></table>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">取消</button>
                        <button class="btn btn-warning" type="button" onclick="submitSurveyDemo();">确认</button>
                    </div>
                </div>
            </div>
            <span style="display:none" id="selectDemoHide"></span>
        </div>
        <!--选择模版问卷模态-->

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
<script src="/SALESYS/Public/js/courseManage/surveyManageStart.js"></script>
<script src="/SALESYS/Public/js/jquery.dcjqaccordion.2.7.js"></script><!-- 左侧子菜单栏显示 -->
<script src="/SALESYS/Public/js/jquery.scrollTo.min.js"></script><!-- SCROLLTO JS -->
<script src="/SALESYS/Public/js/jquery.nicescroll.js"></script><!-- NICESCROLL JS -->
<script src="/SALESYS/Public/js/respond.min.js"></script><!-- RESPOND JS -->
<script src="/SALESYS/Public/js/jquery.sparkline.js"></script><!-- SPARKLINE JS -->
<script src="/SALESYS/Public/js/common-scripts.js"></script><!-- BASIC COMMON JS -->
<script src="/SALESYS/Public/js/sco.message.js" type="text/javascript"></script>
<script src="/SALESYS/Public/js/bootstrap-table.min.js"></script>
<script src="/SALESYS/Public/js/bootstrap-table-zh-CN.min.js"></script>
<script src="/SALESYS/Public/assets/icheck/icheck.js"></script>
<script src="/SALESYS/Public/js/surveyManage/surveyManage.js"></script>

<!-- JS -->

</body>
</html>
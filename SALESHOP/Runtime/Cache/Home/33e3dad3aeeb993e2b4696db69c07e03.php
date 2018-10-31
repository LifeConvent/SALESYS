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
        CES - 课程评价管理系统
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
    <link rel="stylesheet" type="text/css" href="/Public/css/setAutoRes/set-auto-list.css">
    <link rel="stylesheet" type="text/css" href="/Public/assets/dropzone/css/dropzone.css">
    <link rel="stylesheet" type="text/css" href="/Public/css/jquery.stepy.css">

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

            <!--用户课程维护注意事项-->
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h1 class="panel-title-red">
                        用户课程维护注意事项：
                    </h1>
                </div>
                <div class="panel-body" rows="8">
                    1、系统数据维护模块提供对于系统数据表的导入维护功能。<br>
                    2、Excel的导入支持07版本以下的xls格式导入。<br>
                    3、Excel的导入时需以单个文件逐步导入,导入成功后进度条显示为100%时可点击右上方'X'退出导入弹窗。<br>
                    4、导入文件的选取可通过单击或拖拽的形式进行导入。<br>
                </div>
            </div>


            <div class="row">

                <div class="panel-body" style="padding-bottom:0px;">
                    <section class="panel">
                        <header class="panel-heading">
                            <span class="label label-primary">文件上传</span>
                            <span class="tools pull-right">
                            <!--<a href="javascript:;" class="fa fa-chevron-down"></a>-->
                                <!--<a href="javascript:;" class="fa fa-times"></a>-->
                            </span>
                        </header>
                        <div class="panel-body">
                            <form action="<?php echo U('Home/Method/upload');?>" id="dropzone" class="dropzone dz-clickable"
                                  enctype='multipart/form-data'>
                                <div class="dz-default dz-message"><span>拖拽文件至此上传</span></div>
                            </form>
                        </div>
                    </section>
                </div>

            </div>

            <!--测试用文本框-->
            <textarea id="list_output" rows="3" class="form-control" style="visibility:hidden"></textarea>

        </section>
        <!-- 主容器  -->

        <div class="modal fade" id="subModel" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h5 class="modal-title">确定上传文件提示</h5>
                    </div>
                    <div class="modal-body text-center">
                        <span class="left-30 red size-16">确定要上传该文件吗？</span>
                        <footer style="margin-top: 20px;">
                            <button data-dismiss="modal" class="btn btn-default" type="button">取消</button>
                            <button class="btn btn-warning" style="margin-left: 50px;" id="sureSubmit" type="button">
                                确认
                            </button>
                        </footer>
                    </div>
                </div>
            </div>
            <span style="display:none" id="myModalHide"></span>
        </div>

        <div class="modal fade" id="uploadStep" data-backdrop="static">
            <div class="modal-dialog" style="width:630px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h5 class="modal-title">请按步骤选择要维护的数据表</h5>
                    </div>
                    <div class="modal-body text-center">
                        <div class="panel-body">
                            <div class="box-widget" style="margin: 0 auto;text-align: center;">
                                <div class="widget-head clearfix">
                                    <div id="top_tabby" class="block-tabby ">
                                        <ul id="stepy_form-titles" class="stepy-titles clearfix">
                                            <li id="stepy_form-title-1" class="current-step"
                                                style="cursor: default;">
                                                <div>第一步</div>
                                                <span>选择表格</span></li>
                                            <li id="stepy_form-title-2" style="cursor: default;" class="">
                                                <div>第二步</div>
                                                <span>匹配字段</span></li>
                                            <li id="stepy_form-title-3" style="cursor: default;" class="">
                                                <div>第三步</div>
                                                <span>开始导入</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="widget-container">
                                    <div class="widget-content box-padding" style="text-align:center;margin: 0 auto;">
                                        <div id="field1">
                                            <textarea id="table_name" rows="1" style="visibility:hidden"></textarea>

                                            <div class="col-sm-10" style="margin-left:10%">
                                                <select id="db_table" class="form-control">
                                                    <option disabled="" value="0">数据库表格选项</option>
                                                    <?php echo ($DBtable); ?>
                                                </select>
                                            </div>
                                                <textarea rows="2" class="col-sm-12"
                                                          style="visibility:hidden"></textarea>
                                            <button id="stepy_form-next-1" onclick="upload_next('1');"
                                                    class="button-next btn btn-info pull_right">下一步
                                            </button>
                                        </div>
                                        <div id="field2" style="display: none;">
                                            <textarea id="select_amount" rows="1" style="visibility:hidden"></textarea>

                                            <div class="col-sm-10" style="margin-left:10%" id="match_field">
                                            </div>
                                                <textarea rows="2" class="col-sm-12"
                                                          style="visibility:hidden"></textarea>
                                            <button id="stepy_form-back-2" onclick="upload_back('2');"
                                                    class="button-back btn btn-info">上一步
                                            </button>
                                            <button id="stepy_form-next-2" onclick="upload_next('2');"
                                                    class="button-next btn btn-info pull_right">下一步
                                            </button>
                                        </div>
                                        <div id="field3" style="display: none;">
                                            <textarea id="match_relation" rows="1" style="visibility:hidden"></textarea>

                                            <div class="col-sm-10" style="margin-left:10%">

                                                <section class="panel">
                                                    <header class="panel-heading">
                                                        <span class="label label-primary">文件上传／数据库导入进度</span>
                                                        <span class="tools pull-right">
                                                           <a class="fa fa-chevron-down" href="javascript:;"></a>
                                                            <!--<a class="fa fa-times" href="javascript:;"></a>-->
                                                            <!--按钮叉-->
                                                        </span>
                                                    </header>
                                                    <div class="panel-body">
                                                        <div class="progress progress-striped active progress-sm">
                                                            <div class="progress-bar progress-bar-green"
                                                                 role="progressbar" id="progress"
                                                                 aria-valuenow="100" aria-valuemin="0"
                                                                 aria-valuemax="100" style="width: 0%;">
                                                            </div>
                                                        </div>
                                                        <div>
                                                            已完成<span id="show_progress">0</span>%
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                                                <textarea rows="2" class="col-sm-12"
                                                          style="visibility:hidden"></textarea>
                                            <button id="stepy_form-back-3" onclick="upload_back('3');"
                                                    class="button-back btn btn-info">上一步
                                            </button>
                                            <button id="stepy_form-next-3" onclick="startMatch();"
                                                    class="button-next btn btn-info pull_right">开始导入
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
<script src="/Public/assets/dropzone/dropzone.js" type="text/javascript"></script>
<script src="/Public/assets/dropzone/form-dropzone.js" type="text/javascript"></script>
<script src="/Public/js/dataManage/courseManage.js" type="text/javascript"></script>
<script src="/Public/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="/Public/js/jquery.stepy.js" type="text/javascript"></script>

<script>
    $("#dropzone").dropzone({
        paramName: "file",
        maxFilesize: 5.0, // MB
        maxFiles: 1,//一次性上传的文件数量上限
        acceptedFiles: ".xls",
        addRemoveLinks: false,//添加移除文件
        autoProcessQueue: false,//不自动上传
        dictCancelUploadConfirmation: '你确定要取消上传吗？',
        dictMaxFilesExceeded: "您一次最多只能上传1个文件",
        dictFileTooBig: "文件过大({{filesize}}MB). 上传文件最大支持: {{maxFilesize}}MB.", init: function () {
            var submitButton = document.querySelector("#sureSubmit");
            myDropzone = this; // closure
            submitButton.addEventListener("click", function () {
                $('#subModel').modal('hide');
                //手动上传
                myDropzone.processQueue();
                $('#uploadStep').modal().css({
                    'margin-top': function () {
                        return (document.body.scrollHeight / 12);
                    },
                });
                $('#uploadStep').modal('show');
            });
            //添加了文件的事件
            this.on("addedfile", function (file) {
                // Create the remove button
                var removeButton = Dropzone.createElement("<button class='btn btn-primary btn-sm btn-block'>删除文件</button>");

                // Capture the Dropzone instance as closure.
                var _this = this;

                // Listen to the click event
                removeButton.addEventListener("click", function (e) {
                    // Make sure the button click doesn't submit the form:
                    e.preventDefault();
                    e.stopPropagation();

                    // Remove the file preview.
                    _this.removeFile(file);
                    // If you want to the delete the file on the server as well,
                    // you can do the AJAX request here.
                });

                // Add the button to the file preview element.
                file.previewElement.appendChild(removeButton);
                //存储文件名
                $('#list_output').val(file.name);
                //修改modal的css
                $('#subModel').modal().css({
                    'margin-top': function () {
                        return (document.body.scrollHeight / 5);
                    }
                });
                $('#subModel').modal('show');
            });
            this.on("success", function (file, data) {
                if (data == "upErr") {
                    $.scojs_message('服务器异常，文件上传失败！', $.scojs_message.TYPE_ERROR);
                } else {
                    $.scojs_message(data, $.scojs_message.TYPE_OK);
                }
            });
            this.on("error", function (file) {
                $.scojs_message('服务器异常，文件上传失败！', $.scojs_message.TYPE_ERROR);
            });
        }
    });

</script>
<!-- JS -->

</body>
</html>
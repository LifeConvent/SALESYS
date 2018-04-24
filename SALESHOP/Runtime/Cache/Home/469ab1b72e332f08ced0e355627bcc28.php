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
    <link rel="stylesheet" type="text/css" href="/SALESYS/Public/css/bootstrap-table.min.css">

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


            <!--微信群发消息注意事项-->
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h1 class="panel-title-red">
                        微信消息发送注意事项：
                    </h1>
                </div>
                <div class="panel-body" rows="10">
                    1、消息发送可分为单用户和多用户发送。<br>
                    2、本系统下消息发送模式支持纯文本或文本链接方式。<br>
                    3、发大段文本时，因手机分辨率分布较则乱的原因，建议选择单个账号测试后再进行准确发送。<br>
                    4、发送消息时请先编辑要发送的消息内容，在消息文本上方的表格中按照搜索条件搜索出人员信息，勾选后点击"增添发送"按钮将选中信息传送至文本下方的发送表格中，点击发送表格上方的"发送按钮"即可进行消息发送。<br>
                    5、最终发送给的用户以下方表格中的数据为准，可对单条进行编辑，上方表格中的数据是否选中不影响下方数据发送。<br>
                    6、最终发送的用户数据中若包含重复数据，则仅取一条用户信息进行发送。<br>
                    7、点击下方表格上的"发送预览"按钮，可对单个用户进行发送预览操作，发送的消息可在微信客户端查看。<br>
                    8、<span class="red">群发次数限制</span>:通过本系统向用户群发消息可多次群发，但群发的消息不会在历史记录中显示，且每个用户最多只可接受四条信息，<span
                        class="red">单个用户超过四条无法获取</span>，故请勿过分浪费群发机会（当前的预览使用的是群发机会，会消耗群发次数，建议选择后在发送）。<br>
                </div>
            </div>

            <div class="row">
                <div class="panel-body">
                    <div class="panel panel-primary">
                        <div class="panel-heading color-hui">查询条件</div>
                        <div class="panel-body">
                            <form id="formSearch" class="form-horizontal">
                                <div class="form-group" style="margin-top:15px">

                                    <label class="control-label col-sm-1 mar-left-10"
                                           for="txt_search_graclass">年级</label>

                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="txt_search_graclass">
                                    </div>

                                    <label class="control-label col-sm-1" for="txt_search_pro">专业</label>

                                    <select class="dd3-content-et m-bot15 order-select col-lg-3" id="txt_search_pro"
                                            style="margin-top:3px">
                                        <option value="">无</option>
                                        <option value="1">计算机科学与技术</option>
                                        <option value="2">信息安全</option>
                                        <option value="3">信息与计算科学</option>
                                        <option value="4">计算机科学与技术（中加方向）</option>
                                        <option value="5">网络工程</option>
                                        <option value="6">物联网工程</option>
                                        <option value="7">通信工程</option>
                                    </select>

                                    <label class="control-label col-sm-1 mar-left-10" for="txt_search_class">班级</label>

                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="txt_search_class">
                                    </div>

                                    <div class="col-sm-1" style="text-align:left;">
                                        <button type="button" style="margin-left:20px" onclick="show();" id="btn_query"
                                                class="btn btn-primary">查询
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div>
                        <div id="toolbar" class="btn-group">
                            <button id="btn_add" type="button" class="btn btn-primary">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>增添发送
                            </button>
                        </div>
                        <table class="panel" id="tablelist" data-page-list="[10, 25, 50, 100, ALL]"></table>
                    </div>

                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <h1 class="panel-title-red">
                                请输入向信用户发送的文本：（输入前请阅读上方注意事项）
                            </h1>
                        </div>
                        <textarea id="wechat_input" rows="10" class="form-control"
                                  style="visibility:visible"></textarea>
                    </div>

                    <div>
                        <div id="toolbarsend" class="btn-group">
                            <div>
                                <button id="btn_send" type="button" class="btn btn-primary">
                                    发送
                                </button>
                                <button id="btn_delete" type="button" class="btn btn-danger" style="margin-left: 2px">
                                    删除
                                </button>
                                <button id="btn_preview" type="button" class="btn btn-success" style="margin-left: 2px">
                                    发送预览
                                </button>
                            </div>
                        </div>
                        <table class="panel panel-danger" id="tablelistsend"
                               data-page-list="[10, 25, 50, 100, ALL]"></table>
                    </div>
                </div>
            </div>

            <!--测试用文本框-->
            <textarea id="nestable_list_1_output" rows="3" class="form-control" style="visibility:hidden"></textarea>

        </section>
        <!-- 主容器  -->

        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">消息发送提示</h4>
                    </div>
                    <div class="modal-body">
                        您选择发送的消息的用户中含有无效用户，无效用户将无法收到消息推送，是否继续发送？
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">取消</button>
                        <button class="btn btn-warning" type="button" onclick="sendSubmit();">确认</button>
                    </div>
                </div>
            </div>
            <span style="display:none" id="myModalHide"></span>
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

<script src="/SALESYS/Public/js/bootstrap-table.min.js"></script>
<script src="/SALESYS/Public/js/bootstrap-table-zh-CN.min.js"></script>
<script src="/SALESYS/Public/js/messageGroupSend/messageSend.js"></script>

<!-- JS -->

</body>
</html>
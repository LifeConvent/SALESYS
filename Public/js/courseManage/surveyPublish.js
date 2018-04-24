/**
 * Created by lawrance on 2016/12/5.
 */
$(function () {

    //1.初始化Table
    var oTable = new TableInit();
    oTable.Init();
});

var TableInit = function () {
    var oTableInit = new Object();
    //初始化Table
    oTableInit.Init = function () {
        $('#table_survey').bootstrapTable({
            url: HOST + "CESBack/index.php/Home/Method/getSurvey",   //请求后台的URL（*）
            method: 'get',      //请求方式（*）
            toolbar: '#toolbar_survey',    //工具按钮用哪个容器
            striped: true,      //是否显示行间隔色
            cache: false,      //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
            pagination: true,     //是否显示分页（*）
            sortable: true,      //是否启用排序
            sortName: 'group_name', // 设置默认排序为 name
            sortOrder: 'asc', // 设置排序为正序 asc
            queryParams: oTableInit.queryParams,//传递参数（*）
//                sidePagination: "server",   //分页方式：client客户端分页，server服务端分页（*）
            pageNumber: 1,      //初始化加载第一页，默认第一页
            pageSize: 10,      //每页的记录行数（*）
//                pageList: [10, 25, 50, 100, ALL],  //可供选择的每页的行数（*）
            search: true,      //是否显示表格搜索，此搜索是客户端搜索，不会进服务端，所以，个人感觉意义不大
            strictSearch: false,
            showColumns: true,     //是否显示所有的列
            showRefresh: true,     //是否显示刷新按钮
            minimumCountColumns: 2,    //最少允许的列数
            clickToSelect: true,    //是否启用点击选中行
            //height: 500,      //行高，如果没有设置height属性，表格自动根据记录条数觉得表格高度
            uniqueId: "ID",      //每一行的唯一标识，一般为主键列
            showToggle: true,     //是否显示详细视图和列表视图的切换按钮
            cardView: false,     //是否显示详细视图
            detailView: false,     //是否显示父子表

            silent: true,  //刷新事件必须设置
            formatLoadingMessage: function () {
                return "请稍等，正在加载中...";
            },
            formatNoMatches: function () {  //没有匹配的结果
                return '无符合条件的记录';
            },
            formatSearch: function () {
                return '表内查询';
            },

            columns: [{
                checkbox: true
            }, {
                field: 'group_name',
                sortable: true,
                align: 'center',
                title: '组别'
            }, {
                field: 'name',
                sortable: true,
                align: 'center',
                title: '问卷名称'
            }, {
                field: 'level',
                sortable: true,
                align: 'center',
                title: '问卷等级'
            }, {
                field: 'owner',
                sortable: true,
                align: 'center',
                title: '问卷创建者'
            }, {
                field: 'operation',
                title: '操作',
                align: 'center',
                formatter: "actionFormatter",
                events: "actionEvents_survey",
                clickToSelect: false
            }]
        });

        $('#table_user').bootstrapTable({
            url: HOST + "CESBack/index.php/Home/WeChat/getInfo",   //请求后台的URL（*）
            //url: "{:U('WeChat/getInfo')}", //目标地址.
            method: 'get',      //请求方式（*）
            toolbar: '#toolbar_user',    //工具按钮用哪个容器
            striped: true,      //是否显示行间隔色
            cache: false,      //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
            pagination: true,     //是否显示分页（*）
            sortable: true,      //是否启用排序
            sortName: 'stu_num', // 设置默认排序为 name
            sortOrder: 'asc', // 设置排序为正序 asc
            queryParams: oTableInit.queryParams,//传递参数（*）
//                sidePagination: "server",   //分页方式：client客户端分页，server服务端分页（*）
            pageNumber: 1,      //初始化加载第一页，默认第一页
            pageSize: 10,      //每页的记录行数（*）
//                pageList: [10, 25, 50, 100, ALL],  //可供选择的每页的行数（*）
            search: true,      //是否显示表格搜索，此搜索是客户端搜索，不会进服务端，所以，个人感觉意义不大
            strictSearch: false,
            showColumns: true,     //是否显示所有的列
            showRefresh: true,     //是否显示刷新按钮
            minimumCountColumns: 2,    //最少允许的列数
            clickToSelect: true,    //是否启用点击选中行
            //height: 500,      //行高，如果没有设置height属性，表格自动根据记录条数觉得表格高度
            uniqueId: "ID",      //每一行的唯一标识，一般为主键列
            showToggle: true,     //是否显示详细视图和列表视图的切换按钮
            cardView: false,     //是否显示详细视图
            detailView: false,     //是否显示父子表

            silent: true,  //刷新事件必须设置
            formatLoadingMessage: function () {
                return "请稍等，正在加载中...";
            },
            formatNoMatches: function () {  //没有匹配的结果
                return '无符合条件的记录';
            },
            formatSearch: function () {
                return '表内查询';
            },

            columns: [{
                checkbox: true
            }, {
                field: 'stu_num',
                sortable: true,
                align: 'center',
                title: '学号'
            }, {
                field: 'stu_name',
                sortable: true,
                align: 'center',
                title: '姓名'
            }, {
                field: 'stu_sex',
                sortable: true,
                align: 'center',
                title: '性别'
            }, {
                field: 'stu_graclass',
                sortable: true,
                align: 'center',
                title: '年级'
            }, {
                field: 'stu_pro',
                sortable: true,
                align: 'center',
                title: '专业'
            }, {
                field: 'stu_class',
                sortable: true,
                align: 'center',
                title: '班级'
            }, {
                field: 'is_match',
                sortable: true,
                align: 'center',
                title: '是否匹配'
            }, {
                field: 'operation',
                title: '操作',
                align: 'center',
                formatter: "actionFormatter",
                events: "actionEvents_user",
                clickToSelect: false
            }]
        });
    };

    //得到查询的参数
    oTableInit.queryParams = function (params) {
        var temp = { //这里的键的名字和控制器的变量名必须一直，这边改动，控制器也需要改成一样的
            limit: params.limit, //页面大小
            offset: params.offset, //页码
            search: params.search
        };
        return temp;
    };

    return oTableInit;
};

window.actionEvents_user = {
    'click .look': function (e, value, row, index) {
        var pro = '';
        switch (row.stu_pro) {
            case '计算机科学与技术':
                pro = '1';
                break;
            case '信息安全':
                pro = '2';
                break;
            case '信息与计算科学':
                pro = '3';
                break;
            case '计算机科学与技术（中加方向）':
                pro = '4';
                break;
            case '网络工程':
                pro = '5';
                break;
            case '物联网工程':
                pro = '6';
                break;
            case '通信工程':
                pro = '7';
                break;
        }

        $('#modify_stu_num').val(row.stu_num);
        $('#modify_stu_name').val(row.stu_name);
        $('#modify_stu_graclass').val(row.stu_graclass);
        $('#modify_stu_pro').val(pro);
        $('#modify_stu_class').val(row.stu_class);
        $('#modify_is_match').val(row.is_match);
        $('#modify_stu_sex').val(row.stu_sex);
        $('#modifyUser').modal('show');
    }
};

window.actionEvents_survey = {
    'click .look': function (e, value, row, index) {
        var id = row.survey_id;
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "CESBack/index.php/Home/CourseManage/searchSurveyDemo", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {
                id: id
            },
            success: function (result) {
                if (result.status == 'success') {
                    $('#wrapper1').hide();
                    $('#wrapper2').show();
                    //成功查找后调用的函数
                    var SQlist = result.data;
                    dealSurveyDemo(SQlist);
                } else if (result.status == 'failed') {
                    $.scojs_message('问卷修改失败，请稍后再试！' + result.message, $.scojs_message.TYPE_ERROR);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $.scojs_message('网络连接发生未知错误，请稍后再试！' + errorThrown, $.scojs_message.TYPE_ERROR);
            }
        });
    }
};

function dealSurveyDemo(SQlist) {
    $("#QuestionList").empty();
    SQlist = JSON.parse(SQlist);
    $("input[name='survey_type'][value=" + SQlist[0].level + "]").attr("checked", true);
    $('#survey_sub_group').val(SQlist[0].survey_group);
    $('#new_survey_name').val(SQlist[0].name);
    $('#new_survey_detail').text(SQlist[0].description);
    var question = SQlist[0].question;
    for (var i = 0; i < question.length; i++) {
        var id = question[i].question_id;
        var name = question[i].name;
        addLi(id, name);
    }
}

function addLi(question_id, content) {
    var id = $('#q_count').val();
    id++;
    var id_name = 'sur_ques_li' + id;
    $li = $("<li class='list-group-item mar_top' value='" + question_id + "' id='" + id_name + "' class='height-40' style='display: block'><span>" + content + "</span><button type='button' value='" + question_id + '-' + id_name + "' onclick='delQuestion(this);' class='btn btn-danger' style='float:right;margin-right:-4px;height:25px;width:40px;line-height:0;margin-top:-3px;'><span style='margin-left:-7px;'>删除</span></button></li>");
    $("#QuestionList").append($li);
    var id = $('#q_count').val(id);
}

function actionFormatter(value, row, index) {
    return '<a class="look" style="margin: 0">查看</a> ';
}

function show_user() {
    var survey_list = $('#table_survey').bootstrapTable('getAllSelections');
    if (survey_list == '' || survey_list == null) {
        $.scojs_message('请先选择要发布的问卷之后再筛选要发布的用户，建议逐个问卷发布！');
        return;
    }
    survey_list = JSON.stringify(survey_list);
    var stu_pro = $('#txt_search_pro').val();
    var stu_class = $('#txt_search_class').val();
    var stu_gra = $('#txt_search_graclass').val();
    var stu_name = $('#txt_search_name').val();
    var url = '?';
    if (stu_pro != '') {
        url += ('pro=' + stu_pro + '&');
    }
    if (stu_class != '') {
        url += ('class=' + stu_class + '&');
    }
    if (stu_gra != '') {
        url += ('gra=' + stu_gra + '&');
    }
    if (stu_name != '') {
        url += ('name=' + stu_name + '&');
    }
    if (url == '?') {
        $.scojs_message('查询内容不能为空！不需要筛选时可直接点击按问卷筛选用户按钮！', $.scojs_message.TYPE_ERROR);
        return;
    }
    $('#table_user').bootstrapTable('removeAll');
    $('#table_user').bootstrapTable('refresh', {url: HOST + "CESBack/index.php/Home/WeChat/searchInfo" + url + 's_l=' + survey_list});
}

function surveyPublish() {
    var surveyArray = $('#table_survey').bootstrapTable('getAllSelections');
    var userArray = $('#table_user').bootstrapTable('getAllSelections');
    if (surveyArray == '') {
        $.scojs_message('请选择要发布的问卷，单击问卷所在行即可选择！', $.scojs_message.TYPE_ERROR);
        return;
    }
    if (userArray == '') {
        $.scojs_message('请选择要发布问卷的用户，单击用户所在行即可选择！', $.scojs_message.TYPE_ERROR);
        return;
    }
    var surveyIDArray = new Array();
    for (var i = 0; i < surveyArray.length; i++) {
        surveyIDArray[i] = surveyArray[i]['survey_id'];
    }
    surveyArray = JSON.stringify(surveyIDArray);
    var userIDArray = new Array();
    var userOpenIDArray = new Array();
    var count = 0;
    for (var i = 0; i < userArray.length; i++) {
        userOpenIDArray.push(userArray[i]['openid']);
        userIDArray.push(userArray[i]['stu_num']);
        if (userArray[i]['is_match'] == '是') {
            count++;
        }
    }
    if (count != userArray.length) {
        $.scojs_message('所选用户中包含未匹配用户，未匹配用户需要在匹配之后才能评价问卷！', $.scojs_message.TYPE_ERROR);
    }
    var open = JSON.stringify(userOpenIDArray);
    var id = JSON.stringify(userIDArray);
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "CESBack/index.php/Home/CourseManage/surveyMatch", //目标地址.
        dataType: "json", //数据格式:JSON
        data: {s: surveyArray, u: id, o: open},
        success: function (result) {
            if (result.status == 'success') {
                $.scojs_message('发布成功，请在结束后查询结果！', $.scojs_message.TYPE_OK);
            } else if (result.status == 'failed') {
                $.scojs_message('发布失败，请稍后再试！' + result.message, $.scojs_message.TYPE_ERROR);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $.scojs_message('发布问卷的用户中不能包含已分配问卷评价任务的用户！', $.scojs_message.TYPE_ERROR);
        }
    });
    //alert(surveyArray + '---' + userArray);
}

function isArray(obj) {
    return Object.prototype.toString.call(obj) === '[object Array]';
}

function searchSurvey() {
    var level = $('#survey_search_level').val();
    var group = $('#survey_search_group').val();
    var condition = $('#txt_search_condition_input').val();
    var url = '?';
    if (level != '0') {
        url += ('l=' + level + '&');
    }
    if (condition != '' && condition != null) {
        url += ('s_n=' + condition + '&');
    }
    if (group != '0') {
        url += ('g=' + group + '&');
    }
    //alert(url);
    if (url == '?') {
        $.scojs_message('查询内容不能为空！', $.scojs_message.TYPE_ERROR);
    }
    $('#table_survey').bootstrapTable('removeAll');
    $('#table_survey').bootstrapTable('refresh', {url: HOST + "CESBack/index.php/Home/CourseManage/searchSurvey" + url});
}

function chooseNoUser() {
    var survey_list = $('#table_survey').bootstrapTable('getAllSelections');
    if (survey_list == '' || survey_list == null) {
        $.scojs_message('请先选择要发布的问卷之后再筛选要发布的用户，建议逐个问卷发布！');
        return;
    }
    survey_list = JSON.stringify(survey_list);
    $('#table_user').bootstrapTable('removeAll');
    $('#table_user').bootstrapTable('refresh', {url: HOST + 'CESBack/index.php/Home/CourseManage/chooseNoUser?s_l=' + survey_list});
}

function goBack() {
    $('#wrapper1').show();
    $('#wrapper2').hide();
}

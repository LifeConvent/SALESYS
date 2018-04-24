/**
 * Created by lawrance on 2016/12/30.
 */

$(function () {

    //1.初始化Table
    var oTable = new TableInit();
    oTable.Init();

    initCharts();


});

function initCharts() {
    var data = '[{"label": "Download Sales", "value": "12"},{"label": "In-Store Sales", "value": "30"},{"label": "Mail-Order Sales", "value": "20"},{"label": "Download Sales", "value": "12"},{"label": "In-Store Sales", "value": "30"},{"label": "Mail-Order Sales", "value": "20"},{"label": "Download Sales", "value": "12"},{"label": "In-Store Sales", "value": "30"},{"label": "Mail-Order Sales", "value": "20"}]';
    var content1 = '{"element": "surveyAnswer1","data": ' + data + ',"colors": ["#1AA9B3", "#7CBCA5", "#AAD774", "#8177C5", "#E0E4CC", "#69D2E7", "#45BFBD", "#F38630"]}';
    var content2 = '{"element": "surveyAnswer2","data": ' + data + ',"colors": ["#1AA9B3", "#7CBCA5", "#AAD774", "#8177C5", "#E0E4CC", "#69D2E7", "#45BFBD", "#F38630"]}';
    var content3 = '{"element": "surveyAnswer3","data": ' + data + ',"colors": ["#1AA9B3", "#7CBCA5", "#AAD774", "#8177C5", "#E0E4CC", "#69D2E7", "#45BFBD", "#F38630"]}';
    //data = JSON.parse(content);

    var test = content1 + '&' + content2 + '&' + content3;
    var name = $('#survey_name').val();
    $('#title').text(name);

    var content = $('#survey_content').val();
    content = JSON.parse(content);

    //alert(content[1]);
    for (var i = 0; i < content.length; i++) {
        Morris.Donut(JSON.parse(content[i]));
    }
}

var TableInit = function () {
    var oTableInit = new Object();
    //初始化Table
    oTableInit.Init = function () {
        $('#table_survey_count').bootstrapTable({
            url: HOST + "index.php/Home/Method/getSurvey",   //请求后台的URL（*）
            method: 'get',      //请求方式（*）
            toolbar: '#toolbar',    //工具按钮用哪个容器
            striped: true,      //是否显示行间隔色
            cache: false,      //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
            pagination: true,     //是否显示分页（*）
            sortable: true,      //是否启用排序
            sortName: 'group_name', // 设置默认排序为 name
            sortOrder: 'asc', // 设置排序为正序 asc
            //queryParams: oTableInit.queryParams,//传递参数（*）
//                sidePagination: "server",   //分页方式：client客户端分页，server服务端分页（*）
            pageNumber: 1,      //初始化加载第一页，默认第一页
            pageSize: 10,      //每页的记录行数（*）
            search: true,      //是否显示表格搜索，此搜索是客户端搜索，不会进服务端，所以，个人感觉意义不大
            strictSearch: false,
            showColumns: true,     //是否显示所有的列
            showRefresh: true,     //是否显示刷新按钮
            minimumCountColumns: 2,    //最少允许的列数
            clickToSelect: true,    //是否启用点击选中行
            //height: 500,      //行高，如果没有设置height属性，表格自动根据记录条数觉得表格高度
            uniqueId: "ID",      //每一行的唯一标识，一般为主键列
            showToggle: true,     //是否显示详细视图和列表视图的切换按钮
            cardView: false,     //是否显示详细视图
            detailView: false,     //是否显示父子表

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
            }]
        });
    };

    return oTableInit;
};

function searchSurvey() {
    var level = $('#survey_search_level').val();
    var group = $('#survey_search_group').val();
    var condition = $('#txt_search_condition_input').val();
    var url = '?';
    if (level != '0') {
        url += ('l=' + level + '&');
    }
    if (group != '0') {
        url += ('g=' + group + '&');
    }
    if (condition != '' && condition != null) {
        url += ('s_n=' + condition + '&');
    }
    //alert(url);
    if (url == '?') {
        $.scojs_message('查询内容不能为空！', $.scojs_message.TYPE_ERROR);
    }
    $('#table_survey_count').bootstrapTable('removeAll');
    $('#table_survey_count').bootstrapTable('refresh', {url: HOST + "index.php/Home/CourseManage/searchSurvey" + url});
}

function outputResult() {
    var survey = $('#table_survey_count').bootstrapTable('getAllSelections');
    if (survey.length <= 0) {
        $.scojs_message('请至少选择一个问卷进行结果导出！', $.scojs_message.TYPE_ERROR);
        return;
    } else if (survey.length > 1) {
        $.scojs_message('请选择一个问卷进行结果导出,多个问卷暂时无法同时导出！', $.scojs_message.TYPE_ERROR);
        return;
    }
    var survey_id = survey[0].survey_id;
    //请求后台统计数据，获取问卷分析结果
    window.location.href = HOST + "index.php/Home/DataManage/outputResult?s_i=" + survey_id;
}

function changeContainer() {
    var survey = $('#table_survey_count').bootstrapTable('getAllSelections');
    if (survey.length <= 0) {
        $.scojs_message('请至少选择一个问卷进行结果统计！', $.scojs_message.TYPE_ERROR);
        return;
    } else if (survey.length > 1) {
        $.scojs_message('请选择一个问卷进行结果统计,多个问卷暂时无法同时分析！', $.scojs_message.TYPE_ERROR);
        return;
    }
    var survey_id = survey[0].survey_id;
    //请求后台统计数据，获取问卷分析结果
    window.location.href = HOST + "index.php/Home/DataManage/getSurveyImageCount?s_i=" + survey_id;
    //$.ajax({
    //    type: "POST",
    //    url: HOST + "index.php/Home/DataManage/getSurveyImageCount",
    //    dataType: 'json',
    //    data: {s_i: survey_id}
    //    //success: function (result) {
    //    //    if (result.status == 'success') {
    //    //        $('#container_select').hide();
    //    //        $('#container_data').show();
    //    //    } else {
    //    //        $.scojs_message(result.message, $.scojs_message.TYPE_ERROR);
    //    //    }
    //    //},
    //    //error: function (request) {
    //    //    $.scojs_message('网络连接发生未知错误，请稍后再试！', $.scojs_message.TYPE_ERROR);
    //    //}
    //});
}



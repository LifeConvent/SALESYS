/**
 * Created by lawrance on 2016/12/15.
 */

$(function () {

    $('#course').attr('class', 'active');
    $('#course_sub').css('display', 'block');
    $('#course_count').attr('class', 'active');

    var oTable = new TableInit();
    oTable.Init();


});

var TableInit = function () {
    var oTableInit = new Object();
    //初始化Table
    oTableInit.Init = function () {
        $('#table_condition').bootstrapTable({
            url: HOST + "index.php/Home/CourseManage/getSurveyPlan",   //请求后台的URL（*）
            method: 'get',      //请求方式（*）
            toolbar: '#toolbar_condition',    //工具按钮用哪个容器
            striped: true,      //是否显示行间隔色
            cache: false,      //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
            pagination: true,     //是否显示分页（*）
            sortable: true,      //是否启用排序
            sortName: 'id', // 设置默认排序为 name
            sortOrder: 'asc', // 设置排序为正序 asc
            queryParams: oTableInit.queryParams,//传递参数（*）
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
                field: 'id',
                sortable: true,
                align: 'center',
                title: '编号'
            }, {
                field: 'name',
                sortable: true,
                align: 'center',
                title: '问卷名称'
            }, {
                field: 'stu_num',
                sortable: true,
                align: 'center',
                title: '学号'
            }, {
                field: 'is_match',
                sortable: true,
                align: 'center',
                title: '是否匹配'
            }, {
                field: 'is_finish',
                sortable: true,
                align: 'center',
                title: '是否完成'
            }, {
                field: 'operation',
                title: '操作',
                align: 'center',
                formatter: "actionFormatter",
                events: "actionEvents",
                clickToSelect: false
            }]
        });
    };

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

window.actionEvents = {
    'click .delete': function (e, value, row, index) {
        $('#condition_output').text(row.id);
        //删除操作
        $('#errorCondition').modal('show');
    },
    'click .send': function (e, value, row, index) {
        $('#surveyHideMatch').val(row.id);
        $('#surveyHideStunum').val(row.stu_num);
        $('#surveyHideFinish').val(row.is_finish);

        $('#modify_survey_name').val(row.name);
        $('#modify_survey_is_match').val(row.is_match);
        $('#modify_survey_num').val(row.stu_num);
        $('#modify_survey_is_finish').val(row.is_finish);
        $('#surveyModify').modal('show');
    }
};

function surveyConditionModify() {

    var id = $('#surveyHideMatch').val();
    var c = $('#surveyHideStunum').val();
    var d = $('#surveyHideFinish').val();

    var c1 = $('#modify_survey_num').val();
    var d1 = $('#modify_survey_is_finish').val();
    if (d1 != '是' && d1 != '否') {
        $.scojs_message('是否完成输入框仅能输入是或否！', $.scojs_message.TYPE_ERROR);
        return '';
    }

    if (c == c1 && d == d1) {
        $.scojs_message('您未进行任何修改，已自动退出！', $.scojs_message.TYPE_ERROR);
        return '';
    }

    if (d1 == '是') {
        d1 = '1';
    } else if (d1 == '否') {
        d1 = '0';
    }
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "index.php/Home/courseManage/modifySurveyCondition", //目标地址.
        dataType: "json", //数据格式:JSON
        data: {s_n: c1, i_f: d1, id: id},
        success: function (result) {
            if (result.status == 'success') {
                $.scojs_message('修改成功！', $.scojs_message.TYPE_OK);
                $('#surveyModify').modal('hide');
                $('#table_condition').bootstrapTable('refresh');
            } else if (result.status == 'failed') {
                //45009 接口调用次数超过限制
                $.scojs_message('修改失败！', $.scojs_message.TYPE_ERROR);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $.scojs_message('网络连接发生未知错误，请稍后再试！' + errorThrown, $.scojs_message.TYPE_ERROR);
        }
    });
}

function actionFormatter(value, row, index) {
//        return '<a class="mod" >修改</a> ' + '<a class="delete">删除</a> ' + '<a class="send">增添发送</a>';
    return '<a class="delete" style="margin: 0">删除</a> ' + '<a class="send">编辑</a>';
}

function setWeChatContent() {
    var user = $('#table_condition').bootstrapTable('getAllSelections');
    user = JSON.stringify(user);
    user = JSON.parse(user);
    if (user.length < 1) {
        $.scojs_message('请选择要发送的用户！', $.scojs_message.TYPE_ERROR);
        return;
    }
    $('#txt_wechat_content').text("CES-课程评价系统通知:\n\n   您有新的课程评价问卷已经发布成功，请在规定时间内完成课程评价。\n\n   在公众平台中直接输入'课程评价'即可获取课程问卷进行评价。\n");
    $('#modifyContent').modal('show');
}

function sendWeChatMessage() {
    var content = $('#txt_wechat_content').text();
    var user = $('#table_condition').bootstrapTable('getAllSelections');
    user = JSON.stringify(user);
    user = JSON.parse(user);
    var OpenIDArray = new Array();
    var match = 0, notMatch = 0;
    for (var i = 0; i < user.length; i++) {
        if (user[i].is_match == '是') {
            match++;
            OpenIDArray.push(user[i].openid);
        } else {
            notMatch++;
        }
    }
    if (content == '') {
        $.scojs_message('提交的信息不能为空！', $.scojs_message.TYPE_ERROR);
    } else if (!match) {
        $.scojs_message('选择的用户信息中不包含有效用户，请确定后再试！', $.scojs_message.TYPE_ERROR);
    } else {
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "CES/index.php/Home/GroupSend/allSendNews", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {content: content, openid: OpenIDArray, type: 'text'},
            success: function (result) {
                if (result.status == 'success') {
                    if (notMatch > 0) {
                        $.scojs_message('选择的用户信息中不包含无效用户，无效用户无法发送消息！', $.scojs_message.TYPE_ERROR);
                    }
                    $.scojs_message('消息发送成功！', $.scojs_message.TYPE_OK);
                    $('#modifyContent').modal('hide');
                } else if (result.status == 'failed') {
                    //45009 接口调用次数超过限制
                    $.scojs_message('消息发送失败！' + result.message, $.scojs_message.TYPE_ERROR);
                }
            },
            error: function (request) {
                $.scojs_message('网络连接发生未知错误，请稍后再试！', $.scojs_message.TYPE_ERROR);
            }
        });
    }
}

function exportExcel() {
    var data = $('#table_condition').bootstrapTable('getAllSelections');
    data = JSON.stringify(data);
    window.location.href = HOST + "index.php/Home/Method/expSurveyCondition?content=" + data;
}

function delCondition() {
    var id = $('#condition_output').text();
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "index.php/Home/courseManage/delCondition", //目标地址.
        dataType: "json", //数据格式:JSON
        data: {id: id},
        success: function (result) {
            if (result.status == 'success') {
                $.scojs_message('删除成功！', $.scojs_message.TYPE_OK);
                $('#errorCondition').modal('hide');
                $('#table_condition').bootstrapTable('refresh');
            } else if (result.status == 'failed') {
                //45009 接口调用次数超过限制
                $.scojs_message('删除失败！', $.scojs_message.TYPE_ERROR);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $.scojs_message('网络连接发生未知错误，请稍后再试！' + errorThrown, $.scojs_message.TYPE_ERROR);
        }
    });
}

function searchCondition(){
    var group = $('#survey_search_group').val();
    var survey_name = $('#txt_search_survey_name').val();
    var stu_num = $('#txt_search_stu_num').val();
    var url = '?';
    if (group != '-1') {
        url += ('g=' + group + '&');
    }
    if (survey_name != '' && survey_name != null) {
        url += ('s_name=' + survey_name + '&');
    }
    if (stu_num != '' && stu_num != null) {
        url += ('s_num=' + stu_num + '&');
    }
    //alert(url);
    if (url == '?') {
        $.scojs_message('查询内容不能为空！', $.scojs_message.TYPE_ERROR);
    }
    $('#table_condition').bootstrapTable('removeAll');
    $('#table_condition').bootstrapTable('refresh', {url: HOST + "index.php/Home/CourseManage/searchCondition" + url});

}

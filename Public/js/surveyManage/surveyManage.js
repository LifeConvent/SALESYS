/**
 * Created by lawrance on 2016/11/29.
 */
$(function () {

    //1.初始化Table
    var oTable = new TableInit();
    oTable.Init();
//        $[sessionStorage] = oTable.queryParams;

    //2.初始化Button的点击事件
    var oButtonInit = new ButtonInit();
    oButtonInit.Init();

    $('input').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
        increaseArea: '2%' // optional
    });

});

var TableInit = function () {
    var oTableInit = new Object();
    //初始化Table
    oTableInit.Init = function () {
        $('#table_survey').bootstrapTable({
            url: HOST + "index.php/Home/Method/getSurvey",   //请求后台的URL（*）
            method: 'get',      //请求方式（*）
            toolbar: '#toolbar',    //工具按钮用哪个容器
            striped: true,      //是否显示行间隔色
            cache: false,      //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
            pagination: true,     //是否显示分页（*）
            sortable: false,      //是否启用排序
            sortName: 'group_name', // 设置默认排序为 name
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
                events: "actionEvents",
                clickToSelect: false
            }]
        });
        $('#table_survey_demo').bootstrapTable({
            url: HOST + "index.php/Home/Method/getSurvey",   //请求后台的URL（*）
            method: 'get',      //请求方式（*）
            toolbar: '#toolbar_demo',    //工具按钮用哪个容器
            striped: true,      //是否显示行间隔色
            cache: false,      //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
            pagination: true,     //是否显示分页（*）
            sortable: false,      //是否启用排序
            sortName: 'group_name', // 设置默认排序为 name
            sortOrder: 'asc', // 设置排序为正序 asc
            queryParams: oTableInit.queryParams,//传递参数（*）
//                sidePagination: "server",   //分页方式：client客户端分页，server服务端分页（*）
            pageNumber: 1,      //初始化加载第一页，默认第一页
            pageSize: 5,      //每页的记录行数（*）
//                pageList: [10, 25, 50, 100, ALL],  //可供选择的每页的行数（*）
            search: true,      //是否显示表格搜索，此搜索是客户端搜索，不会进服务端，所以，个人感觉意义不大
            strictSearch: false,
            showColumns: false,     //是否显示所有的列
            showRefresh: true,     //是否显示刷新按钮
            minimumCountColumns: 2,    //最少允许的列数
            clickToSelect: true,    //是否启用点击选中行
            //height: 500,      //行高，如果没有设置height属性，表格自动根据记录条数觉得表格高度
            uniqueId: "ID",      //每一行的唯一标识，一般为主键列
            showToggle: false,     //是否显示详细视图和列表视图的切换按钮
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
            }]
        });
        $('#table_survey_group').bootstrapTable({
            url: HOST + "index.php/Home/CourseManage/getSurveyGroup",   //请求后台的URL（*）
            method: 'get',      //请求方式（*）
            toolbar: '#toolbar_group',    //工具按钮用哪个容器
            striped: true,      //是否显示行间隔色
            cache: false,      //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
            pagination: true,     //是否显示分页（*）
            sortable: false,      //是否启用排序
            sortName: 'group_id', // 设置默认排序为 name
            sortOrder: 'asc', // 设置排序为正序 asc
            queryParams: oTableInit.queryParams,//传递参数（*）
//                sidePagination: "server",   //分页方式：client客户端分页，server服务端分页（*）
            pageNumber: 1,      //初始化加载第一页，默认第一页
            pageSize: 5,      //每页的记录行数（*）
//                pageList: [10, 25, 50, 100, ALL],  //可供选择的每页的行数（*）
            search: true,      //是否显示表格搜索，此搜索是客户端搜索，不会进服务端，所以，个人感觉意义不大
            strictSearch: false,
            showColumns: false,     //是否显示所有的列
            showRefresh: true,     //是否显示刷新按钮
            minimumCountColumns: 2,    //最少允许的列数
            clickToSelect: true,    //是否启用点击选中行
            //height: 500,      //行高，如果没有设置height属性，表格自动根据记录条数觉得表格高度
            uniqueId: "ID",      //每一行的唯一标识，一般为主键列
            showToggle: false,     //是否显示详细视图和列表视图的切换按钮
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
                field: 'group_id',
                sortable: true,
                align: 'center',
                title: '组别ID'
            }, {
                field: 'group_name',
                sortable: true,
                align: 'center',
                title: '组别名称'
            }, {
                field: 'operation',
                title: '操作',
                align: 'center',
                formatter: "actionFormatterGroup",
                events: "actionEventsGroup",
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

var ButtonInit = function () {
    var oInit = new Object();
    var postdata = {};

    oInit.Init = function () {
        //初始化页面上面的按钮事件
    };

    return oInit;
};

window.actionEvents = {
    'click .delete': function (e, value, row, index) {
        $('#list_output').text(row.survey_id);
        //删除操作
        $('#myModal').modal('show');
    },
    'click .send': function (e, value, row, index) {
        var id = row.survey_id;
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "index.php/Home/CourseManage/searchSurveyDemo", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {
                id: id
            },
            success: function (result) {
                if (result.status == 'success') {
                    $('#wrapper1').hide();
                    $('#wrapper2').show();
                    /**
                     * 隐藏新增按钮
                     * 显示修改按钮
                     * */
                    $('#submit_new').hide();
                    $('#submit_modify').show();
                    //成功查找后调用的函数
                    var SQlist = result.data;
                    dealSurveyDemo(SQlist);
                    $('#survey_id_hide').val(id);
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

function actionFormatter(value, row, index) {
//        return '<a class="mod" >修改</a> ' + '<a class="delete">删除</a> ' + '<a class="send">增添发送</a>';
    return '<a class="delete" style="margin: 0">删除</a> ' + '<a class="send">编辑</a>';
}

window.actionEventsGroup = {
    'click .delete': function (e, value, row, index) {
        //删除操作
        $('#surveyGroupHide').text(row.group_id);
        $('#del_survey_group').show();
        $('#show_survey_group').hide();
    },
    'click .send': function (e, value, row, index) {
        $('#groupHideId').val(row.group_id);
        $('#groupHideName').val(row.group_name);
        $('#modify_survey_group_id').val(row.group_id);
        $('#modify_survey_group_name').val(row.group_name);
        $('#modify_survey_group').show();
        $('#del_survey_group').hide();
        $('#show_survey_group').hide();
    }
};

function actionFormatterGroup(value, row, index) {
//        return '<a class="mod" >修改</a> ' + '<a class="delete">删除</a> ' + '<a class="send">增添发送</a>';
    return '<a class="delete" style="margin: 0">删除</a> ' + '<a class="send">编辑</a>';
}

function delSurveyGroup() {
    var g_i = $('#surveyGroupHide').text();
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "index.php/Home/CourseManage/delGroup", //目标地址.
        dataType: "json", //数据格式:JSON
        data: {
            id: g_i
        },
        success: function (result) {
            if (result.status == 'success') {
                $('#del_survey_group').hide();
                $('#show_survey_group').show();
                $('#new_survey_group').hide();
                $.scojs_message('问卷分组删除成功！', $.scojs_message.TYPE_OK);
                $('#table_survey_group').bootstrapTable('refresh');

            } else if (result.status == 'failed') {
                $.scojs_message('问卷添加失败，请稍后再试！' + result.message, $.scojs_message.TYPE_ERROR);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $.scojs_message('网络连接发生未知错误，请稍后再试！' + errorThrown, $.scojs_message.TYPE_ERROR);
        }
    });
}

function show() {
    var survey_name = $('#txt_search_user_input').val();
    var url = '?';
    if (survey_name != '') {
        url += ('name=' + survey_name);
    }
    if (url == '?') {
        $.scojs_message('查询内容不能为空！', $.scojs_message.TYPE_ERROR);
    }
    $('#table_survey').bootstrapTable('removeAll');
    $('#table_survey').bootstrapTable('refresh', {url: HOST + "index.php/Home/Method/searchSurvey" + url});
}

$('#btn_delete').click(function () {
    $result = $('#table_survey').bootstrapTable('getAllSelections');
    if ($result[0] != null) {
        $.scojs_message('删除全部将会丢失所有数据，请等待开发！', $.scojs_message.TYPE_ERROR);
    }
});

$('#btn_add').click(function () {
    $("#QuestionList").empty();
    $('#wrapper1').hide();
    $('#wrapper2').show();
    $('#submit_modify').hide();
    $('#submit_new').show();
});

$('#btn_add_group').click(function () {
    $('#show_survey_group').hide();
    $('#new_survey_group').show();
});

function back_to_show() {
    $('#modify_survey_group').hide();
    $('#new_survey_group').hide();
    $('#show_survey_group').show();
}

function submitGroupModify() {
    var g_n = $('#survey_group_name').val();
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "index.php/Home/CourseManage/addNewGroup", //目标地址.
        dataType: "json", //数据格式:JSON
        data: {
            name: g_n
        },
        success: function (result) {
            if (result.status == 'success') {
                $('#new_survey_group').hide();
                $('#del_survey_group').hide();
                $('#show_survey_group').show();
                $.scojs_message('问卷分组添加成功！', $.scojs_message.TYPE_OK);
                $('#table_survey_group').bootstrapTable('refresh');

            } else if (result.status == 'failed') {
                $.scojs_message('问卷添加失败，请稍后再试！' + result.message, $.scojs_message.TYPE_ERROR);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $.scojs_message('网络连接发生未知错误，请稍后再试！' + errorThrown, $.scojs_message.TYPE_ERROR);
        }
    });
}

function groupModify() {

    var a = $('#groupHideId').val();
    var b = $('#groupHideName').val();
    var a1 = $('#modify_survey_group_id').val();
    var b1 = $('#modify_survey_group_name').val();
    if (a == a1 && b == b1) {
        $.scojs_message('未发生任何修改,已自动退出！', $.scojs_message.TYPE_ERROR);
        return;
    }
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "index.php/Home/CourseManage/modifyGroup", //目标地址.
        dataType: "json", //数据格式:JSON
        data: {
            name: b1,
            id: a1
        },
        success: function (result) {
            if (result.status == 'success') {
                $('#new_survey_group').hide();
                $('#del_survey_group').hide();
                $('#modify_survey_group').hide();
                $('#show_survey_group').show();
                $.scojs_message('问卷分组修改成功！', $.scojs_message.TYPE_OK);
                $('#table_survey_group').bootstrapTable('refresh');

            } else if (result.status == 'failed') {
                $.scojs_message('问卷添加失败，请稍后再试！' + result.message, $.scojs_message.TYPE_ERROR);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $.scojs_message('网络连接发生未知错误，请稍后再试！' + errorThrown, $.scojs_message.TYPE_ERROR);
        }
    });
}

function goBack() {
    $('#wrapper1').show();
    $('#wrapper2').hide();
}

function addQuestion() {
    $('#newSurveyQuestion').modal('show');
}

//增加一个li时需要传入它的问题名称以及问题编号（通过文本框id获取），再请求完后台入库成功后显示新增
function addLi(question_id, content) {
    var id = $('#q_count').val();
    id++;
    var id_name = 'sur_ques_li' + id;
    $li = $("<li class='list-group-item mar_top' value='" + question_id + "' id='" + id_name + "' class='height-40' style='display: block'><span>" + content + "</span><button type='button' value='" + question_id + '-' + id_name + "' onclick='delQuestion(this);' class='btn btn-danger' style='float:right;margin-right:-4px;height:25px;width:40px;line-height:0;margin-top:-3px;'><span style='margin-left:-7px;'>删除</span></button></li>");
    $("#QuestionList").append($li);
    var id = $('#q_count').val(id);
}

function delQuestion(obj) {
    var res = $(obj).attr("value");
    var arr = res.split('-');
    $('#' + arr[1]).hide();

    /**
     *
     *  在编辑界面删除问题时会影响其他问卷的输出操作，需要独立设置问题维护界面，放置在问卷中进行
     *
     * */
    //var id = arr[0];
    //arr[0]  数据库中删除,避免过大缓存
    //$.ajax({
    //    type: "POST", //用POST方式传输
    //    url: HOST + "index.php/Home/CourseManage/delQuestion", //目标地址.
    //    dataType: "json", //数据格式:JSON
    //    data: {
    //        q_id: id
    //    },
    //    success: function (result) {
    //        if (result.status == 'success') {
    //            $.scojs_message('删除成功！', $.scojs_message.TYPE_OK);
    //        } else if (result.status == 'failed') {
    //            $.scojs_message('删除失败，但不影响您的问卷，请继续操作！', $.scojs_message.TYPE_ERROR);
    //        }
    //    },
    //    error: function (jqXHR, textStatus, errorThrown) {
    //        $.scojs_message('网络连接发生未知错误，请稍后再试！' + errorThrown, $.scojs_message.TYPE_ERROR);
    //    }
    //});
}

function delOption(obj) {
    alert($(obj).attr("value"));
    var id = 'div_option' + $(obj).attr("value");
    $('#' + id).hide();
    //最后提交的时候要获取选项的内容 Qlistorder即为选项的个数，通过判断display来获取选项具体内容进而保存,不影响数据库
    //alert($('#' + id).attr('style'));
}

function qType(id) {
    switch (id) {
        //单选、多选
        case 1:
        case 2:
            $('#gap_filling').hide();
            $('#simple_multiple_chioce').show();
            break;
        //填空
        case 3:
            $('#gap_filling').show();
            $('#simple_multiple_chioce').hide();
            break;
    }
}

function addNewOption() {
    var id = $('#Qlistorder').val();
    id++;
    var id_name = 'div_option' + id;
    var option_name = 'select_option' + id;
    $input = $("<div class='mar-top-10' id='" + id_name + "' style='display: block'> <div class='left-f mar-top-10'> <input type='text' name='' placeholder='请输入选项" + id + "的内容' id='" + option_name + "' class='form-control col-sm-6'> </div> <div class='left-f mar-left-10  mar-top-10'> <button type='button' onclick='delOption(this);' value='" + id + "' class='btn btn-danger left-f'><span>删除</span></button> </div> </div>");
    $("#options_list").append($input);
    $('#Qlistorder').val(id);
}

function submitQuestion() {
    //必填项
    var group = $('#survey_sub_group').val();
    var q_level = $('#question_level input[name="survey_type"]:checked ').val();
    var q_ismust = $('#is_must_radio input[name="Qismust"]:checked ').val();
    var q_qtype = $('#Qtype input[name="Qtype"]:checked ').val();
    var q_name = $('#Qtitle').val();
    if (q_level == '' || q_ismust == '' || q_qtype == '' || q_name == '') {
        $.scojs_message("必填项不能为空！", $.scojs_message.TYPE_ERROR);
        return;
    }
    //选填项
    var q_hint = $('#Qhint').val();
    var q_beforehint = $('#QBeforeHint').val();
    var q_afterhint = $('#QAfterHint').val();

    switch (q_qtype) {
        case '1':
        case '2':
        {
            //问题选项 必填
            var num = $('#Qlistorder').val();
            var option = new Array();
            for (var i = 1; i <= num; i++) {
                var ele = $('#div_option' + i);
                var ele_option = $('#select_option' + i);
                if (ele.attr('style') == 'display: block') {
                    //alert(ele_option.val());
                    if (ele_option.val() == '') {
                        $.scojs_message('题目选项内容不能为空！', $.scojs_message.TYPE_ERROR);
                        return;
                    } else {
                        option.push(ele_option.val());
                    }
                }
            }
            break;
        }
        case '3':
            var q_input_size = $('input[name="input_size"]:checked').val();
            break;
    }
    var q_surveyorder = $('#new_survey_sort').val();
    var arr = JSON.stringify(option);
    //提交至数据库
    //未删除时保存它的问题序列号至数据库中问卷列表下
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "index.php/Home/CourseManage/addNewQuestion", //目标地址.
        dataType: "json", //数据格式:JSON
        data: {
            q_level: q_level,
            q_ismust: q_ismust,
            q_qtype: q_qtype,
            q_name: q_name,
            q_hint: q_hint,
            q_beforehint: q_beforehint,
            q_afterhint: q_afterhint,
            option: arr,
            q_input_size: q_input_size,
            q_surveyorder: q_surveyorder,
            group: group
        },
        success: function (result) {
            if (result.status == 'success') {
                addLi(result.id, q_name);
                $('#new_survey_sort').val(++q_surveyorder);
                $('#newSurveyQuestion').modal('hide');
                $.scojs_message('问题添加成功！', $.scojs_message.TYPE_OK);
            } else if (result.status == 'failed') {
                $.scojs_message('问题添加失败，请稍后再试！' + result.message, $.scojs_message.TYPE_ERROR);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $.scojs_message('网络连接发生未知错误，请稍后再试！' + errorThrown, $.scojs_message.TYPE_ERROR);
        }
    });
}

function submitSurvey() {
    var num = $('#q_count').val();//问卷当中的问题总数
    if (($("#is_demo").is(':checked'))) {
        var is_demo = 1;//是否为问卷课程模版
    } else {
        is_demo = 0;//是否为问卷课程模版
    }
    var name = $('#new_survey_name').val();
    var group = $('#survey_sub_group').val();
    var level = $('#survey_level input[name="survey_type"]:checked ').val();
    var detail = $('#new_survey_detail').val();//简介

    //问卷的问题列表
    var result = '';
    for (var i = 1; i <= num; i++) {
        var ele = $('#sur_ques_li' + i);
        if (ele.attr('style') == 'display: block') {
            if (i != num)
                result += (ele.attr('value') + ',');
            else
                result += (ele.attr('value'));
        }
    }

    /**
     * 当最后一个字符为，时删除，以免产生空问题
     * */
    if (result.charAt(result.length - 1) == ',') {
        result = result.substring(0, result.length - 1);
    }

    /**
     * 拆分question（result）获取问题真正的数量
     * */
    var count = result.split(',');

    if (name == '' || group == '' || level == '' || result == '') {
        $.scojs_message("必填项不能为空！", $.scojs_message.TYPE_ERROR);
        return;
    }
    //alert(result +'=='+ name +'=='+ group+'=='+ level+'=='+ detail);
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "index.php/Home/CourseManage/addNewSurvey", //目标地址.
        dataType: "json", //数据格式:JSON
        data: {
            is_demo: is_demo,
            count: count.length,
            name: name,
            group: group,
            level: level,
            detail: detail,
            question: result
        },
        success: function (result) {
            if (result.status == 'success') {
                $('#wrapper1').show();
                $('#wrapper2').hide();
                $.scojs_message('问卷添加成功！', $.scojs_message.TYPE_OK);
                $('#table_survey').bootstrapTable('refresh');

            } else if (result.status == 'failed') {
                $.scojs_message('问卷添加失败，请稍后再试！' + result.message, $.scojs_message.TYPE_ERROR);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $.scojs_message('网络连接发生未知错误，请稍后再试！' + errorThrown, $.scojs_message.TYPE_ERROR);
        }
    });
}

function submitModifySurvey() {
    var num = $('#q_count').val();//问卷当中的问题总数
    if ($("#is_demo").is(':checked')) {
        var is_demo = 1;//是否为问卷课程模版
    } else {
        is_demo = 0;//是否为问卷课程模版
    }
    var name = $('#new_survey_name').val();
    var group = $('#survey_sub_group').val();
    var level = $('#survey_level input[name="survey_type"]:checked ').val();
    var detail = $('#new_survey_detail').val();//简介
    var id = $('#survey_id_hide').val();

    //问卷的问题列表
    var result = '';
    for (var i = 1; i <= num; i++) {
        var ele = $('#sur_ques_li' + i);
        if (ele.attr('style') == 'display: block') {
            if (i != num)
                result += (ele.attr('value') + ',');
            else
                result += (ele.attr('value'));
        }
    }

    /**
     * 当最后一个字符为，时删除，以免产生空问题
     * */
    if (result.charAt(result.length - 1) == ',') {
        result = result.substring(0, result.length - 1);
    }

    /**
     * 拆分question（result）获取问题真正的数量
     * */
    var count = result.split(',');

    if (name == '' || group == '' || level == '' || result == '') {
        $.scojs_message("必填项不能为空！", $.scojs_message.TYPE_ERROR);
        return;
    }
    //alert(result +'=='+ name +'=='+ group+'=='+ level+'=='+ detail);
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "index.php/Home/CourseManage/modifySurvey", //目标地址.
        dataType: "json", //数据格式:JSON
        data: {
            is_demo: is_demo,
            id: id,
            count: count.length,
            name: name,
            group: group,
            level: level,
            detail: detail,
            question: result
        },
        success: function (result) {
            if (result.status == 'success') {
                $('#wrapper1').show();
                $('#wrapper2').hide();
                $.scojs_message('问卷修改成功！', $.scojs_message.TYPE_OK);
                $('#table_survey').bootstrapTable('refresh');

            } else if (result.status == 'failed') {
                $.scojs_message(result.message, $.scojs_message.TYPE_ERROR);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $.scojs_message('网络连接发生未知错误，请稍后再试！' + errorThrown, $.scojs_message.TYPE_ERROR);
        }
    });
}

function delSurvey() {
    var survey_id = $('#list_output').text();
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "index.php/Home/CourseManage/delSurvey", //目标地址.
        dataType: "json", //数据格式:JSON
        data: {
            s_id: survey_id
        },
        success: function (result) {
            if (result.status == 'success') {
                $('#myModal').modal('hide');
                $.scojs_message('删除成功！', $.scojs_message.TYPE_OK);
                $('#table_survey').bootstrapTable('refresh');
            } else if (result.status == 'failed') {
                $.scojs_message('删除失败，但不影响您的问卷，请继续操作！', $.scojs_message.TYPE_ERROR);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $.scojs_message('网络连接发生未知错误，请稍后再试！' + errorThrown, $.scojs_message.TYPE_ERROR);
        }
    });
}

function selectSurveyDemo() {
    $('#table_survey_demo').bootstrapTable('refresh');
    $('#selectSurveyDemo').modal('show');
}

function submitSurveyDemo() {
    var demo = $('#table_survey_demo').bootstrapTable('getAllSelections');
    if (demo.length > 1) {
        $.scojs_message('只能选择一个模版进行输出，请勿选择多个模版！', $.scojs_message.TYPE_ERROR);
        return;
    } else if (demo.length < 1) {
        $.scojs_message('请至少选择一个模版进行输出！', $.scojs_message.TYPE_ERROR);
        return;
    }
    var id = demo[0].survey_id;
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "index.php/Home/CourseManage/searchSurveyDemo", //目标地址.
        dataType: "json", //数据格式:JSON
        data: {
            id: id
        },
        success: function (result) {
            if (result.status == 'success') {
                $('#selectSurveyDemo').modal('hide');
                //成功查找后调用的函数
                var SQlist = result.data;
                dealSurveyDemo(SQlist);
            } else if (result.status == 'failed') {
                $.scojs_message('问卷添加失败，请稍后再试！' + result.message, $.scojs_message.TYPE_ERROR);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $.scojs_message('网络连接发生未知错误，请稍后再试！' + errorThrown, $.scojs_message.TYPE_ERROR);
        }
    });
}

function dealSurveyDemo(SQlist) {
    $("#QuestionList").empty();
    var SQlist = JSON.parse(SQlist);
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

function emptyQuestion() {
    $("#QuestionList").empty();
}

function showSelect() {
    $('#surveyGroupModify').modal('show');
    $('#show_survey_group').show();
    $('#new_survey_group').hide();
    $('#del_survey_group').hide();
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
    $('#table_survey').bootstrapTable('refresh', {url: HOST + "index.php/Home/CourseManage/searchSurvey" + url});
}

/**
 * Created by lawrance on 2017/2/17.
 */
$(function () {

    //1.初始化Table
    var oTable = new TableInit();
    oTable.Init();

    $('#course').attr('class', 'active');
    $('#course_sub').css('display', 'block');
    $('#course_survey_demo_publish').attr('class', 'active');
});

var TableInit = function () {
    var oTableInit = new Object();
    //初始化Table
    oTableInit.Init = function () {
        $('#table_survey').bootstrapTable({
            url: HOST + "index.php/Home/Method/getSurveyDemo",   //请求后台的URL（*）
            method: 'get',      //请求方式（*）
            toolbar: '#toolbar_survey',    //工具按钮用哪个容器
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
            }]
        });
        $('#table_course').bootstrapTable({
            url: HOST + "index.php/Home/CourseManage/getCourseNoName",   //请求后台的URL（*）
            method: 'get',      //请求方式（*）
            toolbar: '#toolbar_course',    //工具按钮用哪个容器
            striped: true,      //是否显示行间隔色
            cache: false,      //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
            pagination: true,     //是否显示分页（*）
            sortable: true,      //是否启用排序
            sortName: 'course_id', // 设置默认排序为 name
            sortOrder: 'asc', // 设置排序为正序 asc
            queryParams: oTableInit.queryParams,//传递参数（*）
//                sidePagination: "server",   //分页方式：client客户端分页，server服务端分页（*）
            pageNumber: 1,      //初始化加载第一页，默认第一页
            pageSize: 10,      //每页的记录行数（*）
//                pageList: [10, 25, 50, 100, ALL],  //可供选择的每页的行数（*）
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
                field: 'sys_course_id',
                sortable: true,
                align: 'center',
                title: '课程号'
            }, {
                field: 'name',
                sortable: true,
                align: 'center',
                title: '课程名'
            }, {
                field: 'semester',
                sortable: true,
                align: 'center',
                title: '学年学期'
            }, {
                field: 'take_class',
                sortable: true,
                align: 'center',
                title: '上课班级数'
            }]
        });
        $('#table_record').bootstrapTable({
            url: HOST + "index.php/Home/CourseManage/getRecord",   //请求后台的URL（*）
            method: 'get',      //请求方式（*）
            toolbar: '#toolbar_record',    //工具按钮用哪个容器
            striped: true,      //是否显示行间隔色
            cache: false,      //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
            pagination: true,     //是否显示分页（*）
            sortable: true,      //是否启用排序
            sortName: 'course_id', // 设置默认排序为 name
            sortOrder: 'asc', // 设置排序为正序 asc
            queryParams: oTableInit.queryParams,//传递参数（*）
//                sidePagination: "server",   //分页方式：client客户端分页，server服务端分页（*）
            pageNumber: 1,      //初始化加载第一页，默认第一页
            pageSize: 10,      //每页的记录行数（*）
//                pageList: [10, 25, 50, 100, ALL],  //可供选择的每页的行数（*）
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
                field: 'survey_name_demo',
                sortable: true,
                align: 'center',
                title: '模版问卷名称'
            }, {
                field: 'course_name_list',
                sortable: true,
                align: 'center',
                title: '发布课程列表'
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


window.actionEvents = {
    'click .look': function (e, value, row, index) {
        $('#survey_id_list').text(row.survey_id);
        $('#id').text(row.id);
        //删除操作
        $('#myModal').modal('show');
    }
};

function deleteRecord() {
    var survey = $('#survey_id_list').text();
    var id = $('#id').text();
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "index.php/Home/CourseManage/deleteRecord", //目标地址.
        dataType: "JSON", //数据格式:JSON
        data: {id: id, s_l: survey},
        success: function (result) {
            if (result.status == 'success') {
                $.scojs_message(result.message, $.scojs_message.TYPE_OK);
                $('#table_record').bootstrapTable('refresh');
                $('#myModal').modal('hide');
            } else {
                $.scojs_message(result.message, $.scojs_message.TYPE_ERROR);
            }
        },
        error: function (request) {
            $.scojs_message('网络连接发生未知错误，请稍后再试！', $.scojs_message.TYPE_ERROR);
        }
    });
}

function actionFormatter(value, row, index) {
    return '<a class="look" style="margin: 0">取消发布</a> ';
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

function course_show() {
    var course_num = $('#search_course_num').val();
    var course_name = $('#search_course_name').val();
    var course_semester = $('#search_course_semester').val();
    var url = '?';
    if (course_num != '') {
        url += ('c_n=' + course_num + '&');
    }
    if (course_name != '') {
        url += ('c_a=' + course_name + '&');
    }
    if (course_semester != '') {
        url += ('c_s=' + course_semester + '&');
    }
    if (url == '?') {
        $.scojs_message('查询内容不能为空！', $.scojs_message.TYPE_ERROR);
    }
    //alert(url);
    $('#table_course').bootstrapTable('removeAll');
    $('#table_course').bootstrapTable('refresh', {url: HOST + "index.php/Home/CourseManage/searchCourse" + url});
}

function publishCourseDemoSurvey() {
    var demo = $('#table_survey').bootstrapTable('getAllSelections');
    if (demo.length > 1) {
        $.scojs_message('只能选择一个模版进行发布，请勿选择多个模版！', $.scojs_message.TYPE_ERROR);
        return;
    } else if (demo.length < 1) {
        $.scojs_message('请至少选择一个模版进行发布！', $.scojs_message.TYPE_ERROR);
        return;
    }
    var course = $('#table_course').bootstrapTable('getAllSelections');
    if (course.length < 1) {
        $.scojs_message('请至少选择一个课程进行发布！', $.scojs_message.TYPE_ERROR);
        return;
    }
    var survey_id = demo[0].survey_id;
    //获取到模版问卷id
    var course_id = course[0].sys_course_id;
    var semester = course[0].semester;
    for (var i = 1; i < course.length; i++) {
        course_id += '-' + course[i].sys_course_id;
    }
    //alert(course_id);
    $('#loading').modal('show');
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "index.php/Home/CourseManage/publishCourseDemo", //目标地址.
        dataType: "json", //数据格式:JSON
        data: {
            survey_id: survey_id,
            course_id: course_id,
            semester: semester
        },
        success: function (result) {
            if (result.status == 'success') {
                $('#loading').modal('hide');
            } else if (result.status == 'failed') {
                $.scojs_message('问卷发布失败，请稍后再试！' + result.message, $.scojs_message.TYPE_ERROR);
                $('#hint').text(result.message);
                //$('#loading').modal('hide');
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $.scojs_message('网络连接发生未知错误，请稍后再试！' + errorThrown, $.scojs_message.TYPE_ERROR);
        }
    });
}

function publishRecord() {
    $('#section_demo').hide();
    $('#section_record').show();
}

function record_show() {
    var record_survey = $('#search_survey_name').val();
    var record_course = $('#search_record_course_name').val();
    var url = '?';
    if (record_survey != '') {
        url += ('r_s=' + record_survey + '&');
    }
    if (record_course != '') {
        url += ('r_c=' + record_course + '&');
    }
    if (url == '?') {
        $.scojs_message('查询内容不能为空！', $.scojs_message.TYPE_ERROR);
    }
    //alert(url);
    $('#table_record').bootstrapTable('removeAll');
    $('#table_record').bootstrapTable('refresh', {url: HOST + "index.php/Home/CourseManage/searchRecord" + url});

}



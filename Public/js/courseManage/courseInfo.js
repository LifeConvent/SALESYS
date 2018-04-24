/**
 * Created by lawrance on 2016/11/29.
 */
$(function () {

    $('#course').attr('class', 'active');
    $('#course_sub').css('display', 'block');
    $('#course_info').attr('class', 'active');

    //1.初始化Table
    var oTable = new TableInit();
    oTable.Init();
//        $[sessionStorage] = oTable.queryParams;

    //2.初始化Button的点击事件
    var oButtonInit = new ButtonInit();
    oButtonInit.Init();

});

var TableInit = function () {
    var oTableInit = new Object();
    //初始化Table
    oTableInit.Init = function () {
        $('#table_course').bootstrapTable({
            url: HOST + "CESBack/index.php/Home/CourseManage/getCourse",   //请求后台的URL（*）
            method: 'get',      //请求方式（*）
            toolbar: '#toolbar',    //工具按钮用哪个容器
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
                field: 'course_id',
                sortable: true,
                align: 'center',
                title: '课程号'
            }, {
                field: 'name',
                sortable: true,
                align: 'center',
                title: '课程名'
            }, {
                field: 'teacher_name',
                sortable: true,
                align: 'center',
                title: '任课教师姓名'
            }, {
                field: 'semester',
                sortable: true,
                align: 'center',
                title: '学年学期'
            }, {
                field: 'take_num',
                sortable: true,
                align: 'center',
                title: '上课人数'
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
        $('#myModalHide').text(row.course_id);
        //删除操作
        $('#myModal').modal('show');
    },
    'click .look': function (e, value, row, index) {
        $('#look_course_id').val(row.course_id);
        $('#look_course_name').val(row.name);
        $('#look_tea_name').val(row.teacher_name);
        $('#look_semester').val(row.semester);
        var type = row.type;
        switch (type) {
            case'02':
                type = '学科基础课';
                break;
            case'04':
                type = '专业课';
                break;
        }
        $('#look_type').val(type);
        var is_must = row.is_must;
        switch (is_must) {
            case'01':
                is_must = '选修课';
                break;
            case'02':
                is_must = '必修课';
                break;
        }
        $('#look_is_must').val(is_must);
        $('#look_take_num').val(row.take_num);
        $('#lookCourse').modal('show');
    },
    'click .send': function (e, value, row, index) {
        $('#modify_course_id').val(row.course_id);
        $('#modify_course_name').val(row.name);
        $('#modify_tea_name').val(row.teacher_name);
        $('#modify_semester').val(row.semester);

        $('#txt_course_id').val(row.course_id);
        $('#txt_course_name').val(row.name);
        $('#txt_teacher_name').val(row.teacher_name);
        $('#txt_course_semester').val(row.semester);
        $('#modifyCourse').modal('show');
    }
};

function actionFormatter(value, row, index) {
//        return '<a class="mod" >修改</a> ' + '<a class="delete">删除</a> ' + '<a class="send">增添发送</a>';
    return '<a class="look" style="margin: 0">查看</a> ' + '<a class="delete" style="margin: 0">删除</a> ' + '<a class="send">编辑</a>';
}

function course_show() {
    var course_num = $('#search_course_num').val();
    var teacher_name = $('#search_teacher_name').val();
    var course_name = $('#search_course_name').val();
    var url = '?';
    if (course_num != '') {
        url += ('c_n=' + course_num + '&');
    }
    if (teacher_name != '') {
        url += ('t_n=' + teacher_name + '&');
    }
    if (course_name != '') {
        url += ('c_a=' + course_name + '&');
    }
    if (url == '?') {
        $.scojs_message('查询内容不能为空！', $.scojs_message.TYPE_ERROR);
    }
    //alert(url);
    $('#table_course').bootstrapTable('removeAll');
    $('#table_course').bootstrapTable('refresh', {url: HOST + "CESBack/index.php/Home/CourseManage/searchCourse" + url});
}

$('#btn_delete').click(function () {
    $result = $('#table_course').bootstrapTable('getAllSelections');
    if ($result[0] != null) {
        $.scojs_message('删除全部将会丢失所有数据，请等待开发！', $.scojs_message.TYPE_ERROR);
    }
});

function deleteCourse() {
    $('#myModal').modal('hide');
    var id = $('#myModalHide').text();
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "CESBack/index.php/Home/CourseManage/deleteCourse", //目标地址.
        dataType: "JSON", //数据格式:JSON
        data: {id: id},
        success: function (result) {
            if (result.status == 'success') {
                $.scojs_message(result.message, $.scojs_message.TYPE_OK);
                $('#table_course').bootstrapTable('refresh');
            } else {
                $.scojs_message(result.message, $.scojs_message.TYPE_ERROR);
            }
        },
        error: function (request) {
            $.scojs_message('网络连接发生未知错误，请稍后再试！', $.scojs_message.TYPE_ERROR);
        }
    });
}

function modifyCourse() {
    var a = $('#modify_course_id').val();
    var b = $('#modify_course_name').val();
    var c = $('#modify_tea_name').val();
    var d = $('#modify_semester').val();

    var a1 = $('#txt_course_id').val();
    var b1 = $('#txt_course_name').val();
    var c1 = $('#txt_teacher_name').val();
    var d1 = $('#txt_course_semester').val();
    if (a == a1 && b == b1 && c == c1 && d == d1) {
        $.scojs_message('您并没有修改任何内容，已自动退出！', $.scojs_message.TYPE_ERROR);
        return;
    }
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "CESBack/index.php/Home/CourseManage/modifyCourse", //目标地址.
        dataType: "JSON", //数据格式:JSON
        data: {c_i: a, c_n: b, t_n: c, c_s: d},
        success: function (result) {
            if (result.status == 'success') {
                $('#modifyCourse').modal('hide');
                $.scojs_message(result.message, $.scojs_message.TYPE_OK);
                $('#table_course').bootstrapTable('refresh');
            } else {
                $.scojs_message(result.message, $.scojs_message.TYPE_ERROR);
            }
        },
        error: function (request) {
            $.scojs_message('网络连接发生未知错误，请稍后再试！', $.scojs_message.TYPE_ERROR);
        }
    });
}


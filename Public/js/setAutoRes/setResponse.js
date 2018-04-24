/**
 * Created by lawrance on 2016/11/24.
 */
$(function () {

    //1.初始化Table
    var oTable = new TableInit();
    oTable.Init();
//        $[sessionStorage] = oTable.queryParams;

    //2.初始化Button的点击事件
    var oButtonInit = new ButtonInit();
    oButtonInit.Init();

    $('#weChat').attr('class', 'active');
    $('#weChat_sub').css('display', 'block');
    $('#weChat_autoSend').attr('class', 'active');

});

var TableInit = function () {
    var oTableInit = new Object();
    //初始化Table
    oTableInit.Init = function () {
        $('#tablelist').bootstrapTable({
            url: HOST + "index.php/Home/Method/getSysResponse",   //请求后台的URL（*）
            method: 'get',      //请求方式（*）
            toolbar: '#toolbar',    //工具按钮用哪个容器
            striped: true,      //是否显示行间隔色
            cache: false,      //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
            pagination: true,     //是否显示分页（*）
            sortable: true,      //是否启用排序
            sortName: 'stu_num', // 设置默认排序为 name
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
                field: 'id',
                sortable: true,
                align: 'center',
                title: '序号'
            }, {
                field: 'user_input',
                sortable: true,
                align: 'center',
                title: '用户输入文本信息'
            }, {
                field: 'sys_response',
                sortable: true,
                align: 'center',
                title: '系统回复信息'
            }, {
                field: 'sys_response_type',
                sortable: true,
                align: 'center',
                title: '系统回复类型'
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
            cityid: $("#txt_search_cityid").val(),
            cityname: $("#txt_search_cityname").val(),
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
        $('#list_output').text(row.id);
        //删除操作
        $('#myModal').modal('show');
    },
    'click .send': function (e, value, row, index) {
        $('#res_id').text(row.id);
        $('#res_user_input').text(row.user_input);
        $('#res_sys_response').text(row.sys_response);
        $('#res_sys_response_type').text(row.sys_response_type);

        $('#user_input_modify').text(row.user_input);
        $('#sys_response_modify').text(row.sys_response);
        $('#response_type_modify').val(row.sys_response_type);
        $('#modifyResponse').modal('show');
    }
};

function actionFormatter(value, row, index) {
//        return '<a class="mod" >修改</a> ' + '<a class="delete">删除</a> ' + '<a class="send">增添发送</a>';
    return '<a class="delete" style="margin: 0">删除</a> ' + '<a class="send">修改</a>';
}

function setRes() {
    $user_input = $('#user_input').val();
    $sys_response = $('#sys_response').val();
    $type = $('#response_type').val();
    $type = 'text';
    if ($user_input == '' || $sys_response == '') {
        $.scojs_message('输入内容不能为空！', $.scojs_message.TYPE_ERROR);
    } else {
        //alert($user_input + '---' + $sys_response);
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "CES/index.php/Home/SetAutoRes/setRes", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {user_input: $user_input, sys_response: $sys_response, type: $type},
            success: function (result) {
                if (result.status == 'success') {
                    $.scojs_message('消息回复设置成功！', $.scojs_message.TYPE_OK);
                    $('#tablelist').bootstrapTable('refresh');
                } else if (result.status == 'failed') {
                    $.scojs_message('消息回复设置失败！' + result.message, $.scojs_message.TYPE_ERROR);
                }
            },
            error: function (request) {
                $.scojs_message('网络连接发生未知错误，请稍后再试！', $.scojs_message.TYPE_ERROR);
            }
        });
    }
}

function deleteSub() {
    $('#myModal').modal('hide');
    var id = $('#list_output').val();
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "index.php/Home/Method/deleteRes", //目标地址.
        dataType: "JSON", //数据格式:JSON
        data: {id: id},
        success: function (result) {
            if (result.status == 'success') {
                $.scojs_message(result.message, $.scojs_message.TYPE_OK);
                $('#tablelist').bootstrapTable('refresh');
            } else {
                $.scojs_message(result.message, $.scojs_message.TYPE_ERROR);
            }
        },
        error: function (request) {
            $.scojs_message('网络连接发生未知错误，请稍后再试！', $.scojs_message.TYPE_ERROR);
        }
    });
}

function modifySub() {
    var id = $('#res_id').val();
    var u_i = $('#res_user_input').val();
    var s_r = $('#res_sys_response').val();
    var s_r_t = $('#res_sys_response_type').val();

    var u_i1 = $('#user_input_modify').val();
    var s_r1 = $('#sys_response_modify').val();
    var s_r_t1 = $('#response_type_modify').val();
    if (u_i == u_i1 && s_r == s_r1 && s_r_t == s_r_t1) {
        $('#modifyResponse').modal('hide');
        $.scojs_message('您并未发生任何修改，已自动退出！', $.scojs_message.TYPE_ERROR);
    } else {
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "index.php/Home/Method/modifyRes", //目标地址.
            dataType: "JSON", //数据格式:JSON
            data: {id: id, user_input: u_i1, sys_response: s_r1, sys_response_type: s_r_t1},
            success: function (result) {
                if (result.status == 'success') {
                    $.scojs_message(result.message, $.scojs_message.TYPE_OK);
                    $('#tablelist').bootstrapTable('refresh');
                } else {
                    $.scojs_message(result.message, $.scojs_message.TYPE_ERROR);
                }
                $('#modifyResponse').modal('hide');
            },
            error: function (request) {
                $.scojs_message('网络连接发生未知错误，请稍后再试！', $.scojs_message.TYPE_ERROR);
                //$('#modifyResponse').modal('hide');
            }
        });
    }
}

function show() {
    var user_input = $('#txt_search_user_input').val();
    var url = '?';
    if (user_input != '') {
        url += ('u_i=' + user_input);
    }
    if (url == '?') {
        $.scojs_message('查询内容不能为空！', $.scojs_message.TYPE_ERROR);
    }
    $('#tablelist').bootstrapTable('removeAll');
    $('#tablelist').bootstrapTable('refresh', {url: HOST + "index.php/Home/Method/searchUserInput" + url});
}

$('#btn_delete').click(function () {
    $result = $('#tablelist').bootstrapTable('getAllSelections');
    if ($result[0] != null) {
        $.scojs_message('删除全部将会丢失所有数据，请等待开发！', $.scojs_message.TYPE_ERROR);
    }
});
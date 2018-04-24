/**
 * Created by lawrance on 2016/11/30.
 */
$(function () {

    //1.初始化Table
    var oTable = new TableInit();
    oTable.Init();
//        $[sessionStorage] = oTable.queryParams;

    //2.初始化Button的点击事件
    var oButtonInit = new ButtonInit();
    oButtonInit.Init();


    $('#user').attr('class', 'active');
    $('#user_sub').css('display', 'block');
    $('#user_manager').attr('class', 'active');

});

var TableInit = function () {
    var oTableInit = new Object();
    //初始化Table
    oTableInit.Init = function () {
        $('#table_user').bootstrapTable({
            url: HOST + "index.php/Home/UserManage/getUser",   //请求后台的URL（*）
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
                field: 'stu_phone',
                sortable: true,
                align: 'center',
                title: '手机号'
            }, {
                field: 'stu_qq',
                sortable: true,
                align: 'center',
                title: 'QQ号'
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
        $('#list_output').text(row.stu_num);
        //删除操作
        $('#myModal').modal('show');
    },
    'click .send': function (e, value, row, index) {

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

        $('#user_stu_num').val(row.stu_num);
        $('#user_stu_name').val(row.stu_name);
        $('#user_stu_graclass').val(row.stu_graclass);
        $('#user_stu_pro').val(pro);
        $('#user_stu_class').val(row.stu_class);
        $('#user_stu_phone').val(row.stu_phone);
        $('#user_stu_sex').val(row.stu_sex);
        $('#user_stu_qq').val(row.stu_qq);

        $('#modify_stu_num').val(row.stu_num);
        $('#modify_stu_name').val(row.stu_name);
        $('#modify_stu_graclass').val(row.stu_graclass);
        $('#modify_stu_pro').val(pro);
        $('#modify_stu_class').val(row.stu_class);
        $('#modify_stu_phone').val(row.stu_phone);
        $('#modify_stu_sex').val(row.stu_sex);
        $('#modify_stu_qq').val(row.stu_qq);
        $('#modifyUser').modal('show');
    }
};

function modifyUser() {
    var a = $('#user_stu_num').val();
    var b = $('#user_stu_name').val();
    var c = $('#user_stu_graclass').val();
    var d = $('#user_stu_pro').val();
    var e = $('#user_stu_class').val();
    var f = $('#user_stu_phone').val();
    var g = $('#user_stu_sex').val();
    var h = $('#user_stu_qq').val();

    var a1 = $('#modify_stu_num').val();
    var b1 = $('#modify_stu_name').val();
    var c1 = $('#modify_stu_graclass').val();
    var d1 = $('#modify_stu_pro').val();
    var e1 = $('#modify_stu_class').val();
    var f1 = $('#modify_stu_phone').val();
    var g1 = $('#modify_stu_sex').val();
    var h1 = $('#modify_stu_qq').val();
    if (a == a1 && b == b1 && c == c1 && d == d1 && e == e1 && f == f1 && g == g1 && h == h1) {
        $('#modifyUser').modal('hide');
        $.scojs_message('您并未发生任何修改，已自动退出！', $.scojs_message.TYPE_ERROR);
    } else if (b1 == '' || c1 == '' || d1 == '' || e1 == '' || g1 == '') {
        $.scojs_message('除手机号和QQ号外，其他信息不能为空！', $.scojs_message.TYPE_ERROR);
    } else {
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "/CESBack/index.php/Home/UserManage/modifyUser", //目标地址.
            dataType: "JSON", //数据格式:JSON
            data: {num: a1, name: b1, gra: c1, pro: d1, class: e1, phone: f1, sex: g1, qq: h1},
            success: function (result) {
                if (result.status == 'success') {
                    $.scojs_message(result.message, $.scojs_message.TYPE_OK);
                    $('#table_user').bootstrapTable('refresh');
                } else {
                    $.scojs_message(result.message, $.scojs_message.TYPE_ERROR);
                }
                $('#modifyUser').modal('hide');
            },
            error: function (request) {
                $.scojs_message('网络连接发生未知错误，请稍后再试！', $.scojs_message.TYPE_ERROR);
                //$('#modifyResponse').modal('hide');
            }
        });
    }
}

function actionFormatter(value, row, index) {
//        return '<a class="mod" >修改</a> ' + '<a class="delete">删除</a> ' + '<a class="send">增添发送</a>';
    return '<a class="delete" style="margin: 0">删除</a> ' + '<a class="send">编辑</a>';
}

function deleteUser() {
    $('#myModal').modal('hide');
    var num = $('#list_output').val();
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "index.php/Home/UserManage/deleteUser", //目标地址.
        dataType: "JSON", //数据格式:JSON
        data: {num: num},
        success: function (result) {
            if (result.status == 'success') {
                $.scojs_message(result.message, $.scojs_message.TYPE_OK);
                $('#table_user').bootstrapTable('refresh');
            } else {
                $.scojs_message(result.message, $.scojs_message.TYPE_ERROR);
            }
        },
        error: function (request) {
            $.scojs_message('网络连接发生未知错误，请稍后再试！', $.scojs_message.TYPE_ERROR);
        }
    });
}

function show() {
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
        $.scojs_message('查询内容不能为空！', $.scojs_message.TYPE_ERROR);
    }
    $('#table_user').bootstrapTable('removeAll');
    $('#table_user').bootstrapTable('refresh', {url: HOST + "index.php/Home/UserManage/searchUser" + url});
}

$('#btn_delete').click(function () {
    $result = $('#table_user').bootstrapTable('getAllSelections');
    if ($result[0] != null) {
        $.scojs_message('删除全部将会丢失所有数据，请等待开发！', $.scojs_message.TYPE_ERROR);
    }
});
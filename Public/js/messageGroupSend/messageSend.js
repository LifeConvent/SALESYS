/**
 * Created by lawrance on 2016/11/22.
 */
var TableInit = function () {
    var oTableInit = new Object();
    //初始化Table
    oTableInit.Init = function () {
        $('#tablelist').bootstrapTable({
            url: HOST + "index.php/Home/WeChat/getInfo",   //请求后台的URL（*）
            //url: "{:U('WeChat/getInfo')}", //目标地址.
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
                field: 'is_match',
                sortable: true,
                align: 'center',
                title: '是否匹配'
            }, {
                field: 'operation',
                title: '操作',
                align: 'center',
                formatter: "actionFormatter",
                events: "actionEvents",
                clickToSelect: false
            }]
        });

        $('#tablelistsend').bootstrapTable({
            url: "",   //请求后台的URL（*）
            method: 'get',      //请求方式（*）
            toolbar: '#toolbarsend',    //工具按钮用哪个容器
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
            strictSearch: true,
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
                field: 'is_match',
                sortable: true,
                align: 'center',
                title: '是否匹配'
            }, {
                field: 'operation',
                title: '操作',
                align: 'center',
                formatter: "actionFormatter2",
                events: "actionEvents2",
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

$(function () {

    //1.初始化Table
    var oTable = new TableInit();
    oTable.Init();
//        $[sessionStorage] = oTable.queryParams;

    //2.初始化Button的点击事件
    var oButtonInit = new ButtonInit();
    oButtonInit.Init();

    //群发消息模版
    $('#wechat_input').text("CES-课程评价系统通知:\n\n   您有新的课程评价问卷已经发布成功，请在规定时间内完成课程评价。\n\n   在公众平台中直接输入'课程评价'即可获取评价问卷进行评价。\n");

    $('#weChat').attr('class', 'active');
    $('#weChat_sub').css('display', 'block');
    $('#weChat_groupSend').attr('class', 'active');

});


$tableUp = $('#tablelistsend');
$tableDown = $('#tablelist');
window.actionEvents2 = {
    'click .delete': function (e, value, row, index) {
        //删除操作
        $tableDown.bootstrapTable("append", row);
        var num = new Array(row.stu_num);
        $tableUp.bootstrapTable('remove', {
            field: 'stu_num',
            values: num
        });
    }
};

//表格  - 操作 - 事件
window.actionEvents = {
    'click .delete': function (e, value, row, index) {
        //删除操作
        var num = new Array(row.stu_num);
        $tableDown.bootstrapTable('remove', {
            field: 'stu_num',
            values: num
        });
    },
    'click .send': function (e, value, row, index) {
        $tableUp.bootstrapTable("append", row);
        var num = new Array(row.stu_num);
        $tableDown.bootstrapTable('remove', {
            field: 'stu_num',
            values: num
        });

    }
};

$('#btn_send').click(function () {
//        取得返回结果
    var selects = $('#tablelistsend').bootstrapTable('getAllSelections');
    var newSelects = JSON.stringify(selects);
    //alert(newSelects);

    var wechat_send = $('#wechat_input').text();
    //alert(wechat_send);
    //ajax提交发送请求

    var notMatch = 0, match = 0;
    var obj = JSON.parse(newSelects);
    var OpenIDArray = new Array();
    for (var i = 0; i < obj.length; i++) {
        if (obj[i].openid == null) {
            //这其中包含了为匹配用户
            notMatch++;
        } else {
            match++;
            OpenIDArray.push(obj[i].openid)
        }
    }
    if (wechat_send == '') {
        $.scojs_message('提交的信息不能为空！', $.scojs_message.TYPE_ERROR);
    } else if (!match) {
        //无匹配用户，弹出错误框，不发送，要想发送至少包含一位有效用户
        $.scojs_message('选择的用户信息中不包含有效用户，请确定后再试！', $.scojs_message.TYPE_ERROR);
    } else if (notMatch > 0) {
        //1. 含有未匹配用户，获取ajax发送结果，提示发送结果和含有为匹配用户
        //2. 含有未匹配用户，数组存入session，确认继续发送即发送并获取ajax发送结果，提示发送结，取消则不做发送操作仅关闭模态
        $('#myModal').modal('show');
    } else {
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "CES/index.php/Home/GroupSend/allSendNews", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {content: wechat_send, openid: OpenIDArray, type: 'text'},
            success: function (result) {
                if (result.status == 'success') {
                    $.scojs_message('消息发送成功！', $.scojs_message.TYPE_OK);
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
});

$('#btn_add').click(function () {
    var selectContent = $tableDown.bootstrapTable('getSelections');
    $tableUp.bootstrapTable("append", selectContent);
    var selects = $tableDown.bootstrapTable('getSelections');
    stu_num = $.map(selects, function (row) {
        return row.stu_num;
    });

    $tableDown.bootstrapTable('remove', {
        field: 'stu_num',
        values: stu_num
    });

});

$('#btn_delete').click(function () {
    var selectContent = $tableUp.bootstrapTable('getSelections');
    $tableDown.bootstrapTable("append", selectContent);
    var selects = $tableUp.bootstrapTable('getSelections');
    stu_num = $.map(selects, function (row) {
        return row.stu_num;
    });
    $tableUp.bootstrapTable('remove', {
        field: 'stu_num',
        values: stu_num
    });
});

$('#btn_preview').click(function () {
    var selects = $('#tablelistsend').bootstrapTable('getAllSelections');
    var newSelects = JSON.stringify(selects);
    var wechat_send = $('#wechat_input').val();
    var notMatch = 0, match = 0;
    var obj = JSON.parse(newSelects);
    var OpenIDArray = new Array();
    for (var i = 0; i < obj.length; i++) {
        if (obj[i].openid == null) {
            notMatch++;
        } else {
            match++;
            OpenIDArray.push(obj[i].openid)
        }
    }
    if (wechat_send == '') {
        $.scojs_message('提交的预览信息不能为空！', $.scojs_message.TYPE_ERROR);
    } else if (!match) {
        $.scojs_message('选择的用户信息中用户无效或用户信息为空，请确定后再试！', $.scojs_message.TYPE_ERROR);
    } else if (match > 1 || notMatch > 0) {
        $.scojs_message('只能选择一位有效匹配用户进行预览，请确定后再试！', $.scojs_message.TYPE_ERROR);
    } else {
        $.ajax({
            type: "POST", //用POST方式传输sendTextPreview
            url: HOST + "CES/index.php/Home/GroupSend/allSendNews", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {content: wechat_send, openid: OpenIDArray, type: 'text'},
            success: function (result) {
                if (result.status == 'success') {
                    $.scojs_message('消息发送成功！请在微信公众平台客户端进行查看', $.scojs_message.TYPE_OK);
                } else if (result.status == 'failed') {
                    $.scojs_message('消息发送失败！' + result.message, $.scojs_message.TYPE_ERROR);
                }
            },
            error: function (request) {
                $.scojs_message('网络连接发生未知错误，请稍后再试！', $.scojs_message.TYPE_ERROR);
            }
        });
    }
});

function actionFormatter(value, row, index) {
//        return '<a class="mod" >修改</a> ' + '<a class="delete">删除</a> ' + '<a class="send">增添发送</a>';
    return '<a class="delete" style="margin: 0">删除</a> ' + '<a class="send">增添发送</a>';
}

function actionFormatter2(value, row, index) {
    return '<a class="delete">删除</a>';
}

function sendSubmit() {
    $('#myModal').modal('hide');
    var selects = $('#tablelistsend').bootstrapTable('getAllSelections');
    var newSelects = JSON.stringify(selects);
    var wechat_send = $('#wechat_input').val();
    var obj = JSON.parse(newSelects);
    var OpenIDArray = new Array();
    for (var i = 0; i < obj.length; i++) {
        if (obj[i].openid != null) {
            OpenIDArray.push(obj[i].openid)
        }
    }
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "CES/index.php/Home/GroupSend/allSendNews", //目标地址.
        dataType: "json", //数据格式:JSON
        data: {content: wechat_send, openid: OpenIDArray, type: 'text'},
        success: function (result) {
            if (result.status == 'success') {
                $.scojs_message('消息发送成功！', $.scojs_message.TYPE_OK);
            } else if (result.status == 'failed') {
                $.scojs_message('消息发送失败！' + result.message, $.scojs_message.TYPE_ERROR);
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
    if (url == '?') {
        $.scojs_message('查询内容不能为空！', $.scojs_message.TYPE_ERROR);
    }
    $('#tablelist').bootstrapTable('removeAll');
    $('#tablelist').bootstrapTable('refresh', {url: HOST + "index.php/Home/UserManage/searchUser" + url});
}

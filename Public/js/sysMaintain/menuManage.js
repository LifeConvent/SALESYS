/**
 * Created by lawrance on 2019/11/11.
 */

$(function () {
    $('#sysMaintain').attr('class', 'active');
    $('#sysMaintainSub').css('display', 'block');
    $('#sysMaintainSub_menu').attr('class', 'active');

    //1.初始化Table
    var oTable = new TableInit();
    oTable.Init();

    $('#modify_user_account').val($('#username').val());

    var type = $('#user_type').val();
    if (type == 1) {
        $('#modify_user_account').removeAttr("disabled");
    }

    $('.selectpicker').selectpicker({});
    $('.selectpicker').val('0');
    $('.selectpicker').selectpicker('render');

});

var TableInit = function () {
    var oTableInit = new Object();
    //初始化Table
    oTableInit.Init = function () {
        $('#user_list_table').bootstrapTable({
            url: HOST + "index.php/Home/SysMaintain/getMenuList",   //请求后台的URL（*）
            method: 'get',      //请求方式（*）
            showExport: true,
            exportDataType: 'all',
            exportTypes: ['csv', 'txt', 'sql', 'doc', 'excel', 'xlsx', 'pdf'],
            toolbar: '#toolbar',    //工具按钮用哪个容器
            striped: true,      //是否显示行间隔色
            cache: false,      //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
            pagination: true,     //是否显示分页（*）
            sortable: true,      //是否启用排序
            sortName: 'ID', // 设置默认排序为 name
            sortOrder: 'asc', // 设置排序为正序 asc
            queryParams: oTableInit.queryParams,//传递参数（*）
//                sidePagination: "server",   //分页方式：client客户端分页，server服务端分页（*）
            pageNumber: 1,      //初始化加载第一页，默认第一页
            pageSize: 16,      //每页的记录行数（*）
            search: true,      //是否显示表格搜索，此搜索是客户端搜索，不会进服务端，所以，个人感觉意义不大
            strictSearch: false,
            showColumns: true,     //是否显示所有的列
            showRefresh: true,     //是否显示刷新按钮
            minimumCountColumns: 2,    //最少允许的列数
            clickToSelect: true,    //是否启用点击选中行
            // height: 500,      //行高，如果没有设置height属性，表格自动根据记录条数觉得表格高度
            uniqueId: "ID",      //每一行的唯一标识，一般为主键列
            showToggle: true,     //是否显示详细视图和列表视图的切换按钮
            cardView: false,     //是否显示详细视图
            detailView: false,     //是否显示父子表
            showFooter: false,
            silent: true,  //刷新事件必须设置
            formatLoadingMessage: function () {
                return "请稍等，正在加载中...";
            },
            formatNoMatches: function () {  //没有匹配的结果
                return '无符合条件的记录';
            },
            formatSearch: function () {
                return '搜索';
            },
            columns: [{
                field: 'ID',
                sortable: true,
                align: 'center',
                width: 40,
                title: '序号',
                formatter: function (value, row, index) {
                    return index + 1;
                }
            }, {
                field: 'MENU_NAME',
                sortable: true,
                align: 'center',
                title: '菜单名称',
                formatter: "actionFormatter_menu_name",
                events: "actionEvents",
            }, {
                field: 'MENU_INDEX',
                sortable: true,
                align: 'center',
                title: '菜单索引',
                formatter: "actionFormatter_menu_index",
                events: "actionEvents",
            }, {
                field: 'IS_LOCK',
                sortable: true,
                align: 'center',
                title: '是否锁定',
                formatter: "actionFormatter_is_lock",
                events: "actionEvents",
            }, {
                field: 'MENU_CODE',
                sortable: true,
                align: 'center',
                title: '菜单编码',
                formatter: "actionFormatter_menu_code",
                events: "actionEvents",
            }, {
                field: 'operation',
                title: '操作',
                align: 'center',
                formatter: "actionFormatter1",
                events: "actionEvents1",
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


function actionFormatter_menu_name(value, row, index) {
    return '<input id="menu_name' + index + '" class="form-control user_input' + index + '" style="height: 20pt;width: 180pt" value="' + value + '" disabled></input>';
}

function actionFormatter_menu_index(value, row, index) {
    return '<input id="menu_index' + index + '" class="form-control" style="height: 20pt;width: 180pt" value="' + value + '" disabled></input>';
}

function actionFormatter_is_lock(value, row, index) {
    return '<input id="is_lock' + index + '" class="form-control user_input' + index + '" style="height: 20pt;width: 180pt" value="' + value + '" disabled></input>';
}

function actionFormatter_menu_code(value, row, index) {
    return '<input id="menu_code' + index + '" class="form-control" style="height: 20pt;width: 180pt" value="' + value + '" disabled></input>';
}

function actionFormatter1(value, row, index) {
    return '<div><button type="button" class="btn btn-primary lock" style="height: 20pt;width: 60pt"><span style="margin-left:-2pt;">解除锁定</span></button>' + '<button type="button" class="btn btn-primary modify" style="height: 20pt;width: 60pt;margin-left: 5pt"><span style="margin-left:-2pt;">提交修改</span></button></div>';
}

window.actionEvents = {};

window.actionEvents1 = {
    'click .lock': function (e, value, row, index) {
        var type = $('#user_type').val();
        if (type != "1") {
            $(".user_input" + index).removeAttr("disabled");
            $("#type" + index).attr("disabled", "disabled");
        } else {
            $(".user_input" + index).removeAttr("disabled");
        }
    },
    'click .modify': function (e, value, row, index) {
        // ajax提交数据
        if ($(".user_input" + index).attr("disabled")) {
            $.scojs_message('请解锁并修改信息后再提交！', $.scojs_message.TYPE_ERROR);
            return;
        }
        debugger;
        var menu_name = $('#menu_name' + index).val();
        var menu_index = $('#menu_index'+index).val();
        var is_lock = $('#is_lock' + index).val();
        var menu_code = $('#menu_code'+index).val();
        if (menu_name == row.MENU_NAME && is_lock == row.IS_LOCK) {
            $.scojs_message('未发生任何修改时请勿提交！', $.scojs_message.TYPE_ERROR);
            return;
        }
        if (menu_name == "" || is_lock == "") {
            $.scojs_message('所修改用户信息不能为空！', $.scojs_message.TYPE_ERROR);
        } else if (is_lock != "是" && is_lock != "否") {
            $.scojs_message('是否锁定及是否灌数只能填写是或否！', $.scojs_message.TYPE_ERROR);
        } else {
            if (is_lock == "是") {
                is_lock = 1;
            } else if (is_lock == "否") {
                is_lock = 0;
            }
            debugger;
            $.ajax({
                type: "POST", //用POST方式传输
                url: HOST + "index.php/Home/SysMaintain/postModifyMenu", //目标地址.
                dataType: "json", //数据格式:JSON
                data: {
                    menu_name: menu_name,
                    menu_index: menu_index,
                    is_lock: is_lock,
                    menu_code: menu_code
                },
                success: function (result) {
                    if (result.status == 'success') {
                        debugger;
                        $.scojs_message(result.message, $.scojs_message.TYPE_OK);
                        $(".user_input" + index).attr("disabled", true);
                    } else if (result.status == 'failed') {
                        debugger;
                        $.scojs_message(result.message, $.scojs_message.TYPE_ERROR);
                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert(XMLHttpRequest);
                    alert(textStatus);
                    alert(errorThrown);
                }
            });
        }
    }
};

$('#new_menu').click(function () {
    var menu_name = $('#menu_name').val();
    var menu_index = $('#menu_index').val();
    var menu_grade = $('#menu_grade').val();
    var menu_code = $('#menu_code').val();
    debugger;
    if (menu_name == "" || menu_index == "" || menu_grade == "" || menu_code == "") {
        $.scojs_message('所有信息均为必填，请确认输入后再提交添加用户信息！', $.scojs_message.TYPE_ERROR);
    } else {
        $('#check_pass').val("");
        $('#checkPass').modal();
    }
});


function checkPass() {
    var user_pass = $('#check_pass').val();
    user_pass = hex_md5(user_pass);
    var user_name = $('#user_name').text();
    debugger;
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "index.php/Home/SysMaintain/checkPass", //目标地址.
        dataType: "json", //数据格式:JSON
        data: {
            user_name: user_name,
            user_pass: user_pass
        },
        success: function (result) {
            if (result.status == 'success') {
                var menu_name = $('#menu_name').val();
                var menu_index = $('#menu_index').val();
                var menu_grade = $('#menu_grade').val();
                var menu_code = $('#menu_code').val();
                $.ajax({
                    type: "POST", //用POST方式传输
                    url: HOST + "index.php/Home/SysMaintain/postAddMenu", //目标地址.
                    dataType: "json", //数据格式:JSON
                    data: {
                        menu_name: menu_name,
                        menu_index: menu_index,
                        menu_grade: menu_grade,
                        menu_code: menu_code
                    },
                    success: function (result) {
                        if (result.status == 'success') {
                            debugger;
                            $.scojs_message(result.message, $.scojs_message.TYPE_OK);
                            $('.add_user').val("");
                            $('#checkPass').modal('hide');
                            $('#user_list_table').bootstrapTable('refresh', {url: HOST + "index.php/Home/SysMaintain/getMenuList"});
                        } else if (result.status == 'failed') {
                            debugger;
                            $.scojs_message(result.message, $.scojs_message.TYPE_ERROR);
                        }
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert(XMLHttpRequest);
                        alert(textStatus);
                        alert(errorThrown);
                    }
                });
            } else if (result.status == 'failed') {
                debugger;
                $.scojs_message(result.message, $.scojs_message.TYPE_ERROR);
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert(XMLHttpRequest);
            alert(textStatus);
            alert(errorThrown);
        }
    });
}

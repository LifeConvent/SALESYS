/**
 * Created by lawrance on 2017/1/11.
 */

$(function () {
    $('#sysMaintain').attr('class', 'active');
    $('#sysMaintainSub').css('display', 'block');
    $('#sysMaintainSub_user_limits').attr('class', 'active');

    //默认关闭密钥展示
    $('#key_user_show').hide();
    //1.初始化Table
    var oTable = new TableInit();
    oTable.Init();

    var type = $('#user_type').text();
    if (type == 1) {
        // $('#modify_user_account').removeAttr("disabled");
        $('.user_account').val($('#user_name').text());
        initLimits();
    } else {
        $('#user_limits_1').hide();
        $('#user_limits_2').hide();
    }

    $('#form_date1').datetimepicker({
        language:  'zh-CN',
        format: 'yyyy-mm-dd hh:ii:ss',
        startView: 'month',// 进来是月
        minView: 'hour',// 可以看到小时
        minuteStep:5, //分钟间隔为1分
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        timepicker: true,
        timepickerScrollbar: true,
        // ,
        // startView: 2,
        // minView: 2,
        // forceParse: 0
    }).on('changeDate', function(ev){
    });

    $('.selectpicker').selectpicker({});
    $('.selectpicker').val('-1');
    $('.selectpicker').selectpicker('render');
    initLimits();
});

var TableInit = function () {
    var oTableInit = new Object();
    //初始化Table
    oTableInit.Init = function () {
        $('#user_list_table').bootstrapTable({
            url: HOST + "index.php/Home/UserManage/getPostUserList",   //请求后台的URL（*）
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
                checkbox: true
            }, {
                field: 'ID',
                sortable: true,
                align: 'center',
                width: 80,
                title: '序号',
                formatter: function (value, row, index) {
                    return index + 1;
                }
            }, {
                field: 'account',
                sortable: true,
                align: 'center',
                title: '用户名',
                formatter: "actionFormatter_account",
                width: 190,
                events: "actionEvents",
            }, {
                field: 'type',
                sortable: true,
                align: 'center',
                title: '用户类型',
                formatter: "actionFormatter_type",
                width: 190,
                events: "actionEvents",
            }, {
                field: 'user_name',
                sortable: true,
                align: 'center',
                title: '用户姓名',
                formatter: "actionFormatter_user_name",
                width: 190,
                events: "actionEvents",
            }, {
                field: 'user_organ_code',
                sortable: true,
                align: 'center',
                title: '作业机构代码',
                formatter: "actionFormatter_user_organ_code",
                width: 190,
                events: "actionEvents",
            }, {
                field: 'user_organ_name',
                sortable: true,
                align: 'center',
                title: '作业机构名称',
                formatter: "actionFormatter_user_organ_name",
                width: 190,
                events: "actionEvents",
            }, {
                field: 'user_sex',
                sortable: true,
                align: 'center',
                title: '性别',
                formatter: "actionFormatter_user_sex",
                width: 190,
                events: "actionEvents",
            }, {
                field: 'user_company',
                sortable: true,
                align: 'center',
                title: '所属公司',
                formatter: "actionFormatter_user_company",
                width: 190,
                events: "actionEvents",
            }, {
                field: 'buss_area',
                sortable: true,
                align: 'center',
                title: '作业范围',
                formatter: "actionFormatter_buss_area",
                width: 190,
                events: "actionEvents",
            }, {
                field: 'is_lock',
                sortable: true,
                align: 'center',
                title: '用户是否锁定',
                formatter: "actionFormatter_is_lock",
                width: 190,
                events: "actionEvents",
            }, {
                field: 'is_add_data',
                sortable: true,
                align: 'center',
                title: '用户是否灌数',
                formatter: "actionFormatter_is_add_data",
                width: 190,
                events: "actionEvents",
            }, {
                field: 'operation',
                title: '操作',
                align: 'center',
                formatter: "actionFormatter1",
                events: "actionEvents1",
                width: 190,
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


function actionFormatter_account(value, row, index) {
    return '<input id="account' + index + '" class="form-control" style="height: 20pt;width: 130pt" value="' + value + '" disabled></input>';
}

function actionFormatter_type(value, row, index) {
    return '<input id="type' + index + '" class="form-control user_input' + index + '" style="height: 20pt;width: 130pt" value="' + value + '" disabled></input>';
}

function actionFormatter_user_name(value, row, index) {
    return '<input id="user_name' + index + '" class="form-control user_input' + index + '" style="height: 20pt;width: 130pt" value="' + value + '" disabled></input>';
}

function actionFormatter_user_organ_code(value, row, index) {
    return '<input id="user_organ_code' + index + '" class="form-control user_input' + index + '" style="height: 20pt;width: 130pt" value="' + value + '" disabled></input>';
}

function actionFormatter_user_organ_name(value, row, index) {
    return '<input id="user_organ_name' + index + '" class="form-control user_input' + index + '" style="height: 20pt;width: 130pt" value="' + value + '" disabled></input>';
}

function actionFormatter_user_sex(value, row, index) {
    return '<input id="user_sex' + index + '" class="form-control user_input' + index + '" style="height: 20pt;width: 130pt" value="' + value + '" disabled></input>';
}

function actionFormatter_user_company(value, row, index) {
    return '<input id="user_company' + index + '" class="form-control user_input' + index + '" style="height: 20pt;width: 130pt" value="' + value + '" disabled></input>';
}

function actionFormatter_buss_area(value, row, index) {
    return '<input id="buss_area' + index + '" class="form-control user_input' + index + '" style="height: 20pt;width: 130pt" value="' + value + '" disabled></input>';
}

function actionFormatter_is_lock(value, row, index) {
    return '<input id="is_lock' + index + '" class="form-control user_input' + index + '" style="height: 20pt;width: 130pt" value="' + value + '" disabled></input>';
}

function actionFormatter_is_add_data(value, row, index) {
    return '<input id="is_add_data' + index + '" class="form-control user_input' + index + '" style="height: 20pt;width: 130pt" value="' + value + '" disabled></input>';
}


function actionFormatter1(value, row, index) {
    return '<div><button type="button" class="btn btn-primary lock" style="height: 20pt;width: 60pt"><span style="margin-left:-2pt;">解除锁定</span></button>' + '<button type="button" class="btn btn-primary modify" style="height: 20pt;width: 60pt;margin-left: 5pt"><span style="margin-left:-2pt;">提交修改</span></button></div>';
}

window.actionEvents = {};

window.actionEvents1 = {
    'click .lock': function (e, value, row, index) {
        var type = $('#user_type').text();
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
        var user_account = $('#account' + index).val();
        var user_type = $('#type' + index).val();
        var user_name = $('#user_name' + index).val();
        var user_organ_code = $('#user_organ_code' + index).val();
        var user_organ_name = $('#user_organ_name' + index).val();
        var user_sex = $('#user_sex' + index).val();
        var buss_area = $('#buss_area' + index).val();
        var is_lock = $('#is_lock' + index).val();
        var is_add_data = $('#is_add_data' + index).val();
        if (user_account == row.account && user_type == row.type && user_name == row.user_name && user_organ_code == row.user_organ_code && user_organ_name == row.user_organ_name && user_sex == row.user_sex && buss_area == row.buss_area && is_lock == row.is_lock && is_add_data == row.is_add_data) {
            $.scojs_message('未发生任何修改时请勿提交！', $.scojs_message.TYPE_ERROR);
            return;
        }
        var user_company = $('#user_company' + index).val();
        if (user_account == "" || user_type == "" || user_organ_code == "" || user_organ_name == "" || user_sex == "" || user_name == "" || buss_area == "" || user_company == "") {
            $.scojs_message('所修改用户信息不能为空！', $.scojs_message.TYPE_ERROR);
        } else if ((is_lock != "是" && is_lock != "否") || (is_add_data != "是" && is_add_data != "否")) {
            $.scojs_message('是否锁定及是否灌数只能填写是或否！', $.scojs_message.TYPE_ERROR);
        } else {
            if (is_lock == "是") {
                is_lock = 1;
            } else {
                is_lock = 0;
            }
            if (is_add_data == "是") {
                is_add_data = 1;
            } else {
                is_add_data = 0;
            }
            debugger;
            $.ajax({
                type: "POST", //用POST方式传输
                url: HOST + "index.php/Home/UserManage/postModifyUser", //目标地址.
                dataType: "json", //数据格式:JSON
                data: {
                    user_account: user_account,
                    user_type: user_type,
                    user_name: user_name,
                    user_organ_code: user_organ_code,
                    user_organ_name: user_organ_name,
                    user_sex: user_sex,
                    buss_area: buss_area,
                    is_lock: is_lock,
                    is_add_data: is_add_data,
                    user_company: user_company
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

//上线表格提交
$('#modify_user_limits').click(function (){
    debugger;
    var user_account = $('#modify_user_account').val();
    var is_lock = $('#user_lock_select').val();
    var user_set_organcode_select1 = $('#user_set_organcode_select1').val();
    var user_set_organcode_select2 = $('#user_set_organcode_select2').val();
    var set_organ_code = null;
    if(user_set_organcode_select2!='-1'&&user_set_organcode_select2!=null){
        set_organ_code = user_set_organcode_select2;
    }else if(user_set_organcode_select1!='-1'&&user_set_organcode_select1!=null){
        set_organ_code = user_set_organcode_select1;
    }else{
        $.scojs_message("用户初始机构必须配置！", $.scojs_message.TYPE_ERROR);
    }
    var user_list_organcode_select1 = $('#user_list_organcode_select1').val();
    var user_list_organcode_select2 = $('#user_list_organcode_select2').val();
    var user_list_organcode_select3 = $('#user_list_organcode_select3').val();
    var user_organ_code = null;
    if(user_list_organcode_select3!='-1'&&user_list_organcode_select3!=null){
        user_organ_code = user_list_organcode_select3;
    }else if(user_list_organcode_select2!='-1'&&user_list_organcode_select2!=null){
        user_organ_code = user_list_organcode_select2;
    }else if(user_list_organcode_select1!='-1'&&user_list_organcode_select1!=null){
        user_organ_code = user_list_organcode_select1;
    }else{
        $.scojs_message("用户清单机构必须配置！", $.scojs_message.TYPE_ERROR);
    }
    var user_hd_organcode_select1 = $('#user_hd_organcode_select1').val();
    var user_hd_organcode_select2 = $('#user_hd_organcode_select2').val();
    var user_hd_organcode_select3 = $('#user_hd_organcode_select3').val();
    var hd_user_code = null;
    if(user_hd_organcode_select3!='-1'&&user_hd_organcode_select3!=null){
        hd_user_code = user_list_organcode_select3;
    }else if(user_hd_organcode_select2!='-1'&&user_hd_organcode_select2!=null){
        hd_user_code = user_list_organcode_select2;
    }else if(user_hd_organcode_select1!='-1'&&user_hd_organcode_select1!=null){
        hd_user_code = user_hd_organcode_select1;
    }else{
        $.scojs_message("用户核对机构必须配置！", $.scojs_message.TYPE_ERROR);
    }
    var survey_search_group = $('#survey_search_group').val();
    var sx_list_type = survey_search_group.toString().replace(/,/g, '&');
    var sys_type = $('#user_sys_type_select').val();
    var channel_type = $('#is_yd_list_select').val();
    var sx_daypost_organ = $('#user_daypost_organcode_select1').val();
    var user_daypost_organcode_select2 = $('#user_daypost_organcode_select2').val();
    var sx_daypost_organ_list = user_daypost_organcode_select2.toString().replace(/,/g, '&');
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "index.php/Home/SysMaintain/modifyUserLimits", //目标地址.
        dataType: "json", //数据格式:JSON
        data: {
            user_account: user_account,
            is_lock: is_lock,
            set_organ_code: set_organ_code,
            user_organ_code: user_organ_code,
            hd_user_code: hd_user_code,
            sx_list_type: sx_list_type,
            sys_type: sys_type,
            channel_type: channel_type,
            sx_daypost_organ: sx_daypost_organ,
            sx_daypost_organ_list: sx_daypost_organ_list
        },
        success: function (result) {
            if (result.status == 'success') {
                debugger;
                $.scojs_message(result.message, $.scojs_message.TYPE_OK);
                //上线
                $('#user_limits_1').hide();
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
});

//并行表格提交
$('#modify_user_limits_bx').click(function (){
    debugger;
    var user_account = $('#modify_user_account_bx').val();
    var is_lock = $('#user_lock_select_bx').val();
    var user_set_organcode_select1 = $('#user_set_organcode_select1_bx').val();
    var user_set_organcode_select2 = $('#user_set_organcode_select2_bx').val();
    var set_organ_code = null;
    if(user_set_organcode_select2!='-1'&&user_set_organcode_select2!=null){
        set_organ_code = user_set_organcode_select2;
    }else if(user_set_organcode_select1!='-1'&&user_set_organcode_select1!=null){
        set_organ_code = user_set_organcode_select1;
    }else{
        $.scojs_message("用户初始机构必须配置！", $.scojs_message.TYPE_ERROR);
    }
    var user_list_organcode_select1 = $('#user_list_organcode_select1_bx').val();
    var user_list_organcode_select2 = $('#user_list_organcode_select2_bx').val();
    var user_list_organcode_select3 = $('#user_list_organcode_select3_bx').val();
    var user_organ_code = null;
    if(user_list_organcode_select3!='-1'&&user_list_organcode_select3!=null){
        user_organ_code = user_list_organcode_select3;
    }else if(user_list_organcode_select2!='-1'&&user_list_organcode_select2!=null){
        user_organ_code = user_list_organcode_select2;
    }else if(user_list_organcode_select1!='-1'&&user_list_organcode_select1!=null){
        user_organ_code = user_list_organcode_select1;
    }else{
        $.scojs_message("用户清单机构必须配置！", $.scojs_message.TYPE_ERROR);
    }
    var user_hd_organcode_select1 = $('#user_hd_organcode_select1_bx').val();
    var user_hd_organcode_select2 = $('#user_hd_organcode_select2_bx').val();
    var user_hd_organcode_select3 = $('#user_hd_organcode_select3_bx').val();
    var hd_user_code = null;
    if(user_hd_organcode_select3!='-1'&&user_hd_organcode_select3!=null){
        hd_user_code = user_list_organcode_select3;
    }else if(user_hd_organcode_select2!='-1'&&user_hd_organcode_select2!=null){
        hd_user_code = user_list_organcode_select2;
    }else if(user_hd_organcode_select1!='-1'&&user_hd_organcode_select1!=null){
        hd_user_code = user_hd_organcode_select1;
    }else{
        $.scojs_message("用户核对机构必须配置！", $.scojs_message.TYPE_ERROR);
    }
    var survey_search_group = $('#survey_search_group_bx').val();
    var bx_list_type = survey_search_group.toString().replace(/,/g, '&');
    var sys_type = $('#user_sys_type_select_bx').val();
    var bx_daypost_organ = $('#user_daypost_organcode_select1_bx').val();
    var user_daypost_organcode_select2 = $('#user_daypost_organcode_select2_bx').val();
    var bx_daypost_organ_list = user_daypost_organcode_select2.toString().replace(/,/g, '&');
    var is_bx_define_user = $('#is_bx_define_user_select').val();
    var is_back_user = $('#is_back_user_select').val();
    var is_reviewer = $('#is_reviewer_select').val();
    var is_delete_apply = $('#is_delete_apply_select').val();
    var is_delete_reviewer = $('#is_delete_reviewer_select').val();
    var is_sys_delete = $('#is_sys_delete_select').val();
    var is_work_delete = $('#is_work_delete_select').val();
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "index.php/Home/SysMaintain/modifyUserLimitsBx", //目标地址.
        dataType: "json", //数据格式:JSON
        data: {
            user_account: user_account,
            is_lock: is_lock,
            set_organ_code: set_organ_code,
            user_organ_code: user_organ_code,
            hd_user_code: hd_user_code,
            // bx_list_type: bx_list_type,
            sys_type: sys_type,
            bx_daypost_organ: bx_daypost_organ,
            bx_daypost_organ_list: bx_daypost_organ_list,
            is_bx_define_user: is_bx_define_user,
            is_back_user: is_back_user,
            is_reviewer: is_reviewer,
            is_delete_apply: is_delete_apply,
            is_delete_reviewer: is_delete_reviewer,
            is_sys_delete: is_sys_delete,
            is_work_delete: is_work_delete
        },
        success: function (result) {
            if (result.status == 'success') {
                debugger;
                $.scojs_message(result.message, $.scojs_message.TYPE_OK);
                //并行
                $('#user_limits_bx').hide();
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
});

$('#check_user').click(function () {
    var type = $('#user_type').text();
    debugger;
    if (usertype != '1') {
        $('#checkPass').modal();
        return;
    }
    var user_account = $('#user_account').val();
    var user_pass = $('#user_pass').val();
    debugger;
    user_pass = hex_md5(user_pass);
    debugger;
    var user_name = $('#user_name').val();
    var user_type = $('#user_type_input').val();
    var user_organ_code = $('#user_organ_code').val();
    var user_organ_name = $('#user_organ_name').val();
    var user_sex = $('#user_sex').val();
    var user_company = $('#user_company').val();
    var buss_area = $('#buss_area').val();
    if (user_account == "" || user_pass == "" || user_type == "" || user_organ_code == "" || user_organ_name == "" || user_sex == "" || user_company == "" || buss_area == "") {
        $.scojs_message('所有信息均为必填，请确认输入后再提交添加用户信息！', $.scojs_message.TYPE_ERROR);
    } else {
        debugger;
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "index.php/Home/UserManage/postAddUser", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {
                user_account: user_account,
                user_pass: user_pass,
                user_type: user_type,
                user_name: user_name,
                user_organ_code: user_organ_code,
                user_organ_name: user_organ_name,
                user_sex: user_sex,
                user_company: user_company,
                buss_area: buss_area
            },
            success: function (result) {
                if (result.status == 'success') {
                    debugger;
                    $.scojs_message(result.message, $.scojs_message.TYPE_OK);
                    $('.add_user').val("");
                    //校验用户信息密钥通过后才能修改权限
                    $('#user_list_table').bootstrapTable('refresh', {url: HOST + "index.php/Home/UserManage/getPostUserList"});
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
});

//校验密钥期限
function checkPass() {
    var user_pass = $('#check_pass').val();
    user_pass = hex_md5(user_pass);
    var user_name = $('#user_name').text();
    var user_account = $('#user_account').val();
    debugger;
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "index.php/Home/SysMaintain/checkPass", //目标地址.
        dataType: "json", //数据格式:JSON
        data: {
            user_name: user_name,
            user_pass: user_pass,
            user_account: user_account
        },
        success: function (result) {
            if (result.status == 'success') {
                $.ajax({
                    type: "POST", //用POST方式传输
                    url: HOST + "index.php/Home/SysMaintain/getUserLimitsData", //目标地址.
                    dataType: "json", //数据格式:JSON
                    data: {
                        user_account: user_account
                    },
                    success: function (result) {
                        debugger;
                        if (result.status == 'success') {
                            if (result.sys_type == '1') {
                                //上线
                                $('#user_limits_1').show();
                            } else if (result.sys_type == '2') {
                                //并行
                                $('#user_limits_2').show();
                            } else {
                                //上线
                                $('#user_limits_1').show();
                                //并行
                                $('#user_limits_2').show();
                            }
                            debugger;
                            $('#checkPass').modal('hide');
                            $('.user_account').val(user_account);
                            initLimitsArray(result);
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
                initLimits(result.set_organ);
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

function initLimitsArray(result) {
    //权限数据数组
    debugger;
    var resultUserLimitsObject = result.userLimits;
    var resultOrganResultObject = result.organResult;
    //被校验用户的设置机构权限
    var set_organ_level = resultOrganResultObject.set_organ_level;//1234
    //登录用户的设置机构
    var set_organ_code = $('#set_organ_code').text();
    //被修改用户
    var set_organ = resultUserLimitsObject.SET_ORGAN_CODE;
    if (set_organ_code.length == 2) {
        //最高机构不用校验直接输出被修改用户的权限
        publicOrganLimitsArray(result);
        publicOtherLimitsArray(result);
        publicMenuLimitsArray(result);
    } else if (set_organ_code.length == 4 && set_organ_code.length <= set_organ.length) {
        //判断是否同一机构
        publicOrganLimitsArray(result);
        publicOtherLimitsArray(result);
        publicMenuLimitsArray(result);
    } else if (set_organ_code.length == 6 && set_organ_code.length <= set_organ.length) {
        //判断是否同一机构
        publicOrganLimitsArray(result);
        publicOtherLimitsArray(result);
        publicMenuLimitsArray(result);
    } else if (set_organ_code.length == 8 && set_organ_code.length <= set_organ.length) {
        //判断是否同一机构
        publicOrganLimitsArray(result);
        publicOtherLimitsArray(result);
        publicMenuLimitsArray(result);
    } else {
        $.scojs_message("该用户权限较高，您无法修改！请联系管理员使用更高级别权限修改！", $.scojs_message.TYPE_ERROR);
    }
    $('.selectpicker').selectpicker('refresh');
    $('.selectpicker').selectpicker('render');
}

//被校验用户的设置机构
function initLimits(set_organ) {
    //初始化权限加载数据

    //被校验用户的设置机构权限
    var set_organ_level = $('#set_organ_level').text();//1234
    //登录用户的设置机构
    var set_organ_code = $('#set_organ_code').text();
    if (set_organ_code.length == 2) {
        //最高机构不用校验直接输出被修改用户的权限
        publicOrganLimits(set_organ_level);
        publicOtherLimits();
        publicMenuLimits();
    } else if (set_organ_code.length == 4 && set_organ_code.length <= set_organ.length) {
        publicOrganLimits(set_organ_level);
        publicOtherLimits();
        publicMenuLimits();
    } else if (set_organ_code.length == 6 && set_organ_code.length <= set_organ.length) {
        publicOrganLimits(set_organ_level);
        publicOtherLimits();
        publicMenuLimits();
    } else if (set_organ_code.length == 8 && set_organ_code.length <= set_organ.length) {
        publicOrganLimits(set_organ_level);
        publicOtherLimits();
        publicMenuLimits();
    } else {
        $.scojs_message("该用户权限较高，您无法修改！请联系管理员使用更高级别权限修改！", $.scojs_message.TYPE_ERROR);
    }
    $('.selectpicker').selectpicker('render');
}

//js转码实例
function decodeEntities(encodedString) {
    var textArea = document.createElement('textarea');
    textArea.innerHTML = encodedString;
    return textArea.value;
}

function publicOrganLimitsArray(result) {
    var resultUserLimitsObject = result.userLimits;
    var resultOrganResultObject = result.organResult;
    //操作用户的权限
    var user_type = $('#user_type').text();
    //要修改的用户等级
    //日报机构修改
    debugger;
    if (user_type == '1') {
        $('#daypost_organ_show').show();
        resultOrganResultObject.organCodeList1 = decodeEntities(resultOrganResultObject.organCodeList1);
        //上线
        $('#user_daypost_organcode_select1').empty();
        $('#user_daypost_organcode_select2').empty();
        $('#user_daypost_organcode_select1').append('<option disabled="" value="-1">==选择==</option>' + '<option value="99">无权限查看</option>');
        $('#user_daypost_organcode_select1').append(resultOrganResultObject.organCodeList1);
        $('#user_daypost_organcode_select2').append('<option disabled="" value="-1">==选择==</option>' + '<option value="99">无权限查看</option>');
        $('#user_daypost_organcode_select2').append(resultOrganResultObject.organCodeList1);
        $('#user_daypost_organcode_select1').val(resultUserLimitsObject.SX_DAYPOST_ORGAN);
        $('#user_daypost_organcode_select2').val(resultUserLimitsObject.SX_DAYPOST_ORGAN_LIST);
        //并行
        $('#user_daypost_organcode_select1_bx').empty();
        $('#user_daypost_organcode_select2_bx').empty();
        $('#user_daypost_organcode_select1_bx').append('<option disabled="" value="-1">==选择==</option>' + '<option value="99">无权限查看</option>');
        $('#user_daypost_organcode_select1_bx').append(resultOrganResultObject.organCodeList1);
        $('#user_daypost_organcode_select2_bx').append('<option disabled="" value="-1">==选择==</option>' + '<option value="99">无权限查看</option>');
        $('#user_daypost_organcode_select2_bx').append(resultOrganResultObject.organCodeList1);
        $('#user_daypost_organcode_select1_bx').val(resultUserLimitsObject.BX_DAYPOST_ORGAN);
        $('#user_daypost_organcode_select2_bx').val(resultUserLimitsObject.BX_DAYPOST_ORGAN_LIST);
    } else {
        $('#daypost_organ_show').hide();
    }
    switch (resultOrganResultObject.set_organ_level) {
        case '1':
            resultOrganResultObject.organCodeList1 = decodeEntities(resultOrganResultObject.organCodeList1);
            //显示1级菜单-正常无需特殊处理直接赋值
            //上线
            $('#user_set_organcode_select1').empty();
            $('#user_set_organcode_select1').append(resultOrganResultObject.organCodeList1);
            $('#user_set_organcode_select1').val(resultUserLimitsObject.SET_ORGAN_CODE);
            $('#user_list_organcode_select1').empty();
            $('#user_list_organcode_select1').append(resultOrganResultObject.organCodeList1);
            $('#user_list_organcode_select1').val(resultUserLimitsObject.USER_ORGAN_CODE);
            $('#user_hd_organcode_select1').empty();
            $('#user_hd_organcode_select1').append(resultOrganResultObject.organCodeList1);
            $('#user_hd_organcode_select1').val(resultUserLimitsObject.HD_USER_CODE);
            //并行
            $('#user_set_organcode_select1_bx').empty();
            $('#user_set_organcode_select1_bx').append(resultOrganResultObject.organCodeList1);
            $('#user_set_organcode_select1_bx').val(resultUserLimitsObject.SET_ORGAN_CODE);
            $('#user_list_organcode_select1_bx').empty();
            $('#user_list_organcode_select1_bx').append(resultOrganResultObject.organCodeList1);
            $('#user_list_organcode_select1_bx').val(resultUserLimitsObject.USER_ORGAN_CODE);
            $('#user_hd_organcode_select1_bx').empty();
            $('#user_hd_organcode_select1_bx').append(resultOrganResultObject.organCodeList1);
            $('#user_hd_organcode_select1_bx').val(resultUserLimitsObject.HD_USER_CODE);
            break;
        case '2':
            //显示12级菜单返回12
            //上线
            resultOrganResultObject.organCodeList1 = decodeEntities(resultOrganResultObject.organCodeList1);
            resultOrganResultObject.organCodeList2 = decodeEntities(resultOrganResultObject.organCodeList2);
            $('#hd_organ_show2').show();
            $('#set_organ_show2').show();
            $('#list_organ_show2').show();
            $('#user_set_organcode_select1').empty();
            $('#user_set_organcode_select1').append(resultOrganResultObject.organCodeList1);
            $('#user_set_organcode_select1').val(resultUserLimitsObject.SET_ORGAN_CODE);
            $('#user_list_organcode_select1').empty();
            $('#user_list_organcode_select1').append(resultOrganResultObject.organCodeList1);
            $('#user_list_organcode_select1').val(resultUserLimitsObject.USER_ORGAN_CODE);
            $('#user_hd_organcode_select1').empty();
            $('#user_hd_organcode_select1').append(resultOrganResultObject.organCodeList1);
            $('#user_hd_organcode_select1').val(resultUserLimitsObject.HD_USER_CODE);
            $('#user_set_organcode_select2').empty();
            $('#user_set_organcode_select2').append(resultOrganResultObject.organCodeList2);
            $('#user_set_organcode_select2').val(resultUserLimitsObject.SET_ORGAN_CODE);
            $('#user_list_organcode_select2').empty();
            $('#user_list_organcode_select2').append(resultOrganResultObject.organCodeList2);
            $('#user_list_organcode_select2').val(resultUserLimitsObject.USER_ORGAN_CODE);
            $('#user_hd_organcode_select2').empty();
            $('#user_hd_organcode_select2').append(resultOrganResultObject.organCodeList2);
            $('#user_hd_organcode_select2').val(resultUserLimitsObject.HD_USER_CODE);
            //并行
            $('#hd_organ_show2_bx').show();
            $('#set_organ_show2_bx').show();
            $('#list_organ_show2_bx').show();
            $('#user_set_organcode_select1_bx').empty();
            $('#user_set_organcode_select1_bx').append(resultOrganResultObject.organCodeList1);
            $('#user_set_organcode_select1_bx').val(resultUserLimitsObject.SET_ORGAN_CODE);
            $('#user_list_organcode_select1_bx').empty();
            $('#user_list_organcode_select1_bx').append(resultOrganResultObject.organCodeList1);
            $('#user_list_organcode_select1_bx').val(resultUserLimitsObject.USER_ORGAN_CODE);
            $('#user_hd_organcode_select1_bx').empty();
            $('#user_hd_organcode_select1_bx').append(resultOrganResultObject.organCodeList1);
            $('#user_hd_organcode_select1_bx').val(resultUserLimitsObject.HD_USER_CODE);
            $('#user_set_organcode_select2_bx').empty();
            $('#user_set_organcode_select2_bx').append(resultOrganResultObject.organCodeList2);
            $('#user_set_organcode_select2_bx').val(resultUserLimitsObject.SET_ORGAN_CODE);
            $('#user_list_organcode_select2_bx').empty();
            $('#user_list_organcode_select2_bx').append(resultOrganResultObject.organCodeList2);
            $('#user_list_organcode_select2_bx').val(resultUserLimitsObject.USER_ORGAN_CODE);
            $('#user_hd_organcode_select2_bx').empty();
            $('#user_hd_organcode_select2_bx').append(resultOrganResultObject.organCodeList2);
            $('#user_hd_organcode_select2_bx').val(resultUserLimitsObject.HD_USER_CODE);
            break;
        case '3':
            resultOrganResultObject.organCodeList2 = decodeEntities(resultOrganResultObject.organCodeList2);
            resultOrganResultObject.organCodeList3 = decodeEntities(resultOrganResultObject.organCodeList3);
            //显示23级菜单-隐藏1级，二级赋值（1级不占位隐藏display）三级自动
            //上线
            debugger;
            $('#hd_organ_show1').hide();
            $('#set_organ_show1').hide();
            $('#list_organ_show1').hide();
            $('#hd_organ_show2').show();
            $('#set_organ_show2').show();
            $('#list_organ_show2').show();
            $('#hd_organ_show3').show();
            $('#set_organ_show3').show();
            $('#list_organ_show3').show();
            $('#user_set_organcode_select2').empty();
            $('#user_set_organcode_select2').append(resultOrganResultObject.organCodeList2);
            $('#user_set_organcode_select2').val(resultUserLimitsObject.SET_ORGAN_CODE);
            $('#user_list_organcode_select2').empty();
            $('#user_list_organcode_select2').append(resultOrganResultObject.organCodeList2);
            $('#user_list_organcode_select2').val(resultUserLimitsObject.USER_ORGAN_CODE);
            $('#user_hd_organcode_select2').empty();
            $('#user_hd_organcode_select2').append(resultOrganResultObject.organCodeList2);
            $('#user_hd_organcode_select2').val(substr(resultUserLimitsObject.HD_USER_CODE,1,4));
            $('#user_set_organcode_select3').empty();
            $('#user_set_organcode_select3').append(resultOrganResultObject.organCodeList3);
            $('#user_set_organcode_select3').val(resultUserLimitsObject.SET_ORGAN_CODE);
            $('#user_list_organcode_select3').empty();
            $('#user_list_organcode_select3').append(resultOrganResultObject.organCodeList3);
            $('#user_list_organcode_select3').val(resultUserLimitsObject.USER_ORGAN_CODE);
            $('#user_hd_organcode_select3').empty();
            $('#user_hd_organcode_select3').append(resultOrganResultObject.organCodeList3);
            $('#user_hd_organcode_select3').val(resultUserLimitsObject.HD_USER_CODE);
            //并行
            $('#hd_organ_show1_bx').hide();
            $('#set_organ_show1_bx').hide();
            $('#list_organ_show1_bx').hide();
            $('#hd_organ_show2_bx').show();
            $('#set_organ_show2_bx').show();
            $('#list_organ_show2_bx').show();
            $('#hd_organ_show3_bx').show();
            $('#set_organ_show3_bx').show();
            $('#list_organ_show3_bx').show();
            $('#user_set_organcode_select2_bx').empty();
            $('#user_set_organcode_select2_bx').append(resultOrganResultObject.organCodeList2);
            $('#user_set_organcode_select2_bx').val(resultUserLimitsObject.SET_ORGAN_CODE);
            $('#user_list_organcode_select2_bx').empty();
            $('#user_list_organcode_select2_bx').append(resultOrganResultObject.organCodeList2);
            $('#user_list_organcode_select2_bx').val(resultUserLimitsObject.USER_ORGAN_CODE);
            $('#user_hd_organcode_select2_bx').empty();
            $('#user_hd_organcode_select2_bx').append(resultOrganResultObject.organCodeList2);
            $('#user_hd_organcode_select2_bx').val(resultUserLimitsObject.HD_USER_CODE);
            $('#user_set_organcode_select3_bx').empty();
            $('#user_set_organcode_select3_bx').append(resultOrganResultObject.organCodeList3);
            $('#user_set_organcode_select3_bx').val(resultUserLimitsObject.SET_ORGAN_CODE);
            $('#user_list_organcode_select3_bx').empty();
            $('#user_list_organcode_select3_bx').append(resultOrganResultObject.organCodeList3);
            $('#user_list_organcode_select3_bx').val(resultUserLimitsObject.USER_ORGAN_CODE);
            $('#user_hd_organcode_select3_bx').empty();
            $('#user_hd_organcode_select3_bx').append(resultOrganResultObject.organCodeList3);
            $('#user_hd_organcode_select3_bx').val(resultUserLimitsObject.HD_USER_CODE);
            break;
        case '4':
            //显示三级菜单-12隐藏
            resultOrganResultObject.organCodeList3 = decodeEntities(resultOrganResultObject.organCodeList3);
            //上线
            $('#hd_organ_show1').hide();
            $('#set_organ_show1').hide();
            $('#list_organ_show1').hide();
            $('#hd_organ_show2').hide();
            $('#set_organ_show2').hide();
            $('#list_organ_show2').hide();
            $('#hd_organ_show3').show();
            $('#set_organ_show3').show();
            $('#list_organ_show3').show();
            $('#user_set_organcode_select3').empty();
            $('#user_set_organcode_select3').append(resultOrganResultObject.organCodeList3);
            $('#user_set_organcode_select3').val(resultUserLimitsObject.SET_ORGAN_CODE);
            $('#user_list_organcode_select3').empty();
            $('#user_list_organcode_select3').append(resultOrganResultObject.organCodeList3);
            $('#user_list_organcode_select3').val(resultUserLimitsObject.USER_ORGAN_CODE);
            $('#user_hd_organcode_select3').empty();
            $('#user_hd_organcode_select3').append(resultOrganResultObject.organCodeList3);
            $('#user_hd_organcode_select3').val(resultUserLimitsObject.HD_USER_CODE);
            //并行
            $('#hd_organ_show1_bx').hide();
            $('#set_organ_show1_bx').hide();
            $('#list_organ_show1_bx').hide();
            $('#hd_organ_show2_bx').hide();
            $('#set_organ_show2_bx').hide();
            $('#list_organ_show2_bx').hide();
            $('#hd_organ_show3_bx').show();
            $('#set_organ_show3_bx').show();
            $('#list_organ_show3_bx').show();
            $('#user_set_organcode_select3_bx').empty();
            $('#user_set_organcode_select3_bx').append(resultOrganResultObject.organCodeList3);
            $('#user_set_organcode_select3_bx').val(resultUserLimitsObject.SET_ORGAN_CODE);
            $('#user_list_organcode_select3_bx').empty();
            $('#user_list_organcode_select3_bx').append(resultOrganResultObject.organCodeList3);
            $('#user_list_organcode_select3_bx').val(resultUserLimitsObject.USER_ORGAN_CODE);
            $('#user_hd_organcode_select3_bx').empty();
            $('#user_hd_organcode_select3_bx').append(resultOrganResultObject.organCodeList3);
            $('#user_hd_organcode_select3_bx').val(resultUserLimitsObject.HD_USER_CODE);
            break;
        default:
            break;
    }
}

function publicOrganLimits(set_organ_level) {
    var set_organ_code = $('#set_organ_code').text();
    var hd_user_code = $('#hd_user_code').text();
    var user_organ_code = $('#user_organ_code').text();
    var bx_daypost_organ = $('#bx_daypost_organ').text();
    var bx_daypost_organ_list = $('#bx_daypost_organ_list').text();
    var sx_daypost_organ = $('#sx_daypost_organ').text();
    var sx_daypost_organ_list = $('#sx_daypost_organ_list').text();
    var user_type = $('#user_type').text();
    //要修改的用户等级
    //日报机构修改
    if (user_type == '1') {
        $('#daypost_organ_show').show();
        $('#user_daypost_organcode_select1').val([sx_daypost_organ]);
        $('#user_daypost_organcode_select2').val([sx_daypost_organ_list]);
        $('#user_daypost_organcode_select1_bx').val([bx_daypost_organ]);
        $('#user_daypost_organcode_select2_bx').val([bx_daypost_organ_list]);
    } else {
        $('#daypost_organ_show').hide();
    }
    switch (set_organ_level) {
        case '1':
            //显示1级菜单-正常无需特殊处理直接赋值
            //上线
            $('#user_set_organcode_select1').val([set_organ_code]);
            $('#user_list_organcode_select1').val([user_organ_code]);
            $('#user_hd_organcode_select1').val([hd_user_code]);
            //并行
            $('#user_set_organcode_select1_bx').val([set_organ_code]);
            $('#user_list_organcode_select1_bx').val([user_organ_code]);
            $('#user_hd_organcode_select1_bx').val([hd_user_code]);
            break;
        case '2':
            //显示12级菜单
            //上线
            $('#user_set_organcode_select1').val([set_organ_code]);
            $('#set_organ_show2').show();
            $('#user_list_organcode_select1').val([user_organ_code]);
            $('#user_hd_organcode_select1').val([hd_user_code]);
            //并行
            $('#user_set_organcode_select1_bx').val([set_organ_code]);
            $('#user_list_organcode_select1_bx').val([user_organ_code]);
            $('#user_hd_organcode_select1_bx').val([hd_user_code]);
            break;
        case '3':
            //显示23级菜单
            //上线
            $('#user_set_organcode_select1').val([set_organ_code]);
            $('#user_list_organcode_select1').val([user_organ_code]);
            $('#user_hd_organcode_select1').val([hd_user_code]);
            $('#user_set_organcode_select2').val([set_organ_code]);
            $('#user_list_organcode_select2').val([user_organ_code]);
            $('#user_hd_organcode_select2').val([hd_user_code]);
            //并行
            $('#user_set_organcode_select1_bx').val([set_organ_code]);
            $('#user_list_organcode_select1_bx').val([user_organ_code]);
            $('#user_hd_organcode_select1_bx').val([hd_user_code]);
            $('#user_set_organcode_select2_bx').val([set_organ_code]);
            $('#user_list_organcode_select2_bx').val([user_organ_code]);
            $('#user_hd_organcode_select2_bx').val([hd_user_code]);
            break;
        case '4':
            //显示三级菜单
            break;
        default:
            break;
    }
}

function publicOtherLimitsArray(result){
    debugger;
    var resultUserLimitsObject = result.userLimits;
    var is_lock = resultUserLimitsObject.IS_LOCK;
    var sys_type = resultUserLimitsObject.SYS_TYPE;
    var is_reviewer = resultUserLimitsObject.IS_REVIEWER;
    var is_delete_reviewer = resultUserLimitsObject.IS_DELETE_REVIEWER;
    var is_delete_apply = resultUserLimitsObject.IS_DELETE_APPLY;
    var is_sys_delete = resultUserLimitsObject.IS_SYS_DELETE;
    var is_work_delete = resultUserLimitsObject.IS_WORK_DELETE;
    var is_back_user = resultUserLimitsObject.IS_BACK_USER;
    var is_bx_define_user = resultUserLimitsObject.IS_BX_DEFINE_USER;
    var channel_type = resultUserLimitsObject.CHANNEL_TYPE;
    debugger;
    //上线
    $('#user_lock_select').val(is_lock);
    $('#user_sys_type_select').val(sys_type);
    $('#is_yd_list_select').val(channel_type);
    //并行
    $('#user_lock_select_bx').val(is_lock);
    $('#user_sys_type_select_bx').val(sys_type);
    $('#is_bx_define_user_select').val(is_bx_define_user);
    $('#is_back_user_select').val(is_back_user);
    $('#is_reviewer_select').val(is_reviewer);
    $('#is_delete_apply_select').val(is_delete_apply);
    $('#is_delete_reviewer_select').val(is_delete_reviewer);
    $('#is_sys_delete_select').val(is_sys_delete);
    $('#is_work_delete_select').val(is_work_delete);
}

function publicOtherLimits() {
    var is_lock = $('#is_lock').text();
    var sys_type = $('#sys_type').text();
    var is_reviewer = $('#is_reviewer').text();
    var is_delete_reviewer = $('#is_delete_reviewer').text();
    var is_delete_apply = $('#is_delete_apply').text();
    var is_sys_delete = $('#is_sys_delete').text();
    var is_work_delete = $('#is_work_delete').text();
    var is_back_user = $('#is_back_user').text();
    var is_bx_define_user = $('#is_bx_define_user').text();
    var channel_type = $('#channel_type').text();
    //上线
    $('#user_lock_select').val(is_lock);
    $('#user_sys_type_select').val(sys_type);
    $('#is_yd_list_select').val(channel_type);
    //并行
    $('#user_lock_select_bx').val(is_lock);
    $('#user_sys_type_select_bx').val(sys_type);
    $('#is_bx_define_user_select').val(is_bx_define_user);
    $('#is_back_user_select').val(is_back_user);
    $('#is_reviewer_select').val(is_reviewer);
    $('#is_delete_apply_select').val(is_delete_apply);
    $('#is_delete_reviewer_select').val(is_delete_reviewer);
    $('#is_sys_delete_select').val(is_sys_delete);
    $('#is_work_delete_select').val(is_work_delete);

}

function publicMenuLimitsArray(result) {
    debugger;
    var resultUserLimitsObject = result.userLimits;
    var sx_list_type = resultUserLimitsObject.SX_LIST_TYPE;
    var list_type = resultUserLimitsObject.LIST_TYPE;
    var bx_list_type = resultUserLimitsObject.BX_LIST_TYPE;
    //上线菜单权限
    // var res = sx_list_type.replace(new RegExp('&','g'),',');
    var strs = new Array(); //定义一数组
    var res = "";
    strs = sx_list_type.split("&"); //字符分割
    // for (i = 0; i < strs.length; i++) {
    //     if (strs[i] == '99') {
    //         res = strs[i].toString();
    //         break;
    //     } else if (i != strs.length - 1) {
    //         res += ("'" + strs[i].toString() + "',");
    //     } else {
    //         res += ("'" + strs[i].toString() + "'");
    //     }
    // }
    $('#survey_search_group').val(strs);
    // alert(res);
    //并行权限应该是用的list_type，具体逻辑还没有验证
}

function publicMenuLimits() {
    var sx_list_type = $('#sx_list_type').text();
    var list_type = $('#list_type').text();
    var bx_list_type = $('#bx_list_type').text();
    //上线菜单权限
    var strs = new Array(); //定义一数组
    var res = '[';
    strs = sx_list_type.split("&"); //字符分割
    for (i = 0; i < strs.length; i++) {
        if (strs[i] == '99') {
            res = strs[i];
            break;
        } else if (i != strs.length - 1) {
            res += (strs[i] + ',');
        } else {
            res += (strs[i] + ']');
        }
    }
    $('#survey_search_group').val(res);
    //并行权限应该是用的list_type，具体逻辑还没有验证
}

$("#user_hd_organcode_select1").change(function () {
    //选择一级变更后二级三级清空
    $('#user_hd_organcode_select2').empty();
    $('#user_hd_organcode_select2').selectpicker('refresh');
    var selected = $(this).children('option:selected').val();
    if (selected.length == 2) {
        //总公司级别不往下加载下拉列表
        $('#hd_organ_show2').hide();
        $('#hd_organ_show3').hide();
    } else if (selected.length == 4) {
        //向下加载三级机构默认不选择
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "index.php/Home/SysMaintain/getOrganFourLevel", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {
                upOrganCode: selected
            },
            success: function (result) {
                if (result.status == 'success') {
                    debugger;
                    $('#user_hd_organcode_select2').append(result.message);
                    $('#user_hd_organcode_select2').selectpicker('refresh');
                    $('#hd_organ_show2').show();
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
});

$("#user_hd_organcode_select2").change(function () {
    //选择一级变更后二级三级清空
    $('#user_hd_organcode_select3').empty();
    $('#user_hd_organcode_select3').selectpicker('refresh');
    var selected = $(this).children('option:selected').val();
    if (selected == '-1') {
        $('#hd_organ_show3').hide();
    }
    if (selected.length != 6) {
        //总公司级别不往下加载下拉列表
    } else if (selected.length == 6) {
        //向下加载三级机构默认不选择
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "index.php/Home/SysMaintain/getOrganSixLevel", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {
                upOrganCode: selected
            },
            success: function (result) {
                if (result.status == 'success') {
                    debugger;
                    $('#user_hd_organcode_select3').append(result.message);
                    $('#user_hd_organcode_select3').selectpicker('refresh');
                    $('#hd_organ_show3').show();
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
});

$("#user_list_organcode_select1").change(function () {
    //选择一级变更后二级三级清空
    $('#user_list_organcode_select2').empty();
    $('#user_list_organcode_select2').selectpicker('refresh');
    var selected = $(this).children('option:selected').val();
    if (selected.length == 2) {
        //总公司级别不往下加载下拉列表,隐藏二三级
        $('#list_organ_show2').hide();
        $('#list_organ_show3').hide();
    } else if (selected.length == 4) {
        //向下加载三级机构默认不选择
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "index.php/Home/SysMaintain/getOrganFourLevel", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {
                upOrganCode: selected
            },
            success: function (result) {
                if (result.status == 'success') {
                    debugger;
                    $('#user_list_organcode_select2').append(result.message);
                    $('#user_list_organcode_select2').selectpicker('refresh');
                    $('#list_organ_show2').show();
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
});

$("#user_list_organcode_select2").change(function () {
    $('#user_list_organcode_select3').empty();
    $('#user_list_organcode_select3').selectpicker('refresh');
    var selected = $(this).children('option:selected').val();
    if (selected == '-1') {
        $('#list_organ_show3').hide();
    }
    if (selected.length != 6) {
        //总公司级别不往下加载下拉列表
    } else if (selected.length == 6) {
        //向下加载三级机构默认不选择
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "index.php/Home/SysMaintain/getOrganSixLevel", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {
                upOrganCode: selected
            },
            success: function (result) {
                if (result.status == 'success') {
                    debugger;
                    $('#user_list_organcode_select3').append(result.message);
                    $('#user_list_organcode_select3').selectpicker('refresh');
                    $('#list_organ_show3').show();
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
});

$("#user_set_organcode_select1").change(function () {
    $('#user_set_organcode_select2').empty();
    $('#user_set_organcode_select2').selectpicker('refresh');
    var selected = $(this).children('option:selected').val();
    if (selected.length == 2) {
        //总公司级别不往下加载下拉列表
        $('#set_organ_show2').hide();
        $('#set_organ_show3').hide();
    } else if (selected.length == 4) {
        //向下加载三级机构默认不选择
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "index.php/Home/SysMaintain/getOrganFourLevel", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {
                upOrganCode: selected
            },
            success: function (result) {
                if (result.status == 'success') {
                    debugger;
                    $('#user_set_organcode_select2').append(result.message);
                    $('#user_set_organcode_select2').selectpicker('refresh');
                    set_organ_show2
                    $('#set_organ_show2').show();
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
});

//并行模块处理
$("#user_hd_organcode_select1_bx").change(function () {
    //选择一级变更后二级三级清空
    $('#user_hd_organcode_select2_bx').empty();
    $('#user_hd_organcode_select2_bx').selectpicker('refresh');
    var selected = $(this).children('option:selected').val();
    if (selected.length == 2) {
        //总公司级别不往下加载下拉列表
        $('#hd_organ_show2_bx').hide();
        $('#hd_organ_show3_bx').hide();
    } else if (selected.length == 4) {
        //向下加载三级机构默认不选择
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "index.php/Home/SysMaintain/getOrganFourLevel", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {
                upOrganCode: selected
            },
            success: function (result) {
                if (result.status == 'success') {
                    debugger;
                    $('#user_hd_organcode_select2_bx').append(result.message);
                    $('#user_hd_organcode_select2_bx').selectpicker('refresh');
                    $('#hd_organ_show2_bx').show();
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
});

$("#user_hd_organcode_select2_bx").change(function () {
    //选择一级变更后二级三级清空
    $('#user_hd_organcode_select3_bx').empty();
    $('#user_hd_organcode_select3_bx').selectpicker('refresh');
    var selected = $(this).children('option:selected').val();
    if (selected == '-1') {
        $('#hd_organ_show3_bx').hide();
    }
    if (selected.length != 6) {
        //总公司级别不往下加载下拉列表
    } else if (selected.length == 6) {
        //向下加载三级机构默认不选择
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "index.php/Home/SysMaintain/getOrganSixLevel", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {
                upOrganCode: selected
            },
            success: function (result) {
                if (result.status == 'success') {
                    debugger;
                    $('#user_hd_organcode_select3_bx').append(result.message);
                    $('#user_hd_organcode_select3_bx').selectpicker('refresh');
                    $('#hd_organ_show3_bx').show();
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
});

$("#user_list_organcode_select1_bx").change(function () {
    //选择一级变更后二级三级清空
    $('#user_list_organcode_select2_bx').empty();
    $('#user_list_organcode_select2_bx').selectpicker('refresh');
    var selected = $(this).children('option:selected').val();
    if (selected.length == 2) {
        //总公司级别不往下加载下拉列表
        $('#list_organ_show2_bx').hide();
        $('#list_organ_show3_bx').hide();
    } else if (selected.length == 4) {
        //向下加载三级机构默认不选择
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "index.php/Home/SysMaintain/getOrganFourLevel", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {
                upOrganCode: selected
            },
            success: function (result) {
                if (result.status == 'success') {
                    debugger;
                    $('#user_list_organcode_select2_bx').append(result.message);
                    $('#user_list_organcode_select2_bx').selectpicker('refresh');
                    $('#list_organ_show2_bx').show();
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
});

$("#user_list_organcode_select2_bx").change(function () {
    $('#user_list_organcode_select3_bx').empty();
    $('#user_list_organcode_select3_bx').selectpicker('refresh');
    var selected = $(this).children('option:selected').val();
    if (selected == '-1') {
        $('#list_organ_show3_bx').hide();
    }
    if (selected.length != 6) {
        //总公司级别不往下加载下拉列表
    } else if (selected.length == 6) {
        //向下加载三级机构默认不选择
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "index.php/Home/SysMaintain/getOrganSixLevel", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {
                upOrganCode: selected
            },
            success: function (result) {
                if (result.status == 'success') {
                    debugger;
                    $('#user_list_organcode_select3_bx').append(result.message);
                    $('#user_list_organcode_select3_bx').selectpicker('refresh');
                    $('#list_organ_show3_bx').show();
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
});

$("#user_set_organcode_select1_bx").change(function () {
    $('#user_set_organcode_select2_bx').empty();
    $('#user_set_organcode_select2_bx').selectpicker('refresh');
    var selected = $(this).children('option:selected').val();
    if (selected.length == 2) {
        //总公司级别不往下加载下拉列表
        $('#set_organ_show2_bx').hide();
        $('#set_organ_show3_bx').hide();
    } else if (selected.length == 4) {
        //向下加载三级机构默认不选择
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "index.php/Home/SysMaintain/getOrganFourLevel", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {
                upOrganCode: selected
            },
            success: function (result) {
                if (result.status == 'success') {
                    debugger;
                    $('#user_set_organcode_select2_bx').append(result.message);
                    $('#user_set_organcode_select2_bx').selectpicker('refresh');
                    set_organ_show2
                    $('#set_organ_show2_bx').show();
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
});

//密钥配置账户监听
$("#key_user_account").change(function () {
    //选择一级变更后二级三级清空
    var key_user_account = $('#key_user_account').val();
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "index.php/Home/SysMaintain/checkUserKey", //目标地址.
        dataType: "json", //数据格式:JSON
        data: {
            key_user_account: key_user_account
        },
        success: function (result) {
            if (result.status == 'success') {
                debugger;
                $('#key_user_show').show();
                $('#key_user_select').empty();
                $('#key_user_select').append(result.message);
                $('#key_user_select').selectpicker('refresh');
                $('#key_user_hint').empty();
            } else if (result.status == 'failed') {
                debugger;
                $('#key_user_show').hide();
                $('#key_user_hint').text(result.message);
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert(XMLHttpRequest);
            alert(textStatus);
            alert(errorThrown);
        }
    });
});

//密钥变更监听
$("#key_user_select").change(function(){
    var user_key_id = $('#key_user_select').val();
    if(user_key_id=='-1'){
        return;
    }else{
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "index.php/Home/SysMaintain/getUserKey", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {
                user_key_id: user_key_id
            },
            success: function (result) {
                if (result.status == 'success') {
                    debugger;
                    $('#is_valid').val(result.IS_VAILD);
                    $('#is_valid').selectpicker('refresh');
                    $('#key_user_pass').val(result.TEXT);
                    $('#form_date1').datetimepicker('update',result.END_TIME);
                } else if (result.status == 'failed') {
                    debugger;
                    $('#key_id_hint').text(result.message);
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert(XMLHttpRequest);
                alert(textStatus);
                alert(errorThrown);
            }
        });
    }
});

$('#notice_select').change(function(){
    var notice_id = $('#notice_select').val();
    if(notice_id=='-1'){
        return;
    }else{
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "index.php/Home/SysMaintain/getNoticeContent", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {
                notice_id: notice_id
            },
            success: function (result) {
                if (result.status == 'success') {
                    debugger;
                    $('#notice_is_valid').val(result.IS_VAILD);
                    $('#notice_is_valid').selectpicker('refresh');
                    $('#notice_content').val(result.TEXT);
                    $('#notice_times').val(result.TIMES);
                    $('#notice_times').selectpicker('refresh');
                } else if (result.status == 'failed') {
                    debugger;
                    $('#key_id_hint').text(result.message);
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert(XMLHttpRequest);
                alert(textStatus);
                alert(errorThrown);
            }
        });
    }
});

$('#modify_user_key').click(function(){
    debugger;
    var is_new = $('#is_new').val();
    if(is_new!='0'&&is_new!='1'&&is_new!='2'){
        $.scojs_message('修改密钥操作类型必须选择！',$.scojs_message.TYPE_ERROR);
    }else{
        var is_valid = $('#is_valid').val();
        var key_user_pass = $('#key_user_pass').val();
        var end_time = $('#dtp_input2').val();
        var key_id = $('#key_user_select').val();
        var key_user_account = $('#key_user_account').val();
        if(key_user_pass!=null&&end_time!=null){
            $.ajax({
                type: "POST", //用POST方式传输
                url: HOST + "index.php/Home/SysMaintain/dealUserKey", //目标地址.
                dataType: "json", //数据格式:JSON
                data: {
                    is_valid: is_valid,
                    is_new: is_new,
                    key_user_pass: key_user_pass,
                    end_time: end_time,
                    key_id:key_id,
                    key_user_account:key_user_account
                },
                success: function (result) {
                    if (result.status == 'success') {
                        debugger;
                        $.scojs_message(result.message,$.scojs_message.TYPE_OK);
                        $('#key_user_account').val(-1);
                        $('#is_new').val(-1);
                        $('#key_user_account').selectpicker('refresh');
                        $('#is_new').selectpicker('refresh');
                        $('#key_user_pass').empty();
                        $('#dtp_input2').empty();
                    } else if (result.status == 'failed') {
                        debugger;
                        $.scojs_message(result.message,$.scojs_message.TYPE_ERROR);
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
});

$('#modify_notice').click(function(){
    debugger;
    var is_new_notice = $('#is_new_notice').val();
    if(is_new_notice!='0'&&is_new_notice!='1'){
        $.scojs_message('通知书修改操作类型必须选择！',$.scojs_message.TYPE_ERROR);
    }else{
        var notice_id = $('#notice_select').val();
        var is_valid = $('#notice_is_valid').val();
        var notice_content = $('#notice_content').val();
        var notice_times = $('#notice_times').val();
        if(notice_content!=null||notice_times!='-1'){
            $.ajax({
                type: "POST", //用POST方式传输
                url: HOST + "index.php/Home/SysMaintain/dealSysNotice", //目标地址.
                dataType: "json", //数据格式:JSON
                data: {
                    is_valid: is_valid,
                    is_new_notice: is_new_notice,
                    notice_id: notice_id,
                    notice_content: notice_content,
                    notice_times:notice_times
                },
                success: function (result) {
                    if (result.status == 'success') {
                        debugger;
                        $.scojs_message(result.message,$.scojs_message.TYPE_OK);
                        $('#notice_select').val(-1);
                        $('#notice_is_valid').val(-1);
                        $('#notice_times').val(-1);
                        $('#notice_select').selectpicker('refresh');
                        $('#notice_is_valid').selectpicker('refresh');
                        $('#notice_times').selectpicker('refresh');
                        $('#notice_content').empty();
                    } else if (result.status == 'failed') {
                        debugger;
                        $.scojs_message(result.message,$.scojs_message.TYPE_ERROR);
                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert(XMLHttpRequest);
                    alert(textStatus);
                    alert(errorThrown);
                }
            });
        }else{
            $.scojs_message('必填项未填写完整！',$.scojs_message.TYPE_ERROR);
        }
    }
});

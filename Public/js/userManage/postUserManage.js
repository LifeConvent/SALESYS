/**
 * Created by lawrance on 2017/1/11.
 */

$(function () {
    $('#user').attr('class', 'active');
    $('#user_sub').css('display', 'block');
    $('#user_manager').attr('class', 'active');

    //1.初始化Table
    var oTable = new TableInit();
    oTable.Init();
//        $[sessionStorage] = oTable.queryParams;

    $('#modify_user_account').val($('#username').val());

    var type = $('#usertype').val();
    if(type==1){
        $('#modify_user_account').removeAttr("disabled");
    }

    //2.初始化Button的点击事件
    // var oButtonInit = new ButtonInit();
    // oButtonInit.Init();
    //
    //
    // $('input').iCheck({
    //     checkboxClass: 'icheckbox_square-green',
    //     radioClass: 'iradio_square-green',
    //     increaseArea: '2%' // optional
    // });


});

var TableInit = function () {
    countFooter =  function(v){
        var count = 0;
        for (var i in v) {
            if(v[i]['org']=='小计'){
                continue;
            }
            count += v[i][this.field];
        }
        return count+'';
    };
    var oTableInit = new Object();
    //初始化Table
    oTableInit.Init = function () {
        $('#user_list_table').bootstrapTable({
            url: HOST + "index.php/Home/UserManage/getPostUserList",   //请求后台的URL（*）
            method: 'get',      //请求方式（*）
            showExport: true,
            exportDataType: 'all',
            exportTypes:[ 'csv', 'txt', 'sql', 'doc', 'excel', 'xlsx', 'pdf'],
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
                width:80,
                title: '序号',
                formatter: function (value, row, index) {
                    return index+1;
                }
            }, {
                field: 'account',
                sortable: true,
                align: 'center',
                title: '用户名',
                formatter: "actionFormatter_account",
                width:190,
                events: "actionEvents",
            }, {
                field: 'type',
                sortable: true,
                align: 'center',
                title: '用户类型',
                formatter: "actionFormatter_type",
                width:190,
                events: "actionEvents",
            }, {
                field: 'user_name',
                sortable: true,
                align: 'center',
                title: '用户姓名',
                formatter: "actionFormatter_user_name",
                width:190,
                events: "actionEvents",
            }, {
                field: 'user_organ_code',
                sortable: true,
                align: 'center',
                title: '作业机构代码',
                formatter: "actionFormatter_user_organ_code",
                width:190,
                events: "actionEvents",
            }, {
                field: 'user_organ_name',
                sortable: true,
                align: 'center',
                title: '作业机构名称',
                formatter: "actionFormatter_user_organ_name",
                width:190,
                events: "actionEvents",
            }, {
                field: 'user_sex',
                sortable: true,
                align: 'center',
                title: '性别',
                formatter: "actionFormatter_user_sex",
                width:190,
                events: "actionEvents",
            }, {
                field: 'user_company',
                sortable: true,
                align: 'center',
                title: '所属公司',
                formatter: "actionFormatter_user_company",
                width:190,
                events: "actionEvents",
            }, {
                field: 'buss_area',
                sortable: true,
                align: 'center',
                title: '作业范围',
                formatter: "actionFormatter_buss_area",
                width:190,
                events: "actionEvents",
            }, {
                field: 'is_lock',
                sortable: true,
                align: 'center',
                title: '用户是否锁定',
                formatter: "actionFormatter_is_lock",
                width:190,
                events: "actionEvents",
            },  {
                field: 'is_add_data',
                sortable: true,
                align: 'center',
                title: '用户是否灌数',
                formatter: "actionFormatter_is_add_data",
                width:190,
                events: "actionEvents",
            },  {
                field: 'operation',
                title: '操作',
                align: 'center',
                formatter: "actionFormatter1",
                events: "actionEvents1",
                width:190,
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
    return '<input id="account'+ index+'" class="form-control" style="height: 20pt;width: 130pt" value="'+ value +'" disabled></input>';
}
function actionFormatter_type(value, row, index) {
    return '<input id="type'+ index+'" class="form-control user_input'+index +'" style="height: 20pt;width: 130pt" value="'+ value +'" disabled></input>';
}
function actionFormatter_user_name(value, row, index) {
    return '<input id="user_name'+ index+'" class="form-control user_input'+index +'" style="height: 20pt;width: 130pt" value="'+ value +'" disabled></input>';
}
function actionFormatter_user_organ_code(value, row, index) {
    return '<input id="user_organ_code' + index+'" class="form-control user_input'+index +'" style="height: 20pt;width: 130pt" value="'+ value +'" disabled></input>';
}
function actionFormatter_user_organ_name(value, row, index) {
    return '<input id="user_organ_name' + index+'" class="form-control user_input'+index +'" style="height: 20pt;width: 130pt" value="'+ value +'" disabled></input>';
}
function actionFormatter_user_sex(value, row, index) {
    return '<input id="user_sex' + index+'" class="form-control user_input'+index +'" style="height: 20pt;width: 130pt" value="'+ value +'" disabled></input>';
}
function actionFormatter_user_company(value, row, index) {
    return '<input id="user_company' + index+'" class="form-control user_input'+index +'" style="height: 20pt;width: 130pt" value="'+ value +'" disabled></input>';
}
function actionFormatter_buss_area(value, row, index) {
    return '<input id="buss_area' + index+'" class="form-control user_input'+index +'" style="height: 20pt;width: 130pt" value="'+ value +'" disabled></input>';
}
function actionFormatter_is_lock(value, row, index) {
    return '<input id="is_lock' + index+'" class="form-control user_input'+index +'" style="height: 20pt;width: 130pt" value="'+ value +'" disabled></input>';
}
function actionFormatter_is_add_data(value, row, index) {
    return '<input id="is_add_data' + index+'" class="form-control user_input'+index +'" style="height: 20pt;width: 130pt" value="'+ value +'" disabled></input>';
}


function actionFormatter1(value, row, index) {
    return '<div><button type="button" class="btn btn-primary lock" style="height: 20pt;width: 60pt"><span style="margin-left:-2pt;">解除锁定</span></button>'+'<button type="button" class="btn btn-primary modify" style="height: 20pt;width: 60pt;margin-left: 5pt"><span style="margin-left:-2pt;">提交修改</span></button></div>';
}

window.actionEvents = {
};

window.actionEvents1 = {
    'click .lock': function (e, value, row, index) {
        var type = $('#usertype').val();
        if(type!="1"){
            $(".user_input"+index).removeAttr("disabled");
            $("#type"+index).attr("disabled","disabled");
        }else{
            $(".user_input"+index).removeAttr("disabled");
        }
    },
    'click .modify': function (e, value, row, index) {
        // ajax提交数据
        if($(".user_input"+index).attr("disabled")){
            $.scojs_message('请解锁并修改信息后再提交！', $.scojs_message.TYPE_ERROR);
            return;
        }
        debugger;
        var user_account = $('#account'+index).val();
        var user_type = $('#type'+index).val();
        var user_name = $('#user_name'+index).val();
        var user_organ_code = $('#user_organ_code'+index).val();
        var user_organ_name = $('#user_organ_name'+index).val();
        var user_sex = $('#user_sex'+index).val();
        var buss_area = $('#buss_area'+index).val();
        var is_lock = $('#is_lock'+index).val();
        var is_add_data = $('#is_add_data'+index).val();
        if(user_account==row.account&&user_type==row.type&&user_name==row.user_name&&user_organ_code==row.user_organ_code&&user_organ_name==row.user_organ_name&&user_sex==row.user_sex&&buss_area==row.buss_area&&is_lock==row.is_lock&&is_add_data==row.is_add_data){
            $.scojs_message('未发生任何修改时请勿提交！', $.scojs_message.TYPE_ERROR);
            return;
        }
        var user_company = $('#user_company'+index).val();
        if (user_account == "" || user_type == "" || user_organ_code == "" || user_organ_name == "" || user_sex == "" || user_name == "" || buss_area == "" || user_company == "") {
            $.scojs_message('所修改用户信息不能为空！', $.scojs_message.TYPE_ERROR);
        }else if((is_lock!="是"&&is_lock!="否")||(is_add_data!="是"&&is_add_data!="否")){
            $.scojs_message('是否锁定及是否灌数只能填写是或否！', $.scojs_message.TYPE_ERROR);
        }else{
            if(is_lock=="是"){
                is_lock = 1;
            }else{
                is_lock = 0;
            }
            if(is_add_data=="是"){
                is_add_data = 1;
            }else{
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
                    user_sex:user_sex,
                    buss_area: buss_area,
                    is_lock: is_lock,
                    is_add_data: is_add_data,
                    user_company: user_company
                },
                success: function (result) {
                    if (result.status == 'success') {
                        debugger;
                        $.scojs_message(result.message, $.scojs_message.TYPE_OK);
                            $(".user_input"+index).attr("disabled",true);
                    } else if (result.status == 'failed') {
                        debugger;
                        $.scojs_message(result.message, $.scojs_message.TYPE_ERROR);
                    }},
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert(XMLHttpRequest);
                    alert(textStatus);
                    alert(errorThrown);
                }
            });
        }
    }
};

$('#new_user').click(function() {
    var user_type = $('#usertype').val();
    if(user_type!='1'){
        $.scojs_message('您不具有添加用户的权限，如需添加用户请联系管理员！', $.scojs_message.TYPE_ERROR);
        return;
    }
    var user_account = $('#user_account').val();
    var user_pass = $('#user_pass').val();
    debugger;
    user_pass = hex_md5(user_pass);
    debugger;
    var user_name = $('#user_name').val();
    var user_type = $('#user_type').val();
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

$('#modify_pass').click(function(){
    var modify_user_account = $('#modify_user_account').val();
    var modify_old_pass = $('#modify_old_pass').val();
    var modify_new_pass = $('#modify_new_pass').val();
    if(modify_user_account==""||modify_user_account==null){
        $.scojs_message("用户账户不能为空！", $.scojs_message.TYPE_ERROR);
        return;
    }
    if(modify_old_pass==""||modify_new_pass==""){
        $.scojs_message("请输入必填项后再进行提交！", $.scojs_message.TYPE_ERROR);
        return;
    }else if(modify_old_pass==modify_new_pass){
        $.scojs_message("新密码不可与原始密码相同！", $.scojs_message.TYPE_ERROR);
        return;
    }else{
        modify_new_pass = hex_md5(modify_new_pass);
        modify_old_pass = hex_md5(modify_old_pass);
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "index.php/Home/UserManage/modifyPass", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {
                modify_old_pass: modify_old_pass,
                modify_new_pass: modify_new_pass,
                modify_user_account:modify_user_account
            },
            success: function (result) {
                if (result.status == 'success') {
                    debugger;
                    $.scojs_message(result.message, $.scojs_message.TYPE_OK);
                    window.location.href = HOST + "index.php/Home/Index/index";
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

/**
 * Created by lawrance on 2017/1/11.
 */

$(function () {
    $('#user').attr('class', 'active');
    $('#user_sub').css('display', 'block');
    $('#qd_user_manager').attr('class', 'active');

    //1.初始化Table
    var oTable = new TableInit();
    oTable.Init();
//        $[sessionStorage] = oTable.queryParams;

    $('#modify_dg_user_organ_name').val($('#username').val());

    var type = $('#user_type').val();
    if(type==1){
        $('#modify_dg_user_organ_name').removeAttr("disabled");
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
            url: HOST + "index.php/Home/UserManage/getPostDgUserList",   //请求后台的URL（*）
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
                field: 'order_id',
                sortable: true,
                align: 'center',
                valign: 'middle',
                visible:false,
            },{
                field: 'ID',
                sortable: true,
                align: 'center',
                valign: 'middle',
                width:40,
                title: '序号',
                formatter: function (value, row, index) {
                    return index+1;
                }
            }, {
                field: 'dg_user_organ_name',
                sortable: true,
                align: 'center',
                title: '督管机构名称',
                formatter: "actionFormatter_dg_user_organ_name",
                width:190,
                valign: 'middle',
                events: "actionEvents",
            }, {
                field: 'dg_code',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '督管编码',
                formatter: "actionFormatter_dg_code",
                width:190,
                events: "actionEvents",
            }, {
                field: 'dg_user_organ_code',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '督管机构',
                formatter: "actionFormatter_dg_user_organ_code",
                width:190,
                events: "actionEvents",
            }, {
                field: 'dg_name',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '督管姓名',
                formatter: "actionFormatter_dg_name",
                width:190,
                events: "actionEvents",
            }, {
                field: 'yx_organ_code',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '营销管理机构代码',
                formatter: "actionFormatter_yx_organ_code",
                width:190,
                events: "actionEvents",
            }, {
                field: 'yx_organ_name',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '营销管理机构名称',
                formatter: "actionFormatter_yx_organ_name",
                width:190,
                events: "actionEvents",
            }, {
                field: 'yx_bu_code',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '营销部代码',
                formatter: "actionFormatter_yx_bu_code",
                width:190,
                events: "actionEvents",
            }, {
                field: 'yx_bu_name',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '营销部名称',
                formatter: "actionFormatter_yx_bu_name",
                width:190,
                events: "actionEvents",
            }, {
                field: 'yx_zu_code',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '营业组代码',
                formatter: "actionFormatter_yx_zu_code",
                width:190,
                events: "actionEvents",
            },  {
                field: 'yx_zu_name',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '营业组名称',
                formatter: "actionFormatter_yx_zu_name",
                width:190,
                events: "actionEvents",
            },  {
                field: 'operation',
                title: '操作',
                align: 'center',
                valign: 'middle',
                formatter: "actionFormatter1",
                events: "actionEvents1",
                width:300,
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


function actionFormatter_dg_user_organ_name(value, row, index) {
    return '<input id="dg_user_organ_name'+ index+'" class="form-control user_input'+index +'" style="height: 20pt;width: 130pt" value="'+ value +'" disabled></input>';
}
function actionFormatter_dg_code(value, row, index) {
    return '<input id="dg_code'+ index+'" class="form-control user_input'+index +'" style="height: 20pt;width: 130pt" value="'+ value +'" disabled></input>';
}
function actionFormatter_dg_user_organ_code(value, row, index) {
    return '<input id="dg_user_organ_code'+ index+'" class="form-control user_input'+index +'" style="height: 20pt;width: 130pt" value="'+ value +'" disabled></input>';
}
function actionFormatter_dg_name(value, row, index) {
    return '<input id="dg_name' + index+'" class="form-control user_input'+index +'" style="height: 20pt;width: 130pt" value="'+ value +'" disabled></input>';
}
function actionFormatter_yx_organ_code(value, row, index) {
    return '<input id="yx_organ_code' + index+'" class="form-control user_input'+index +'" style="height: 20pt;width: 130pt" value="'+ value +'" disabled></input>';
}
function actionFormatter_yx_organ_name(value, row, index) {
    return '<input id="yx_organ_name' + index+'" class="form-control user_input'+index +'" style="height: 20pt;width: 130pt" value="'+ value +'" disabled></input>';
}
function actionFormatter_yx_bu_code(value, row, index) {
    return '<input id="yx_bu_code' + index+'" class="form-control user_input'+index +'" style="height: 20pt;width: 130pt" value="'+ value +'" disabled></input>';
}
function actionFormatter_yx_bu_name(value, row, index) {
    return '<input id="yx_bu_name' + index+'" class="form-control user_input'+index +'" style="height: 20pt;width: 130pt" value="'+ value +'" disabled></input>';
}
function actionFormatter_yx_zu_code(value, row, index) {
    return '<input id="yx_zu_code' + index+'" class="form-control user_input'+index +'" style="height: 20pt;width: 130pt" value="'+ value +'" disabled></input>';
}
function actionFormatter_yx_zu_name(value, row, index) {
    return '<input id="yx_zu_name' + index+'" class="form-control user_input'+index +'" style="height: 20pt;width: 130pt" value="'+ value +'" disabled></input>';
}


function actionFormatter1(value, row, index) {
    return   '<div><button type="button" class="btn btn-primary modify" style="height: 20pt;width: 60pt;"><span style="margin-left:-2pt;">提交修改</span></button>'
        +'<button type="button" class="btn btn-success lock" style="height: 20pt;width: 60pt;margin-left: 5pt"><span style="margin-left:-2pt;">解除锁定</span></button>'
        +'<button type="button" class="btn btn-warning delete" style="height: 20pt;width: 60pt;margin-left: 5pt"><span style="margin-left:-2pt;">删除关系</span></button></div>';
}

window.actionEvents = {
};

window.actionEvents1 = {
    'click .delete': function (e, value, row, index) {
        //删除关系
        if($(".user_input"+index).attr("disabled")){
            $.scojs_message('请解锁后再删除！', $.scojs_message.TYPE_ERROR);
            return;
        }
        debugger;
        var dg_user_organ_name = $('#dg_user_organ_name'+ index).val();
        var dg_code = $('#dg_code'+ index).val();
        debugger;
        var dg_user_organ_code = $('#dg_user_organ_code'+ index).val();
        var dg_name = $('#dg_name'+ index).val();
        var yx_organ_code = $('#yx_organ_code'+ index).val();
        var yx_organ_name = $('#yx_organ_name'+ index).val();
        var yx_bu_code = $('#yx_bu_code'+ index).val();
        var yx_bu_name = $('#yx_bu_name'+ index).val();
        var yx_zu_code = $('#yx_zu_code'+ index).val();
        var yx_zu_name = $('#yx_zu_name'+ index).val();
            $.ajax({
                type: "POST", //用POST方式传输
                url: HOST + "index.php/Home/UserManage/postDeleteDgUser", //目标地址.
                dataType: "json", //数据格式:JSON
                data: {
                    dg_user_organ_name: dg_user_organ_name,
                    dg_code: dg_code,
                    dg_user_organ_code: dg_user_organ_code,
                    dg_name: dg_name,
                    yx_organ_code: yx_organ_code,
                    yx_organ_name: yx_organ_name,
                    yx_bu_code: yx_bu_code,
                    yx_bu_name: yx_bu_name,
                    yx_zu_code: yx_zu_code,
                    yx_zu_name: yx_zu_name
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
    },
    'click .lock': function (e, value, row, index) {
        $(".user_input"+index).removeAttr("disabled");
    },
    'click .modify': function (e, value, row, index) {
        // ajax提交数据
        if($(".user_input"+index).attr("disabled")){
            $.scojs_message('请解锁并修改信息后再提交！', $.scojs_message.TYPE_ERROR);
            return;
        }
        debugger;
        var dg_user_organ_name = check($('#dg_user_organ_name'+ index).val());
        var dg_code = check($('#dg_code'+ index).val());
        debugger;
        var dg_user_organ_code = check($('#dg_user_organ_code'+ index).val());
        var dg_name = check($('#dg_name'+ index).val());
        var yx_organ_code = check($('#yx_organ_code'+ index).val());
        var yx_organ_name = check($('#yx_organ_name'+ index).val());
        var yx_bu_code = check($('#yx_bu_code'+ index).val());
        var yx_bu_name = check($('#yx_bu_name'+ index).val());
        var yx_zu_code = check($('#yx_zu_code'+ index).val());
        var yx_zu_name = check($('#yx_zu_name'+ index).val());
        var id = row.order_id;
        if (dg_user_organ_name == "" || dg_code == "" || dg_user_organ_code == "" || dg_name == "" || yx_organ_code == "" || yx_organ_name == "" || yx_bu_code == "" || yx_bu_name == "") {
            $.scojs_message('必填项未输入完整，请确认输入后再提交添加用户信息！', $.scojs_message.TYPE_ERROR);
        } else {
            debugger;
            $.ajax({
                type: "POST", //用POST方式传输
                url: HOST + "index.php/Home/UserManage/postModifyDgUser", //目标地址.
                dataType: "json", //数据格式:JSON
                data: {
                    dg_user_organ_name: dg_user_organ_name,
                    dg_code: dg_code,
                    dg_user_organ_code: dg_user_organ_code,
                    dg_name: dg_name,
                    yx_organ_code: yx_organ_code,
                    yx_organ_name: yx_organ_name,
                    yx_bu_code: yx_bu_code,
                    yx_bu_name: yx_bu_name,
                    yx_zu_code: yx_zu_code,
                    yx_zu_name: yx_zu_name,
                    id:id
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

function check(a){
    if(a=='null'||a=='undefine'||a==null){
        return '';
    }else{
        return a;
    }
}

$('#new_user').click(function() {
    // var usertype = $('#user_type').val();
    // if(usertype!='1'){
    //     $.scojs_message('您不具有添加用户的权限，如需添加用户请联系管理员！', $.scojs_message.TYPE_ERROR);
    //     return;
    // }
    var dg_user_organ_name = check($('#dg_user_organ_name').val());
    var dg_code = check($('#dg_code').val());
    debugger;
    var dg_user_organ_code = check($('#dg_user_organ_code').val());
    var dg_name = check($('#dg_name').val());
    var yx_organ_code = check($('#yx_organ_code').val());
    var yx_organ_name = check($('#yx_organ_name').val());
    var yx_bu_code = check($('#yx_bu_code').val());
    var yx_bu_name = check($('#yx_bu_name').val());
    var yx_zu_code = check($('#yx_zu_code').val());
    var yx_zu_name = check($('#yx_zu_name').val());
    if (dg_user_organ_name == "" || dg_code == "" || dg_user_organ_code == "" || dg_name == "" || yx_organ_code == "" || yx_organ_name == "" || yx_bu_code == "" || yx_bu_name == "") {
        $.scojs_message('所有信息均为必填，请确认输入后再提交添加用户信息！', $.scojs_message.TYPE_ERROR);
    } else {
        debugger;
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "index.php/Home/UserManage/postAddDgUser", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {
                dg_user_organ_name: dg_user_organ_name,
                dg_code: dg_code,
                dg_user_organ_code: dg_user_organ_code,
                dg_name: dg_name,
                yx_organ_code: yx_organ_code,
                yx_organ_name: yx_organ_name,
                yx_bu_code: yx_bu_code,
                yx_bu_name: yx_bu_name,
                yx_zu_code: yx_zu_code,
                yx_zu_name: yx_zu_name
            },
            success: function (result) {
                if (result.status == 'success') {
                    debugger;
                    $.scojs_message(result.message, $.scojs_message.TYPE_OK);
                    $('.add_user').val("");
                    $('#user_list_table').bootstrapTable('refresh', {url: HOST + "index.php/Home/UserManage/getPostDgUserList"});
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
    var modify_dg_user_organ_name = $('#modify_dg_user_organ_name').val();
    var modify_old_pass = $('#modify_old_pass').val();
    var modify_new_pass = $('#modify_new_pass').val();
    if(modify_dg_user_organ_name==""||modify_dg_user_organ_name==null){
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
                modify_dg_user_organ_name:modify_dg_user_organ_name
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

/**
 * Created by lawrance on 2017/1/11.
 */

$(function () {

    $('#data_edit').attr('class', 'active');
    $('#data_edit_apply').css('display', 'block');
    $('#data_edit_apply_delete').attr('class', 'active');


    //1.初始化Table
    var oTable = new TableInit();
    oTable.Init();
//        $[sessionStorage] = oTable.queryParams;

    //2.初始化Button的点击事件
    var oButtonInit = new ButtonInit();
    oButtonInit.Init();



});

var TableInit = function () {
    // countFooter =  function(v){
    //     var count = 0;
    //     for (var i in v) {
    //         if(v[i]['org']=='小计'){
    //             continue;
    //         }
    //         count += v[i][this.field];
    //     }
    //     return count+'';
    // };
    var oTableInit = new Object();
    //初始化Table
    oTableInit.Init = function () {
        $('#delete_apply_table').bootstrapTable({
            url: HOST + "index.php/Home/DataApply/getDataApply",   //请求后台的URL（*）
            method: 'get',      //请求方式（*）
            cache: false,      //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
            showExport: true,
            exportDataType: 'all',
            exportTypes:[ 'csv', 'txt', 'sql', 'doc', 'excel', 'xlsx', 'pdf'],
            // toolbar: '#toolbar',    //工具按钮用哪个容器
            striped: true,      //是否显示行间隔色
            pagination: true,     //是否显示分页（*）
            sortable: true,      //是否启用排序
            sortName: 'ID', // 设置默认排序为 name
            sortOrder: 'asc', // 设置排序为正序 asc
            queryParams: oTableInit.queryParams,//传递参数（*）
//                sidePagination: "server",   //分页方式：client客户端分页，server服务端分页（*）
            pageNumber: 1,      //初始化加载第一页，默认第一页
            pageSize: 8,      //每页的记录行数（*）
            pageList: [10,15,25,30,50,100],
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
                valign: 'middle',
                title: '序号',
                width:40,
                formatter: function (value, row, index) {
                    return index+1;
                }
            }, {
                field: 'BUSINESS_CODE',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '关键业务号',
                width:140
            }, {
                field: 'POLICY_CODE',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '保单号',
                width:140
            }, {
                field: 'USER_ACCOUNT',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '用户账号',
                width:130
            }, {
                field: 'USER_NAME',
                sortable: true,
                valign: 'middle',
                align: 'center',
                title: '用户姓名',
                width:130
            },{
                field: 'DELETE_REASON',
                sortable: true,
                align: 'center',
                valign: 'middle',
                formatter: "actionFormatter_apply_reason",
                events: "actionEvents_apply_reason",
                title: '删除原因',
                width:130
            }, {
                field: 'PASS_REASON',
                sortable: true,
                valign: 'middle',
                align: 'center',
                formatter: "actionFormatter_pass_reason",
                events: "actionEvents_pass_reason",
                title: '通过原因',
                width:230
            },{
                field: 'NO_PASS_REASON',
                title: '不通过原因',
                align: 'center',
                valign: 'middle',
                formatter: "actionFormatter_reason",
                events: "actionEvents_reason",
                width:230,
                clickToSelect: false
            }, {
                title: '审核操作',
                align: 'center',
                valign: 'middle',
                formatter: "actionFormatter_review",
                events: "actionEvents_review",
                width:260,
                clickToSelect: false
            },{
                title: '删除操作',
                align: 'center',
                sortable: true,
                valign: 'middle',
                formatter: "actionFormatter_delete",
                events: "actionEvents_delete",
                width:260,
                clickToSelect: false
            },{
                field: 'IS_DELETE_SYS',
                sortable: true,
                align: 'center',
                visible:false,
                title: '-',
                width:120,
            },{
                field: 'IS_DELETE_WORK',
                sortable: true,
                align: 'center',
                visible:false,
                title: '-',
                width:120,
            },{
                field: 'IS_REVIEW_PASS',
                sortable: true,
                align: 'center',
                visible:false,
                title: '-',
                width:120,
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

function actionFormatter(value, row, index) {
    if(row.tc_id != "-"||row.is_accordance=='是'||row.is_submit=='1'){
        return '-';
    }else{
        return '<button type="button" class="btn btn-primary sub_des" style="height: 20pt;width: 55pt"><span style="margin-left:-5pt">提交说明</span></button>';
    }
}

window.actionEvents = {
    'click .sub_des': function (e, value, row, index) {
        // ajax提交数据
        // var link_business = $("#business"+index).val();
        var description = $("#des"+index).val();//原因说明
        debugger;
        if(description==''||description==null||description=='null'){
            $.scojs_message('请输入差异原因后在提交说明！', $.scojs_message.TYPE_ERROR);
            return;
        }
        var business_node = row.business_node;
        var business_code = row.old_policy_code;
        var policy_code = row.old_policy_code;
        var busi_insert_date = row.busi_insert_date;
        var username = $("#username").text();
            $.ajax({
                type: "POST", //用POST方式传输
                url: HOST + "index.php/Home/BxWorkDefine/updateReason", //目标地址.
                dataType: "json", //数据格式:JSON
                data: {username: username, business_code: business_code, policy_code: policy_code, business_node:business_node,insert_date:busi_insert_date,description:description},
                success: function (result) {
                    if (result.status == 'success') {
                        debugger;
                        //单行刷新数据
                        var sysDate = new Date().getFullYear()+'-'+(new Date().getMonth()+1) +'-'+new Date().getDate();
                        var data = { "hd_user_name" : username, "sys_insert_date" :sysDate ,"description":description,"is_submit":"1"};
                        $('#daily_report2').bootstrapTable('updateRow', {index: index, row: data});
                        $.scojs_message(result.message, $.scojs_message.TYPE_OK);
                    } else if (result.status == 'failed') {
                        debugger;
                        $.scojs_message(result.message, $.scojs_message.TYPE_ERROR);
                        if(result.lock == 'true'){
                            window.location.href = HOST + "index.php/Home/Index/index";
                        }
                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert(XMLHttpRequest);
                    alert(textStatus);
                    alert(errorThrown);
                }
            });
    }
};

function actionFormatter_result(value, row, index) {
    if(row.tc_id != "-"||row.is_accordance=='是'||row.is_review == '1'){
        return '完成';
    }else{
        return '未完成';
    }
}

//审核不通过原因
function actionFormatter_reason(value, row, index) {
    var is_reviewer = $('#is_delete_reviewer').text();
    if(row.IS_REVIEW_PASS == "1"){
        if(row.NO_PASS_REASON != '' && row.NO_PASS_REASON != null){
            return row.NO_PASS_REASON;
        }else{
            return '-';
        }
    }else{
        return '<textarea id="no_pass_reason'+index+'" class="form-control" style="height: 40pt;width: 160pt;">'+ row.NO_PASS_REASON +'</textarea>';
    }
}

//通过原因
function actionFormatter_pass_reason(value, row, index) {
    var is_reviewer = $('#is_delete_reviewer').text();
    if(row.IS_REVIEW_PASS == "1"){
        if(row.PASS_REASON != '' && row.PASS_REASON != null){
            return row.PASS_REASON;
        }else{
            return '-';
        }
    }else{
        return '<textarea id="pass_reason'+index+'" class="form-control" style="height: 40pt;width: 160pt;">'+ row.PASS_REASON +'</textarea>';
    }
}


//审核操作
function actionFormatter_review(value, row, index){
    var is_reviewer = $('#is_delete_reviewer').text();
    if(is_reviewer == 0){
        return '无权限审核';
    }else if(row.IS_REVIEW_PASS == '1'){
        return '已审核完成';
    }else if(row.IS_REVIEW_PASS == '0'){
        return '<button type="button" class="btn btn-primary pass_right" style="height: 20pt;width: 80pt"><span style="margin-left:-5pt;">通过</span></button>' +
            '<button type="button" class="btn btn-danger no_pass" style="height: 20pt;width: 80pt;margin-left: 5pt"><span style="margin-left:5pt;">不通过</span></button>';
    }
}


//申请原因处理
function actionFormatter_apply_reason(value, row, index){
    return row.DELETE_REASON;
    // if(row.IS_REVIEW_PASS == '0'){
    //     return '<textarea id="apply_reason'+index+'" class="form-control" style="height: 40pt;width: 160pt;">'+ row.DELETE_REASON +'</textarea>';
    // }
}

//删除操作
function actionFormatter_delete(value, row, index){
    var is_sys_delete = $('#is_sys_delete').text();
    var is_work_delete = $('#is_work_delete').text();
    var out = '';
    if(row.NO_PASS_REASON!='null'&&row.NO_PASS_REASON!=''&&row.NO_PASS_REASON!=null){
        return '审核不通过';
    }
    if(is_sys_delete == '0'&&is_work_delete=='0'){
        return '无权限确认删除';
    }else if(is_work_delete == '1'&&row.IS_DELETE_WORK == '0'&&row.IS_REVIEW_PASS == '1'){
        out += '<button type="button" class="btn btn-primary delete_work" style="height: 20pt;width: 110pt"><span style="margin-left:-;">确认工作流删除</span></button>';
    }
    if(is_sys_delete == '1'&&row.IS_DELETE_SYS == '0'&&row.IS_REVIEW_PASS == '1'){
        out += '<button type="button" class="btn btn-danger delete_sys" style="height: 20pt;width: 110pt;margin-top: 5pt"><span style="margin-left:3pt;">确认子系统删除</span></button>';
    }
    if(row.IS_DELETE_WORK == '1'&&row.IS_DELETE_SYS == '1'){
        out = '已成功删除';
    }
    return out;
}

window.actionEvents_review = {
    'click .no_pass': function (e, value, row, index) {
        var no_pass_reason = $("#no_pass_reason"+index).val();//不通过原因说明
        var business_code = row.BUSINESS_CODE;
        var policy_code = row.POLICY_CODE;
        if(no_pass_reason==''||no_pass_reason==null||no_pass_reason=='null'){
            $.scojs_message('审核结果为不通过时，需输入审核不通过原因！！', $.scojs_message.TYPE_ERROR);
            return;
        }
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "index.php/Home/DataApply/updateDeleteApply", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {
                    type:'no_pass',
                    business_code: business_code,
                    policy_code: policy_code,
                    no_pass_reason:no_pass_reason},
            success: function (result) {
                if (result.status == 'success') {
                    debugger;
                    //单行刷新数据
                    var data = { "NO_PASS_REASON":no_pass_reason,"IS_REVIEW_PASS":'0'};
                    $('#daily_report2').bootstrapTable('updateRow', {index: index, row: data});
                    $.scojs_message(result.message, $.scojs_message.TYPE_OK);
                } else if (result.status == 'failed') {
                    debugger;
                    $.scojs_message(result.message, $.scojs_message.TYPE_ERROR);
                    if(result.lock == 'true'){
                        window.location.href = HOST + "index.php/Home/Index/index";
                    }
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert(XMLHttpRequest);
                alert(textStatus);
                alert(errorThrown);
            }
        });
    },
    'click .pass_right': function (e, value, row, index) {
        var pass_reason = $("#pass_reason"+index).val();//不通过原因说明
        var business_code = row.BUSINESS_CODE;
        var policy_code = row.POLICY_CODE;
        if(pass_reason==''||pass_reason==null||pass_reason=='null'){
            $.scojs_message('审核结果为通过时，需输入审核通过原因！！', $.scojs_message.TYPE_ERROR);
            return;
        }
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "index.php/Home/DataApply/updateDeleteApply", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {
                    type:'pass',
                    business_code: business_code,
                    policy_code: policy_code,
                    pass_reason:pass_reason
            },
            success: function (result) {
                if (result.status == 'success') {
                    debugger;
                    //单行刷新数据
                    var data = { "PASS_REASON":pass_reason,"IS_REVIEW_PASS":'1'};
                    $('#daily_report2').bootstrapTable('updateRow', {index: index, row: data});
                    $.scojs_message(result.message, $.scojs_message.TYPE_OK);
                } else if (result.status == 'failed') {
                    debugger;
                    $.scojs_message(result.message, $.scojs_message.TYPE_ERROR);
                    if(result.lock == 'true'){
                        window.location.href = HOST + "index.php/Home/Index/index";
                    }
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert(XMLHttpRequest);
                alert(textStatus);
                alert(errorThrown);
            }
        });
    }

};

window.actionEvents_delete = {
    'click .delete_work': function (e, value, row, index) {
        var business_code = row.BUSINESS_CODE;
        var policy_code = row.POLICY_CODE;
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "index.php/Home/DataApply/updateDeleteApply", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {
                type:'delete_work',
                business_code: business_code,
                policy_code: policy_code},
                success: function (result) {
                if (result.status == 'success') {
                    debugger;
                    //单行刷新数据
                    var data = { "IS_DELETE_WORK":'1'};
                    $('#daily_report2').bootstrapTable('updateRow', {index: index, row: data});
                    $.scojs_message(result.message, $.scojs_message.TYPE_OK);
                } else if (result.status == 'failed') {
                    debugger;
                    $.scojs_message(result.message, $.scojs_message.TYPE_ERROR);
                    if(result.lock == 'true'){
                        window.location.href = HOST + "index.php/Home/Index/index";
                    }
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert(XMLHttpRequest);
                alert(textStatus);
                alert(errorThrown);
            }
        });
    },
    'click .delete_sys': function (e, value, row, index) {
        var business_code = row.BUSINESS_CODE;
        var policy_code = row.POLICY_CODE;
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "index.php/Home/DataApply/updateDeleteApply", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {
                type:'delete_sys',
                business_code: business_code,
                policy_code: policy_code
            },
            success: function (result) {
                if (result.status == 'success') {
                    debugger;
                    //单行刷新数据
                    var data = {"IS_DELETE_SYS":'1'};
                    $('#daily_report2').bootstrapTable('updateRow', {index: index, row: data});
                    $.scojs_message(result.message, $.scojs_message.TYPE_OK);
                } else if (result.status == 'failed') {
                    debugger;
                    $.scojs_message(result.message, $.scojs_message.TYPE_ERROR);
                    if(result.lock == 'true'){
                        window.location.href = HOST + "index.php/Home/Index/index";
                    }
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert(XMLHttpRequest);
                alert(textStatus);
                alert(errorThrown);
            }
        });
    }

};

//审核结论-通过不通过
function actionFormatter_conclusion(value, row, index){
    if(row.tc_id != "-"||row.is_accordance=='是'){
        return '-';
    }
    if(row.is_pass == '1'){//存储在核对结果表result字段中
        return '审核通过';
    }else if(row.is_submit == '1'&&row.is_review=='0'){
        return '<span style="color:rgba(44,173,164,0.72);"><strong>已提交申请</strong></span>';
    }else if(row.is_pass == '0'&&row.no_pass_reason!=null&&row.no_pass_reason!='-'){
        return '<span style="color:red;font-size: larger"><strong>审核不通过</strong></span>';
    }else if(row.is_submit == '0'){
        return '<span style="color:rgba(247,215,64,0.97);"><strong>未提交申请</strong></span>';
        return '未审核';
    }
    //不通过后还可继续点击，通过后将隐藏不可点击
}

window.actionEvents_business = {
    'click .modify': function (e, value, row, index) {
    }
};


function actionFormatter_des(value, row, index) {
    if(row.tc_id != "-"||row.is_accordance=='是'){
        return row.description;//'<textarea id="des'+index+'" class="form-control modify" style="height: 40pt;width: 160pt" disabled placeholder="'+ row.description +'"></textarea>';
    }else if(row.is_submit == '1'){//审核通过时不可修改
        return row.description;
    }else if(row.description == '-'){ //
        return '<textarea id="des'+index+'" class="form-control modify" style="height: 40pt;width: 160pt"  placeholder="请输入差异原因"></textarea>';
    }else{
        return '<textarea id="des'+index+'" class="form-control modify" style="height: 40pt;width: 160pt" >'+ row.description +'</textarea>';
    }
}

window.actionEvents_des = {
    'click .modify': function (e, value, row, index) {
    }
};



$('#delete_apply_submit').click(function() {
    //加载TC原因
    var is_delete_reviewer = $('#is_delete_reviewer').text();
    var is_delete_apply = $('#is_delete_apply').text();
    var policy_code = $('#policy_code').val();
    var business_code = $('#business_code').val();
    var delete_reason = $('#delete_reason').val();
    var user_account = $('#user_name').text();
    var user_name = $('#username_chinese').text();
    debugger;
    if(is_delete_apply!='1'){
        $.scojs_message('您没有提交申请权限！', $.scojs_message.TYPE_ERROR);
        return;
    } else {
        if(policy_code==''||business_code==''||delete_reason==''){
            $.scojs_message('请输入相关信息后提交！', $.scojs_message.TYPE_ERROR);
            return;
        }
        debugger;
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "index.php/Home/DataApply/addDataApply", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {
                policy_code: policy_code,
                user_account: user_account,
                delete_reason: delete_reason,
                user_name: user_name,
                business_code:business_code
            },
            success: function (result) {
                if (result.status == 'success') {
                    debugger;
                    $.scojs_message(result.message, $.scojs_message.TYPE_OK);
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
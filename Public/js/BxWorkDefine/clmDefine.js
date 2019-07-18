/**
 * Created by lawrance on 2017/1/11.
 */

$(function () {

    $('#home').attr('class','active');
    $('#data_ub').css('display','block');
    $('#bx_clm_define').attr('class','active');

    $('#form_date1').datetimepicker({
        language:  'zh-CN',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    }).on('changeDate', function(ev){
        // if($('#dtp_input3').val()==null||$('#dtp_input3').val()==''||$('#dtp_input3').val()=='undefined'){
        //     // $.scojs_message('此次查询为单日查询！', $.scojs_message.TYPE_ERROR);
        // }
        $('#daily_report2').bootstrapTable('removeAll');
        $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/BxWorkDefine/getClmDefine?queryDateStart="+$('#dtp_input2').val()+"&queryDateEnd="+$('#dtp_input3').val()});
    });

    $('#form_date2').datetimepicker({
        language:  'zh-CN',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    }).on('changeDate', function(ev){
        if($('#dtp_input2').val()==null||$('#dtp_input2').val()==''||$('#dtp_input2').val()=='undefined'){
            $.scojs_message('请输入区间查询起始日期！', $.scojs_message.TYPE_ERROR);
            return;
        }
    $('#daily_report2').bootstrapTable('removeAll');
        $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/BxWorkDefine/getClmDefine?queryDateStart="+$('#dtp_input2').val()+"&queryDateEnd="+$('#dtp_input3').val()});
    });

    //1.初始化Table
    var oTable = new TableInit();
    oTable.Init();
//        $[sessionStorage] = oTable.queryParams;

    //2.初始化Button的点击事件
    var oButtonInit = new ButtonInit();
    oButtonInit.Init();

    $('input').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
        increaseArea: '2%' // optional
    });


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
        $('#daily_report2').bootstrapTable({
            url: HOST + "index.php/Home/BxWorkDefine/getClmDefine",   //请求后台的URL（*）
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
            pageSize: 6,      //每页的记录行数（*）
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
                field: 'old_organ_code',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '老核心管理机构',
                width:130
            }, {
                field: 'new_organ_code',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '新核心管理机构',
                width:130
            }, {
                field: 'old_user_name',
                sortable: true,
                valign: 'middle',
                align: 'center',
                title: '老核心操作员',
                width:130
            }, {
                field: 'new_user_name',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '新核心操作员',
                width:130
            },  {
                field: 'old_organ_name',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '老核心机构名称',
                width:130
            }, {
                field: 'old_insert_time',
                sortable: true,
                valign: 'middle',
                align: 'center',
                title: '老核心作业时间',
                width:130
            }, {
                field: 'old_case_no',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '老核心赔案号',
                width:150
            }, {
                field: 'new_case_no',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '新核心赔案号',
                width:150
            }, {
                field: 'old_get_money',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '老核心金额',
                width:150
            }, {
                field: 'new_get_money',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '新核心金额',
                width:150
            },  {
                field: 'business_name',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '业务节点',
                width:120
            }, {
                field: 'is_accordance',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '是否一致',
                width:100
            },{
                field: 'tc_id',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '缺陷号',
                width:150
            },{
                field: 'status',
                align: 'center',
                valign: 'middle',
                title: '解决进度',
                sortable: true,
                width:200
                // formatter: "actionFormatter_status",
                // events: "actionEvents_status",
            }, {
                field: 'result',
                align: 'center',
                valign: 'middle',
                sortable: true,
                title: '核对进度',
                width:100,
                formatter: "actionFormatter_result",
                events: "actionEvents_result",
            },{
                field: 'hd_user_name',
                align: 'center',
                valign: 'middle',
                title: '核对人',
                sortable: true,
                width:140
                // formatter: "actionFormatter_hd_user",
                // events: "actionEvents_hd_user",
            },{
                field: 'sys_insert_date',
                align: 'center',
                valign: 'middle',
                title: '核对日期',
                sortable: true,
                width:100
                // formatter: "actionFormatter_in_date",
                // events: "actionEvents_in_date",
            },{
                field: 'description',
                align: 'center',
                valign: 'middle',
                title: '原因说明',
                width:230,
                formatter: "actionFormatter_des",
                events: "actionEvents_des",
            },{
                field: 'operation',
                title: '操作',
                align: 'center',
                valign: 'middle',
                formatter: "actionFormatter",
                events: "actionEvents",
                width:100,
                clickToSelect: false
            },{
                field: 'operation_back',
                title: '回退操作',
                align: 'center',
                valign: 'middle',
                formatter: "actionFormatter_back",
                events: "actionEvents_back",
                width:100,
                clickToSelect: false
            },{
                field: 'review_conclusion',
                title: '审核结论',
                align: 'center',
                valign: 'middle',
                formatter: "actionFormatter_conclusion",
                events: "actionEvents_conclusion",
                width:100,
                clickToSelect: false
            },{
                field: 'review_conclusion',
                title: '审核结论',
                align: 'center',
                valign: 'middle',
                formatter: "actionFormatter_conclusion",
                events: "actionEvents_conclusion",
                width:100,
                clickToSelect: false
            },{
                field: 'review_type',
                title: '审核操作',
                align: 'center',
                valign: 'middle',
                formatter: "actionFormatter_review",
                events: "actionEvents_review",
                width:260,
                clickToSelect: false
            },{
                field: 'no_pass_reason',
                title: '审核原因',
                align: 'center',
                valign: 'middle',
                formatter: "actionFormatter_reason",
                events: "actionEvents_reason",
                width:230,
                clickToSelect: false
            },{
                field: 'sys_result',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '审核结论',
                width:120,
            },{
                field: 'busi_insert_date',
                sortable: true,
                align: 'center',
                visible:false,
                title: '-',
                width:120,
            },{
                field: 'is_submit',
                sortable: true,
                align: 'center',
                visible:false,
                title: '-',
                width:120,
            },{
                field: 'is_review',
                sortable: true,
                align: 'center',
                visible:false,
                title: '-',
                width:120,
            },{
                field: 'is_pass',
                sortable: true,
                align: 'center',
                visible:false,
                title: '-',
                width:120,
            },{
                field: 'business_node',
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


function actionFormatter_back(value, row, index) {
    var is_back_user = $('#is_back_user').text();
    if(is_back_user != "1" || row.is_submit!= '1'|| row.is_review != '1' || row.is_pass !='1'){
        return '-';
    }else{
        return '<button type="button" class="btn btn-danger back" style="height: 20pt;width: 55pt"><span style="margin-left:-5pt">退回重审</span></button>';
    }
}

window.actionEvents_back = {
    'click .back': function (e, value, row, index) {
        var business_node = row.business_node;
        var business_code = row.old_case_no;
        var policy_code = row.old_case_no;
        var busi_insert_date = row.busi_insert_date;
        var username = $("#username").text();
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "index.php/Home/BxWorkDefine/updateBackReview", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {username: username, business_code: business_code, policy_code: policy_code, business_node:business_node,insert_date:busi_insert_date},
            success: function (result) {
                if (result.status == 'success') {
                    debugger;
                    //单行刷新数据
                    var sysDate = new Date().getFullYear()+'-'+(new Date().getMonth()+1) +'-'+new Date().getDate();
                    var data = { "is_pass":"0","is_review":"0"};
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
        if(description==''||description==null){
            $.scojs_message('请输入差异原因后在提交说明！', $.scojs_message.TYPE_ERROR);
            return;
        }
        var business_node = row.business_node;
        var business_code = row.old_case_no;
        var policy_code = row.old_case_no;
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

//审核原因
function actionFormatter_reason(value, row, index) {
    var is_reviewer = $('#is_reviewer').text();
    if(row.tc_id != "-"||row.is_accordance=='是'){
        return '-';
    }
    if(row.is_pass == "1"){
        return row.no_pass_reason;
    }else if(row.is_submit == '0'&&row.no_pass_reason!='-'){
        return '<span style="color:red;font-size: larger"><strong>'+row.no_pass_reason+'</strong></span>';
    }else if(is_reviewer==0&&row.is_submit == '1'){
        return '<span style="color:rgba(44,173,164,0.72);"><strong>请等待后台管理员审核结论</strong></span>';
    }else if(is_reviewer==0&&row.is_submit == '0'){
        return '-';
    }else if(row.no_pass_reason == '-'||row.no_pass_reason == null){
        return '<textarea id="reason'+index+'" class="form-control" style="height: 40pt;width: 160pt;" placeholder="请输入审核不通过原因"></textarea>';
    }else{
        return '<textarea id="reason'+index+'" class="form-control" style="height: 40pt;width: 160pt;">'+ row.no_pass_reason +'</textarea>';
    }
}


//审核操作
function actionFormatter_review(value, row, index){
    var is_reviewer = $('#is_reviewer').text();
    if(row.tc_id != "-"||row.is_accordance=='是'){
        return '-';
    }
    if(is_reviewer == 0){
        return '无权限审核';
    }else if(row.is_pass == '1'||row.is_review == '1'){
        return '已审核通过';
    }else if(row.is_submit=='0'){
        return '待操作员提交';
    }else if(is_reviewer == 1){
        return '<button type="button" class="btn btn-primary pass_right" style="height: 20pt;width: 80pt"><span style="margin-left:-5pt;">通过-系统正确</span></button>' +
            '<button type="button" class="btn btn-warning pass_error" style="height: 20pt;width: 80pt;margin-left: 5pt"><span style="margin-left:-5pt;">通过-系统错误</span></button>' +
            '<button type="button" class="btn btn-danger no_pass" style="height: 20pt;width: 80pt;margin-top: 5pt"><span style="margin-left:-5pt;">不通过</span></button>';
    }
    //不通过后还可继续点击，不通过原因存储在表TMP_BX_DAYPOST_DESCRIPTION-pass_reason
    //
    // 通过后将隐藏不可点击
}

window.actionEvents_review = {
    'click .no_pass': function (e, value, row, index) {
        var no_pass_reason = $("#reason"+index).val();//不通过原因说明
        var business_node = row.business_node;
        var business_code = row.old_case_no;
        var policy_code = row.old_case_no;
        var busi_insert_date = row.busi_insert_date;
        var username = $("#username").text();
        if(no_pass_reason==''||no_pass_reason==null){
            $.scojs_message('审核结果为不通过时，需输入审核不通过原因！！', $.scojs_message.TYPE_ERROR);
            return;
        }
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "index.php/Home/BxWorkDefine/updateReason", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {username: username, business_code: business_code, policy_code: policy_code, business_node:business_node,insert_date:busi_insert_date,no_pass_reason:no_pass_reason},
            success: function (result) {
                if (result.status == 'success') {
                    debugger;
                    //单行刷新数据
                    var ling = '0';
                    var sysDate = new Date().getFullYear()+'-'+(new Date().getMonth()+1) +'-'+new Date().getDate();
                    var data = { "no_pass_reason":no_pass_reason,"is_pass":ling,"is_submit":ling,"is_review":ling};
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
    'click .pass_error': function (e, value, row, index) {
        var business_node = row.business_node;
        var business_code = row.old_case_no;
        var policy_code = row.old_case_no;
        var busi_insert_date = row.busi_insert_date;
        var username = $("#username").text();
        var result = '错误';
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "index.php/Home/BxWorkDefine/updateReason", //目标地址.
            dataType: "json", //数据格式:JSON
            //针对于未提交缺陷的系统错误
            data: {username: username, business_code: business_code, policy_code: policy_code, business_node:business_node,insert_date:busi_insert_date,result:result},
            success: function (result) {
                if (result.status == 'success') {
                    debugger;
                    //单行刷新数据
                    var yi = '1';
                    var sysDate = new Date().getFullYear()+'-'+(new Date().getMonth()+1) +'-'+new Date().getDate();
                    var data = { "is_pass":yi,"is_submit":yi,"is_review":yi};
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
        var business_node = row.business_node;
        var business_code = row.old_case_no;
        var policy_code = row.old_case_no;
        var busi_insert_date = row.busi_insert_date;
        var username = $("#username").text();
        var result = '正确';
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "index.php/Home/BxWorkDefine/updateReason", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {
                    username: username,
                    business_code: business_code,
                    policy_code: policy_code,
                    business_node:business_node,
                    insert_date:busi_insert_date,
                    result:result
            },
            success: function (result) {
                if (result.status == 'success') {
                    debugger;
                    var yi = '1';
                    //单行刷新数据
                    var sysDate = new Date().getFullYear()+'-'+(new Date().getMonth()+1) +'-'+new Date().getDate();
                    var data = { "is_pass":yi,"is_submit":yi,"is_review":yi};
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
    }else{
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
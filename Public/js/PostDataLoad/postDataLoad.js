/**
 * Created by lawrance on 2017/1/11.
 */

$(function () {
    var user_type = $('#usertype').val();
    if(user_type!='1'){
        $('#tc_data_load_exec').hide();
    }else{
        $('#tc_data_load_exec').show();
    }
    $('#course').attr('class', 'active');
    $('#course_sub').css('display', 'block');
    $('#course_info').attr('class', 'active');

    // $('#loadProcess').modal('show');
    //1.初始化Table
    var oTable = new TableInit();
    oTable.Init();
//        $[sessionStorage] = oTable.queryParams;

    // startWithNotice();
    //2.初始化Button的点击事件
    // var oButtonInit = new ButtonInit();
    // oButtonInit.Init();

    // $('#loadProcess').modal('hide');

});

// function longPolling() {
//     // alert(Date.parse(new Date())/1000);
//     $.ajax({
//         type: "POST", //用POST方式传输
//         url: HOST + "index.php/Home/Method/getNotice",
//         dataType: "json",
//         timeout: 5000,//5秒超时，可自定义设置
//         error: function (XMLHttpRequest, textStatus, errorThrown) {
//             // $("#state").append("[state: " + textStatus + ", error: " + errorThrown + " ]<br/>");
//             longPolling();
//         },
//         success: function (result) {
//             // $("#state").append("[state: " + textStatus + ", data: { " + data + "} ]<br/>");
//             if (result.status == "success") { // 请求成功
//                 $.scojs_message(result.message, $.scojs_message.TYPE_ERROR);
//                 longPolling();
//             }
//         }
//     });
// }

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
            url: HOST + "index.php/Home/RequestPostDataLoad/getRequestList",   //请求后台的URL（*）
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
                field: 'request_account',
                sortable: true,
                align: 'center',
                title: '申请人',
                width:120,
            }, {
                field: 'request_type',//TC-1 业务-0
                sortable: true,
                align: 'center',
                title: '请求内容',
                width:120
            }, {
                field: 'reason',
                sortable: true,
                align: 'center',
                title: '申请原因',
                width:120
            }, {
                field: 'data_type',
                sortable: true,
                align: 'center',
                title: '数据分类',
                width:120
            }, {
                field: 'with_tc',
                sortable: true,
                align: 'center',
                title: '是否同时加载TC',
                width:140
            }, {
                field: 'check_account',
                sortable: true,
                align: 'center',
                title: '审核人',
                width:120
            },{
                field: 'is_finish',
                sortable: true,
                align: 'center',
                title: '是否完成',//0-未完成  1-完成
                width:120,
            },{
                field: 'exec_account',
                sortable: true,
                align: 'center',
                title: '执行人',
                width:120,
            },  {
                field: 'is_notice',
                sortable: true,
                align: 'center',
                title: '是否通知',
                width:120,
            }, {
                field: 'time',
                sortable: true,
                align: 'center',
                title: '请求时间',
                width:190,
            }, {
                field: 'type',
                sortable: true,
                align: 'center',
                visible:false,
                title: '-',
                width:120,
            }, {
                field: 'no_pass_reason',//有原因即不通过
                sortable: true,
                align: 'center',
                title: '审核不通过原因',
                formatter: "actionFormatter_no_pass",
                width:220,
                events: "actionEvents_no_pass",
            },  {
                field: 'operation',
                title: '操作',
                align: 'center',
                formatter: "actionFormatter",
                events: "actionEvents",
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

function actionFormatter_no_pass(value, row, index) {
    var valueShow = '';
    if(row.no_pass_reason==""||row.no_pass_reason=="undefined"||row.no_pass_reason==null){
        valueShow = ' placeholder="输入1通过，不通过时写原因" ';
    }else{
        valueShow = ' value="'+ row.no_pass_reason +'" ';
    }
    if(row.type!="1"||row.check_account!=null||(row.no_pass_reason!=""&&row.no_pass_reason!="undefined"&&row.no_pass_reason!=null)){
        return '<input id="nopass'+ index+'" class="form-control nopass" style="height: 20pt;width: 150pt;" disabled '+valueShow+'/>';
    }else{
        return '<input id="nopass'+ index+'" class="form-control nopass" style="height: 20pt;width: 150pt;" '+valueShow+'/>';
    }
}

function actionFormatter(value, row, index) {
    if(row.type!="1"){
        return "-";
    }
    var result = '<div>';
    if(row.check_account==""||row.check_account=="undefined"||row.check_account==null){
        result += '<button type="button" class="btn btn-primary check" style="height: 20pt;width: 60pt"><span style="margin-left:-2pt;">确认审核</span></button>';
    }
    if(row.is_finish=="否"){
        result += '<button type="button" class="btn btn-primary finish" style="height: 20pt;width: 60pt;margin-left: 5pt"><span style="margin-left:-2pt;">确认完成</span></button>';
    }
    result += '</div>';
    return result;
}

window.actionEvents_no_pass = {
    'click .nopass': function (e, value, row, index) {
        //确认是否通过，修改数据库审核人，更新该行数据
    }
};

window.actionEvents = {
    'click .check': function (e, value, row, index) {
        //确认是否通过，修改数据库审核人，更新该行数据
        var no_pass = $('#nopass'+index).val();
        var time= row.time;
        var is_pass = '';
        if(no_pass==''||no_pass==null||no_pass=='undefined'){
            is_pass = "1";
        }else{
            is_pass = no_pass;
        }
        var request_account= row.request_account;
        var check_account = $('#username').val();
        var rows = {
            index : index,  //更新列所在行的索引
            field : "check_account", //要更新列的field
            value : check_account //要更新列的数据
        };
        debugger;
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "index.php/Home/RequestPostDataLoad/updateRequestCheck", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {
                is_pass: is_pass,
                request_account:request_account,
                time:time
            },
            success: function (result) {
                if (result.status == 'success') {
                    debugger;
                    $.scojs_message(result.message, $.scojs_message.TYPE_OK);
                    $('#nopass'+index).css("disabled","disabled");
                    $('.check').attr("disabled",true);
                    //刷新该行数据
                    //更新表格数据
                    $('#user_list_table').bootstrapTable("updateCell",rows);
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
    'click .finish': function (e, value, row, index) {
        //修改数据库执行人，修改是否完成，更新该行数据
        var request_account= row.request_account;
        var time= row.time;
        var is_show = "是";
        var rows = {
            index : index,  //更新列所在行的索引
            field : "is_finish", //要更新列的field
            value : is_show //要更新列的数据
        };
        var exec_account = $('#username').val();
        var rows1 = {
            index : index,  //更新列所在行的索引
            field : "exec_account", //要更新列的field
            value : exec_account //要更新列的数据
        };
        debugger;
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "index.php/Home/RequestPostDataLoad/updateRequestFinish", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {
                request_account:request_account,
                time:time
            },
            success: function (result) {
                if (result.status == 'success') {
                    debugger;
                    $.scojs_message(result.message, $.scojs_message.TYPE_OK);
                    //刷新该行数据
                    $('.finish').attr("disabled",true);
                    $('#user_list_table').bootstrapTable("updateCell",rows);
                    $('#user_list_table').bootstrapTable("updateCell",rows1);
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
};

$('#loadTcData').click(function() {
    //加载TC原因
    var load_tc_reason = $('#load_tc_reason').val();
    debugger;
    if (load_tc_reason == "") {
        $.scojs_message('请输入刷新TC数据原因后再进行提交！', $.scojs_message.TYPE_ERROR);
    } else {
        debugger;
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "index.php/Home/RequestPostDataLoad/postAddTcData", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {
                load_tc_reason: load_tc_reason
            },
            success: function (result) {
                if (result.status == 'success') {
                    debugger;
                    $.scojs_message(result.message, $.scojs_message.TYPE_OK);
                    $('#user_list_table').bootstrapTable('refresh', {url: HOST + "index.php/Home/RequestPostDataLoad/getRequestList"});
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

$('#loadData').click(function() {
    //加载TC原因
    var load_data_type = $('#load_data_type').val();
    var load_data_reason = $('#load_data_reason').val();
    var with_tc = $('#with_tc').val();
    if(with_tc=='是'){
        with_tc = '1';
    }else if(with_tc=='否'){
        with_tc = '0';
    }
    debugger;
    if (load_data_type == "" ||load_data_type=="") {
        $.scojs_message('请输入必填项后再进行提交！', $.scojs_message.TYPE_ERROR);
    } else {
        debugger;
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "index.php/Home/RequestPostDataLoad/postAddData", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {
                load_data_type: load_data_type,
                load_data_reason:load_data_reason,
                with_tc:with_tc
            },
            success: function (result) {
                if (result.status == 'success') {
                    debugger;
                    $.scojs_message(result.message, $.scojs_message.TYPE_OK);
                    $('#user_list_table').bootstrapTable('refresh', {url: HOST + "index.php/Home/RequestPostDataLoad/getRequestList"});
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

//刷新TC数据---链接形式输出--不使用ajax--打开新页面
$('#execLoadTcData').click(function(){
    let a = $("<a href='"+ HOST + "index.php/Home/Method/reloadTc' target='_blank'>刷新TC</a>").get(0);
    let e = document.createEvent('MouseEvents');
    e.initEvent( 'click', true, true );
    a.dispatchEvent(e);
});

//保全受理数据
$('#execLoadDataCS').click(function(){
    let a = $("<a href='"+ HOST + "index.php/Home/Method/execLoadDataCS' target='_blank'>保全受理数据更新</a>").get(0);
    let e = document.createEvent('MouseEvents');
    e.initEvent( 'click', true, true );
    a.dispatchEvent(e);
});

//保全复核数据
$('#execLoadDataCSFH').click(function(){
    let a = $("<a href='"+ HOST + "index.php/Home/Method/execLoadDataCSFH' target='_blank'>保全复核数据更新</a>").get(0);
    let e = document.createEvent('MouseEvents');
    e.initEvent( 'click', true, true );
    a.dispatchEvent(e);
});

//核保数据
$('#execLoadDataUW').click(function(){
    let a = $("<a href='"+ HOST + "index.php/Home/Method/execLoadDataUW' target='_blank'>核保数据更新</a>").get(0);
    let e = document.createEvent('MouseEvents');
    e.initEvent( 'click', true, true );
    a.dispatchEvent(e);
});

//契约数据
$('#execLoadDataNBCD').click(function(){
    let a = $("<a href='"+ HOST + "index.php/Home/Method/execLoadDataNBCD' target='_blank'>契约数据更新</a>").get(0);
    let e = document.createEvent('MouseEvents');
    e.initEvent( 'click', true, true );
    a.dispatchEvent(e);
});

//理赔受理数据
$('#execLoadDataCLMSL').click(function(){
    let a = $("<a href='"+ HOST + "index.php/Home/Method/execLoadDataCLMSL' target='_blank'>理赔受理数据更新</a>").get(0);
    let e = document.createEvent('MouseEvents');
    e.initEvent( 'click', true, true );
    a.dispatchEvent(e);
});

//理赔审核数据
$('#execLoadDataCLMSHSP').click(function(){
    let a = $("<a href='"+ HOST + "index.php/Home/Method/execLoadDataCLMSHSP' target='_blank'>理赔审核数据更新</a>").get(0);
    let e = document.createEvent('MouseEvents');
    e.initEvent( 'click', true, true );
    a.dispatchEvent(e);
});

//灌数开始
$('#startLoadData').click(function(){
    var username = $('#username').val();
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "index.php/Home/Method/startLoadData", //目标地址.
        dataType: "json", //数据格式:JSON
        data: {
            username: username
        },
        success: function (result) {
            if (result.status == 'success') {
                $.scojs_message(result.message, $.scojs_message.TYPE_OK);
            } else if (result.status == 'failed') {
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

//灌数结束
$('#endLoadData').click(function(){
    var username = $('#username').val();
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "index.php/Home/Method/endLoadData", //目标地址.
        dataType: "json", //数据格式:JSON
        data: {
            username: username
        },
        success: function (result) {
            if (result.status == 'success') {
                $.scojs_message(result.message, $.scojs_message.TYPE_OK);
            } else if (result.status == 'failed') {
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




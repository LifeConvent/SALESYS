/**
 * Created by lawrance on 2017/1/11.
 */

$(function () {

    $('#tool_sub').attr('class','active');
    $('#toolSub').css('display','block');
    $('#tool_invoice').attr('class','active');

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
        // if($('#dtp_input3').val()==null||$('#dtp_input3').val()==''||$('#dtp_input3').val()=='undefined'){
        //     // $.scojs_message('此次查询为单日查询！', $.scojs_message.TYPE_ERROR);
        // }
        // $('#daily_report2').bootstrapTable('removeAll');
        // $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/SysMainTain/getCapCs?queryDateStart="+$('#dtp_input2').val()+"&queryDateEnd="+$('#dtp_input3').val()});
    });

    $('#form_date3').datetimepicker({
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
        // $('#daily_report2').bootstrapTable('removeAll');
        // $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/SysMainTain/getCapCs?queryDateStart="+$('#dtp_input2').val()+"&queryDateEnd="+$('#dtp_input3').val()});
    });

    //1.初始化Table
    var oTable = new TableInit();
    oTable.Init();


});

var TableInit = function () {
    var oTableInit = new Object();
    //初始化Table
    oTableInit.Init = function () {
        $('#daily_report2').bootstrapTable({
            url: HOST + "index.php/Home/SysMaintain/getInvoice",   //请求后台的URL（*）
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
            pageSize: 10,      //每页的记录行数（*）
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
                field: 'department',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '部门',
                width:170
            }, {
                field: 'office',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '处室',
                width:100
            }, {
                field: 'name',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '姓名',
                width:180
            }, {
                field: 'invoice_code',
                sortable: true,
                valign: 'middle',
                align: 'center',
                title: '发票代码',
                width:150
            },{
                field: 'invoice_num',
                sortable: true,
                valign: 'middle',
                align: 'center',
                title: '发票号码',
                width:300
            }, {
                field: 'insert_time',
                sortable: true,
                valign: 'middle',
                align: 'center',
                title: '提交日期',
                width:100
            }, {
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '核销操作',
                width:100,
                formatter: "actionFormatter_deal",
                events: "actionEvents_deal",
            },{
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '删除操作',
                width:100,
                formatter: "actionFormatter_delete",
                events: "actionEvents_delete",
            },{
                field: 'is_invoice',
                sortable: true,
                align: 'center',
                visible:false,
                title: '-',
                width:120,
            },{
                field: 'is_deal',
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

function actionFormatter_deal(value, row, index) {
    var is_invoice = $('#is_invoice').text();
    if(is_invoice != "1"){
        return '无核销权限';//'<textarea id="des'+index+'" class="form-control modify" style="height: 40pt;width: 160pt" disabled placeholder="'+ row.description +'"></textarea>';
    }else if(row.is_deal == '1'){
        return '<span style="color:#21e42b;"><strong>已核销</strong></span>';
    }else{
        return '<button type="button" class="btn btn-primary deal_invoice" style="height: 20pt;width: 30pt"><span style="margin-left:-5pt;">核销</span></button>';
    }
}

window.actionEvents_deal = {
    'click .deal_invoice': function (e, value, row, index) {
        // ajax提交数据
        debugger;
        var invoice_code = row.invoice_code;
        var invoice_num = row.invoice_num;
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "index.php/Home/SysMaintain/updateInvoice", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {invoice_code: invoice_code,invoice_num: invoice_num},
            success: function (result) {
                if (result.status == 'success') {
                    debugger;
                    //单行刷新数据
                    var data = { "is_deal" : 1 };
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


function actionFormatter_delete(value, row, index) {
    var is_invoice = $('#is_invoice').text();
    if(is_invoice != "1"){
        return '无删除权限';//'<textarea id="des'+index+'" class="form-control modify" style="height: 40pt;width: 160pt" disabled placeholder="'+ row.description +'"></textarea>';
    }else{
        return '<button type="button" class="btn btn-danger delete_invoice" style="height: 20pt;width: 30pt"><span style="margin-left:-5pt;">删除</span></button>';
    }
}

window.actionEvents_delete = {
    'click .delete_invoice': function (e, value, row, index) {
        // ajax提交数据
        debugger;
        var invoice_code = row.invoice_code;
        var invoice_num = row.invoice_num;
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "index.php/Home/SysMaintain/deleteInvoice", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {invoice_code: invoice_code,invoice_num: invoice_num},
            success: function (result) {
                if (result.status == 'success') {
                    debugger;
                    $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/SysMainTain/getInvoice"});
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
};

$('#new_invoice').click(function(){
    var invoice_code = $('#invoice_code').val();
    var invoice_num = $('#invoice_num').val();
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "index.php/Home/SysMaintain/newInvoice", //目标地址.
        dataType: "json", //数据格式:JSON
        data: {invoice_code: invoice_code,invoice_num: invoice_num},
        success: function (result) {
            if (result.status == 'success') {
                debugger;
                //单行刷新数据
                $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/SysMainTain/getInvoice"});
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
});


function exportExcelByTime() {
    var invoice_code_select = $("#invoice_code_select").val();
    var invoice_num_select = $("#invoice_num_select").val();
    var fix = '';
    if(invoice_code_select!=''&&invoice_code_select!=null){
        fix += '&invoice_code='+invoice_code_select;
    }
    if(invoice_num_select!=''&&invoice_num_select!=null){
        fix += '&invoice_num='+invoice_num_select;
    }
    window.location.href = HOST + "index.php/Home/SysMaintain/expInvoice?queryDateStart="+$('#dtp_input2').val()+"&queryDateEnd="+$('#dtp_input3').val()+fix;
}

function refreshTable(){
    var invoice_code_select = $("#invoice_code_select").val();
    var invoice_num_select = $("#invoice_num_select").val();
    var fix = '';
    if(invoice_code_select!=''&&invoice_code_select!=null){
        fix += '&invoice_code='+invoice_code_select;
    }
    if(invoice_num_select!=''&&invoice_num_select!=null){
        fix += '&invoice_num='+invoice_num_select;
    }
    $('#daily_report2').bootstrapTable('removeAll');
    $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/SysMaintain/getInvoice?queryDateStart="+$('#dtp_input2').val()+"&queryDateEnd="+$('#dtp_input3').val()+fix});
};
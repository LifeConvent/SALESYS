/**
 * Created by lawrance on 2017/1/11.
 */

$(function () {

    $('#data_export').attr('class','active');
    $('#data_out').css('display','block');
    $('#data_out_ct').attr('class','active');

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
        $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/DataOut/getCsOutCt?queryDateStart="+$('#dtp_input2').val()+"&queryDateEnd="+$('#dtp_input3').val()});
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
        $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/DataOut/getCsOutCt?queryDateStart="+$('#dtp_input2').val()+"&queryDateEnd="+$('#dtp_input3').val()});
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
            url: HOST + "index.php/Home/DataOut/getCsOutCt",   //请求后台的URL（*）
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
                field: 'accept_code',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '受理号',
                width:170
            }, {
                field: 'policy_code',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '保单号',
                width:170
            }, {
                field: 'service_name',
                sortable: true,
                valign: 'middle',
                align: 'center',
                title: '保全项目名称',
                width:150
            },{
                field: 'update_time',
                sortable: true,
                valign: 'middle',
                align: 'center',
                title: '日期',
                width:100
            }, {
                field: 'busi_prod_code',
                sortable: true,
                valign: 'middle',
                align: 'center',
                title: '产品代码',
                width:100
            }, {
                field: 'product_name_sys',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '险种名称',
                width:200
            }, {
                field: 'channel',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '渠道',
                width:100
            },{
                field: 'status_name',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '收付费状态',
                width:100
            }, {
                field: 'arap_flag',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '收付费类型',
                width:140
            }, {
                field: 'type_name',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '费用类型',
                width:140
            }, {
                field: 'fee_amount',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '收付费金额',
                width:100
            }, {
                field: 'organ_code',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '管理机构',
                width:100
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


function refreshTable(){
    // $result = $('#table_user').bootstrapTable('getAllSelections');
    // if ($result[0] != null) {
    //     $.scojs_message('删除全部将会丢失所有数据，请等待开发！', $.scojs_message.TYPE_ERROR);
    // }
    var service_name = $("#service_name").val();
    var policy_code = $("#policy_code").val();
    var risk_code = $("#risk_code").val();
    // alert(busi_type);
    var fix = '';
    if(service_name!=''&&service_name!=null){
        fix += '&service_name='+service_name;
    }
    if(policy_code!=''&&policy_code!=null){
        fix += '&policy_code='+policy_code;
    }
    if(risk_code!=''&&risk_code!=null){
        fix += '&risk_code='+risk_code;
    }
    $('#daily_report2').bootstrapTable('removeAll');
    $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/DataOut/getCsOutCt?queryDateStart="+$('#dtp_input2').val()+"&queryDateEnd="+$('#dtp_input3').val()+fix});
    $.ajax({
        type: "GET", //用POST方式传输
        url: HOST + "index.php/Home/DataOut/getSumALLOutCt?queryDateStart="+$('#dtp_input2').val()+"&queryDateEnd="+$('#dtp_input3').val()+fix, //目标地址.
        dataType: "json", //数据格式:JSON
        success: function (result) {
            if (result.status == 'success') {
                debugger;
                $('#sum_all').text(result.message);
            } else if (result.status == 'failed') {
                $('#sum_all').text(result.message);
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert(XMLHttpRequest);
            alert(textStatus);
            alert(errorThrown);
        }
    });
};

function exportExcelByTime() {
    var service_name = $("#service_name").val();
    var policy_code = $("#policy_code").val();
    var risk_code = $("#risk_code").val();
    // alert(busi_type);
    var fix = '';
    if(service_name!=''&&service_name!=null){
        fix += '&service_name='+service_name;
    }
    if(policy_code!=''&&policy_code!=null){
        fix += '&policy_code='+policy_code;
    }
    if(risk_code!=''&&risk_code!=null){
        fix += '&risk_code='+risk_code;
    }
    window.location.href = HOST + "index.php/Home/DataOut/expCsOutCt?queryDateStart="+$('#dtp_input2').val()+"&queryDateEnd="+$('#dtp_input3').val()+fix;
}
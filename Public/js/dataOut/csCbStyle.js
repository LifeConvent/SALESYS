/**
 * Created by lawrance on 2017/1/11.
 */

$(function () {

    $('#data_export').attr('class','active');
    $('#data_out').css('display','block');
    $('#data_cs_cb_style').attr('class','active');

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
        $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/DataOut/getCsCbStyle?queryDateStart="+$('#dtp_input1').val()});
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
        // if($('#dtp_input3').val()==null||$('#dtp_input3').val()==''||$('#dtp_input3').val()=='undefined'){
        //     // $.scojs_message('此次查询为单日查询！', $.scojs_message.TYPE_ERROR);
        // }
        // $('#daily_report2').bootstrapTable('removeAll');
        // $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/DataOut/expCsCbStyleByTime?queryDateStart="+$('#dtp_input2').val()+"&queryDateEnd="+$('#dtp_input3').val()});
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
        $('#daily_report2').bootstrapTable('removeAll');
        $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/DataOut/getCsCbStyle?queryDateStart="+$('#dtp_input2').val()+"&queryDateEnd="+$('#dtp_input3').val()});
    });


    $('#form_date4').datetimepicker({
        language:  'zh-CN',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    }).on('changeDate', function(ev){ });

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


function exportExcel() {
    window.location.href = HOST + "index.php/Home/DataOut/expNbOutCb";
}

function exportExcelByTime() {
    var policy_code = $("#policy_code").val();
    var apply_status = $("#apply_status").val();
    var apply_channel = $("#apply_channel").val();
    var apply_type = $("#apply_type").val();
    var apply_date = $('#dtp_input4').val();//投保日期
    // alert(busi_type);
    var fix = '';
    if(apply_status!=''&&apply_status!=null){
        fix += '&apply_status='+apply_status;
    }
    if(policy_code!=''&&policy_code!=null){
        fix += '&policy_code='+policy_code;
    }
    if(apply_channel!=''&&apply_channel!=null){
        fix += '&apply_channel='+apply_channel;
    }
    if(apply_type!=''&&apply_type!=null){
        fix += '&apply_type='+apply_type;
    }
    if(apply_date!=''&&apply_date!=null){
        fix += '&apply_date='+apply_date;
    }
    window.location.href = HOST + "index.php/Home/DataOut/expCsCbStyleByTime?queryDateStart="+$('#dtp_input2').val()+"&queryDateEnd="+$('#dtp_input3').val()+fix;
}

var TableInit = function () {
    var oTableInit = new Object();
    //初始化Table
    oTableInit.Init = function () {
        $('#daily_report2').bootstrapTable({
            url: HOST + "index.php/Home/DataOut/getCsCbStyle",   //请求后台的URL（*）
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
                field: 'apply_date',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '投保日期',
                width:100
            }, {
                field: 'organ_code',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '管理机构',
                width:140
            }, {
                field: 'apply_code',
                sortable: true,
                valign: 'middle',
                align: 'center',
                title: '投保单号',
                width:150
            },{
                field: 'policy_code',
                sortable: true,
                valign: 'middle',
                align: 'center',
                title: '保单号',
                width:150
            },{
                field: 'issue_date',
                sortable: true,
                valign: 'middle',
                align: 'center',
                title: '签单日期',
                width:100
            }, {
                field: 'validate_date',
                sortable: true,
                valign: 'middle',
                align: 'center',
                title: '保单生效日',
                width:100
            },
            // {
            //     field: 'initial_prem_date',
            //     sortable: true,
            //     align: 'center',
            //     valign: 'middle',
            //     title: '首期缴费日',
            //     width:140
            // },
                {
                    field: 'finish_time',
                    sortable: true,
                    valign: 'middle',
                    align: 'center',
                    title: '到账日期',
                    width:100
                }, {
                    field: 'charge_year',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '缴费年期',
                    width:100
                },{
                    field: 'winning_start_flag',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '是否预承保',
                    width:120
                }, {
                    field: 'sales_channel_name',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '投保渠道',
                    width:140
                }, {
                    field: 'channel_name',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '投保方式',
                    width:140
                }, {
                    field: 'status_desc',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '投保单状态',
                    width:100
                }, {
                    field: 'status_name',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '保单效力状态',
                    width:100
                }, {
                    field: 'cause_name',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '终止原因',
                    width:100
                }, {
                    field: 'cancel_date',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '撤单日期',
                    width:100
                }, {
                    field: 'billcard_code',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '单证UA031扫描状态',
                    width:140
                },{
                    field: 'customer_name',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '投保人姓名',
                    width:100
                }, {
                    field: 'bank_name',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '银行',
                    width:100
                }, {
                    field: 'account_bank',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '银行代码',
                    width:100
                }, {
                    field: 'account',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '银行账户',
                    width:200
                }, {
                    field: 'service_bank_branch',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '银代银行网点代码',
                    width:200
                }, {
                    field: 'bank_branch_name',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '银代银行网点名称',
                    width:200
                }, {
                    field: 'agent_code',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '业务员代码',
                    width:100
                }, {
                    field: 'agent_name',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '业务员姓名',
                    width:160
                }, {
                    field: 'unit',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '份数',
                    width:160
                }, {
                    field: 'master_busi',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '主附险标记',
                    width:160
                },{
                    field: 'product_code_sys',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '险种代码',
                    width:100
                }, {
                    field: 'product_name_sys',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '险种名称',
                    width:100
                }, {
                    field: 'amount',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '保额',
                    width:100
                }, {
                    field: 'total_prem_af',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '保费',
                    width:100
                }, {
                    field: 'fee_status',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '保费是否到账',
                    width:100
                }, {
                    field: 'fyc',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: 'FYC',
                    width:100
                }, {
                    field: 'validate_tome',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '生效日期',
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
    // var service_code = $("#service_code").val();
    var policy_code = $("#policy_code").val();
    var apply_status = $("#apply_status").val();
    var apply_channel = $("#apply_channel").val();
    var apply_type = $("#apply_type").val();
    var apply_date = $('#dtp_input4').val();//投保日期
    // alert(busi_type);
    var fix = '';
    if(apply_status!=''&&apply_status!=null){
        fix += '&apply_status='+apply_status;
    }
    if(policy_code!=''&&policy_code!=null){
        fix += '&policy_code='+policy_code;
    }
    if(apply_channel!=''&&apply_channel!=null){
        fix += '&apply_channel='+apply_channel;
    }
    if(apply_type!=''&&apply_type!=null){
        fix += '&apply_type='+apply_type;
    }
    if(apply_date!=''&&apply_date!=null){
        fix += '&apply_date='+apply_date;
    }
    $('#daily_report2').bootstrapTable('removeAll');
    $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/DataOut/getCsCbStyle?queryDateStart="+$('#dtp_input2').val()+"&queryDateEnd="+$('#dtp_input3').val()+fix});
};
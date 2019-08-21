/**
 * Created by lawrance on 2017/1/11.
 */

$(function () {

    $('#nb_post').attr('class','active');
    $('#nb_post_table').css('display','block');
    $('#nb_post_table_stream').attr('class','active');

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
        $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/PostTable/getNbPostStream?queryDateStart="+$('#dtp_input2').val()+"&queryDateEnd="+$('#dtp_input3').val()});
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
        $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/PostTable/getNbPostStream?queryDateStart="+$('#dtp_input2').val()+"&queryDateEnd="+$('#dtp_input3').val()});
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
    }).on('changeDate', function(ev){});

    $('#form_date4').datetimepicker({
        language:  'zh-CN',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    }).on('changeDate', function(ev){});

    $('#form_date5').datetimepicker({
        language:  'zh-CN',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    }).on('changeDate', function(ev){});


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
    var apply_status = $("#apply_status").val();
    var policy_code = $("#policy_code").val();
    var apply_channel = $("#apply_channel").val();
    var charge_type = $("#charge_type").val();
    var apply_date = $('#dtp_input4').val();//投保日期
    var validate_date = $('#dtp_input5').val();//生效日期
    var scan_date = $('#dtp_input6').val();//UA301扫描日期
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
    if(charge_type!=''&&charge_type!=null){
        fix += '&charge_type='+charge_type;
    }
    if(apply_date!=''&&apply_date!=null){
        fix += '&apply_date='+apply_date;
    }
    if(validate_date!=''&&validate_date!=null){
        fix += '&validate_date='+validate_date;
    }
    if(scan_date!=''&&scan_date!=null){
        fix += '&scan_date='+scan_date;
    }
    window.location.href = HOST + "index.php/Home/PostTable/expNbPostStream?queryDateStart="+$('#dtp_input2').val()+"&queryDateEnd="+$('#dtp_input3').val()+fix;
}

function exportExcelScan() {
    window.location.href = HOST + "index.php/Home/PostTable/expNbScan";
}

var TableInit = function () {
    var oTableInit = new Object();
    //初始化Table
    oTableInit.Init = function () {
        $('#daily_report2').bootstrapTable({
            url: HOST + "index.php/Home/PostTable/getNbPostStream",   //请求后台的URL（*）
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
                field: 'ORGAN_CODE',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '管理机构',
                width:100
            }, {
                field: 'APPLY_CODE',
                sortable: true,
                valign: 'middle',
                align: 'center',
                title: '投保单号',
                width:180
            },{
                field: 'POLICY_CODE',
                sortable: true,
                valign: 'middle',
                align: 'center',
                title: '保单号',
                width:130
            }, {
                field: 'APPLY_DATE',
                sortable: true,
                valign: 'middle',
                align: 'center',
                title: '投保日期',
                width:120
            }, {
                field: 'INSERT_TIME',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '入库时间',
                width:120
            },{
                field: 'BUSI_APPLY_DATE',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '预收申请日期',
                width:120
            }, {
                field: 'FINISH_TIME',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '到账日期',
                width:100
            },{
                field: 'ISSUE_DATE',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '承保日期',
                width:100
            }, {
                field: 'SIGN_TIME',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '签单时间',
                width:100
            }, {
                field: 'VALIDATE_DATE',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '保单生效日',
                width:120
            }, {
                field: 'INSERT_TIME_ZZ',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '纸质保单核心推送打印日期',
                width:150
            }, {
                field: 'PRINT_TIME_ZZ',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '纸质保单打印推送外包商日期',
                width:180
            }, {
                field: 'BPO_PRINT_DATE_ZZ',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '纸质保单外包商制单日期',
                width:100
            }, {
                field: 'INSERT_TIME_DZ',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '电子保单核心推送打印日期',
                width:150
            }, {
                field: 'PRINT_TIME_DZ',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '电子保单打印日期',
                width:150
            }, {
                field: 'ACKNOWLEDGE_DATE',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '回执签收日期',
                width:130
            }, {
                field: 'BRANCH_RECEIVE_DATE',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '回执核销日期',
                width:130
            }, {
                field: 'EXPIRY_DATE',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '保单终止日期',
                width:130
            }, {
                field: 'PAY_MODE',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '缴费方式',
                width:100
            }, {
                field: 'PAY_MODE2',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '制返盘状态',
                width:120
            }, {
                field: 'CHARGE_YEAR',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '缴费年期',
                width:100
            }, {
                field: 'WINNING_START_FLAG',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '是否预承保',
                width:130
            }, {
                field: 'SALES_CHANNEL_NAME',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '投保渠道',
                width:100
            }, {
                field: 'CHANNEL_NAME',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '投保方式',
                width:100
            }, {
                field: 'STATUS_DESC',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '投保单状态',
                width:120
            }, {
                field: 'STATUS_NAME',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '保单效力状态',
                width:130
            }, {
                field: 'CAUSE_NAME',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '终止原因',
                width:100
            }, {
                field: 'CANCEL_DATE',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '撤单日期',
                width:100
            }, {
                field: 'CUSTOMER_NAME',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '投保人姓名',
                width:120
            }, {
                field: 'CUSTOMER_BIRTHDAY',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '投保人生日',
                width:120
            }, {
                field: 'BILLCARD_STATUS',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '单证UA031扫描状态',
                width:150
            }, {
                field: 'UA031_SCAN_TIME',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '单证UA031扫描时间',
                width:150
            }, {
                field: 'BILLCARD_STATUS_UA008',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '单证UA008扫描状态',
                width:150
            }, {
                field: 'UA008_SCAN_TIME',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '单证UA008扫描时间',
                width:150
            }, {
                field: 'BANK_NAME',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '银行',
                width:100
            }, {
                field: 'ACCOUNT_BANK',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '银行代码',
                width:100
            }, {
                field: 'ACCOUNT',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '银行账户',
                width:180
            }, {
                field: 'SERVICE_BANK_BRANCH',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '银代银行网点代码',
                width:150
            }, {
                field: 'BANK_BRANCH_NAME',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '银代银行网点名称',
                width:150
            }, {
                field: 'AGENT_CODE',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '业务员代码',
                width:100
            }, {
                field: 'AGENT_NAME',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '业务员姓名',
                width:100
            }, {
                field: 'AGENT_AREA',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '业务员营业区',
                width:120
            }, {
                field: 'AGENT_PART',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '业务员营业部',
                width:120
            }, {
                field: 'AGENT_GROUP',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '业务员营业组',
                width:120
            }, {
                field: 'UNIT',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '份数',
                width:100
            }, {
                field: 'PRODUCT_CODE_SYS',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '险种代码',
                width:100
            }, {
                field: 'PRODUCT_NAME_SYS',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '险种名称',
                width:100
            }, {
                field: 'AMOUNT',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '保额',
                width:100
            }, {
                field: 'TOTAL_PREM_AF',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '保费',
                width:100
            }, {
                field: 'FEE_STATUS',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '保费是否到账',
                width:120
            }, {
                field: 'DZ_SIGN',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '是否电子签名',
                width:120
            }, {
                field: 'DZ_SIGN_TYPE',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '电子签名质检类型',
                width:130
            }, {
                field: 'DRQ_FLAG',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '是否双录保单',
                width:120
            }, {
                field: 'SL_SEND_DATE',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '双录影音接收时间',
                width:130
            }, {
                field: 'SL_CHECK_DATE',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '双录发送外包商质检时间',
                width:180
            }, {
                field: 'SL_CHECK_STATUS',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '双录外包商质检状态',
                width:150
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
    var apply_status = $("#apply_status").val();
    var policy_code = $("#policy_code").val();
    var apply_channel = $("#apply_channel").val();
    var charge_type = $("#charge_type").val();
    var apply_date = $('#dtp_input4').val();//投保日期
    var validate_date = $('#dtp_input5').val();//生效日期
    var scan_date = $('#dtp_input6').val();//UA301扫描日期
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
    if(charge_type!=''&&charge_type!=null){
        fix += '&charge_type='+charge_type;
    }
    if(apply_date!=''&&apply_date!=null){
        fix += '&apply_date='+apply_date;
    }
    if(validate_date!=''&&validate_date!=null){
        fix += '&validate_date='+validate_date;
    }
    if(scan_date!=''&&scan_date!=null){
        fix += '&scan_date='+scan_date;
    }
    $('#daily_report2').bootstrapTable('removeAll');
    $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/PostTable/getNbPostStream?queryDateStart="+$('#dtp_input2').val()+"&queryDateEnd="+$('#dtp_input3').val()+fix});
};
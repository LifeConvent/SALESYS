/**
 * Created by lawrance on 2017/1/11.
 */

$(function () {

    $('#data_export').attr('class', 'active');
    $('#data_out').css('display', 'block');
    $('#data_pa_no_charge').attr('class', 'active');

    $('#form_date1').datetimepicker({
        language: 'zh-CN',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    }).on('changeDate', function (ev) {
        // if($('#dtp_input3').val()==null||$('#dtp_input3').val()==''||$('#dtp_input3').val()=='undefined'){
        //     // $.scojs_message('此次查询为单日查询！', $.scojs_message.TYPE_ERROR);
        // }
        $('#daily_report2').bootstrapTable('removeAll');
        $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/DataOut/getPolicyNoCharge?queryDateStart=" + $('#dtp_input1').val()});
    });

    $('#form_date2').datetimepicker({
        language: 'zh-CN',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    }).on('changeDate', function (ev) {
        // if($('#dtp_input3').val()==null||$('#dtp_input3').val()==''||$('#dtp_input3').val()=='undefined'){
        //     // $.scojs_message('此次查询为单日查询！', $.scojs_message.TYPE_ERROR);
        // }
        // $('#daily_report2').bootstrapTable('removeAll');
        // $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/DataOut/expNbOutCbByTime?queryDateStart="+$('#dtp_input2').val()+"&queryDateEnd="+$('#dtp_input3').val()});
    });

    $('#form_date3').datetimepicker({
        language: 'zh-CN',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    }).on('changeDate', function (ev) {
        if ($('#dtp_input2').val() == null || $('#dtp_input2').val() == '' || $('#dtp_input2').val() == 'undefined') {
            $.scojs_message('请输入区间查询起始日期！', $.scojs_message.TYPE_ERROR);
            return;
        }
        $('#daily_report2').bootstrapTable('removeAll');
        $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/DataOut/getPolicyNoCharge?queryDateStart=" + $('#dtp_input2').val() + "&queryDateEnd=" + $('#dtp_input3').val()});
    });


    $('#form_date4').datetimepicker({
        language: 'zh-CN',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    }).on('changeDate', function (ev) {
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


function exportExcel() {
    window.location.href = HOST + "index.php/Home/DataOut/expPolicyNoCharge";
}

function exportExcelByTime() {
    var policy_code = $("#policy_code").val();
    // var apply_status = $("#apply_status").val();
    var apply_channel = $("#apply_channel").val();
    var apply_type = $("#apply_type").val();
    var apply_date = $('#dtp_input4').val();//投保日期
    // alert(busi_type);
    var fix = '';
    // if (apply_status != '' && apply_status != null) {
    //     fix += '&apply_status=' + apply_status;
    // }
    if (policy_code != '' && policy_code != null) {
        fix += '&policy_code=' + policy_code;
    }
    if (apply_channel != '' && apply_channel != null) {
        fix += '&apply_channel=' + apply_channel;
    }
    if (apply_type != '' && apply_type != null) {
        fix += '&apply_type=' + apply_type;
    }
    if (apply_date != '' && apply_date != null) {
        fix += '&apply_date=' + apply_date;
    }
    window.location.href = HOST + "index.php/Home/DataOut/expPolicyNoCharge?queryDateStart=" + $('#dtp_input2').val() + "&queryDateEnd=" + $('#dtp_input3').val() + fix;
}

var TableInit = function () {
    var oTableInit = new Object();
    //初始化Table
    oTableInit.Init = function () {
        $('#daily_report2').bootstrapTable({
            url: HOST + "index.php/Home/DataOut/getPolicyNoCharge",   //请求后台的URL（*）
            method: 'get',      //请求方式（*）
            cache: false,      //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
            showExport: true,
            exportDataType: 'all',
            exportTypes: ['csv', 'txt', 'sql', 'doc', 'excel', 'xlsx', 'pdf'],
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
            pageList: [10, 15, 25, 30, 50, 100],
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
                width: 40,
                formatter: function (value, row, index) {
                    return index + 1;
                }
            }, {
                field: 'PAY_END_DATE',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '宽限到期日',
                width: 140
            }, {
                field: 'POLICY_CODE',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '保单号',
                width: 140
            }, {
                field: 'HOLDER_NAME',
                sortable: true,
                valign: 'middle',
                align: 'center',
                title: '投保人姓名',
                width: 150
            }, {
                field: 'DUE_TIME',
                sortable: true,
                valign: 'middle',
                align: 'center',
                title: '缴费对应日',
                width: 150
            }, {
                field: 'FEE_AMOUNT',
                sortable: true,
                valign: 'middle',
                align: 'center',
                title: '应交保费（含附加险）',
                width: 150
            }, {
                field: 'PAID_COUNT',
                sortable: true,
                valign: 'middle',
                align: 'center',
                title: '缴费次数',
                width: 100
            }, {
                field: 'PAY_MODE',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '缴费形式',
                width: 140
            }, {
                field: 'BANK_NAME',
                sortable: true,
                valign: 'middle',
                align: 'center',
                title: '划款银行名称',
                width: 150
            }, {
                field: 'BANK_ACCOUNT',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '银行账号',
                width: 100
            }, {
                field: 'HOLDER_TEL',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '联系电话',
                width: 120
            }, {
                field: 'HOLDER_ADDRESS',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '通讯地址',
                width: 200
            }, {
                field: 'UPORGAN_CODE',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '保单所属中支',
                width: 140
            }, {
                field: 'CHANNEL_TYPE',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '保单所属渠道',
                width: 140
            }, {
                field: 'ORGAN_CODE',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '四级机构',
                width: 100
            }, {
                field: 'YINGYB',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '营业部',
                width: 100
            }, {
                field: 'TCA_CHANNEL_TYPE',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '现服务渠道',
                width: 120
            }, {
                field: 'AGENT_NAME',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '现服务人员姓名',
                width: 140
            }, {
                field: 'ORIGINAL_CHANNEL_TYPE_NAME',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '原销售渠道',
                width: 120
            }, {
                field: 'ORIGINAL_AGENT_NAME',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '原销售人员姓名',
                width: 120
            }, {
                field: 'LIABILITY_STATE',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '保单状态',
                width: 100
            }, {
                field: 'IS_SELF_INSURED',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '自保互保标识',
                width: 100
            }, {
                field: 'POLICY_FLAG',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '保单标识',
                width: 100
            }, {
                field: 'CHECK_USER_CODE',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '督管编码',
                width: 100
            }, {
                field: 'CHECK_USER_NAME',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '督管姓名',
                width: 100
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


function refreshTable() {
    // $result = $('#table_user').bootstrapTable('getAllSelections');
    // if ($result[0] != null) {
    //     $.scojs_message('删除全部将会丢失所有数据，请等待开发！', $.scojs_message.TYPE_ERROR);
    // }
    // var service_code = $("#service_code").val();
    var policy_code = $("#policy_code").val();
    // var apply_status = $("#apply_status").val();
    var apply_channel = $("#apply_channel").val();
    var apply_type = $("#apply_type").val();
    var apply_date = $('#dtp_input4').val();//投保日期
    // alert(busi_type);
    var fix = '';
    // if (apply_status != '' && apply_status != null) {
    //     fix += '&apply_status=' + apply_status;
    // }
    if (policy_code != '' && policy_code != null) {
        fix += '&policy_code=' + policy_code;
    }
    if (apply_channel != '' && apply_channel != null) {
        fix += '&apply_channel=' + apply_channel;
    }
    if (apply_type != '' && apply_type != null) {
        fix += '&apply_type=' + apply_type;
    }
    if (apply_date != '' && apply_date != null) {
        fix += '&apply_date=' + apply_date;
    }
    $('#daily_report2').bootstrapTable('removeAll');
    $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/DataOut/getPolicyNoCharge?queryDateStart=" + $('#dtp_input2').val() + "&queryDateEnd=" + $('#dtp_input3').val() + fix});
};
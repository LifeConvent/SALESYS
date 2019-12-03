/**
 * Created by lawrance on 2017/1/11.
 */

$(function () {

    $('#list_scan').attr('class','active');
    $('#list_scan_show').css('display','block');
    $('#list_scan_li').attr('class','active');

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
        $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/DataOut/getScanList?queryDateStart="+$('#dtp_input1').val()});
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
        // $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/DataOut/expNbOutCbByTime?queryDateStart="+$('#dtp_input2').val()+"&queryDateEnd="+$('#dtp_input3').val()});
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
        $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/DataOut/getScanList?queryDateStart="+$('#dtp_input2').val()+"&queryDateEnd="+$('#dtp_input3').val()});
    });

    //1.初始化Table
    var oTable = new TableInit();
    oTable.Init();
});


// function exportExcel() {
//     window.location.href = HOST + "index.php/Home/DataOut/expNbOutCb";
// }
//
// function exportExcelByTime() {
//     window.location.href = HOST + "index.php/Home/DataOut/expNbOutCbByTime?queryDateStart="+$('#dtp_input2').val()+"&queryDateEnd="+$('#dtp_input3').val();
// }

var TableInit = function () {
    var oTableInit = new Object();
    //初始化Table
    oTableInit.Init = function () {
        $('#daily_report2').bootstrapTable({
            url: HOST + "index.php/Home/DataOut/getScanList",   //请求后台的URL（*）
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
                field: 'BUSS_CLASS',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '业务类别',
                width:100
            }, {
                field: 'IMAGE_SCAN_ID',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '影像扫描ID',
                width:140
            }, {
                field: 'SCAN_BATCH_NO',
                sortable: true,
                valign: 'middle',
                align: 'center',
                title: '扫描批次号',
                width:170
            },{
                field: 'POLICY_CODE',
                sortable: true,
                valign: 'middle',
                align: 'center',
                title: '保单号',
                width:150
            },{
                field: 'BILLCARD_NO',
                sortable: true,
                valign: 'middle',
                align: 'center',
                title: '投保单号或保单号或通知书号',
                width:180
            }, {
                field: 'BUSS_CODE',
                sortable: true,
                valign: 'middle',
                align: 'center',
                title: '业务号码',
                width:150
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
                    field: 'ACCEPT_CODE',
                    sortable: true,
                    valign: 'middle',
                    align: 'center',
                    title: '保全受理号',
                    width:160
                }, {
                    field: 'SERVICE_NAME',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '保全项名称',
                    width:150
                },{
                    field: 'CASE_NO',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '赔案号',
                    width:120
                }, {
                    field: 'CASE_TIME',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '立案时间',
                    width:140
                }, {
                    field: 'CASE_USER',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '签收人代码',
                    width:140
                }, {
                    field: 'CASE_USER_NAME',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '签收人姓名',
                    width:100
                }, {
                    field: 'CASE_ORGAN',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '签收机构',
                    width:100
                }, {
                    field: 'BILLCARD_CODE',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '扫描单证类型',
                    width:150
                }, {
                    field: 'CARD_NAME',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '扫描单证名称',
                    width:150
                }, {
                    field: 'PAGES',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '扫描页数',
                    width:140
                },{
                    field: 'SCAN_TIME',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '扫描日期',
                    width:100
                }, {
                    field: 'SCAN_USER_CODE',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '扫描用户代码',
                    width:120
                }, {
                    field: 'REAL_NAME',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '扫描用户',
                    width:100
                }, {
                    field: 'STATUS_DESC',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '扫描状态',
                    width:200
                }, {
                    field: 'HOLDER_NAME',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '投保人姓名',
                    width:200
                }, {
                    field: 'INSURED_NAME',
                    sortable: true,
                    align: 'center',
                    valign: 'middle',
                    title: '被保人姓名',
                    width:200
                }
                // , {
                //     field: 'SCAN_ORGAN_CODE',
                //     sortable: true,
                //     align: 'center',
                //     valign: 'middle',
                //     title: '扫描机构',
                //     width:200
                // }
                ]
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
    var busi_type = $("#busi_type").val();
    var policy_code = $("#policy_code").val();
    var busi_code = $("#busi_code").val();
    // alert(busi_type);
    var fix = '';
    if(busi_type!=''&&busi_type!=null){
        fix += '&busi_type='+busi_type;
    }
    if(policy_code!=''&&policy_code!=null){
        fix += '&policy_code='+policy_code;
    }
    if(busi_code!=''&&busi_code!=null){
        fix += '&busi_code='+busi_code;
    }
    $('#daily_report2').bootstrapTable('removeAll');
    $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/DataOut/getScanList?queryDateStart="+$('#dtp_input2').val()+"&queryDateEnd="+$('#dtp_input3').val()+fix});
};


function exportExcelByTime() {
    var busi_type = $("#busi_type").val();
    var policy_code = $("#policy_code").val();
    var busi_code = $("#busi_code").val();
    // alert(busi_type);
    var fix = '';
    if(busi_type!=''&&busi_type!=null){
        fix += '&busi_type='+busi_type;
    }
    if(policy_code!=''&&policy_code!=null){
        fix += '&policy_code='+policy_code;
    }
    if(busi_code!=''&&busi_code!=null){
        fix += '&busi_code='+busi_code;
    }
    window.location.href = HOST + "index.php/Home/DataOut/expScanList?queryDateStart="+$('#dtp_input2').val()+"&queryDateEnd="+$('#dtp_input3').val()+fix;
}
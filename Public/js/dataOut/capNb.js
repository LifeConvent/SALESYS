/**
 * Created by lawrance on 2017/1/11.
 */

$(function () {

    $('#data_export').attr('class','active');
    $('#data_out').css('display','block');
    $('#data_cap_nb').attr('class','active');

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
        $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/DataOut/getCapNb?queryDateStart="+$('#dtp_input2').val()+"&queryDateEnd="+$('#dtp_input3').val()});
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
        $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/DataOut/getCapNb?queryDateStart="+$('#dtp_input2').val()+"&queryDateEnd="+$('#dtp_input3').val()});
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
    var oTableInit = new Object();
    //初始化Table
    oTableInit.Init = function () {
        $('#daily_report2').bootstrapTable({
            url: HOST + "index.php/Home/DataOut/getCapNb",   //请求后台的URL（*）
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
                field: 'unit_number',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '唯一号',
                width:100
            }, {
                field: 'group_num',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '组别',
                width:100
            }, {
                field: 'business_code',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '业务号',
                width:140
            }, {
                field: 'bank_account',
                sortable: true,
                valign: 'middle',
                align: 'center',
                title: '账号',
                width:170
            },{
                field: 'bank_code',
                sortable: true,
                valign: 'middle',
                align: 'center',
                title: '银行',
                width:100
            }, {
                field: 'acco_name',
                sortable: true,
                valign: 'middle',
                align: 'center',
                title: '户名',
                width:100
            }, {
                field: 'due_time',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '应缴日期',
                width:100
            },{
                field: 'biz_source_name',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '业务来源',
                width:100
            },{
                field: 'arap_flag',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '收付标志',
                width:100
            }, {
                field: 'fee_amount',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '金额',
                width:120
            }, {
                field: 'insert_time',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '制盘时间',
                width:120
            }, {
                field: 'sales_channel_name',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '渠道',
                width:100
            }, {
                field: 'sum_total_prem_af',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '契约总保费',
                width:100
            }, {
                field: 'is_same',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '是否一致',
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

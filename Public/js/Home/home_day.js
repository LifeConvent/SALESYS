
$(function () {
    $('#day_post').attr('class','active');
    $('#day_post_this').css('display','block');
    $('#day_post_nb_this').attr('class','active');

    $('.form_date').datetimepicker({
        language:  'zh-CN',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    }).on('changeDate', function(ev){
        $('#daily_report').bootstrapTable('refresh', {url: HOST + "index.php/Home/DayPost/getNbDayPostThis?queryDateStart="+$("#dtp_input2").val()+"&type=1"});
    });

    //1.初始化Table
    var oTable = new TableInit();
    oTable.Init();

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
        $('#daily_report').bootstrapTable({
            url: HOST + "index.php/Home/DayPost/getNbDayPostThis",   //请求后台的URL（*）
            method: 'get',      //请求方式（*）
            showExport: true,
            exportDataType: 'all',
            exportTypes:[ 'csv', 'txt', 'sql', 'doc', 'excel', 'xlsx', 'pdf'],
            // toolbar: '#toolbar',    //工具按钮用哪个容器
            striped: true,      //是否显示行间隔色
            cache: false,      //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
            pagination: true,     //是否显示分页（*）
            // sortable: false,      //是否启用排序
            // sortName: 'group_name', // 设置默认排序为 name
            // sortOrder: 'asc', // 设置排序为正序 asc
            queryParams: oTableInit.queryParams,//传递参数（*）
//                sidePagination: "server",   //分页方式：client客户端分页，server服务端分页（*）
            pageNumber: 1,      //初始化加载第一页，默认第一页
            pageSize: 14,      //每页的记录行数（*）
            search: true,      //是否显示表格搜索，此搜索是客户端搜索，不会进服务端，所以，个人感觉意义不大
            strictSearch: false,
            showColumns: true,     //是否显示所有的列
            showRefresh: true,     //是否显示刷新按钮
            minimumCountColumns: 2,    //最少允许的列数
            clickToSelect: true,    //是否启用点击选中行
            //height: 500,      //行高，如果没有设置height属性，表格自动根据记录条数觉得表格高度
            // uniqueId: "ID",      //每一行的唯一标识，一般为主键列
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
            columns : [
                [{
                    title :  '契约当日作业核对情况',
                    colspan: 16,
                    align : 'center'
                }],
                [{
                    title :  '机构',
                    colspan: 1,
                    align : 'center'
                },{
                    title : '保险合同',
                    colspan: 3,
                    align : 'center'
                },{
                    title : '承保短信',
                    colspan: 3,
                    align : 'center'
                },{
                    title : '通知书',
                    colspan: 3,
                    align : 'center'
                },{
                    title : '投保信息查询',
                    colspan: 3,
                    align : 'center'
                },{
                    title : '承保业务复核',
                    colspan: 3,
                    align : 'center'
                }
                ],[{
                    field : 'org',
                    title : '地区',
                    align : 'center'
                },{
                    field : 'bxht_sum',
                    title : '核对量',
                    align : 'center'
                },{
                    field : 'bxht_bug_sum',
                    title : '问题单数量',
                    align : 'center'
                },{
                    field : 'bxht_rate',
                    title : '正确率',
                    align : 'center'
                },{
                    field : 'cbdx_sum',
                    title : '核对量',
                    align : 'center'
                },{
                    field : 'cbdx_bug_sum',
                    title : '问题单数量',
                    align : 'center'
                },{
                    field : 'cbdx_rate',
                    title : '正确率',
                    align : 'center'
                },{
                    field : 'tzs_sum',
                    title : '核对量',
                    align : 'center'
                },{
                    field : 'tzs_bug_sum',
                    title : '问题单数量',
                    align : 'center'
                },{
                    field : 'tzs_rate',
                    title : '正确率',
                    align : 'center'
                },{
                    field : 'tbxx_sum',
                    title : '核对量',
                    align : 'center'
                },{
                    field : 'tbxx_bug_sum',
                    title : '问题单数量',
                    align : 'center'
                },{
                    field : 'tbxx_rate',
                    title : '正确率',
                    align : 'center'
                },{
                    field : 'cbyw_sum',
                    title : '核对量',
                    align : 'center'
                },{
                    field : 'cbyw_bug_sum',
                    title : '问题单数量',
                    align : 'center'
                },{
                    field : 'cbyw_rate',
                    title : '正确率',
                    align : 'center'
                }]]
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


$('.exportreport').click(function () {
    alert($("#dtp_input2").val());
});
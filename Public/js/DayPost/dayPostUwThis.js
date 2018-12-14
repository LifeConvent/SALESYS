
//重新加载TC
// function reloadTc(){
//     $('.fade').show();
//     $.ajax({
//         type : "get",
//         url :  'api/ReloadTc',
//         dataType : 'json',
//         async : true,
//         success : function(data) {
//             if(data){
//                 BootstrapDialog.alert("TC重加载成功")
//             }
//             $('.fade').hide()
//         }
//     });
// }

$(function () {

    $('#day_post').attr('class','active');
    $('#day_post_this').css('display','block');
    $('#day_post_uw_this').attr('class','active');

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
        $('#daily_report').bootstrapTable('refresh', {url: HOST + "index.php/Home/DayPost/getUwDayPostThis?queryDateStart="+$("#dtp_input2").val()+"&type=1"});
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
        $('#daily_report').bootstrapTable({
            url: HOST + "index.php/Home/DayPost/getUwDayPostThis",   //请求后台的URL（*）
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
                    title :  '核保当日作业核对情况',
                    colspan: 16,
                    align : 'center'
                }],
                [{
                    title :  '机构',
                    colspan: 1,
                    align : 'center'
                },{
                    title : '契约核保',
                    colspan: 3,
                    align : 'center'
                },{
                    title : '保全核保',
                    colspan: 3,
                    align : 'center'
                },{
                    title : '理赔核保',
                    colspan: 3,
                    align : 'center'
                },{
                    title : '续保核保',
                    colspan: 3,
                    align : 'center'
                },{
                    title : '核保短信',
                    colspan: 3,
                    align : 'center'
                }
                ],[{
                    field : 'org',
                    title : '地区',
                    align : 'center'
                },{
                    field : 'qyhb_sum',
                    title : '核对量',
                    align : 'center'
                },{
                    field : 'qyhb_bug_sum',
                    title : '问题单数量',
                    align : 'center'
                },{
                    field : 'qyhb_rate',
                    title : '正确率',
                    align : 'center'
                },{
                    field : 'bqhb_sum',
                    title : '核对量',
                    align : 'center'
                },{
                    field : 'bqhb_bug_sum',
                    title : '问题单数量',
                    align : 'center'
                },{
                    field : 'bqhb_rate',
                    title : '正确率',
                    align : 'center'
                },{
                    field : 'lphb_sum',
                    title : '核对量',
                    align : 'center'
                },{
                    field : 'lphb_bug_sum',
                    title : '问题单数量',
                    align : 'center'
                },{
                    field : 'lphb_rate',
                    title : '正确率',
                    align : 'center'
                },{
                    field : 'xbhb_sum',
                    title : '核对量',
                    align : 'center'
                },{
                    field : 'xbhb_bug_sum',
                    title : '问题单数量',
                    align : 'center'
                },{
                    field : 'xbhb_rate',
                    title : '正确率',
                    align : 'center'
                },{
                    field : 'hbssdx_sum',
                    title : '核对量',
                    align : 'center'
                },{
                    field : 'hbssdx_bug_sum',
                    title : '问题单数量',
                    align : 'center'
                },{
                    field : 'hbssdx_rate',
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

// function sumColCount(value){
//     var count = 0;
//     for (var i in value) {
//         count += value[i][this.field];
//     }
//     $('th[data-field='+this.field+'] div:first-child').html(this.title+"<span style='color:red'>&nbsp;"+count+"&nbsp;</span>");
//     return count+'';
// }
// function Log(info){
// 	setTimeout(function(){
// 		$('.progress-bar').html(info);
// 	},100);
// }
// (function(){
//     // $('.fade').show();
//     // initTable();
//     // // loadData(1);初始加载数据

//     //请求刷新TC
//     // $('.reloadtc').click(function(){
//     //     BootstrapDialog.confirm('刷新TC比较耗时，且会有多次数据库的读取，确认是否继续？', function(result){
//     //         if(result) {
//     //             reloadTc()
//     //         }
    //     });
    // });


    //刷新数据
    // $('.loadbxdata').click(function(){
    //     BootstrapDialog.confirm('生成数据会耗时较久，且影响历史数据，确认是否继续', function(result){
    //         if(result) {
    //             $('.fade').show();
    //             $.ajax({
    //                 type : "get",
    //                 url :  'api/ReloadTc',
    //                 dataType : 'json',
    //                 async : true,
    //                 success : function(data) {
    //                     if(data){
    //                         $('.fade').hide();
    //                         BootstrapDialog.alert("已经提交请求，稍等片刻后再此查询数据。")
    //                     }
    //                 }
    //             });
    //         }
    //     });
//     // });
//     $('.exportreport').click(function(){
//         alert($("#dtp_input2").val());
//          window.open(""+$("#dtp_input2").val());
//     });
//     $('.exportdetail').click(function(){
//         alert($("#dtp_input2").val());
//          window.open(""+$("#dtp_input2").val());
//     });
//     setTimeout(function(){$('.fade').hide()},4000)
// })();


$('.exportreport').click(function () {
    alert($("#dtp_input2").val());
});
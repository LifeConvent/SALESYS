$(function () {

    $('#day_post').attr('class','active');
    $('#day_post_this').css('display','block');
    $('#day_post_key_this').attr('class','active');

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
            url: HOST + "index.php/Home/DayPost/getDayPostKeyThis",   //请求后台的URL（*）
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
            pageSize: 16,      //每页的记录行数（*）
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
            onLoadSuccess : function(data) {
                var data = $('#daily_report').bootstrapTable('getData', true);
                //合并单元格
                mergeCells(data, "type", 0, $('#daily_report'));
            },
            columns : [
                [{
                    title :  '关键业务指标统计',
                    colspan: 10,
                    align : 'center'
                }],
                [{
                    title :  '指标名称',
                    colspan: 2,
                    rowspan: 1,
                    align : 'center',
                    valign: 'middle'
                },{
                    title : '件数',
                    colspan: 4,
                    align : 'center'
                },{
                    title : '金额',
                    colspan: 4,
                    align : 'center'
                }
                ],
                [{
                    field : 'type',
                    title : '归属系统',
                    colspan: 1,
                    align : 'center'
                },{
                    field : 'name',
                    title : '批处理名称',
                    colspan: 1,
                    align : 'center'
                },{
                    field : 'old_count',
                    title : '老核心',
                    colspan: 1,
                    align : 'center'
                },{
                    field : 'new_count',
                    title : '新核心',
                    colspan: 1,
                    align : 'center'
                },{
                    field : 'old_new_count',
                    title : '差异',
                    colspan: 1,
                    align : 'center'
                },{
                    field : 'is_same_count',
                    title : '一致率',
                    colspan: 1,
                    align : 'center'
                },{
                    field : 'old_fee',
                    title : '老核心',
                    colspan: 1,
                    align : 'center'
                },{
                    field : 'new_fee',
                    title : '新核心',
                    colspan: 1,
                    align : 'center'
                },{
                    field : 'old_new_fee',
                    title : '差异',
                    colspan: 1,
                    align : 'center'
                },{
                    field : 'is_same_fee',
                    title : '一致率',
                    colspan: 1,
                    align : 'center'
                }]
                // ,
                // [{
                //     title :  '新契约',
                //     colspan: 1,
                //     rowspan: 4,
                //     align : 'center',
                //     valign: 'middle'
                // },{
                //     title : 'E保通投保',
                //     colspan: 1,
                //     align : 'center',
                //     index:0
                // },{
                //     field : 'old_count',
                //     colspan: 1,
                //     align : 'center',
                //     index:0
                // },{
                //     field : 'new_count',
                //     colspan: 1,
                //     align : 'center',
                //     index:0
                // },{
                //     field : 'old_new_count',
                //     colspan: 1,
                //     align : 'center',
                //     index:0
                // },{
                //     field : 'is_same_count',
                //     colspan: 1,
                //     align : 'center',
                //     index:0
                // },{
                //     field : 'old_fee',
                //     colspan: 1,
                //     align : 'center',
                //     index:0
                // },{
                //     field : 'new_fee',
                //     colspan: 1,
                //     align : 'center',
                //     index:0
                // },{
                //     field : 'old_new_fee',
                //     colspan: 1,
                //     align : 'center',
                //     index:0
                // },{
                //     field : 'is_same_fee',
                //     colspan: 1,
                //     align : 'center',
                //     index:0
                // }],
                // [{
                //     title : 'E保通签单',
                //     colspan: 1,
                //     align : 'center',
                //     index:1
                // }],
                // [{
                //     title : '银保通投保',
                //     colspan: 1,
                //     align : 'center',
                //     index:2
                // }],
                // [{
                //     title : '银保通签单',
                //     colspan: 1,
                //     align : 'center',
                //     index:3
                // }],
                // [{
                //     title :  '核保',
                //     colspan: 1,
                //     rowspan: 2,
                //     align : 'center',
                //     valign: 'middle'
                // },{
                //     title : '新契约自核通过',
                //     colspan: 1,
                //     align : 'center',
                //     index:4
                // }],
                // [{
                //     title : '新契约自核不通过',
                //     colspan: 1,
                //     align : 'center',
                //     index:5
                // }],
                // [{
                //     title :  '理赔',
                //     colspan: 1,
                //     rowspan: 3,
                //     align : 'center',
                //     valign: 'middle'
                // },{
                //     title : '立案',
                //     colspan: 1,
                //     align : 'center'
                // }],
                // [{
                //     title : '简易案件自核通过',
                //     colspan: 1,
                //     align : 'center'
                // }],
                // [{
                //     title : '其他案件审批通过',
                //     colspan: 1,
                //     align : 'center'
                // }],
                // [{
                //     title :  '重要批处理',
                //     colspan: 1,
                //     rowspan: 10,
                //     align : 'center',
                //     valign: 'middle'
                // },{
                //     title : '满期终止',
                //     colspan: 1,
                //     align : 'center'
                // }],
                // [{
                //     title : '普通失效',
                //     colspan: 1,
                //     align : 'center'
                // }],
                // [{
                //     title : '生存金抽档',
                //     colspan: 1,
                //     align : 'center'
                // }],
                // [{
                //     title : '生存金发放',
                //     colspan: 1,
                //     align : 'center'
                // }],
                // [{
                //     title : '满期金抽档',
                //     colspan: 1,
                //     align : 'center'
                // }],
                // [{
                //     title : '满期金发放',
                //     colspan: 1,
                //     align : 'center'
                // }],
                // [{
                //     title : '续期、短期险续保',
                //     colspan: 1,
                //     align : 'center'
                // }],
                // [{
                //     title : '续保处理',
                //     colspan: 1,
                //     align : 'center'
                // }],
                // [{
                //     title : '年度保额分红',
                //     colspan: 1,
                //     align : 'center'
                // }],
                // [{
                //     title : '现金分红',
                //     colspan: 1,
                //     align : 'center'
                // }]
            ]
        });
    };

    // $('#daily_report').bootstrapTable('mergeCells', { index: 0, field: 'type', colspan: 1, rowspan: 4});
    // $('#daily_report').bootstrapTable('mergeCells', { index: 4, field: 'type', colspan: 1, rowspan: 2});
    // $('#daily_report').bootstrapTable('mergeCells', { index: 6, field: 'type', colspan: 1, rowspan: 3});
    // $('#daily_report').bootstrapTable('mergeCells', { index: 9, field: 'type', colspan: 1, rowspan: 10});

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

/**
 * 合并单元格
 * @param data 原始数据（在服务端完成排序）
 * @param fieldName 合并属性名称
 * @param colspan  合并列
 * @param target  目标表格对象
 */
function mergeCells(data,fieldName,colspan,target){
    //声明一个map计算相同属性值在data对象出现的次数和
    var sortMap = {};
    for(var i = 0 ; i < data.length ; i++){
        for(var prop in data[i]){
            if(prop == fieldName){
                var key = data[i][prop]
                if(sortMap.hasOwnProperty(key)){
                    sortMap[key] = sortMap[key] * 1 + 1;
                } else {
                    sortMap[key] = 1;
                }
                break;
            }
        }
    }
    for(var prop in sortMap){
        console.log(prop,sortMap[prop])
    }
    var index = 0;
    for(var prop in sortMap){
        var count = sortMap[prop] * 1;
        $(target).bootstrapTable('mergeCells',{index:index, field:fieldName, colspan: colspan, rowspan: count});
        index += count;
    }
}

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
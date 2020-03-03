$(function () {

    $('#day_post_two').attr('class','active');
    $('#day_post_all').css('display','block');
    $('#day_post_key_all').attr('class','active');

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
        if($('#dtp_input3').val()==null||$('#dtp_input3').val()==''||$('#dtp_input3').val()=='undefined'){
            $.scojs_message('请输入区间查询截止日期！', $.scojs_message.TYPE_ERROR);
            return;
        }
        $('#daily_report').bootstrapTable('removeAll');
        $('#daily_report').bootstrapTable('refresh', {url: HOST + "index.php/Home/DayPost/getDayPostKeyThis?queryDateStart="+$("#dtp_input2").val()+"&queryDateEnd="+$("#dtp_input3").val()+"&type=2"});
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
        $('#daily_report').bootstrapTable('removeAll');
        $('#daily_report').bootstrapTable('refresh', {url: HOST + "index.php/Home/DayPost/getDayPostKeyThis?queryDateStart="+$("#dtp_input2").val()+"&queryDateEnd="+$("#dtp_input3").val()+"&type=2"});
    });

    //1.初始化Table
    var oTable = new TableInit();
    oTable.Init();

});

var TableInit = function () {
    var oTableInit = new Object();
    //初始化Table
    oTableInit.Init = function () {
        $('#daily_report').bootstrapTable({
            url: HOST + "index.php/Home/DayPost/getDayPostKeyThis?type=2",   //请求后台的URL（*）
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
            pageSize: 21,      //每页的记录行数（*）
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
                mergeCells(data, "ZB_NAME", 0, $('#daily_report'));
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
                    field : 'ZB_NAME',
                    title : '归属系统',
                    colspan: 1,
                    align : 'center',
                    valign: 'middle'
                },{
                    field : 'ZB_TYPE',
                    title : '指标名称',
                    colspan: 1,
                    align : 'center',
                    valign: 'middle'
                },{
                    field : 'NUM_OLD_SUM',
                    title : '老核心',
                    colspan: 1,
                    align : 'center'
                },{
                    field : 'NUM_NEW_SUM',
                    title : '新核心',
                    colspan: 1,
                    align : 'center'
                },{
                    field : 'NUM_DIFF',
                    title : '差异',
                    colspan: 1,
                    align : 'center'
                },{
                    field : 'NUM_SAME_RADIO',
                    title : '一致率',
                    colspan: 1,
                    align : 'center'
                },{
                    field : 'FEE_OLD_SUM',
                    title : '老核心',
                    colspan: 1,
                    align : 'center'
                },{
                    field : 'FEE_NEW_SUM',
                    title : '新核心',
                    colspan: 1,
                    align : 'center'
                },{
                    field : 'FEE_DIFF',
                    title : '差异',
                    colspan: 1,
                    align : 'center'
                },{
                    field : 'FEE_SAME_RADIO',
                    title : '一致率',
                    colspan: 1,
                    align : 'center'
                }]
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
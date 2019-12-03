/**
 * Created by lawrance on 2017/1/11.
 */

$(function () {

    $('#day_post_other').attr('class','active');
    $('#day_post_three').css('display','block');
    $('#day_post_tc').attr('class','active');

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
        //     return;
        // }
        $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/DayPost/getTcCondition?queryDateStart="+$("#dtp_input2").val()+"&queryDateEnd="+$("#dtp_input3").val()+"&type=2"});
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
        $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/DayPost/getTcCondition?queryDateStart="+$("#dtp_input2").val()+"&queryDateEnd="+$("#dtp_input3").val()+"&type=2"});
    });

    //1.初始化Table
    var oTable = new TableInit();
    oTable.Init();
});

var TableInit = function () {
    countFooter =  function(v){
        var count = 0;
        for (var i in v) {
            if(v[i]['org']=='小计'){
                continue;
            }
            count += v[i][this.field];
        }
        return count+'';
    };
    var oTableInit = new Object();
    //初始化Table
    oTableInit.Init = function () {
        $('#daily_report2').bootstrapTable({
            url: HOST + "index.php/Home/DayPost/getTcCondition",   //请求后台的URL（*）
            method: 'get',      //请求方式（*）
            // toolbar: '#toolbar',    //工具按钮用哪个容器
            striped: true,      //是否显示行间隔色
            showExport: true,
            exportDataType: 'all',
            exportTypes:[ 'csv', 'txt', 'sql', 'doc', 'excel', 'xlsx', 'pdf'],
            cache: false,      //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
            pagination: true,     //是否显示分页（*）
            // sortable: false,      //是否启用排序
            // sortName: 'group_name', // 设置默认排序为 name
            // sortOrder: 'asc', // 设置排序为正序 asc
            queryParams: oTableInit.queryParams,//传递参数（*）
//                sidePagination: "server",   //分页方式：client客户端分页，server服务端分页（*）
            pageNumber: 1,      //初始化加载第一页，默认第一页
            pageSize: 24,      //每页的记录行数（*）
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
                    title :  '问题解决情况汇总',
                    colspan: 6,
                    align : 'center'
                }],
                [{
                    title :  '',
                    colspan: 1,
                    align : 'center'
                },{
                    title : '问题整体情况',
                    colspan: 3,
                    align : 'center'
                },{
                    title : '当日处理情况',
                    colspan: 2,
                    align : 'center'
                }
                ],[{
                    field : 'sys',
                    title : '所属子系统',
                    align : 'center'
                },{
                    field : 'bug_sum',
                    title : '累计问题总数',
                    align : 'center'
                },{
                    field : 'bug_close_sum',
                    title : '累计关闭/取消问题总数',
                    align : 'center'
                },{
                    field : 'bug_no_close_sum',
                    title : '累计未关闭问题总数',
                    align : 'center'
                },{
                    field : 'bug_this_sum',
                    title : '当日新增问题总数',
                    align : 'center'
                },{
                    field : 'bug_this_close_sum',
                    title : '当日关闭/取消问题总数',
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
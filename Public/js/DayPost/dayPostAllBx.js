/**
 * Created by lawrance on 2017/1/11.
 */

$(function () {

    $('#day_post_two').attr('class','active');
    $('#day_post_all').css('display','block');
    $('#day_post_sum').attr('class','active');

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
        $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/DayPost/loadDayPostData?queryDateStart="+$("#dtp_input2").val()+"&type=2"});
    });
    // $('#form_date2').datetimepicker({
    //     language:  'zh-CN',
    //     weekStart: 1,
    //     todayBtn:  1,
    //     autoclose: 1,
    //     todayHighlight: 1,
    //     startView: 2,
    //     minView: 2,
    //     forceParse: 0
    // }).on('changeDate', function(ev){
    //     if($('#dtp_input2').val()==null||$('#dtp_input2').val()==''||$('#dtp_input2').val()=='undefined'){
    //         $.scojs_message('请输入区间查询起始日期！', $.scojs_message.TYPE_ERROR);
    //         return;
    //     }
    //     $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/DayPost/loadDayPostData?queryDateStart="+$("#dtp_input2").val()+"&type=2"});
    // });

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
            url: HOST + "index.php/Home/DayPost/loadDayPostData?queryDateStart="+$("#dtp_input2").val()+"&type=2",   //请求后台的URL（*）
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
            pageSize: 20,      //每页的记录行数（*）
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
                    title :  '累计作业核对情况',
                    colspan: 23,
                    align : 'center'
                }],[{
                    title :  '区域',
                    colspan: 1,
                    align : 'center'
                },{
                    title : '契约作业/核保作业',
                    colspan: 7,
                    align : 'center'
                },{
                    title : '保全作业',
                    colspan: 8,
                    align : 'center'
                },{
                    title : '理赔作业',
                    colspan: 7,
                    align : 'center'
                }
                ],[{
                    field : 'ORGAN_NAME',
                    title : '地区',
                    align : 'center',
                    valign: 'middle'
                },{
                    field : 'NBUW_OLD_NUM',
                    title : '老核<br>心作<br>业量',
                    footerFormatter:countFooter,
                    align : 'center'
                },{
                    title : '新核<br>心应<br>作业',
                    align : 'center',
                    formatter:function(value, row, index){
                        if(row.ORGAN_NAME=='分公司核保室'){
                            $('#jishu').text(parseInt($('#jishu').text()) + parseInt(new Number(row.NBUW_OLD_NUM/2).toFixed(0)));
                            return new Number(row.NBUW_OLD_NUM/2).toFixed(0);
                        }else if(row.ORGAN_NAME=='小计'){
                            $('#jishu').text(parseInt($('#jishu').text()) + parseInt(new Number(row.NBUW_OLD_NUM).toFixed(0)));
                        }else if(row.ORGAN_NAME=='总计'){
                            var sum =  $('#jishu').text();
                            $('#jishu').text(0);
                            return sum;
                        }else if(row.ORGAN_NAME=='作业中心'){
                            return '-';
                        }
                        return row.NBUW_OLD_NUM;
                    }
                },{
                    field : 'NBUW_NEW_NUM',
                    title : '新核<br>心作<br>业量',
                    footerFormatter:countFooter,
                    align : 'center'
                },{
                    field : 'NBUW_SAME_NUM',
                    title : '比对<br>一致<br>数量',
                    align : 'center',
                    valign: 'middle'
                },{
                    field : 'NBUW_PRO_NUM',
                    title : '问题单<br>数量',
                    footerFormatter:countFooter,
                    align : 'center',
                    valign: 'middle'
                },{
                    field : 'NBUW_FINISH_RADIO',
                    title : '任务<br>完成率',
                    align : 'center',
                    valign: 'middle',
                    formatter:function(value, row, index){
                        if(row.ORGAN_NAME=='作业中心'){
                            return '-';
                        }
                        return row.NBUW_FINISH_RADIO;
                    }
                },{
                    field : 'NBUW_SAME_RADIO',
                    title : '一<br>致<br>率',
                    align : 'center',
                    // formatter:function(value, row, index){
                    //     if(row.NBUW_NEW_NUM==null||row.NBUW_NEW_NUM==0){
                    //         return "-";
                    //     }
                    //     return (row.NBUW_SAME_NUM*100/row.NBUW_NEW_NUM).toFixed(2)+"%";
                    // }
                },{
                    field : 'CS_OLD_NUM',
                    title : '老核<br>心作<br>业量',
                    footerFormatter:countFooter,
                    align : 'center'
                },{
                    title : '新核<br>心应<br>作业',
                    align : 'center',
                    formatter:function(value, row, index){
                        return new Number(row.CS_OLD_NUM/2).toFixed(0);
                    }
                },{
                    field : 'CS_NEW_NUM',
                    title : '新核<br>心作<br>业量',
                    footerFormatter:countFooter,
                    align : 'center'
                },{
                    field : 'CS_SAME_NUM',
                    title : '比对<br>一致<br>数量',
                    align : 'center'
                },{
                    field : 'CS_NO_NUM',
                    title : '无需<br>操作<br>件数',
                    align : 'center'
                },{
                    field : 'CS_PRO_NUM',
                    title : '问题单<br>数量',
                    align : 'center',
                    valign: 'middle'
                },{
                    title : '任务<br>完成率',
                    field : 'CS_FINISH_RADIO',
                    align : 'center',
                    valign: 'middle'
                },{
                    title : '一<br>致<br>率',
                    align : 'center',
                    field : 'CS_SAME_RADIO',
                    align : 'center',
                    // formatter:function(value, row, index){
                    //     if(row.CS_NEW_NUM==null||row.CS_NEW_NUM==0){
                    //         return "-";
                    //     }
                    //     return (row.CS_SAME_NUM*100/row.CS_NEW_NUM).toFixed(2)+"%";
                    // }
                },{
                    field : 'CLM_OLD_NUM',
                    title : '老核<br>心作<br>业量',
                    footerFormatter:countFooter,
                    align : 'center'
                },{
                    title : '新核<br>心应<br>作业',
                    align : 'center',
                    formatter:function(value, row, index){
                        return new Number(row.CLM_OLD_NUM/2).toFixed(0);
                    }
                },{
                    field : 'CLM_NEW_NUM',
                    title : '新核<br>心作<br>业量',
                    footerFormatter:countFooter,
                    align : 'center'
                },{
                    field : 'CLM_SAME_NUM',
                    title : '比对<br>一致<br>数量',
                    align : 'center'
                },{
                    field : 'CLM_PRO_NUM',
                    title : '问题单<br>数量',
                    footerFormatter:countFooter,
                    align : 'center',
                    valign: 'middle'
                },{
                    field : 'CLM_FINISH_RADIO',
                    title : '任务<br>完成率',
                    align : 'center',
                    valign: 'middle'
                },{
                    field : 'CLM_SAME_RADIO',
                    title : '一<br>致<br>率',
                    align : 'center',
                    // formatter:function(value, row, index){
                    //     if(row.CLM_NEW_NUM==null||row.CLM_NEW_NUM==0){
                    //         return "-";
                    //     }
                    //     return (row.CLM_SAME_NUM*100/row.CLM_NEW_NUM).toFixed(2)+"%";
                    // }
                }
                ]]
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
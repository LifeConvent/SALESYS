/**
 * Created by lawrance on 2017/1/11.
 */

$(function () {

    $('#weChat').attr('class','active');
    $('#weChat_sub').css('display','block');
    $('#weChat_groupSend').attr('class','active');

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
            return;
        }
        $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/Method/loadDayPostData?queryDateStart="+$("#dtp_input2").val()+"&queryDateEnd="+$("#dtp_input3").val()+"&type=2"});
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
        $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/Method/loadDayPostData?queryDateStart="+$("#dtp_input2").val()+"&queryDateEnd="+$("#dtp_input3").val()+"&type=2"});
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
            url: HOST + "index.php/Home/Method/loadDayPostData?queryDateStart="+$("#dtp_input2").val()+"&queryDateEnd="+$("#dtp_input3").val()+"&type=2",   //请求后台的URL（*）
            method: 'get',      //请求方式（*）
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
                return '表内查询';
            },

            columns : [
                [{
                    title :  '区域',
                    colspan: 1,
                    align : 'center'
                },{
                    title : '契约作业/核保作业',
                    colspan: 12,
                    align : 'center'
                },{
                    title : '保全作业',
                    colspan: 10,
                    align : 'center'
                },{
                    title : '理赔作业',
                    colspan: 10,
                    align : 'center'
                }

                ],[{
                    field : 'org',
                    title : '地区',
                    footerFormatter:function(){
                        return '合计';
                    },
                    align : 'center'
                },{
                    field : 'nb_old_count',
                    title : '老核<br>心作<br>业量',
                    footerFormatter:countFooter,
                    align : 'center'
                },{
                    field : 'nb_new_count',
                    title : '新核<br>心作<br>业量',
                    footerFormatter:countFooter,
                    align : 'center'
                },{
                    // field : 'nb_cannt_count',
                    title : '无法<br>操作<br>件数',
                    // footerFormatter:countFooter,
                    formatter:function(value, row, index){
                        return row.nb_old_count - row.nb_new_count;
                    },
                    align : 'center'
                },{
                    field : 'nb_fix_count',
                    title : '补做<br>既往<br>件数',
                    footerFormatter:countFooter,
                    align : 'center'
                },{
                    field : 'nb_pro_count',
                    title : '问题<br>单数<br>量',
                    footerFormatter:countFooter,
                    align : 'center'
                },{
                    field : 'nb_profix_count',
                    title : '问题<br>单解<br>决量',
                    footerFormatter:countFooter,
                    align : 'center'
                },{
                    field : 'nb_bfsame_count',
                    title : '保费<br>一致<br>数量',
                    footerFormatter:countFooter,
                    align : 'center'
                },{
                    field : 'nb_besame_count',
                    title : '保额<br>一致<br>数量',
                    footerFormatter:countFooter,
                    align : 'center'
                },{
                    title : '任务<br>完成率',
                    formatter:function(value, row, index){
                        if(row.nb_old_count==0){
                            return '100.00%'
                        }
                        // if($("#dtp_input2").val() ==''){
                        return "100.00%";
                        // }
                        // return ((row.nb_old_count - row.nb_new_count + row.nb_new_count)*100/row.nb_old_count).toFixed(2)+"%";
                    },
                    align : 'center'
                },{
                    title : '累计<br>一致率',
                    align : 'center',
                    formatter:function(value, row, index){
                        if(row.nb_old_count==0){
                            return '100.00%'
                        }
                        // if($("#dtp_input2").val()!=''){
                        //     return ((row.nb_new_count)*100/row.nb_old_count).toFixed(2)+"%";
                        // }
                        return ((row.nb_new_count+row.nb_fix_count)*100/row.nb_old_count).toFixed(2)+"%";
                    },
                    align : 'center'
                },{
                    title : '保费<br>一致率',
                    align : 'center',
                    formatter:function(value, row, index){
                        if(row.nb_old_count==0){
                            return '100.00%'
                        }
                        return ((row.nb_bfsame_count)*100/row.nb_old_count).toFixed(2)+"%";
                    },
                    align : 'center'
                },{
                    title : '保额<br>一致率',
                    align : 'center',
                    formatter:function(value, row, index){
                        if(row.nb_old_count==0){
                            return '100.00%'
                        }
                        return ((row.nb_besame_count)*100/row.nb_old_count).toFixed(2)+"%";
                    },
                    align : 'center'
                },{
                    field : 'cs_old_count',
                    title : '老核<br>心作<br>业量',
                    footerFormatter:countFooter,
                    align : 'center'
                },{
                    field : 'cs_new_count',
                    title : '新核<br>心作<br>业量',
                    footerFormatter:countFooter,
                    align : 'center'
                },{
                    // field : 'nb_cannt_count',
                    title : '无法<br>操作<br>件数',
                    // footerFormatter:countFooter,
                    formatter:function(value, row, index){
                        return row.cs_old_count - row.cs_new_count;
                    },
                    align : 'center'
                },{
                    field : 'cs_fix_count',
                    title : '补做<br>既往<br>件数',
                    footerFormatter:countFooter,
                    align : 'center'
                },{
                    field : 'cs_pro_count',
                    title : '问题<br>单数<br>量',
                    footerFormatter:countFooter,
                    align : 'center'
                },{
                    field : 'cs_profix_count',
                    title : '问题<br>单解<br>决量',
                    footerFormatter:countFooter,
                    align : 'center'
                },{
                    field : 'cs_fysame_count',
                    title : '金额<br>一致<br>数量',
                    footerFormatter:countFooter,
                    align : 'center'
                },{
                    title : '任务<br>完成率',
                    formatter:function(value, row, index){
                        if(row.cs_old_count==0){
                            return '100.00%'
                        }
                        // if($("#dtp_input2").val() ==''){
                        return ((row.cs_old_count)*100/row.cs_old_count).toFixed(2)+"%";
                        // }
                        // return ((row.cs_old_count - row.cs_new_count + row.cs_new_count)*100/row.cs_old_count).toFixed(2)+"%";
                    },
                    align : 'center'
                },{
                    title : '累计<br>一致率',
                    align : 'center',
                    formatter:function(value, row, index){
                        if(row.cs_old_count==0){
                            return '100.00%'
                        }
                        // if($("#dtp_input2").val()!=''){
                        //     return ((row.cs_new_count)*100/row.cs_old_count).toFixed(2)+"%";
                        // }
                        return ((row.cs_new_count+row.cs_fix_count)*100/row.cs_old_count).toFixed(2)+"%";
                    },
                    align : 'center'
                },{
                    title : '金额<br>一致率',
                    align : 'center',
                    formatter:function(value, row, index){
                        if(row.cs_old_count==0){
                            return '100.00%'
                        }
                        return ((row.cs_fysame_count)*100/row.cs_old_count).toFixed(2)+"%";
                    },
                    align : 'center'
                },{
                    field : 'clm_old_count',
                    title : '老核<br>心作<br>业量',
                    footerFormatter:countFooter,
                    align : 'center'
                },{
                    field : 'clm_new_count',
                    title : '新核<br>心作<br>业量',
                    footerFormatter:countFooter,
                    align : 'center'
                },{
                    // field : 'nb_cannt_count',
                    title : '无法<br>操作<br>件数',
                    // footerFormatter:countFooter,
                    formatter:function(value, row, index){
                        return row.clm_old_count - row.clm_new_count;
                    },
                    align : 'center'
                },{
                    field : 'clm_fix_count',
                    title : '补做<br>既往<br>件数',
                    footerFormatter:countFooter,
                    align : 'center'
                },{
                    field : 'clm_pro_count',
                    title : '问题<br>单数<br>量',
                    footerFormatter:countFooter,
                    align : 'center'
                },{
                    field : 'clm_profix_count',
                    title : '问题<br>单解<br>决量',
                    footerFormatter:countFooter,
                    align : 'center'
                },{
                    field : 'clm_fysame_count',
                    title : '金额<br>一致<br>数量',
                    footerFormatter:countFooter,
                    align : 'center'
                },{
                    title : '任务<br>完成率',
                    formatter:function(value, row, index){
                        if(row.clm_old_count==0){
                            return '100.00%'
                        }
                        // if($("#dtp_input2").val() ==''){
                        return ((row.clm_old_count)*100/row.clm_old_count).toFixed(2)+"%";
                        // }
                        // return ((row.clm_old_count - row.clm_new_count + row.clm_new_count)*100/row.clm_old_count).toFixed(2)+"%";
                    },
                    align : 'center'
                },{
                    title : '累计<br>一致率',
                    align : 'center',
                    formatter:function(value, row, index){
                        if(row.clm_old_count==0){
                            return '100.00%'
                        }
                        // if($("#dtp_input2").val()!=''){
                        //     return ((row.clm_new_count)*100/row.clm_old_count).toFixed(2)+"%";
                        // }
                        return ((row.clm_new_count+row.clm_fix_count)*100/row.clm_old_count).toFixed(2)+"%";
                    },
                    align : 'center'
                },{
                    title : '金额<br>一致率',
                    align : 'center',
                    formatter:function(value, row, index){
                        if(row.clm_old_count==0){
                            return '100.00%'
                        }
                        return ((row.clm_fysame_count)*100/row.clm_old_count).toFixed(2)+"%";
                    },
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
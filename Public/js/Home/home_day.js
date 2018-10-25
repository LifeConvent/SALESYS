
// 加载初始数据
// function loadData(init){
//     $('.fade').show();
//     $.ajax({
//         type : "get",
//         url :  'api/DailyReport/'+$("#dtp_input2").val(),
//         dataType : 'json',
//         success : function(data) {
//             if(data){
//                 $('#daily_report').bootstrapTable('load', data);
//             }
//             if(init){
//
//             }else{
//                 $('.fade').hide()
//             }
//         }
//     });
// }


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



function initTable() {
    // Log("初始化页面表格。");
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
    $('#daily_report').bootstrapTable({
        showFooter:false,
        columns : [
            [{
                title : '',
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
                    field : 'nb_cannt_count',
                    title : '无法<br>操作<br>件数',
                    footerFormatter:countFooter,
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
                        if($("#dtp_input2").val() ==''){
                            return ((row.nb_cannt_count + row.nb_new_count + row.nb_fix_count)*100/row.nb_old_count).toFixed(2)+"%";
                        }
                    	return ((row.nb_cannt_count + row.nb_new_count)*100/row.nb_old_count).toFixed(2)+"%";
                    },
                    align : 'center'
                },{
                    title : '当日<br>一致率',
                    align : 'center',
                    formatter:function(value, row, index){
                        if(row.nb_old_count==0){
                            return '100.00%'
                        }
                        if($("#dtp_input2").val()!=''){
                            return ((row.nb_new_count)*100/row.nb_old_count).toFixed(2)+"%";
                        }
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
                    field : 'cs_cannt_count',
                    title : '无法<br>操作<br>件数',
                    footerFormatter:countFooter,
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
                        if($("#dtp_input2").val() ==''){
                            return ((row.cs_cannt_count + row.cs_new_count + row.cs_fix_count)*100/row.cs_old_count).toFixed(2)+"%";
                        }
                    	return ((row.cs_cannt_count + row.cs_new_count)*100/row.cs_old_count).toFixed(2)+"%";
                    },
                    align : 'center'
                },{
                    title : '当日<br>一致率',
                    align : 'center',
                    formatter:function(value, row, index){
                        if(row.cs_old_count==0){
                            return '100.00%'
                        }
                        if($("#dtp_input2").val()!=''){
                            return ((row.cs_new_count)*100/row.cs_old_count).toFixed(2)+"%";
                        }
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
                    field : 'clm_cannt_count',
                    title : '无法<br>操作<br>件数',
                    footerFormatter:countFooter,
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
                        if($("#dtp_input2").val() ==''){
                            return ((row.clm_cannt_count + row.clm_new_count + row.clm_fix_count)*100/row.clm_old_count).toFixed(2)+"%";
                        }
                    	return ((row.clm_cannt_count + row.clm_new_count)*100/row.clm_old_count).toFixed(2)+"%";
                    },
                    align : 'center'
                },{
                    title : '当日<br>一致率',
                    align : 'center',
                    formatter:function(value, row, index){
                        if(row.clm_old_count==0){
                            return '100.00%'
                        }
                        if($("#dtp_input2").val()!=''){
                            return ((row.clm_new_count)*100/row.clm_old_count).toFixed(2)+"%";
                        }
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
(function(){
    $('.fade').show();
    initTable();
    
    // loadData(1);初始加载数据
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
        // loadData();
    });
    //请求刷新TC
    // $('.reloadtc').click(function(){
    //     BootstrapDialog.confirm('刷新TC比较耗时，且会有多次数据库的读取，确认是否继续？', function(result){
    //         if(result) {
    //             reloadTc()
    //         }
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
    // });
    $('.exportreport').click(function(){
         window.open(""+$("#dtp_input2").val());
    });
    $('.exportdetail').click(function(){
         window.open(""+$("#dtp_input2").val());
    });
    setTimeout(function(){$('.fade').hide()},4000)
})();

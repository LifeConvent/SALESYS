/**
 * Created by lawrance on 2017/1/11.
 */

$(function () {

    $('#home').attr('class','active');
    $('#data_ub').css('display','block');
    $('#uw_define').attr('class','active');

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
            // $.scojs_message('此次查询为单日查询！', $.scojs_message.TYPE_ERROR);
        }
        $('#daily_report2').bootstrapTable('removeAll');
        $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/PersonDefineFinishWork/getUwDefine?queryDateStart="+$('#dtp_input2').val()+"&queryDateEnd="+$('#dtp_input3').val()});
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
        $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/PersonDefineFinishWork/getUwDefine?queryDateStart="+$('#dtp_input2').val()+"&queryDateEnd="+$('#dtp_input3').val()});
    });

    //1.初始化Table
    var oTable = new TableInit();
    oTable.Init();
//        $[sessionStorage] = oTable.queryParams;

    // //2.初始化Button的点击事件
    // var oButtonInit = new ButtonInit();
    // oButtonInit.Init();
    //
    // $('input').iCheck({
    //     checkboxClass: 'icheckbox_square-green',
    //     radioClass: 'iradio_square-green',
    //     increaseArea: '2%' // optional
    // });


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
            url: HOST + "index.php/Home/PersonDefineFinishWork/getUwDefine",   //请求后台的URL（*）
            method: 'get',      //请求方式（*）
            showExport: true,
            exportDataType: 'all',
            exportTypes:[ 'csv', 'txt', 'sql', 'doc', 'excel', 'xlsx', 'pdf'],
            toolbar: '#toolbar',    //工具按钮用哪个容器
            striped: true,      //是否显示行间隔色
            cache: false,      //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
            pagination: true,     //是否显示分页（*）
            sortable: true,      //是否启用排序
            sortName: 'ID', // 设置默认排序为 name
            sortOrder: 'asc', // 设置排序为正序 asc
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
            },{
                field: 'business_code',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '关键业务号',
                width:200
            }, {
                field: 'user_name',
                sortable: true,
                valign: 'middle',
                align: 'center',
                title: '操作员',
                width:150
            },  {
                field: 'organ_code',
                sortable: true,
                valign: 'middle',
                align: 'center',
                title: '作业机构',
                width:100
            }, {
                field: 'insert_date',
                sortable: true,
                valign: 'middle',
                align: 'center',
                title: '操作时间',
                width:100
            },  {
                field: 'business_name',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '业务节点',
                width:100
            },{
                field: 'operation',
                title: '操作',
                align: 'center',
                valign: 'middle',
                formatter: "actionFormatter",
                events: "actionEvents",
                width:100,
                clickToSelect: false
            }, {
                field: 'tc_id',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '缺陷号',
                width:150
            }, {
                field: 'result',
                align: 'center',
                valign: 'middle',
                sortable: true,
                title: '核对结果',
                width:100
                // formatter: "actionFormatter_result",
                // events: "actionEvents_result",
            },{
                field: 'hd_user_name',
                align: 'center',
                valign: 'middle',
                title: '核对人',
                sortable: true,
                width:100
                // formatter: "actionFormatter_hd_user",
                // events: "actionEvents_hd_user",
            },{
                field: 'sys_insert_date',
                align: 'center',
                valign: 'middle',
                title: '核对日期',
                sortable: true,
                width:100
                // formatter: "actionFormatter_in_date",
                // events: "actionEvents_in_date",
            },{
                field: 'description',
                align: 'center',
                valign: 'middle',
                title: '存在问题',
                width:200
                // formatter: "actionFormatter_des",
                // events: "actionEvents_des",
            },{
                field: 'status',
                align: 'center',
                valign: 'middle',
                title: '解决进度',
                sortable: true,
                width:200
                // formatter: "actionFormatter_status",
                // events: "actionEvents_status",
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


function actionFormatter(value, row, index) {
    if(row.tc_id != "-"||row.result != "-"){
        return '-';
    }else{
        return '<button type="button" class="btn btn-primary modify" style="height: 20pt;width: 30pt"><span style="margin-left:-5pt;">确认</span></button>';
    }
}

window.actionEvents = {
    'click .modify': function (e, value, row, index) {
        // ajax提交数据
        debugger;
        // var link_business = $("#business"+index).val();
        // var description = $("#des"+index).val();
        var business_name = row.business_name;
        var policy_code = row.business_code;
        var business_code = row.business_code;
        var username = $("#username").text();
            $.ajax({
                type: "POST", //用POST方式传输
                url: HOST + "index.php/Home/PersonDefineFinishWork/updatePublicDefine", //目标地址.
                dataType: "json", //数据格式:JSON
                data: {username: username, business_code: business_code, policy_code: policy_code, business_name:business_name},
                success: function (result) {
                    if (result.status == 'success') {
                        debugger;
                        $.scojs_message(result.message, $.scojs_message.TYPE_OK);
                        //单行刷新数据
                        var sysDate = new Date().getFullYear()+'-'+(new Date().getMonth()+1) +'-'+new Date().getDate();
                        var _data = { "result" : "正确", "hd_user_name" : username, "sys_insert_date" :sysDate }
                        $('#daily_report2').bootstrapTable('updateRow', {index: index, row: _data});
                    } else if (result.status == 'failed') {
                        debugger;
                        $.scojs_message(result.message, $.scojs_message.TYPE_ERROR);
                        if(result.lock == 'true'){
                            window.location.href = HOST + "index.php/Home/Index/index";
                        }
                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert(XMLHttpRequest);
                    alert(textStatus);
                    alert(errorThrown);
                }
            });
    }
};

function actionFormatter_result(value, row, index) {
    if(row.tc_id != "-"){
        return '<input id="des'+index+'" class="form-control modify" style="height: 20pt;width: 130pt" disabled placeholder="'+ row.description +'"></input>';
    }else{
        return '<input id="des'+index+'" class="form-control modify" style="height: 20pt;width: 130pt" placeholder="'+ row.description +'"></input>';
    }
}

window.actionEvents_des = {
    'click .modify': function (e, value, row, index) {
    }
};

function actionFormatter_business(value, row, index) {
    if(row.is_same == "是"){
        return '<input id="business'+index+'"  class="form-control modify" style="height: 20pt;width: 130pt" disabled placeholder="'+ row.link_business +'"></input>';
    }else{
        return '<input id="business'+index+'"  class="form-control modify" style="height: 20pt;width: 130pt" placeholder="'+ row.link_business +'"></input>';
    }
}

window.actionEvents_business = {
    'click .modify': function (e, value, row, index) {
    }
};
/**
 * Created by lawrance on 2017/1/11.
 */

$(function () {

    $('#cap_define').attr('class','active');
    $('#cap_define_list').css('display','block');
    $('#cap_define_clm').attr('class','active');

    $.scojs_message("收付费预制盘数据核对工作已经停止，即日起无需核对，请知悉！", $.scojs_message.TYPE_ERROR);

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
        $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/PersonDefineFinishWork/getCapDefineCs?type=005&queryDateStart="+$('#dtp_input2').val()+"&queryDateEnd="+$('#dtp_input3').val()});
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
        $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/PersonDefineFinishWork/getCapDefineCs?type=005&queryDateStart="+$('#dtp_input2').val()+"&queryDateEnd="+$('#dtp_input3').val()});
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
        $('#daily_report2').bootstrapTable({
            url: HOST + "index.php/Home/PersonDefineFinishWork/getCapDefineCs?type=005",   //请求后台的URL（*）
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
            pageSize: 5,      //每页的记录行数（*）
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
                checkbox: true,
                align: 'center',
                valign: 'middle'
            },{
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
                width:170
            }, {
                field: 'business_code',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '业务号',
                width:170
            }, {
                field: 'policy_code',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '保单号',
                width:170
            },  {
                field: 'bank_account',
                sortable: true,
                valign: 'middle',
                align: 'center',
                title: '银行账户',
                width:250
            }, {
                field: 'bank_code',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '银行代码',
                width:100
            }, {
                field: 'acco_name',
                sortable: true,
                valign: 'middle',
                align: 'center',
                title: '户名',
                width:150
            }, {
                field: 'due_time',
                sortable: true,
                valign: 'middle',
                align: 'center',
                title: '应缴日期',
                width:100
            }, {
                field: 'biz_source_name',
                sortable: true,
                valign: 'middle',
                align: 'center',
                title: '业务来源',
                width:100
            }, {
                field: 'arap_flag',
                sortable: true,
                valign: 'middle',
                align: 'center',
                title: '收付标志',
                width:100
            }, {
                field: 'business_date',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '制盘时间',
                width:100
            }, {
                field: 'sales_channel_name',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '渠道',
                width:100
            }, {
                field: 'fee_amount',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '收付费金额',
                width:120
            }, {
                field: 'busi_fee_amount',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '理赔金额',
                width:100
            }, {
                field: 'business_name',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '业务节点',
                width:100
            },{
                field: 'is_same',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '系统比对是否一致',
                width:150
            },{
                field: 'organ_code',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '机构',
                width:100
            },{
                field: 'reference_item',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '标记',
                width:100
            },{
                field: 'result',
                align: 'center',
                valign: 'middle',
                sortable: true,
                title: '核对结果',
                width:100
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
                field: 'tc_id',
                sortable: true,
                align: 'center',
                valign: 'middle',
                title: '缺陷号',
                width:190,
                formatter: "actionFormatter_tc",
                events: "actionEvents_tc",
            }, {
                field: 'description',
                align: 'center',
                valign: 'middle',
                title: '存在问题',
                width:230,
                formatter: "actionFormatter_result",
                events: "actionEvents_result",
            },{
                field: 'operation',
                title: '操作',
                align: 'center',
                valign: 'middle',
                formatter: "actionFormatter",
                events: "actionEvents",
                width:150,
                clickToSelect: false
            },{
                field: 'business_date',
                sortable: true,
                align: 'center',
                visible:false,
                title: '-',
                width:120,
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
        return '<button type="button" class="btn btn-primary modify" style="height: 20pt;width: 30pt"><span style="margin-left:-5pt;">正确</span></button><button type="button" class="btn btn-danger modify_danger" style="height: 20pt;width: 30pt;margin-left: 5pt"><span style="margin-left:-5pt;">错误</span></button>';
    }
}

window.actionEvents = {
    'click .modify': function (e, value, row, index) {
        // ajax提交数据
        debugger;
        // var link_business = $("#business"+index).val();
        var description = $("#des"+index).val();
        var business_name = row.business_name;
        var unit_number = row.unit_number;
        var policy_code = row.policy_code;
        var business_code = row.business_code;
        var insert_date = row.business_date;
        var username = $("#username").text();
        if(description!=""&&description!="-"){
            $.scojs_message("输入错误原因后只可点击错误按钮！", $.scojs_message.TYPE_ERROR);
            return;
        }
            $.ajax({
                type: "POST", //用POST方式传输
                url: HOST + "index.php/Home/PersonDefineFinishWork/updateCapDefineCs", //目标地址.
                dataType: "json", //数据格式:JSON
                data: {result: "正确",username: username, business_code: unit_number, link_business:'',policy_code: policy_code, business_name:business_name,insert_date:insert_date},
                success: function (result) {
                    if (result.status == 'success') {
                        debugger;
                        //单行刷新数据
                        var sysDate = new Date().getFullYear()+'-'+(new Date().getMonth()+1) +'-'+new Date().getDate();
                        var data = { "result" : "正确", "hd_user_name" : username, "sys_insert_date" :sysDate };
                        $('#daily_report2').bootstrapTable('updateRow', {index: index, row: data});
                        $("#tc"+index).disabled = true;//BUG号
                        $("#des"+index).disabled = true;//存在问题
                        $.scojs_message(result.message, $.scojs_message.TYPE_OK);
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
    },
    'click .modify_danger': function (e, value, row, index) {
        // ajax提交数据
        debugger;
        var link_business = $("#tc"+index).val();//BUG号
        var description = $("#des"+index).val();//存在问题
        var business_name = row.business_name;//业务节点
        var accept_code = row.business_code;//存储关键业务号
        var unit_number = row.unit_number;
        var policy_code = row.policy_code;//存储关键业务号
        var insert_date = row.business_date;//系统插入时间
        var username = $("#username").text();
        //条件校验
        if(description==""||description=="-"){
            $.scojs_message("请输入错误原因后再提交！", $.scojs_message.TYPE_ERROR);
            return;
        }
        /**
         *
         * var data = { "result" : "正确", "hd_user_name" : username, "sys_insert_date" :sysDate};
         * var data = { "result" : "错误", "hd_user_name" : username, "sys_insert_date" :sysDate , "description" :description, "link_business" :link_business };
         *
         * */
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "index.php/Home/PersonDefineFinishWork/updateCapDefineCs", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {result: "错误",username: username, business_code: unit_number, policy_code: policy_code, business_name:business_name,insert_date:insert_date,description:description,link_business:link_business},
            success: function (result) {
                if (result.status == 'success') {
                    debugger;
                    //单行刷新数据
                    var sysDate = new Date().getFullYear()+'-'+(new Date().getMonth()+1) +'-'+new Date().getDate();
                    var data = { "result" : "错误", "hd_user_name" : username, "sys_insert_date" :sysDate , "description" :description, "tc_id" :link_business };
                    $('#daily_report2').bootstrapTable('updateRow', {index: index, row: data});
                    $("#tc"+index).disabled = true;//BUG号
                    $("#des"+index).disabled = true;//存在问题
                    $.scojs_message(result.message, $.scojs_message.TYPE_OK);
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
    if(row.result != "-"){
        return row.description;//'<textarea id="des'+index+'" class="form-control modify" style="height: 40pt;width: 160pt" disabled placeholder="'+ row.description +'"></textarea>';
    }else{
        return '<textarea id="des'+index+'" class="form-control modify" style="height: 40pt;width: 160pt" placeholder="'+ row.description +'"></textarea>';
    }
}

window.actionEvents_result = {
    'click .modify': function (e, value, row, index) {
    }
};

function actionFormatter_tc(value, row, index) {
    if(row.result != "-"){
        return row.tc_id;//'<input id="tc'+index+'" class="form-control modify" style="height: 20pt;width: 130pt" disabled placeholder="'+ row.tc_id +'"></input>';
    }else{
        return '<input id="tc'+index+'" class="form-control modify" style="height: 20pt;width: 130pt" placeholder="'+ row.tc_id +'"></input>';
    }
}

window.actionEvents_tc = {
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

function exedefine(){
    debugger;
    $result = $('#daily_report2').bootstrapTable('getAllSelections');
    // if ($result[0] != null) {
    //     $.scojs_message('删除全部将会丢失所有数据，请等待开发！', $.scojs_message.TYPE_ERROR);
    // }
    var data = JSON.stringify($result);
    // alert(data);
    // $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/DataOut/getNbCb?queryDateStart="+$('#dtp_input2').val()+"&queryDateEnd="+$('#dtp_input3').val()});

    var username = $("#username").text();
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "index.php/Home/PersonDefineFinishWork/exeUpdateCapDefine", //目标地址.
        dataType: "json", //数据格式:JSON
        data: {data: data,username:username},
        success: function (result) {
            if (result.status == 'success') {
                debugger;
                //单行刷新数据
                // var sysDate = new Date().getFullYear()+'-'+(new Date().getMonth()+1) +'-'+new Date().getDate();
                // $('#daily_report2').bootstrapTable('updateRow', {index: index, row: data});
                // $("#tc"+index).disabled = true;//BUG号
                // $("#des"+index).disabled = true;//存在问题
                $.scojs_message(result.message, $.scojs_message.TYPE_OK);
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
};
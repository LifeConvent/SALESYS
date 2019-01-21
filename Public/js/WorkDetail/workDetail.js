/**
 * Created by lawrance on 2017/1/11.
 */

$(function () {

    $('#weChat').attr('class','active');
    $('#weChat_sub').css('display','block');
    $('#weChat_groupSend').attr('class','active');

    // $('#form_date1').datetimepicker({
    //     language:  'zh-CN',
    //     weekStart: 1,
    //     todayBtn:  1,
    //     autoclose: 1,
    //     todayHighlight: 1,
    //     startView: 2,
    //     minView: 2,
    //     forceParse: 0
    // }).on('changeDate', function(ev){
    //     // if($('#dtp_input3').val()==null||$('#dtp_input3').val()==''||$('#dtp_input3').val()=='undefined'){
    //     //     return;
    //     // }
    //     $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/DayPost/getTcCondition?queryDateStart="+$("#dtp_input2").val()+"&queryDateEnd="+$("#dtp_input3").val()+"&type=2"});
    // });
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
    //     $('#daily_report2').bootstrapTable('refresh', {url: HOST + "index.php/Home/DayPost/getTcCondition?queryDateStart="+$("#dtp_input2").val()+"&queryDateEnd="+$("#dtp_input3").val()+"&type=2"});
    // });

    //1.初始化Table
    var oTable = new TableInit();
    oTable.Init();
//        $[sessionStorage] = oTable.queryParams;

    //2.初始化Button的点击事件
    // var oButtonInit = new ButtonInit();
    // oButtonInit.Init();



});

var  data = [
        [{
        title :  '问题解决情况汇总',
        colspan: 14,
        align : 'center'
    }],
    [{
        field : 'sys',
        title : '姓名',
        align : 'center',
        valign: 'middle',
        width:300
    },{
        field : 'sys',
        title : '工作量评估、流转需求（含技术需求受理）任务号',
        align : 'center',
        sortable: true,
        valign: 'middle',
        width:300,
        formatter: "actionFormatter",
        events: "actionEvents",
    },{
        field : 'sys',
        title : '需求分析、设计\n' +
            '（自行编写）',
        align : 'center',
        sortable: true,
        valign: 'middle',
        width:300,
        formatter: "actionFormatter",
        events: "actionEvents",
    },{
        field : 'sys',
        title : '需求分析、设计评审通过',
        align : 'center',
        sortable: true,
        valign: 'middle',
        width:100,
        formatter: "actionFormatter",
        events: "actionEvents",
    },{
        field : 'sys',
        title : '评审任务号\n' +
            '（有设计交付件）',
        align : 'center',
        sortable: true,
        valign: 'middle',
        width:300,
        formatter: "actionFormatter",
        events: "actionEvents",
    },{
        field : 'sys',
        title : '评审通过任务号\n' +
            '（有设计交付件）',
        align : 'center',
        sortable: true,
        valign: 'middle',
        width:300,
        formatter: "actionFormatter",
        events: "actionEvents",
    },{
        field : 'sys',
        title : '直接流转任务号\n' +
            '（无设计交付件）',
        align : 'center',
        sortable: true,
        valign: 'middle',
        width:300,
        formatter: "actionFormatter",
        events: "actionEvents",
    },{
        field : 'sys',
        title : '其他需求设计工作',
        align : 'center',
        sortable: true,
        valign: 'middle',
        width:300,
        formatter: "actionFormatter",
        events: "actionEvents",
    },{
        field : 'sys',
        title : '开发任务号',
        align : 'center',
        sortable: true,
        valign: 'middle',
        width:300,
        formatter: "actionFormatter",
        events: "actionEvents",
    },{
        field : 'sys',
        title : '开发完成\n' +
            '任务号',
        align : 'center',
        sortable: true,
        valign: 'middle',
        width:300,
        formatter: "actionFormatter",
        events: "actionEvents",
    },{
        field : 'sys',
        title : '测试案例\n' +
            '（案例号或业务键字）',
        align : 'center',
        sortable: true,
        valign: 'middle',
        width:300,
        formatter: "actionFormatter",
        events: "actionEvents",
    },{
        field : 'sys',
        title : 'BUG',
        align : 'center',
        sortable: true,
        valign: 'middle',
        width:300,
        formatter: "actionFormatter",
        events: "actionEvents",
    },{
        field : 'sys',
        title : '服务保单号\n' +
            '及问题单号',
        align : 'center',
        sortable: true,
        valign: 'middle',
        width:300,
        formatter: "actionFormatter",
        events: "actionEvents",
    },{
        field : 'sys',
        title : '发布问题单',
        align : 'center',
        sortable: true,
        valign: 'middle',
        width:300,
        formatter: "actionFormatter",
        events: "actionEvents",
    }
    ]];

var TableInit = function () {
    var oTableInit = new Object();
    //初始化Table
    oTableInit.Init = function () {
        $('#daily_report2').bootstrapTable({
            url: HOST + "index.php/Home/DayPost/getTcCondition",   //请求后台的URL（*）
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
            pageSize: 22,      //每页的记录行数（*）
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
            columns : data
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
    var data = row.name;
    return '<textarea rows="3" cols="40" class="ceshi" placeholder='+ data +' ondblclick="edit(this,"ceshi");"></textarea>';
}

//双击实现编辑文本框(attrName为要修改的属性名)
function edit(obj,attrName){
    alert(1);
    var oldHtml = obj.innerHTML;//原单元格里面的值
    var newobj = document.createElement('input');//创建节点
    newobj.name = attrName;
    newobj.type = "text";
    newobj.value = oldHtml;


    obj.innerHTML = '';
    obj.appendChild(newobj);//把新的值赋到单元格
    newobj.focus();  //获取焦点

    //给文本框添加失焦事件
    $(newobj).blur(function(){//不能newobj.blur=function(){}
        if(this.value==null || this.value==""){//排除文本框为null时的情况
            obj.innerHTML = oldHtml;//不填值时返回原值
            return false;
        }
        obj.innerHTML = this.value?this.value:oldHtml;//当触发时判断新增元素值是否为空，为空则不修改，返回原有值
        // var userId = $("#userId").val();//需要传递的用户id
        //向数据库传值，修改数据库信息
        // if(oldHtml != this.value){//值改变时才更新，不是(obj.innerHTML！=this.value),这样的话结果一样
        //     $.ajax({
        //         type:"post",
        //         url:"changeUser.form",
        //         dataType:"json",
        //         data:{"attrName":attrName,"newHtml":this.value,"userId":userId},
        //         error:function(){
        //         },
        //         success:function(){
        //
        //         },
        //     });
        //
        // }
    })
}
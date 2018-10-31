/**
 * Created by lawrance on 2017/1/11.
 */

$(function () {

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
        $('#user_list_table').bootstrapTable({
            url: HOST + "index.php/Home/PersonDefineFinishWork/getDefPerson",   //请求后台的URL（*）
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
                checkbox: true
            }, {
                field: 'ID',
                sortable: true,
                align: 'center',
                title: '序号',
                formatter: function (value, row, index) {
                    return index+1;
                }
            }, {
                field: 'account',
                sortable: true,
                align: 'center',
                title: '用户名'
            }, {
                field: 'type',
                sortable: true,
                align: 'center',
                title: '用户类型'
            }, {
                field: 'user_name',
                sortable: true,
                align: 'center',
                title: '用户姓名'
            }, {
                field: 'user_organ_code',
                sortable: true,
                align: 'center',
                title: '作业机构代码'
            }, {
                field: 'user_organ_name',
                sortable: true,
                align: 'center',
                title: '作业机构名称'
            }, {
                field: 'user_sex',
                sortable: true,
                align: 'center',
                title: '性别'
            }, {
                field: 'user_company',
                sortable: true,
                align: 'center',
                title: '所属公司'
            }, {
                field: 'buss_area',
                sortable: true,
                align: 'center',
                title: '作业范围'
            },  {
                field: 'description',
                align: 'center',
                title: '描述',
                formatter: "actionFormatter_des",
                events: "actionEvents_des",
            },{
                field: 'link_business',
                align: 'center',
                title: '关联业务号',
                formatter: "actionFormatter_business",
                events: "actionEvents_business",
            },{
                field: 'operation',
                title: '操作',
                align: 'center',
                formatter: "actionFormatter",
                events: "actionEvents",
                clickToSelect: false
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
    if(row.is_same == "是"){
        return '-';
    }else{
        return '<button type="button" class="btn btn-primary modify" style="height: 20pt;width: 30pt"><span style="margin-left:-5pt;">修改</span></button>';
    }
}

window.actionEvents = {
    'click .modify': function (e, value, row, index) {
        // ajax提交数据
        debugger;
        var link_business = $("#business"+index).val();
        var description = $("#des"+index).val();
        var new_user_name = row.new_user_name;
        if(new_user_name==null){
            new_user_name = "";
        }
        var business_code = row.business_code;
        var business_type = row.business_type;
        var policy_code = row.policy_code;
        if(link_business!=""||description!=""){
            $.ajax({
                type: "POST", //用POST方式传输
                url: HOST + "index.php/Home/PersonDefineFinishWork/updateDefPerson", //目标地址.
                dataType: "json", //数据格式:JSON
                data: {new_user_name: new_user_name, business_code: business_code, policy_code: policy_code, description: description, link_business: link_business,business_type:business_type},
                success: function (result) {
                    if (result.status == 'success') {
                        debugger;
                        $.scojs_message(result.message, $.scojs_message.TYPE_OK);
                    } else if (result.status == 'failed') {
                        debugger;
                        $.scojs_message(result.message, $.scojs_message.TYPE_ERROR);
                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert(XMLHttpRequest);
                    alert(textStatus);
                    alert(errorThrown);
                }
            });
        }else{
            $.scojs_message('请修改信息后再提交！', $.scojs_message.TYPE_ERROR);
        }
    }
};

function actionFormatter_des(value, row, index) {
    if(row.is_same == "是"){
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
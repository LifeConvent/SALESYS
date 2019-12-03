/**
 * Created by lawrance on 2017/1/11.
 */

$(function () {
    $('#sysMaintain').attr('class', 'active');
    $('#sysMaintainSub').css('display', 'block');
    $('#sysMaintainSub_data_limits').attr('class', 'active');

    //默认关闭密钥展示
    $('#key_user_show').hide();
    $('#key_user_account_show').hide();
    //1.初始化Table
    var oTable = new TableInit();
    oTable.Init();

    var type = $('#user_type').text();
    if (type == 1) {
        //管理员初始设置
    } else {
        $('#table_manage').hide();
    }

    $('.selectpicker').val('-1');
    $('.selectpicker').selectpicker('render');
});

$('#check_user').click(function () {
    var type = $('#user_type').text();
    debugger;
    if (usertype != '1') {
        $('#checkPass').modal();
    }else{
        $('#table_manage').show();
    }
});

//校验密钥期限
function checkPass() {
    var user_pass = $('#check_pass').val();
    user_pass = hex_md5(user_pass);
    var user_name = $('#user_name').text();
    var user_account = $('#user_account').val();
    debugger;
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "index.php/Home/SysMaintain/checkPass", //目标地址.
        dataType: "json", //数据格式:JSON
        data: {
            user_name: user_name,
            user_pass: user_pass,
            user_account: user_account
        },
        success: function (result) {
            if (result.status == 'success') {
                $.ajax({
                    type: "POST", //用POST方式传输
                    url: HOST + "index.php/Home/SysMaintain/getUserLimitsData", //目标地址.
                    dataType: "json", //数据格式:JSON
                    data: {
                        user_account: user_account
                    },
                    success: function (result) {
                        debugger;
                        if (result.status == 'success') {
                            if (result.sys_type == '1') {
                                //上线
                                $('#user_limits_1').show();
                            } else if (result.sys_type == '2') {
                                //并行
                                $('#user_limits_2').show();
                            } else {
                                //上线
                                $('#user_limits_1').show();
                                //并行
                                $('#user_limits_2').show();
                            }
                            debugger;
                            $('#checkPass').modal('hide');
                            $('.user_account').val(user_account);
                            initLimitsArray(result);
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
                initLimits(result.set_organ);
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
}

function initLimitsArray(result) {
    //权限数据数组
    debugger;
    var resultUserLimitsObject = result.userLimits;
    var resultOrganResultObject = result.organResult;
    //被校验用户的设置机构权限
    var set_organ_level = resultOrganResultObject.set_organ_level;//1234
    //登录用户的设置机构
    var set_organ_code = $('#set_organ_code').text();
    //被修改用户
    var set_organ = resultUserLimitsObject.SET_ORGAN_CODE;
    if (set_organ_code.length == 2) {
        //最高机构不用校验直接输出被修改用户的权限
        publicOrganLimitsArray(result);
        publicOtherLimitsArray(result);
        publicMenuLimitsArray(result);
    } else if (set_organ_code.length == 4 && set_organ_code.length <= set_organ.length) {
        //判断是否同一机构
        publicOrganLimitsArray(result);
        publicOtherLimitsArray(result);
        publicMenuLimitsArray(result);
    } else if (set_organ_code.length == 6 && set_organ_code.length <= set_organ.length) {
        //判断是否同一机构
        publicOrganLimitsArray(result);
        publicOtherLimitsArray(result);
        publicMenuLimitsArray(result);
    } else if (set_organ_code.length == 8 && set_organ_code.length <= set_organ.length) {
        //判断是否同一机构
        publicOrganLimitsArray(result);
        publicOtherLimitsArray(result);
        publicMenuLimitsArray(result);
    } else {
        $.scojs_message("该用户权限较高，您无法修改！请联系管理员使用更高级别权限修改！", $.scojs_message.TYPE_ERROR);
    }
    $('.selectpicker').selectpicker('refresh');
    $('.selectpicker').selectpicker('render');
}

//被校验用户的设置机构
function initLimits(set_organ) {
    //初始化权限加载数据

    //被校验用户的设置机构权限
    var set_organ_level = $('#set_organ_level').text();//1234
    //登录用户的设置机构
    var set_organ_code = $('#set_organ_code').text();
    if (set_organ_code.length == 2) {
        //最高机构不用校验直接输出被修改用户的权限
        publicOrganLimits(set_organ_level);
        publicOtherLimits();
        publicMenuLimits();
    } else if (set_organ_code.length == 4 && set_organ_code.length <= set_organ.length) {
        publicOrganLimits(set_organ_level);
        publicOtherLimits();
        publicMenuLimits();
    } else if (set_organ_code.length == 6 && set_organ_code.length <= set_organ.length) {
        publicOrganLimits(set_organ_level);
        publicOtherLimits();
        publicMenuLimits();
    } else if (set_organ_code.length == 8 && set_organ_code.length <= set_organ.length) {
        publicOrganLimits(set_organ_level);
        publicOtherLimits();
        publicMenuLimits();
    } else {
        $.scojs_message("该用户权限较高，您无法修改！请联系管理员使用更高级别权限修改！", $.scojs_message.TYPE_ERROR);
    }
    $('.selectpicker').selectpicker('render');
}

//js转码实例
function decodeEntities(encodedString) {
    var textArea = document.createElement('textarea');
    textArea.innerHTML = encodedString;
    return textArea.value;
}

function publicOrganLimitsArray(result) {
    var resultUserLimitsObject = result.userLimits;
    var resultOrganResultObject = result.organResult;
    //操作用户的权限
    var user_type = $('#user_type').text();
    //要修改的用户等级
    //日报机构修改
    debugger;
    if (user_type == '1') {
        $('#daypost_organ_show').show();
        resultOrganResultObject.organCodeList1 = decodeEntities(resultOrganResultObject.organCodeList1);
        //上线
        $('#user_daypost_organcode_select1').empty();
        $('#user_daypost_organcode_select2').empty();
        $('#user_daypost_organcode_select1').append('<option disabled="" value="-1">==选择==</option>' + '<option value="99">无权限查看</option>');
        $('#user_daypost_organcode_select1').append(resultOrganResultObject.organCodeList1);
        $('#user_daypost_organcode_select2').append('<option disabled="" value="-1">==选择==</option>' + '<option value="99">无权限查看</option>');
        $('#user_daypost_organcode_select2').append(resultOrganResultObject.organCodeList1);
        $('#user_daypost_organcode_select1').val(resultUserLimitsObject.SX_DAYPOST_ORGAN);
        $('#user_daypost_organcode_select2').val(resultUserLimitsObject.SX_DAYPOST_ORGAN_LIST);
        //并行
        $('#user_daypost_organcode_select1_bx').empty();
        $('#user_daypost_organcode_select2_bx').empty();
        $('#user_daypost_organcode_select1_bx').append('<option disabled="" value="-1">==选择==</option>' + '<option value="99">无权限查看</option>');
        $('#user_daypost_organcode_select1_bx').append(resultOrganResultObject.organCodeList1);
        $('#user_daypost_organcode_select2_bx').append('<option disabled="" value="-1">==选择==</option>' + '<option value="99">无权限查看</option>');
        $('#user_daypost_organcode_select2_bx').append(resultOrganResultObject.organCodeList1);
        $('#user_daypost_organcode_select1_bx').val(resultUserLimitsObject.BX_DAYPOST_ORGAN);
        $('#user_daypost_organcode_select2_bx').val(resultUserLimitsObject.BX_DAYPOST_ORGAN_LIST);
    } else {
        $('#daypost_organ_show').hide();
    }
    switch (resultOrganResultObject.set_organ_level) {
        case '1':
            resultOrganResultObject.organCodeList1 = decodeEntities(resultOrganResultObject.organCodeList1);
            //显示1级菜单-正常无需特殊处理直接赋值
            //上线
            $('#user_set_organcode_select1').empty();
            $('#user_set_organcode_select1').append(resultOrganResultObject.organCodeList1);
            $('#user_set_organcode_select1').val(resultUserLimitsObject.SET_ORGAN_CODE);
            $('#user_list_organcode_select1').empty();
            $('#user_list_organcode_select1').append(resultOrganResultObject.organCodeList1);
            $('#user_list_organcode_select1').val(resultUserLimitsObject.USER_ORGAN_CODE);
            $('#user_hd_organcode_select1').empty();
            $('#user_hd_organcode_select1').append(resultOrganResultObject.organCodeList1);
            $('#user_hd_organcode_select1').val(resultUserLimitsObject.HD_USER_CODE);
            //并行
            $('#user_set_organcode_select1_bx').empty();
            $('#user_set_organcode_select1_bx').append(resultOrganResultObject.organCodeList1);
            $('#user_set_organcode_select1_bx').val(resultUserLimitsObject.SET_ORGAN_CODE);
            $('#user_list_organcode_select1_bx').empty();
            $('#user_list_organcode_select1_bx').append(resultOrganResultObject.organCodeList1);
            $('#user_list_organcode_select1_bx').val(resultUserLimitsObject.USER_ORGAN_CODE);
            $('#user_hd_organcode_select1_bx').empty();
            $('#user_hd_organcode_select1_bx').append(resultOrganResultObject.organCodeList1);
            $('#user_hd_organcode_select1_bx').val(resultUserLimitsObject.HD_USER_CODE);
            break;
        case '2':
            //显示12级菜单返回12
            //上线
            resultOrganResultObject.organCodeList1 = decodeEntities(resultOrganResultObject.organCodeList1);
            resultOrganResultObject.organCodeList2 = decodeEntities(resultOrganResultObject.organCodeList2);
            $('#hd_organ_show2').show();
            $('#set_organ_show2').show();
            $('#list_organ_show2').show();
            $('#user_set_organcode_select1').empty();
            $('#user_set_organcode_select1').append(resultOrganResultObject.organCodeList1);
            $('#user_set_organcode_select1').val(resultUserLimitsObject.SET_ORGAN_CODE);
            $('#user_list_organcode_select1').empty();
            $('#user_list_organcode_select1').append(resultOrganResultObject.organCodeList1);
            $('#user_list_organcode_select1').val(resultUserLimitsObject.USER_ORGAN_CODE);
            $('#user_hd_organcode_select1').empty();
            $('#user_hd_organcode_select1').append(resultOrganResultObject.organCodeList1);
            $('#user_hd_organcode_select1').val(resultUserLimitsObject.HD_USER_CODE);
            $('#user_set_organcode_select2').empty();
            $('#user_set_organcode_select2').append(resultOrganResultObject.organCodeList2);
            $('#user_set_organcode_select2').val(resultUserLimitsObject.SET_ORGAN_CODE);
            $('#user_list_organcode_select2').empty();
            $('#user_list_organcode_select2').append(resultOrganResultObject.organCodeList2);
            $('#user_list_organcode_select2').val(resultUserLimitsObject.USER_ORGAN_CODE);
            $('#user_hd_organcode_select2').empty();
            $('#user_hd_organcode_select2').append(resultOrganResultObject.organCodeList2);
            $('#user_hd_organcode_select2').val(resultUserLimitsObject.HD_USER_CODE);
            //并行
            $('#hd_organ_show2_bx').show();
            $('#set_organ_show2_bx').show();
            $('#list_organ_show2_bx').show();
            $('#user_set_organcode_select1_bx').empty();
            $('#user_set_organcode_select1_bx').append(resultOrganResultObject.organCodeList1);
            $('#user_set_organcode_select1_bx').val(resultUserLimitsObject.SET_ORGAN_CODE);
            $('#user_list_organcode_select1_bx').empty();
            $('#user_list_organcode_select1_bx').append(resultOrganResultObject.organCodeList1);
            $('#user_list_organcode_select1_bx').val(resultUserLimitsObject.USER_ORGAN_CODE);
            $('#user_hd_organcode_select1_bx').empty();
            $('#user_hd_organcode_select1_bx').append(resultOrganResultObject.organCodeList1);
            $('#user_hd_organcode_select1_bx').val(resultUserLimitsObject.HD_USER_CODE);
            $('#user_set_organcode_select2_bx').empty();
            $('#user_set_organcode_select2_bx').append(resultOrganResultObject.organCodeList2);
            $('#user_set_organcode_select2_bx').val(resultUserLimitsObject.SET_ORGAN_CODE);
            $('#user_list_organcode_select2_bx').empty();
            $('#user_list_organcode_select2_bx').append(resultOrganResultObject.organCodeList2);
            $('#user_list_organcode_select2_bx').val(resultUserLimitsObject.USER_ORGAN_CODE);
            $('#user_hd_organcode_select2_bx').empty();
            $('#user_hd_organcode_select2_bx').append(resultOrganResultObject.organCodeList2);
            $('#user_hd_organcode_select2_bx').val(resultUserLimitsObject.HD_USER_CODE);
            break;
        case '3':
            resultOrganResultObject.organCodeList2 = decodeEntities(resultOrganResultObject.organCodeList2);
            resultOrganResultObject.organCodeList3 = decodeEntities(resultOrganResultObject.organCodeList3);
            //显示23级菜单-隐藏1级，二级赋值（1级不占位隐藏display）三级自动
            //上线
            debugger;
            $('#hd_organ_show1').hide();
            $('#set_organ_show1').hide();
            $('#list_organ_show1').hide();
            $('#hd_organ_show2').show();
            $('#set_organ_show2').show();
            $('#list_organ_show2').show();
            $('#hd_organ_show3').show();
            $('#set_organ_show3').show();
            $('#list_organ_show3').show();
            $('#user_set_organcode_select2').empty();
            $('#user_set_organcode_select2').append(resultOrganResultObject.organCodeList2);
            $('#user_set_organcode_select2').val(resultUserLimitsObject.SET_ORGAN_CODE);
            $('#user_list_organcode_select2').empty();
            $('#user_list_organcode_select2').append(resultOrganResultObject.organCodeList2);
            $('#user_list_organcode_select2').val(resultUserLimitsObject.USER_ORGAN_CODE);
            $('#user_hd_organcode_select2').empty();
            $('#user_hd_organcode_select2').append(resultOrganResultObject.organCodeList2);
            $('#user_hd_organcode_select2').val(substr(resultUserLimitsObject.HD_USER_CODE,1,4));
            $('#user_set_organcode_select3').empty();
            $('#user_set_organcode_select3').append(resultOrganResultObject.organCodeList3);
            $('#user_set_organcode_select3').val(resultUserLimitsObject.SET_ORGAN_CODE);
            $('#user_list_organcode_select3').empty();
            $('#user_list_organcode_select3').append(resultOrganResultObject.organCodeList3);
            $('#user_list_organcode_select3').val(resultUserLimitsObject.USER_ORGAN_CODE);
            $('#user_hd_organcode_select3').empty();
            $('#user_hd_organcode_select3').append(resultOrganResultObject.organCodeList3);
            $('#user_hd_organcode_select3').val(resultUserLimitsObject.HD_USER_CODE);
            //并行
            $('#hd_organ_show1_bx').hide();
            $('#set_organ_show1_bx').hide();
            $('#list_organ_show1_bx').hide();
            $('#hd_organ_show2_bx').show();
            $('#set_organ_show2_bx').show();
            $('#list_organ_show2_bx').show();
            $('#hd_organ_show3_bx').show();
            $('#set_organ_show3_bx').show();
            $('#list_organ_show3_bx').show();
            $('#user_set_organcode_select2_bx').empty();
            $('#user_set_organcode_select2_bx').append(resultOrganResultObject.organCodeList2);
            $('#user_set_organcode_select2_bx').val(resultUserLimitsObject.SET_ORGAN_CODE);
            $('#user_list_organcode_select2_bx').empty();
            $('#user_list_organcode_select2_bx').append(resultOrganResultObject.organCodeList2);
            $('#user_list_organcode_select2_bx').val(resultUserLimitsObject.USER_ORGAN_CODE);
            $('#user_hd_organcode_select2_bx').empty();
            $('#user_hd_organcode_select2_bx').append(resultOrganResultObject.organCodeList2);
            $('#user_hd_organcode_select2_bx').val(resultUserLimitsObject.HD_USER_CODE);
            $('#user_set_organcode_select3_bx').empty();
            $('#user_set_organcode_select3_bx').append(resultOrganResultObject.organCodeList3);
            $('#user_set_organcode_select3_bx').val(resultUserLimitsObject.SET_ORGAN_CODE);
            $('#user_list_organcode_select3_bx').empty();
            $('#user_list_organcode_select3_bx').append(resultOrganResultObject.organCodeList3);
            $('#user_list_organcode_select3_bx').val(resultUserLimitsObject.USER_ORGAN_CODE);
            $('#user_hd_organcode_select3_bx').empty();
            $('#user_hd_organcode_select3_bx').append(resultOrganResultObject.organCodeList3);
            $('#user_hd_organcode_select3_bx').val(resultUserLimitsObject.HD_USER_CODE);
            break;
        case '4':
            //显示三级菜单-12隐藏
            resultOrganResultObject.organCodeList3 = decodeEntities(resultOrganResultObject.organCodeList3);
            //上线
            $('#hd_organ_show1').hide();
            $('#set_organ_show1').hide();
            $('#list_organ_show1').hide();
            $('#hd_organ_show2').hide();
            $('#set_organ_show2').hide();
            $('#list_organ_show2').hide();
            $('#hd_organ_show3').show();
            $('#set_organ_show3').show();
            $('#list_organ_show3').show();
            $('#user_set_organcode_select3').empty();
            $('#user_set_organcode_select3').append(resultOrganResultObject.organCodeList3);
            $('#user_set_organcode_select3').val(resultUserLimitsObject.SET_ORGAN_CODE);
            $('#user_list_organcode_select3').empty();
            $('#user_list_organcode_select3').append(resultOrganResultObject.organCodeList3);
            $('#user_list_organcode_select3').val(resultUserLimitsObject.USER_ORGAN_CODE);
            $('#user_hd_organcode_select3').empty();
            $('#user_hd_organcode_select3').append(resultOrganResultObject.organCodeList3);
            $('#user_hd_organcode_select3').val(resultUserLimitsObject.HD_USER_CODE);
            //并行
            $('#hd_organ_show1_bx').hide();
            $('#set_organ_show1_bx').hide();
            $('#list_organ_show1_bx').hide();
            $('#hd_organ_show2_bx').hide();
            $('#set_organ_show2_bx').hide();
            $('#list_organ_show2_bx').hide();
            $('#hd_organ_show3_bx').show();
            $('#set_organ_show3_bx').show();
            $('#list_organ_show3_bx').show();
            $('#user_set_organcode_select3_bx').empty();
            $('#user_set_organcode_select3_bx').append(resultOrganResultObject.organCodeList3);
            $('#user_set_organcode_select3_bx').val(resultUserLimitsObject.SET_ORGAN_CODE);
            $('#user_list_organcode_select3_bx').empty();
            $('#user_list_organcode_select3_bx').append(resultOrganResultObject.organCodeList3);
            $('#user_list_organcode_select3_bx').val(resultUserLimitsObject.USER_ORGAN_CODE);
            $('#user_hd_organcode_select3_bx').empty();
            $('#user_hd_organcode_select3_bx').append(resultOrganResultObject.organCodeList3);
            $('#user_hd_organcode_select3_bx').val(resultUserLimitsObject.HD_USER_CODE);
            break;
        default:
            break;
    }
}

function publicOrganLimits(set_organ_level) {
    var set_organ_code = $('#set_organ_code').text();
    var hd_user_code = $('#hd_user_code').text();
    var user_organ_code = $('#user_organ_code').text();
    var bx_daypost_organ = $('#bx_daypost_organ').text();
    var bx_daypost_organ_list = $('#bx_daypost_organ_list').text();
    var sx_daypost_organ = $('#sx_daypost_organ').text();
    var sx_daypost_organ_list = $('#sx_daypost_organ_list').text();
    var user_type = $('#user_type').text();
    //要修改的用户等级
    //日报机构修改
    if (user_type == '1') {
        $('#daypost_organ_show').show();
        $('#user_daypost_organcode_select1').val([sx_daypost_organ]);
        $('#user_daypost_organcode_select2').val([sx_daypost_organ_list]);
        $('#user_daypost_organcode_select1_bx').val([bx_daypost_organ]);
        $('#user_daypost_organcode_select2_bx').val([bx_daypost_organ_list]);
    } else {
        $('#daypost_organ_show').hide();
    }
    switch (set_organ_level) {
        case '1':
            //显示1级菜单-正常无需特殊处理直接赋值
            //上线
            $('#user_set_organcode_select1').val([set_organ_code]);
            $('#user_list_organcode_select1').val([user_organ_code]);
            $('#user_hd_organcode_select1').val([hd_user_code]);
            //并行
            $('#user_set_organcode_select1_bx').val([set_organ_code]);
            $('#user_list_organcode_select1_bx').val([user_organ_code]);
            $('#user_hd_organcode_select1_bx').val([hd_user_code]);
            break;
        case '2':
            //显示12级菜单
            //上线
            $('#user_set_organcode_select1').val([set_organ_code]);
            $('#set_organ_show2').show();
            $('#user_list_organcode_select1').val([user_organ_code]);
            $('#user_hd_organcode_select1').val([hd_user_code]);
            //并行
            $('#user_set_organcode_select1_bx').val([set_organ_code]);
            $('#user_list_organcode_select1_bx').val([user_organ_code]);
            $('#user_hd_organcode_select1_bx').val([hd_user_code]);
            break;
        case '3':
            //显示23级菜单
            //上线
            $('#user_set_organcode_select1').val([set_organ_code]);
            $('#user_list_organcode_select1').val([user_organ_code]);
            $('#user_hd_organcode_select1').val([hd_user_code]);
            $('#user_set_organcode_select2').val([set_organ_code]);
            $('#user_list_organcode_select2').val([user_organ_code]);
            $('#user_hd_organcode_select2').val([hd_user_code]);
            //并行
            $('#user_set_organcode_select1_bx').val([set_organ_code]);
            $('#user_list_organcode_select1_bx').val([user_organ_code]);
            $('#user_hd_organcode_select1_bx').val([hd_user_code]);
            $('#user_set_organcode_select2_bx').val([set_organ_code]);
            $('#user_list_organcode_select2_bx').val([user_organ_code]);
            $('#user_hd_organcode_select2_bx').val([hd_user_code]);
            break;
        case '4':
            //显示三级菜单
            break;
        default:
            break;
    }
}

//密钥配置账户监听
$("#key_user_account").change(function () {
    //选择一级变更后二级三级清空
    var key_user_account = $('#key_user_account').val();
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "index.php/Home/SysMaintain/checkUserTable", //目标地址.
        dataType: "json", //数据格式:JSON
        data: {
            key_user_account: key_user_account
        },
        success: function (result) {
            if (result.status == 'success') {
                debugger;
                $('#key_user_show').show();
                $('#key_user_select').empty();
                $('#key_user_select').append(result.message);
                $('#key_user_select').selectpicker('refresh');
                $('#key_user_hint').empty();
            } else if (result.status == 'failed') {
                debugger;
                $('#key_user_show').hide();
                $('#key_user_hint').text(result.message);
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert(XMLHttpRequest);
            alert(textStatus);
            alert(errorThrown);
        }
    });
});

//数据表变更监听
$("#key_user_select").change(function(){
    var user_key_id = $('#key_user_select').val();
    if(user_key_id=='-1'){
        return;
    }else{
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "index.php/Home/SysMaintain/getUserTable", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {
                user_key_id: user_key_id
            },
            success: function (result) {
                if (result.status == 'success') {
                    debugger;
                    //获取完数据表信息后展示
                    $('#data_table').val(result.TABLE_CODE);
                    $('#table_name').val(result.TABLE_NAME);
                    $('#data_table').selectpicker('refresh');
                } else if (result.status == 'failed') {
                    debugger;
                    $('#key_id_hint').text(result.message);
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert(XMLHttpRequest);
                alert(textStatus);
                alert(errorThrown);
            }
        });
    }
});

$('#modify_user_key').click(function(){
    debugger;
    var is_new = $('#is_new').val();
    if(is_new!='0'&&is_new!='1'&&is_new!='2'){
        $.scojs_message('操作类型必须选择！',$.scojs_message.TYPE_ERROR);
    }else{
        var table_type = $('#table_type').val();
        var user_account = '';
        if(table_type!='0'){
            if(table_type=='1'){
                //公共
                user_account = 'PUBLIC';
            }else if(table_type=='2'){
                //管理员
                user_account = 'ADMIN';
            }
        }else{
            user_account = $('#key_user_account').val();
        }
        //数据表
        var data_table = $('#data_table').val();
        //权限类型
        var data_type = $('#data_type').val();
        //自定义表名称S
        var table_name = $('#table_name').val();
        var key_user_select = $('#key_user_select').val();
        var is_new = $('#is_new').val();
        if(table_name!=null){
            $.ajax({
                type: "POST", //用POST方式传输
                url: HOST + "index.php/Home/SysMaintain/dealUserTable", //目标地址.
                dataType: "json", //数据格式:JSON
                data: {
                    user_account: user_account,
                    data_table: data_table,
                    data_type: data_type,
                    table_name: table_name,
                    is_new: is_new,
                    key_user_select:key_user_select
                },
                success: function (result) {
                    if (result.status == 'success') {
                        debugger;
                        $.scojs_message(result.message,$.scojs_message.TYPE_OK);
                        $('#key_user_account').val(-1);
                        $('#is_new').val(-1);
                        $('#key_user_account').selectpicker('refresh');
                        $('#is_new').selectpicker('refresh');
                        $('#key_user_pass').empty();
                        $('#dtp_input2').empty();
                    } else if (result.status == 'failed') {
                        debugger;
                        $.scojs_message(result.message,$.scojs_message.TYPE_ERROR);
                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert(XMLHttpRequest);
                    alert(textStatus);
                    alert(errorThrown);
                }
            });
        }
    }
});

//用户选择监听
$('#table_type').change(function(){
    var table_type = $('#table_type').val();
    if(table_type=='0'){
        $('#key_user_account_show').show();
    }else{
        $('#key_user_account_show').hide();
        var key_user_account = '';
        if(table_type=='1'){
            //公共
            key_user_account = 'PUBLIC';
        }else if(table_type=='2'){
            //管理员
            key_user_account = 'ADMIN';
        }
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "index.php/Home/SysMaintain/checkUserTable", //目标地址.
            dataType: "json", //数据格式:JSON
            data: {
                key_user_account: key_user_account
            },
            success: function (result) {
                if (result.status == 'success') {
                    debugger;
                    $('#key_user_show').show();
                    $('#key_user_select').empty();
                    $('#key_user_select').append(result.message);
                    $('#key_user_select').selectpicker('refresh');
                    $('#key_user_hint').empty();
                } else if (result.status == 'failed') {
                    debugger;
                    $('#key_user_show').hide();
                    $('#key_user_hint').text(result.message);
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert(XMLHttpRequest);
                alert(textStatus);
                alert(errorThrown);
            }
        });
    }
});

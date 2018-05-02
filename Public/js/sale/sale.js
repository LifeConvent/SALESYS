/**
 * Created by lawrance on 2018/4/25.
 */
$(function () {
    $('#sale').attr('class', 'active');
});

//旧版不用单选radio
function select_type_level(level) {
    //选择商品类型等级
    if (level == 1) {
        $('#pro_select_one').hide();
        $('#pro_select_two').hide();
        $('#add_pro_name_one').show();
        $('#add_pro_name_two').hide();
        $('#add_pro_name_three').hide();
    } else if (level == 2) {
        $('#pro_select_one').show();
        $('#pro_select_two').hide();
        $('#add_pro_name_one').hide();
        $('#add_pro_name_two').show();
        $('#add_pro_name_three').hide();
        $('#product_type').val('2');
    } else if (level == 3) {
        $('#pro_select_one').show();
        $('#pro_select_two').show();
        $('#add_pro_name_one').hide();
        $('#add_pro_name_two').hide();
        $('#add_pro_name_three').show();
        $('#product_type').val('3');
    }
}

function submitAddType() {
    //一级二级啊类型编码
    var add_select_type_one = $('#add_select_type_one').val();
    var add_select_type_two = $('#add_select_type_two').val();
    //一二三级名称
    var add_product_type_one = $('#add_product_type_one').val();
    var add_product_type_two = $('#add_product_type_two').val();
    var add_product_type_three = $('#add_product_type_three').val();
    //货架编码
    var add_pro_shelf_code = $('#add_pro_shelf_code').val();
    var add_pro_hint = $('#add_pro_hint').val();
    //添加的类型等级
    var add_pro_type_level = $('#add_pro_type_level input[name="add_pro_type_level"]:checked ').val();
    var is_necessary_vaild = new Array();
    var json_pre = '';
    if (add_pro_type_level == 1) {
        is_necessary_vaild.push(add_product_type_one);
        json_pre += ('super_type=0&type_level=1&type_name=' + add_product_type_one);
    } else if (add_pro_type_level == 2) {
        is_necessary_vaild.push(add_select_type_one);
        is_necessary_vaild.push(add_product_type_two);
        debugger;
        //上级ID select输出是的value就是上级ID
        json_pre += ('super_type=' + add_select_type_one + '&type_level=2&type_name=' + add_product_type_two);
    } else if (add_pro_type_level == 3) {
        is_necessary_vaild.push(add_select_type_one);
        is_necessary_vaild.push(add_select_type_two);
        is_necessary_vaild.push(add_product_type_three);
        //上级ID
        json_pre += ('super_type=' + add_select_type_two + '&type_level=3&type_name=' + add_product_type_three);
    }
    var res = validation_is_null(is_necessary_vaild);
    debugger;
    if (res) return;
    //添加货架码值
    if (add_pro_shelf_code != null && add_pro_shelf_code != '' && add_pro_shelf_code != undefined) {
        json_pre += ('&shelf_code=' + add_pro_shelf_code);
    }
    //添加备注
    if (add_pro_hint != null && add_pro_hint != '' && add_pro_hint != undefined) {
        json_pre += ('&hint=' + add_pro_hint);
    }
    //后台添加数据
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "index.php/Home/sale/addNewProType", //目标地址.
        dataType: "json", //数据格式:JSON
        data: json_pre,
        success: function (result) {
            if (result.status == 'success') {
                $.scojs_message('商品类型添加成功！', $.scojs_message.TYPE_OK);
                //成功后清除数据,隐藏modal
                clearForm($('#add_pro_type_form'));
                $('#pro_type_modal').modal('hide');
                //刷新整个页面
                window.location.reload();
            } else if (result.status == 'failed') {
                $.scojs_message('商品类型添加失败，请稍后再试！' + result.message, $.scojs_message.TYPE_ERROR);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $.scojs_message('网络连接发生未知错误，请稍后再试！' + errorThrown, $.scojs_message.TYPE_ERROR);
        }
    });
}

function pro_modify(temp) {
    //修改进货信息-记录操作信息
    alert(temp);
}

function pro_delete(temp) {
    //删除进货信息-验证权限
    alert(temp);
}

function pro_type_modify(temp) {
    //修改货品类型信息-记录操作信息
    alert(temp);
}

function pro_type_delete(temp) {
    //删除货品类型信息-验证权限
    alert(temp);
}

function show_add_pro_type() {
    //调用model显示添加界面
    $('#pro_type_modal').modal('show');
}

function show_add_pro() {
    //调用model显示添加界面
    $('#pro_in_modal').modal('show');
}

function valid_shelf(is_shelf) {
    if (is_shelf == 0) {
        $('#is_shelf_show').hide();
    } else {
        $('#is_shelf_show').show();
    }
}

function submitProductInfo() {
    var date_in = $('#date_in').val();
    var date_sale_start = $('#date_sale_start').val();
    //类型等级值-根据等级取值
    var product_type = $('#product_type').val();
    var type_id = "";
    switch (product_type) {
        case '1':
            type_id = $('#in_add_select_type_one').val();
            break;
        case '2':
            type_id = $('#in_add_select_type_two').val();
            break;
        case '3':
            type_id = $('#in_add_select_type_three').val();
            break;
    }
    var pro_name = $('#pro_name').val();
    var pro_code = $('#pro_code').val();
    var pro_sum = $('#pro_sum').val();
    var pro_price = $('#pro_price').val();
    var pro_shelf_code = $('#pro_shelf_code').val();//非必填
    var pro_sale_sum = $('#pro_sale_sum').val();
    var is_shelf = $('#is_shelf input[name="is_shelf"]:checked ').val();
    if (is_shelf == 1)
        var shelf_in_num = $('#shelf_in_num').val();//非必填
    var can_dis = $('#can_dis').val();//非必填
    var pro_hint = $('#pro_hint').val();//非必填
    debugger;
    var is_necessary_vaild = new Array(date_in, date_sale_start, type_id, pro_name, pro_code,
        pro_sum, pro_price, pro_sale_sum);
    if (is_shelf != null && is_shelf != "" && is_shelf != undefined)
        is_necessary_vaild.push(shelf_in_num);
    var res = validation_is_null(is_necessary_vaild);
    if (res) return;
    //确认提交成功之后清除

    var json_pre = 'date_in=' + date_in +
        '&date_sale_start=' + date_sale_start +
        '&type_id=' + type_id +
        '&pro_name=' + pro_name +
        '&pro_code=' + pro_code +
        '&pro_price=' + pro_price +
        '&pro_sale_sum=' + pro_sale_sum;
    if (pro_shelf_code != null || pro_shelf_code != "" || pro_shelf_code != undefined) {
        json_pre += '&pro_shelf_code=' + pro_shelf_code;
    } else {
        json_pre += '&pro_shelf_code=' + 'NULL';
    }
    if (shelf_in_num != null || shelf_in_num != "" || shelf_in_num != undefined) {
        json_pre += '&shelf_in_num=' + shelf_in_num;
    } else {
        json_pre += '&shelf_in_num=' + 'NULL';
    }
    if (can_dis != null || can_dis != "" || can_dis != undefined) {
        json_pre += '&can_dis=' + can_dis;
    } else {
        json_pre += '&can_dis=' + 'NULL';
    }
    if (pro_hint != null || pro_hint != "" || pro_hint != undefined) {
        json_pre += '&pro_hint=' + pro_hint;
    } else {
        json_pre += '&pro_hint=' + 'NULL';
    }

$.ajax({
    type: "POST", //用POST方式传输
    url: HOST + "index.php/Home/sale/submitProductInfo", //目标地址.
    dataType: "json", //数据格式:JSON
    data: json_pre,
    success: function (result) {
        if (result.status == 'success') {
            $.scojs_message('入库商品添加成功！', $.scojs_message.TYPE_OK);
            clearForm($('#pro_in_form'));
        } else if (result.status == 'failed') {
            $.scojs_message('系统异常！' + result.message, $.scojs_message.TYPE_ERROR);
        }
    },
    error: function (jqXHR, textStatus, errorThrown) {
        $.scojs_message('网络连接发生未知错误，请稍后再试！' + errorThrown, $.scojs_message.TYPE_ERROR);
    }
});
}

function clearForm(form) {
    //清空文本框内容
    // input清空
    $(':input', form).each(function () {
        var type = this.type;
        var tag = this.tagName.toLowerCase(); // normalize case
        if (type == 'text' || type == 'password' || tag == 'textarea')
            this.value = "";
        // 多选checkboxes清空
        // select 下拉框清空
        else if (tag == 'select')
            this.selectedIndex = -1;
    });
}

function validation_is_null_each(item) {
    debugger;
    if (item == null || item == "" || item == undefined) {
        $.scojs_message('必填项不能为空!', $.scojs_message.TYPE_ERROR);
        return true;
    }
    return false;
}

function validation_is_null(is_necessary_vaild) {
    for (var i = 0; i < is_necessary_vaild.length; i++) {
        if (is_necessary_vaild[i] == null || is_necessary_vaild[i] == "" || is_necessary_vaild[i] == undefined || is_necessary_vaild[i] == '-1') {
            $.scojs_message('必填项不能为空!', $.scojs_message.TYPE_ERROR);
            return true;
        }
    }
    return false;
}

function choice_select_level_one(temp) {
    var add_pro_type_level = $('#add_pro_type_level input[name="add_pro_type_level"]:checked ').val();
    var id_value = temp.split('_');
    $('#add_select_type_one').val(id_value[0]);
    $('#select_one_text').text(id_value[1]);
    debugger;
    if (add_pro_type_level == 3) {
        getProTypeLevelTwoList('null');
    }
}
function choice_select_level_one_in(temp) {
    var id_value = temp.split('_');
    $('#in_add_select_type_one').val(id_value[0]);
    $('#in_select_one_text').text(id_value[1]);
    getProTypeLevelTwoList('in');
}
function choice_select_level_two_in(temp) {
    var id_value = temp.split('_');
    $('#in_add_select_type_two').val(id_value[0]);
    $('#in_select_two_text').text(id_value[1]);
    getProTypeLevelTwoList('in_three');
}
function choice_select_level_three_in(temp) {
    var id_value = temp.split('_');
    $('#in_add_select_type_three').val(id_value[0]);
    $('#in_select_three_text').text(id_value[1]);
}


function choice_select_level_two(temp) {
    var id_value = temp.split('_');
    $('#add_select_type_two').val(id_value[0]);
    $('#select_two_text').text(id_value[1]);
}

function getProTypeLevelTwoList(status) {
    var add_select_type_one = $('#add_select_type_one').val();
    var in_add_select_type_one = $('#in_add_select_type_one').val();
    var in_add_select_type_two = $('#in_add_select_type_two').val();
    var level = 'null';
    if (status == 'in')
        add_select_type_one = in_add_select_type_one;
    else if (status == 'in_three') {
        add_select_type_one = in_add_select_type_two;
        level = '3';
    } else if (status == 'null') {
        level = '2';
    }
    if (add_select_type_one == null || add_select_type_one == "" || add_select_type_one == undefined) {
        $.scojs_message('系统异常！前台未获取到一级类型数据!', $.scojs_message.TYPE_ERROR);
        return;
    }
    debugger;
    //后台请求二级列表数据
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "index.php/Home/sale/getLevelTwo", //目标地址.
        dataType: "json", //数据格式:JSON
        data: {
            'super': add_select_type_one,
            'level': level,
            'status': status
        },
        success: function (result) {
            if (result.status == 'success') {
                var data = result.data;
                debugger;
                if (status == 'null')
                    $('#level_two_list_show').wrapAll(data);
                else if (status == 'in')
                    $('#in_level_two_list_show').wrapAll(data);
                else if (status == 'in_three') {
                    $('#in_level_three_list_show').wrapAll(data);
                }
            } else if (result.status == 'failed') {
                //$.scojs_message('系统异常！' + result.message, $.scojs_message.TYPE_ERROR);
                if (result.level == 3) {
                    $('#in_pro_select_three').hide();
                } else {
                    $('#in_pro_select_two').hide();
                    $('#in_pro_select_three').hide();
                }
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $.scojs_message('网络连接发生未知错误，请稍后再试！' + errorThrown, $.scojs_message.TYPE_ERROR);
        }
    });
}

function showProTypeLevel(level) {
    var status = 'in';
    var add_select_type_one = 0;
    var in_add_select_type_one = $('#in_add_select_type_one').val();
    var in_add_select_type_two = $('#in_add_select_type_two').val();
    //选择商品类型等级
    if (level == 1) {
        $('#in_select_two_text').text('-- 请选择二级类型名称 --');
        $('#in_select_three_text').text('-- 请选择三级类型名称 --');
        $('#in_pro_select_one').show();
        $('#in_pro_select_two').hide();
        $('#in_pro_select_three').hide();
        //设置类型值
        $('#product_type').val('1');
        $('#level_text_one').removeClass('btn-primary').addClass('btn-success');
        $('#level_text_two').removeClass('btn-success').addClass('btn-primary');
        $('#level_text_three').removeClass('btn-success').addClass('btn-primary');
    } else if (level == 2) {
        add_select_type_one = in_add_select_type_one;
        debugger;
        $('#in_select_two_text').text('-- 请选择二级类型名称 --');
        $('#in_pro_select_one').show();
        $('#in_pro_select_two').show();
        $('#in_pro_select_three').hide();
        $('#product_type').val('2');
        $('#level_text_one').removeClass('btn-success').addClass('btn-primary');
        $('#level_text_two').removeClass('btn-primary').addClass('btn-success');
        $('#level_text_three').removeClass('btn-success').addClass('btn-primary');
    } else if (level == 3) {
        add_select_type_one = in_add_select_type_two;
        debugger;
        $('#in_select_three_text').text('-- 请选择三级类型名称 --');
        $('#in_pro_select_one').show();
        $('#in_pro_select_two').show();
        $('#in_pro_select_three').show();
        $('#product_type').val('3');
        $('#level_text_one').removeClass('btn-success').addClass('btn-primary');
        $('#level_text_two').removeClass('btn-success').addClass('btn-primary');
        $('#level_text_three').removeClass('btn-primary').addClass('btn-success');
        status = 'in_three';
    }
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "index.php/Home/sale/getLevelTwo", //目标地址.
        dataType: "json", //数据格式:JSON
        data: {
            'super': add_select_type_one,
            'level': level - 1,
            'status': status
        },
        success: function (result) {
            if (result.status == 'success') {
                var data = result.data;
                debugger;
                if (status == 'in')
                    $('#in_level_two_list_show').wrapAll(data);
                else if (status == 'in_three') {
                    $('#in_level_three_list_show').wrapAll(data);
                }
            } else if (result.status == 'failed') {
                //$.scojs_message('系统异常！' + result.message, $.scojs_message.TYPE_ERROR);
                if (result.level == 1) {
                    $('#in_pro_select_three').hide();
                } else if (result.level == 0) {
                    $('#in_pro_select_two').hide();
                    $('#in_pro_select_three').hide();
                }
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $.scojs_message('网络连接发生未知错误，请稍后再试！' + errorThrown, $.scojs_message.TYPE_ERROR);
        }
    });
}
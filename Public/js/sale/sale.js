/**
 * Created by lawrance on 2018/4/25.
 */
$(function () {
    $('#sale').attr('class', 'active');
});

function select_type_level(level){
    //选择商品类型等级
    if(level==1){
        $('#pro_select_one').hide();
        $('#pro_select_two').hide();
        $('#add_pro_name_one').show();
        $('#add_pro_name_two').hide();
        $('#add_pro_name_three').hide();
    }else if(level==2){
        $('#pro_select_one').show();
        $('#pro_select_two').hide();
        $('#add_pro_name_one').hide();
        $('#add_pro_name_two').show();
        $('#add_pro_name_three').hide();
    }else if(level==3){
        $('#pro_select_one').show();
        $('#pro_select_two').show();
        $('#add_pro_name_one').hide();
        $('#add_pro_name_two').hide();
        $('#add_pro_name_three').show();
    }
}

function submitAddType(){
    var pro_select_one = $('#pro_select_one').val();
    var pro_select_two = $('#pro_select_two').val();
    var add_pro_name_one = $('#add_pro_name_one').val();
    var add_pro_name_two = $('#add_pro_name_two').val();
    var add_pro_name_three = $('#add_pro_name_three').val();
    var add_pro_shelf_code = $('#add_pro_shelf_code').val();
    var add_pro_hint = $('#add_pro_hint').val();
    var add_pro_type_level = $('#add_pro_type_level input[name="add_pro_type_level"]:checked ').val();

    if (add_pro_type_level==1){}
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

function show_add_pro_type(){
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
    //待确定
    var product_type = $('#product_type').val();
    var pro_name = $('#pro_name').val();
    var pro_code = $('#pro_code').val();
    var pro_sum = $('#pro_sum').val();
    var pro_price = $('#pro_price').val();
    var pro_shelf_code = $('#pro_shelf_code').val();
    var pro_sale_sum = $('#pro_sale_sum').val();
    var is_shelf = $('#is_shelf input[name="is_shelf"]:checked ').val();
    var shelf_in_num = $('#shelf_in_num').val();
    var can_dis = $('#can_dis').val();
    var pro_hint = $('#pro_hint').val();
    debugger;
    var is_necessary_vaild = new Array('date_in', 'date_sale_start', 'product_type', 'pro_name', 'pro_code',
        'pro_sum', 'pro_price', 'pro_sale_sum');
    if (is_shelf != null && is_shelf != '' && is_shelf != undefined)
        is_necessary_vaild.push('shelf_in_num');
    is_necessary_vaild.forEach(validation_is_null);
    //确认提交成功之后清除
    clearForm($('#pro_in_form'));
}

function clearForm(form){
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

function validation_is_null(item) {
    if (item != null && item != '' && item != undefined) {
        $.scojs_message('必填项不能为空!', $.scojs_message.TYPE_ERROR);
    }
}
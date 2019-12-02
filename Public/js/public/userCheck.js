$(function () {
    var user_day_post = $('#user_day_post').text();
    var user_name = $('#user_name').text();
    var user_type = $('#user_type').text();
    // function Dictionary() {
    //     this.data = new Array();
    //
    //     this.put = function (key, value) {
    //         this.data[key] = value;
    //     };
    //
    //     this.get = function (key) {
    //         return this.data[key];
    //     };
    //
    //     this.remove = function (key) {
    //         this.data[key] = null;
    //     };
    //
    //     this.isEmpty = function () {
    //         return this.data.length == 0;
    //     };
    //
    //     this.size = function () {
    //         return this.data.length;
    //     };
    //
    //     this.key = function () {
    //         for(var key in this.data){
    //             return key;
    //         }
    //     };
    // }

// //使用 例子
//     var control_list = new Dictionary();
//     control_list.put("1", "this_daypost");
//     control_list.put("1.1", "day_post_nb_this");
//     control_list.put("1.2", "day_post_uw_this");
//     control_list.put("1.3", "day_post_cs_this");
//     control_list.put("1.4", "day_post_clm_this");
//     control_list.put("1.5", "day_post_all_this");
//     control_list.put("2", "post_day_all");
//     control_list.put("3", "bug_list");
//     control_list.put("4", "user_control");
//     control_list.put("4.1", "user_manager");
//     control_list.put("4.2", "qd_user_manager");
//     control_list.put("5", "list_out");
//     control_list.put("5.1", "data_out_ct");
//     control_list.put("5.2", "data_ct_all");
//     control_list.put("5.3", "data_nb_cb");
//     control_list.put("5.4", "data_nb_tb");
//     control_list.put("5.5", "data_nb_hz");
//     control_list.put("5.6", "data_nb_ys");
//     control_list.put("5.7", "data_cap_cs");
//     control_list.put("5.8", "data_cap_nb");
//     control_list.put("5.9", "data_cap_nb_no_arrive");
//     control_list.put("5.A", "data_cap_cs_back");
//     control_list.put("5.B", "data_ct_pt");
//     control_list.put("5.C", "data_cs_cb_style");
//     control_list.put("5.D", "data_pa_no_charge");
//     control_list.put("6", "data_control");
//     control_list.put("7", "list_nb");
//     control_list.put("7.1", "nb_post_table_stream");
//     control_list.put("7.2", "data_export_no_show");
//     control_list.put("8", "list_yd");
//     control_list.put("9", "bx_define");
//     control_list.put("9.1", "cs_define");
//     control_list.put("9.2", "cs_out_define");
//     control_list.put("9.3", "nb_tb_define");
//     control_list.put("9.4", "nb_bd_define");
//     control_list.put("9.5", "clm_define");
//     control_list.put("9.6", "uw_define");
//     control_list.put("9.7", "cs_chat_define");
//     control_list.put("9.8", "nb_chat_define");
//     control_list.put("9.9", "nb_notice_define");
//     control_list.put("9.A", "nb_cbyw_define");
//     control_list.put("9.B", "clm_chat_define");
//     control_list.put("9.C", "chat_dz_define");
//     control_list.put("A", "cap_menu");
//     control_list.put("A.1", "cap_define_cs");
//     control_list.put("A.2", "cap_define_nb");
//     control_list.put("A.3", "cap_define_clm");
//     control_list.put("A.4", "cap_define_pa");
//     control_list.put("B", "scan_menu");
//     control_list.put("C", "sysMaintain_master");
//     control_list.put("C.1", "sysMaintainSub_menu");
//     control_list.put("C.2", "sysMaintainSub_user");
//     control_list.put("C.3", "sysMaintainSub_user_limits");
//     control_list.put("C.4", "sysMaintainSub_data_limits");
//     control_list.put("C.5", "sysMaintainSub_sql");
//
//     var list_name = new Array();
//     list_name.push("this_daypost");
//     list_name.push("day_post_nb_this");
//     list_name.push("day_post_uw_this");
//     list_name.push("day_post_cs_this");
//     list_name.push("day_post_clm_this");
//     list_name.push("day_post_all_this");
//     list_name.push("post_day_all");
//     list_name.push("bug_list");
//     list_name.push("user_control");
//     list_name.push("user_manager");
//     list_name.push("qd_user_manager");
//     list_name.push("list_out");
//     list_name.push("data_out_ct");
//     list_name.push("data_ct_all");
//     list_name.push("data_nb_cb");
//     list_name.push("data_nb_tb");
//     list_name.push("data_nb_hz");
//     list_name.push("data_nb_ys");
//     list_name.push("data_cap_cs");
//     list_name.push("data_cap_nb");
//     list_name.push("data_cap_nb_no_arrive");
//     list_name.push("data_cap_cs_back");
//     list_name.push("data_control");
//     list_name.push("list_nb");
//     list_name.push("nb_post_table_stream");
//     list_name.push("data_export_no_show");
//     list_name.push("list_yd");
//     list_name.push("bx_define");
//     list_name.push("cs_define");
//     list_name.push("cs_out_define");
//     list_name.push("nb_tb_define");
//     list_name.push("nb_bd_define");
//     list_name.push("clm_define");
//     list_name.push("uw_define");
//     list_name.push("cs_chat_define");
//     list_name.push("nb_chat_define");
//     list_name.push("nb_notice_define");
//     list_name.push("nb_cbyw_define");
//     list_name.push("clm_chat_define");
//     list_name.push("cap_menu");
//     list_name.push("cap_define_cs");
//     list_name.push("cap_define_nb");
//     list_name.push("cap_define_clm");
//     list_name.push("cap_define_pa");
//     list_name.push("scan_menu");
//     list_name.push("data_ct_pt");
//     list_name.push("chat_dz_define");
//     list_name.push("data_cs_cb_style");
//     list_name.push("sysMaintain_master");
//     list_name.push("sysMaintainSub_menu");
//     list_name.push("sysMaintainSub_user");
//     list_name.push("sysMaintainSub_user_limits");
//     list_name.push("sysMaintainSub_data_limits");
//     list_name.push("sysMaintainSub_sql");


    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "index.php/Home/SysMaintain/getMenu", //目标地址.
        dataType: "json", //数据格式:JSON
        success: function (result) {
            if (result.status == 'success') {
                debugger;
                showMenu(result);
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

    // //批量全部隐藏
    // for (i = 0; i < list_name.length; i++) {
    //     $('#' + list_name[i]).hide();
    // }
    // debugger;
    // var sx_list_type = $('#sx_list_type').text();
    // var strs = new Array(); //定义一数组
    // strs = sx_list_type.split("&"); //字符分割
    // for (i = 0; i < strs.length; i++) {
    //     if (strs[i] == '99') {
    //         for (i = 0; i < list_name.length; i++) {
    //             $('#' + list_name[i]).show();
    //         }
    //         break;
    //     }
    //     $('#' + control_list.get(strs[i])).show();
    // }
});

function showMenu(result){
    //全部隐藏
    debugger;
    var list_name = result.MENUCODE;
    for (i = 0; i < list_name.length; i++) {
        $('#' + list_name[i]).hide();
    }
    //拆分菜单权限维数组
    var sx_list_type = $('#sx_list_type').text();
    var strs = new Array(); //定义一数组
    strs = sx_list_type.split("&"); //字符分割
    //分权限展示
    for (i = 0; i < strs.length; i++) {
        if (strs[i] == '99') {
            for (i = 0; i < list_name.length; i++) {
                $('#' + list_name[i]).show();
            }
            break;
        }
        debugger;
        $('#' + result[strs[i]]).show();
    }
}
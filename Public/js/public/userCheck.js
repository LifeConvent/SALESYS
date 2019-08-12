$(function () {
    var user_day_post = $('#user_day_post').text();
    var user_name = $('#user_name').text();
    var user_type = $('#user_type').text();
    // if (user_name == 'zhuxj_qd' || user_name == 'quanli' || user_name == 'cuizhan' || user_name == 'zhouyang_qd' || user_name == 'yuyi' || user_type == '1') {
    // } else {
    //     $('#data_export').hide();
    //     // $('#data_out').hide();
    //     $('#data_ct_all').hide();
    //     $('#data_out_ct').hide();
    // }
    // if (user_name == 'yindai') {
    //     $('#day_post').hide();
    //     $('#day_post_two').hide();
    //     $('#day_post_other').hide();
    //     $('#user').hide();
    //     $('#course').hide();
    //     $('#nb_post').hide();
    //     $('#home').hide();
    //     $('#sale').hide();
    //     $('#data_export').show();
    //     $('#data_out_ct').show();
    //     $('#data_ct_all').show();
    //     $('#data_nb_cb').hide();
    //     $('#data_nb_tb').hide();
    //     $('#data_nb_hz').hide();
    //     $('#data_nb_ys').hide();
    //     $('#data_cap_cs').hide();
    //     $('#data_cap_nb').hide();
    //     $('#data_cap_nb_no_arrive').hide();
    //     $('#data_cap_cs_back').hide();
    //     $('#data_export_num').text(2);
    //     // $('#data_export').hide();
    // }
    // if (user_type != '1') {
    //     $('#user_control').hide();
    //     $('#data_control').hide();
    //     $('#post_day_this').hide();
    //     $('#post_day_all').hide();
    // }

    //日报权限控制
    // if (user_day_post != '1') {
    //     $('#day_post').hide();
    //     $('#day_post_this').hide();
    //     $('#day_post_nb_this').hide();
    //     $('#day_post_uw_this').hide();
    //     $('#day_post_cs_this').hide();
    //     $('#day_post_clm_this').hide();
    //     $('#day_post_two').hide();
    //     $('#day_post_all').hide();
    //     $('#day_post_sum').hide();
    // } else {
    //     // $('#day_post').show();
    //     // $('#day_post_this').show();
    //     // $('#day_post_nb_this').show();
    //     // $('#day_post_uw_this').show();
    //     // $('#day_post_cs_this').show();
    //     // $('#day_post_clm_this').show();
    //     // $('#day_post_two').show();
    //     // $('#day_post_all').show();
    //     // $('#day_post_sum').show();
    // }

    function Dictionary() {
        this.data = new Array();

        this.put = function (key, value) {
            this.data[key] = value;
        };

        this.get = function (key) {
            return this.data[key];
        };

        this.remove = function (key) {
            this.data[key] = null;
        };

        this.isEmpty = function () {
            return this.data.length == 0;
        };

        this.size = function () {
            return this.data.length;
        };

        this.key = function () {
            for(var key in this.data){
                return key;
            }
        };
    }

//使用 例子
    var control_list = new Dictionary();

    control_list.put("1", "this_daypost");
    control_list.put("1.1", "day_post_nb_this");
    control_list.put("1.2", "day_post_uw_this");
    control_list.put("1.3", "day_post_cs_this");
    control_list.put("1.4", "day_post_clm_this");
    control_list.put("2", "post_day_all");
    control_list.put("3", "bug_list");
    control_list.put("4", "user_control");
    control_list.put("5", "list_out");
    control_list.put("5.1", "data_out_ct");
    control_list.put("5.2", "data_ct_all");
    control_list.put("5.3", "data_nb_cb");
    control_list.put("5.4", "data_nb_tb");
    control_list.put("5.5", "data_nb_hz");
    control_list.put("5.6", "data_nb_ys");
    control_list.put("5.7", "data_cap_cs");
    control_list.put("5.8", "data_cap_nb");
    control_list.put("5.9", "data_cap_nb_no_arrive");
    control_list.put("5.A", "data_cap_cs_back");
    control_list.put("6", "data_control");
    control_list.put("7", "list_nb");
    control_list.put("7.1", "nb_post_table_stream");
    control_list.put("7.2", "data_export_no_show");
    control_list.put("8", "list_yd");
    control_list.put("9", "bx_define");
    control_list.put("9.1", "cs_define");
    control_list.put("9.2", "cs_out_define");
    control_list.put("9.3", "nb_tb_define");
    control_list.put("9.4", "nb_bd_define");
    control_list.put("9.5", "clm_define");
    control_list.put("9.6", "uw_define");
    control_list.put("9.7", "cs_chat_define");
    control_list.put("9.8", "nb_chat_define");
    control_list.put("9.9", "nb_notice_define");
    control_list.put("9.A", "nb_cbyw_define");
    control_list.put("9.B", "clm_chat_define");
    control_list.put("A", "cap_menu");
    control_list.put("A.1", "cap_define_cs");
    control_list.put("A.2", "cap_define_nb");
    control_list.put("A.3", "cap_define_clm");
    control_list.put("A.4", "cap_define_pa");

    var list_name = new Array();
    list_name.push("this_daypost");
    list_name.push("day_post_nb_this");
    list_name.push("day_post_uw_this");
    list_name.push("day_post_cs_this");
    list_name.push("day_post_clm_this");
    list_name.push("post_day_all");
    list_name.push("bug_list");
    list_name.push("user_control");
    list_name.push("list_out");
    list_name.push("data_out_ct");
    list_name.push("data_ct_all");
    list_name.push("data_nb_cb");
    list_name.push("data_nb_tb");
    list_name.push("data_nb_hz");
    list_name.push("data_nb_ys");
    list_name.push("data_cap_cs");
    list_name.push("data_cap_nb");
    list_name.push("data_cap_nb_no_arrive");
    list_name.push("data_cap_cs_back");
    list_name.push("data_control");
    list_name.push("list_nb");
    list_name.push("nb_post_table_stream");
    list_name.push("data_export_no_show");
    list_name.push("list_yd");
    list_name.push("bx_define");
    list_name.push("cs_define");
    list_name.push("cs_out_define");
    list_name.push("nb_tb_define");
    list_name.push("nb_bd_define");
    list_name.push("clm_define");
    list_name.push("uw_define");
    list_name.push("cs_chat_define");
    list_name.push("nb_chat_define");
    list_name.push("nb_notice_define");
    list_name.push("nb_cbyw_define");
    list_name.push("clm_chat_define");
    list_name.push("cap_menu");
    list_name.push("cap_define_cs");
    list_name.push("cap_define_nb");
    list_name.push("cap_define_clm");
    list_name.push("cap_define_pa");


// <!--当日日报-this_daypost-1
//     1.1-day_post_nb_this
//     1.2-day_post_uw_this
//     1.3-day_post_cs_this
//     1.4-day_post_clm_this
// <!--累计日报-post_day_all-2
// <!--缺陷日报-bug_list-3
// <!--用户管理-user_control-4
// <!--清单数据导出-list_out-5
//     5.1-data_out_ct
//     5.2-data_ct_all
//     5.3-data_nb_cb
//     5.4-data_nb_tb
//     5.5-data_nb_hz
//     5.6-data_nb_ys
//     5.7-data_cap_cs
//     5.8-data_cap_nb
//     5.9-data_cap_nb_no_arrive
//     5.A-data_cap_cs_back
// <!--数据管理-data_control-6
// <!--新契约报表-list_nb-7
//     7.1-nb_post_table_stream
//     7.2-data_export_no_show
// <!--银代渠道报表-list_yd-8

// <!--待确认队列-bx_define-9
//     9.1-cs_define
//     9.2-cs_out_define
//     9.3-nb_tb_define
//     9.4-nb_bd_define
//     9.5-clm_define
//     9.6-uw_define
//     9.7-cs_chat_define
//     9.8-nb_chat_define
//     9.9-nb_notice_define
//     9.A-nb_cbyw_define
//     9.B-clm_chat_define
// <!--收付费核对清单-cap_menu-A
//     A.1-cap_define_cs
//     A.2-cap_define_nb
//     A.3-cap_define_clm
//     A.4-cap_define_pa

    //清单类型权限控制-清单数据导出、银代报表、新契约报表、收付费核对
    var list_type = $('#list_type').text();
    //批量全部隐藏
    for (i = 0; i < list_name.length; i++) {
        $('#' + list_name[i]).hide();
    }
    debugger;
    var sx_list_type = $('#sx_list_type').text();
    var strs = new Array(); //定义一数组
    strs = sx_list_type.split("&"); //字符分割
    for (i = 0; i < strs.length; i++) {
        if (strs[i] == '99') {
            for (i = 0; i < list_name.length; i++) {
                $('#' + list_name[i]).show();
            }
            break;
        }
        switch (strs[i]) {
            case '1'://当日日报
                $('#this_daypost').show();
                $('#day_post').show();
                // $('#day_post_this').show();
                break;
            case '2'://累计日报
                $('#post_day_all').show();
                $('#day_post_two').show();
                // $('#day_post_all').show();
                break;
            case '3'://缺陷日报
                $('#bug_list').show();
                $('#day_post_other').show();
                // $('#day_post_three').show();
                break;
            case '4'://用户管理
                $('#user_control').show();
                $('#user').show();
                // $('#user_sub').show();
                break;
            case '5'://清单数据导出
                $('#list_out').show();
                $('#data_export').show();
                // $('#data_out').show();
                break;
            case '6'://数据管理
                $('#data_control').show();
                $('#course').show();
                // $('#course_sub').show();
                break;
            case '7'://新契约报表
                $('#list_nb').show();
                $('#nb_post').show();
                // $('#nb_post_table').show();
                break;
            case '8'://银代报表
                $('#list_yd').show();
                $('#yd_post').show();
                // $('#yd_post_table').show();
                break;
            case '9'://待确认队列
                $('#bx_define').show();
                $('#home').show();
                // $('#data_ub').show();
                break;
            case 'A'://收付费
                $('#cap_menu').show();
                $('#cap_define').show();
                // $('#cap_define_list').show();
                break;
            default://全部隐藏
                break;
        }
        // alert('#'+control_list.get(strs[i]));
        $('#' + control_list.get(strs[i])).show();
    }

    // //待确认队列权限控制
    // var is_bx_define_user = $('#is_bx_define_user').text();
    // switch (is_bx_define_user) {
    //     case '0'://无权限
    //         //清单导出
    //         if (user_type != '1') {
    //             $('#bx_define').hide();
    //         } else {
    //             $('#bx_define').show();
    //         }
    //         break;
    //     case '1'://有权限
    //         $('#bx_define').show();
    //         break;
    //     default://全部隐藏
    //         $('#bx_define').hide();
    //         break;
    // }
    //
    // //无显示列表权限控制
    // var no_show_list = $('#no_show_list').text();
    // switch (no_show_list) {
    //     case '0'://无权限
    //         //清单导出
    //         if (user_type != '1') {
    //             $('#data_export_no_show').hide();
    //         } else {
    //             $('#list_nb').show();
    //             $('#data_export_no_show').show();
    //         }
    //         break;
    //     case '1'://有权限
    //         $('#list_nb').show();
    //         $('#nb_post_table_stream').hide();
    //         $('#data_export_no_show').show();
    //         break;
    //     default://全部隐藏
    //         $('#data_export_no_show').hide();
    //         break;
    // }
    //
    // //缺陷权限控制
    // var bug_show = $('#bug_show').text();
    // switch (bug_show) {
    //     case '0'://无权限
    //         //清单导出
    //         if (user_type != '1') {
    //             $('#bug_list').hide();
    //         } else {
    //             $('#bug_list').show();
    //         }
    //         break;
    //     case '1'://有权限
    //         $('#bug_list').show();
    //         break;
    //     default://全部隐藏
    //         $('#bug_list').hide();
    //         break;
    // }
});
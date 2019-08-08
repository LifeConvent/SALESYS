$(function() {
    var user_day_post = $('#user_day_post').text();
    var user_name = $('#user_name').text();
    var user_type = $('#user_type').text();
    if(user_name=='zhuxj_qd'||user_name=='quanli'||user_name=='cuizhan'||user_name=='zhouyang_qd'||user_name=='yuyi'||user_type=='1'){
    }else{
        $('#data_export').hide();
        $('#data_out').hide();
        $('#data_ct_all').hide();
        $('#data_out_ct').hide();
    }
    if(user_name=='yindai'){
        $('#day_post').hide();
        $('#day_post_two').hide();
        $('#day_post_other').hide();
        $('#user').hide();
        $('#course').hide();
        $('#nb_post').hide();
        $('#home').hide();
        $('#sale').hide();
        $('#data_export').show();
        $('#data_out_ct').show();
        $('#data_ct_all').show();
        $('#data_nb_cb').hide();
        $('#data_nb_tb').hide();
        $('#data_nb_hz').hide();
        $('#data_nb_ys').hide();
        $('#data_cap_cs').hide();
        $('#data_cap_nb').hide();
        $('#data_cap_nb_no_arrive').hide();
        $('#data_cap_cs_back').hide();
        $('#data_export_num').text(2);
        // $('#data_export').hide();
    }
    if(user_type!='1'){
        $('#user_control').hide();
        $('#data_control').hide();
        $('#post_day_this').hide();
        $('#post_day_all').hide();
    }

    //日报权限控制
    if(user_day_post!='1'){
        $('#day_post').hide();
        $('#day_post_this').hide();
        $('#day_post_nb_this').hide();
        $('#day_post_uw_this').hide();
        $('#day_post_cs_this').hide();
        $('#day_post_clm_this').hide();
        $('#day_post_two').hide();
        $('#day_post_all').hide();
        $('#day_post_sum').hide();
    }else{
        // $('#day_post').show();
        // $('#day_post_this').show();
        // $('#day_post_nb_this').show();
        // $('#day_post_uw_this').show();
        // $('#day_post_cs_this').show();
        // $('#day_post_clm_this').show();
        // $('#day_post_two').show();
        // $('#day_post_all').show();
        // $('#day_post_sum').show();
    }

    //清单类型权限控制-清单数据导出、银代报表、新契约报表
    var list_type = $('#list_type').text();
    switch (list_type) {
        case '99'://管理员
            //清单导出
            debugger;
            $('#list_out').show();
            $('#data_export').show();
            $('#data_out_ct').show();
            $('#data_ct_all').show();
            $('#data_nb_cb').show();
            $('#data_nb_tb').show();
            $('#data_nb_hz').show();
            $('#data_nb_ys').show();
            $('#data_cap_cs').show();
            $('#data_cap_nb').show();
            $('#data_cap_nb_no_arrive').show();
            $('#data_cap_cs_back').show();
            //契约清单
            $('#list_nb').show();
            $('#nb_post_table_stream').show();
            //银代清单
            $('#list_yd').show();
            //收付费
            $('#cap_menu').show();
            $('#cap_define').show();
            $('#cap_define_cs').show();
            $('#cap_define_nb').show();
            $('#cap_define_clm').show();
            $('#cap_define_pa').show();
            break;
        case '0':
            $('#list_out').hide();
            $('#list_nb').hide();
            $('#list_yd').hide();
            $('#cap_menu').hide();
            break;
        case '1'://保全
            $('#list_out').show();
            $('#data_export').show();
            $('#data_out_ct').show();
            $('#data_ct_all').show();
            $('#data_cap_cs').show();
            $('#data_cap_cs_back').show();
            $('#data_export_num').text(4);
            //契约
            $('#data_nb_cb').hide();
            $('#data_nb_tb').hide();
            $('#data_nb_hz').hide();
            $('#data_nb_ys').hide();
            $('#data_cap_nb').hide();
            $('#data_cap_nb_no_arrive').hide();
            //银代契约
            $('#list_nb').hide();
            $('#list_yd').hide();
            $('#cap_menu').hide();
            break;
        case '2'://契约
            $('#list_out').show();
            $('#data_export').show();
            //保全
            $('#data_out_ct').hide();
            $('#data_ct_all').hide();
            $('#data_cap_cs').hide();
            $('#data_cap_cs_back').hide();
            //契约
            $('#data_nb_cb').show();
            $('#data_nb_tb').show();
            $('#data_nb_hz').show();
            $('#data_nb_ys').show();
            $('#data_cap_nb').show();
            $('#data_cap_nb_no_arrive').show();
            $('#data_export_num').text(6);
            //银代契约
            $('#list_nb').hide();
            $('#list_yd').hide();
            $('#cap_menu').hide();
            break;
        case '3':
            break;
        case '4':
            break;
        case '5'://收付费
            $('#list_out').hide();
            $('#list_nb').hide();
            $('#list_yd').hide();
            $('#cap_menu').show();
            $('#cap_define_cs').show();
            $('#cap_define_nb').show();
            $('#cap_define_clm').show();
            $('#cap_define_pa').show();
            break;
        case '6':
            //银代财富
            $('#list_yd').show();
            $('#yd_post_table').show();
            //导出清单
            $('#list_out').show();
            $('#data_export').show();
            $('#data_out_ct').show();
            $('#data_ct_all').show();
            $('#data_export_num').text(2);
            $('#data_nb_cb').hide();
            $('#data_nb_tb').hide();
            $('#data_nb_hz').hide();
            $('#data_nb_ys').hide();
            $('#data_cap_cs').hide();
            $('#data_cap_nb').hide();
            $('#data_cap_nb_no_arrive').hide();
            $('#data_cap_cs_back').hide();
            //契约清单
            $('#list_nb').hide();
            $('#cap_menu').hide();
            break;
        default://全部隐藏
            $('#list_out').hide();
            $('#list_nb').hide();
            $('#list_yd').hide();
            $('#cap_menu').hide();
            break;
    }

    //待确认队列权限控制
    var is_bx_define_user = $('#is_bx_define_user').text();
    switch (is_bx_define_user) {
        case '0'://无权限
            //清单导出
            if(user_type!='1'){
                $('#bx_define').hide();
            }else{
                $('#bx_define').show();
            }
            break;
        case '1'://有权限
            $('#bx_define').show();
            break;
        default://全部隐藏
            $('#bx_define').hide();
            break;
    }

    //无显示列表权限控制
    var no_show_list = $('#no_show_list').text();
    switch (no_show_list) {
        case '0'://无权限
            //清单导出
            if(user_type!='1'){
                $('#data_export_no_show').hide();
            }else{
                $('#list_nb').show();
                $('#data_export_no_show').show();
            }
            break;
        case '1'://有权限
            $('#list_nb').show();
            $('#nb_post_table_stream').hide();
            $('#data_export_no_show').show();
            break;
        default://全部隐藏
            $('#data_export_no_show').hide();
            break;
    }

    //缺陷权限控制
    var bug_show = $('#bug_show').text();
    switch (bug_show) {
        case '0'://无权限
            //清单导出
            if(user_type!='1'){
                $('#bug_list').hide();
            }else{
                $('#bug_list').show();
            }
            break;
        case '1'://有权限
            $('#bug_list').show();
            break;
        default://全部隐藏
            $('#bug_list').hide();
            break;
    }
});
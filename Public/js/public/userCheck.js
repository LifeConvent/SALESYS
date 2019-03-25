$(function () {
    var user_day_post = $('#user_day_post').text();
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
    //清单类型权限控制
    var list_type = $('#list_type').text();
    switch (list_type) {
        case '99'://管理员
            //清单导出
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
            $('#yd_post_table').show();
            break;
        case '0':
            $('#list_out').hide();
            $('#list_nb').hide();
            $('#list_yd').hide();
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
            break;
        case '3':
            break;
        case '4':
            break;
        case '5':
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
            break;
        default://全部隐藏
            $('#list_out').hide();
            $('#list_nb').hide();
            $('#list_yd').hide();
            break;
    }
});
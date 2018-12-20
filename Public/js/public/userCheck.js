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
    if(user_name=='zhuxj_qd'||user_name=='quanli'||user_name=='cuizhan'||user_type=='1'){
    }else{
        $('#data_export').hide();
        $('#data_out').hide();
        $('#data_ct_all').hide();
        $('#data_out_ct').hide();
    }
});
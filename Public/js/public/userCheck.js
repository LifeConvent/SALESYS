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
});
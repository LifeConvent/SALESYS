function countUp(count, countClass) {
    'use strict';
    var div_by = 50,
        speed = Math.round(count / div_by),
        $display = $(countClass),
        run_count = 1,
        int_speed = 20;
    var int = setInterval(function () {
        if (run_count < div_by) {
            $display.text(speed * run_count);
            run_count++;
        } else if (parseInt($display.text()) < count) {
            var curr_count = parseInt($display.text()) + 1;
            $display.text(curr_count);
        } else {
            clearInterval(int);
        }
    }, int_speed);
}

function showCount() {
    countUp(parseInt($('.count').text()), '.show_count');
    countUp(parseInt($('.count1').text()), '.show_count1');
    countUp(parseInt($('.count2').text()), '.show_count2');
    countUp(parseInt($('.count3').text()), '.show_count3');
}


$(function () {
//    设置起始界面数据统计显示
    showCount();

//    传入近期天数据的数组
    var cs_data = $('#weChatMatch').text();
    var tc_data = $('#weChatSub').text();
    var nb_data = $('#weChatNum').text();
    var clm_data = $('#weCESNum').text();
    var cs_time = $('#cs_time').text();
    var clm_time = $('#clm_time').text();
    var nb_time = $('#nb_time').text();
    var tc_time = $('#tc_time').text();

    // # 时间-time-YYYY-MM-DD
    // # TC缺陷总量-new
    // # 契约作业量-allUser
    // # 理赔作业量-survey
    // # 保全作业量-is_match

    cs_time = JSON.parse(cs_time);
    clm_time = JSON.parse(clm_time);
    nb_time = JSON.parse(nb_time);
    tc_time = JSON.parse(tc_time);

    cs_data = eval(cs_data);
    nb_data = eval(nb_data);
    clm_data = eval(clm_data);
    tc_data = eval(tc_data);

    $(document).ready(tableCS('weixin-num', cs_time, cs_data));
    $(document).ready(tableCLM('ce-num', clm_time, clm_data));
    $(document).ready(tableNB('weixin-new-num', nb_time, nb_data));
    $(document).ready(tableTC('weixin-sub-num', tc_time, tc_data));
});

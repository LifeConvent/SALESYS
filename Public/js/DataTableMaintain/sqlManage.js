/**
 * Created by lawrance on 2017/1/11.
 */

$(function () {
    $('#sysMaintain').attr('class', 'active');
    $('#sysMaintainSub').css('display', 'block');
    $('#sysMaintainSub_sql').attr('class', 'active');
});

$('#sql_exe').click(function(){
    var sql_text = $('#sql_text').val();
    // alert(sql_text);
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "index.php/Home/SysMaintain/exeSql", //目标地址.
        dataType: "json", //数据格式:JSON
        data: {
            sql_text: sql_text
        },
        success: function (result) {
            if (result.status == 'success') {
                debugger;
                $.scojs_message(result.message, $.scojs_message.TYPE_OK);
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
});

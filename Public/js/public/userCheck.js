$(function() {

    var is_delete_reviewer = $('#is_delete_reviewer').text();
    var is_delete_apply = $('#is_delete_apply').text();

    var is_dz_chat = $('#is_dz_chat').text();
    var user_name = $('#user_name').text();
    if(is_dz_chat!='1'){
        $('#chat_define_dz').hide();
    }
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "index.php/Home/SysMaintain/getMenuBx", //目标地址.
        dataType: "json", //数据格式:JSON
        success: function (result) {
            if (result.status == 'success') {
                debugger;
                showMenu(result);
                debugger;
                $.ajax({
                    type: "POST", //用POST方式传输
                    url: HOST + "index.php/Home/SysNotice/getNotice", //目标地址.
                    dataType: "json", //数据格式:JSON
                    data:{user_name:user_name},
                    success: function (result) {
                        if (result.status == 'success') {
                            debugger;
                            var str = '';
                            $('#sysNotice').modal({backdrop:'static', keyboard: false});
                            $('#sysNotice').modal('show');
                            for (var i = 0; i < result.message.length; i++) {
                                //拼凑html通知
                                str += "<div><p style='letter-spacing:2px'>&nbsp;&nbsp;&nbsp;&nbsp;"+result.message[i]+"</p></div>"
                            }
                            $('#sys_notice_text').append(str);
                            var time = 10;
                            setInterval(function countTime(){
                                if(time<=0)
                                {
                                    $('#dealModal').text('确认');
                                    $('#dealModal').attr("disabled",false);
                                }else{
                                    $('#dealModal').text(time+"s 后即可点击");
                                    $('#dealModal').attr("disabled",true);
                                    time--;
                                }
                            },1000);
                        }else{
                            $('#sysNotice').modal('hide');
                            // sleep(2000);
                        }
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert(XMLHttpRequest);
                        alert(textStatus);
                        alert(errorThrown);
                    }
                });
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

function showMenu(result){
    //全部隐藏
    debugger;
    var list_name = result.MENUCODE;
    for (i = 0; i < list_name.length; i++) {
        $('#' + list_name[i]).hide();
    }
    //拆分菜单权限维数组
    var bx_list_type = $('#bx_list_type').text();
    var strs = new Array(); //定义一数组
    strs = bx_list_type.split("&"); //字符分割
    //分权限展示
    for (i = 0; i < strs.length; i++) {
        if (strs[i] == '99') {
            for (i = 0; i < list_name.length; i++) {
                $('#' + list_name[i]).show();
            }
            break;
        }
        $('#' + result[strs[i]]).show();
    }
}

function sleep(numberMillis) {
    var now = new Date();
    var exitTime = now.getTime() + numberMillis;
    while (true) {
        now = new Date();
        if (now.getTime() > exitTime)
            return;
    }
}
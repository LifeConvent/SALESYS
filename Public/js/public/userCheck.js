$(function () {
    var user_day_post = $('#user_day_post').text();
    var user_name = $('#user_name').text();
    var user_type = $('#user_type').text();
    $('#sysNotice').modal({backdrop:'static', keyboard: false});
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "index.php/Home/SysMaintain/getMenu", //目标地址.
        dataType: "json", //数据格式:JSON
        success: function (result) {
            if (result.status == 'success') {
                debugger;
                showMenu(result);//获取系统通知
                $.ajax({
                    type: "POST", //用POST方式传输
                    url: HOST + "index.php/Home/SysNotice/getNotice", //目标地址.
                    dataType: "json", //数据格式:JSON
                    data:{user_name:user_name},
                    success: function (result) {
                        if (result.status == 'success') {
                            debugger;
                            var str = '';
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

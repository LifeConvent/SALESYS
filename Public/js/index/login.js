/**
 * Created by lawrance on 2016/11/24.
 */

function login() {
    var userName = $('#user_name').val();
    var userPass = $('#user_pass').val();
    if (userName == '') {
        $.scojs_message('用户名不能为空！', $.scojs_message.TYPE_ERROR);
    } else if (userPass == '') {
        $.scojs_message('密码不能为空！', $.scojs_message.TYPE_ERROR);
    } else {
        userPass = hex_md5(userPass);
        // alert(HOST);
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "index.php/Home/Index/login", //目标地址.
            //url: "{:U('login')}", //目标地址.
            dataType: "JSON", //数据格式:JSON
            data: {user: userName, pass: userPass},
            success: function (result) {
                if (result.status == 'success') {
                    debugger;
                    $.scojs_message(result.hint, $.scojs_message.TYPE_OK);
                    window.location.href = HOST + "index.php/Home/Home/home";
                } else {
                    $.scojs_message(result.hint, $.scojs_message.TYPE_ERROR);
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert(XMLHttpRequest);
                alert(textStatus);
                alert(errorThrown);
            }
        });
    }
}

$(function () {
    document.onkeydown = function (e) {
        var ev = document.all ? window.event : e;
        if (ev.keyCode == 13) {
            login();
        }
    }
});
$(function() {

    var is_delete_reviewer = $('#is_delete_reviewer').text();
    var is_delete_apply = $('#is_delete_apply').text();

    var is_dz_chat = $('#is_dz_chat').text();
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
        debugger;
        $('#' + result[strs[i]]).show();
    }
}
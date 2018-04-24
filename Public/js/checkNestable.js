/**
 * Created by lawrance on 2016/11/10.
 */
function checkNestable() {

    var element1 = '';
    var element2 = '';
    var element3 = '';
    var name = '';
    var type = '';
    var content = '';
    var key = '';
    var keyID = '';
    var data = new Array();

    if (!getDis('nestable-1-hint')) {
        if (!getDis('nestable1')) {
            return;
        }
        //一级菜单只取菜单名  通过判断二级display来获取二级所有元素
        name = getValue('nestable-1-menu');
        if (name == '') {
            $.scojs_message('提交的菜单参数不能为空！1', $.scojs_message.TYPE_ERROR);
            return;
        }

        element1 = '{"name": "' + name + '","sub_button":[';

        for (var i = 2; i < 7; i++) {
            if (!getDis('nestable' + i)) {
                break;
            }
            name = getValue('nestable-' + i + '-menu');
            type = getValue('nestable-' + i + '-type');
            content = getValue('nestable-' + i + '-content');
            if (name == '' || content == '') {
                $.scojs_message('提交的菜单参数不能为空！2', $.scojs_message.TYPE_ERROR);
                return;
            }
            key = 'url';
            if (type == 'click') {
                key = 'key';
                keyID = randomString(5) + String(Date.parse(new Date()));//不能是中文，keyID需要为数字编号,时间戳来生成 content为回复内容，记录进入数据库
                data.push('{"key":"' + keyID + '","content":"' + content + '"}');
            } else {
                keyID = content;
            }
            if (i == 6 || !getDis('nestable' + (i + 1))) {
                element1 += '{"name": " ' + name + '","type": "' + type + '","' + key + '": "' + keyID + '"}]}';
                if (getDis('nestable7') || getDis('nestable13')) {
                    element1 += ',';
                }
            } else {
                element1 += '{"name": " ' + name + '","type": "' + type + '","' + key + '": "' + keyID + '"},';
            }
        }
    } else {
        //一级菜单1无子菜单  取一级所有元素
        if (getDis('nestable1')) {
            name = getValue('nestable-1-menu');
            type = getValue('nestable-1-type');
            content = getValue('nestable-1-content');
            if (name == '' || content == '') {
                $.scojs_message('提交的菜单参数不能为空！3', $.scojs_message.TYPE_ERROR);
                return;
            }
            key = 'url';
            if (type == 'click') {
                key = 'key';
                keyID = randomString(5) + String(Date.parse(new Date()));//不能是中文，keyID需要为数字编号,时间戳来生成 content为回复内容，记录进入数据库
                data.push('{"key":"' + keyID + '","content":"' + content + '"}');
            } else {
                keyID = content;
            }
            if (!getDis('nestable7')) {
                element1 = '{"name": " ' + name + '","type": "' + type + '","' + key + '": "' + keyID + '"}';
            } else {
                element1 = '{"name": " ' + name + '","type": "' + type + '","' + key + '": "' + keyID + '"},';
            }
        }
    }

    if (!getDis('nestable-7-hint')) {
        if (!getDis('nestable7')) {
            return;
        }
        name = getValue('nestable-7-menu');
        if (name == '') {
            $.scojs_message('提交的菜单参数不能为空！4', $.scojs_message.TYPE_ERROR);
            return;
        }

        element2 = '{"name": "' + name + '","sub_button":[';

        for (var i = 8; i < 13; i++) {
            if (!getDis('nestable' + i)) {
                break;
            }
            name = getValue('nestable-' + i + '-menu');
            type = getValue('nestable-' + i + '-type');
            content = getValue('nestable-' + i + '-content');
            if (name == '' || content == '') {
                $.scojs_message('提交的菜单参数不能为空！5' + i, $.scojs_message.TYPE_ERROR);
                return;
            }

            key = 'url';
            if (type == 'click') {
                key = 'key';
                keyID = randomString(5) + String(Date.parse(new Date()));//不能是中文，keyID需要为数字编号,时间戳来生成 content为回复内容，记录进入数据库
                data.push('{"key":"' + keyID + '","content":"' + content + '"}');
            } else {
                keyID = content;
            }

            if (i == 12 || !getDis('nestable' + (i + 1))) {
                element2 += '{"name": " ' + name + '","type": "' + type + '","' + key + '": "' + keyID + '"}]}';
                if (getDis('nestable13')) {
                    element2 += ',';
                }
            } else {
                element2 += '{"name": " ' + name + '","type": "' + type + '","' + key + '": "' + keyID + '"},';
            }
        }
    } else {
        if (getDis('nestable7')) {
            name = getValue('nestable-7-menu');
            type = getValue('nestable-7-type');
            content = getValue('nestable-7-content');
            if (name == '' || content == '') {
                $.scojs_message('提交的菜单参数不能为空！6', $.scojs_message.TYPE_ERROR);
                return;
            }

            key = 'url';
            if (type == 'click') {
                key = 'key';
                keyID = randomString(5) + String(Date.parse(new Date()));//不能是中文，keyID需要为数字编号,时间戳来生成 content为回复内容，记录进入数据库
                data.push('{"key":"' + keyID + '","content":"' + content + '"}');
            } else {
                keyID = content;
            }

            if (!getDis('nestable13')) {
                element2 = '{"name": " ' + name + '","type": "' + type + '","' + key + '": "' + keyID + '"}';
            } else {
                element2 = '{"name": " ' + name + '","type": "' + type + '","' + key + '": "' + keyID + '"},';
            }
        }
    }

    if (!getDis('nestable-13-hint')) {
        if (!getDis('nestable13')) {
            return;
        }
        name = getValue('nestable-13-menu');
        if (name == '') {
            $.scojs_message('提交的菜单参数不能为空！7', $.scojs_message.TYPE_ERROR);
            return;
        }

        element3 = '{"name": "' + name + '","sub_button":[';

        for (var i = 14; i < 18; i++) {
            if (!getDis('nestable' + i)) {
                break;
            }
            name = getValue('nestable-' + i + '-menu');
            type = getValue('nestable-' + i + '-type');
            content = getValue('nestable-' + i + '-content');
            if (name == '' || content == '') {
                $.scojs_message('提交的菜单参数不能为空！8' + i, $.scojs_message.TYPE_ERROR);
                return;
            }

            key = 'url';
            if (type == 'click') {
                key = 'key';
                keyID = randomString(5) + String(Date.parse(new Date()));//不能是中文，keyID需要为数字编号,时间戳来生成 content为回复内容，记录进入数据库
                data.push('{"key":"' + keyID + '","content":"' + content + '"}');
            } else {
                keyID = content;
            }

            if (i == 17 || !getDis('nestable' + (i + 1))) {
                element3 += '{"name": " ' + name + '","type": "' + type + '","' + key + '": "' + keyID + '"}]}';
            } else {
                element3 += '{"name": " ' + name + '","type": "' + type + '","' + key + '": "' + keyID + '"},';
            }
        }
    } else {
        if (getDis('nestable13')) {
            name = getValue('nestable-13-menu');
            type = getValue('nestable-13-type');
            content = getValue('nestable-13-content');
            if (name == '' || content == '') {
                $.scojs_message('提交的菜单参数不能为空！9', $.scojs_message.TYPE_ERROR);
                return;
            }

            key = 'url';
            if (type == 'click') {
                key = 'key';
                keyID = randomString(5) + String(Date.parse(new Date()));//不能是中文，keyID需要为数字编号,时间戳来生成 content为回复内容，记录进入数据库
                data.push('{"key":"' + keyID + '","content":"' + content + '"}');
            } else {
                keyID = content;
            }

            element3 = '{"name": " ' + name + '","type": "' + type + '","' + key + '": "' + keyID + '"}';
        }
    }

    var menu = '{"button":[' + element1 + element2 + element3 + ']}';

    var dataPost = '[';
    for (var i = 0; i < data.length; i++) {
        dataPost += data[i];
        if (i != data.length - 1) {
            dataPost += ',';
        }
    }
    dataPost += ']';

    $('#nestable_list_1_output').text(menu + '-------' + dataPost);

    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "CES/index.php/Home/Menu/upMenuList", //目标地址.
        dataType: "json", //数据格式:JSON
        data: {menu: menu, data: data},
        success: function (result) {
            if (result.status == 'success') {
                $.scojs_message('菜单设置成功，请稍后在公众平台中查看！', $.scojs_message.TYPE_OK);
            } else {
                switch (result.message) {
                    case 40018:
                    {
                        var message = '一级菜单名称长度不正确，请阅读注意事项并检查后再试！';
                        break;
                    }
                    case 40019:
                    {
                        //主菜单key值设置错误，显示为系统错误
                        message = '系统发生未知错误，请稍后再试！';
                        break;
                    }
                    case 40020:
                    {
                        message = '一级菜单url长度不正确，请阅读注意事项并检查后再试！';
                        break;
                    }
                    case 40025:
                    {
                        message = '子菜单名称长度不正确，请阅读注意事项并检查后再试！';
                        break;
                    }
                    case 40026:
                    {
                        //子菜单key值设置错误，显示为系统错误
                        message = '系统发生未知错误，请稍后再试！';
                        break;
                    }
                    case 40027:
                    {
                        message = '子级菜单url长度不正确，请阅读注意事项并检查后再试！';
                        break;
                    }
                    case 40028:
                    {
                        message = '该微信平台不具备设置菜单权限，请阅读注意事项并获取权限后再试！';
                        break;
                    }
                    case 40055:
                    {
                        message = '错误的url设置，请检查后再试！';
                        break;
                    }
                    default:
                        message = '请稍后再试！' + result.message;
                }
                $.scojs_message('菜单设置失败，' + result.message, $.scojs_message.TYPE_ERROR);
            }
        },
        error: function (request) {
            $.scojs_message('网络连接发生未知错误，请稍后再试！', $.scojs_message.TYPE_ERROR);
        }
    });

}

function getDis(id) {
    if ((document.getElementById(id).style.display == 'none')) {
        return false;
    }
    else {
        return true;
    }
}

function getValue(id) {
    return document.getElementById(id).value;
}

function randomString(len) {
    len = len || 32;
    var $chars = 'ABCDEFGHJKMNPQRSTWXYZabcdefhijkmnprstwxyz2345678';
    /****默认去掉了容易混淆的字符oOLl,9gq,Vv,Uu,I1****/
    var maxPos = $chars.length;
    var pwd = '';
    for (var i = 0; i < len; i++) {
        pwd += $chars.charAt(Math.floor(Math.random() * maxPos));
    }
    return pwd;
}
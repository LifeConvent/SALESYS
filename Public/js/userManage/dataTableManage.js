/**
 * Created by lawrance on 2017/1/11.
 */

$(function () {
    $('#user').attr('class', 'active');
    $('#user_sub').css('display', 'block');
    $('#table_manage').attr('class', 'active');

    //var i = 1;
    //var result = setInterval(function () {
    //    if (i <= 100) {
    //        //var percent = i / 100.0;
    //        $('#progress').css('width', i + "%");
    //        $('#show_progress').text(i++);
    //    } else {
    //        clearInterval(result);
    //    }
    //}, 1000);

    $('.selectpicker').selectpicker({});
    $('.selectpicker').val('-1');
    $('.selectpicker').selectpicker('render');
});

function upload_next(id) {
    var table_name = '';
    switch (id) {
        case '1':
        {
            table_name = $('#db_table').val();
            if (table_name == '-1') {
                $.scojs_message('请选择需要导入的数据库表后再进行下一步!', $.scojs_message.TYPE_ERROR);
                return;
            }
            var is_delete = $('#is_delete').val();
            if(is_delete == '-1'||is_delete=='null'){
                $.scojs_message('数据库表格修改方式必选!', $.scojs_message.TYPE_ERROR);
                return;
            }
            if(is_delete == '2'){
                $.scojs_message('暂不支持主键更新方式，请选择其他方式!', $.scojs_message.TYPE_ERROR);
                return;
            }
            $('#table_name').text(table_name);
            var file_name = $('#list_output').val();
            $.ajax({
                type: "POST", //用POST方式传输,获取数据表字段名的同时,获取上传文件的字段名
                url: HOST + "index.php/Home/Method/getTableFiledSx", //目标地址.
                dataType: "JSON", //数据格式:JSON
                data: {table_name: table_name, file_name: file_name},
                success: function (result) {
                    if (result.status == 'success') {
                        //数据库中的字段名
                        var file_field = result.file_field.toString();
                        var field = result.data.toString();
                        field = field.split(',');
                        file_field = file_field.split(',');
                        //获取数据表中的字段名,调整对应关系
                        $list = "<div><div><div style='float:left;' class='col-sm-8'><button class='btn btn-info'>数据库表中字段名</button></div><div style='float:left;' class='col-sm-4'><button class='btn btn-info'>EXCEL表字段</button></div></div>";
                        for (var i = 0; i < field.length; i++) {
                            $list += " <textarea rows='1' style='visibility:hidden'></textarea><div><div style='float:left;' class='col-sm-8'><input disabled='' type='text' class='form-control' value='" + field[i] + "'></div>";
                            //创建select
                            $select = "<div style='float:left;' class='col-sm-4'><select id='field_match" + (i + 1) + "' class='form-control'>";
                            $select += "<option value='" + null + "' >  无 </option>";
                            for (var j = 0; j < file_field.length; j++) {
                                $select += "<option value='" + field[i] + "-" + file_field[j] + "' > " + file_field[j] + " </option>";
                            }
                            $select += '</select></div></div>';
                            $list += $select;
                        }
                        $('#select_amount').val(i);
                        $list += '</div>';
                        $("#match_field").empty();
                        $("#match_field").append($list);
                        //alert(file_field);
                        //alert(field[0]);
                        $('#field1').hide();
                        $('#stepy_form-title-1').attr("class", "");
                        $('#field2').show();
                        $('#stepy_form-title-2').attr("class", "current-step");
                        $('#field3').hide();
                        $('#stepy_form-title-3').attr("class", "");
                    } else {
                        $.scojs_message(result.message, $.scojs_message.TYPE_ERROR);
                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert(XMLHttpRequest);
                    alert(textStatus);
                    alert(errorThrown);
                    $.scojs_message('网络连接发生未知错误，请稍后再试！', $.scojs_message.TYPE_ERROR);
                }
            });
            break;
        }
        case '2':
        {
            var select_amount = $('#select_amount').val();
            var select_data = '';
            for (var i = 0; i < select_amount; i++) {
                var select_id = '#field_match' + (i + 1);
                if ($(select_id).val() != 'null')
                    select_data += ($(select_id).val() + ',');
            }
            debugger;
            // alert(select_data);
            select_data = select_data.substring(0, select_data.length - 1);
            // alert(select_data);
            $('#match_relation').val(select_data);
            $('#field1').hide();
            $('#stepy_form-title-1').attr("class", "");
            $('#field2').hide();
            $('#stepy_form-title-2').attr("class", "");
            $('#field3').show();
            $('#stepy_form-title-3').attr("class", "current-step");
            break;
        }
    }
}

function upload_back(id) {
    switch (id) {
        case '2':
        {
            $('#field1').show();
            $('#stepy_form-title-1').attr("class", "current-step");
            $('#field2').hide();
            $('#stepy_form-title-2').attr("class", "");
            $('#field3').hide();
            $('#stepy_form-title-3').attr("class", "");
            break;
        }
        case '3':
        {
            $('#field1').hide();
            $('#stepy_form-title-1').attr("class", "");
            $('#field2').show();
            $('#stepy_form-title-2').attr("class", "current-step");
            $('#field3').hide();
            $('#stepy_form-title-3').attr("class", "");
            break;
        }
    }
}

//function startMatch() {
//    //表格对应关系,先拆,号再拆-
//    var match_relation = $('#match_relation').val();
//    //文件名称
//    var file_name = $('#list_output').val();
//    var table_name = $('#table_name').val();
//    //alert(match_relation);
//    //alert(file_name);
//    //alert(table_name);
//    $.ajax({
//        type: "POST", //用POST方式传输
//        url: HOST + "index.php/Home/Method/startUploads", //目标地址.
//        dataType: "JSON", //数据格式:JSON
//        data: {m_r: match_relation, f_n: file_name, t_n: table_name},
//        success: function (result) {
//            if (result.status == 'success') {
//                $.scojs_message('正在上传', $.scojs_message.TYPE_OK);
//                $('#uploadStep').modal('hide');
//            } else {
//                $.scojs_message(result.message, $.scojs_message.TYPE_ERROR);
//            }
//        },
//        error: function (XMLHttpRequest, textStatus, errorThrown) {
//            alert(XMLHttpRequest);
//            alert(textStatus);
//            alert(errorThrown);
//            $.scojs_message('网络连接发生未知错误，请稍后再试！', $.scojs_message.TYPE_ERROR);
//        }
//    });
//    //$.scojs_message('正在上传', $.scojs_message.TYPE_OK);
//    //$('#uploadStep').modal('hide');
//}

$('#db_table').change(function(){
    var db_table = $('#db_table').val();
    //获取该数据表可操作权限
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "index.php/Home/SysMaintain/getTableKLimits", //目标地址.
        dataType: "json", //数据格式:JSON
        data: {
            db_table: db_table
        },
        success: function (result) {
            if (result.status == 'success') {
                debugger;
                $('#is_delete').empty();
                $('#is_delete').append(result.message);
                $('#is_delete').selectpicker('refresh');
            } else if (result.status == 'failed') {
                debugger;
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert(XMLHttpRequest);
            alert(textStatus);
            alert(errorThrown);
        }
    });
});

function startMatch() {
    //表格对应关系,先拆,号再拆-
    var match_relation = $('#match_relation').val();
    //文件名称
    var file_name = $('#list_output').val();
    var table_name = $('#table_name').val();
    var time = (new Date()).valueOf();
    var is_delete = $('#is_delete').val();
    //alert(match_relation);
    //alert(file_name);
    //alert(table_name);
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "index.php/Home/Method/startUploadsSx", //目标地址.
        dataType: "JSON", //数据格式:JSON
        data: {
            m_r: match_relation, f_n: file_name, t_n: table_name, time: time, is_delete:is_delete
        }
    });
    debugger;
    var ajaxData = {
        type: "POST",
        url: HOST + "index.php/Home/Method/getFile",
        dataType: "JSON",
        data: {time: time},
        success: function (result) {
            if (result.status == "success") {
                debugger;
                var num = parseInt(result.percent.substring(0, result.percent.length - 1));
                if (num >= 99) {
                    $("#progress").css('width', '100%');
                    $('#show_progress').text(100);
                    $('#uploadStep').modal('hide');
                    $.ajax({
                        type: "POST", //用POST方式传输
                        url: HOST + "index.php/Home/Method/deleteFile", //目标地址.
                        dataType: "JSON", //数据格式:JSON
                        data: {
                            f_n: file_name, time: time
                        },
                        success: function (result) {
                            if (result.status == "success") {
                                $.scojs_message(result.message,$.scojs_message.TYPE_OK);
                            }
                        }
                    });
                    //setTimeout($('#uploadStep').modal('hide'),3000);
                } else if (result.percent != "100%") {
                    $("#progress").css('width', result.percent);
                    $('#show_progress').text(num);
                    $.ajax(ajaxData);
                } else if (result.percent == "100%") {
                    $("#progress").css('width', result.percent);
                    $('#show_progress').text(num);
                    $('#uploadStep').modal('hide');
                    $.ajax({
                        type: "POST", //用POST方式传输
                        url: HOST + "index.php/Home/Method/deleteFile", //目标地址.
                        dataType: "JSON", //数据格式:JSON
                        data: {
                            f_n: file_name, time: time
                        },
                        success: function (result) {
                            if (result.status == "success") {
                                $.scojs_message(result.message,$.scojs_message.TYPE_OK);
                            }
                        }
                    });
                }
            } else {
                $.scojs_message(result.message, $.scojs_message.TYPE_ERROR);
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert(XMLHttpRequest + textStatus + errorThrown);
            $.scojs_message("网络连接发生未知错误，请稍后再试！", $.scojs_message.TYPE_ERROR);
        }
    };
    $.ajax(ajaxData);
    //$.scojs_message('正在上传', $.scojs_message.TYPE_OK);
    //$('#uploadStep').modal('hide');
}

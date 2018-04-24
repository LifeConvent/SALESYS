/**
 * Created by lawrance on 2016/12/3.
 */
$(function () {
    //初始化
    initSurvey();
});

function initSurvey() {
    var QList = $('#QList').val();
    var SList = $('#SList').val();

    var QObject = JSON.parse(QList);
    var SObject = JSON.parse(SList);

    //设置问卷名称
    var s_name = SObject.name;
    $('#s_name').text(s_name);

    var count = SObject.count;
    $('#q_count').val(count);

    var survey_id = SObject.survey_id;
    $('#survey_id').val(survey_id);

    var description = SObject.description;
    //description = 'attr()方法能够获取元素属性，也能能够设置元素属性。方法如下，当attr(para1)方法有个参数时候用于获得当前元素的para1的属性值，当attr(para1,attrValue)有两个参数时候设置当前元素的属性名为para1的属性值为attrValue;例：$("p").attr("title");该示例用于获得p元素的title属性值。$("p").attr("title","你最喜欢的水果");该示例设置p元素的title属性值为"你最喜欢的水果";如果一次设置多个属性值可以使用“名/值”对形式，例：$("p").attr({"title":"你最喜欢的水果","name":"水果"})。该示例一次设置两个属性值。';

    if (description != '') {
        var des = "<span style='color: #89d951'>" + "<span style='color: red'>问卷简介:</span><br>&nbsp;&nbsp;&nbsp;&nbsp;" + description + "</span>";
        $("#QuestionList").append(des);
    }

    var list = "<br><br><span>" + "<span style='color: red'>问题列表:</span></span>";
    $("#QuestionList").append(list);
    for (var i = 0; i < QObject.length; i++) {
        var q_name = QObject[i].name;
        var before_des = QObject[i].before_des;
        var after_des = QObject[i].after_des;
        var hint = QObject[i].hint;
        var is_must = QObject[i].is_must;
        var question_id = QObject[i].question_id;

        var type = QObject[i].type;
        var content = QObject[i].content;
        addQLi(question_id, type, q_name, content, i + 1, before_des, after_des, is_must);
    }
    $('input').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
        increaseArea: '2%' // optional
    });
}

function addQLi(question_id, type, q_name, content, order, before_des, after_des, is_must) {
    $ul = $("<ul class='mar-top-10' style='color: #536773'></ul>");
    var li = '';
    if (before_des != '') {
        li += "<span style='color: #89d951;margin-left: 20px;'>" + before_des + "<br></span>";
    }
    if (is_must == '1') {
        li += "<button id=" + "sur_question" + order + " value='" + question_id + '-' + type + '-' + is_must + "' style='background:none;border:0;text-align: left;'>" + "<span><span style='color: red;margin-right: 10px;'>*</span>" + q_name + "</span></button>";
    } else {
        li += "<button id=" + "sur_question" + order + " value='" + question_id + '-' + type + '-' + is_must + "' style='background:none;border:0;text-align: left;'>" + q_name + "</button>";
    }
    if (type == '1') {
        //添加li
        var q_list = JSON.parse(content);
        var num = q_list.length;
        for (var i = 0; i < num; i++) {
            //问题选项
            //li += "<li>" + q_list[i] + "</li>";
            li += "<div class='radio' style='margin-left: 0px;' id='" + "question_ans" + order + "'> <div><label class='" + "question_ans" + order + "'> <input type='radio' class='type-switch' data-type='standard' name='" + "question_ans" + order + "' value='" + (i + 1) + "'><span style='margin-top:10px;margin-left:10px;line-height:25px'>" + q_list[i] + " </span> </label></div></div>";
        }
    } else if (type == '2') {
        //添加li
        q_list = JSON.parse(content);
        num = q_list.length;
        li += "<div style='margin-left: 20px'>";
        for (i = 0; i < num; i++) {
            //问题选项
            //li += "<li>" + q_list[i] + "</li>";
            li += "<div class='checkbox' style='margin-left: -20px;' id='" + "question_ans" + order + "'><div> <label class='" + "question_ans" + order + "'> <input type='checkbox' value='" + (i + 1) + "' name='" + "question_ans" + order + "[]'><span style='margin-top:10px;margin-left:10px;line-height:25px'>" + q_list[i] + " </span></label><div> </div>";
        }
        li += "</div>";
    } else if (type == '3') {
        //添加li
        var row;
        if (content == '3') {
            row = 8;
        } else if (content == '2') {
            row = 5;
        } else if (content == '1') {
            row = 2;
        }
        li += "<div class='mar-top-10' style='margin-left: 30px;margin-right: 30px;'><textarea rows='" + row + "' class='form-control' id=" + "question_ans" + order + " maxlength='200' placeholder='请输入200字以内文字信息...'></textarea></div>";
    }
    //if (after_des != '') {
    //    li += "<span style='color: #89d951;margin-left: 20px;'>" + after_des + "</span>";
    //}
    $ul.append(li);
    $("#QuestionList").append($ul);
}

function submitAnswer() {
    var num = $('#q_count').val();
    var result = '[{"survey_id":"' + $('#survey_id').val() + '"},';
    for (var i = 1; i <= num; i++) {
        var q_id = 'sur_question' + i;
        var question = $('#' + q_id).val().split('-');
        var question_id = question[0];
        var type = question[1];
        var is_must = question[2];
        var question_ans = '';
        switch (type) {
            case'1':
                question_ans = $("#question_ans" + i + " input[name='question_ans" + i + "']:checked ").val();
                if (question_ans == undefined) {
                    question_ans = '';
                }
                break;
            case'2':
                var str = new Array();
                $("#question_ans" + i + " input[name='question_ans" + i + "[]']:checked ").each(function () {
                    str.push($(this).val());
                });
                question_ans = JSON.stringify(str);
                question_ans = JSON.parse(question_ans);
                if (question_ans == undefined) {
                    question_ans = '';
                }
                break;
            case'3':
                question_ans = $("#" + "question_ans" + i).val();
                break;
        }
        if (is_must == '1' && question_ans == '') {
            $.scojs_message('必填项不能为空！', $.scojs_message.TYPE_ERROR);
            return;
        }
        if (i != num) {
            result += '{"question_id":"' + question_id + '",' + '"question_ans":"' + question_ans + '",' + '"type":"' + type + '"},';
        }
        else {
            result += '{"question_id":"' + question_id + '",' + '"question_ans":"' + question_ans + '",' + '"type":"' + type + '"}';
        }
    }
    result += "]";
    //alert(result);
    var openid = $('#S_openid').val();
    //注意md5算法加密中文字符的问题
    var id = md5(result + KEY);
    $.ajax({
        type: "POST", //用POST方式传输
        url: HOST + "index.php/Home/SurveyPublish/surveyAnswer", //目标地址.
        dataType: "json", //数据格式:JSON
        data: {ans: result, openid: openid, id: id},
        success: function (result) {
            if (result.status == 'success') {
                $.scojs_message('提交成功，感谢您问卷调查！', $.scojs_message.TYPE_OK);
                //window.location.href = HOST + 'CESBack/index.php/Home/Show/show?oi=' + openid;
                window.history.go(-1);
                window.location.reload();
            } else if (result.status == 'failed') {
                $.scojs_message('提交失败，请稍后再试！' + result.message, $.scojs_message.TYPE_ERROR);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $.scojs_message('网络连接发生未知错误，请稍后再试！' + errorThrown, $.scojs_message.TYPE_ERROR);
        }
    });
}


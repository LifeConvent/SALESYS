/**
 * Created by lawrance on 2016/12/8.
 */
$(function () {
    //初始化
    initSurvey();
});

function initSurvey() {
    var SList = $('#SList').val();

    var SObject = JSON.parse(SList);

    for (var i = 0; i < SObject.length; i++) {
        var s_name = SObject[i].name;
        var openid = SObject[i].openid;
        var survey_id = SObject[i].survey_id;
        var stu_num = SObject[i].stu_num;

        addQLi(s_name, openid, survey_id);
    }
}

function addQLi(s_name, openid, survey_id) {
    $ul = $("<ul class='mar-top-10' style='color: #536773'></ul>");
    var li = '';
    li += ("<li class='list-group-item mar_top' class='height-40'><a href='" + HOST + "index.php/Home/SurveyPublish/surveyPublish?si=" + survey_id + "&oi=" + openid + "'>" + s_name + "</a></li>");
    $ul.append(li);
    $("#SurveyList").append($ul);
}

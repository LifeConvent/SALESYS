
// function startWithNotice(){
//     $.ajax({
//         type: "POST",
//         url: HOST + "index.php/Home/Method/getUserTypeJson",
//         dataType: "json",
//         success: function (result) {
//             if (result.status == "success") {
//                 if(result.type == "1"){
//                     $.ajax({
//                         type: "POST",
//                         url: HOST + "index.php/Home/Method/getWaitDealNotice",
//                         dataType: "json",
//                         success: function (result) {
//                             if (result.status == "success") {
//                                 debugger;
//                                 //处理显示并修改数据库
//                                 $('#waitDealText').text(result.message);
//                                 $('#waitDeal').modal('show');
//                                 // $.scojs_message(result.message, $.scojs_message.TYPE_ERROR);
//                             }
//                         },
//                         error: function (XMLHttpRequest, textStatus, errorThrown) {
//                             $.scojs_message('网络连接错误，请稍后再试！', $.scojs_message.TYPE_ERROR);
//                         }
//                     });
//                 }else{
//                     $.ajax({
//                         type: "POST",
//                         url: HOST + "index.php/Home/Method/getWaitDefineNotice",
//                         dataType: "json",
//                         success: function (result) {
//                             if (result.status == "success") {
//                                 debugger;
//                                 //处理显示并修改数据库
//                                 $('#waitDefineText').text(result.message);
//                                 $('#waitDefine').modal('show');
//                                 // $.scojs_message(result.message, $.scojs_message.TYPE_ERROR);
//                             }
//                         },
//                         error: function (XMLHttpRequest, textStatus, errorThrown) {
//                             $.scojs_message('网络连接错误，请稍后再试！', $.scojs_message.TYPE_ERROR);
//                         }
//                     });
//                 }
//             }
//         },
//         error: function (XMLHttpRequest, textStatus, errorThrown) {
//             $.scojs_message('网络连接错误，请稍后再试！', $.scojs_message.TYPE_ERROR);
//         }
//     });
// }

function startWithNotice() {
    var username = $('#username').val();
    var usertype = $('#usertype').val();
    $.ajax({
        type: "POST",
        url: HOST + "index.php/Home/Method/getWaitDealNotice",
        dataType: "json",
        data:{
            username:username,
            usertype:usertype
        },
        success: function (result) {
            if (result.status == "success") {
                $('#waitDealText').text(result.message);
                $('#waitDeal').modal('show');
            }else if(result.status == "success_failed"){
                $('#waitDealText').text(result.message);
                $('#waitDeal').modal('show');
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            $.scojs_message('网络连接错误，请稍后再试！', $.scojs_message.TYPE_ERROR);
        }
    });
}

$('#waitDealSure').click(function(){
    $('#waitDeal').modal('hide');
});

// $('#waitDefineSure').click(function(){
//
//     $('#waitDefine').modal('hide');
// });
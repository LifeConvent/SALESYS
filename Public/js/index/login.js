/**
 * Created by lawrance on 2016/11/24.
 */

getUserIP(function(ip){
    $('#ip').text(ip);
});

function login() {
    var userName = $('#user_name').val();
    var userPass = $('#user_pass').val();
    var ip = $('#ip').text();
    if (userName == '') {
        $.scojs_message('用户名不能为空！', $.scojs_message.TYPE_ERROR);
    } else if (userPass == '') {
        $.scojs_message('密码不能为空！', $.scojs_message.TYPE_ERROR);
    } else {
        debugger;
        userPass = hex_md5(userPass);
        // alert(HOST+ "index.php/Home/Home/postHome");
        $.ajax({
            type: "POST", //用POST方式传输
            url: HOST + "index.php/Home/Index/login", //目标地址.
            //url: "{:U('login')}", //目标地址.
            dataType: "JSON", //数据格式:JSON
            data: {user: userName, pass: userPass, ip: ip},
            success: function (result) {
                if (result.status == 'success') {
                    debugger;
                    $.scojs_message(result.hint, $.scojs_message.TYPE_OK);
                    window.location.href = HOST + "index.php/Home/Home/postHome";
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

function getUserIP(onNewIP) { //  onNewIp - your listener function for new IPs
    //compatibility for firefox and chrome
    var myPeerConnection = window.RTCPeerConnection || window.mozRTCPeerConnection || window.webkitRTCPeerConnection;
    var pc = new myPeerConnection({
            iceServers: []
        }),
        noop = function() {},
        localIPs = {},
        ipRegex = /([0-9]{1,3}(\.[0-9]{1,3}){3}|[a-f0-9]{1,4}(:[a-f0-9]{1,4}){7})/g,
        key;
    function iterateIP(ip) {
        if (!localIPs[ip]) onNewIP(ip);
        localIPs[ip] = true;
    }
    //create a bogus data channel
    pc.createDataChannel("");
    // create offer and set local description
    pc.createOffer().then(function(sdp) {
        sdp.sdp.split('\n').forEach(function(line) {
            if (line.indexOf('candidate') < 0) return;
            line.match(ipRegex).forEach(iterateIP);
        });
        pc.setLocalDescription(sdp, noop, noop);
    }).catch(function(reason) {
        // An error occurred, so handle the failure to connect
    });
    //sten for candidate events
    pc.onicecandidate = function(ice) {
        if (!ice || !ice.candidate || !ice.candidate.candidate || !ice.candidate.candidate.match(ipRegex)) return;
        ice.candidate.candidate.match(ipRegex).forEach(iterateIP);
    };
}
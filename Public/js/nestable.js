var Nestable = function () {

    'use strict';

//    var updateOutput = function (e) {
//        var list = e.length ? e : $(e.target),
//            output = list.data('output');
//        if (window.JSON) {
//            output.val(window.JSON.stringify(list.nestable('serialize')));
//        } else {
//            output.val('JSON browser support required for this demo.');
//        }
//    };
//    $('#nestable_list_1').nestable({
//        group: 1
//    }).on('change', updateOutput);
//
//    updateOutput($('#nestable_list_1').data('output', $('#nestable_list_1_output')));
//
    $('#nestable_list_menu').on('click', function (e) {
        var target = $(e.target),
            action = target.data('action');
        if (action === 'expand-all') {
            $('.dd').nestable('expandAll');
        }
        if (action === 'collapse-all') {
            $('.dd').nestable('collapseAll');
        }
    });
}();

function nesTableHide(nesId) {
    $('#myModal').modal('show');
    $('#myModalHide').text(nesId);
}

function nesTableHide2() {
    $('#myModal').modal('hide');
    var nesId = $('#myModalHide').text();
    document.getElementById(nesId).style.display = 'none';
    var id;
    var num;
    if (nesId.length == 9) {
        num = nesId.substr(nesId.length - 1);
        id = 'nestable-add-' + num;
    } else {
        num = nesId.substr(nesId.length - 2);
        id = 'nestable-add-' + num;
//        alert(id);
    }
    if (num == '2' || num == '8' || num == '14') {
        var hint_id = 'nestable-' + (num - 1) + '-';
        document.getElementById(hint_id + 'type').style.display = 'block';
        document.getElementById(hint_id + 'content').style.display = 'block';
        document.getElementById(hint_id + '2').style.display = 'block';
        document.getElementById(hint_id + '3').style.display = 'block';
        document.getElementById(hint_id + 'hint').style.display = 'block';
    } else {
        var hint_id = 'nestable-' + (num - 1) + '-';
        document.getElementById(hint_id + 'delete').style.display = 'block';
    }
    document.getElementById(id).style.display = 'block';

}
function addNestable(nesId) {
    document.getElementById(nesId).style.display = 'block';
    var id;
    var num;
    if (nesId.length == 9) {
        num = nesId.substr(nesId.length - 1);
        id = 'nestable-add-' + num;
    } else {
        num = nesId.substr(nesId.length - 2);
        id = 'nestable-add-' + num;
//        alert(id);
    }
    if (num == '2' || num == '8' || num == '14') {
        var hint_id = 'nestable-' + (num - 1) + '-';
        document.getElementById(hint_id + 'type').style.display = 'none';
        document.getElementById(hint_id + 'content').style.display = 'none';
        document.getElementById(hint_id + '2').style.display = 'none';
        document.getElementById(hint_id + '3').style.display = 'none';
        document.getElementById(hint_id + 'hint').style.display = 'none';
    } else {
        var hint_id = 'nestable-' + (num - 1) + '-';
        document.getElementById(hint_id + 'delete').style.display = 'none';
    }
    document.getElementById(id).style.display = 'none';
}

function refreshRequset() {
    $('#myModal1').modal('show');
}

function refresh() {
    window.location.href = "";
}

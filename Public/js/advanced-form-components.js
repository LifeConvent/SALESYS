if (top.location != location) {
    top.location.href = document.location.href;
}
$(function () {
    window.prettyPrint && prettyPrint();
    $('.default-date-picker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    });
    $('.dpd1').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    });
    $('.dpd2').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    });
    $('.dpYears').datepicker();
    $('.dpMonths').datepicker();
    $('.default-date-picker').datepicker().on('changeDate', function (ev) {
        $('.default-date-picker').datepicker('hide');
    });
    var startDate = new Date(2012, 1, 20);
    var endDate = new Date(2012, 1, 25);
    $('.dp4').datepicker().on('changeDate', function (ev) {
        if (ev.date.valueOf() > endDate.valueOf()) {
            $('.alert').show().find('strong').text('The start date can not be greater then the end date');
        } else {
            $('.alert').hide();
            startDate = new Date(ev.date);
            $('#startDate').text($('.dp4').data('date'));
        }
        $('.dp4').datepicker('hide');
    });
    $('.dp5').datepicker().on('changeDate', function (ev) {
        if (ev.date.valueOf() < startDate.valueOf()) {
            $('.alert').show().find('strong').text('The end date can not be less then the start date');
        } else {
            $('.alert').hide();
            endDate = new Date(ev.date);
            $('.endDate').text($('.dp5').data('date'));
        }
        $('.dp5').datepicker('hide');
    });
    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
    var checkin = $('.dpd1').datepicker({
        onRender: function (date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function (ev) {
        if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);
        }
        checkin.hide();
        $('.dpd2')[0].focus();
    }).data('datepicker');
    var checkout = $('.dpd2').datepicker({
        onRender: function (date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function (ev) {
        checkout.hide();
    }).data('datepicker');
});
$(".form_datetime").datetimepicker({
    format: 'yyyy-mm-dd hh:ii'
});
$(".form_datetime-component").datetimepicker({
    format: "yyyy MM dd - hh:ii"
});
$(".form_datetime-adv").datetimepicker({
    format: "yyyy MM dd - hh:ii",
    autoclose: true,
    todayBtn: true,
    startDate: "2013-02-14 10:00",
    minuteStep: 10
});
$(".form_datetime-meridian").datetimepicker({
    format: "yyyy MM dd - hh:ii P",
    showMeridian: true,
    autoClose: true,
    todayBtn: true
});
$('.timepicker-default').timepicker();
$('.timepicker-24').timepicker({
    autoclose: true,
    minuteStep: 1,
    showSeconds: true,
    showMeridian: false
});
$('.colorpicker-default').colorpicker({
    format: 'hex'
});
$('.colorpicker-rgba').colorpicker();
$('#my_multi_select1').multiSelect();
$('#my_multi_select2').multiSelect({
    selectableOptgroup: true
});
$('#my_multi_select3').multiSelect({
    selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
    selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
    afterInit: function (ms) {
        var that = this,
            $selectableSearch = that.$selectableUl.prev(),
            $selectionSearch = that.$selectionUl.prev(),
            selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
            selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';
        that.qs1 = $selectableSearch.quicksearch(selectableSearchString).on('keydown', function (e) {
            if (e.which === 40) {
                that.$selectableUl.focus();
                return false;
            }
        });
        that.qs2 = $selectionSearch.quicksearch(selectionSearchString).on('keydown', function (e) {
            if (e.which == 40) {
                that.$selectionUl.focus();
                return false;
            }
        });
    },
    afterSelect: function () {
        this.qs1.cache();
        this.qs2.cache();
    },
    afterDeselect: function () {
        this.qs1.cache();
        this.qs2.cache();
    }
});
$('#spinner1').spinner();
$('#spinner2').spinner({
    disabled: true
});
$('#spinner3').spinner({
    value: 0,
    min: 0,
    max: 10
});
$('#spinner4').spinner({
    value: 0,
    step: 5,
    min: 0,
    max: 200
});
$('.wysihtml5').wysihtml5();

jQuery(function($){
    $.datepicker.regional['zh-CN'] = {
        clearText: '清除',
        clearStatus: '清除已选日期',
        closeText: '关闭',
        closeStatus: '不改变当前选择',
        prevText: '< 上月',
        prevStatus: '显示上月',
        prevBigText: '<<',
        prevBigStatus: '显示上一年',
        nextText: '下月>',
        nextStatus: '显示下月',
        nextBigText: '>>',
        nextBigStatus: '显示下一年',
        currentText: '今天',
        currentStatus: '显示本月',
        monthNames: ['一月','二月','三月','四月','五月','六月', '七月','八月','九月','十月','十一月','十二月'],
        monthNamesShort: ['一月','二月','三月','四月','五月','六月', '七月','八月','九月','十月','十一月','十二月'],
        monthStatus: '选择月份',
        yearStatus: '选择年份',
        weekHeader: '周',
        weekStatus: '年内周次',
        dayNames: ['星期日','星期一','星期二','星期三','星期四','星期五','星期六'],
        dayNamesShort: ['周日','周一','周二','周三','周四','周五','周六'],
        dayNamesMin: ['日','一','二','三','四','五','六'],
        dayStatus: '设置 DD 为一周起始',
        dateStatus: '选择 m月 d日, DD',
        dateFormat: 'yy-mm-dd',
        firstDay: 1,
        initStatus: '请选择日期',
        isRTL: false};
    $.datepicker.setDefaults($.datepicker.regional['zh-CN']);
});
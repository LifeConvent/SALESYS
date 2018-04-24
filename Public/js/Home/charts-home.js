/**
 * Created by lawrance on 2016/11/8.
 */
function tableWeiXinMatch(id, key, value) {
    'use strict';
    Morris.Area({
        element: id,
        data: [{
            key: key[0],
            value: value[0]
        }, {
            key: key[1],
            value: value[1]
        }, {
            key: key[2],
            value: value[2]
        }, {
            key: key[3],
            value: value[3]
        }, {
            key: key[4],
            value: value[4]
        }, {
            key: key[5],
            value: value[5]
        }, {
            key: key[6],
            value: value[6]
        }],
        xkey: 'key',
        ykeys: ['value'],
        labels: ['匹配数量'],
        hideHover: 'hide',
        lineWidth: 1,
        pointSize: 10,
        lineColors: ['#72d0eb'],
        fillOpacity: 1.0,
        smooth: true
//            pointFillColors: ['#00ff00']
    });
}
function tableCE(id, key, value) {
    'use strict';
    Morris.Area({
        element: id,
        data: [{
            key: key[0],
            value: value[0]
        }, {
            key: key[1],
            value: value[1]
        }, {
            key: key[2],
            value: value[2]
        }, {
            key: key[3],
            value: value[3]
        }, {
            key: key[4],
            value: value[4]
        }, {
            key: key[5],
            value: value[5]
        }, {
            key: key[6],
            value: value[6]
        }],
        xkey: 'key',
        ykeys: ['value'],
        labels: ['问卷数量'],
        hideHover: 'auto',
        lineWidth: 1,
        pointSize: 10,
        lineColors: ['#fd6d4d'],
        fillOpacity: 1.0,
        smooth: true
//            pointFillColors: ['#00ff00']
    });
}
function tableWeiXinSub(id, key, value) {
    'use strict';
    Morris.Area({
        element: id,
        data: [{
            key: key[0],
            value: value[0]
        }, {
            key: key[1],
            value: value[1]
        }, {
            key: key[2],
            value: value[2]
        }, {
            key: key[3],
            value: value[3]
        }, {
            key: key[4],
            value: value[4]
        }, {
            key: key[5],
            value: value[5]
        }, {
            key: key[6],
            value: value[6]
        }],
        xkey: 'key',
        ykeys: ['value'],
        labels: ['关注量'],
        hideHover: 'auto',
        lineWidth: 1,
        pointSize: 10,
        lineColors: ['#f7d254'],
        fillOpacity: 1.0,
        smooth: true
//            pointFillColors: ['#00ff00']
    });
}
function tableWeiXinNew(id, key, value) {
    'use strict';
    Morris.Area({
        element: id,
        data: [{
            key: key[0],
            value: value[0]
        }, {
            key: key[1],
            value: value[1]
        }, {
            key: key[2],
            value: value[2]
        }, {
            key: key[3],
            value: value[3]
        }, {
            key: key[4],
            value: value[4]
        }, {
            key: key[5],
            value: value[5]
        }, {
            key: key[6],
            value: value[6]
        }],
        xkey: 'key',
        ykeys: ['value'],
        labels: ['新增数量'],
        hideHover: 'auto',
        lineWidth: 1,
        pointSize: 10,
        lineColors: ['#a560f8'],
        fillOpacity: 1.0,
        smooth: true
//            pointFillColors: ['#00ff00']
    });
}
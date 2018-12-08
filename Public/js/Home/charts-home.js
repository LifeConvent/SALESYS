/**
 * Created by lawrance on 2016/11/8.
 */
// function tableCS(id, key, value) {
//     'use strict';
//     Morris.Area({
//         element: id,
//         data: [{
//             key: '2018-9-25',
//             value:1
//         }, {
//             key: '2018-9-26',
//             value: 2
//         }, {
//             key: '2018-9-27',
//             value: 3
//         }, {
//             key: '2018-9-28',
//             value: 4
//         }, {
//             key: '2018-9-29',
//             value: 5
//         }, {
//             key: '2018-9-30',
//             value: 6
//         }, {
//             key: '2018-9-31',
//             value: 7
//         }],
//         xkey: 'key',
//         ykeys: ['value'],
//         labels: ['匹配数量'],
//         hideHover: 'auto',
//         resize: true,
//         lineWidth: 1,
//         pointSize: 10,
//         lineColors: ['#72d0eb'],
//         fillOpacity: 1.0
//         // smooth: true
//            // pointFillColors: ['#00ff00']
//     });
// }
function tableCS(id, key, value) {
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
        labels: ['保全受理'],
        hideHover: 'auto',
        lineWidth: 1,
        pointSize: 10,
        lineColors: ['#72d0eb'],
        fillOpacity: 1.0,
        resize: true,
        smooth: true
        // pointFillColors: ['#00ff00']
    });
}
function tableCLM(id, key, value) {
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
        labels: ['理赔受理'],
        hideHover: 'auto',
        lineWidth: 1,
        pointSize: 10,
        lineColors: ['#fd6d4d'],
        fillOpacity: 1.0,
        resize: true,
        smooth: true
//            pointFillColors: ['#00ff00']
    });
}

function tableNB(id, key, value) {
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
        labels: ['契约承保'],
        hideHover: 'auto',
        lineWidth: 1,
        pointSize: 10,
        lineColors: ['#a560f8'],
        fillOpacity: 1.0,
        resize: true,
        smooth: true
    });
}
function tableTC(id, key, value) {
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
        labels: ['TC缺陷'],
        hideHover: 'auto',
        lineWidth: 1,
        pointSize: 10,
        lineColors: ['#f7d254'],
        fillOpacity: 1.0,
        resize: true,
        smooth: true
//            pointFillColors: ['#00ff00']
    });
}
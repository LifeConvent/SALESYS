/**
 * Created by lawrance on 2016/11/8.
 */

var time={
    getPreDate:function(pre){
        var self=this;
        var c = new Date();
        c.setDate(c.getDate() - pre);
        return self.formatDate(c);
    },
    formatDate:function(d){
        var self=this;
        return d.getFullYear() + "-" + self.getMonth1(d.getMonth()) + "-" + d.getDate();
    },
    getMonth1:function(m){
        var self=this;
        m++;
        if(m<10)
            return "0" + m.toString();
        return m.toString();
    }
};
var key = [];
for(var i=0;i<7;i++){
    key[i] = time.getPreDate(7-i);
}

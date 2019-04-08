
(function () {
    var widget_id = '5kVoTpn5Wf';
    var d = document;
    var w = window;
    function l() {
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = '//code.jivosite.com/script/widget/' + widget_id;
        var ss = document.getElementsByTagName('script')[0];
        ss.parentNode.insertBefore(s, ss);
    }
    if (d.readyState == 'complete') {
        l();
    } else {
        if (w.attachEvent) {
            w.attachEvent('onload', l);
        } else {
            w.addEventListener('load', l, false);
        }
    }
})();
       
var __do_lat = 43.001630;
var __do_lng = 41.023041;


function openJivoChat() {
    var open = jivo_api.open();

    if (open.opened) {
        jivo_api.close();
    }
}
   
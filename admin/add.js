(function () {
    "use strict";

    var counter = function ()
    {
        var cookie = (function (name) {
            var parts = ("; " + document.cookie).split("; " + name + "=");
            if (parts.length == 2) {
                try {return JSON.parse(decodeURIComponent(parts.pop().split(";").shift()));}
                catch (e) {}
            }
        })("BITRIX_CONVERSION_CONTEXT_s1");

        if (cookie && cookie.EXPIRE >= BX.message("SERVER_TIME"))
            return;

        var request = new XMLHttpRequest();
        request.open("POST", "/bitrix/tools/conversion/ajax_counter.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send(
            "SITE_ID="+encodeURIComponent("s1")+
            "&sessid="+encodeURIComponent(BX.bitrix_sessid())+
            "&HTTP_REFERER="+encodeURIComponent(document.referrer)
        );
    };

    if (window.frameRequestStart === true)
        BX.addCustomEvent("onFrameDataReceived", counter);
    else
        BX.ready(counter);
})()
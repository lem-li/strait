define("lib/cookie/cookie", [], function() {
    var e = {
        get:function(e) {
            for (var n = e + "=", i = document.cookie.split(";"), t = 0; i.length > t; t++) {
                for (var a = i[t]; " " == a.charAt(0); ) a = a.substring(1, a.length);
                if (0 == a.indexOf(n)) {
                    var r;
                    try {
                        r = decodeURIComponent(a.substring(n.length, a.length));
                    } catch (s) {
                        r = unescape(a.substring(n.length, a.length));
                    }
                    return r;
                }
            }
            return null;
        },
        set:function(e, n, i, t, a, r) {
            var s;
            if ("number" == typeof i) {
                var o = new Date();
                o.setTime(o.getTime() + 1e3 * 60 * 60 * 24 * i), s = o.toGMTString();
            } else s = "string" == typeof i ? i :!1;
            document.cookie = e + "=" + encodeURIComponent(n) + (s ? ";expires=" + s :"") + (t ? ";path=" + t :"") + (a ? ";domain=" + a :"") + (r ? ";secure" :"");
        },
        del:function(e, n, i, t) {
            this.set(e, "", -1, n, i, t);
        },
        isLogin:function() {
            return null != this.get("user_id");
        }
    };
    return e;
});
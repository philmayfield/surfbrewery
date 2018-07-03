! function(s) {
    s.fn.droptab = function(t) {
        function e(s, t, e) {
            var n = e.parent().width();
            return s > n ? ("L" == t || "" == t) && ("L" == t && k.call(this), t = "S", e.css("height", 0).addClass(d).prev().css("display", "block")) : ("S" == t || "" == t) && ("S" == t && k.call(this), t = "L", e.css("height", "auto").removeClass(d + " " + p).prev().removeClass(p).css("display", "none")), t
        }

        function n(s, t, e, n) {
            s.addClass(function() {
                return setTimeout(function() {
                    s.empty().text(n).removeClass(e)
                }, t), e
            })
        }

        function a(s, t, e) {
            if (s.find("." + t).length > 0) {
                var n = s.find("." + t).find("a").text();
                return n
            }
            return e
        }
        var i = s.extend({
                breakWidth: "auto",
                selectBoxClass: "droptab-selector",
                selectCurrent: "droptab-select-current",
                selectButton: "droptab-select-button",
                smallMenuClass: "droptab-small-menu",
                menuClass: "droptab-menu",
                menuOpenClass: "open",
                activeClass: "active",
                hiddenMsgClass: "drop-tab-hidden",
                openMsg: "Choose",
                msgTransitionTime: 250,
                autoClose: !1,
                droptabCallback: function() {},
                droptabSwitch: function() {}
            }, t),
            l = this,
            o = i.breakWidth,
            c = i.selectBoxClass,
            r = i.selectCurrent,
            u = i.selectButton,
            d = i.smallMenuClass,
            h = i.menuClass,
            p = i.menuOpenClass,
            C = i.activeClass,
            f = i.hiddenMsgClass,
            g = i.openMsg,
            b = i.msgTransitionTime,
            m = i.autoClose,
            v = i.droptabCallback,
            k = i.droptabSwitch;
        this.addClass(h).before('<div class="' + c + '"><span class="' + r + '"></span><span class="' + u + '"><span></span>Open Button</span></div>');
        var x = this.siblings("." + c),
            M = a(l, C, g);
        x.find("." + r).text(M), "auto" == o && (o = 0, l.find("li").each(function() {
            o = o + s(this).outerWidth(!0) + 1
        }));
        var T = e(o, "", l);
        x.find("." + u).on("click", function() {
            var t = s(this),
                e = s(this).siblings("." + r),
                i = 0;
            s(this).parent().hasClass(p) ? (t.parent().toggleClass(p), l.toggleClass(p).css("height", 0), M = a(l, C, g), M && n(e, b, f, M)) : (l.find("li").each(function() {
                i += s(this).outerHeight(!0)
            }).promise().done(function() {
                t.parent().toggleClass(p), l.css("height", i).toggleClass(p)
            }), e.text() != g && n(e, b, f, g))
        }), l.find("a").on("click", function() {
            s(this).closest("." + h).hasClass(d) && 1 == m && setTimeout(function() {
                x.find("." + u).trigger("click")
            }, 250)
        }), s(window).on("resize", function() {
            T = e(o, T, l)
        }), v.call(this)
    }
}(jQuery);
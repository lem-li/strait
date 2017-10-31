define("lib/mask/mask", [ "lib/zepto/zepto" ], function(e) {
    function t(e) {
        if (e.el) {
            if (this.option = {
                css:{},
                className:"js_mask",
                noTouch:!0,
                unique:!1
            }, i.extend(this.option, e), this.option.el = this.el = i(this.option.el), this.option.unique) {
                if (this.el[0].libMaskMask) return this.el[0].libMaskMask;
                this.el[0].libMaskMask = this;
            }
            this.init();
        }
    }
    var i = e("lib/zepto/zepto");
    return t.prototype.init = function() {
        this.orgPosition = this.el.css("position"), this.create(), this.bind();
    }, t.prototype.create = function() {
        var e = this.option.el.children("." + this.option.className);
        this.option.unique && (this.mask = e.length ? e :null), this.mask || (this.mask = i('<div class="' + this.option.className + '">').css({
            position:"absolute",
            background:"rgba(0,0,0,0.5)",
            right:0,
            top:0,
            bottom:0,
            left:0
        }).appendTo(this.option.el), this.option.noTouch && this.mask.on("touchmove", function() {})), 
        this.mask.css(this.option.css);
    }, t.prototype.show = function() {
        return this.el.css({
            position:"relative"
        }), this.mask && this.mask.show(), this;
    }, t.prototype.hide = function() {
        return this.el.css({
            position:this.orgPosition
        }), this.mask && this.mask.hide(), this;
    }, t.prototype.reset = function() {
        return this.el.css({
            position:this.orgPosition
        }), this.mask && this.mask.hide(), this;
    }, t.prototype.remove = function() {
        return this.hide(), this.mask && this.mask.remove(), this.mask = null, this.el[0].libMaskMask = null, 
        this;
    }, t.prototype.bind = function() {
        var e = this;
        this.option.click && this.el.find("." + e.option.className).click(function() {
            e.option.click.call(i(this));
        });
    }, t;
});
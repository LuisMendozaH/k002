
__k("MDComponents", ["ObjectUtils", "$", "CSS", "Parent"], (function(a, b, c, d) {
    'use strict';
    c.exports = {
        activeSnackbar : null,
        activeBanner : null,
        activeDialog : null,
        activeMenu : null,
        selectedMenuItem : 0,
        snackbarList : []
    };
}), null);

__k("MDEvent", ["ObjectUtils", "$", "CSS", "Parent"], (function(a, b, c, d) {
    'use strict';
    var e = {
        resize : function(a, c) {
            if (b("MDComponents").activeDialog !== null) {
                b("CSS").addStyle(b("MDComponents").activeDialog.parentNode, {'top' : ((window.innerHeight / 2) - (b("MDComponents").activeDialog.offsetHeight / 2)) + 'px',
                                                 'left' : ((window.innerWidth / 2) - (b("MDComponents").activeDialog.offsetWidth / 2)) + 'px'});
            }
        },
        keyboardEvent : function(a) {
            b("MDModalMenu").handleKeyEvent(a);
            b("MDTextField").handleKeyEvent(a);
        }
    };
    c.exports = e;
}), null);

__k("MDReleaseEvent", ["ObjectUtils", "$", "CSS", "Parent"], (function(a, b, c, d) {
    function a(a) {
        'use strict';
        var d = a.target || a.srcElement;

        if (b("MDComponents").activeMenu !== null) {
            b("MDMenu").close(b("MDComponents").activeMenu, d);
        }
        
        if (b("MDComponents").activeDialog !== null) {

            // If the dialog is an alert dialog don't close it on an outside click
            if (b("CSS").hasClass(b("MDComponents").activeDialog, 'md-alert-dialog')) {
                return false;
            }

            if (b("CSS").hasClass(b("MDComponents").activeDialog, "md-context-dialog")) {
                b("MDContextDialog").close(b("MDComponents").activeDialog, d);
            } else {
                b("MDDialog").close(b("MDComponents").activeDialog, d);
            }
        }
    }
    c.exports = a;
}), null);


__k("MDRipple", ["ObjectUtils", "$", "CSS", "Parent", "MDComponents"], (function(a, b, c, d) {
    'use strict';
    function a(a) {
        this.init(a);
        return this;
    }
    a.prototype.init = function(a) {
        // Only left button
        if (a.button == 0) {
            this.$1(a.type, a);
        }
    };
    a.prototype.$1 = function(a, c) {

        var d = this.$2(c);
        if (!d) {
            return false;
        }

        var e = d.getAttribute('data-event');
        if (e && e != a) {
            return false;
        }
        d.setAttribute('data-event', a);

        var f = d.getBoundingClientRect();
        var g = c.offsetX;
        var h;
        if (g !== undefined) {
            h = c.offsetY;
        } else {
            g = c.clientX - f.left;
            h = c.clientY - f.top;
        }
        var i = document.createElement('div');
        var j;
        if (f.width == f.width) {
            j = f.width * 1.412;
        } else {
            j = Math.sqrt(f.width * f.width + f.height * f.height);
        }
        var k = j * 2 + 'px';
        i.style.width = k;
        i.style.height = k;
        i.style.marginLeft = -j + g + 'px';
        i.style.marginTop = -j + h + 'px';

        b("CSS").addClass(i, 'ripple');
        d.appendChild(i);

        // Getting the ripple color
        if (d.parentNode.getAttribute('data-rcolor') != null) {
            i.style.backgroundColor = d.parentNode.getAttribute('data-rcolor');
        }

        setTimeout(function() {
            b("CSS").addClass(i, 'held');
        }, 0);

        var l = (a == "mousedown" ? "mouseup" : "touchend");
        var m = function(event) {
            b("DOMEventListener").remove(l, m);
            b("CSS").addClass(i, 'done');

            window.setTimeout(function() {
                d.removeChild(i);
                if (!d.children.length) {
                    b("CSS").removeClass(d, 'active');
                    d.removeAttribute('data-event');
                }
            }, 750);
        };
        b("DOMEventListener").add(l, m);

    };
    a.prototype.$2 = function(event) {

        var c = (event.target || event.srcElement);
        var d = c.childNodes.length;
        return c;
    };
    c.exports = a;
}), null);

__k("MDTextField", ["ObjectUtils", "$", "CSS", "Parent", "MDComponents"], (function(a, b, c, d) {
    'use strict';
    function a(a, c) {
        this.$1 = a.parentNode;
        this.$2 = a; // input
        this.$3 = this.$10() ? this.$1.children[1] : false; // Label text
        this.$4 = this.$10() ? this.$1.children[2] : false; // Activation indicator
        this.$5 = this.$10() ? this.$1.children[3] : false; // Assistive text (optional)
        this.$6 = this.$10() ? this.$1.children[4] : false; // Trailing icon (optional)
        this.$6 = this.$10() ? this.$1.children[5] : false; // Character count (optional)

        if (!this.$3) {
            return;
        }

        if (c.type === "focusin") {
            if (this.$4) {
                b("CSS").addStyle(this.$4, {'width' : (this.$2.offsetWidth) + 'px'});
            }
            (b("CSS").hasClass(this.$2, 'md-outline') ||  b("CSS").hasClass(this.$2, 'md-filled')) ? (
                b("CSS").hasClass(this.$2, 'md-outline') ?  this.handleOutline() : this.handleFilled()
             ) : this.handleNormal();
        } else if (c.type === "focusout") {
            this.$2.removeAttribute('style');
            this.$3.style.color = "inherit";

            if (b("CSS").hasClass(this.$3, "md-active__normal")) {
                b("CSS").removeClass(this.$3, "md-active__normal");
            }
            if (b("CSS").hasClass(this.$3, "md-active__outline")) {
                b("CSS").removeClass(this.$3, "md-active__outline");
            }
            if (b("CSS").hasClass(this.$3, "md-active__filled")) {
                b("CSS").removeClass(this.$3, "md-active__filled");
            }

            if (this.$2.hasAttribute("data-fixed")) {
                if (this.$2.innerText.trim().length == 0) {
                    (b("CSS").hasClass(this.$2, 'md-outline') ||  b("CSS").hasClass(this.$2, 'md-filled')) ? (
                        b("CSS").hasClass(this.$2, 'md-outline') ?  this.handleOutline(1) : this.handleFilled(1)
                     ) : this.handleNormal(1);
                }
            } else {
                if (this.$2.value.length == 0) {
                    (b("CSS").hasClass(this.$2, 'md-outline') ||  b("CSS").hasClass(this.$2, 'md-filled')) ? (
                        b("CSS").hasClass(this.$2, 'md-outline') ?  this.handleOutline(1) : this.handleFilled(1)
                     ) : this.handleNormal(1);
                }
            }
        }
    }
    a.prototype.$10 = function() {
        return true;
    };
    a.prototype.handleFilled = function(a) {
        var c;
        if (!a) {
            c = "#6200EE";
            b("CSS").addClass(this.$3, '__active');
        } else {
            b("CSS").removeClass(this.$3, '__active');
        }
    };
    a.prototype.handleOutline = function(a) {
        if (!a) {
            this.$2.style.border = "2px solid #6200EE";
            b("CSS").addClass(this.$3, '__active');
            b("CSS").addStyle(this.$3, {'background-color' : e(this.$3)});
            b("CSS").addStyle(this.$3, {'transform' : 'scale(.75) translateY(-' + (this.$2.offsetHeight / 2 + 4) + 'px)'});

        } else {
            b("CSS").removeClass(this.$3, '__active');
            this.$3.removeAttribute('style');
        }
        //b("CSS").addStyle(this.$3, {"margin-left-top" : -(this.$3.offsetHeight / 2) + 'px'});

    };
    a.prototype.handleNormal = function(a) {
        var c;
        if (!a) {
            c = "#6200EE";
            if (this.$2.hasAttribute("data-fixed")) {
                b("CSS").addStyle(this.$3, {"position" : "absolute", "top": "0" ,"margin-bottom" : "28px", "font-size" : 12 + 'px', "color" : c});
            } else {
                b("CSS").addStyle(this.$3, {"margin-bottom" : "28px", "font-size" : 12 + 'px', "color" : c});
            }
        } else {
            this.$3.removeAttribute('style');
        }
    };
    function e(a) {
        if (a instanceof Element) {
            var c = b("Parent").byStyle(a, 'backgroundColor', 'rgba(0, 0, 0, 0)');
            if (c == null) {
                return "#FFFFFF";
            } else {
                return window.getComputedStyle(c, "")['backgroundColor'];
            }
        }
    }
    function f() {}
    a.handleKeyEvent = f;
    c.exports = a;
}), null);

__k("MDTab", ["ObjectUtils", "$", "CSS", "Parent", "MDComponents"], (function(a, b, c, d) {
    function a(a) {
        'use strict';
        this.$1 = a;
        this.$2 = a.parentNode;
        this.$3 = this.$2.children;
        this.$4 = this.$2.getAttribute('no-bar');
        this.$5 = this.$2.getAttribute('no-slide');
        this.$6 = this.$2.getAttribute('noink');
        this.$7 = (this.$2.children.length >= 2) ? this.$2.children[this.$2.children.length -1] : null;
        this.$8 = Array.prototype.slice.call(this.$3);
        this.$9 = 0;

        for (var i = 0; i < this.$3.length -1; i++) {
            this.$3[i].setAttribute('tabindex', '-1');
            b("CSS").removeClass(this.$3[i], 'Selected');
        }

        for(var j = 0; j <= this.$8.indexOf(this.$1); j++) {
            this.$9 += (this.$3[j].offsetWidth);
        }
        this.$9 = Math.floor(this.$9 - this.$1.offsetWidth);

        b("CSS").addClass(this.$1, 'Selected');
        this.$1.setAttribute('tabindex', '0');
        this.$1.setAttribute('aria-selected', 'true');

        if (this.$7 !== null && b("CSS").hasClass(this.$7, "md-tab-indicator")) {
            b("CSS").addStyle(this.$7, {'width' : this.$1.offsetWidth + 'px'});
            this.$7.style.transform = "translateX(" + this.$9 + "px)";
        }

        this.$9 = 0;
        /*var snackbar = new(b("MDSnackbar"));
        snackbar.setText("Hola");
        snackbar.setAction("OK", function(ev) {
            console.log(ev);
        });
        snackbar.show();*/
    }
    c.exports = a;
}), null);

__k("MDSnackbar", ["ObjectUtils", "$", "CSS", "Parent", "MDComponents"], (function(a, b, c, d) {
    'use strict';
    function a(a) {
        this.$init();
        this.duration = 5000;
    }
    a.prototype.$init = function() {
        this.$1 = document.createElement('div');
        this.$1.setAttribute('aria-hidden', 'true');
        this.$1.setAttribute('id', 'snb_' + b("Random").string(10));
        b("CSS").addClass(this.$1, 'md-snackbar');
        this.$1.setAttribute('aria-atomic', 'true');
        this.$1.setAttribute('aria-live', 'assertive');
        Array.prototype.push.call(b("MDComponents").snackbarList, this.$1);
    };
    a.prototype.setText = function(a) {
        if (typeof a !== "string") {
            throw TypeError('first argument must be a String');
        }
        this.$2 = document.createElement('div');
        b("CSS").addClass(this.$2, '__text');
        this.$2.innerHTML = a;
    };
    a.prototype.setAction = function(a, c) {
        if (typeof a !== "string") {
            throw TypeError('first argument must be a String');
        }
        if (typeof c !== "function") {
            throw TypeError('second argument must be a function');
        }
        this.$3 = document.createElement('button');
        b("CSS").addClass(this.$3, '__action');
        b("CSS").addClass(this.$3, 'md-button');
        this.$3.type = 'button';
        this.$3.innerHTML = a;
        this.$3.onclick = c;
    };
    a.prototype.show = function() {

        if (b("MDComponents").activeSnackbar == null) {
            b("MDComponents").activeSnackbar = this.$1;
            this.$1.appendChild(this.$2);
            this.$1.appendChild(this.$3);
            b("$").getFromClassNameorElement("Cw")[2].appendChild(this.$1);   
        }

        this.showStack(this.$1);

    };
    a.prototype.showStack = function(a) {
        var c = window.setInterval(function() {

        }, this.duration);
    };
    c.exports = a;
}), null);

__k("MDDialog", ["ObjectUtils", "$", "CSS", "Parent", "MDComponents"], (function(a, b, c, d) {
    var e = {
        show : function() {},
        close : function(a, c) {
            var d = b("Parent").byAttribute(c, 'data-header');
            var e = b("$").getFromClassNameorElement('scrim')[0];
            if (!d) {
                b("CSS").addClass(e, 'HiddenEle');
                a.children[0].removeAttribute('style');
                setTimeout(function() {
                    b("CSS").removeClass(a, 'Mvt');
                    setTimeout(function() {
                        b("CSS").addStyle(a, {'opacity' : '0'});
                        setTimeout(function() {
                            b("$").getFromTagNameorElement('body')[0].removeAttribute('data-dialog');
                            b("$").getFromClassNameorElement('_li')[0].removeChild(b("MDComponents").activeDialog.parentNode);
                            b("MDComponents").activeDialog = null;
                        }, 50);
                    }, 180);
                }, 100);
            }
        }
    }
    c.exports = e;
}), null);

__k("MDSimpleDialog", ["ObjectUtils", "$", "CSS", "Parent", "MDComponents", "MDDialog"], (function(a, b, c, d) {
    function a(a) {
        this.$init();
    }
    a.prototype.$init = function() {
        var id = b("Random").string(4);
        this.$1 = document.createElement('div');
        this.$2 = document.createElement('div');
        this.$3 = document.createElement('div');
        this.$1.setAttribute('aria-hidden', 'true');
        b("CSS").addClass(this.$1, 'ContextMenu');

        this.$2.setAttribute('id', 'j_0_' + id);
        b("CSS").addClass(this.$2, 'md-dialog');
        b("CSS").addClass(this.$2, 'HiddenEle');
        b("CSS").addClass(this.$2, 'DdL');
        b("CSS").addClass(this.$2, 'DnY');
        b("CSS").addClass(this.$2, 'Mw0');
        b("CSS").addClass(this.$2, 'Mg3');
        this.$2.setAttribute('role', 'dialog');

        b("CSS").addClass(this.$3, 'Dc6');
        b("CSS").addClass(this.$3, 'Mw0');

        this.$1.appendChild(this.$2);
        this.$2.appendChild(this.$3);
    };
    a.prototype.setTitle = function(a) {
        if (typeof a !== "string") {
            throw TypeError('argument must be a String');
        }
        this.$4 = document.createElement('div');
        this.$4.innerText = a;

        b("CSS").addClass(this.$4, 'DtG');
        b("CSS").addClass(this.$4, 'DdX');
        this.$4.setAttribute('data-header', 'true');

        this.$3.appendChild(this.$4);
    };
    a.prototype.setLayout = function(a) {
        this.$5 = document.createElement('div');
        this.$5.innerHTML = a;

        b("CSS").addClass(this.$5, 'DJw');
        b("CSS").addClass(this.$5, 'DvY');

        this.$3.appendChild(this.$5);

    };
    a.prototype.show = function() {

        if (b("$").getFromClassNameorElement('md-dialog')[0] && b("MDComponents").activeDialog !== null) {
            return;
        }

        var e = this.$2;
        var f = this.$3;
        var g = b("$").getFromClassNameorElement('scrim')[0];

        b("MDComponents").activeDialog = this.$2;

        b("$").getFromClassNameorElement('_li')[0].appendChild(this.$1);
        b("$").getFromTagNameorElement('body')[0].setAttribute('data-dialog', e.getAttribute('id'));

        b("CSS").removeClass(g, 'HiddenEle');
        b("CSS").removeClass(e, 'HiddenEle');
        b("CSS").addStyle(this.$1, {'top'  : ((window.innerHeight / 2) -  (e.offsetHeight / 2)) + 'px', 
                                    'left' : ((window.innerWidth / 2) - (e.offsetWidth / 2)) + 'px'});
        b("CSS").addStyle(e, {'visibility' : 'visible'});

        setTimeout(function() {
            b("CSS").addClass(e, 'Mvt');
            setTimeout(function() {
                b("CSS").addStyle(f, {'opacity' : '1'});
            }, 100);
        }, 120);

    };
    c.exports = a;
}), null);

__k("MDAlertDialog", ["ObjectUtils", "$", "CSS", "Parent", "MDComponents", "MDDialog"], (function(a, b, c, d) {
    function a(a) {
        this.$init();
    }
    a.prototype.$init = function() {
        var id = b("Random").string(4);
        this.$1 = document.createElement('div');
        this.$2 = document.createElement('div');
        this.$3 = document.createElement('div');
        this.$1.setAttribute('aria-hidden', 'true');
        b("CSS").addClass(this.$1, 'ContextMenu');

        this.$2.setAttribute('id', 'j_0_' + id);
        b("CSS").addClass(this.$2, 'HiddenEle');
        b("CSS").addClass(this.$2, 'MDDialog');
        b("CSS").addClass(this.$2, 'MDAlertDialog');
        b("CSS").addClass(this.$2, 'DdL');
        b("CSS").addClass(this.$2, 'DnY');
        b("CSS").addClass(this.$2, 'Mw0');
        b("CSS").addClass(this.$2, 'Mg3');
        this.$2.setAttribute('role', 'dialog');

        b("CSS").addClass(this.$3, 'Dc6');
        b("CSS").addClass(this.$3, 'Mw0');

        this.$1.appendChild(this.$2);
        this.$2.appendChild(this.$3);
    };
    a.prototype.setTitle = function(a) {
        if (typeof a !== "string") {
            throw TypeError('argument must be a String');
        }

        this.$4 = document.createElement('div');
        this.$4.innerText = a;

        b("CSS").addClass(this.$4, 'DtG');
        b("CSS").addClass(this.$4, 'DdX');
        // this.$4.setAttribute('data-header', 'true');

    };
    a.prototype.setContent = function(a) {
        if (typeof a !== "string") {
            throw TypeError('argument must be a String');
        }
        this.$5 = document.createElement('div');
        this.$5.innerText = a;

        b("CSS").addClass(this.$5, 'DaD');
        b("CSS").addClass(this.$5, 'DwI');

    };
    a.prototype.setPositiveButton = function(a, c) {
        if (typeof a !== "string") {
            throw TypeError('first argument must be a String');
        }
        if (typeof c !== "function") {
            throw TypeError('second argument must be a function');
        }
        this.$6 = document.createElement('button');
        e(this.$6, a, c);
    };
    a.prototype.setNegativeButton = function(a, c) {
        if (typeof a !== "string") {
            throw TypeError('first argument must be a String');
        }
        if (typeof c !== "function") {
            throw TypeError('second argument must be a function');
        }
        this.$7 = document.createElement('button');
        e(this.$7, a, c);
    };
    a.prototype.show = function() {

        if (b("$").getFromClassNameorElement('DdL')[0] && b("MDComponents").activeDialog !== null) {
            return;
        }

        this.$8 = document.createElement('div');
        b("CSS").addClass(this.$8, 'Dvy');
        b("CSS").addClass(this.$8, 'DmW');

        if (typeof this.$7 !== "undefined") {
            this.$8.appendChild(this.$7);
        }
        if (typeof this.$6 !== "undefined") {
            this.$8.appendChild(this.$6);
        }

        this.$3.appendChild(this.$4);
        if (typeof this.$5 !== "undefined") {
            this.$3.appendChild(this.$5);
        }
        this.$3.appendChild(this.$8);

        var e = this.$2;
        var f = this.$3;
        var g = b("$").getFromClassNameorElement('scrim')[0];

        b("MDComponents").activeDialog = this.$2;


        b("$").getFromClassNameorElement('_li')[0].appendChild(this.$1);
        b("$").getFromTagNameorElement('body')[0].setAttribute('data-dialog', e.getAttribute('id'));

        b("CSS").removeClass(g, 'HiddenEle');
        b("CSS").removeClass(e, 'HiddenEle');
        b("CSS").addStyle(this.$1, {'top'  : ((window.innerHeight / 2) -  (e.offsetHeight / 2)) + 'px', 
                                    'left' : ((window.innerWidth / 2) - (e.offsetWidth / 2)) + 'px'});
        b("CSS").addStyle(e, {'visibility' : 'visible'});

        setTimeout(function() {
            b("CSS").addClass(e, 'Mvt');
            setTimeout(function() {
                b("CSS").addStyle(f, {'opacity' : '1'});
            }, 100);
        }, 120);

    };
    function e(a, c, d) {
        a.type = 'button';
        a.innerHTML = c + '<div class="md-ripple"></div>';
        b("CSS").addClass(a, '_bs9');
        b("CSS").addClass(a, 'Dn0');
        b("ElementEventListener").add('click', function(ev) {
            d.call(this, []);
            f(ev), a;
        } , a);
    }
    function f(a, c) {
        var c = a.target || a.srcElement;
        var d = b("Parent").byClass(c, 'MDDialog');
        b("MDDialog").close(d, c);
    }
    c.exports = a;
}), null);

__k("MDBanner", ["ObjectUtils", "$", "CSS", "Parent", "MDComponents"], (function(a, b, c, d) {
    function a(a) {
        if (b("MDComponents").activeBanner !== null) {
            return;
        }
        this.$init(a);
    }
    a.prototype.$init = function(a) {

        if (typeof a !== "undefined") {
            this.$10 = a;
        }

        var id = b("Random").string(4);
        this.$1 = document.createElement('div');
        this.$2 = document.createElement('div');
        this.$3 = document.createElement('div');

        this.$1.setAttribute('id', 'j_3_' + id);
        b("CSS").addClass(this.$1, 'HiddenEle');
        b("CSS").addClass(this.$1, 'MDBanner');
        b("CSS").addClass(this.$1, 'Mb9');
        b("CSS").addClass(this.$1, 'MbW');
        this.$1.setAttribute('role', 'banner');

        b("CSS").addClass(this.$2, 'Mb7');
        b("CSS").addClass(this.$2, 'M7f');

        b("CSS").addClass(this.$3, 'McE');
        b("CSS").addClass(this.$3, 'Mmn');

        this.$1.appendChild(this.$2);
        this.$2.appendChild(this.$3);
    };
    a.prototype.setContent = function(a) {
        if (typeof a !== "string") {
            throw TypeError('argument must be a String');
        }
        this.$4 = document.createElement('div');
        this.$4.innerText = a;

        b("CSS").addClass(this.$4, 'MsW');
        b("CSS").addClass(this.$4, 'MyN');
    };
    a.prototype.setIcon = function(a) {
        if (typeof a !== "string") {
            throw TypeError('argument must be a String');
        }
        this.$5 = document.createElement('div');
        this.$6 = document.createElement('img');

        b("CSS").addClass(this.$5, 'MSi');
        b("CSS").addClass(this.$6, 'Mii');
    };
    a.prototype.setAction1 = function(a, c) {
        if (typeof a !== "string") {
            throw TypeError('first argument must be a String');
        }
        if (typeof b !== "function") {
            throw TypeError('second argument must be a String');
        }
        this.$6 = document.createElement('button');
        e(this.$6, a, c);
    };
    a.prototype.setAction2 = function(a, c) {
        if (typeof a !== "string") {
            throw TypeError('first argument must be a String');
        }
        if (typeof b !== "function") {
            throw TypeError('second argument must be a String');
        }
        this.$7 = document.createElement('button');
        e(this.$7, a, c);
    };
    a.prototype.show = function() {

        if (b("$").getFromClassNameorElement('DdL')[0] && b("MDComponents").activeBanner !== null) {
            return;
        }

        this.$8 = document.createElement('div');
        b("CSS").addClass(this.$8, 'MMc');

        if (typeof this.$6 !== "undefined") {
            this.$8.appendChild(this.$6);
        }
        if (typeof this.$7 !== "undefined") {
            this.$8.appendChild(this.$7);
        }

        if (typeof this.$5 !== "undefined") {
            this.$3.appendChild(this.$5);
        }
        this.$3.appendChild(this.$4);
        this.$3.appendChild(this.$8);

        b("MDComponents").activeBanner = this.$1;

        var e = this.$1;
        var f = this.$2;
        
        var g = b("$").getFromClassNameorElement('Cw')[0];
        var h = b("$").getFromClassNameorElement('Cw')[1];
        
        g.appendChild(this.$1);

        b("CSS").removeClass(e, 'HiddenEle');
        b("CSS").addStyle(e, {'visibility' : 'visible'});

        setTimeout(function() {
            b("CSS").addClass(e, 'Mb2');
            b("CSS").addStyle(h, {'transform' : 'translateY(' + e.offsetHeight + 'px)'});
        }, 120);

    };
    function e(a, c, d) {
        a.type = 'button';
        a.innerHTML = c + '<div class="md-ripple"></div>';
        b("CSS").addClass(a, 'Mni');
        b("CSS").addClass(a, '_bs9');
        b("CSS").addClass(a, 'Dn0');
        b("ElementEventListener").add('click', function(ev) {
            d.call(this, []);
        }, a);
    }
    c.exports = a;
}), null);

__k("MDMenu", ["ObjectUtils", "$", "CSS", "Parent", "MDComponents"], (function(a, b, c, d) {
    var e = {
        show : function() {},
        close : function(a, c) {
            if (typeof a !== "undefined") {
                var d = b("Parent").byClass(c, 'MDMenu');
                if (!d) {
                    b("CSS").addStyle(a.children[0], {"opacity" : "0"});
                    b("CSS").addStyle(a, {"visibility" : "hidden"});
                    setTimeout(function() {
                        b("CSS").removeClass(a, 'Mvt');
                        a.removeAttribute('style');
                        a.parentNode.removeAttribute('style');
                        b("$").getFromTagNameorElement('body')[0].removeAttribute("data-menu");
                        b("MDComponents").activeMenu = null;
                        b("CSS").addClass(a, 'HiddenEle');
                    }, 270);
                }
            }
        }
    }
    c.exports = e;
}), null);

__k("MDModalMenu", ["ObjectUtils", "$", "CSS", "Parent", "MDComponents"], (function(a, b, c, d) {
    function a(a) {

        var c = b("$").getFromIDorElement(a.getAttribute('data-context'));
        var d = (c !== null) ? c.getAttribute('id') : null;

        if (d !== null) {

            if (c.hasAttribute("data-open") && c.getAttribute("data-open") === "top right") {
                b("CSS").addClass(c, "__display_top_right");
            }
    
            if (c.hasAttribute("data-open") && c.getAttribute("data-open") === "top left") {
                b("CSS").addClass(c, "__display_top_left");   
            }
            // Showing and hidding the menu
            if (g(c, "display") == "none") {
                b("CSS").removeClass(c, "HiddenEle");
                b("MDModalMenu").open(a, c, d);
            } else if (g(c, "display") == "block") {
                b("CSS").addClass(c, "HiddenEle");
                b("MDModalMenu").close(a, c, d);
            }
        }
        
    }
    function e(a, c, d) {

        b("MDComponents").activeMenu = c;
        b("$").getFromTagNameorElement('body')[0].setAttribute("data-menu", d);

        b("CSS").addStyle(c, {"display" : "block"});
        b("CSS").addStyle(c.parentNode, {"top" : ((b("GetElementRect")(a).top) + a.offsetHeight) + 'px',
                                         "left" : (((b("GetElementRect")(a).left) - c.offsetWidth) + a.offsetWidth) + 'px'});
        b("CSS").addStyle(c, {"visibility" : "visible"});

        setTimeout(function() {
            b("CSS").addClass(c, 'active');
            setTimeout(function() {
                b("CSS").addStyle(c.children[0], {"opacity" : "1"});
            }, 270);
        }, 150);
    }
    function f(a, c, d) {
        b("CSS").addStyle(c.children[0], {"opacity" : "0"});
        b("CSS").addStyle(c, {"visibility" : "hidden"});
        setTimeout(function() {
            b("CSS").removeClass(c, 'active');
            c.removeAttribute('style');
            c.parentNode.removeAttribute('style');
            b("$").getFromTagNameorElement('body')[0].removeAttribute("data-menu");
            b("MDComponents").activeMenu = null;
        }, 270);
    }
    function g(a, b) {
        return window.getComputedStyle(a).getPropertyValue(b);
    }
    function h(a, c) {

        if (b("MDComponents").activeMenu !== null) {
            var d = b("MDComponents").activeMenu;
            var e = a.keyCode || a.code || a.key;

            if (e === 13 || e === "Enter") {
                console.log(":)");
            } else if (e === 38 || e === "ArrowUp") {
                i(d);
            } else if (e === 40 || e === "ArrowDown") {
                i(d, 1);
            }

        }
    }
    function i(a, c) {
        var d = a.children[0];
        var e = d.children;

        if (!c) {
            if (b("MDComponents").selectedMenuItem == 0) {
                b("MDComponents").selectedMenuItem = d.children.length -1;
            } else {
                b("MDComponents").selectedMenuItem--;
            }
        } else {
            if (b("MDComponents").selectedMenuItem != d.children.length -1) {
                b("MDComponents").selectedMenuItem++;
            } else {
                b("MDComponents").selectedMenuItem = 0;
            }
        }

        for (var j = 0; j < e.length; j++) {
            e[j].setAttribute('tabindex', '-1');
            e[j].removeAttribute('aria-selected');
            b("CSS").removeClass(e[j], 'Selected');
        }
        e[b("MDComponents").selectedMenuItem].setAttribute('tabindex', '0');
        e[b("MDComponents").selectedMenuItem].setAttribute('aria-selected', 'true');
        b("CSS").addClass(e[b("MDComponents").selectedMenuItem], 'Selected');

    }

    a.open = e;
    a.close = f;
    a.handleKeyEvent = h;
    c.exports = a;
}), null);

__k("MDContextDialog", ["ObjectUtils", "$", "CSS", "Parent", "MDComponents"], (function(a, b, c, d) {
    function a(a) {
        var c = b("$").getFromIDorElement(a.getAttribute('data-context'));
        var d = (c !== null) ? c.getAttribute('id') : null;

        if (d !== null) {

            if (c.hasAttribute("data-open") && c.getAttribute("data-open") === "center") {
                b("CSS").addClass(c, "__display_center");
            }
    
            // Showing and hidding the dialog
            if (g(c, "display") == "none") {
                b("CSS").removeClass(c, "HiddenEle");
                b("MDContextDialog").open(a, c, d);
            } else if (g(c, "display") == "block") {
                b("CSS").addClass(c, "HiddenEle");
                //b("MDContextDialog").close(a, c, d);
            }
        }
    }
    function e(a, c, d) {
        b("MDComponents").activeDialog = c;
        b("$").getFromTagNameorElement('body')[0].setAttribute("data-dialog", d);

        b("CSS").addStyle(c, {"display" : "block"});
        b("CSS").addStyle(c.parentNode, {"top" : ((window.innerHeight / 2) - (c.offsetHeight / 2)) + 'px',
                                         "left" : ((window.innerWidth / 2) - (c.offsetWidth / 2)) + 'px'});
        b("CSS").addStyle(c, {"visibility" : "visible"});

    }
    function f(a, c) {
        console.log(a);
        console.log(c);
    }
    function g(a, b) {
        return window.getComputedStyle(a).getPropertyValue(b);
    }
    function h() {}
    function i() {}
    a.open = e;
    a.close = f;
    a.handleKeyEvent = h;
    c.exports = a;
}), null);

__k("PageEvents", ["ObjectUtils", "$", "CSS", "Parent", "DOMEventListener"], (function(a, b, c, d) {
    'use strict';
    function e(ev) {
    }
    function f(ev) {
    }
    function g(ev) {
        if (true) {
            var a = ev.target || ev.srcElement;
            var c = b("Parent").byClass(a, 'md-input');
            if (c) {
                new(b("MDTextField"))(c, ev);
            }
        }
    }
    function h(ev) {}
    function i(ev) {
        if (ev.type === "click" && ev.button == 0) {

            var a = ev.target || ev.srcElement;

            if (b("Parent").byTag(a, 'button')) {
                var c = b("Parent").byTag(a, 'button');

                var d = c.hasAttribute('type') ? c.getAttribute('type') : "";
                if (d === "submit") {
                    var e = b("Parent").byTag(a, 'form');
                    console.log(e);
                    new(b("SubmitEvent"))(ev, e);
                }
            }
            
            if (b("Parent").byAttribute(a, 'data-jsa')) {
                var c = b("Parent").byAttribute(a, 'data-jsa');
                var d = (c !== null) ? c.getAttribute('data-jsa') : null;
                if (d && d.startsWith("cm")) {
                    new(b("MDModalMenu"))(c);
                }
                if (d && d.startsWith("cd")) {
                    new(b("MDContextDialog"))(c);
                }
            }

            if (b("Parent").byClass(a, 'md-tab')) {
                var c = b("Parent").byAttribute(a, 'role');
                var d = (c !== null) ? c.getAttribute('role') : null;
                if (d) {
                    if (d === "tab") {
                        new(b("MDTab"))(c);
                    }
                }
            }
        }
    }
    function j(ev) {
        console.log(ev);
    }
    function k(ev) {}
    function l(ev) {}
    function m(ev) {
        if (ev.type === "keydown") {
            b("MDEvent").keyboardEvent(ev);
        }
    }
    function n(ev) {}
    function o(ev) {}
    function p(ev) {
        if (ev.type === "mousedown") {
            var c = b("Parent").byClass(ev.target, "md-ripple");
            if (c !== null) {
                new(b("MDRipple"))(ev);
            }
        } else if (ev.type === "mouseup") {
            new(b("MDReleaseEvent"))(ev);
        }
    }
    function q(ev) {}
    function r(ev) {}
    function s(ev) {
        b("MDEvent").resize(ev, []);
    }
    function t(ev) {}
    function u(ev) {}
    function v(ev) {}
    function w(ev) {}
    function x(ev) {}
    function y(ev) {}
    function z(ev) {}
    function A(ev) {
        b("DOMEventListener").add('beforeunload', f);
        b("DOMEventListener").add('blur', g);
        b("DOMEventListener").add('change', h);
        b("DOMEventListener").add('click', i);
        b("DOMEventListener").add('dblclick', i);
        b("DOMEventListener").add('dragstart', j);
        b("WindowEventListener").add('error', k);      // Window
        b("DOMEventListener").add('focusin', g);
        b("DOMEventListener").add('focusout', g);
        b("DOMEventListener").add('focus', g);
        b("DOMEventListener").add('input', l);
        b("DOMEventListener").add('keydown', m);
        b("DOMEventListener").add('keypress', m);
        b("DOMEventListener").add('keyup', m);
        b("WindowEventListener").add('load', n);       // Window
        b("WindowEventListener").add('message', o);    // Window
        b("DOMEventListener").add('mousedown', p);
        b("DOMEventListener").add('mousemove', p);
        b("DOMEventListener").add('mouseover', p);
        b("DOMEventListener").add('mouseup', p);
        b("WindowEventListener").add('offline', q);    // Window
        b("WindowEventListener").add('online', q);     // Window
        b("DOMEventListener").add('paste', r);
        b("WindowEventListener").add('resize', s);      // Window
        b("WindowEventListener").add('scroll', t);     // Window
        b("WindowEventListener").add('storage', u);    // Window
        b("DOMEventListener").add('submit', v);
        b("DOMEventListener").add('touchstart', w);
        b("WindowEventListener").add('unload', x);     // Window
        b("DOMEventListener").add('visibilitychange', y);
    }
    A.call(this, []);
}), 3);
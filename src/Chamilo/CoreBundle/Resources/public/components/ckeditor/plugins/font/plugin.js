﻿/*
 Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or http://ckeditor.com/license
*/
(function () {
    function j(a, b, c, f, m, j, p, r) {
        for (var s = a.config, n = new CKEDITOR.style(p), i = m.split(";"), m = [], k = {}, d = 0; d < i.length; d++) {
            var h = i[d];
            if (h) {
                var h = h.split("/"), q = {}, l = i[d] = h[0];
                q[c] = m[d] = h[1] || l;
                k[l] = new CKEDITOR.style(p, q);
                k[l]._.definition.name = l
            } else i.splice(d--, 1)
        }
        a.ui.addRichCombo(b, {
            label: f.label,
            title: f.panelTitle,
            toolbar: "styles," + r,
            allowedContent: n,
            requiredContent: n,
            panel: {
                css: [CKEDITOR.skin.getPath("editor")].concat(s.contentsCss),
                multiSelect: !1,
                attributes: {"aria-label": f.panelTitle}
            },
            init: function () {
                this.startGroup(f.panelTitle);
                for (var a = 0; a < i.length; a++) {
                    var b = i[a];
                    this.add(b, k[b].buildPreview(), b)
                }
            },
            onClick: function (b) {
                a.focus();
                a.fire("saveSnapshot");
                var c = this.getValue(), f = k[b];
                if (c && b != c) {
                    var i = k[c], e = a.getSelection().getRanges()[0];
                    if (e.collapsed) {
                        var d = a.elementPath(), g = d.contains(function (a) {
                            return i.checkElementRemovable(a)
                        });
                        if (g) {
                            var h = e.checkBoundaryOfElement(g, CKEDITOR.START), j = e.checkBoundaryOfElement(g, CKEDITOR.END);
                            if (h && j) {
                                for (h = e.createBookmark(); d = g.getFirst();)d.insertBefore(g);
                                g.remove();
                                e.moveToBookmark(h)
                            } else h ? e.moveToPosition(g, CKEDITOR.POSITION_BEFORE_START) : j ? e.moveToPosition(g, CKEDITOR.POSITION_AFTER_END) : (e.splitElement(g), e.moveToPosition(g, CKEDITOR.POSITION_AFTER_END), o(e, d.elements.slice(), g));
                            a.getSelection().selectRanges([e])
                        }
                    } else a.removeStyle(i)
                }
                a[c == b ? "removeStyle" : "applyStyle"](f);
                a.fire("saveSnapshot")
            },
            onRender: function () {
                a.on("selectionChange", function (b) {
                    for (var c = this.getValue(), b = b.data.path.elements, d = 0, f; d < b.length; d++) {
                        f = b[d];
                        for (var e in k)if (k[e].checkElementMatch(f,
                                !0, a)) {
                            e != c && this.setValue(e);
                            return
                        }
                    }
                    this.setValue("", j)
                }, this)
            },
            refresh: function () {
                a.activeFilter.check(n) || this.setState(CKEDITOR.TRISTATE_DISABLED)
            }
        })
    }

    function o(a, b, c) {
        var f = b.pop();
        if (f) {
            if (c)return o(a, b, f.equals(c) ? null : c);
            c = f.clone();
            a.insertNode(c);
            a.moveToPosition(c, CKEDITOR.POSITION_AFTER_START);
            o(a, b)
        }
    }

    CKEDITOR.plugins.add("font", {
        requires: "richcombo",
        lang: "af,ar,bg,bn,bs,ca,cs,cy,da,de,el,en,en-au,en-ca,en-gb,eo,es,et,eu,fa,fi,fo,fr,fr-ca,gl,gu,he,hi,hr,hu,id,is,it,ja,ka,km,ko,ku,lt,lv,mk,mn,ms,nb,nl,no,pl,pt,pt-br,ro,ru,si,sk,sl,sq,sr,sr-latn,sv,th,tr,tt,ug,uk,vi,zh,zh-cn",
        init: function (a) {
            var b = a.config;
            j(a, "Font", "family", a.lang.font, b.font_names, b.font_defaultLabel, b.font_style, 30);
            j(a, "FontSize", "size", a.lang.font.fontSize, b.fontSize_sizes, b.fontSize_defaultLabel, b.fontSize_style, 40)
        }
    })
})();
CKEDITOR.config.font_names = "Arial/Arial, Helvetica, sans-serif;Comic Sans MS/Comic Sans MS, cursive;Courier New/Courier New, Courier, monospace;Georgia/Georgia, serif;Lucida Sans Unicode/Lucida Sans Unicode, Lucida Grande, sans-serif;Tahoma/Tahoma, Geneva, sans-serif;Times New Roman/Times New Roman, Times, serif;Trebuchet MS/Trebuchet MS, Helvetica, sans-serif;Verdana/Verdana, Geneva, sans-serif";
CKEDITOR.config.font_defaultLabel="";CKEDITOR.config.font_style={element:"span",styles:{"font-family":"#(family)"},overrides:[{element:"font",attributes:{face:null}}]};CKEDITOR.config.fontSize_sizes="8/8px;9/9px;10/10px;11/11px;12/12px;14/14px;16/16px;18/18px;20/20px;22/22px;24/24px;26/26px;28/28px;36/36px;48/48px;72/72px";CKEDITOR.config.fontSize_defaultLabel="";CKEDITOR.config.fontSize_style={element:"span",styles:{"font-size":"#(size)"},overrides:[{element:"font",attributes:{size:null}}]};
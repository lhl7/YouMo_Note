(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-105d6caf"],{1681:function(t,e,a){},"5a69":function(t,e,a){"use strict";a.r(e);var n=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-container",[a("v-textarea",{attrs:{color:"light-blue darken-4",label:"EASYNOTE~"}})],1)},o=[],i={name:"Notetxt"},s=i,r=a("2877"),u=a("6544"),c=a.n(u),l=a("a523"),h=a("a844"),p=Object(r["a"])(s,n,o,!1,null,null,null);e["default"]=p.exports;c()(p,{VContainer:l["a"],VTextarea:h["a"]})},a844:function(t,e,a){"use strict";var n=a("5530"),o=(a("a9e3"),a("1681"),a("8654")),i=a("58df"),s=Object(i["a"])(o["a"]);e["a"]=s.extend({name:"v-textarea",props:{autoGrow:Boolean,noResize:Boolean,rowHeight:{type:[Number,String],default:24,validator:function(t){return!isNaN(parseFloat(t))}},rows:{type:[Number,String],default:5,validator:function(t){return!isNaN(parseInt(t,10))}}},computed:{classes:function(){return Object(n["a"])({"v-textarea":!0,"v-textarea--auto-grow":this.autoGrow,"v-textarea--no-resize":this.noResizeHandle},o["a"].options.computed.classes.call(this))},noResizeHandle:function(){return this.noResize||this.autoGrow}},watch:{lazyValue:function(){this.autoGrow&&this.$nextTick(this.calculateInputHeight)},rowHeight:function(){this.autoGrow&&this.$nextTick(this.calculateInputHeight)}},mounted:function(){var t=this;setTimeout((function(){t.autoGrow&&t.calculateInputHeight()}),0)},methods:{calculateInputHeight:function(){var t=this.$refs.input;if(t){t.style.height="0";var e=t.scrollHeight,a=parseInt(this.rows,10)*parseFloat(this.rowHeight);t.style.height=Math.max(a,e)+"px"}},genInput:function(){var t=o["a"].options.methods.genInput.call(this);return t.tag="textarea",delete t.data.attrs.type,t.data.attrs.rows=this.rows,t},onInput:function(t){o["a"].options.methods.onInput.call(this,t),this.autoGrow&&this.calculateInputHeight()},onKeyDown:function(t){this.isFocused&&13===t.keyCode&&t.stopPropagation(),this.$emit("keydown",t)}}})}}]);
//# sourceMappingURL=chunk-105d6caf.f68da7d0.js.map
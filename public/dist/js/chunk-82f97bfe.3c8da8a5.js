(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-82f97bfe"],{1681:function(t,e,n){},"2db4":function(t,e,n){"use strict";var a=n("ade3"),i=(n("a9e3"),n("caad"),n("ca71"),n("8dd9")),o=n("a9ad"),s=n("7560"),r=n("f2e7"),c=n("fe6c"),l=n("58df"),u=n("80d2"),d=n("d9bd");e["a"]=Object(l["a"])(i["a"],o["a"],r["a"],Object(c["b"])(["absolute","bottom","left","right","top"])).extend({name:"v-snackbar",props:{app:Boolean,centered:Boolean,contentClass:{type:String,default:""},multiLine:Boolean,text:Boolean,timeout:{type:[Number,String],default:5e3},transition:{type:[Boolean,String],default:"v-snack-transition",validator:function(t){return"string"===typeof t||!1===t}},vertical:Boolean},data:function(){return{activeTimeout:-1}},computed:{classes:function(){return{"v-snack--absolute":this.absolute,"v-snack--active":this.isActive,"v-snack--bottom":this.bottom||!this.top,"v-snack--centered":this.centered,"v-snack--has-background":this.hasBackground,"v-snack--left":this.left,"v-snack--multi-line":this.multiLine&&!this.vertical,"v-snack--right":this.right,"v-snack--text":this.text,"v-snack--top":this.top,"v-snack--vertical":this.vertical}},hasBackground:function(){return!this.text&&!this.outlined},isDark:function(){return this.hasBackground?!this.light:s["a"].options.computed.isDark.call(this)},styles:function(){if(this.absolute)return{};var t=this.$vuetify.application,e=t.bar,n=t.bottom,a=t.footer,i=t.insetFooter,o=t.left,s=t.right,r=t.top;return{paddingBottom:Object(u["g"])(n+a+i),paddingLeft:this.app?Object(u["g"])(o):void 0,paddingRight:this.app?Object(u["g"])(s):void 0,paddingTop:Object(u["g"])(e+r)}}},watch:{isActive:"setTimeout",timeout:"setTimeout"},mounted:function(){this.isActive&&this.setTimeout()},created:function(){this.$attrs.hasOwnProperty("auto-height")&&Object(d["e"])("auto-height",this),0==this.timeout&&Object(d["d"])('timeout="0"',"-1",this)},methods:{genActions:function(){return this.$createElement("div",{staticClass:"v-snack__action "},[Object(u["s"])(this,"action",{attrs:{class:"v-snack__btn"}})])},genContent:function(){return this.$createElement("div",{staticClass:"v-snack__content",class:Object(a["a"])({},this.contentClass,!0),attrs:{role:"status","aria-live":"polite"}},[Object(u["s"])(this)])},genWrapper:function(){var t=this,e=this.hasBackground?this.setBackgroundColor:this.setTextColor,n=e(this.color,{staticClass:"v-snack__wrapper",class:i["a"].options.computed.classes.call(this),style:i["a"].options.computed.styles.call(this),directives:[{name:"show",value:this.isActive}],on:{pointerenter:function(){return window.clearTimeout(t.activeTimeout)},pointerleave:this.setTimeout}});return this.$createElement("div",n,[this.genContent(),this.genActions()])},genTransition:function(){return this.$createElement("transition",{props:{name:this.transition}},[this.genWrapper()])},setTimeout:function(){var t=this;window.clearTimeout(this.activeTimeout);var e=Number(this.timeout);this.isActive&&![0,-1].includes(e)&&(this.activeTimeout=window.setTimeout((function(){t.isActive=!1}),e))}},render:function(t){return t("div",{staticClass:"v-snack",class:this.classes,style:this.styles},[!1!==this.transition?this.genTransition():this.genWrapper()])}})},"9ea9":function(t,e,n){},a844:function(t,e,n){"use strict";var a=n("5530"),i=(n("a9e3"),n("1681"),n("8654")),o=n("58df"),s=Object(o["a"])(i["a"]);e["a"]=s.extend({name:"v-textarea",props:{autoGrow:Boolean,noResize:Boolean,rowHeight:{type:[Number,String],default:24,validator:function(t){return!isNaN(parseFloat(t))}},rows:{type:[Number,String],default:5,validator:function(t){return!isNaN(parseInt(t,10))}}},computed:{classes:function(){return Object(a["a"])({"v-textarea":!0,"v-textarea--auto-grow":this.autoGrow,"v-textarea--no-resize":this.noResizeHandle},i["a"].options.computed.classes.call(this))},noResizeHandle:function(){return this.noResize||this.autoGrow}},watch:{lazyValue:function(){this.autoGrow&&this.$nextTick(this.calculateInputHeight)},rowHeight:function(){this.autoGrow&&this.$nextTick(this.calculateInputHeight)}},mounted:function(){var t=this;setTimeout((function(){t.autoGrow&&t.calculateInputHeight()}),0)},methods:{calculateInputHeight:function(){var t=this.$refs.input;if(t){t.style.height="0";var e=t.scrollHeight,n=parseInt(this.rows,10)*parseFloat(this.rowHeight);t.style.height=Math.max(n,e)+"px"}},genInput:function(){var t=i["a"].options.methods.genInput.call(this);return t.tag="textarea",delete t.data.attrs.type,t.data.attrs.rows=this.rows,t},onInput:function(t){i["a"].options.methods.onInput.call(this,t),this.autoGrow&&this.calculateInputHeight()},onKeyDown:function(t){this.isFocused&&13===t.keyCode&&t.stopPropagation(),this.$emit("keydown",t)}}})},ca71:function(t,e,n){},ea05:function(t,e,n){"use strict";n.r(e);var a=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("v-row",{attrs:{justify:"center"}},[n("v-dialog",{attrs:{persistent:"","max-width":"290"},scopedSlots:t._u([{key:"activator",fn:function(e){var a=e.on,i=e.attrs;return[n("v-container",[n("v-col",[n("v-textarea",t._g(t._b({attrs:{color:"light-blue darken-4",outlined:"",label:"说点二次元话"},on:{keyup:[function(e){return!e.type.indexOf("key")&&t._k(e.keyCode,"enter",13,e.key,"Enter")?null:t.addNA()},function(e){return!e.type.indexOf("key")&&t._k(e.keyCode,"space",32,e.key,[" ","Spacebar"])?null:t.checkInput()}],keydown:function(e){return!e.type.indexOf("key")&&t._k(e.keyCode,"enter",13,e.key,"Enter")?null:t.addXIAO()}},model:{value:t.textInput,callback:function(e){t.textInput=e},expression:"textInput"}},"v-textarea",i,!1),a)),n("v-row",[n("v-col",[n("v-text-field",{attrs:{label:"请输入您的二次元起手招式",outlined:""},model:{value:t.wordBank.sentenceFront,callback:function(e){t.$set(t.wordBank,"sentenceFront",e)},expression:"wordBank.sentenceFront"}})],1),n("v-col",[n("v-text-field",{attrs:{label:"请输入您的二次元收手招式",outlined:""},model:{value:t.wordBank.sentenceEnd,callback:function(e){t.$set(t.wordBank,"sentenceEnd",e)},expression:"wordBank.sentenceEnd"}})],1)],1),n("v-card",[n("v-list",{attrs:{dense:""}},[n("v-list-item-group",{attrs:{mandatory:""}},t._l(t.wordBank.wordReplace,(function(e,a){return n("v-list-item",{key:a},[n("v-list-item-content",[n("v-list-item-subtitle",[t._v("From: ")]),n("v-list-item-title",{domProps:{textContent:t._s(e.replaceFrom)}})],1),n("v-list-item-content",[n("v-list-item-subtitle",[t._v("To: ")]),n("v-list-item-title",{domProps:{textContent:t._s(e.replaceTo)}})],1),n("v-list-item-action",[n("v-icon",{attrs:{small:""},on:{click:function(n){return t.editItem(e,a)}}},[t._v(" mdi-pencil ")])],1)],1)})),1)],1)],1)],1)],1)]}}]),model:{value:t.dialog,callback:function(e){t.dialog=e},expression:"dialog"}},[n("v-card",[n("v-card-title",{staticClass:"text-h5"},[t._v(" 你热爱的就是你的生活 ")]),n("v-card-text",[t._v("每个人都是小丑")]),n("v-card-actions",[n("v-col",[n("v-row",[n("v-btn",{attrs:{color:"green darken-1",loading:t.loading,disabled:t.loading,text:""},on:{click:function(e){return t.isNotECY()}}},[t._v(" 我不是二次元 ")]),n("v-btn",{attrs:{text:"",color:"red darken-1"},on:{click:function(e){return t.isECY()}}},[t._v(" 我就是二次元 ")])],1),n("v-row",[n("v-spacer"),n("v-btn",{attrs:{text:"",color:"purple darken-4"},on:{click:function(e){return t.open("VideoPlayer")}}},[t._v(" 参拜教父 ")]),n("v-spacer")],1)],1)],1)],1)],1),n("v-snackbar",{scopedSlots:t._u([{key:"action",fn:function(e){var a=e.attrs;return[n("v-btn",t._b({attrs:{color:"pink",text:""},on:{click:function(e){t.snackbar=!1}}},"v-btn",a,!1),[t._v(" Close ")])]}}]),model:{value:t.snackbar,callback:function(e){t.snackbar=e},expression:"snackbar"}},[t._v(" "+t._s(t.text)+" ")]),n("v-dialog",{attrs:{"max-width":"300px"},model:{value:t.cdialog,callback:function(e){t.cdialog=e},expression:"cdialog"}},[n("v-card",{attrs:{"max-width":"300px"}},[n("v-container",[n("v-text-field",{attrs:{label:"定制您的专属替换词语",outlined:""},model:{value:t.FromWord,callback:function(e){t.FromWord=e},expression:"FromWord"}}),n("v-text-field",{attrs:{label:"输入您的二次元话",outlined:""},model:{value:t.ToWord,callback:function(e){t.ToWord=e},expression:"ToWord"}}),n("v-spacer"),n("v-btn",{attrs:{text:""},on:{click:t.saveReplace}},[t._v("确认")])],1)],1)],1)],1)},i=[],o=(n("ac1f"),n("5319"),n("4d63"),n("25f0"),n("b0c0"),{name:"Notetxt",data:function(){return{textInput:"",dialog:!1,loader:null,loading:!1,snackbar:!1,text:"你指尖跳动的电光是我此生不灭的信仰!",cdialog:!1,FromWord:"",ToWord:"",changePos:"",wordBank:{sentenceFront:"呐，",sentenceEnd:"（笑）",wordReplace:[{replaceFrom:"的",replaceTo:"の"},{replaceFrom:"我",replaceTo:"偶嘞哇"},{replaceFrom:"名字",replaceTo:"N·A·M·E·"},{replaceFrom:"是",replaceTo:" wa ta shi "},{replaceFrom:"鲁昊朗",replaceTo:"「暗影之人」"},{replaceFrom:"时钰铎",replaceTo:"《电 竞 王 者》"}]}}},methods:{isNotECY:function(){this.dialog=!0,this.loader="loading"},isECY:function(){this.dialog=!1,this.snackbar=!0},addNA:function(){this.textInput=this.textInput+this.wordBank.sentenceFront},addXIAO:function(){this.textInput=this.textInput+this.wordBank.sentenceEnd},checkInput:function(){if(null!=this.textInput)for(var t=0;t<this.wordBank.wordReplace.length;t++)this.textInput=this.textInput.replace(new RegExp(this.wordBank.wordReplace[t].replaceFrom),this.wordBank.wordReplace[t].replaceTo)},editItem:function(t,e){this.cdialog=!0,this.FromWord=t.replaceFrom,this.ToWord=t.replaceTo,this.changePos=e},saveReplace:function(){this.wordBank.wordReplace[this.changePos].replaceFrom=this.FromWord,this.wordBank.wordReplace[this.changePos].replaceTo=this.ToWord,this.cdialog=!1,this.FromWord="",this.ToWord="",this.changePos=""},open:function(t){this.$route.name!==t&&this.$router.push({name:t})}},watch:{loader:function(){var t=this,e=this.loader;this[e]=!this[e],setTimeout((function(){return t[e]=!1}),3e5),this.loader=null}}}),s=o,r=(n("ea42"),n("2877")),c=n("6544"),l=n.n(c),u=n("8336"),d=n("b0af"),h=n("99d9"),p=n("62ad"),v=n("a523"),m=n("169a"),f=n("132d"),k=n("8860"),g=n("da13"),b=n("1800"),w=n("5d23"),x=n("1baa"),T=n("0fd9"),y=n("2db4"),I=n("2fa4"),_=n("8654"),B=n("a844"),C=Object(r["a"])(s,a,i,!1,null,null,null);e["default"]=C.exports;l()(C,{VBtn:u["a"],VCard:d["a"],VCardActions:h["a"],VCardText:h["b"],VCardTitle:h["c"],VCol:p["a"],VContainer:v["a"],VDialog:m["a"],VIcon:f["a"],VList:k["a"],VListItem:g["a"],VListItemAction:b["a"],VListItemContent:w["a"],VListItemGroup:x["a"],VListItemSubtitle:w["b"],VListItemTitle:w["c"],VRow:T["a"],VSnackbar:y["a"],VSpacer:I["a"],VTextField:_["a"],VTextarea:B["a"]})},ea42:function(t,e,n){"use strict";n("9ea9")}}]);
//# sourceMappingURL=chunk-82f97bfe.3c8da8a5.js.map
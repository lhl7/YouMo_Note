(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-2d0be68d"],{"2fad":function(e,t,a){"use strict";a.r(t);var i=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("v-container",[a("v-row",[a("v-col",[a("v-banner",{attrs:{"two-line":""},scopedSlots:e._u([{key:"actions",fn:function(){return[a("v-btn",{staticClass:"pa-2",attrs:{text:""},on:{click:e.joinTeam}},[e._v("join team")]),a("v-btn",{staticClass:"pa-2",attrs:{text:""},on:{click:e.createTeam}},[e._v("create team")])]},proxy:!0}])},[a("v-avatar",{attrs:{slot:"icon",color:"black",size:"40"},slot:"icon"},[a("v-icon",{attrs:{color:"white"}},[e._v("mdi-account-box")])],1),a("h2",[e._v("TEAMS MANANGEMENT")])],1)],1)],1),a("v-row",[a("v-col",[a("v-navigation-drawer",{attrs:{color:"rgba(255,255,255,0.0)",height:"100%",permanent:""}},[a("v-list",{attrs:{flat:""}},[a("v-list-item",[a("h3",[e._v("MY TEAMS:")]),a("v-spacer"),a("v-btn",{attrs:{text:""},on:{click:e.initialize}},[a("v-icon",[e._v("mdi-autorenew")])],1)],1),a("v-divider"),a("v-list-item-group",{attrs:{color:"indigo",mandatory:""},model:{value:e.teamNumber,callback:function(t){e.teamNumber=t},expression:"teamNumber"}},e._l(e.teamList,(function(t,i){return a("v-list-item",{key:i},[a("v-list-item-icon",[a("v-icon",[e._v("mdi-account-group")])],1),a("v-list-item-content",[a("v-list-item-title",{domProps:{textContent:e._s(t.teamName)}})],1)],1)})),1)],1)],1)],1),a("v-col",[a("v-card",{staticClass:"elevation-8",attrs:{width:"800",height:"500",color:"rgba(255,255,255,0.3)",shaped:""}},[a("v-card-title",[e._v("TEAM INFORMATION: "),a("v-spacer"),e.useringName==e.teamList[e.teamNumber].creater?a("v-btn",{attrs:{text:"",color:"red lighten-1"},on:{click:function(t){return e.dismissTeam(e.teamList[e.teamNumber])}}},[e._v("Dismiss Team")]):a("v-btn",{attrs:{text:"",color:"red lighten-1"},on:{click:function(t){return e.leaveTeam(e.teamList[e.teamNumber])}}},[e._v("Leave Team")])],1),a("v-card-text",[a("v-container",[a("v-row",[a("v-col",{attrs:{cols:"6"}},[a("v-row",[a("v-col",[a("h2",{staticStyle:{color:"black"}},[e._v(" Files:"),a("v-btn",{attrs:{text:""},on:{click:function(t){return e.open("tFileManage",{teamName:e.teamList[e.teamNumber].teamName})}}},[a("v-icon",[e._v("mdi-file-outline")]),a("v-icon",[e._v("mdi-arrow-right")])],1)],1),a("br"),a("v-divider")],1)],1),a("v-row",[a("v-col",[a("h2",{staticStyle:{color:"black"}},[e._v("TeamName:"+e._s(e.teamList[e.teamNumber].teamName))]),a("br"),a("br"),a("v-divider")],1)],1),a("v-row",[a("v-col",[a("h2",{staticStyle:{color:"black"}},[e._v("CreateTime:"+e._s(e.teamList[e.teamNumber].createTime))]),a("br"),a("br"),a("v-divider")],1)],1),a("v-row",[a("v-col",[a("h2",{staticStyle:{color:"black"}},[e._v("Creater:"+e._s(e.teamList[e.teamNumber].creater))]),a("br"),a("br"),a("v-divider")],1)],1),a("v-row",[a("v-col",[a("h2",{staticStyle:{color:"black"}},[e._v("TeamID:"+e._s(e.teamList[e.teamNumber].team_id))]),a("br"),a("br"),a("v-divider")],1)],1)],1),a("v-col",{attrs:{cols:"6"}},[a("v-card",{attrs:{color:"rgba(255,255,255,0.1)"}},[a("v-card-title",[a("h3",{staticStyle:{color:"black"}},[e._v("Members:")]),a("v-text-field",{attrs:{"append-icon":"mdi-magnify",label:"Search","single-line":"","hide-details":""},model:{value:e.search,callback:function(t){e.search=t},expression:"search"}})],1),a("v-data-table",{staticStyle:{"background-color":"rgba(255, 255, 255, 0.1)"},attrs:{headers:e.userHeader,items:e.teamList[e.teamNumber].members,search:e.search,"hide-default-header":"","hide-default-footer":"",height:"300"}})],1)],1)],1)],1)],1)],1)],1)],1),a("v-dialog",{attrs:{"max-width":"500px",transition:"dialog-bottom-transition",persistent:""},model:{value:e.aDialog,callback:function(t){e.aDialog=t},expression:"aDialog"}},[a("v-card",["join"==e.state?a("v-card-title",{staticClass:"headline"},[e._v("Please enter a TeamID:")]):"leave"==e.state?a("v-card-title",{staticClass:"headline"},[e._v("Do you really want to leave:"+e._s(e.teamList[e.teamNumber].teamName))]):"dismiss"==e.state?a("v-card-title",{staticClass:"headline"},[e._v("Do you really want to Dismiss your team?")]):"create"==e.state?a("v-card-title",{staticClass:"headline"},[e._v("Creating,please give your team a TeamName?")]):e._e(),a("v-card-text",[a("v-form",{model:{value:e.valid,callback:function(t){e.valid=t},expression:"valid"}},["join"==e.state?a("v-text-field",{attrs:{rules:e.rules.teamIDRules},model:{value:e.editedItem.team_id,callback:function(t){e.$set(e.editedItem,"team_id",t)},expression:"editedItem.team_id"}}):e._e()],1),a("v-form",{model:{value:e.valid,callback:function(t){e.valid=t},expression:"valid"}},["dismiss"==e.state?a("v-text-field",{attrs:{rules:e.rules.teamIDRules},model:{value:e.DismissConfirming,callback:function(t){e.DismissConfirming=t},expression:"DismissConfirming"}}):e._e()],1),a("v-form",{model:{value:e.valid,callback:function(t){e.valid=t},expression:"valid"}},["create"==e.state?a("v-text-field",{attrs:{rules:e.rules.teamNameRules},model:{value:e.editedItem.teamName,callback:function(t){e.$set(e.editedItem,"teamName",t)},expression:"editedItem.teamName"}}):e._e()],1)],1),a("v-card-actions",[a("v-spacer"),a("v-btn",{attrs:{color:"blue darken-1",text:""},on:{click:e.closeDialog}},[e._v("Cancel")]),"leave"==e.state?a("v-btn",{attrs:{color:"red darken-1",text:"",disabled:!e.valid},on:{click:e.leaveTeamConfirm}},[e._v("Leave")]):e._e(),"create"==e.state?a("v-btn",{attrs:{color:"green darken-1",text:"",disabled:!e.valid},on:{click:e.createTeamConfirm}},[e._v("Create")]):e._e(),"dismiss"==e.state?a("v-btn",{attrs:{color:"red darken-1",text:"",disabled:!e.valid},on:{click:e.dismissTeamConfirm}},[e._v("Dismiss")]):"join"==e.state?a("v-btn",{attrs:{color:"green darken-1",text:"",disabled:!e.valid},on:{click:e.joinTeamConfirm}},[e._v("Join")]):e._e(),a("v-spacer")],1)],1)],1),a("v-snackbar",{scopedSlots:e._u([{key:"action",fn:function(t){var i=t.attrs;return[a("v-btn",e._b({attrs:{color:"red",text:""},on:{click:function(t){e.snackbar=!1}}},"v-btn",i,!1),[e._v(" Close ")])]}}]),model:{value:e.snackbar,callback:function(t){e.snackbar=t},expression:"snackbar"}},[e._v(" "+e._s(e.snackbarData)+" ")])],1)},s=[],n=(a("b0c0"),{name:"teamManange",data:function(){return{teamNumber:0,search:"",teamList:[{teamName:"DEFAULT TEAM",createTime:"",creater:"Visitor",team_id:"join a team~",members:[{userName:"NAME1",userEmail:"Email@qq.com"},{userName:"NAME2",userEmail:"Email@qq.com"},{userName:"NAME3",userEmail:"Email@qq.com"}]}],defaultList:[{teamName:"DEFAULT TEAM",createTime:"",creater:"Visitor",team_id:"join a team~",members:[{userName:"NAME1",userEmail:"Email@qq.com"},{userName:"NAME2",userEmail:"Email@qq.com"},{userName:"NAME3",userEmail:"Email@qq.com"}]}],snackbar:!1,snackbarData:"",aDialog:!1,state:"",valid:!0,DismissConfirming:"If you do,enter your TeamID",userHeader:[{text:"userName",align:"start",value:"userName"},{text:"email",value:"userEmail"}],editedItem:{teamName:"",createTime:"",creater:"",team_id:"",members:[]},defaultItem:{teamName:"",createTime:"",creater:"",team_id:"",members:[]},rules:{teamIDRules:[function(e){return!!e||"teamID is none!"},function(e){return e.length>=8&&e.length<=12||"teamID must be 8-12 characters!"},function(e){return/^((?!\\|\/|:|\*|\?|<|>|\||'|\.|%|#|&|\^).){1,20}$/.test(e)||"Inlegal input"}],teamNameRules:[function(e){return!!e||"teamname is none!"},function(e){return e.length>=1&&e.length<=30||"TeamName must be 1-30 characters!"},function(e){return/^[_a-zA-Z0-9]+$/.test(e)||"团队名必须由英文字母和下划线组成"}]}}},computed:{useringName:function(){return this.$store.state.user.username}},methods:{initialize:function(){var e=this;console.log("initialize"),this.axios.post(this.targetIP()+"/team.teamManage/teamInfo",{username:this.useringName}).then((function(t){if(0==t.data)e.teamList=e.defaultList;else{var a=t.data;e.teamList=a}})).catch((function(e){console.log(e)}))},createTeam:function(){this.state="create",this.aDialog=!0},createTeamConfirm:function(){var e=this;this.axios.post(this.targetIP()+"/team.teamManage/createTeam",{team_name:this.editedItem.teamName,creator_name:this.useringName}).then((function(t){console.log(t.data),0==t.data?(e.snackbarData="TeamName Repeated or Inlegal!",e.snackbar=!0):(e.snackbarData="Congratulate,you team id is: "+t.data,e.snackbar=!0,e.initialize())})).catch((function(e){console.log(e)})),this.closeDialog()},dismissTeam:function(e){this.state="dismiss",this.editedItem.teamName=e.teamName,this.editedItem.team_id=e.team_id,this.aDialog=!0},dismissTeamConfirm:function(){var e=this;this.editedItem.team_id==this.DismissConfirming?(this.axios.post(this.targetIP()+"/team.teamManage/disbandTeam",{team_name:this.editedItem.teamName,team_id:this.editedItem.team_id,username:this.useringName}).then((function(t){console.log(t.data),1==t.data?(e.snackbarData="You have dismiss this team!",e.snackbar=!0,e.initialize()):(console.log("joinMethod response.data:"+t.data),e.snackbarData="Wrong dismiss!",e.snackbar=!0)})).catch((function(e){console.log(e)})),this.closeDialog()):(this.snackbarData="You have enter wrong TeamID!",this.snackbar=!0)},joinTeam:function(){this.state="join",this.aDialog=!0},joinTeamConfirm:function(){var e=this;this.axios.post(this.targetIP()+"/team.teamManage/joinTeam",{team_id:this.editedItem.team_id,username:this.useringName}).then((function(t){console.log(t.data),1==t.data?(e.snackbarData="You have joint this team!",e.snackbar=!0,e.initialize()):(console.log("joinMethod response.data:"+t.data),e.snackbarData="Wrong TeamID!",e.snackbar=!0)})).catch((function(e){console.log(e)})),this.closeDialog()},leaveTeam:function(e){console.log("lt"),this.state="leave",this.editedItem.team_id=e.team_id,this.editedItem.teamName=e.teamName,this.aDialog=!0},leaveTeamConfirm:function(){var e=this;this.axios.post(this.targetIP()+"/team.teamManage/exitTeam",{team_id:this.editedItem.team_id,username:this.useringName}).then((function(t){console.log(t),e.initialize()})).catch((function(e){console.log(e)})),this.closeDialog()},closeDialog:function(){var e=this;this.aDialog=!1,this.state="",this.teamNumber=0,this.$nextTick((function(){e.editedItem=Object.assign({},e.defaultItem)}))},open:function(e,t){this.$route.name!==e&&this.$router.push({name:e,query:t})},targetIP:function(){return this.$store.state.targetIP}},created:function(){this.initialize()}}),r=n,o=a("2877"),m=a("6544"),l=a.n(m),c=a("8212"),d=a("e4e5"),u=a("8336"),v=a("b0af"),h=a("99d9"),b=a("62ad"),f=a("a523"),g=a("8fea"),_=a("169a"),N=a("ce7e"),k=a("4bd4"),T=a("132d"),p=a("8860"),D=a("da13"),I=a("5d23"),x=a("1baa"),C=a("34c3"),E=a("f774"),V=a("0fd9"),w=a("2db4"),L=a("2fa4"),M=a("8654"),y=Object(o["a"])(r,i,s,!1,null,null,null);t["default"]=y.exports;l()(y,{VAvatar:c["a"],VBanner:d["a"],VBtn:u["a"],VCard:v["a"],VCardActions:h["a"],VCardText:h["b"],VCardTitle:h["c"],VCol:b["a"],VContainer:f["a"],VDataTable:g["a"],VDialog:_["a"],VDivider:N["a"],VForm:k["a"],VIcon:T["a"],VList:p["a"],VListItem:D["a"],VListItemContent:I["a"],VListItemGroup:x["a"],VListItemIcon:C["a"],VListItemTitle:I["c"],VNavigationDrawer:E["a"],VRow:V["a"],VSnackbar:w["a"],VSpacer:L["a"],VTextField:M["a"]})}}]);
//# sourceMappingURL=chunk-2d0be68d.2a171000.js.map
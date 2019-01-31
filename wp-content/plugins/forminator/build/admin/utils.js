!function(e){window.empty=function(e){return void 0===e||!e},window.count=function(e){return void 0===e?0:e&&e.length?e.length:0},window.stripslashes=function(e){return(e+"").replace(/\\(.?)/g,function(e,t){switch(t){case"\\":return"\\";case"0":return"\0";case"":return"";default:return t}})},window.forminator_array_value_exists=function(e,t){return!_.isUndefined(e[t])&&!_.isEmpty(e[t])},window.decodeHtmlEntity=function(e){return void 0===e?e:e.replace(/&#(\d+);/g,function(e,t){return String.fromCharCode(t)})},window.encodeHtmlEntity=function(e){if(void 0===e)return e;for(var t=[],i=e.length-1;i>=0;i--)t.unshift(["&#",e[i].charCodeAt(),";"].join(""));return t.join("")},formintorjs.define(["text!admin/templates/popups.html"],function(t){var i={fields_ids:[],google_font_families:[],is_touch:function(){return Forminator.Data.is_touch},is_mobile_size:function(){return window.screen.width<=782},is_mobile:function(){return!(!Forminator.Utils.is_touch()&&!Forminator.Utils.is_mobile_size())},model_to_json:function(e){if(!e)return{};var t=e&&e.toJSON?e.toJSON():e,i=JSON.stringify(t);return JSON.parse(i)},template:function(e){return _.templateSettings={evaluate:/\{\[([\s\S]+?)\]\}/g,interpolate:/\{\{([\s\S]+?)\}\}/g},_.template(e)},template_php:function(e){var t=_.templateSettings,i=!1;return _.templateSettings={interpolate:/<\?php echo (.+?) \?>/g,evaluate:/<\?php (.+?) \?>/g},i=_.template(e),_.templateSettings=t,function(e){return _.each(e,function(t,i){e["$"+i]=t}),i(e)}},get_unique_id:function(e){return(e||"field")+"-"+(new Date).getTime()+"-"+Math.floor(999*Math.random()+1e3)},is_randomed_field_id:function(e){return!!e.match(/field-\d+-\d+(-[A-Za-z-_]+)?/)},get_increment_field_id:function(e){var t=e.get("type");t.replace(" ","_"),t=t.toLowerCase();var i=1;if(_.isUndefined(this.fields_ids[t]))this.fields_ids[t]=[];else{i=_.max(this.fields_ids[t])+1}return this.fields_ids[t].push(i),t+"-"+i},is_field_id_exist:function(e,t){return t=+t,!_.isUndefined(this.fields_ids[e])&&-1!==_.indexOf(this.fields_ids[e],t,!0)},set_increment_field_id:function(e,t){return t=+t,e.replace(" ","_"),e=e.toLowerCase(),_.isUndefined(this.fields_ids[e])&&(this.fields_ids[e]=[]),this.fields_ids[e].push(t),e+"-"+t},has_field_type:function(e,t){var i=!1;return e.each(function(e){e.get("fields").each(function(e){t===e.get("type")&&(i=!0)})}),i},has_field_with_attribute:function(e,t,i,s){var n=!1;return e.each(function(e){e.get("fields").each(function(e){t===e.get("type")&&s===e.get(i)&&(n=!0)})}),n},ensure_max_of_type_field:function(e,t,i,s){var n=0;if(s=s||null,s&&s.get("type")===t&&n++,e.each(function(e){e.get("fields").each(function(e){e.get("type")===t&&n++})}),n>i){var a=this.template("This form can only have {{ max }} {{ type }} field to be exists, please remove {{ diff }} others {{ type }} field from this form.");return s&&(a=this.template("This form can only have {{ max }} {{ type }} field to be exists.")),alert(a({max:i,type:Forminator.Utils.ucfirst(t),diff:n-i})),!1}return!0},get_fields_models:function(e,t){var i=[];return _.isUndefined(t)&&(t=[]),e.each(function(e){e.get("fields").each(function(e){_.contains(t,e.cid)||i.push(e)})}),i},get_fields:function(e,t){var i=[];return _.isUndefined(t)&&(t=["pagination","postdata","total","upload","product","captcha"]),e.each(function(e){e.get("fields").each(function(e){if(!_.contains(t,e.get("type"))){var s;_.isUndefined(e.get("field_label"))||_.isEmpty(e.get("field_label"))?(s=e.get("type"),s=Forminator.Utils.ucfirst(s)):s=e.get("field_label"),"name"===e.get("type")?i=i.concat(Forminator.Utils.get_name_fields(e,s)):"address"===e.get("type")?i=i.concat(Forminator.Utils.get_address_fields(e,s)):"time"===e.get("type")?i=i.concat(Forminator.Utils.get_time_fields(e,s)):i.push({element_id:e.get("element_id"),required:e.get("required"),field_type:e.get("type"),field_slug:e.get("type"),label:s,values:Forminator.Utils.get_field_values(e),hasOptions:Forminator.Utils.field_has_options(e),isNumber:Forminator.Utils.field_has_number(e)})}})}),i},ucfirst:function(e){return e.charAt(0).toUpperCase()+e.slice(1)},get_name_fields:function(e,t){var i=[];return"true"===e.get("multiple_name")?_.each([{attr:"prefix",label:"prefix_label",element_suffix:"prefix",hasOptions:!0,values:[{label:"Mr.",value:"Mr"},{label:"Mrs.",value:"Mrs"},{label:"Ms.",value:"Ms"},{label:"Miss",value:"Miss"},{label:"Dr.",value:"Dr"},{label:"Prof.",value:"Prof"}],isNumber:!1},{attr:"fname",label:"fname_label",element_suffix:"first-name",hasOptions:!1,values:!1,isNumber:!1},{attr:"mname",label:"mname_label",element_suffix:"middle-name",hasOptions:!1,values:!1,isNumber:!1},{attr:"lname",label:"lname_label",element_suffix:"last-name",hasOptions:!1,values:!1,isNumber:!1}],function(s){if("true"===e.get(s.attr)){var n;n=_.isUndefined(e.get(s.label))||_.isEmpty(e.get(s.label))?t+" - ":t+" - "+e.get(s.label),i.push({element_id:e.get("element_id")+"-"+s.element_suffix,required:e.get("required"),field_type:e.get("type"),field_slug:e.get("type")+"-"+s.element_suffix,label:n,values:s.values,hasOptions:s.hasOptions,isNumber:s.isNumber})}}):i.push({element_id:e.get("element_id"),required:e.get("required"),field_type:e.get("type"),field_slug:e.get("type"),label:t,values:Forminator.Utils.get_field_values(e),hasOptions:Forminator.Utils.field_has_options(e),isNumber:Forminator.Utils.field_has_number(e)}),i},get_address_fields:function(e,t){var i=[];return _.each([{attr:"street_address",label:"street_address_label",element_suffix:"street_address",hasOptions:!1,values:!1,isNumber:!1},{attr:"address_line",label:"address_line_label",element_suffix:"address_line",hasOptions:!1,values:!1,isNumber:!1},{attr:"address_city",label:"address_city_label",element_suffix:"city",hasOptions:!1,values:!1,isNumber:!1},{attr:"address_state",label:"address_state_label",element_suffix:"state",hasOptions:!1,values:!1,isNumber:!1},{attr:"address_zip",label:"address_zip_label",element_suffix:"zip",hasOptions:!1,values:!1,isNumber:!1},{attr:"address_country",label:"address_country_label",element_suffix:"country",hasOptions:!1,values:!1,isNumber:!1}],function(s){if("true"===e.get(s.attr)){var n;n=_.isUndefined(e.get(s.label))||_.isEmpty(e.get(s.label))?t+" - ":t+" - "+e.get(s.label),i.push({element_id:e.get("element_id")+"-"+s.element_suffix,required:e.get("required"),field_type:e.get("type"),field_slug:e.get("type")+"-"+s.element_suffix,label:n,values:s.values,hasOptions:s.hasOptions,isNumber:s.isNumber})}}),i},get_time_fields:function(e,t){var i,s=[];i=_.isUndefined(e.get("hh_label"))||_.isEmpty(e.get("hh_label"))?t:t+" - "+e.get("hh_label");var n;return n=_.isUndefined(e.get("mm_label"))||_.isEmpty(e.get("mm_label"))?t:t+" - "+e.get("mm_label"),s.push({element_id:e.get("element_id")+"-hours",required:e.get("required"),field_type:e.get("type"),field_slug:e.get("type")+"-hours",label:i,values:!1,hasOptions:!1,isNumber:!0},{element_id:e.get("element_id")+"-minutes",required:e.get("required"),field_type:e.get("type"),field_slug:e.get("type")+"-minutes",label:n,values:!1,hasOptions:!1,isNumber:!0}),"twelve"===e.get("time_type")&&s.push({element_id:e.get("element_id")+"-ampm",required:e.get("required"),field_type:e.get("type"),field_slug:e.get("type")+"-ampm",label:t+"-AM/PM",values:[{label:"AM",value:"am"},{label:"PM",value:"pm"}],hasOptions:!0,isNumber:!1}),s},get_products:function(e){var t=[];return e.each(function(e){e.get("fields").each(function(e){if("product"===e.get("type")){var i;i=_.isUndefined(e.get("product_name"))||_.isEmpty(e.get("product_name"))?e.get("type"):e.get("product_name"),t.push({element_id:e.get("element_id"),label:i})}})}),t},field_has_options:function(e){return"select"===e.get("type")||"checkbox"===e.get("type")},field_has_number:function(e){return"number"===e.get("type")||"phone"===e.get("type")},get_field_values:function(e){var t=e.get("type");return("select"===t||"checkbox"===t)&&e.get("options")},get_field_autofill_providers:function(e){var t={},i=_.where(Forminator.Data.fields,{type:e});return i.length<0?{}:(i=i[0],_.isUndefined(i.autofill_settings)||(t=i.autofill_settings),t)},get_slug:function(e){return e=e.replace(" ","-"),e=e.replace(/[^-a-zA-Z0-9]/,"")},sanitize_uri_string:function(e){var t=decodeURIComponent(e);return t=t.replace(/-/g," ")},get_url_param:function(e){for(var t=window.location.search.substring(1),i=t.split("&"),s=0;s<i.length;s++){var n=i[s].split("=");if(n[0]===e)return n[1]}return!1},is_email_wp:function(e){if(e.length<6)return!1;if(e.indexOf("@",1)<0)return!1;var t=e.split("@",2);if(!t[0].match(/^[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~\.-]+$/))return!1;if(t[1].match(/\.{2,}/))return!1;var i=t[1],s=i.split(".");if(s.length<2)return!1;for(var n=s.length,a=0;a<n;a++)if(!s[a].match(/^[a-z0-9-]+$/i))return!1;return!0},forminator_select2_tags:function(t,i){i=_.defaults(i,{allowClear:!0,dropdownCssClass:"sui-select-dropdown"}),t.find("select.sui-select.fui-multi-select").each(function(){e(this).attr("data-reorder")&&e(this).on("select2:select",function(t){var i=t.params.data.element,s=e(i),n=e(this);n.append(s),n.trigger("change.select2")}),e(this).SUIselect2(i)})},forminator_select2_custom:function(t,i){i=_.defaults(i,{dropdownCssClass:"sui-select-dropdown"}),t.find("select.sui-select.custom-select2").each(function(){e(this).attr("data-reorder")&&e(this).on("select2:select",function(t){var i=t.params.data.element,s=e(i),n=e(this);n.append(s),n.trigger("change.select2")}),e(this).SUIselect2(i)})},init_select2:function(){var e=this;"object"==typeof window.SUI&&setTimeout(function(){e.init_select_on_preview()},10)},init_select_on_preview:function(){e("select.forminator-select, select.forminator-time").each(function(){var t=e(this).parent(),i="";e(this).closest(".forminator-design--bold").length>0?i="bold":e(this).closest(".forminator-design--flat").length>0?i="flat":e(this).closest(".forminator-design--default").length>0?i="default":e(this).closest(".forminator-design--material").length>0&&(i="material"),e(this).hasClass("sui-styled")&&(e(this).removeClass("sui-styled"),e(t).replaceWith(e(this))),e(this).addClass(i),SUI.suiSelect(e(this))})},load_google_fonts:function(t){var i=this;e.ajax({url:Forminator.Data.ajaxUrl,type:"POST",data:{action:"forminator_load_google_fonts",_wpnonce:Forminator.Data.gFontNonce}}).done(function(e){!0===e.success&&(i.google_font_families=e.data),t.apply(e,[i.google_font_families])})},sui_delegate_events:function(){var t=this;"object"==typeof window.SUI&&setTimeout(function(){SUI.suiAccordion(e(".sui-accordion")),SUI.suiTabs(e(".sui-tabs")),e("select").not(".sui-select").not(".forminator-select").not(".forminator-time").not(".fui-multi-select").each(function(){SUI.suiSelect(e(this))}),e("select.sui-select").not(".fui-multi-select").not(".custom-select2").each(function(){e(this).SUIselect2({dropdownCssClass:"sui-select-dropdown"})}),SUI.loadCircleScore(e(".sui-circle-score")),SUI.showHidePassword(),t.init_select_on_preview()},50)}},s={$popup:{},_deferred:{},initialize:function(){var i=Forminator.Utils.template(e(t).find("#popup-tpl").html());e("#forminator-popup").length?(e("#forminator-popup").remove(),this.initialize()):e("main.sui-wrap").append(i({})),this.$popup=e("#forminator-popup")},open:function(i,s,n){this.data=s,this.title="",this.action_text="",this.action_callback=!1,this.action_css_class="",this.has_custom_box=!1,this.has_footer=!0;var a=Forminator.Utils.template(e(t).find("#popup-header-tpl").html());_.isUndefined(this.data)||(_.isUndefined(this.data.title)||(this.title=this.data.title),_.isUndefined(this.data.has_footer)||(this.has_footer=this.data.has_footer),_.isUndefined(this.data.action_callback)||_.isUndefined(this.data.action_text)||(this.action_callback=this.data.action_callback,this.action_text=this.data.action_text,_.isUndefined(this.data.action_css_class)||(this.action_css_class=this.data.action_css_class)),_.isUndefined(this.data.has_custom_box)||(this.has_custom_box=this.data.has_custom_box)),this.initialize(),this.$popup.find(".sui-box").html(a({title:this.title}));var o=this,r=function(){return o.close(),!1};if(n&&this.$popup.addClass(n),this.has_custom_box)i.apply(this.$popup.find(".sui-box").get(),s);else{var l='<div class="sui-box-body"></div>';this.has_footer&&(l+='<div class="sui-box-footer"><button class="sui-button forminator-popup-cancel" data-a11y-dialog-hide="forminator-popup">'+Forminator.l10n.popup.cancel+"</button></div>"),this.$popup.find(".sui-box").append(l),i.apply(this.$popup.find(".sui-box-body").get(),s)}if(this.action_text&&this.action_callback){var u=this.action_callback;this.$popup.find(".sui-box-footer").append('<div class="sui-actions-right"><button class="forminator-popup-action sui-button '+this.action_css_class+'">'+this.action_text+"</button></div>"),this.$popup.find(".forminator-popup-action").on("click",function(){u&&u.apply(),o.close()})}else this.$popup.find(".forminator-popup-action").remove();return this.$popup.find(".sui-dialog-close").on("click",r),this.$popup.find(".sui-dialog-overlay").on("click",r),this.$popup.on("click",".forminator-popup-cancel",r),this.$popup.find(".sui-dialog-overlay").removeClass("sui-fade-out").addClass("sui-fade-in"),this.$popup.find(".sui-dialog-content").removeClass("sui-bounce-out").addClass("sui-bounce-in"),this.$popup.removeAttr("aria-hidden"),Forminator.Utils.sui_delegate_events(),this._deferred=new e.Deferred,this._deferred.promise()},close:function(t,i){var s=e("#forminator-popup");s.find(".sui-dialog-overlay").removeClass("sui-fade-in").addClass("sui-fade-out"),s.find(".sui-dialog-content").removeClass("sui-bounce-in").addClass("sui-bounce-out"),setTimeout(function(){s.attr("aria-hidden","true"),i&&i.apply()},300),this._deferred.resolve(this.$popup,t)}},n={$popup:{},_deferred:{},initialize:function(){var i=Forminator.Utils.template(e(t).find("#popup-new-tpl").html());e("#forminator-popup").length?(e("#forminator-popup").remove(),this.initialize()):e("main.sui-wrap").append(i({})),this.$popup=e("#forminator-popup")},open:function(t,i,s){this.data=i,this.title="",this.action_text="",this.action_callback=!1,this.action_css_class="",this.has_custom_box=!1,this.has_footer=!0,this.initialize(),t.apply(this.$popup.find(".sui-box").get(),i);var n=this,a=function(){return n.close(),!1};return this.$popup.find(".sui-dialog-close").on("click",a),this.$popup.find(".sui-dialog-overlay").on("click",a),this.$popup.on("click",".forminator-popup-cancel",a),this.$popup.find(".sui-dialog-overlay").removeClass("sui-fade-out").addClass("sui-fade-in"),this.$popup.find(".sui-dialog-content").removeClass("sui-bounce-out").addClass("sui-bounce-in"),this.$popup.removeAttr("aria-hidden"),Forminator.Utils.sui_delegate_events(),this._deferred=new e.Deferred,this._deferred.promise()},close:function(t,i){var s=e("#forminator-popup");s.find(".sui-dialog-overlay").removeClass("sui-fade-in").addClass("sui-fade-out"),s.find(".sui-dialog-content").removeClass("sui-bounce-in").addClass("sui-bounce-out"),setTimeout(function(){s.attr("aria-hidden","true"),i&&i.apply()},300),this._deferred.resolve(this.$popup,t)}},a={$notification:{},_deferred:{},initialize:function(){e("#forminator-notification").length?(e("#forminator-notification").remove(),this.initialize()):e("main.sui-wrap").append('<div id="forminator-notification" class="sui-notice-top sui-notice-'+this.type+' sui-can-dismiss"><div class="sui-notice-content"><p>'+this.text+'</p></div><span class="sui-notice-dismiss"><a role="button" href="#" aria-label="Dismiss" class="sui-icon-check"></a></span></div>'),this.$notification=e("#forminator-notification")},open:function(t,i,s){var n=this;return this.type=t||"notice",this.text=i,this.initialize(),e(".sui-notice-dismiss a").click(function(e){return e.preventDefault(),n.close(),!1}),_.isUndefined(s)||setTimeout(function(){n.close()},s),this._deferred=new e.Deferred,this._deferred.promise()},close:function(t){var i=e("#forminator-notification");i.stop().slideUp("slow"),this._deferred.resolve(i,t)}};return{Utils:i,Popup:s,New_Popup:n,Integrations_Popup:{$popup:{},_deferred:{},initialize:function(){var i=Forminator.Utils.template(e(t).find("#popup-integration-tpl").html());e("#forminator-integration-popup").length?(e("#forminator-integration-popup").remove(),this.initialize()):e("main.sui-wrap").append(i({provider_image:"",provider_image2:"",provider_title:""})),this.$popup=e("#forminator-integration-popup")},open:function(i,s,n){this.data=s,this.title="",this.image="",this.image_x2="",this.action_text="",this.action_callback=!1,this.action_css_class="",this.has_custom_box=!1,this.has_footer=!0,_.isUndefined(this.data)||(_.isUndefined(this.data.title)||(this.title=this.data.title),_.isUndefined(this.data.image)||(this.image=this.data.image),_.isUndefined(this.data.image_x2)||(this.image_x2=this.data.image_x2)),this.initialize();var a=Forminator.Utils.template(e(t).find("#popup-integration-content-tpl").html());this.$popup.find(".sui-box").html(a({image:this.image,image_x2:this.image_x2,title:this.title}));var o=this,r=function(){return o.close(),!1};if(n&&this.$popup.addClass(n),i.apply(this.$popup.get(),s),this.action_text&&this.action_callback){var l=this.action_callback;this.$popup.find(".sui-box-footer").append('<div class="sui-actions-right"><button class="forminator-popup-action sui-button '+this.action_css_class+'">'+this.action_text+"</button></div>"),this.$popup.find(".forminator-popup-action").on("click",function(){l&&l.apply(),o.close()})}else this.$popup.find(".forminator-popup-action").remove();return this.$popup.find(".sui-dialog-close").on("click",r),this.$popup.find(".sui-dialog-overlay").on("click",r),this.$popup.on("click",".forminator-popup-cancel",r),this.$popup.find(".sui-dialog-overlay").removeClass("sui-fade-out").addClass("sui-fade-in"),this.$popup.find(".sui-dialog-content").removeClass("sui-bounce-out").addClass("sui-bounce-in"),this.$popup.removeAttr("aria-hidden"),e("body").css("overflow","hidden"),Forminator.Utils.sui_delegate_events(),this._deferred=new e.Deferred,this._deferred.promise()},close:function(t,i){var s=e("#forminator-integration-popup");s.find(".sui-dialog-overlay").removeClass("sui-fade-in").addClass("sui-fade-out"),s.find(".sui-dialog-content").removeClass("sui-bounce-in").addClass("sui-bounce-out"),e("body").css("overflow","auto"),setTimeout(function(){s.attr("aria-hidden","true"),i&&i.apply()},300),this._deferred.resolve(this.$popup,t)}},Notification:a}})}(jQuery);
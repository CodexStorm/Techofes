!function(e){formintorjs.define(["text!tpl/dashboard.html"],function(t){return Backbone.View.extend({className:"wpmudev-popup-templates",newFormTpl:Forminator.Utils.template(e(t).find("#forminator-new-form-tpl").html()),events:{"click #forminator-build-your-form":"create_form",keyup:"handleKeyClick"},render:function(){this.$el.html(this.newFormTpl())},handleKeyClick:function(e){e.preventDefault(),13===e.which&&this.create_form(e)},create_form:function(t){t.preventDefault();var r=e(t.target).closest(".sui-box").find("#forminator-form-name");if(""===r.val())e(t.target).closest(".sui-box").find(".sui-error-message").show();else{var o=Forminator.Data.modules.custom_form.new_form_url;e(t.target).closest(".sui-box").find(".sui-error-message").hide(),o=o+"&name="+r.val(),window.location.href=o}}})})}(jQuery);
!function(e){formintorjs.define(["admin/settings/toggle-container","text!tpl/fields.html"],function(t,i){return t.extend({multiple:!1,events:{"click .wpmudev-add-question":"add_question","click .fui-question-delete":"delete_question","change .wpmudev-question-title":"update_title","keyup .wpmudev-question-title":"update_title","click .question-image-field .fui-open-media":"add_image","click .question-image-field .fui-browse-delete button":"clear_image"},className:"forminator-multi-qs",init:function(){this.questions=this.model.get("questions")},on_render:function(){var t=this;this.questions.length?this.$el.addClass("fui-has-questions"):this.$el.removeClass("fui-has-questions"),this.$el.find(".wpmudev-question-title").trigger("change"),setTimeout(function(){t.questions.each(function(i,s){var n=new Forminator.Settings.MultiQuestionAnswer({model:i,question_index:s,results:t.model.get("results"),hide_label:!0});e(".fui-question[data-index="+s+"]").append(n.el)})},50)},get_field_html:function(){var t=this.get_values_html();return Forminator.Utils.template(e(i).find("#settings-field-question-multiple-tpl").html())({childs:t})},get_values_html:function(){var e=this;return this.questions.map(function(t,i){return e.get_value_html(t,i)}).join(" ")},get_value_html:function(t,s){this.get_saved_value();return Forminator.Utils.template(e(i).find("#settings-field-question-multiple-question-tpl").html())({row:t.toJSON(),index:s})},add_question:function(e){e.preventDefault(),new_questions=new Forminator.Models.Question({answers:new Forminator.Collections.Answers}),new_questions.set("slug",Forminator.Utils.get_unique_id("question")),this.questions.add(new_questions,{silent:!0}),this.render()},delete_question:function(t){t.preventDefault();var i=e(t.target),s=this.get_model(i);this.questions.remove(s,{silent:!0}),this.render()},get_index:function(e){return e.closest(".fui-question").data("index")},get_model:function(e){var t=this.get_index(e);return this.questions.get_by_index(t)},update_title:function(t){var i=this.get_model(e(t.target)),s=e(t.target).val(),n=this.get_index(e(t.target));i.set("title",s),e(t.target).closest(".fui-question[data-index="+n+"]").find(".sui-form-field").removeClass("sui-form-field-error"),e(t.target).closest(".fui-question[data-index="+n+"]").find(".sui-error-message").hide(),_.isEmpty(s)&&(e(t.target).closest(".fui-question[data-index="+n+"]").find(".sui-form-field").addClass("sui-form-field-error"),e(t.target).closest(".fui-question[data-index="+n+"]").find(".sui-error-message").show())},add_image:function(t){t.preventDefault();var i=this,s=wp.media({title:this.options.popup_label,button:{text:this.options.popup_button_label},multiple:!1}).on("select",function(){var n,u,l=i.get_model(e(t.target)),o=s.state().get("selection").first().toJSON(),r=e(t.target).closest(".question-image-field"),a=r.find(".fui-browse-preview span"),d=r.find(".fui-browse");$input=d.find("input"),o&&o.url&&(d.addClass("fui-browse-has-image"),n=o.url,u=o.url,_.isObject(o.sizes)&&(_.isObject(o.sizes.thumbnail)&&!_.isUndefined(o.sizes.thumbnail.url)?u=o.sizes.thumbnail.url:_.isObject(o.sizes.medium)&&!_.isUndefined(o.sizes.medium.url)?u=o.sizes.medium.url:_.isObject(o.sizes.large)&&!_.isUndefined(o.sizes.large.url)?u=o.sizes.large.url:_.isObject(o.sizes.full)&&!_.isUndefined(o.sizes.full.url)&&(u=o.sizes.full.url)),a.css("background-image","url('{url}')".replace("{url}",u)),$input.val("{url}".replace("{url}",n)),l.set("image",n))});s.open()},clear_image:function(t){var i=this.get_model(e(t.target)),s=e(t.target).closest(".question-image-field"),n=s.find(".fui-browse-preview span"),u=s.find(".fui-browse"),l=u.find("input");u.removeClass("fui-browse-has-image"),n.css("background-image",""),l.val(""),i.set("image","")}})})}(jQuery);
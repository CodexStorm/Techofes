!function(e){formintorjs.define(["text!tpl/quizzes.html"],function(t){return Backbone.View.extend({mainTpl:Forminator.Utils.template(e(t).find("#quiz-section-results-tpl").html()),className:"sui-box",initialize:function(e){return this.render()},render:function(){this.$el.html(this.mainTpl({type:"nowrong"})),this.render_results()},render_results:function(){var e=new Forminator.Settings.MultiResult({model:this.model,hide_label:!0});this.$el.find("#forminator-quizwiz-wrap--results").prepend([e.el])}})})}(jQuery);
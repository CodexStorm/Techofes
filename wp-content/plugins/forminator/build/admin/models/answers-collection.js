!function(e){formintorjs.define(["admin/models/answer-model"],function(e){return Backbone.Collection.extend({model:e,max_element_id:-1,get_by_name:function(e){e=e.toLowerCase();var t=!1;return this.each(function(n){n.get("name").toLowerCase()==e&&(t=n)}),t},model_index:function(e){return this.indexOf(e)},get_by_index:function(e){return this.at(e)},get_max_element_id:function(){if(-1!==this.max_element_id)return this.max_element_id;if(_.isUndefined(this.at(0)))return this.max_element_id=0,this.max_element_id;var e=this.pluck("element_id"),t=[];return _.each(e,function(e){e=e.replace("answer-",""),e=+e,t.push(e)}),this.max_element_id=_.max(t),this.max_element_id},get_next_element_id:function(){var e=this.get_max_element_id();return this.max_element_id=e+1,this.max_element_id},move_to:function(e,t){if(e===t)return this;var n=this.at(t);return this.remove(n,{silent:!0}),this.add(n,{at:e,silent:!0}),this}})})}(jQuery);
!function(t){formintorjs.define(["admin/settings/select"],function(t){return t.extend({multiple:!1,className:"sui-form-field",events:{"change .fui-multi-select":"on_change"},get_field_html:function(){var t={id:this.get_field_id(),class:"sui-select fui-multi-select",name:this.get_name()};return"<select "+this.get_field_attr_html(t)+' multiple="multiple">'+this.get_values_html()+"</select>"},get_values_html:function(){var t=this.get_saved_value();return _.map(t,this.get_value_html,this).join("")},get_value_html:function(t){var e={value:t,selected:"selected"};return"<option "+this.get_field_attr_html(e)+">"+t+"</option>"},on_render:function(){var t=this,e=_.defaults(this.options.tags_options,{tags:!0,tokenSeparators:[","," "],language:{searching:function(){return"..."},noResults:function(){return""}}});Forminator.Utils.forminator_select2_tags(t.$el,e)},on_change:function(){this.trigger("changed",this.get_value())},trigger_show:function(){this.options.show&&this.options.show(this.get_saved_value())}})})}(jQuery);
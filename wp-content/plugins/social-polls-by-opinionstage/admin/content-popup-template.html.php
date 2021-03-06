<?php
// block direct access to plugin PHP files:
defined( 'ABSPATH' ) or die();

require_once( plugin_dir_path( __FILE__ ).'../includes/opinionstage-client-session.php' );

$opinionstage_user_logged_in = opinionstage_user_logged_in();

function opinionstage_create_new_href() {
	return OPINIONSTAGE_SERVER_BASE.'/dashboard/content';
}

// Note: all html put here (not moved to js build system) in order to preserve ability to use Wordpress translate APIs
?>
<template data-opinionstage-content-popup-template>
	<div class='opinionstage-content-popup-contents' data-opinionstage-content-popup data-opinionstage-client-logged-in="<?php echo $opinionstage_user_logged_in ?>">
		<header class='header'>
			<div class='header__container'>
				<div class='header__logo'>
					<a href='<?php echo OPINIONSTAGE_SERVER_BASE ?>' target='_blank'>
						<img src='<?php echo plugins_url('admin/images/logo.svg', plugin_dir_path( __FILE__ )) ?>'>
					</a>
				</div>
				<div class='header__action'>
					<?php if ( $opinionstage_user_logged_in ) { ?>
					<div class="create-new-menu-box">
						<a href="javascript:void(0)" class="btn-create">CREATE NEW</a>
						<div class="create-new-menu">
						    <li class="create-menu__itm companymenuli">
						        <a class="alisting">poll</a>
						        <ul class="submenu">
						            <li><?php echo opinionstage_create_poll_link('create-menu__itm'); ?></li>
						            <li><?php echo opinionstage_template_poll_link('create-menu__itm'); ?></li>						            
						        </ul>						            
						    </li>
						    <li class="create-menu__itm companymenuli">
						        <a class="alisting">multi poll set</a>
						        <ul class="submenu">
						           	<li><?php echo opinionstage_create_poll_set_link('create-menu__itm', __('Create New')) ?></li>
						            <!-- <li><?php echo opinionstage_template_survey_link('create-menu__itm', __('survey')) ?></li>	 -->					            
						        </ul>						            
						    </li>
						    <li class="create-menu__itm companymenuli">
						        <a class="alisting">survey</a>
						        <ul class="submenu">
						            <li><?php echo opinionstage_create_widget_link('survey', 'create-menu__itm'); ?></li>
						            <li><?php echo opinionstage_template_survey_link('create-menu__itm'); ?></li>						            
						        </ul>						            
						    </li>
						    <li class="create-menu__itm companymenuli">
						        <a class="alisting">slideshow</a>
						        <ul class="submenu">
						            <li><?php echo opinionstage_create_slideshow_link( 'create-menu__itm' ); ?></li>
						            <li><?php echo opinionstage_template_slideshow_link('create-menu__itm') ?></li>						            
						        </ul>						            
						    </li>
						    <li class="create-menu__itm companymenuli">
						        <a class="alisting">trivia quiz</a>
						        <ul class="submenu">
						            <li><?php echo opinionstage_create_widget_link('quiz', 'create-menu__itm'); ?></li>
						            <li><?php echo opinionstage_template_trivia_link('create-menu__itm'); ?></li>						            
						        </ul>						            
						    </li>
						    <li class="create-menu__itm companymenuli">
						        <a class="alisting">personality quiz</a>
						        <ul class="submenu">
						            <li><?php echo opinionstage_create_widget_link('outcome', 'create-menu__itm'); ?></li>
						            <li><?php echo opinionstage_template_personality_quiz_link('create-menu__itm') ?></li>						            
						        </ul>						            
						    </li>
						    <li class="create-menu__itm companymenuli">
						        <a class="alisting">list</a>
						        <ul class="submenu">
						            <li><?php echo opinionstage_create_widget_link('list', 'create-menu__itm'); ?></li>
						            <li><?php echo opinionstage_template_list_link('create-menu__itm'); ?></li>						            
						        </ul>						            
						    </li>
						    <li class="create-menu__itm companymenuli">
						        <a class="alisting">form</a>
						        <ul class="submenu">
						            <li><?php echo opinionstage_create_widget_link('contact_form', 'create-menu__itm'); ?></li>
						            <li><?php echo opinionstage_template_form_link('create-menu__itm'); ?></li>						            
						        </ul>						            
						    </li>
						    <li class="create-menu__itm companymenuli">
						        <a class="alisting">story</a>
						        <ul class="submenu">
						            <li><?php echo opinionstage_create_widget_link('story', 'create-menu__itm'); ?></li>
						        </ul>						            
						    </li>
						</div>
					</div>
					<?php } ?>
					<div class='btn-close' @click="closePopup">X</div>
				</div>
			</div>
		</header>
		<section>
			<popup-content
				:show-client-content="showClientContent"
				:client-is-logged-in="isClientLoggedIn"
				:modal-is-opened="isModalOpened"
				@insert-shortcode="insertShortcode"
				client-widgets-url="<?php echo OPINIONSTAGE_CONTENT_POPUP_CLIENT_WIDGETS_API ?>"
				shared-widgets-url="<?php echo OPINIONSTAGE_CONTENT_POPUP_SHARED_WIDGETS_API ?>"
				client-widgets-has-new-url="<?php echo OPINIONSTAGE_CONTENT_POPUP_CLIENT_WIDGETS_API_RECENT_UPDATE ?>"
				access-key="<?php echo opinionstage_user_access_token() ?>"
				plugin-version="<?php echo OPINIONSTAGE_WIDGET_VERSION ?>"
			>
			</popup-content>
		</section>
	</div>
</template>

<template id="opinionstage-widget-list">
<div class='page-content'>
	<div class='content-actions'>
		<div class='filter'>
			<div class="dropdown">
				<button class="dropbtn" id="dropbtn"><span>All ITEMS</span></button>
				<div class="dropdown-content">
					<div class='filter__itm'
							@click="selectWidgetType('all')"
							:class="{ active: selectedWidgetType === 'all' }"
					>all Items</div>
					<div class='filter__itm'
							@click="selectWidgetType('poll')"
							:class="{ active: selectedWidgetType === 'poll' }"
					>poll</div>
					<div class='filter__itm'
							@click="selectWidgetType('set')"
							:class="{ active: selectedWidgetType === 'set' }"
					>multi poll set</div>
					<div class='filter__itm'
							@click="selectWidgetType('survey')"
							:class="{ active: selectedWidgetType === 'survey' }"
					>survey</div>
					<div class='filter__itm'
							@click="selectWidgetType('slideshow')"
							:class="{ active: selectedWidgetType === 'slideshow' }"
					>slideshow</div>
					<div class='filter__itm'
							@click="selectWidgetType('trivia')"
							:class="{ active: selectedWidgetType === 'trivia' }"
					>trivia quiz</div>
					<div class='filter__itm'
							@click="selectWidgetType('outcome')"
							:class="{ active: selectedWidgetType === 'outcome' }"
					>personality quiz</div>
					<div class='filter__itm'
							@click="selectWidgetType('list')"
							:class="{ active: selectedWidgetType === 'list' }"
					>list</div>
					<div class='filter__itm'
							@click="selectWidgetType('form')"
							:class="{ active: selectedWidgetType === 'form' }"
					>form</div>
					<div class='filter__itm'
							@click="selectWidgetType('story')"
							:class="{ active: selectedWidgetType === 'story' }"
					>story article</div>
				</div>
			</div>
		</div>
		<div class='search' style="width: 180px;">
			<input
				class='std-search'
				placeholder='Search...'
				type='text'
				v-model='widgetTitleSearch'
				:class='{ hidden: !showSearch }'
			>
		</div>
	</div>
	<div class='content__list'>
		<div v-if='hasData'>
			<div class='content__itm' v-for="widget in widgets">
				<div class='content__image'>
					<img :src='widget.imageUrl'>
					<div class='content__label'>{{ widget.type }}</div>
				</div>
				<p class='content__info'>{{ widget.title }}</p>
				<div class='content__links'>
					<button class='content__links-itm' @click="insertShortcode(widget)">insert</button>
					<a class='content__links-itm' target="_blank" :href='widget.landingPageUrl'>view</a>
					<a class='content__links-itm' target="_blank" :href='widget.editUrl' v-show="!widget.template">edit</a>
					<a class='content__links-itm' target="_blank" :href='widget.statsUrl' v-show="!widget.template">statistics</a>
				</div>
			</div>
			<div class='content__loading' v-if='dataLoading'>
				loading...
			</div>
			<div v-else>
				<button
					class='btn-show-more'
					v-if='!noMoreData'
					@click='showMore'
				>Click for more</button>
			</div>
		</div>
		<div v-else>
			No content found
		</div>
	</div>
</div>
</template>

<template id="opinionstage-popup-content">
	<div v-if="showClientContent">
		<div v-if="clientIsLoggedIn">
			<div v-if="newWidgetsAvailable" class="notification-container">
				<notification
					:widget-type='searchCriteria.type'
					@reload='reloadData'
					@hide='startWidgetUpdatesChecker'
				>
			</div>
			<widget-list
				:widgets='widgets'
				:data-loading='dataLoading'
				:show-search='true'
				:no-more-data='noMoreData'
				@insert-shortcode="insertShortcode"
				@widgets-search-update='reloadData'
				@load-more-widgets='appendData'
			>
		</div>
		<div class='page-content' v-else>
			<div class="bordered-container">
				<h1 class='main-title'>
					<b>Connect WordPress</b>
					<span>with</span>
					<b>Opinion Stage</b>
					<span>to get started</span>
				</h1>
				<form action="<?php echo OPINIONSTAGE_LOGIN_PATH ?>" method="get" class="opinionstage-connect-form">
					<input type="hidden" name="utm_source" value="<?php echo OPINIONSTAGE_UTM_SOURCE ?>">
					<input type="hidden" name="utm_campaign" value="<?php echo OPINIONSTAGE_UTM_CAMPAIGN ?>">
					<input type="hidden" name="utm_medium" value="<?php echo OPINIONSTAGE_UTM_MEDIUM ?>">
					<input type="hidden" name="o" value="<?php echo OPINIONSTAGE_WIDGET_API_KEY ?>">
					<input type="hidden" name="callback" value="<?php echo opinionstage_content_login_callback_url() ?>">
					<input id="os-email" type="email" name="email" placeholder="Enter Your Email" data-os-email-input class="opinionstage-conect-input">
					<button class="opinionstage-blue-btn" type="submit" id="os-start-login" data-os-login>CONNECT</button>
				</form>
			</div>
		</div>
	</div>
	<div v-else>
		<widget-list
			:widgets='widgets'
			:data-loading='dataLoading'
			:show-search='false'
			:no-more-data='noMoreData'
			@insert-shortcode='insertShortcode'
			@widgets-search-update='reloadData'
			@load-more-widgets='appendData'
		>
	</div>
</template>

<template id="opinionstage-notification">
	<div class="opinionstage-section-notification">
		<p class="opinionstage-section-notification__title">
			Your content has been updated, please click the button to update your view
		</p>
		<div class="opinionstage-section-notification__controls">
			<button class='btn-blue' @click="reload">Update view</button>
		</div>
	</div>
</template>
	<script>
		jQuery(document).ready(function ($) {	
		   	$('.filter__itm').live('click', function(e) {
			   	var text = $(this).text();
		   		$("button#dropbtn span").text(text);
			});
			$('div#show-templates').live('click', function(e) {
				var inputs = $(".filter__itm");
               	for(var i = 0; i < inputs.length; i++){
                   	if($(inputs[i]).text() == 'story article'){
                    	$(inputs[i]).hide();
                    	break; 
                    }
                }
			});
		});
	</script>
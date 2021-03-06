<?php
// block direct access to plugin PHP files:
defined( 'ABSPATH' ) or die();
?>

<div id="opinionstage-content">
	<div class="opinionstage-header-wrapper">
		<div class="opinionstage-logo-wrapper">
			<div class="opinionstage-logo"></div>
		</div>		
			<?php if ( !$os_client_logged_in ) {?>
			<div class="opinionstage-status-content">
				<div class='opinionstage-status-title'><b>Connect WordPress with Opinion Stage to Get Started</b></div>
				<form action="<?php echo OPINIONSTAGE_LOGIN_PATH ?>" method="get" class="opinionstage-connect-form">
					<i class="os-icon-plugin icon-os-poll-client"></i>
					<input type="hidden" name="utm_source" value="<?php echo OPINIONSTAGE_UTM_SOURCE ?>">
					<input type="hidden" name="utm_campaign" value="<?php echo OPINIONSTAGE_UTM_CAMPAIGN ?>">
					<input type="hidden" name="utm_medium" value="<?php echo OPINIONSTAGE_UTM_MEDIUM ?>">
					<input type="hidden" name="o" value="<?php echo OPINIONSTAGE_WIDGET_API_KEY ?>">
					<input type="hidden" name="callback" value="<?php echo opinionstage_callback_url()?>">
					<input id="os-email" type="email" name="email" placeholder="Enter Your Email" data-os-email-input required>
					<button class="opinionstage-connect-btn opinionstage-blue-btn" type="submit" id="os-start-login" data-os-login>CONNECT</button>
				</form>
			</div>
			<?php } else { ?>
			<div class="opinionstage-status-content-connected">
				<div class='opinionstage-status-title'>You are connected to Opinion Stage with the following email</div>
				<i class="os-icon-plugin icon-os-form-success"></i>
				<label class="checked" for="user-email"></label>
				<input id="os-email" type="email" disabled value="<?php echo($os_options["email"]) ?>">
				<form method="POST" action="<?php echo get_admin_url(null, 'admin.php?page=opinionstage-disconnect-page')?>" class="opinionstage-connect-form">
					<button class="opinionstage-connect-btn opinionstage-blue-btn" type="submit" id="os-disconnect">DISCONNECT</button>
				</form>
			</div>
			<?php } ?>		
	</div>
	<div class="opinionstage-dashboard">
		<div class="opinionstage-dashboard-left">
			<div id="opinionstage-section-create" class="opinionstage-dashboard-section">
				<div class="opinionstage-section-header">
					<div class="opinionstage-section-title">Create</div>
				</div>
				<div class="opinionstage-section-content">
					<div class="opinionstage-section-raw">
						<div class="opinionstage-section-cell opinionstage-icon-cell">
							<div class="os-icon-plugin icon-os-reports-polls"></div>
						</div>
						<div class="opinionstage-section-cell opinionstage-description-cell">
							<div class="title">Poll</div>
							<div class="example">Get opinions, run contests & competitions</div>
						</div>
						<div class="opinionstage-section-cell opinionstage-btn-cell">
							<?php echo opinionstage_create_poll_link('opinionstage-blue-btn opinionstage-create-btn'); ?>
							<?php echo opinionstage_template_poll_link('opinionstage-blue-btn opinionstage-create-btn template'); ?>
						</div>
					</div>
					<div class="opinionstage-section-raw">
						<div class="opinionstage-section-cell opinionstage-icon-cell">
							<div class="os-icon-plugin icon-os-reports-personality"></div>
						</div>
						<div class="opinionstage-section-cell opinionstage-description-cell">
							<div class="title">Personality Quiz</div>
							<div class="example">Create a personality test or a product/service selector</div>
						</div>
						<div class="opinionstage-section-cell opinionstage-btn-cell">
							<?php echo opinionstage_create_widget_link('outcome', 'opinionstage-blue-btn opinionstage-create-btn'); ?>
							<?php echo opinionstage_template_personality_quiz_link('opinionstage-blue-btn opinionstage-create-btn template') ?>
						</div>
					</div>
					<div class="opinionstage-section-raw">
						<div class="opinionstage-section-cell opinionstage-icon-cell">
							<div class="os-icon-plugin icon-os-reports-trivia"></div>
						</div>
						<div class="opinionstage-section-cell opinionstage-description-cell">
							<div class="title">Trivia Quiz</div>
							<div class="example">Create a knowledge test or assessment</div>
						</div>
						<div class="opinionstage-section-cell opinionstage-btn-cell">
							<?php echo opinionstage_create_widget_link('quiz', 'opinionstage-blue-btn opinionstage-create-btn'); ?>
							<?php echo opinionstage_template_trivia_link('opinionstage-blue-btn opinionstage-create-btn template'); ?>
						</div>
					</div>
					<div class="opinionstage-section-raw">
						<div class="opinionstage-section-cell opinionstage-icon-cell">
							<div class="os-icon-plugin icon-os-reports-set"></div>
						</div>
						<div class="opinionstage-section-cell opinionstage-description-cell">
							<div class="title">Survey</div>
							<div class="example">Gather feedback from your users</div>
						</div>
						<div class="opinionstage-section-cell opinionstage-btn-cell">
							<?php echo opinionstage_create_widget_link('survey', 'opinionstage-blue-btn opinionstage-create-btn'); ?>
							<?php echo opinionstage_template_survey_link('opinionstage-blue-btn opinionstage-create-btn template'); ?>
						</div>
					</div>
					<div class="opinionstage-section-raw">
						<div class="opinionstage-section-cell opinionstage-icon-cell">
							<div class="os-icon-plugin icon-os-widget-slideshow"></div>
						</div>
						<div class="opinionstage-section-cell opinionstage-description-cell">
							<div class="title">Slideshow</div>
							<div class="example">Group items in an interactive display</div>
						</div>
						<div class="opinionstage-section-cell opinionstage-btn-cell">
							<?php echo opinionstage_create_slideshow_link( 'opinionstage-blue-btn opinionstage-create-btn' ); ?>
							<?php echo opinionstage_template_slideshow_link('opinionstage-blue-btn opinionstage-create-btn template') ?>
						</div>
					</div>
					<div class="opinionstage-section-raw">
						<div class="opinionstage-section-cell opinionstage-icon-cell">
							<div class="os-icon-plugin icon-os-reports-list"></div>
						</div>
						<div class="opinionstage-section-cell opinionstage-description-cell">
							<div class="title">List</div>
							<div class="example">Create a listacle of anything</div>
						</div>
						<div class="opinionstage-section-cell opinionstage-btn-cell">
							<?php echo opinionstage_create_widget_link('list', 'opinionstage-blue-btn opinionstage-create-btn'); ?>
							<?php echo opinionstage_template_list_link('opinionstage-blue-btn opinionstage-create-btn template'); ?>
						</div>
					</div>
					<div class="opinionstage-section-raw">
						<div class="opinionstage-section-cell opinionstage-icon-cell">
							<div class="os-icon-plugin icon-os-widget-form"></div>
						</div>
						<div class="opinionstage-section-cell opinionstage-description-cell">
							<div class="title">Form</div>
							<div class="example">Gather information from your users</div>
						</div>
						<div class="opinionstage-section-cell opinionstage-btn-cell">
							<?php echo opinionstage_create_widget_link('contact_form', 'opinionstage-blue-btn opinionstage-create-btn'); ?>
							<?php echo opinionstage_template_form_link('opinionstage-blue-btn opinionstage-create-btn template'); ?>
						</div>
					</div>
					<div class="opinionstage-section-raw">
						<div class="opinionstage-section-cell opinionstage-icon-cell">
							<div class="os-icon-plugin icon-os-icon-plugin-story"></div>
						</div>
						<div class="opinionstage-section-cell opinionstage-description-cell">
							<div class="title">Story Article</div>
							<div class="example">Create an article using visual & interactive elements</div>
						</div>
						<div class="opinionstage-section-cell opinionstage-btn-cell">
							<?php echo opinionstage_create_widget_link('story', 'opinionstage-blue-btn opinionstage-create-btn'); ?>
						</div>
					</div>
				</div>
			</div>
			<p style="font-weight: 600; font-size: 15px;"><a href="https://help.opinionstage.com/getting-started/content-creation-tutorials" target="_blank">Need help creating items?</a></p>
			<p style="font-weight: 600; font-size: 15px;"><a href="https://help.opinionstage.com/wordpress-plugin/how-to-add-items-to-your-wordpress-site" target="_blank">Need help adding items you created to your site?</a></p>
		</div>
	</div>
</div>
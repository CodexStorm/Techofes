<div class="sui-row-with-sidenav">

	<div class="sui-sidenav">

		<ul class="sui-vertical-tabs sui-sidenav-hide-md">

			<li class="sui-vertical-tab current">
				<a href="#" data-nav="emails"><?php esc_html_e( 'Emails', Forminator::DOMAIN ); ?></a>
			</li>

			<li class="sui-vertical-tab">
				<a href="#" data-nav="recaptcha"><?php esc_html_e( 'Google reCAPTCHA', Forminator::DOMAIN ); ?></a>
			</li>

			<li class="sui-vertical-tab">
				<a href="#" data-nav="data"><?php esc_html_e( 'Data', Forminator::DOMAIN ); ?></a>
			</li>

			<li class="sui-vertical-tab">
				<a href="#" data-nav="pagination"><?php esc_html_e( 'Pagination', Forminator::DOMAIN ); ?></a>
			</li>

		</ul>

		<select class="sui-mobile-nav sui-sidenav-hide-lg">
			<option value="emails"><?php esc_html_e( 'Emails', Forminator::DOMAIN ); ?></option>
			<option value="recaptcha"><?php esc_html_e( 'Google reCAPTCHA', Forminator::DOMAIN ); ?></option>
			<option value="data"><?php esc_html_e( 'Data', Forminator::DOMAIN ); ?></option>
			<option value="pagination"><?php esc_html_e( 'Pagination', Forminator::DOMAIN ); ?></option>
		</select>

	</div>

	<?php $this->template( 'settings/tab-emails' ); ?>
	<?php $this->template( 'settings/tab-recaptcha' ); ?>
	<?php $this->template( 'settings/tab-data' ); ?>
	<?php $this->template( 'settings/tab-pagination' ); ?>

</div>

<?php

require_once dirname( __FILE__ ) . '/forminator-addon-zapier-exception.php';
require_once dirname( __FILE__ ) . '/lib/class-wp-zapier-api.php';

/**
 * Class Forminator_Addon_Zapier
 * Zapier Addon Main Class
 *
 * @since 1.0 Zapier Addon
 */
final class Forminator_Addon_Zapier extends Forminator_Addon_Abstract {

	/**
	 * @var self|null
	 */
	private static $_instance = null;

	protected $_slug                   = 'zapier';
	protected $_version                = FORMINATOR_ADDON_ZAPIER_VERSION;
	protected $_min_forminator_version = '1.1';
	protected $_short_title            = 'Zapier';
	protected $_title                  = 'Zapier';
	protected $_url                    = 'https://premium.wpmudev.org';
	protected $_full_path              = __FILE__;

	protected $_form_settings = 'Forminator_Addon_Zapier_Form_Settings';
	protected $_form_hooks    = 'Forminator_Addon_Zapier_Form_Hooks';

	/**
	 * Forminator_Addon_Zapier constructor.
	 *
	 * @since 1.0 Zapier Addon
	 */
	public function __construct() {
		// late init to allow translation
		$this->_description                = __( 'Make your form Zap-able', Forminator::DOMAIN );
		$this->_activation_error_message   = __( 'Sorry but we failed to activate Zapier Integration, don\'t hesitate to contact us', Forminator::DOMAIN );
		$this->_deactivation_error_message = __( 'Sorry but we failed to deactivate Zapier Integration, please try again', Forminator::DOMAIN );

		$this->_update_settings_error_message = __(
			'Sorry, we failed to update settings, please check your form and try again',
			Forminator::DOMAIN
		);

		$this->_icon     = forminator_addon_zapier_assets_url() . 'icons/zapier.png';
		$this->_icon_x2  = forminator_addon_zapier_assets_url() . 'icons/zapier@2x.png';
		$this->_image    = forminator_addon_zapier_assets_url() . 'img/zapier.png';
		$this->_image_x2 = forminator_addon_zapier_assets_url() . 'img/zapier@2x.png';
	}

	/**
	 * Get Instance
	 *
	 * @since 1.0 Zapier Addon
	 * @return self|null
	 */
	public static function get_instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * Setting apier Addon
	 *
	 * @since 1.1 Zapier Addon
	 * @return array
	 */
	public function settings_wizards() {
		return array(
			array(
				'callback'     => array( $this, 'setup_connect' ),
				'is_completed' => array( $this, 'is_connected' ),
			),
		);
	}

	/**
	 * Activate Zapier
	 *
	 * @since 1.1 Zapier Addon
	 *
	 * @param     $submitted_data
	 * @param int $form_id
	 *
	 * @return array
	 */
	public function setup_connect( $submitted_data, $form_id = 0 ) {
		$settings_values = $this->get_settings_values();

		$template         = forminator_addon_zapier_dir() . 'views/settings/setup-connect.php';
		$template_success = forminator_addon_zapier_dir() . 'views/settings/setup-connect-success.php';

		$template_params = array(
			'is_connected'  => $this->is_connected(),
			'error_message' => '',
		);

		$has_errors   = false;
		$show_success = false;
		$is_submit    = ! empty( $submitted_data );

		foreach ( $template_params as $key => $value ) {
			if ( isset( $submitted_data[ $key ] ) ) {
				$template_params[ $key ] = $submitted_data[ $key ];
			} elseif ( isset( $settings_values[ $key ] ) ) {
				$template_params[ $key ] = $settings_values[ $key ];
			}
		}

		if ( $is_submit ) {
			$connect = isset( $submitted_data['connect'] ) ? $submitted_data['connect'] : '';

			try {
				if ( empty( $connect ) ) {
					throw new Forminator_Addon_Zapier_Exception( __( 'Please Connect Zapier', Forminator::DOMAIN ) );
				}

				if ( ! forminator_addon_is_active( $this->_slug ) ) {
					$activated = Forminator_Addon_Loader::get_instance()->activate_addon( $this->_slug );
					if ( ! $activated ) {
						throw new Forminator_Addon_Zapier_Exception( Forminator_Addon_Loader::get_instance()->get_last_error_message() );
					}
				}
				// no form_id its on global settings
				if ( empty( $form_id ) ) {
					$show_success = true;
				}

			} catch ( Forminator_Addon_Zapier_Exception $e ) {
				$template_params['error_message'] = $e->getMessage();
				$has_errors                       = true;
			}
		}

		if ( $show_success ) {
			$template = $template_success;
		}

		$buttons = array();

		if ( $show_success ) {
			$buttons['close'] = array(
				'markup' => self::get_button_markup( esc_html__( 'Close', Forminator::DOMAIN ), 'sui-button-ghost forminator-addon-close' ),
			);
		} else {
			if ( $this->is_connected() ) {
				$buttons['disconnect'] = array(
					'markup' => self::get_button_markup( esc_html__( 'DISCONNECT', Forminator::DOMAIN ), 'sui-button-ghost forminator-addon-disconnect' ),
				);
			} else {
				$buttons['submit'] = array(
					'markup' => self::get_button_markup( esc_html__( 'Activate', Forminator::DOMAIN ), 'forminator-addon-connect' )
				);
			}


		}

		return array(
			'html'       => self::get_template( $template, $template_params ),
			'buttons'    => $buttons,
			'redirect'   => false,
			'has_errors' => $has_errors,
		);
	}

	/**
	 * Override on is_connected
	 *
	 * @since 1.0 Zapier Addon
	 * @since 1.1 Disable auto activate
	 *
	 * @return bool
	 */
	public function is_connected() {
		try {
			// check if its active
			if ( ! $this->is_active() ) {
				throw new Forminator_Addon_Zapier_Exception( __( 'Zapier is not active', Forminator::DOMAIN ) );
			}
			$is_connected = true;
		} catch ( Forminator_Addon_Zapier_Exception $e ) {
			$is_connected = false;
		}

		/**
		 * Filter connected status of zapier
		 *
		 * @since 1.1
		 *
		 * @param bool $is_connected
		 */
		$is_connected = apply_filters( 'forminator_addon_zapier_is_connected', $is_connected );

		return $is_connected;
	}

	/**
	 * Check if zapier is connected with current form
	 *
	 * @since 1.0 Zapier Addon
	 *
	 * @param $form_id
	 *
	 * @return bool
	 */
	public function is_form_connected( $form_id ) {
		try {
			$form_settings_instance = null;
			if ( ! $this->is_connected() ) {
				throw new Forminator_Addon_Zapier_Exception( __( 'Zapier is not connected', Forminator::DOMAIN ) );
			}

			$form_settings_instance = $this->get_addon_form_settings( $form_id );
			if ( ! $form_settings_instance instanceof Forminator_Addon_Zapier_Form_Settings ) {
				throw new Forminator_Addon_Zapier_Exception( __( 'Invalid Form Settings of Zapier', Forminator::DOMAIN ) );
			}

			// Mark as active when there is at least one active connection
			if ( false === $form_settings_instance->find_one_active_connection() ) {
				throw new Forminator_Addon_Zapier_Exception( __( 'No active Zapier connection found in this form', Forminator::DOMAIN ) );
			}

			$is_form_connected = true;

		} catch ( Forminator_Addon_Zapier_Exception $e ) {
			$is_form_connected = false;
			forminator_addon_maybe_log( __METHOD__, $e->getMessage() );
		}

		/**
		 * Filter connected status of zapier with the form
		 *
		 * @since 1.1
		 *
		 * @param bool                                       $is_form_connected
		 * @param int                                        $form_id                Current Form ID
		 * @param Forminator_Addon_Zapier_Form_Settings|null $form_settings_instance Instance of form settings, or null when unavailable
		 *
		 */
		$is_form_connected = apply_filters( 'forminator_addon_zapier_is_form_connected', $is_form_connected, $form_id, $form_settings_instance );

		return $is_form_connected;
	}

	/**
	 * Get Zapier API
	 *
	 * @since 1.0 Zapier Addon
	 *
	 * @param string $endpoint
	 *
	 * @return Forminator_Addon_Zapier_Wp_Api|null
	 * @throws Forminator_Addon_Zapier_Wp_Api_Exception
	 */
	public function get_api( $endpoint ) {
		return Forminator_Addon_Zapier_Wp_Api::get_instance( $endpoint );
	}

	/**
	 * Flag show full log on entries
	 *
	 * @since 1.0 Zapier Addon
	 * @return bool
	 */
	public static function is_show_full_log() {
		if ( defined( 'FORMINATOR_ADDON_ZAPIER_SHOW_FULL_LOG' ) && FORMINATOR_ADDON_ZAPIER_SHOW_FULL_LOG ) {
			return true;
		}

		return false;
	}

	/**
	 * Allow multiple connection on one form
	 *
	 * @since 1.0 Zapier Addon
	 * @return bool
	 */
	public function is_allow_multi_on_form() {
		return true;
	}

}

<?php

// includes/items-themes

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Theme: Astra (free & Pro, by Brainstorm Force)
 * @since 1.0.0
 */
if ( ( 'Astra' == wp_get_theme() && defined( 'ASTRA_THEME_VERSION' ) )	// Astra w/o child theme
	|| ( 'astra' === basename( get_template_directory() ) && defined( 'ASTRA_THEME_VERSION' ) )		// Astra w/ child theme
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-astra.php' );
}


/**
 * Theme: GeneratePress (free & Premium, by Tom Usborne)
 * @since 1.0.0
 */
if ( ( 'GeneratePress' == wp_get_theme() && function_exists( 'generate_setup' ) )	// GeneratePress w/o child theme
	|| ( 'generatepress' === basename( get_template_directory() ) && function_exists( 'generate_setup' ) )		// GeneratePress w/ child theme
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-generatepress.php' );
}


/**
 * Theme: OceanWP (free & Premium, by Nicolas Lecocq)
 *   NOTE: We check here against the "OceanWP Extra" (free) Add-On Plugin, as
 *         the use of OceanWP without "Extra" is completely senseless. It's a
 *         plugin dependency.
 * @since 1.0.0
 */
if ( ( 'OceanWP' == wp_get_theme() && function_exists( 'Ocean_Extra' ) )	// OceanWP w/o child theme
	|| ( 'oceanwp' === basename( get_template_directory() ) && function_exists( 'Ocean_Extra' ) )		// OceanWP w/ child theme
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-oceanwp.php' );
}


/**
 * Theme: Genesis Framework (Premium, by StudioPress/ Rainmaker Digital, LLC)
 *   NOTE: Usage without Child Theme is absolutely NOT recommended, therefore
 *         not supported!
 * @since 1.0.0
 * @uses ddw_tbex_is_genesis_active()
 */
if ( ddw_tbex_is_genesis_active() ) {

	/** Genesis Framework items: */
	require_once( TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis.php' );

	/** Load supported Genesis Child Themes */
	require_once( TBEX_PLUGIN_DIR . 'includes/items-themes-genesis.php' );

}  // end if Genesis Framework


/**
 * Theme: Hestia (free, by Themeisle)
 * @since 1.1.0
 */
if ( ( 'Hestia' == wp_get_theme() && defined( 'HESTIA_VERSION' ) )		// Hestia w/o child theme
	|| ( 'hestia' === basename( get_template_directory() ) && defined( 'HESTIA_VERSION' ) )		// Hestia w/ child theme
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-hestia.php' );
}


/**
 * Theme: Page Builder Framework (free & Premium, by David Vongries & MapSteps)
 * @since 1.1.0
 */
if ( ( 'Page Builder Framework' == wp_get_theme() && function_exists( 'wpbf_theme_setup' ) )	// PBF w/o child theme
	|| ( 'page-builder-framework' === basename( get_template_directory() ) && function_exists( 'wpbf_theme_setup' ) )		// PBF w/ child theme
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-page-builder-framework.php' );
}


/**
 * Theme: Kava Theme (free/Premium, by Zemez & CrocoBlock)
 * @since 1.1.1
 */
if ( ( 'Kava' == wp_get_theme() && class_exists( 'Kava_Theme_Setup' ) )		// Kava w/o child theme
	|| ( ( 'kava' === basename( get_template_directory() ) || 'kavatheme' === basename( get_template_directory() ) ) && class_exists( 'Kava_Theme_Setup' ) )		// Kava w/ child theme
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-kava.php' );
}


/**
 * Theme: Buildwall (Premium, by Zemez)
 * @since 1.3.0
 */
if ( ( 'Buildwall' == wp_get_theme() && class_exists( 'Buildwall_Theme_Setup' ) )		// Buildwall w/o child theme
	|| ( 'buildwall' === basename( get_template_directory() ) && class_exists( 'Buildwall_Theme_Setup' ) )		// Buildwall w/ child theme
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-buildwall.php' );
}


/**
 * Theme: Beaver Builder Theme (Premium, by FastLine Media LLC)
 * @since 1.1.0
 */
if ( ( 'Beaver Builder Theme' == wp_get_theme() && defined( 'FL_THEME_VERSION' ) )	// BB-Theme w/o child theme
	|| ( 'bb-theme' === basename( get_template_directory() ) && defined( 'FL_THEME_VERSION' ) )		// BB-Theme w/ child theme
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-beaver-builder-theme.php' );
}


/**
 * Theme: Customify (free & Premium, by WPCustomify/ PressMaximum)
 * @since 1.2.0
 */
if ( ( 'Customify' == wp_get_theme() && class_exists( 'Customify' ) )	// Customify w/o child theme
	|| ( 'customify' === basename( get_template_directory() ) && class_exists( 'Customify' ) )		// Customify w/ child theme
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-customify.php' );
}


/**
 * Theme: Phlox (free & Premium, by averta)
 * @since 1.3.0
 */
if ( ( 'Phlox' == wp_get_theme() && class_exists( 'Auxin' ) )	// Phlox w/o child theme
	|| ( 'phlox' === basename( get_template_directory() ) && class_exists( 'Auxin' ) )		// Phlox w/ child theme
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-phlox.php' );
}


/**
 * Theme: Flexia (free & Premium, by Codetic)
 *   NOTE: We check here against the "Flexia Core" (free) Add-On Plugin, as
 *         the use of Flexia without "Core" is completely senseless. It's a
 *         plugin dependency.
 * @since 1.2.0
 */
if ( ( 'Flexia' == wp_get_theme() && defined( 'FLEXIA_CORE_VERSION' ) )	// Flexia w/o child theme
	|| ( 'flexia' === basename( get_template_directory() ) && defined( 'FLEXIA_CORE_VERSION' ) )		// Flexia w/ child theme
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-flexia.php' );
}


/**
 * Theme: StartWP (free, by Munir Kamal)
 * @since 1.1.0
 */
if ( ( 'Start' == wp_get_theme() && function_exists( 'start_setup' ) )	// StartWP w/o child theme
	|| ( 'start' === basename( get_template_directory() ) && function_exists( 'start_setup' ) )		// StartWP w/ child theme
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-startwp.php' );
}


/**
 * Theme: Freelancer Framework (free, by Cobalt Apps)
 * @since 1.1.0
 */
if ( ( 'Freelancer' == wp_get_theme() && function_exists( 'freelancer_theme_setup' ) )	// Freelancer w/o child theme
	|| ( 'freelancer' === basename( get_template_directory() ) && function_exists( 'freelancer_theme_setup' ) )		// Freelancer w/ child theme
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-freelancer.php' );
}


/**
 * Themes: Suki (free, by SukiWP/ David Rozando)
 * @since 1.4.0
 */
if ( ( 'Suki' == wp_get_theme() && class_exists( 'Suki' ) )	// Suki w/o child theme
	|| ( 'suki' === basename( get_template_directory() ) && class_exists( 'Suki' ) )		// Suki w/ child theme
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-suki.php' );
}


/**
 * Themes: Sydney (free, by athemes)
 * @since 1.4.0
 */
if ( ( 'Sydney' == wp_get_theme() && function_exists( 'sydney_setup' ) )	// Sydney w/o child theme
	|| ( 'sydney' === basename( get_template_directory() ) && function_exists( 'sydney_setup' ) )		// Sydney w/ child theme
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-sydney.php' );
}


/**
 * Themes: Visual Composer Starter (free, by The Visual Composer Team)
 * @since 1.4.0
 */
if ( ( 'Visual Composer Starter' == wp_get_theme() && function_exists( 'visualcomposerstarter_setup' ) )	// Visual Composer Starter w/o child theme
	|| ( 'visual-composer-starter' === basename( get_template_directory() ) && function_exists( 'visualcomposerstarter_setup' ) )		// Visual Composer Starter w/ child theme
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-visual-composer-starter.php' );
}


/**
 * Themes: Default Twenty Themes (2010-2017), plus supported (third-party) Child Themes
 * @since 1.0.0
 */
if ( ddw_tbex_is_default_twenty() ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-default-twenty-themes.php' );
}


/**
 * Themes: Elementor Hello Theme (free, by Elementor/ Pojo Me Digital)
 *   Note: Only loaded if Elementor plugin is active!
 * @since 1.0.0
 * @since 1.4.0 Make dependent on Elementor (base) plugin.
 */
if ( ddw_tbex_is_elementor_active() ) :
	if ( 'elementor-hello-theme' == get_stylesheet()
		|| 'elementor-hello' == get_stylesheet()
		|| 'elementor-hello-theme-master' == get_stylesheet()
	) {
		require_once( TBEX_PLUGIN_DIR . 'includes/elementor-official/items-elementor-hello-theme.php' );
	}
endif;


/**
 * Themes: Eletheme (free, by Liviu Duda)
 * @since 1.2.0
 */
if ( function_exists( 'eletheme_setup' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-eletheme.php' );
}


/**
 * Themes: Saved (Premium, by churchthemes.com)
 * @since 1.3.0
 */
if ( ( 'Saved' == wp_get_theme() && function_exists( 'saved_add_theme_support_framework' ) )	// Saved w/o child theme
	|| ( 'saved' === basename( get_template_directory() ) && function_exists( 'saved_add_theme_support_framework' ) )		// Saved w/ child theme
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-ct-saved.php' );
}


/**
 * Themes: Maranatha (Premium, by churchthemes.com)
 * @since 1.3.0
 */
if ( ( 'Maranatha' == wp_get_theme() && function_exists( 'maranatha_add_theme_support_framework' ) )	// Maranatha w/o child theme
	|| ( 'maranatha' === basename( get_template_directory() ) && function_exists( 'maranatha_add_theme_support_framework' ) )		// Maranatha w/ child theme
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-ct-maranatha.php' );
}


/**
 * Themes: Exodus (Premium, by churchthemes.com)
 * @since 1.3.0
 */
if ( ( 'Exodus' == wp_get_theme() && function_exists( 'exodus_add_theme_support_framework' ) )	// Exodus w/o child theme
	|| ( 'exodus' === basename( get_template_directory() ) && function_exists( 'exodus_add_theme_support_framework' ) )		// Exodus w/ child theme
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-ct-exodus.php' );
}


/**
 * Themes: Resurrect (Premium, by churchthemes.com)
 * @since 1.3.0
 */
if ( ( 'Resurrect' == wp_get_theme() && function_exists( 'resurrect_add_theme_support_framework' ) )	// Resurrect w/o child theme
	|| ( 'resurrect' === basename( get_template_directory() ) && function_exists( 'resurrect_add_theme_support_framework' ) )		// Resurrect w/ child theme
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-ct-resurrect.php' );
}


/**
 * Themes: Risen (Premium, by Steven Gliebe)
 * @since 1.3.0
 */
if ( ( 'Risen' == wp_get_theme() && function_exists( 'risen_setup' ) )	// Risen w/o child theme
	|| ( 'risen' === basename( get_template_directory() ) && function_exists( 'risen_setup' ) )		// Risen w/ child theme
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-ct-risen.php' );
}


/**
 * Themes: Atomic Blocks (free, by Atomic Blocks/ Array Themes)
 * @since 1.4.0
 */
if ( ( 'Atomic Blocks' == wp_get_theme() && function_exists( 'atomic_blocks_setup' ) )	// Atomic Blocks w/o child theme
	|| ( 'atomic-blocks' === basename( get_template_directory() ) && function_exists( 'atomic_blocks_setup' ) )		// Atomic Blocks w/ child theme
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-atomic-blocks.php' );
}


/**
 * Themes: Editor Blocks (free, by Editor Blocks/ Danny Cooper)
 * @since 1.4.0
 */
if ( ( 'Editor Blocks' == wp_get_theme() && function_exists( 'editor_blocks_setup' ) )	// Editor Blocks w/o child theme
	|| ( 'editor-blocks' === basename( get_template_directory() ) && function_exists( 'editor_blocks_setup' ) )		// Editor Blocks w/ child theme
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-editor-blocks.php' );
}


/**
 * Themes: CoBlocks (free, by Rich Tabor of CoBlocks)
 * @since 1.4.0
 */
if ( ( 'CoBlocks' == wp_get_theme() && function_exists( 'coblocks_setup' ) )	// CoBlocks w/o child theme
	|| ( 'coblocks' === basename( get_template_directory() ) && function_exists( 'coblocks_setup' ) )		// CoBlocks w/ child theme
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-coblocks.php' );
}



/**
 * Conditional Customizer items for the current active Theme
 * @since 1.4.0
 * -----------------------------------------------------------------------------
 */

/**
 * Add Customizer deep link items for the current active theme, declared via the
 *   filter 'tbex_filter_items_theme_customizer_deep' and the appropriate array.
 *   Only fire the action which adds the Toolbar nodes if there are any Themes
 *   which have actually used the filter.
 *
 * @since 1.4.0
 *
 * @see ddw_tbex_items_theme_customizer_deep()
 *
 * @uses ddw_tbex_customizer_deep_items_priority()
 */
if ( has_filter( 'tbex_filter_items_theme_customizer_deep' ) ) {
	add_action( 'admin_bar_menu', 'ddw_tbex_items_theme_customizer_deep', ddw_tbex_customizer_deep_items_priority() );
}

<?php
/**
 * Register scripts and styles.
 */

function wpmtst_scripts() {

	$plugin_version = get_option( 'wpmtst_plugin_version' );
	$options        = get_option( 'wpmtst_options' );
	$compat_options = get_option( 'wpmtst_compat_options' );

	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	/**
	 * Page controller
	 *
	 * @since 2.28.0
	 */
	wp_register_script( 'wpmtst-controller',
		WPMTST_PUBLIC_URL . 'js/controller.js',
		array( 'jquery' ),
		$plugin_version,
		true );

	/**
	 * Key         : Description
	 * --------------------------------------------------------------
	 * (blank)     : No Pjax support
	 * universal   : Universal (timer)
	 * attrChange  : Target attribute change (data-pjax)
	 * nodesAdded  : Target nodes added + timer
	 * event       : Event emitter
	 *               - Pjax by MoOx @link https://github.com/MoOx/pjax
	 * script      : Specific script
	 *               - Barba @link http://barbajs.org/index.html
	 *
	 * Remember: array top level is converted to strings!
	 */
	$parms = array(
		'method'     => isset( $compat_options['method'] ) ? $compat_options['method'] : '',
		'script'     => isset( $compat_options['script'] ) ? $compat_options['script'] : '',
		'elementId'  => 'content',
		'attrName'   => 'data-pjax',
		'continuous' => true,
	);
	wp_localize_script( 'wpmtst-controller', 'strongControllerParms', $parms );

	/**
	 * Fonts
	 */
	wp_register_style( 'wpmtst-font-awesome',
		WPMTST_PUBLIC_URL . 'fonts/font-awesome-4.6.3/css/font-awesome.min.css',
		array(),
		'4.6.3' );

	/**
	 * Simple pagination
	 */
	wp_register_script( 'wpmtst-strong-pager',
		WPMTST_PUBLIC_URL . "js/lib/strongpager/jquery.strongpager{$min}.js",
		array( 'wpmtst-controller' ),
		false,
		true );

	/**
	 * View custom style
	 */
	wp_register_style( 'wpmtst-custom-style',
		WPMTST_PUBLIC_URL . 'css/custom.css' );

	/**
	 * imagesLoaded, if less than WordPress 4.6
	 */
	if ( ! wp_script_is( 'imagesloaded', 'registered' ) ) {
		wp_register_script( 'imagesloaded',
			WPMTST_PUBLIC_URL . 'js/lib/imagesloaded/imagesloaded.pkgd.min.js',
			array(),
			'3.2.0',
			true );
	}

	/**
	 * Masonry
	 */
	wp_register_script( 'wpmtst-masonry-script',
		WPMTST_PUBLIC_URL . 'js/masonry.js',
		array( 'jquery-masonry', 'imagesloaded', 'wpmtst-controller' ),
		$plugin_version,
		true );

	wp_register_style( 'wpmtst-masonry-style',
		WPMTST_PUBLIC_URL . 'css/masonry.css',
		array(),
		$plugin_version );

	/**
	 * Columns
	 */
	wp_register_style( 'wpmtst-columns-style',
		WPMTST_PUBLIC_URL . 'css/columns.css',
		array(),
		$plugin_version );

	/**
	 * Grid
	 */
	wp_register_script( 'wpmtst-grid-script',
		WPMTST_PUBLIC_URL . 'js/grid.js',
		array( 'jquery', 'wpmtst-controller' ),
		$plugin_version,
		true );

	wp_register_style( 'wpmtst-grid-style',
		WPMTST_PUBLIC_URL . 'css/grid.css',
		array(),
		$plugin_version );

	/**
	 * Ratings
	 */
	$deps = array();
	if ( isset( $options['load_font_awesome'] ) && $options['load_font_awesome'] ) {
		$deps = array( 'wpmtst-font-awesome' );
	}

	wp_register_style( 'wpmtst-rating-form',
		WPMTST_PUBLIC_URL . 'css/rating-form.css',
		$deps,
		$plugin_version );

	wp_register_style( 'wpmtst-rating-display',
		WPMTST_PUBLIC_URL . 'css/rating-display.css',
		$deps,
		$plugin_version );

	/**
	 * Form handling
	 */
	wp_register_script( 'wpmtst-validation-plugin',
		WPMTST_PUBLIC_URL . "js/lib/validate/jquery.validate{$min}.js",
		array( 'jquery' ),
		'1.16.0',
		true );

	wp_register_script( 'wpmtst-form-validation',
		WPMTST_PUBLIC_URL . "js/lib/form-validation/form-validation{$min}.js",
		array( 'wpmtst-validation-plugin', 'jquery-form', 'wpmtst-controller' ),
		$plugin_version,
		true );

	/**
	 * Localize jQuery Validate plugin.
	 *
	 * @since 1.16.0
	 */
	$locale = get_locale();
	if ( 'en_US' != $locale ) {
		$lang_parts = explode( '_', $locale );
		$lang_file  = 'js/lib/validate/localization/messages_' . $lang_parts[0] . '.min.js';
		if ( file_exists( WPMTST_PUBLIC . $lang_file ) ) {
			wp_register_script( 'wpmtst-validation-lang',
				WPMTST_PUBLIC_URL . $lang_file,
				array( 'wpmtst-validation-plugin' ),
				false,
				true );
		}
	}

	/**
	 * Honeypots
	 */
	wp_register_script( 'wpmtst-honeypot-before',
		WPMTST_PUBLIC_URL . 'js/honeypot-before.js',
		array( 'jquery' ),
		$plugin_version,
		true );

	wp_register_script( 'wpmtst-honeypot-after',
		WPMTST_PUBLIC_URL . 'js/honeypot-after.js',
		array( 'jquery' ),
		$plugin_version,
		true );

	/**
	 * Slider
	 */
	wp_register_script( 'jquery-actual',
		WPMTST_PUBLIC_URL . "js/lib/actual/jquery.actual{$min}.js",
		array( 'jquery' ),
		'1.0.16',
		true );

	wp_register_script( 'verge',
		WPMTST_PUBLIC_URL . "js/lib/verge/verge{$min}.js",
		array(),
		'1.10.2',
		true );

	wp_register_script( 'wpmtst-slider',
		WPMTST_PUBLIC_URL . "js/lib/strongslider/jquery.strongslider{$min}.js",
		array( 'jquery-actual', 'imagesloaded', 'underscore', 'verge' ),
		$plugin_version,
		true );

	/**
	 * Colorbox settings
	 */
	wp_register_script( 'wpmtst-colorbox',
		WPMTST_PUBLIC_URL . 'js/colorbox.js',
		array( 'jquery' ),
		$plugin_version,
		true );

}
add_action( 'wp_enqueue_scripts', 'wpmtst_scripts' );


/**
 * @param $tag
 * @param $handle
 *
 * @return mixed
 */
function wpmtst_defer_scripts( $tag, $handle ) {
	$scripts_to_defer = array(
		// layouts
		'wpmtst-grid-script',
		'wpmtst-masonry-script',
		// pagination
		'wpmtst-strong-pager',
		// form
		'wpmtst-validation-plugin',
		'wpmtst-validation-lang',
		'wpmtst-form-validation',
		// honeypots
		//'wpmtst-honeypot-before',
		//'wpmtst-honeypot-after',
		// slider
		'jquery-actual',
		'wpmtst-slider',
		// Colorbox
		'wpmtst-colorbox'
	);

	if ( in_array( $handle, $scripts_to_defer ) ) {
		return str_replace( ' src', ' defer src', $tag );
	}

	return $tag;
}
add_filter( 'script_loader_tag', 'wpmtst_defer_scripts', 10, 2 );

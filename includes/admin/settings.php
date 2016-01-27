<?php
/**
 * Settings
 *
 * @package Strong_Testimonials
 */

/**
 * Menus
 */
function wpmtst_settings_menu() {
	add_submenu_page( 'edit.php?post_type=wpm-testimonial',
		__( 'Views', 'strong-testimonials' ),  // page title
		__( 'Views', 'strong-testimonials' ),  // menu title
		'manage_options',
		'views',
		'wpmtst_views_admin' );

	add_submenu_page( 'edit.php?post_type=wpm-testimonial',
		apply_filters( 'wpmtst_fields_page_title', __( 'Fields', 'strong-testimonials' ) ),
		apply_filters( 'wpmtst_fields_menu_title', __( 'Fields', 'strong-testimonials' ) ),
		'manage_options',
		'fields',
		//'wpmtst_settings_custom_fields' );
		'wpmtst_form_admin' );

	add_submenu_page( 'edit.php?post_type=wpm-testimonial',
		__( 'Settings', 'strong-testimonials' ),
		__( 'Settings', 'strong-testimonials' ),
		'manage_options',
		'new-settings',
		'wpmtst_settings_page' );

	add_submenu_page( 'edit.php?post_type=wpm-testimonial',
		_x( 'Guide', 'noun', 'strong-testimonials' ),
		_x( 'Guide', 'noun', 'strong-testimonials' ),
		'manage_options',
		'guide',
		'wpmtst_guide' );
}
add_action( 'admin_menu', 'wpmtst_settings_menu' );

/**
 * Register settings
 */
function wpmtst_register_settings() {
	register_setting( 'wpmtst-settings-group', 'wpmtst_options',      'wpmtst_sanitize_options' );
	register_setting( 'wpmtst-form-group',     'wpmtst_form_options', 'wpmtst_sanitize_form' );
}
add_action( 'admin_init', 'wpmtst_register_settings' );

/**
 * Sanitize general settings
 *
 * @param $input
 *
 * @return mixed
 */
function wpmtst_sanitize_options( $input ) {

	//$input['per_page'] = (int) sanitize_text_field( $input['per_page'] );

	/**
	 * Store values as 0 or 1.
	 * Checked checkbox value is "on".
	 * Unchecked checkboxes are not submitted.
	 */
	/* LONGHAND
	if ( isset( $input['load_page_style'] ) ) {
		if ( 'on' == $input['load_page_style'] ) { // checked checkbox
			$new_input['load_page_style'] = 1;
		} else { // hidden input
			$new_input['load_page_style'] = $input['load_page_style']; // 0 or 1
		}
	} else { // unchecked checkbox
		$new_input['load_page_style'] = 0;
	}
	*/

	// shorthand

	//$input['load_page_style']   = !isset( $input['load_page_style'] ) ? 0 : ( 'on' == $input['load_page_style'] ? 1 : $input['load_page_style'] );

	//$input['load_widget_style'] = !isset( $input['load_widget_style'] ) ? 0 : ( 'on' == $input['load_widget_style'] ? 1 : $input['load_widget_style'] );

	//$input['load_form_style']   = !isset( $input['load_form_style'] ) ? 0 : ( 'on' == $input['load_form_style'] ? 1 : $input['load_form_style'] );

	//$input['load_rtl_style']    = !isset( $input['load_rtl_style'] ) ? 0 : ( 'on' == $input['load_rtl_style'] ? 1 : $input['load_rtl_style'] );

	$input['reorder']           = !isset( $input['reorder'] ) ? 0 : ( 'on' == $input['reorder'] ? 1 : $input['reorder'] );

	return $input;
}

/**
 * Sanitize form settings
 *
 * An unchecked checkbox is not posted.
 *
 * @since 1.13
 */
function wpmtst_sanitize_form( $input ) {
	$input['post_status']       = sanitize_text_field( $input['post_status'] );
	$input['admin_notify']      = isset( $input['admin_notify'] ) ? 1 : 0;
	$input['sender_name']       = sanitize_text_field( $input['sender_name'] );
	$input['sender_site_email'] = intval( $input['sender_site_email'] );
	$input['sender_email']      = sanitize_email( $input['sender_email'] );
	if ( ! $input['sender_email'] && ! $input['sender_site_email'] ) {
		$input['sender_site_email'] = 1;
	}

	/**
	 * Multiple recipients.
	 *
	 * @since 1.18
	 */
	$new_recipients = array();
	foreach ( $input['recipients'] as $recipient ) {

		if ( isset( $recipient['primary'] ) ) {
			$recipient['primary'] = 1;
			if ( isset( $recipient['admin_site_email'] ) && ! $recipient['admin_site_email'] ) {
				if ( ! $recipient['admin_email'] ) {
					$recipient['admin_site_email'] = 1;
				}
			}
		} else {
			// Don't save if both fields are empty.
			if ( ! isset( $recipient['admin_name'] ) && ! isset( $recipient['admin_email'] ) ) {
				continue;
			}
			if ( ! $recipient['admin_name'] && ! $recipient['admin_email'] ) {
				continue;
			}
		}

		if ( isset( $recipient['admin_name'] ) ) {
			$recipient['admin_name'] = sanitize_text_field( $recipient['admin_name'] );
		}

		if ( isset( $recipient['admin_email'] ) ) {
			$recipient['admin_email'] = sanitize_email( $recipient['admin_email'] );
		}

		$new_recipients[] = $recipient;

	}
	$input['recipients'] = $new_recipients;

	$input['default_recipient'] = maybe_unserialize( $input['default_recipient'] );
	$input['email_subject']     = isset( $input['email_subject'] ) ? sanitize_text_field( $input['email_subject'] ) : '';
	$input['email_message']     = isset( $input['email_message'] ) ? wp_kses_post( $input['email_message'] ) : '';
	$input['honeypot_before']   = isset( $input['honeypot_before'] ) ? 1 : 0;
	$input['honeypot_after']    = isset( $input['honeypot_after'] ) ? 1 : 0;
	$input['captcha']           = sanitize_text_field( $input['captcha'] );

	foreach ( $input['messages'] as $key => $message ) {
		$input['messages'][$key]['text'] = sanitize_text_field( $message['text'] );
	}

	return $input;
}

/**
 * Settings page
 */
function wpmtst_settings_page() {
	if ( ! current_user_can( 'manage_options' ) )
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	?>
	<div class="wrap wpmtst">

		<h2><?php _e( 'Testimonial Settings', 'strong-testimonials' ); ?></h2>

		<?php if( isset( $_GET['settings-updated'] ) ) : ?>
			<div id="message" class="updated notice is-dismissible">
				<p><strong><?php _e( 'Settings saved.' ) ?></strong></p>
			</div>
		<?php endif; ?>

		<?php
		$active_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : 'general';
		/**
		 * Using "new-settings" instead of previously used "settings" due to possible bug or conflict that shows the parent menu item of the first instance of any "settings" submenu as the current one. This first became apparent with the Popup Maker plugin. Need to debug further. 2-Jan-2016
		 */
		$url = admin_url( 'edit.php?post_type=wpm-testimonial&page=new-settings' )
		?>
		<h2 class="nav-tab-wrapper">
			<a href="<?php echo add_query_arg( 'tab', 'general', $url ); ?>" class="nav-tab <?php echo $active_tab == 'general' ? 'nav-tab-active' : ''; ?>"><?php _ex( 'General', 'adjective', 'strong-testimonials' ); ?></a>
			<a href="<?php echo add_query_arg( 'tab', 'form', $url ); ?>" class="nav-tab <?php echo $active_tab == 'form' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Form', 'strong-testimonials' ); ?></a>
		</h2>

		<form id="<?php echo $active_tab; ?>-form" method="post" action="options.php">
			<?php
			switch( $active_tab ) {
				case 'form' :
					settings_fields( 'wpmtst-form-group' );
					wpmtst_form_settings();
					break;
				default :
					settings_fields( 'wpmtst-settings-group' );
					include( 'settings/general.php' );
			}
			?>
			<p class="submit">
				<input id="submit" class="button button-primary" type="submit" value="<?php _e( 'Save Changes' ); ?>" name="submit">
			</p>
		</form>

	</div><!-- wrap -->
	<?php
}

function wpmtst_form_settings() {
	$form_options = get_option( 'wpmtst_form_options' );

	/**
	 * Build list of supported Captcha plugins.
	 *
	 * TODO - Move this to options array and add filter
	 */
	$plugins = array(
		'bwsmath' => array(
			'name'      => 'Captcha by BestWebSoft',
			'file'      => 'captcha/captcha.php',
			'settings'  => 'admin.php?page=captcha.php',
			'search'    => 'plugin-install.php?tab=search&s=Captcha',
			'url'       => 'http://wordpress.org/plugins/captcha/',
			'installed' => false,
			'active'    => false,
		),
		'miyoshi' => array(
			'name'      => 'Really Simple Captcha by Takayuki Miyoshi',
			'file'      => 'really-simple-captcha/really-simple-captcha.php',
			'search'    => 'plugin-install.php?tab=search&s=Really+Simple+Captcha',
			'url'       => 'http://wordpress.org/plugins/really-simple-captcha/',
			'installed' => false,
			'active'    => false,
		),
		'advnore' => array(
			'name'      => 'Advanced noCaptcha reCaptcha by Shamim Hasan',
			'file'      => 'advanced-nocaptcha-recaptcha/advanced-nocaptcha-recaptcha.php',
			'settings'  => 'admin.php?page=anr-admin-settings',
			'search'    => 'plugin-install.php?tab=search&s=Advanced+noCaptcha+reCaptcha',
			'url'       => 'http://wordpress.org/plugins/advanced-nocaptcha-recaptcha',
			'installed' => false,
			'active'    => false,
		),
	);

	foreach ( $plugins as $key => $plugin ) {

		if ( file_exists( WP_PLUGIN_DIR . '/' . $plugin['file'] ) )
			$plugins[ $key ]['installed'] = true;

		$plugins[ $key ]['active'] = is_plugin_active( $plugin['file'] );

		// If current Captcha plugin has been deactivated, disable Captcha
		// so corresponding div does not appear on front-end form.
		if ( $key == $form_options['captcha'] && !$plugins[ $key ]['active'] ) {
			$form_options['captcha'] = '';
			update_option( 'wpmtst_form_options', $form_options );
		}

	}

	include( 'settings/form.php' );
}

/**
 * [Restore Default Messages] Ajax receiver
 *
 * @since 1.13
 */
function wpmtst_restore_default_messages_function() {
	// hard restore from file
	include_once WPMTST_INC . 'defaults.php';
	$default_form_options = wpmtst_get_default_form_options();
	$messages = $default_form_options['messages'];
	echo json_encode( $messages );
	die();
}
add_action( 'wp_ajax_wpmtst_restore_default_messages', 'wpmtst_restore_default_messages_function' );

/**
 * [Restore Default] for single message Ajax receiver
 *
 * @since 1.13
 */
function wpmtst_restore_default_message_function() {
	$input = $_REQUEST['field'];
	// hard restore from file
	include_once WPMTST_INC . 'defaults.php';
	$default_form_options = wpmtst_get_default_form_options();
	$message = $default_form_options['messages'][$input];
	echo json_encode( $message );
	die();
}
add_action( 'wp_ajax_wpmtst_restore_default_message', 'wpmtst_restore_default_message_function' );

/**
 * Update WPML string translations.
 *
 * @param $oldvalue
 * @param $newvalue
 */
function wpmtst_on_update_form_options( $oldvalue, $newvalue ) {
	$form_options = get_option( 'wpmtst_form_options' );
	if ( ! $form_options ) return;

	wpmtst_form_messages_wpml( $form_options['messages'] );
	wpmtst_form_options_wpml( $form_options );
}
add_action( 'update_option_wpmtst_form_options', 'wpmtst_on_update_form_options', 10, 2 );

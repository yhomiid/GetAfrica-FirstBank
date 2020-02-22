<?php

/**
 * Class that handle all admin notices
 *
 * @since      1.3.1
 * @package    SocialPopup
 * @subpackage SocialPopup/Admin/Includes
 * @author     Damian Logghe <info@timersys.com>
 */
class SocialPopup_Notices {


	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.3.1
	 */
	public function __construct( ) {

		if( isset( $_GET['spu_notice'])){
			update_option('spu_'.esc_attr($_GET['spu_notice']), true);
		}
	}


	public function rate_plugin(){
		?><div class="notice-info notice">
		<h3><i class=" dashicons-before dashicons-share-alt"></i>WordPress Popups Plugin</h3>
			<p><?php echo sprintf(__( 'We noticed that you have been using our plugin for a while and we would like to ask you a little favour. If you are happy with it and can take a minute please <a href="%s" target="_blank">leave a nice review</a> on WordPress. It will be a tremendous help for us!', 'spu' ), 'https://wordpress.org/support/view/plugin-reviews/popups?filter=5' ); ?></p>
		<ul>
			<li><?php echo sprintf(__('<a href="%s" target="_blank">Leave a nice review</a>'),'https://wordpress.org/support/view/plugin-reviews/popups?filter=5');?></li>
			<li><?php echo sprintf(__('<a href="%s">I already did</a>'), admin_url('?spu_notice=rate_plugin'));?></li>
		</ul>
		</div><?php
	}

	public static function pair_plugins(){
		?><div class="notice-info error">
		<h3><i class=" dashicons-before dashicons-share-alt"></i>WordPress Popups Plugin error</h3>
		<p><?php _e('The Popups premium was automatically deactivated.', 'spu');?></p>
		<p><?php _e( 'Your current version of Popups premium it\'s not compatible with the core Popups plugin you just installed/updated. Please upgrade your premium version to at least 1.9.1 or downgrade the core version to 1.7.3 .', 'spu' ); ?></p>
		<p><a href="<?= admin_url('?spu_notice=pair_plugins_dismiss');?>" class="button-primary"><?php _e('Dismiss','spu');?></a></p>
		</div><?php
	}
}

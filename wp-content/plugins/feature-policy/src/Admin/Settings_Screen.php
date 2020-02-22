<?php
/**
 * Class Google\WP_Feature_Policy\Admin\Settings_Screen
 *
 * @package   Google\WP_Feature_Policy
 * @copyright 2019 Google LLC
 * @license   GNU General Public License, version 2
 * @link      https://wordpress.org/plugins/feature-policy/
 */

namespace Google\WP_Feature_Policy\Admin;

use Google\WP_Feature_Policy\Features;
use Google\WP_Feature_Policy\Feature;
use Google\WP_Feature_Policy\Policies_Setting;

/**
 * Class for the admin settings screen to control feature policies.
 *
 * @since 0.1.0
 */
class Settings_Screen {

	/**
	 * The admin page slug.
	 *
	 * @since 0.1.0
	 * @var string
	 */
	const SLUG = 'feature_policy_settings';

	/**
	 * The admin page parent slug.
	 *
	 * @since 0.1.0
	 * @var string
	 */
	const PARENT_SLUG = 'options-general.php';

	/**
	 * The capability required to access the admin screen.
	 *
	 * @since 0.1.0
	 * @var string
	 */
	const CAPABILITY = 'manage_feature_policy';

	/**
	 * Features controller instance.
	 *
	 * @since 0.1.0
	 * @var Features
	 */
	protected $features;

	/**
	 * Feature policies setting instance.
	 *
	 * @since 0.1.0
	 * @var Policies_Setting
	 */
	protected $policies_setting;

	/**
	 * Constructor.
	 *
	 * @since 0.1.0
	 *
	 * @param Features         $features         Features controller instance.
	 * @param Policies_Setting $policies_setting Feature policies setting instance.
	 */
	public function __construct( Features $features, Policies_Setting $policies_setting ) {
		$this->features         = $features;
		$this->policies_setting = $policies_setting;
	}

	/**
	 * Registers the menu item for the admin screen.
	 *
	 * @since 0.1.0
	 */
	public function register_menu() {
		$hook_suffix = add_submenu_page(
			self::PARENT_SLUG,
			__( 'Feature Policy Settings', 'feature-policy' ),
			__( 'Feature Policy', 'feature-policy' ),
			self::CAPABILITY,
			self::SLUG,
			array( $this, 'render' )
		);
		add_action(
			"load-{$hook_suffix}",
			function() {
				$this->add_settings_ui();
			}
		);
	}

	/**
	 * Renders the admin screen.
	 *
	 * @since 0.1.0
	 */
	public function render() {
		?>
		<style type="text/css">
			.external-link > .dashicons {
				font-size: 16px;
				text-decoration: none;
			}

			.external-link:hover > .dashicons,
			.external-link:focus > .dashicons {
				text-decoration: none;
			}
		</style>
		<div class="wrap">
			<h1 class="wp-heading-inline">
				<?php esc_html_e( 'Feature Policy Settings', 'feature-policy' ); ?>
			</h1>
			<?php
			if ( class_exists( 'Google\WP_Reporting_API\Plugin' ) ) {
				echo ' <a href="' . esc_url( add_query_arg( 'type', 'feature-policy-violation', \Google\WP_Reporting_API\Plugin::instance()->reports_screen_url() ) ) . '" class="page-title-action">' . esc_html__( 'View Violation Reports', 'feature-policy' ) . '</a>';
			}
			?>
			<hr class="wp-header-end">

			<p>
				<?php esc_html_e( 'Feature Policy grants you control over how certain browser APIs and web features act on your site.', 'feature-policy' ); ?>
				<?php
				printf(
					'<a class="external-link" href="%1$s" target="_blank">%2$s<span class="screen-reader-text"> %3$s</span><span aria-hidden="true" class="dashicons dashicons-external"></span></a>',
					esc_url( _x( 'https://developers.google.com/web/updates/2018/06/feature-policy', 'learn more link', 'feature-policy' ) ),
					esc_html__( 'Learn more about Feature Policy', 'feature-policy' ),
					/* translators: accessibility text */
					esc_html__( '(opens in a new tab)', 'feature-policy' )
				);
				?>
			</p>

			<form action="options.php" method="post" novalidate="novalidate">
				<?php settings_fields( self::SLUG ); ?>
				<?php do_settings_sections( self::SLUG ); ?>
				<?php submit_button(); ?>
			</form>
		</div>
		<?php
	}

	/**
	 * Adds settings sections and fields.
	 *
	 * @since 0.1.0
	 */
	protected function add_settings_ui() {
		add_settings_section( 'default', '', null, self::SLUG );

		$features = $this->features->get_all();
		$option   = $this->policies_setting->get();

		foreach ( $features as $feature ) {
			add_settings_field(
				$feature->name,
				$feature->title,
				function( $args ) use ( $feature, $option ) {
					$origin = isset( $option[ $feature->name ] ) ? $option[ $feature->name ][0] : $feature->default_origin;
					$this->render_field( $feature, $origin );
				},
				self::SLUG,
				'default',
				array( 'label_for' => $feature->name )
			);
		}
	}

	/**
	 * Renders the UI field for determining the status of a feature policy.
	 *
	 * @since 0.1.0
	 *
	 * @param Feature $feature Feature definition.
	 * @param string  $origin  Origin set for the feature policy.
	 */
	protected function render_field( Feature $feature, $origin ) {
		$choices = array(
			Feature::ORIGIN_ANY  => __( 'Any', 'feature-policy' ),
			Feature::ORIGIN_SELF => __( 'Self', 'feature-policy' ),
			Feature::ORIGIN_NONE => __( 'None', 'feature-policy' ),
		);

		?>
		<select id="<?php echo esc_attr( $feature->name ); ?>" name="<?php echo esc_attr( Policies_Setting::OPTION_NAME . '[' . $feature->name . '][]' ); ?>">
			<?php
			foreach ( $choices as $value => $label ) {
				?>
				<option value="<?php echo esc_attr( $value ); ?>"<?php selected( $origin, $value ); ?>>
					<?php echo esc_html( $label ); ?>
					<?php if ( $value === $feature->default_origin ) : ?>
						<?php esc_html_e( '(default)', 'feature-policy' ); ?>
					<?php endif; ?>
				</option>
				<?php
			}
			?>
		</select>
		<?php
	}
}

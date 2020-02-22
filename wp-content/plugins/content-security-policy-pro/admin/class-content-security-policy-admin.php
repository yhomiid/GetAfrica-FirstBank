<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://lakshman.com.np
 * @since      1.0.0
 *
 * @package    Lakshman_Content_Security_Policy
 * @subpackage Lakshman_Content_Security_Policy/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Content_Security_Policy
 * @subpackage Content_Security_Policy/admin
 * @author     Laxman Thapa <thapa.laxman@gmail.com>
 */
class Lakshman_Content_Security_Policy_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles($hook) {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Content_Security_Policy_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Content_Security_Policy_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
	    $pageName = 'toplevel_page_'.$this->plugin_name.'/options';
	    //echo "<script>console.log('{$hook}')</script>";
	    //echo "<script>console.log('{$pageName}')</script>";
	    if($hook == $pageName){
	        wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/content-security-policy-admin.css', array(), $this->version, 'all' );
	    }
	    
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts($hook) {
	    
	    $pageName = 'toplevel_page_'.$this->plugin_name.'/options';
	    //echo "<script>console.log('{$hook}')</script>";
	    //echo "<script>console.log('{$pageName}')</script>";

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Content_Security_Policy_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Content_Security_Policy_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

	    if($hook == $pageName){ 
    	    wp_enqueue_script( $this->plugin_name.'-jquery', plugin_dir_url( __FILE__ ) . 'js/vendors/jquery-1.10.2.min.js', null, $this->version, false );
    	    wp_enqueue_script( $this->plugin_name.'-typeahead', plugin_dir_url( __FILE__ ) . 'js/vendors/typeahead.bundle.js', null, $this->version, false );
    	    wp_enqueue_script( $this->plugin_name.'-bootstrap', plugin_dir_url( __FILE__ ) . 'js/vendors/bootstrap.min.js', null, $this->version, false );
    	    wp_enqueue_script( $this->plugin_name.'-bootstrap-tagsinput', plugin_dir_url( __FILE__ ) . 'js/vendors/bootstrap-tagsinput.js', null, $this->version, false );
    		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/content-security-policy-admin.js', array( 'jquery' ), $this->version, false );
	    }		

	}
	
	
	public function createAdmminMenu()
	{
	    add_menu_page( 'WP Content Security Policy Pro', 'WP CSP', 'manage_options', $this->plugin_name.'/options.php', [$this, 'wpAdminOptionsPage'], 'dashicons-tickets'  );
	}
	
	public function wpAdminOptionsPage(){
	    //delete_option('wp_csp_val');
	    $cspResources = Lakshman_Content_Security_Policy_Resources::getResources();
	    if(isset($_POST['save-wp-csp'])){
    	    $posts = $_POST;
    	    
    	    //$resourcesKeys = array_keys($resources);
    	    $cspRules = array_intersect_key($posts, $cspResources);
    	    
    	    foreach ($cspRules as &$cspRule){
    	        $cspRule = filter_var($cspRule, FILTER_SANITIZE_URL);
    	    }
    	    
    	    update_option('wp_csp_val', $cspRules);
	    }
	    $cspRules = (get_option('wp_csp_val')) ? : array();
	    
	    if(!is_array($cspRules)){
	        $cspRules = array();
	    }else{
	       $cspRules = array_filter($cspRules);
	    }
	    
	    include_once 'partials/content-security-policy-admin-display.php';
	}
	
	

}

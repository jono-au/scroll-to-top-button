<?php
if ( ! defined('ABSPATH')) exit;
/**
 * Plugin Name:       Scroll Button
 * Plugin URI:        https://jonochan.com.au/wp-content/plugins/scroll-button/
 * Description:       A simple button to smooth scroll to the top of the webpage.
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Jonathan Chan
 * Author URI:        https://jonochan.com.au/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://jonochan.com.au/wp-content/plugins/scroll-button/
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */

class WpScrollButton 
{
    public $plugings_url = "";

    public function __construct()
    {
        // Plugin activated
        if (function_exists('register_activation_hook')) {
            register_activation_hook(__FILE__, array($this, 'activationHook') );
        }

        // Plugin deactivated 
        if (function_exists('register_deactivation_hook')) {
            register_deactivation_hook( __FILE__, array($this, 'deactivationHook') );
        }

        //Plugin is deleted 
        if (function_exists('register_uninstall_hook')) {
            register_uninstall_hook( __FILE__, $this, 'unistallHook');
        }

        //header hook
        add_action('wp_head', array($this, 'filter_header'));

        //footer hook
        add_action('wp_footer', array($this, 'filter_footer'));

        //init 
        add_action('init' , array($this, 'init'));

        //register admin menu
        add_action('admin_menu' , array($this, 'scroll_button_settings'));


        //color picker
        add_action( 'admin_enqueue_scripts', 'mw_enqueue_color_picker' );

        function mw_enqueue_color_picker( $hook_suffix ) {
                // first check that $hook_suffix is appropriate for your admin page
                wp_enqueue_style( 'wp-color-picker' );
                wp_enqueue_script( 'my-script-handle', plugins_url('/js/my-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
            }

        
    }

    //init
    public function init(){
        $this->plugins_url = untrailingslashit(plugins_url('', __FILE__));
    }

    //Activate
    public function activationHook(){
        //Input background color of the button
        if (! get_option('scroll_button_color')){
            update_option('scroll_button_color', 'red');
        }
        //Input speed 
        if (! get_option('scroll_button_speed')){
            update_option('scroll_button_speed', 'slow');
        }
    }

    //Deactivate 
    public function deactivationHook(){
        // delete_option('scroll_button_color');
        // delete_option('scroll_button_speed');
    }

    //Deleted 

    public function uninstallHook(){
        delete_option('scroll_button_color');
        delete_option('scroll_button_speed');
    }

    //Inset stylesheet head section
    public function filter_header(){
        include(sprintf("%s/css/scroll-button.php", dirname(__FILE__)));

        wp_enqueue_script('jquery');
        //wp_enqueue_script('to-top-button.php', $this->plugins_url.'js/to-top-button.php', array());
        include(sprintf("%/js/to-top-button.php", dirname(__FILE__)));
    }

    

    // Echo 'scroll button' footer section
    public function filter_footer(){
        ?>
            <div id="To_top_animate" class="button-scroll"><a href="#" >▲</a></div>
        <?php
    }

      //add menu
      public function scroll_button_settings()
      {
        add_menu_page(
            'Scroll Button',
            'Scroll Menu',
            'manage_options',
            'scroll_button',
            array( __CLASS__, 'scroll_button_markup' ),
            'dashicons-arrow-up',
            100
        );
    }


      //menu callback markup
    public static function scroll_button_markup() {
        include(sprintf("%s/admin/admin.php", dirname(__FILE__)));
    }

}

   
      



 

$ScrollButton = new WpScrollButton();


?>
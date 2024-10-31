<?php
/*
Plugin Name: Odins Weather Viewer
Plugin URI: http://www.oderkerk.de/odins-weather-viewer/ ‎
Description: Showing actual weather data from a clientraw.txt file of your choice
Version: 1.0
Author: Marco Oderkerk
Author URI: http://www.oderkerk.de
License: MIT
Text Domain: Odins-Weather-Viewer
Domain Path: /languages
*/
/*
The MIT License (MIT)

Copyright (c) 2014 Marco Oderkerk (email: OdinsWeatherViewer@oderkerk.de)

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/
/*
 *	Assign global variables
 *
*/
//$plugin_url = dirname( plugin_basename( __FILE__ )) ;
$options = array();
//$display_json = false;

/*
function odins_weather_viewer_activate() {
        chmod("/img/1406463100_Black_Night_Cloud.png", 0755); 
        chmod("/img/1406463102_Black_Partly_Sunny.png", 0755); 
        chmod("/img/1406463103_Black_Hail.png", 0755); 
        chmod("/img/1406463105_Black_Snow.png", 0755); 
        chmod("/img/1406463106_Black_Night_Rain.png", 0755); 
        chmod("/img/1406463107_Black_Cold.png", 0755); 
        chmod("/img/1406463109_Black_Night_Clear.png", 0755); 
        chmod("/img/1406463111_Black_Cloud.png", 0755); 
        chmod("/img/1406463113_Black_Storm.png", 0755); 
        chmod("/img/1406463114_Black_Clouds.png", 0755); 
        chmod("/img/1406463115_Black_Sunny_Rain.png", 0755); 
        chmod("/img/1406463116_Black_Rain.png", 0755); 
        chmod("/img/1406463118_Black_Hot.png", 0755); 
        chmod("/img/1406463119_Black_Sun.png", 0755); 
        chmod("/img/1406463121_681178-Black_Thunderstorm.png", 0755); 
        chmod("/img/11406551975_519926-24_Cloud_Fog.png", 0755); 
        chmod("/img/1406560283_weather-windy.png", 0755); 
        chmod("/img/1406560538_weather-severe-alert.png", 0755); 
        
}
register_activation_hook( __FILE__, 'odins_weather_viewer_activate' );*/
function odins_weather_viewer_menu() {

	/*
	 * 	Use the add_options_page function
	 * 	add_options_page( $page_title, $menu_title, $capability, $menu-slug, $function ) 
	 *
	*/

	add_options_page(
		'Odins Weather Viewer',
		'Odins Weather Viewer',
		'manage_options',
		'odins_weather_viewer',
		'odins_weather_viewer_options_page'
	);

}
add_action( 'admin_menu', 'odins_weather_viewer_menu' );

/**
 * Option page init and display
 * @global string $plugin_url
 * @global type $options
 * @global boolean $display_json
 */
function odins_weather_viewer_options_page() {
        
	if( !current_user_can( 'manage_options' ) ) {

		wp_die( esc_html_e('You do not have suggicient permissions to access this page.', 'Odins-Weather-Viewer' ));

	}

	//global $plugin_url;
	global $options;
	//global $display_json;
       //echo (plugins_url( '/css/odins_weather_viewer.min.css',__FILE__ ));
	if( isset( $_POST['odins_weather_viewer_form_submitted'] ) ) {
          
		$hidden_field = esc_html( $_POST['odins_weather_viewer_form_submitted'] );
                
		if( $hidden_field == 'Y' ) {

			$odins_weather_viewer_url = esc_html( $_POST['odins_weather_viewer_url'] );
                        $options['odins_weather_viewer_url']        = $odins_weather_viewer_url;
			$options['last_updated']                    = time();
                        update_option( 'odins_weather_viewer', $options ) ;
                        $okmeldung = '<div class="updated" ><p>' .esc_html__("Settings saved", "Odins-Weather-Viewer" ) .' </p></div>';
                        echo ($okmeldung);                      
		}
	}
	$options = get_option( 'odins_weather_viewer' );
	if( $options != '' ) {
		$odins_weather_viewer_url = $options['odins_weather_viewer_url'];		
	}
	require( 'inc/option-page-wrapper.php' );
}
/**
 * register backend sytles
 */
function odins_weather_viewer_backend_styles() {

	wp_enqueue_style( 'odins_weather_viewer_backend_css', plugins_url( '/css/odins_weather_viewer.min.css',__FILE__ ) );

}
add_action( 'admin_head', 'odins_weather_viewer_backend_styles' );
/**
 * register  frontend scripts und styles
 */
function odins_weather_viewer_frontend_scripts_and_styles() {

	wp_enqueue_style( 'odins_weather_viewer_frontend_css', plugins_url( '/css/odins_weather_viewer.min.css',__FILE__ ) ); 
        wp_enqueue_script( 'odins_weather_viewer_frontend_js', plugins_url( '/odins_weather_viewer.js',__FILE__ ), array('jquery'), '', true );
}
add_action( 'wp_enqueue_scripts', 'odins_weather_viewer_frontend_scripts_and_styles' );
/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function odins_weather_viewer_load_textdomain() {
     load_plugin_textdomain( 'Odins-Weather-Viewer', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' ); 
}
add_action( 'init', 'odins_weather_viewer_load_textdomain' );
/*
 *  Shotcodes for displaying the weather data.
 */
require_once 'inc/shortcodes.php';
?>
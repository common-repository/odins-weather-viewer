<?php
/*
Copyright 2014  Marco Oderkerk (email: OdinsWeatherViewer@oderkerk.de)
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.
 * 
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
 * 
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
//[OWV_DASHBOARD]
function OWV_Dashbord_func( $atts , $content = null){
	global $post;
	extract( shortcode_atts( array(
		'update' => 'J'
	), $atts ) );
        
	$options = get_option( 'odins_weather_viewer' );        
        
	include_once("generateConfig.php");
        
	ob_start();
        
	require( 'front-end.php' );
 
	$content = ob_get_clean();
        
	return $content;

}
add_shortcode( 'OWV_DASHBOARD', 'OWV_Dashbord_func' );


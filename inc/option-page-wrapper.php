<?php
/*
Copyright 2014  Marco Oderkerk (email: OdinsWeatherViewer@oderkerk.de)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
?>

<div class="wrap">	
	<div id="icon-options-general" class="icon32"></div>
        <h2>Odins weather viewer</h2>
	<div id="poststuff">	
		<div id="post-body" class="metabox-holder columns-2">		
			<!-- main content -->
			<div id="post-body-content">
				
				<div class="meta-box-sortables ui-sortable">

					<?php if( !isset( $odins_weather_viewer_url ) || $odins_weather_viewer_url == '' ): ?>

					<div class="postbox">
					
						<h3><span><?php esc_html_e( "URL Settings!", 'Odins-Weather-Viewer' );?></span></h3>
                                                
						<div class="inside">
							<h4><span><?php esc_html_e( "Please enter the url for the clientraw.txt file you like to use and lets go.", 'Odins-Weather-Viewer' );?></span></h4>
							<form name="odins_weather_viewer_form" method="post" action="">							

							<input type="hidden" name="odins_weather_viewer_form_submitted" value="Y">

							<table class="form-table">
								<tr>
									<td>
                                                                            <label for="odins_weather_viewer_url"><?php esc_html_e( "URL to clientraw.txt", 'Odins-Weather-Viewer' );?></label>
									</td>
									<td>
										http://<input name="odins_weather_viewer_url" id="odins_weather_viewer_url" type="text" value="" class="regular-text" />
									</td>
								</tr>                                                              
							</table>

							<p>
								<input class="button-primary" type="submit" name="odins_weather_viewer_form" value="Save" /> 
							</p>

							</form>

						</div> <!-- .inside -->
					
					</div> <!-- .postbox -->
                                        <?php endif; ?>
                                        <div class="meta-box-sortables">
					<?php if( isset( $odins_weather_viewer_url ) && $odins_weather_viewer_url != '' ): ?>

					<div class="postbox">
					  <h3><span><?php esc_html_e( "URL Settings!", 'Odins-Weather-Viewer' );?></span></h3>
                                           
						<div class="inside">
						<h4><span><?php esc_html_e( "Please enter the url for the clientraw.txt file you like to use and lets go.", 'Odins-Weather-Viewer' );?></span></h4>
						<form name="odins_weather_viewer_form" method="post" action="">							

							<input type="hidden" name="odins_weather_viewer_form_submitted" value="Y">

							<table class="form-table">
								<tr>
									<td>
										<label for="odins_weather_viewer_url"><?php esc_html_e( "URL to clientraw.txt", 'Odins-Weather-Viewer' );?></label>
									</td>
									<td>
										http://<input name="odins_weather_viewer_url" id="odins_weather_viewer_url" type="text" value="<?php echo $odins_weather_viewer_url; ?>" class="regular-text" />
									</td>
								</tr>
                                         
							</table>

							<p>
								<input class="button-primary" type="submit" name="odins_weather_viewer_form" value="Save" /> 
							</p>

							</form>
                                                 <div><!-- .inside -->			
					</div> <!-- .postbox -->		
					<?php endif; ?>
				</div> <!-- .meta-box-sortables .ui-sortable -->		
			</div> <!-- post-body-content -->		
		</div> <!-- #post-body .metabox-holder .columns-2 -->	
		<br class="clear">
	</div> <!-- #poststuff -->	
</div> <!-- .wrap -->
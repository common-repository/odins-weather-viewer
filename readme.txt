=== Odins Weather Viewer ===
Contributors: MOderkerk
Tags: Weather,wd clientraw.txt, wd clientraw
Requires at least: 3.8
Tested up to: 3.9.2
Stable tag: trunk
License: MIT
License URI: http://opensource.org/licenses/MIT

Showing weather data from server of your choice, which is providing the data as a WD clientraw.txt.

== Description ==
This Plugin allows you to insert a little weather dashboard with the weatherdata of a server of your choice, which offers access to the clientraw.txt file. 
In this early version of the plugin a  schortcut is used to place it on a page or post of your choice.

At the time, the following data will be displayed :

  - An Icon of the current weather situation.
  - Temperature in °C	 
  - Barometer in hPa	 
  - Avg windspeed in kts 
  - Gusts in kts	 
  - Winddirection	 
  - Humidity in %	 
  - Rainrate in mm	 
  - Max. rainrate in mm	 
  - Daily rain in mm	

If the visitor stays on the page or post, the data will be updated every 120 seconds (depending of the update-frequence
of the delivering server).

At the time, the following languages ​​are supported:

English, german and dutch

Special thanks to 
 Yannick Lung  https://www.iconfinder.com 
 Mister J https://www.iconfinder.com
 New Moon https://www.iconfinder.com
 Gregor Cresnar https://www.iconfinder.com 
for the images.


== Installation ==
1. Upload the plugin to the `/wp-content/plugins/` directory 
2. Activate the plugin through the \'Plugins\' menu in WordPress
3. Go to Settings-> Odins Weather Viewer and enter an url to a clientraw.txt file (for testing the plugin you can take mine : wetter.oderkerk.de/clientraw.txt)
4. Place the [OWV_DASHBOARD] shortcode on a page or post.
 
or you can use the installtion function in the wp admin area. Simple search for the plugin and click on install.
After that go on with point 3.

== Frequently Asked Questions ==
see Plugin-Website

== Screenshots ==
1. Adminscreen
2. Dashboard

== Changelog ==
1.0 First Release

== Upgrade Notice ==
none Upgrades deployed yet
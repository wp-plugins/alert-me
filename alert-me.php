<?php
/*
Plugin Name: Alert Me!
Version: 0.2.4
Plugin URI: http://getbutterfly.com/wordpress-plugins/wordpress-alert-me/
Description: Alert me with a nice message! Just like that!
Author: Ciprian Popescu
Author URI: http://getbutterfly.com/

Copyright 2012, 2013, 2014 Ciprian Popescu (email: getbutterfly@gmail.com)

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

 * Usage: [alert type="info"]Alert here![/alert]
 * Usage: [alert type="success"]Alert here![/alert]
 * Usage: [alert type="warning"]Alert here![/alert]
 * Usage: [alert type="error"]Alert here![/alert]
 */

define('AM_PLUGIN_URL', WP_PLUGIN_URL . '/' . dirname(plugin_basename(__FILE__)));

function alert_me($atts, $content = null) {
	extract(shortcode_atts(array(
		'type' => '',
	), $atts));

	return '<div class="am_' . $type . '">' . $content . '</div>';
}

add_shortcode('alert', 'alert_me');

function am_styles() {
	echo '<style>.am_error,.am_info,.am_success,.am_warning{font-family:inherit;font-weight:400;border-left:3px solid;margin:10px 0;padding:15px 10px 15px 50px;background-repeat:no-repeat;background-position:10px center;-webkit-box-shadow:0 1px 2px rgba(0,0,0,.1);-moz-box-shadow:0 1px 2px rgba(0,0,0,.1);box-shadow:0 1px 2px rgba(0,0,0,.1)}.am_error:hover,.am_info:hover,.am_success:hover,.am_warning:hover{filter:grayscale(100%);-webkit-filter:grayscale(100%);-moz-filter:grayscale(100%);-ms-filter:grayscale(100%);-o-filter:grayscale(100%)}.am_info{color:#00529B;background-color:#BDE5F8;background-image:url("' . AM_PLUGIN_URL . '/images/info.png")}.am_success{color:#4F8A10;background-color:#DFF2BF;background-image:url("' . AM_PLUGIN_URL . '/images/success.png")}.am_warning{color:#9F6000;background-color:#FEEFB3;background-image:url("' . AM_PLUGIN_URL . '/images/warning.png")}.am_error{color:#D8000C;background-color:#FFBABA;background-image:url("' . AM_PLUGIN_URL . '/images/error.png")}</style>';
}

add_action('wp_head', 'am_styles');
?>

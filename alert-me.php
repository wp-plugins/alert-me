<?php
/*
Plugin Name: Alert Me!
Version: 0.2.7
Plugin URI: http://getbutterfly.com/wordpress-plugins/wordpress-alert-me/
Description: Alert me with a nice message! Just like that!
Author: Ciprian Popescu
Author URI: http://getbutterfly.com/

Copyright 2012, 2013, 2014, 2015 Ciprian Popescu (email: getbutterfly@gmail.com)

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

 * Usage: [alert type="info"]Info here![/alert]
 * Usage: [alert type="success"]Success here![/alert]
 * Usage: [alert type="warning"]Warning here![/alert]
 * Usage: [alert type="error"]Error here![/alert]
 * Usage: [alert type="note"]Note here![/alert]
 */

add_action('wp_enqueue_scripts', 'alert_me_enqueue_scripts');
function alert_me_enqueue_scripts($hook_suffix) {
    wp_enqueue_style('fa', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
	wp_enqueue_style('gbam', plugins_url('css/alerts.css', __FILE__));
}

function alert_me($atts, $content = null) {
	extract(shortcode_atts(array(
		'type' => '',
	), $atts));

	return '<div class="am_' . $type . '">' . $content . '</div>';
}

add_shortcode('alert', 'alert_me');
?>

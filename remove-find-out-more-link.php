<?php
/**
 * Plugin Name: The Events Calendar — Remove "Find Out More" Link
 * Description: Removes The Events Calendar's "Find Out More" links from event list-style views.
 * Version: 1.0.0
 * Author: Modern Tribe, Inc.
 * Author URI: http://m.tri.be/1x
 * License: GPLv2 or later
 */

defined( 'WPINC' ) or die;

function tribe_events_remove_read_more_links() {
	?><style>.tribe-events-read-more { display: none !important; }</style><?php 
}

add_action( 'tribe_events_before_template', 'tribe_events_remove_read_more_links' );

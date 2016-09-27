<?php
/**
 * Plugin Name: The Events Calendar Extension: Remove "Find Out More" Link
 * Description: Removes The Events Calendar's "Find Out More" links from event list-style views.
 * Version: 1.0.0
 * Author: Modern Tribe, Inc.
 * Author URI: http://m.tri.be/1971
 * License: GPLv2 or later
 */

defined( 'WPINC' ) or die;

class Tribe__Extension__Remove_Find_Out_More_Link {

    /**
     * The semantic version number of this extension; should always match the plugin header.
     */
    const VERSION = '1.0.0';

    /**
     * Each plugin required by this extension
     *
     * @var array Plugins are listed in 'main class' => 'minimum version #' format
     */
    public $plugins_required = array(
        'Tribe__Events__Main' => '4.2'
    );

    /**
     * The constructor; delays initializing the extension until all other plugins are loaded.
     */
    public function __construct() {
        add_action( 'plugins_loaded', array( $this, 'init' ), 100 );
    }

    /**
     * Extension hooks and initialization; exits if the extension is not authorized by Tribe Common to run.
     */
    public function init() {

        // Exit early if our framework is saying this extension should not run.
        if ( ! function_exists( 'tribe_register_plugin' ) || ! tribe_register_plugin( __FILE__, __CLASS__, self::VERSION, $this->plugins_required ) ) {
            return;
        }

        add_action( 'tribe_events_before_template', array( $this, 'remove_read_more_links' ) );
    }

    /**
     * Removes The Events Calendar's "Find Out More" links from event list-style views.
     */
    public function remove_read_more_links() {
        ?><style>.tribe-events-read-more { display: none !important; }</style><?php 
    }
}

new Tribe__Extension__Remove_Find_Out_More_Link();

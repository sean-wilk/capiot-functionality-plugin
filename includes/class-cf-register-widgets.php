<?php
/**
 * Register Custom Taxonomies
 *
 * @package     CF
 * @subpackage  CF/includes
 * @copyright   Copyright (c) 2019, Sean Wilkinson
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.0
 */

class CF_Register_Widgets {

    /**
     * Initialize the class
     */
    public function __construct() {
        add_action( 'init', array( $this, 'capiot_footer_widgets' ) );
    }

    /**
     * Register Footer Widgets
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function capiot_footer_widgets() {

        // First footer widget area, located in the footer. Empty by default.
        register_sidebar(array(
            'name' => __('First Footer Widget Area', 'capiot'),
            'id' => 'first-footer-widget-area',
            'description' => __('Place desired content here using text block', 'capiot'),
            'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h5 class="widget-title">',
            'after_title' => '</h4>',
        ));

        // Second Footer Widget Area, located in the footer. Empty by default.
        register_sidebar(array(
            'name' => __('Second Footer Widget Area', 'capiot'),
            'id' => 'second-footer-widget-area',
            'description' => __('Place desired content here using text block', 'capiot'),
            'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h5 class="widget-title">',
            'after_title' => '</h4>',
        ));

        // Third Footer Widget Area, located in the footer. Empty by default.
        register_sidebar(array(
            'name' => __('Third Footer Widget Area', 'capiot'),
            'id' => 'third-footer-widget-area',
            'description' => __('Place desired content here using text block', 'capiot'),
            'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
        ));

        // Fourth Footer Widget Area, located in the footer. Empty by default.
        register_sidebar(array(
            'name' => __('Fourth Footer Widget Area', 'capiot'),
            'id' => 'fourth-footer-widget-area',
            'description' => __('Place desired content here using text block', 'capiot'),
            'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
        ));

        // Fifth Footer Widget Area, located in the footer. Empty by default.
        register_sidebar(array(
            'name' => __('FIfth Footer Widget Area', 'capiot'),
            'id' => 'Fifth-footer-widget-area',
            'description' => __('Place desired content here using text block', 'capiot'),
            'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
        ));

        // Desktop right header widget
        register_sidebar( array(
      		'name' => 'Desktop Header Widget',
      		'id' => 'header-widget',
      		'before_widget' => '<div class="hw-widget">',
      		'after_widget' => '</div>',
      		'before_title' => '<h2 class="hw-title">',
      		'after_title' => '</h2>',
      	) );

        // Mobile right header widget
      	register_sidebar( array(
      		'name' => 'Mobile Header Widget',
      		'id' => 'mobile-header-widget',
      		'before_widget' => '<div class="mhw-widget">',
      		'after_widget' => '</div>',
      		'before_title' => '<h2 class="mhw-title">',
      		'after_title' => '</h2>',
      	) );
    }
}

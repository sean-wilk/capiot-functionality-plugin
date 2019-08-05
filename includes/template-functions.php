<?php

/**
 * Remove auto p filter
 *
 * @since  1.0.0
 * @access public
 * @return void
 */

remove_filter('term_description', 'wpautop');

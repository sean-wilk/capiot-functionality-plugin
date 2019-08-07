<?php
/**
 * Main Init Class
 *
 * @package     CF
 * @subpackage  CF/includes
 * @copyright   Copyright (c) 2019, Sean Wilkinson
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.0
 * @author      Sean Wilkinson <sean@wearego.digital>
 */

class CF_Init {

	/**
	 * Initialize the class
	 */
	public function __construct() {

		$register_post_types     = new CFT_Register_Post_Types();
		$register_taxonomies     = new CF_Register_Taxonomies();
		$register_widgets				 = new CF_Register_Widgets();

	}

}

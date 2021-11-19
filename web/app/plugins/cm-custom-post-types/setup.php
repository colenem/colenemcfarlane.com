<?php
/**
 * Plugin Name: CMcFarlane Custom Post Types
 * Plugin URI: https://colenemcfarlane.com/
 * Description: This plugin registers the post types needed for my portfolio website.
 * Version: 1.0.0
 * Author: Colene McFarlane
 * Author URI: https://colenemcfarlane.com
 */

namespace CMcFarlane;

// Blocking direct access to this file.
defined( 'ABSPATH' ) || exit;

define( 'CM_CPT_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

/* Load CMB2 */
require_once( WP_PLUGIN_DIR . '/cmb2/init.php' );

/* Post Types */
include_once( CM_CPT_PLUGIN_DIR . 'CPT/DefaultCustomPostType.php');
include_once( CM_CPT_PLUGIN_DIR . 'CPT/JobsCustomPostType.php' );
include_once( CM_CPT_PLUGIN_DIR . 'CPT/PortfolioCustomPostType.php' );

/* Meta Boxes */
include_once( CM_CPT_PLUGIN_DIR . 'Metaboxes/CMB2MetaBox.php' );
include_once( CM_CPT_PLUGIN_DIR . 'Metaboxes/WorkExperienceMetaBox.php' );
include_once( CM_CPT_PLUGIN_DIR . 'Metaboxes/PortfolioMetaBox.php' );

/* API */
include_once( CM_CPT_PLUGIN_DIR . 'API/API.php' );
include_once( CM_CPT_PLUGIN_DIR . 'API/CM_REST_Endpoints.php' );
include_once( CM_CPT_PLUGIN_DIR . 'API/CM_REST_WorkExperienceEndpoint.php' );
include_once( CM_CPT_PLUGIN_DIR . 'API/CM_REST_PortfolioEndpoint.php' );
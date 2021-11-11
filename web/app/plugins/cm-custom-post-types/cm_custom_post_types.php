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

require_once( CM_CPT_PLUGIN_DIR . '../cmb2/init.php' );

include_once( CM_CPT_PLUGIN_DIR . 'cm_default_custom_post_type.php');
include_once( CM_CPT_PLUGIN_DIR . 'cm_jobs_custom_post_type.php' );
include_once( CM_CPT_PLUGIN_DIR . 'cm_portfolio_custom_post_type.php' );
include_once( CM_CPT_PLUGIN_DIR . 'Metaboxes/setup.php' );
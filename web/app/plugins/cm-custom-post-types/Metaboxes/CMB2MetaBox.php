<?php

namespace CMcFarlane\MetaBoxes;

class CMB2MetaBox {
    public $meta_box = null;

    public static function init() {
        $self = new self();
        add_action( 'cmb2_admin_init', array( $self, 'create_CMB2_meta_box'), 10, 2 );
    }

    public function get_CMB2_post_type() {
        /* $path = trailingslashit( dirname( plugin_basename( __FILE__ ) ) ) . 'class';
        error_log( "post\r\n", 3, LOGS . 'error_log.log' );
        error_log( "INFO: " . __DIR__ . "\r\n", 
                    3, LOGS . 'error_log.log' );
        error_log( "ABSPATH: " . ABSPATH . "\r\n", 
                    3, LOGS . 'error_log.log' );
        error_log( "\e[0;31mWP_PLUGIN_DIR:" . WP_PLUGIN_DIR . "\r\n", 3, LOGS . 'error_log.log' );
        error_log( "\e[0;32mCMB2_INIT: " . WP_CONTENT_DIR . "/plugins/cmb2/init.php\r\n", 3, LOGS . 'error_log.log' );
        error_log( "\e[0;35mCM_CPT_PLUGIN_DIR: " . CM_CPT_PLUGIN_DIR . "\r\n", 3, LOGS . 'error_log.log' ); */
        return 'post';
    }

    public function get_CMB2_meta_box_options() {
        return array(
            'id' => 'cm_default_meta_box',
        );
    }

    public function get_CMB2_meta_fields() {
        return array();
    }

    public function get_CMB2_group_fields() {
        return array();
    }

    public function add_CMB2_field( $meta_field ) {
        $this->meta_box->add_field( $meta_field );
    }

    public function add_CMB2_group_field( $group_field_id, $group_fields ) {
        $this->meta_box->add_group_field( $group_field_id, $group_fields );
    }

    public function create_CMB2_meta_field() {
        foreach( $this->get_CMB2_meta_fields() as $cmb2_meta_field ) {
            $this->add_CMB2_field( $cmb2_meta_field );

            if ( $cmb2_meta_field['type'] === 'group' ) {
                $this->create_CMB2_group_field( $cmb2_meta_field['id'] );
            }
        }
    }

    public function create_CMB2_group_field( $group_field_id ) {
        $group_fields = $this->get_CMB2_group_fields();

        $this->add_CMB2_group_field( $group_field_id, $group_fields );
    }

    public function create_CMB2_meta_box() {
        $this->meta_box = new_cmb2_box( $this->get_CMB2_meta_box_options() );
        $this->create_CMB2_meta_field();
    }
}

$cmb2_meta_box = new CMB2MetaBox();
$cmb2_meta_box->init();
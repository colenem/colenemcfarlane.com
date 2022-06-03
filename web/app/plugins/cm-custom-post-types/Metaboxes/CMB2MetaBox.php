<?php

/**
 * Base class configuartion to create custom meta fields
 * for various post types
 */

namespace CMcFarlane\MetaBoxes;

class CMB2MetaBox {
    public $meta_box = null;

    public static function init() {
        $self = new self();
        add_action( 'cmb2_admin_init', array( $self, 'create_CMB2_meta_box'), 10, 2 );
    }

    // default post type to be associated with CMB2 metabox
    public function get_CMB2_post_type() {
        return 'post';
    }

    // configure meta box options (id, title, priority, etc)
    public function get_CMB2_meta_box_options() {
        // each meta box must have an id at minimum
        return array(
            'id' => 'cm_default_meta_box',
        );
    }

    // get all meta fields that need to be created
    public function get_CMB2_meta_fields() {
        return array();
    }

    // get all group fields that need to be created (if they exist)
    public function get_CMB2_group_fields() {
        return array();
    }

    // create each custom meta field
    public function create_CMB2_meta_field() {
        foreach( $this->get_CMB2_meta_fields() as $cmb2_meta_field ) {
            $this->add_CMB2_field( $cmb2_meta_field );

            if ( $cmb2_meta_field['type'] === 'group' ) {
                $this->create_CMB2_group_field( $cmb2_meta_field['id'] );
            }
        }
    }

    // create group fields for custom meta (if they exist)
    public function create_CMB2_group_field( $group_field_id ) {
        $group_fields = $this->get_CMB2_group_fields();

        $this->add_CMB2_group_field( $group_field_id, $group_fields );
    }

    // add custom meta field to the meta box
    public function add_CMB2_field( $meta_field ) {
        $this->meta_box->add_field( $meta_field );
    }

    // add custom group field to our meta box (if it exists)
    public function add_CMB2_group_field( $group_field_id, $group_fields ) {
        $this->meta_box->add_group_field( $group_field_id, $group_fields );
    }

    // initialize meta box with all fields and groups
    public function create_CMB2_meta_box() {
        $this->meta_box = new_cmb2_box( $this->get_CMB2_meta_box_options() );
        $this->create_CMB2_meta_field();
    }
}

// create new instance
$cmb2_meta_box = new CMB2MetaBox();
$cmb2_meta_box->init();
<?php

namespace CMcFarlane\MetaBoxes;

class CMB2MetaBox {
    public $meta_box = null;

    public static function init() {
        $self = new self();
        add_action( 'cmb2_admin_init', array( $self, 'create_CMB2_meta_box'), 10, 2 );
    }

    public function get_CMB2_post_type() {
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
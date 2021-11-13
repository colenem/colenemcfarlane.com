<?php

namespace CMcFarlane\MetaBoxes;

class PortfolioMetaBox extends CMB2MetaBox {
    public static function init() {
        $self = new self();
        add_action( 'cmb2_init', array( $self, 'create_CMB2_meta_box') );
    }

    public function get_CMB2_post_type() {
        return 'portfolio';
    }

    public function get_CMB2_meta_box_options() {
        $post_type = $this->get_CMB2_post_type();
        $prefix = 'cm_';

        error_log( $post_type . "\r\n", 3, LOGS . 'error_log.log' );

        return array(
            'id'           => $prefix . 'portfolio_project',
            'title'        => 'Project Info',
            'object_types' => [ $post_type ],
            'context'      => 'normal',
            'priority'     => 'high',
            'show_names'   => true,
            'hookup'       => true,
            'save_fields'  => true,
            // 'show_in_rest' => WP_REST_Server::READABLE,
        );
    }

    public function get_CMB2_meta_fields() {
        return array(
            array(
                'name'       => __( 'Project URL', 'cmcfarlane' ),
                'id'         => 'project_url',
                'type'       => 'text_url',
                'repeatable' => false,
                'show_names' => true,
                'on_front'   => false,
                'save_field' => true,
            ),
        );
    }
}

$portfolio_meta_box = new PortfolioMetaBox();
$portfolio_meta_box->init();
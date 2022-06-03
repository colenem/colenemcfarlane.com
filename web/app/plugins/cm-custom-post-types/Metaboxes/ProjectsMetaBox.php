<?php

namespace CMcFarlane\MetaBoxes;
use WP_REST_Server;

class ProjectsMetaBox extends CMB2MetaBox {
    public static function init() {
        $self = new self();
        add_action( 'cmb2_init', array( $self, 'create_CMB2_meta_box') );
    }

    public function get_CMB2_post_type() {
        return 'projects';
    }

    public function get_CMB2_meta_box_options() {
        $post_type = $this->get_CMB2_post_type();
        $prefix = 'cm_';

        return array(
            'id'           => $prefix . 'projects',
            'title'        => 'Project Info',
            'object_types' => [ $post_type ],
            'context'      => 'normal',
            'priority'     => 'high',
            'show_names'   => true,
            'hookup'       => true,
            'save_fields'  => true,
            'show_in_rest' => WP_REST_Server::READABLE,
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
            array(
                'name'       => __( 'Position', 'cmcfarlane' ),
                'id'         => 'position',
                'type'       => 'text_small',
                'repeatable' => false,
                'show_names' => true,
                'on_front'   => false,
                'save_field' => true,
            ),
        );
    }
}

$projects_meta_box = new ProjectsMetaBox();
$projects_meta_box->init();
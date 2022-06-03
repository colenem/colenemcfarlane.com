<?php

/**
 * Used to display custom meta fields with the 'jobs'
 * custom post type
 */

namespace CMcFarlane\MetaBoxes;
use WP_REST_Server;

class WorkExperienceMetaBox extends CMB2MetaBox {
    public static function init() {
        $self = new self();
        add_action( 'cmb2_init', array( $self, 'create_CMB2_meta_box') );
    }

    public function get_CMB2_post_type() {
        return 'jobs';
    }

    public function get_CMB2_meta_box_options() {
        $post_type = $this->get_CMB2_post_type();
        $prefix = 'cm_';

        return array(
            'id'           => $prefix . 'work_experience',
            'title'        => 'Work Experience',
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
                'name'       => __( 'Job Title', 'cmcfarlane' ),
                'id'         => 'job_title',
                'type'       => 'text',
                'repeatable' => false,
                'show_names' => true,
                'on_front'   => false,
                'save_field' => true,
            ),
            array(
                'name'       => __( 'Company/Organization Name', 'cmcfarlane' ),
                'id'         => 'company_organization_name',
                'type'       => 'text',
                'repeatable' => false,
                'show_names' => true,
                'on_front'   => false,
                'save_field' => true,
            ),
            array(
                'name'       => __( 'Location', 'cmcfarlane' ),
                'id'         => 'company_organization_location',
                'type'       => 'text',
                'repeatable' => false,
                'show_names' => true,
                'on_front'   => false,
                'save_field' => true,
            ),
            array(
                'name'       => __( 'Dates of Employment', 'cmcfarlane' ),
                'id'         => 'employment_duration',
                'type'       => 'text',
                'repeatable' => false,
                'show_names' => true,
                'on_front'   => false,
                'save_field' => true,
            ),
            array(
                'name'       => __( 'Job Responsibilities & Highlights', 'cmcfarlane' ),
                'id'         => 'job_responsibilities',
                'type'       => 'group',
                'repeatable' => true,
                'options'    => array(
                    'group_title'   => 'Responsibility/Highlight {#}',
                    'add_button'    => 'Add Another Responsibilty/Higlight',
                    'remove_button' => 'Remove',
                    'closed'        => true,  // Repeater fields closed by default - neat & compact.
                    'sortable'      => true,  // Allow changing the order of repeated groups.
                ),        
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

    public function get_CMB2_group_fields() { # Goes with Job Responsibilities group meta
        return array(
            'name'       => esc_html__( 'Responsibility/Highlight', 'cmcfarlane' ),
            'id'         => 'job_responsibilty',
            'type'       => 'text',
        );
    }
}

$work_experience_meta_box = new WorkExperienceMetaBox();
$work_experience_meta_box->init();
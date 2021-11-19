<?php

namespace CMcFarlane\API;

class CM_REST_Work_Experience_Endpoint extends CM_REST_Endpoint {
    public function get_route_name() {
        return 'work-experience';
    }

    public function get_route_HTTP_method() {
        return 'GET';
    }

    public function get_route_permission_callback() {
        return '__return_true';
    }

    public function get_route_argument_options() {
        # no need to send specific argument options (i.e., default, required, sanitize_callback, or validate call),
        # so we return an empty array
        return [];
    }

    public function response_callback() {
        $output  = [];
        $job_ids = get_posts(
            array(
                'posts_per_page' => -1,
                'post_type'      => 'jobs',
                'fields'         => 'ids'
            )
        );

        foreach( $job_ids as $job_id ) {
            $job = [];
            $job_meta                   = get_post_meta( $job_id );
            $job['job_title']           = $job_meta[ 'job_title' ][ 0 ];
            $job['company_name ']       = $job_meta[ 'company_organization_name' ][ 0 ];
            $job['company_location']    = $job_meta[ 'company_organization_location'][ 0 ];
            $job['employment_duration'] = $job_meta[ 'employment_duration' ][ 0 ];
            $job['responsibilities']    = array_column( maybe_unserialize( $job_meta[ 'job_responsibilities' ][ 0 ] ), 'job_responsibilty' );

            $output[] = $job;
        }

        return new \WP_REST_Response( $output, 200 );
    }
}
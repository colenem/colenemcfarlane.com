<?php

namespace CMcFarlane\API;

/**
 * Building blocks to map out the fields
 * needed to create an API endpoint in register_rest_route()
 */

interface CM_REST_EndpointInterface {
# route name (.e.g., /portfolio)
# route method (get,post)
# callback function to do the work
# permission_callback, can you access this endpoint? (return true, false, or WP_ERROR)

    public function get_route_name();

    public function get_route_HTTP_method();

    public function get_route_callback_method();

    public function get_route_permission_callback();

    public function get_route_argument_options();
}

abstract class CM_REST_Endpoint implements CM_REST_EndpointInterface {
    #child class will implement the rest of the functions
    #described in the interface above
    public function get_route_callback_method() {
        return [ $this, 'response_callback' ];
    }

    abstract public function response_callback();
}

class CM_REST_Work_Experience_Route extends CM_REST_Endpoint {
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

class CM_REST_Portfolio_Route extends CM_REST_Endpoint {
    public function get_route_name() {
        return 'portfolio';
    }

    public function get_route_HTTP_method() {
        return 'GET';
    }

    public function get_route_permission_callback() {
        return '__return_true';
    }

    public function get_route_argument_options() {
        # no need to send specific argument options such as default, required, sanitize_callback, or validate call,
        # so we return an empty array
        return [];
    }

    public function response_callback() {
        $output  = [];
        $project_ids = get_posts(
            array(
                'posts_per_page' => -1,
                'post_type'      => 'portfolio',
                'fields'         => 'ids'
            )
        );

        # this should contain:
        #   - project title
        #   - project featured image (thumbnail)
        #   - project URL
        foreach( $project_ids as $project_id ) {
            $project = [];

            # TO BE CONTINUED...

            $output[] = $project;
        }

        return new \WP_REST_Response( $output, 200 );
    }
}

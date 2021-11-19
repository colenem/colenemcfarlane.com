<?php

namespace CMcFarlane\API;

class CM_REST_Portfolio_Endpoint extends CM_REST_Endpoint {
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
            $project[ 'project_name' ]      = get_the_title( $project_id );
            $project[ 'project_url' ]       = get_post_meta( $project_id, 'project_url', true );
            $project[ 'project_thumbnail' ] = get_the_post_thumbnail_url( $project_id, [ 400, 400 ] );

            $output[] = $project;
        }

        return new \WP_REST_Response( $output, 200 );
    }
}

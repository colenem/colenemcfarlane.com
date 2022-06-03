<?php

namespace CMcFarlane\API;

# you gotta make this a class cuz it nah wurk
class CM_REST_Api {
    public function init() {
        $self = new self();
        add_action( 'rest_api_init', [ $self, 'register_rest_routes' ] );
    }

    public function register_route( $endpoint ) {
        register_rest_route('wp/v2', $endpoint->get_route_name(), 
            array(
                'args'                => $endpoint->get_route_argument_options(),
                'callback'            => $endpoint->get_route_callback_method(),
                'methods'             => $endpoint->get_route_HTTP_method(),
                'permission_callback' => $endpoint->get_route_permission_callback(),
            )
        );
    }

    public function register_rest_routes() {
        $work_experience_route = new CM_REST_Work_Experience_Endpoint();
        $portfolio_route       = new CM_REST_Projects_Endpoint();

        $endpoints = [ $work_experience_route, $portfolio_route ];

        foreach ( $endpoints as $endpoint ) {
            $this->register_route( $endpoint );
        }
    }
}

$cm_rest_api = new CM_REST_Api();
$cm_rest_api->init();
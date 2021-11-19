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

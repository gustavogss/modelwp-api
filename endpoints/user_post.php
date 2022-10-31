<?php 

function api_user_post($request) {
    $email = $request['email'];
    $username = $request['username'];
    $password = $request['password'];

   $response = wp_insert_user([
        'user_login' => $username,
        'user_email' => $email,
        'user_pass' => $password,
        'role' => 'subscriber'
    ]);

    return rest_ensure_response($response);
}

function register_api_user_post(){
    register_rest_route('api', '/user', [
        'methods' => WP_REST_Server::CREATABLE,
        'callback' => 'api_user_post',
    ]);
}
add_action('rest_api_init', 'register_api_user_post');
?>
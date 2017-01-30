<?php
function sendTelegram( $email = null, $message = null )
{
    $response = \Curl::to(env('SERVICES_HOST') . '/api/telegram')
        ->withData([
            'email'   => $email,
            'message' => $message,
        ])
        ->withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . env('SERVICES_TOKEN'),
        ])
        ->post();
    return $response;
}

function getAuthToken($grant_type = 'client_credentials', $client_id = null, $client_secret = null, $scope = null)
{
    if( empty($client_id) || empty($client_secret) ) {
        $client_id = env('SERVICES_CLIENT_ID');
        $client_secret = env('SERVICES_CLIENT_SECRET');
    }
    
    $response = \Curl::to(env('SERVICES_HOST') . '/oauth/token')
        ->withData([
            'grant_type' => $grant_type,
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'scope' => $scope,
        ])
        ->post();

    return $response;
}
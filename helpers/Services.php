<?php
function sendTelegram( $email = null, $message = null )
{
    $client = new GuzzleHttp\Client;

    $accessToken = env('SERVICES_TOKEN');

    $response = $client->request('POST', env('SERVICES_HOST') . '/api/telegram', [
        'headers' => [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$accessToken,
        ],
        'form_params' => [
            'email'   => $email,
            'message' => $message,
        ],
    ]);

    return $response;
}

function getServicesToken($grant_type = 'client_credentials', $client_id = null, $client_secret = null, $scope = null)
{
    if( empty($client_id) || empty($client_secret) ) {
        $client_id = env('SERVICES_CLIENT_ID');
        $client_secret = env('SERVICES_CLIENT_SECRET');
    }

    $guzzle = new GuzzleHttp\Client;

    $response = $guzzle->post(env('SERVICES_HOST') . '/oauth/token', [
        'form_params' => [
            'grant_type' => $grant_type,
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'scope' => $scope,
        ],
    ]);

    return $response;
}
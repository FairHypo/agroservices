<?php
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

function sendTelegram( $email = null, $message = null )
{
    $client = new GuzzleHttp\Client;

    $accessToken = env('SERVICES_TOKEN');

    $response = $client->request('POST', env('SERVICES_HOST') . '/api/telegram', [
        'headers' => [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $accessToken,
        ],
        'form_params' => [
            'email'   => $email,
            'message' => $message,
        ],
    ]);

    return $response;
}

function sendSms( $phone = null, $message = null )
{
    $client = new GuzzleHttp\Client;

    $accessToken = env('SERVICES_TOKEN');

    $response = $client->request('POST', env('SERVICES_HOST') . '/api/telegram', [
        'headers' => [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $accessToken,
        ],
        'form_params' => [
            'phone'   => $phone,
            'message' => $message,
            'template_id' => 'test',
            'json'    => 'test'
        ],
    ]);

    return $response;
}

function sendEmail( $email = null, $message = null )
{
    $client = new GuzzleHttp\Client;

    $accessToken = env('SERVICES_TOKEN');

    $response = $client->request('POST', env('SERVICES_HOST') . '/api/telegram', [
        'headers' => [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $accessToken,
        ],
        'form_params' => [
            'email'   => $email,
            'message' => $message,
            'template_id' => 'test',
            'json'    => 'test'
        ],
    ]);

    return $response;
}

function addMailChimp( $email = null, $list_id = null, $json = null )
{
    $client = new GuzzleHttp\Client;

    $accessToken = env('SERVICES_TOKEN');

    $response = $client->request('POST', env('SERVICES_HOST') . '/api/subscription', [
        'headers' => [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $accessToken,
        ],
        'form_params' => [
            'email'   => $email,
            'list_id' => $list_id,
            'json'    => $json
        ],
    ]);

    return $response;
}
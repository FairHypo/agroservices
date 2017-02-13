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
            'grant_type'    => $grant_type,
            'client_id'     => $client_id,
            'client_secret' => $client_secret,
            'scope'         => $scope,
        ],
    ]);

    return $response;
}

function sendTelegram( $email = null, $message = null, $template_id = 'test', $json = 'test' )
{
    $client = new GuzzleHttp\Client;

    $accessToken = env('SERVICES_TOKEN');

    $response = $client->request('POST', env('SERVICES_HOST') . '/api/telegram', [
        'headers' => [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $accessToken,
        ],
        'form_params'     => [
            'email'       => $email,
            'message'     => $message,
            'template_id' => $template_id,
            'json'        => $json
        ],
    ]);

    return $response;
}

function sendSms( $phone = null, $message = null, $template_id = 'test', $json = 'test' )
{
    $client = new GuzzleHttp\Client;

    $accessToken = env('SERVICES_TOKEN');

    $response = $client->request('POST', env('SERVICES_HOST') . '/api/telegram', [
        'headers' => [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $accessToken,
        ],
        'form_params'     => [
            'phone'       => $phone,
            'message'     => $message,
            'template_id' => $template_id,
            'json'        => $json
        ],
    ]);

    return $response;
}

function sendEmail( $email = null, $message = null, $template_id = 'test', $json = 'test' )
{
    $client = new GuzzleHttp\Client;

    $accessToken = env('SERVICES_TOKEN');

    $response = $client->request('POST', env('SERVICES_HOST') . '/api/telegram', [
        'headers' => [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $accessToken,
        ],
        'form_params'     => [
            'email'       => $email,
            'message'     => $message,
            'template_id' => $template_id,
            'json'        => $json
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

function getUtm()
{
    $utms_get = request()->all();
    $utms_cookie = request()->cookie();
    $utms = array_flip(explode(',', env('SERVICES_UTM')));
    return [
        'utms_get'    => array_intersect_key($utms_get, $utms),
        'utms_cookie' => array_intersect_key($utms_cookie, $utms),
        '$utms'       => $utms,
    ];
}
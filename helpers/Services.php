<?php
function sendTelegram( $email = null, $message = null )
{
    $response = \Curl::to('http://services.dev/api/telegram')
        ->withData([
            'email'   => $email,
            'message' => $message,
        ])
        ->withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjBkOTg0MGMyMDI4MjgxYWY4OTg2OWQxZjFjMjQ1NmRjYjA4YWUyNzc3NGZhYzBkYjY2Y2VlMDg2NWFiYjdkYzBhZjIyNzNiOTQwMDBjYWI2In0.eyJhdWQiOiI4IiwianRpIjoiMGQ5ODQwYzIwMjgyODFhZjg5ODY5ZDFmMWMyNDU2ZGNiMDhhZTI3Nzc0ZmFjMGRiNjZjZWUwODY1YWJiN2RjMGFmMjI3M2I5NDAwMGNhYjYiLCJpYXQiOjE0ODU1MjQ1MDYsIm5iZiI6MTQ4NTUyNDUwNiwiZXhwIjoxNTE3MDYwNTA2LCJzdWIiOiIiLCJzY29wZXMiOltdfQ.Q02-L2pRb9IMRxHmnoXuaCMPCEIaGp8UqKq5CGa5IICW_frdJOi7ozWGEm_wPCOEtiaJtbTJdHEWvzf8K-eK0VP49NO8YKCAMHtt63icZHe1cUw0vy-BKSfGnZ591UYeTHf-2HMws8FxMHlmc9I3J_oamashyPo0kvAc8Jng6ZFa7ZxgwFbHKw6EEBA6lSP0d-xendo2Fhpao0m9VYjSLIMmYI5byDBdKyGHW4cGSq9fD7RuszKmVHgD5Jcu-lNIoxykOyo79JQ4v3bJ6lBAZDEaHVD4FZ6F6Wqk7QBZ3a4esy-46xo3B2KnvBNXVpASnCSleZqwieV9z8_ps9qIPjFyNqh3P-k1MER_uV4jPeaD4oQuknLzuMdiLyN4opv3_GN5FKUL8ooFb3woWEj140aRv6vnJHq-_bUXZqQfu1WXRixIpu3lyQxBtdIY2ykQo-ewuaDTS4jp7tppvFvSCo2pCTaUMMy4BodE-g7hsi2ADS1CK723DZI6RNsVFE6BLxqcezbgUHwyJPu8n8uXqvIUrBzI7XhefFlkNoFce7ZDwvXVDQmQxeophNtPtdxfR7g_-1ImdobbCuPu5sQrGovut5Syl1eLnvUpCEoM0r8o-Ru23VvQBhahiLFXIA6No42bJv3RP2nzuAbZXnywURt177lLPXGh66zSu4XLBKA',
        ])
        ->post();
    return $response;
}
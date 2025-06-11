<?php

use Illuminate\Support\Facades\Http;

if (!function_exists('safeApiGet')) {
    function safeApiGet($url)
    {
        try {
            $response = Http::get($url);
            $body = json_decode($response->body(), true);

            if (isset($body['error'])) {
                return null;
            }

            return is_array($body) ? null : $response->body();
        } catch (\Exception $e) {
            return null;
        }
    }
}

<?php


namespace Altum\PaymentGateways;

/* Helper class for Paystack v2 */
defined('ZEFANYA') || die();

class Paystack {
    static public $api_url = 'https://api.paystack.co/';
    static public $secret_key = null;

    public static function get_headers() {
        return [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . self::$secret_key
        ];
    }

}

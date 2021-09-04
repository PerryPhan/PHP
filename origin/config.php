<?php
require_once 'vendor/autoload.php';
require_once 'class-db.php';
  
define('GOOGLE_CLIENT_ID', '261493543165-mvfqfakg8l0ileh5213kiarl67l23vdk.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', 'HEy0tGO1jBMsFRrfp4MpEt07');
  
$config = [
    'callback' => 'http://localhost/tvs/callback.php',
    'keys'     => [
                    'id' => GOOGLE_CLIENT_ID,
                    'secret' => GOOGLE_CLIENT_SECRET
                ],
    'scope'    => 'https://www.googleapis.com/auth/spreadsheets',
    'authorize_url_parameters' => [
            'approval_prompt' => 'force', // to pass only when you need to acquire a new refresh token.
            'access_type' => 'offline'
    ]
];
  
$adapter = new Hybridauth\Provider\Google( $config );
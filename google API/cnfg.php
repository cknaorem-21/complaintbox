<?php

//start session on web page
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('798248019842-sk8pcahfs3k9o1b3hokql4d0o52v2km2.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/google%20API/indx.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>
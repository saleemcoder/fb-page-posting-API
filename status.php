<?php

// Set your variables
$videoId = '348633647809271';
$accessToken = 'EAAOyUHcBTFYBOzM3qDKkMCuYs2agolqpe3nD0OfkZCCE4xKta0GtmuzT4tvIvWybImJ0tM3o3ZASuYpy9bBl3ASoO0xNeLcVq7meRWwAjbEWIGeWtvIB6ZCsawTsEMUMYh3wubXmZALDjx8JeYemgYRBN3ZBlbcBjbg7CTcLcp3c0KM6puCZARZBN7kjQwYejeRZB7KdVa87J2Nlc6UZD';

// Build the URL
$getUrl = "https://graph.facebook.com/v18.0/{$videoId}";
$getUrl .= "?fields=status";
$getUrl .= "&access_token={$accessToken}";

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $getUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute cURL session and get the response
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
}

// Close cURL session
curl_close($ch);

// Display the response
echo $response;

?>
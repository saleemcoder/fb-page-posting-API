<?php

// Set your variables
$pageId = '110576664884831';
$accessToken = 'EAAOyUHcBTFYBOzM3qDKkMCuYs2agolqpe3nD0OfkZCCE4xKta0GtmuzT4tvIvWybImJ0tM3o3ZASuYpy9bBl3ASoO0xNeLcVq7meRWwAjbEWIGeWtvIB6ZCsawTsEMUMYh3wubXmZALDjx8JeYemgYRBN3ZBlbcBjbg7CTcLcp3c0KM6puCZARZBN7kjQwYejeRZB7KdVa87J2Nlc6UZD';
$videoId = '7886102368083218';
$uploadPhase = 'finish';
$videoState = 'PUBLISHED';
$description = 'Quran';

// Build the URL
$uploadUrl = "https://graph.facebook.com/v18.0/{$pageId}/video_reels";
$uploadUrl .= "?access_token={$accessToken}";
$uploadUrl .= "&video_id={$videoId}";
$uploadUrl .= "&upload_phase={$uploadPhase}";
$uploadUrl .= "&video_state={$videoState}";
$uploadUrl .= "&description=" . urlencode($description);

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $uploadUrl);
curl_setopt($ch, CURLOPT_POST, 1);
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

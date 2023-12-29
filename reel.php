<?php
//preparing upload session
 
$yourPageId = '110576664884831';
$yourPageAccessToken = 'EAAOyUHcBTFYBOzM3qDKkMCuYs2agolqpe3nD0OfkZCCE4xKta0GtmuzT4tvIvWybImJ0tM3o3ZASuYpy9bBl3ASoO0xNeLcVq7meRWwAjbEWIGeWtvIB6ZCsawTsEMUMYh3wubXmZALDjx8JeYemgYRBN3ZBlbcBjbg7CTcLcp3c0KM6puCZARZBN7kjQwYejeRZB7KdVa87J2Nlc6UZD';

$url = "https://graph.facebook.com/v18.0/{$yourPageId}/video_reels";

$data = array(
    'upload_phase' => 'start',
    'access_token' => $yourPageAccessToken
);

$options = array(
    CURLOPT_URL            => $url,
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => json_encode($data),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER     => array('Content-Type: application/json'),
);

$ch = curl_init();
curl_setopt_array($ch, $options);

$response = curl_exec($ch);
curl_close($ch);

echo $response;
?>

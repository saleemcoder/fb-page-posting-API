<?php

$videoFilePath = 'https://saleem.pk/reel.mp4';
$pageAccessToken = 'EAAOyUHcBTFYBOzM3qDKkMCuYs2agolqpe3nD0OfkZCCE4xKta0GtmuzT4tvIvWybImJ0tM3o3ZASuYpy9bBl3ASoO0xNeLcVq7meRWwAjbEWIGeWtvIB6ZCsawTsEMUMYh3wubXmZALDjx8JeYemgYRBN3ZBlbcBjbg7CTcLcp3c0KM6puCZARZBN7kjQwYejeRZB7KdVa87J2Nlc6UZD';
$fileSizeInBytes = filesize($videoFilePath);
$uploadUrl = 'https://graph-video.facebook.com/v18.0/7886102368083218?access_token=' . $pageAccessToken;

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $uploadUrl);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, [
    'file' => new CURLFile($videoFilePath),
    'offset' => 0,
    'file_size' => $fileSizeInBytes,
]);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
}

curl_close($ch);

echo $response;

?>

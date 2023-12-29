<?php
//uploading hosted file. 

$endpoint = "https://rupload.facebook.com/video-upload/v18.0/7955040354523508";
$accessToken = "EAAOyUHcBTFYBOzM3qDKkMCuYs2agolqpe3nD0OfkZCCE4xKta0GtmuzT4tvIvWybImJ0tM3o3ZASuYpy9bBl3ASoO0xNeLcVq7meRWwAjbEWIGeWtvIB6ZCsawTsEMUMYh3wubXmZALDjx8JeYemgYRBN3ZBlbcBjbg7CTcLcp3c0KM6puCZARZBN7kjQwYejeRZB7KdVa87J2Nlc6UZD";
$fileUrl = "https://saleem.pk/reel.mp4";


$postData = [
    'file_url' => $fileUrl,
];

$options = [
    'http' => [
        'header' => "Authorization: OAuth {$accessToken}\r\n" .
                    "Content-Type: application/json\r\n",
        'method' => 'POST',
        'content' => json_encode($postData),
    ],
];

$context = stream_context_create($options);
$result = file_get_contents($endpoint, false, $context);

if ($result === false) {
    // Handle error
    $error = error_get_last();
    echo 'Error: ' . $error['message'];
    print_r($http_response_header); // Print the response headers for additional information
} else {
    // Handle success
    echo $result;
}


?>

<?php

if(isset($_POST['PostToFB'])){
    
    $message = $_POST['message'];

    //getting file info with $_FILES[] 
	$file_name = $_FILES['reel']['name'];
	$file_tmp_name = $_FILES['reel']['tmp_name'];
	$file_size = $_FILES['reel']['size'];
	$file_type = $_FILES['reel']['type'];


    $final_rand = time().rand(100000,999999);
    $file_name_array = explode(".",$file_name);

    //store uploaded files here
    $upload_dir="videos";
    $final_file = "$file_name_array[0]-$final_rand.$file_name_array[1]";

    //checking that file is uploaded with HTTP POST method.
    if(is_uploaded_file($file_tmp_name)) 
    {
    // moving upload file to our dir.
        if(move_uploaded_file($file_tmp_name, "$upload_dir/$final_file")){
            echo'Upload Success';
        }
        else{
            echo'File was unable to upload';
        }
    }




        require_once ('vendor/autoload.php');

        $fb = new Facebook\Facebook([
            'app_id' => '1040483593833558',
            'app_secret' => '2b788c8f5ee799111483c6d2b6a7c4bf',
            'default_graph_version' => 'v18.0',
        ]);

        $pageAccessToken = 'EAAOyUHcBTFYBO0dJLHHUZAtjthX5ZAVWQsCsFm25kqq3ZAae8ZBOvujmDh4FFJ7madA0v6C6JJX9gHCXit0aBbfMtDxcdjH4ZAVEcijN3wAXhfY1tKX5JAJobNykigeYZBHM0e7vPf8BULN0Vd4qMYztvIECPxYQSK4xcoZB2ncbY2GZC38a9ClYRSTMYtl1xv4tZCBOWm34x91X1CzgZD';
        //$pageAccessToken = 'EAAOyUHcBTFYBOyDckIRbE0Mi9DCl0ZBRb2mBRPLkGvxmS3cDaYFfLUZCvqt5ki6uN5ky8Rm1gQyppbuzVqHESiwINQRH8inGjSTNiaBT6O4AJFWZCHOkO50ZAjO3H0fuszrdZCYG5jfBZCLelwS7hVU1hDMuVf3OLQoinb3h8bG7X0sBrB9AMJZAq8llkzXXZBsZBEt0SqcKQCIZCIJAukeV5ATPZCmDvOgZACrzMiIZBXIJZB';

        $PostData = [
            'message' => $message,
            
            //'link' => 'https://saleem.pk',
            'source' => $fb -> fileToUpload("http://localhost/fb/$upload_dir/$final_file"), //upload image from folder
            // 'url' => 'https://twh360.com/images/logo.png', //upload image from URL
            // 'source' => $fb -> videoToUpload("http://localhost/fb/$upload_dir/$final_file"), //upload video
            // 'source' => $fb -> reelToUpload("http://localhost/fb/$upload_dir/$final_file"), //upload reels
        
            // 'Content-Type' => 'application/json',
            // 'upload_phase' => 'start',
        
        ];

        try{
                // $response = $fb->post('/me/feed', $PostData, $pageAccessToken); //for text and link
                $response = $fb->post('/me/photos', $PostData, $pageAccessToken); //for photos
                // $response = $fb->post('/me/videos', $PostData, $pageAccessToken); //for video
                
        }
        catch(Facebook\Exceptions\FacebookResponseException $e){
            echo 'Graph returned an error: '.$e->getMessage();
            exit;
        }
        catch(Facebook\Exceptions\FacebookSDKException $e){
            echo 'Facebook SDK returned an Error: '.$e->getMessage();
            exit;
        }

        $graphNode = $response->getGraphNode();
       
        echo '
                Post Link: <a href="https://facebook.com/'.$graphNode['id'].'" target="_blank">https://facebook.com/'.$graphNode['id'].'</a>
            ';
}


    echo '
        <form method="post" action="" enctype="multipart/form-data">
    
            Message:    <input type="text" name="message"> <br><br>
            Reel:       <input type="file" name="reel"> <br><br>

            <input type="submit" name="PostToFB" value="Post to FB">
        </form>
    
    ';    

?>
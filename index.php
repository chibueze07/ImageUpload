<?php

function imageUpload()
{
    $directory = 'uploads/';
    $filepath  = $directory . basename($_FILES["image"]["name"]);
    $jpgforce  = pathinfo($filepath, PATHINFO_EXTENSION);
    if (empty($_FILES['image']['name'])) {
        $message = "No file uploaded!";
    } else if ($jpgforce != '.jpg') {
        $message = "All images MUST be .jpg format";
    } else if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your image is too large.";
    } else if (file_exists($filepath)) {
        $message = "Sorry, image name already exists!";
    } else {
        $imageUpload = move_uploaded_file($_FILES["image"]["tmp_name"], $filepath);
        if ($imageUpload) {
            $message = "Image uploaded successfully!!!";
        }
    }

    return $message;
}


require 'index.html';

if (isset($_POST['submit'])) {
    echo imageUpload();
}

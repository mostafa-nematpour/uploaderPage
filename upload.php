<?php

session_start();

// Maximum file size (MB)
$max_file_siz = 20;

// Acceptable extensions
$allowFileEX = ["jpg", "png", "jepg", "gif", "doc", "zip", "rar"];

// File storage folder address
$uploadFileDir = "uploaded/";

// Set timezone for file name
date_default_timezone_set("Asia/Tehran");

// Messages for answers and errors
$messages = [
    "upload Success" => "File uploaded successfully",
    "size Error" => "File size is too large to upload.",
    "extensions Error" => "File extensions are not allowed.",
    "file Error" => "Please select the file.",
    "file transfer Error" => "An error occurred while transferring the file.",
];

$msg = "";

// Check sending method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check file availability
  

    if (isset($_FILES["fileUpload"]) && !empty($_FILES["fileUpload"]) && $_FILES["fileUpload"]["error"] == 0) {

        $msg = "ok";
        var_dump($fileArr);
        $fileArr = $_FILES["fileUpload"];
        // Analyze file properties
        $fileName = $fileArr["name"];
        $fileSize = $fileArr["size"];
        $fileTmpPath = $fileArr["tmp_name"];

        // Find file extensions
        $fileNameSeprate = explode(".", $fileName);
        $fileExtention = strtolower(end($fileNameSeprate));

        // Create a unique name for the file
        $newFileName = date("Ymd_His_") . $fileExtention . "_" . genratRandomString() . "." . $fileExtention;

        // Is the file extension acceptable?
        if (in_array($fileExtention, $allowFileEX)) {

            // Is the file size acceptable?
            if ($fileSize < ($max_file_siz * 1024 * 1024)) {

                // Build the main file path
                $destPath = $uploadFileDir . $newFileName;

                // Check and execute file transfers
                if (move_uploaded_file($fileTmpPath, $destPath)) {
                    $msg = $messages["upload Success"];
                } else {
                    $msg = $messages["file transfer Error"];
                }
            } else {
                $msg = $messages["size Error"];
            }
        } else {
            $msg = $messages["extensions Error"];
        }
    } else {
        $msg = $messages["file Error"];
      

    }
}
var_dump($_FILES) ;
echo $_SESSION["msg"] = $msg;

// Back to Home
//header("location:index.php");
/*
در پی اچ پی میشه حداکثر حجم فایل رو تغییر داد
php.ini
post_max_siz
upload_max_siz
پست مکس سایز بزرگتر باشه
*/
function genratRandomString($length = 10): string
{
    $chars = "0123456789abcdefghijklmnopqrstuvwxyz";
    $chrsLength = strlen($chars);
    $randomString = "";
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $chars[rand(0, $chrsLength - 1)];
    }
    return $randomString;
}

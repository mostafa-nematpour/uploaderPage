<?php
session_start();
?>
<!DOCTYPE html>

<!-- <html lang="fa" dir="rtl"> -->

<head>
    <meta charset="utf-8">
    <title>
        عنوان
    </title>
    <link href="style.css" rel="stylesheet" type="text/css">

</head>

<body>
    <?php
    if (isset($_SESSION["msg"]) && $_SESSION["msg"]) : ?>
        <p><?php
            echo $_SESSION["msg"] ;
            unset($_SESSION["msg"])
            ?></p>
    <?php endif ?>
    <br>
    <div class="main">


        <h2>File Upload & Image Preview</h2>
        <p class="lead">No Plugins <b>Just Javascript</b></p>

        <!-- Upload  -->
        <form id="file-upload-form" class="uploader" action="upload.php">
            <input id="file-upload" type="file" name="fileUpload" accept="image/*" />

            <label for="file-upload" id="file-drag">
                <img id="file-image" src="#" alt="Preview" class="hidden">
                <div id="start">
                    <i class="fa fa-download" aria-hidden="true"></i>
                    <div>Select a file or drag here</div>
                    <div id="notimage" class="hidden">Please select an image</div>
                    <span id="file-upload-btn" class="btn btn-primary">Select a file</span>
                </div>
                <div id="response" class="hidden">
                    <div id="messages"></div>
                    <progress class="progress" id="file-progress" value="0">
                        <span>0</span>%
                    </progress>
                </div>
            </label>

        </form>
    </div>
    <script src="./script.js"></script>
</body>

</html>
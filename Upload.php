<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload and Display</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        text-align: center;
    }

    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #007BFF;
    }

    .upload-message {
        font-weight: bold;
        color: #00D45E;
        margin-top: 20px;
    }

    .image-container {
        position: relative;
    }

    img {
        max-width: 100%;
        height: auto;
        margin-top: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        cursor: pointer;
    }

    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        z-index: 1;
        align-items: center;
        justify-content: center;
    }

    .full-image {
        max-width: 80%;
        max-height: 80%;
    }

    .close-button {
        position: absolute;
        top: 20px;
        right: 20px;
        color: red;
        cursor: pointer;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1>Image Upload and Display</h1>
        <?php
        $fileName = $_FILES['img']['name'];
        $fileTmp = $_FILES['img']['tmp_name'];

        move_uploaded_file($fileTmp, 'Upload/' . $fileName);

        echo '<p class="upload-message">' . $fileName . ' File Uploaded Successfully</p>';
        ?>
        <div class="image-container">
            <img src="<?php echo "Upload/" . $fileName ?>" alt="Uploaded Image" onclick="openFullScreen()">
        </div>
    </div>

    <div class="overlay" id="overlay">
        <span class="close-button" onclick="closeFullScreen()">X</span>
        <img src="<?php echo "Upload/" . $fileName ?>" class="full-image" alt="Full-Screen Image"
            onclick="closeFullScreen()">
    </div>

    <script>
    function openFullScreen() {
        document.getElementById("overlay").style.display = "block";
    }

    function closeFullScreen() {
        document.getElementById("overlay").style.display = "none";
    }
    </script>
</body>

</html>
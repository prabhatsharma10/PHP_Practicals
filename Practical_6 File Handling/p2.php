<!DOCTYPE html>
<html>
<head>
    <title>Secure File Upload</title>
</head>
<body>
    <h2>Upload a File</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="ufile">Choose file : </label>
        <input type="file" name="ufile" id="ufile" required>
        <button type="submit">Upload</button>
    </form>

    <?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_FILES['ufile']) && $_FILES['ufile']['error'] === UPLOAD_ERR_OK){
            $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
            $maxFileSize = 2 * 1024 * 1024; 
            $uploadDir = 'uploads/';

            $fileTmpPath = $_FILES['ufile']['tmp_name'];
            $originalName = $_FILES['ufile']['name'];
            $fileSize = $_FILES['ufile']['size'];
            $fileType = $_FILES['ufile']['type'];
            $fileExt = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

            $safeFileName = preg_replace("/[^a-zA-Z0-9_\-\.]/", "_", basename($originalName));
            $destination = $uploadDir . time() . "_" . $safeFileName;

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            if (!in_array($fileType, $allowedTypes)) {
                echo "<p style='color:red;'>Invalid file type. Only JPEG, PNG, and PDF files are allowed.</p>";
            }

            elseif ($fileSize > $maxFileSize) {
                echo "<p style='color:red;'>File is too large. Maximum allowed size is 2MB.</p>";
            }
            elseif (move_uploaded_file($fileTmpPath, $destination)) {
                echo "<p style='color:green;'>File uploaded successfully to <strong>$destination</strong>.</p>";
                echo "<p>Original filename : $originalName</p>";
                echo "<p>File type : $fileType</p>";
                echo "<p>Size : " . round($fileSize / 1024 / 1024, 2) . " MB</p>";
            } 
            else {
                echo "<p style='color:red;'>Failed to move the uploaded file.</p>";
            }
        }
        else {
            echo "<p style='color:red;'>No file uploaded or upload error occurred.</p>";
        }
    }
    ?>
</body>
</html>

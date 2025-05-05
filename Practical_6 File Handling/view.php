<?php
if (isset($_GET['f'])) {
    $file = $_GET['f'];
    $filePath = "upload/".$file;

    if (file_exists($filePath)) {
        header('Content-Type: text/plain');
        header('Content-Disposition: inline; filename="' . $file . '"');
        readfile($filePath);
        exit;
    } 
    else {
        echo "<p>File does not exist.</p>";
    }
} 
else {
    echo "<p>No file specified.</p>";
}
?>

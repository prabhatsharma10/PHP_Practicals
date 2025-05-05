<?php
if (isset($_GET['f'])) {
    $filename = $_GET['f'];
    $filePath = 'upload/'.$filename;
    if (file_exists($filePath)) {       
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        readfile($filePath);
        exit;
    }
    else{
        echo "<p>❌ File does not exist.</p>";
    }
} 
else{
    echo "<p>⚠️ No file specified.</p>";
}
?>

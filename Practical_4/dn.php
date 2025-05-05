<?php

 $file = 'D:\SEM 6\WT\php.txt';

 if (file_exists($file)) {
    // Set headers to force download
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($file) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));

    // Clear output buffer
    ob_clean();
    flush();

    readfile($file);
    exit;
 }

else{
    echo 'File not found.';
 }

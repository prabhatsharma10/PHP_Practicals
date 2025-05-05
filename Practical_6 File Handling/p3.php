<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
</head>
<body>
<h4>Uploaded Files : </h4>
<body style="background-color: #f2f2f2;">

<?php

$upload = "upload/";
function listAllUpload(){
    global $upload;
    if(is_dir($upload)){
        if ($dir = opendir($upload)) {
            while (($file = readdir($dir)) !== false) {
                if ($file != "." && $file != ".."){
                    echo "📄<strong>$file \t</strong>";
                    echo "<a href='view.php?f=$file'> View | </a>";
                    echo "<a href='download.php?f=$file'> Download | </a>";
                    echo "<a href='delete.php?f=$file'>\tDelete</a><br>";
                }
            }
            closedir($dir);
        } 
        else{
            echo "<p>⚠️ Unable to open directory.</p>";
        }
    } 
    else{
        echo "<p>❌ Directory does not exist.</p>";
    }
}
listAllUpload();

?>

</body>
</html>

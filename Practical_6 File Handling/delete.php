<?php
$file = $_GET['f'];
$filePath = "upload/".$file;
if(file_exists($filePath)) {
    if (unlink($filePath)) {
        echo "<p>✅ File deleted successfully.</p>";
    } 
    else {
        echo "<p>❌ Error deleting file.</p>";
    }
}
else{
    echo "<p>❌ File does not exist.</p>";
}
echo "<br><a href='p3.php'>Back to File List</a>";
?>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $enrollment = $_POST['enrollment_no'] ?? '';
        $name = trim($_POST['full_name'] ?? '');
        $gender = $_POST['gender'] ?? '';
        $mobile = $_POST['mobile'] ?? '';
        $email = $_POST['email'] ?? '';
        $address = $_POST['address'] ?? '';

        if (isset($_POST['submit'])) {
            $uploadDir = "uploads/";
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir);
            }

            $photoName = uniqid() . "_" . basename($_FILES['profile_photo']['name']);
            $photoPath = $uploadDir . $photoName;
            move_uploaded_file($_FILES['profile_photo']['tmp_name'], $photoPath);

            $csvLine = [$enrollment, $name, $gender, $mobile, $email, $address, $photoName];
            $file = fopen("students.csv", "a");
            fputcsv($file, $csvLine);
            fclose($file);
            echo "<script>alert('✅ Registration successful!');</script>";
            header('Location: p1.php');
            exit();
        } 
        else {
            foreach ($errors as $e) {
                echo "<p style='color:red;'>❌ $e</p>";
            }
        }
    }
   
    ?>
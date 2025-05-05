<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Registration Form</title>
    
    <style>
        label{
            color: white;
        }
        
        td{
            padding: 15px;
        }
        h2{
            color: white;
        }
    </style>

</head>
<body style="background-color: rgb(171, 171, 171)">

<div align="center" style="background-color: rgb(5, 105, 152); padding: 20px; border-radius: 10px; width: 40%; margin: auto;">
    <h2>Student Registration Form</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

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
        } 
        else {
            foreach ($errors as $e) {
                echo "<p style='color:red;'>❌ $e</p>";
            }
        }
    }
    ?>

<form method="POST" action="" enctype="multipart/form-data">

    <table style="margin:5px">
        <tr>
            <td><label>Enrollment No</label></td>
            <td><input type="text" name="enrollment_no" required></td>
        </tr>
        <tr>
            <td><label>Full Name</label></td>
            <td> <input type="text" name="full_name" required></td>
        </tr>
        <tr>
            <td><label>Gender</label></td>
            <td>
                <select name="gender" required>
                <option value="">Select</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label>Mobile No</label></td>
            <td><input type="tel" name="mobile" pattern="\d{10}" title="Enter exactly 10 digits" required></td>
        </tr>
        <tr>
            <td><label>Email</label></td>
            <td><input type="email" name="email" required></td>
        </tr>
        <tr>
            <td><label>Address</label></td>
            <td><input type="text" name="address" required></td>
        </tr>
        <tr>
            <td><label>Profile Photo (JPG, PNG)</label></td>
            <td><input type="file" name="profile_photo" accept=".jpg, .jpeg, .png" required></td>
        </tr>                    
    </table>

    <input type="submit" value="Submit" name="submit"  style="background-color: rgb(114, 51, 0); color: white; padding: 10px; border: none; border-radius: 5px;">
    </form>
</div>
</body>
</html>
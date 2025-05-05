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
require('fpdf.php');

if (isset($_POST['submit'])) {
    $enroll = $_POST['enrollment_no'];
    $name = $_POST['full_name'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // Handle image upload
    $photo = $_FILES['profile_photo'];
    $imgPath = "temp/" . basename($photo['name']);
    move_uploaded_file($photo['tmp_name'], $imgPath);

    // Generate PDF
    $pdf = new FPDF();
    $pdf->AddPage();

    // Title
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Student Registration Details', 0, 1, 'C');
    $pdf->Ln(10);

    // Data fields
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(50, 10, 'Enrollment No:', 0, 0);
    $pdf->Cell(100, 10, $enroll, 0, 1);

    $pdf->Cell(50, 10, 'Full Name:', 0, 0);
    $pdf->Cell(100, 10, $name, 0, 1);

    $pdf->Cell(50, 10, 'Gender:', 0, 0);
    $pdf->Cell(100, 10, $gender, 0, 1);

    $pdf->Cell(50, 10, 'Mobile No:', 0, 0);
    $pdf->Cell(100, 10, $mobile, 0, 1);

    $pdf->Cell(50, 10, 'Email:', 0, 0);
    $pdf->Cell(100, 10, $email, 0, 1);

    $pdf->Cell(50, 10, 'Address:', 0, 0);
    $pdf->MultiCell(100, 10, $address);

    $pdf->Ln(10);

    // Profile photo
    if (file_exists($imgPath)) {
        $pdf->Cell(50, 10, 'Profile Photo:', 0, 1);
        $pdf->Image($imgPath, $pdf->GetX(), $pdf->GetY(), 50, 50);
    }

    // Output the PDF
    $pdf->Output('D', 'Student_Details.pdf');

    // Clean up temp image
    unlink($imgPath);
    exit;
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
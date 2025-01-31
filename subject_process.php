<?php
$un = "root";
$upw = "";
$host = "localhost";
$conn = mysqli_connect($host, $un, $upw);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_select_db($conn, "college");

$subject = mysqli_real_escape_string($conn, $_POST['subject']);

$logo_upload = $_FILES['logo']['name'];
$logo_tmp_name = $_FILES['logo']['tmp_name'];
$target_logo = "Logo_upload/" . basename($logo_upload);
move_uploaded_file($logo_tmp_name, $target_logo);

$query = "INSERT INTO subject_master (subject, logo) VALUES ('$subject', '$logo_upload')";

if (mysqli_query($conn, $query)) {
    echo '<script>alert("UPLOAD SUCCESSFULLY");window.location="subject_master.php";</script>';
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

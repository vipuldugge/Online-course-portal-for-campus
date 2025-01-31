<?php
$un = "root";
$upw = "";
$host = "localhost";
$database="college";
$conn = mysqli_connect($host, $un, $upw,$database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//mysqli_select_db($conn, "college");

$course = mysqli_real_escape_string($conn, $_POST['course']);
$subject = mysqli_real_escape_string($conn, $_POST['subject']);
$topic = mysqli_real_escape_string($conn, $_POST['topic']);
$date = mysqli_real_escape_string($conn, $_POST['date']);
$summary = mysqli_real_escape_string($conn, $_POST['summary']);

$notes_upload = $_FILES['notes']['name'];
$notes_tmp_name = $_FILES['notes']['tmp_name'];
$target_notes = "Notes_upload/" . basename($notes_upload);
move_uploaded_file($notes_tmp_name, $target_notes);

$video_upload = $_FILES['video']['name'];
$video_tmp_name = $_FILES['video']['tmp_name'];
$target_video = "Video_upload/" . basename($video_upload);
move_uploaded_file($video_tmp_name, $target_video);

$query = "INSERT INTO tbl_notes_details (course, subject, topic, date, notes, video, summary) 
          VALUES ('$course', '$subject', '$topic', '$date', '$notes_upload', '$video_upload', '$summary')";

if (mysqli_query($conn, $query)) {
    echo '<script>alert("UPLOAD SUCCESSFULLY");window.location="notesupload.php";</script>';
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

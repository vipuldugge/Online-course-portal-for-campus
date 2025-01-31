<?php
  $fn= $_POST['fn']; //firstname
  $ln= $_POST['ln'];  //lastname
  $father= $_POST['father'];
  $mother= $_POST['mother'];
  $dob= $_POST['dob']; //date of birth
  $gender= $_POST['gender'];
  $course= $_POST['course'];
  $sem= $_POST['sem'];
  $reg= $_POST['reg']; //register no
  $addr= $_POST['addr']; //address
  $city= $_POST['city']; 
  $pin= $_POST['pin'];
  $phno= $_POST['phno'];
  $email= $_POST['email'];
  $user= $_POST['username'];
  $pw= $_POST['pw']; //passward
  $cpw= $_POST['cpw']; //confirm passward
  $regdate=date('d/m/Y');
    /* PROFILE UPLOAD   */
  $pic=$_FILES['profile']['name'];
  $target = "profile_upload/".$pic;
  move_uploaded_file($_FILES['profile']['tmp_name'], $target);
  $query="INSERT INTO registration (regdate, first_name, last_name, father_name, mother_name, dob, gender, course, sem, register_no, address, city, pin, phno, email, photo, username, password, status) VALUES ('$regdate','$fn','$ln','$father','$mother','$dob','$gender','$course','$sem','$reg','$addr','$city','$pin','$phno','$email','$pic','$user','$pw','reject')";

 $un="root";
  $upw="";
  $host="localhost";
  $database="college";
  $conn=mysqli_connect($host,$un,$upw,$database);
  //mysqli_select_db("college");
 if($pw==$cpw)
  {
      mysqli_query($conn,$query);
	 echo '<script>alert("REGISTERED SUCCESSFULLY");window.location="login.php";</script>';
  }
  else
  {
     echo '<script>alert("PASSWORD DOESNOT MATCH");window.location="registration.php";</script>';
  }
  ?>
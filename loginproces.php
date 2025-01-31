<?php
// ob_start(); // to clear the browser cache...
// session_start();
// $username=$_POST['username'];
// $password=$_POST['password'];
// $get="SELECT * FROM registration WHERE username='$username' AND PASSWORD='$password' AND STATUS='accept' ";
// $un="root";
//   $upw="";
//   $host="localhost";
//   $database="college";
//   $conn=mysqli_connect($host,$un,$upw,$database);
//   // mysqli_select_db("college");
//    $res=mysqli_query($conn,$get);
//    while($r=mysqli_fetch_object($res))
//    {
//       $fn= $r->first_name;
//       $ln= $r->last_name;
// 	  $name=$fn.' '.$ln;
//       $father= $r->father_name;
//       $mother= $r->mother_name;
//       $dob= $r->dob;
//       $gender= $r->gender;
//       $course= $r->course;
//       $sem= $r->sem;
//       $reg= $r->register_no;
//       $phno= $r->phno;
//       $email= $r->email;
//       $profile_pic=$r->photo;
// 	  $pasword=$r->password;
// 	  $status='accept';
	  
//    }
//    if(mysqli_affected_rows($res)>0)
//    {
//         $_SESSION['un']=$username;
//         $_SESSION['name']=$name;
// 		$_SESSION['dob']=$dob;
// 		$_SESSION['gender']=$gender;
//         $_SESSION['course']=$course;
// 		$_SESSION['sem']=$sem;
// 		$_SESSION['reg']=$reg;
// 		$_SESSION['phno']=$phno;
// 		$_SESSION['email']=$email;
// 		$_SESSION['pic']=$profile_pic;
// 		$_SESSION['pswd']=$pasword;
// 		header("location:elearning.php");
// 	}
// 	else
// 	{
// 	    echo '<script>alert("NOT AUTHENTICATED");window.location="login.php";</script>';


// 	}




ob_start(); // to clear the browser cache...
session_start();

// Check if username and password are set in the POST request
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $get = "SELECT * FROM registration WHERE username='$username' AND password='$password' AND status='accept'";
    $un = "root";
    $upw = "";
    $host = "localhost";
    $database = "college";
    $conn = mysqli_connect($host, $un, $upw, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $res = mysqli_query($conn, $get);

    if ($res) {
        // Check if any rows were returned
        if (mysqli_num_rows($res) > 0) {
            $r = mysqli_fetch_object($res);

            // Fetch user details
            $fn = $r->first_name;
            $ln = $r->last_name;
            $name = $fn . ' ' . $ln;
            $father = $r->father_name;
            $mother = $r->mother_name;
            $dob = $r->dob;
            $gender = $r->gender;
            $course = $r->course;
            $sem = $r->sem;
            $reg = $r->register_no;
            $phno = $r->phno;
            $email = $r->email;
            $profile_pic = $r->photo;
            $password = $r->password;
            $status = 'accept';

            // Store user details in session variables
            $_SESSION['un'] = $username;
            $_SESSION['name'] = $name;
            $_SESSION['dob'] = $dob;
            $_SESSION['gender'] = $gender;
            $_SESSION['course'] = $course;
            $_SESSION['sem'] = $sem;
            $_SESSION['reg'] = $reg;
            $_SESSION['phno'] = $phno;
            $_SESSION['email'] = $email;
            $_SESSION['pic'] = $profile_pic;
            $_SESSION['pswd'] = $password;
            
            // Redirect to elearning.php
            header("location:elearning.php");
            exit();
        } else {
            // Authentication failed
            echo '<script>alert("NOT AUTHENTICATED");window.location="login.php";</script>';
            exit();
        }
    } else {
        // Error in query execution
        echo "Error: " . mysqli_error($conn);
        exit();
    }

    // Close connection
    mysqli_close($conn);
} else {
    // Username or password not provided in POST request
    echo '<script>alert("Username or password not provided");window.location="login.php";</script>';
    exit();
}
?>

   

   
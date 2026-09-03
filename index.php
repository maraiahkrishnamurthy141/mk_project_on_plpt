<?php
session_start();

/* DATABASE CONNECTION */
$conn = new mysqli("localhost","root","","my_project1");

if($conn->connect_error){
    die("Connection Failed");
}

$page = $_GET['page'] ?? 'home';

/* REGISTER */
if(isset($_POST['register']))
{
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $pinno = $_POST['pinno'];
    $email = $_POST['email'];
    $mobile_no = $_POST['mobile_no'];
    $branch = $_POST['branch'];

    $mother_name = $_POST['mother_name'];
    $father_name = $_POST['father_name'];
    $guardian_relation = $_POST['guardian_relation'];
    $occupation = $_POST['occupation'];
    $caste = $_POST['caste'];
    $mother_language = $_POST['mother_language'];
    $nationality = $_POST['nationality'];

    $dob = $_POST['dob'];
    $dob_words = $_POST['dob_words'];
    $identification_marks = $_POST['identification_marks'];
    $last_institution = $_POST['last_institution'];
    $date_of_admission = $_POST['date_of_admission'];
    $tc_number = $_POST['tc_number'];

    $sql = "INSERT INTO users(
        username,password,pinno,email,mobile_no,branch,
        mother_name,father_name,guardian_relation,occupation,
        caste,mother_language,nationality,dob,dob_words,
        identification_marks,last_institution,date_of_admission,tc_number
    )
    VALUES(
        '$username','$password','$pinno','$email','$mobile_no','$branch',
        '$mother_name','$father_name','$guardian_relation','$occupation',
        '$caste','$mother_language','$nationality','$dob','$dob_words',
        '$identification_marks','$last_institution','$date_of_admission','$tc_number'
    )";

    if($conn->query($sql))
    {  
        echo "<script>alert('Registration Successful');location='?page=login';</script>";
    }
    else
    {
        echo "<script>alert('Username Already Exists');</script>";
    }
}

/* LOGIN */
if(isset($_POST['login']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];

    $result=$conn->query("SELECT * FROM users WHERE username='$username'");

    if($result->num_rows>0)
    {
        $user=$result->fetch_assoc();

        if(password_verify($password,$user['password']))
        {
            $_SESSION['user']=$user['username'];
            header("Location:?page=dashboard");
            exit; 
        }
    }

    echo "<script>alert('Invalid Login');</script>";
}

/* LOGOUT */
if($page=="logout")
{
    session_destroy();
    header("Location:index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Government Polytechnic Pillaripattu</title>

<style>
body{
font-family:Arial;
margin:0;
body {
  
}
background:linear-gradient(-45deg,#1e3c72,#2a5298,#6dd5ed,#2193b0);
background-size:400% 400%;
animation:gradient 10s infinite;
color:white;
}

@keyframes gradient{
0%{background-position:0% 50%;}
50%{background-position:100% 50%;}
100%{background-position:0% 50%;}
}

.container{
width:90%;
margin:auto;
padding:20px;
text-align:center;
}

.card{
background:rgba(255,255,255,.15);
padding:30px;
border-radius:15px;
backdrop-filter:blur(10px);
}

input{
padding:10px;
margin:5px;
width:250px;
border:none;
border-radius:8px;
}

button{
padding:10px 20px;
border:none;
border-radius:8px;
cursor:pointer;
}

table{
width:100%;
background:white;
color:black;
border-collapse:collapse;
}

td,th{
padding:10px;
border:1px solid #ccc;
}
</style>
</head>
<body>

<div class="container">

<?php if($page=="home"){ ?>

<marquee><h1>Welcome To Government Polytechnic Pillaripattu</h1></marquee>
<marquee><h1>Welcome To Government Polytechnic Pillaripattu</h1></marquee>


<div class="card">
<a href="?page=register"><button>Register</button></a>
<a href="?page=login"><button>Login</button></a>
<a href="cg.html"><button>Certificate</button></a>
<a href="#"><button>Store</button></a>
<a href="attendance_index.php"><button>Attendance</button></a>
<a href="view_attendance.php"><button>View Attendance</button></a>
<a href="#"><button>Placement & Training</button></a>
<a href="feedback.html"><button>Feedback</button></a>
<a href="#"><button>Fee</button></a>
</div><br></br>
<a href="https://sbtet.ap.gov.in"><button style="background-color: pink;color:black";>Click here to visit SBTET Official Website</button></a>
<a href="https://apsbtet.rnits.technology/"><button style="background-color: pink;color:black";>Click here to visit SBTET Amaaa login</button></a>


<?php } ?>

<?php if($page=="register"){ ?>

<h2>User Registration</h2>

<form method="post">

<input type="text" name="username" placeholder="Username" required><br>

<input type="password" name="password" placeholder="Password" required><br>

<input type="text" name="pinno" placeholder="PIN No" required><br>

<input type="email" name="email" placeholder="Email" required><br>

<input type="text" name="mobile_no" placeholder="Mobile No" required><br>

<input type="text" name="branch" placeholder="Branch" required><br>

<input type="text" name="mother_name" placeholder="Mother Name" required><br>

<input type="text" name="father_name" placeholder="Father Name" required><br>

<input type="text" name="guardian_relation" placeholder="Guardian Relation" required><br>

<input type="text" name="occupation" placeholder="Occupation" required><br>

<input type="text" name="caste" placeholder="Caste" required><br>

<input type="text" name="mother_language" placeholder="Mother Language" required><br>

<input type="text" name="nationality" placeholder="Nationality" required><br>

<input type="date" name="dob" required><br>

<input type="text" name="dob_words" placeholder="DOB In Words" required><br>

<input type="text" name="identification_marks" placeholder="Identification Marks" required><br>

<input type="text" name="last_institution" placeholder="Last Institution" required><br>

<input type="date" name="date_of_admission" required><br>

<input type="text" name="tc_number" placeholder="TC Number" required><br>

<button type="submit" name="register">Register</button>

</form>

<?php } ?>

<?php if($page=="login"){ ?>

<h2>User Login</h2>

<form method="post">

<input type="text" name="username" placeholder="Username" required><br>

<input type="password" name="password" placeholder="Password" required><br>

<button type="submit" name="login">Login</button>

</form>

<?php } ?>

<?php if($page=="dashboard"){ ?>

<?php

if(!isset($_SESSION['user']))
{
    header("Location:?page=login");
    exit;
}

$user=$_SESSION['user'];

$result=$conn->query("SELECT * FROM users WHERE username='$user'");
$data=$result->fetch_assoc();

?>

<h2>Welcome <?php echo $data['username']; ?></h2>

<table>

<tr><th colspan="2">User Details</th></tr>

<?php
foreach($data as $key=>$value)
{
    if($key!="password")
    {
        echo "<tr>
                <td>".ucwords(str_replace("_"," ",$key))."</td>
                <td>$value</td>
              </tr>";
    }
}
?>

</table>

<br>

<a href="?page=logout">
<button>Logout</button>
</a>

<?php } ?>

</div>

</body>
</html>
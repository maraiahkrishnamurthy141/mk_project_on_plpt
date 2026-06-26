<!DOCTYPE html>
<html>
<head>
<title>Student Attendance Portal</title>

<style>

body{
    font-family:Arial;
    background:#f2f5f9;
}

.container{
    width:400px;
    margin:100px auto;
    background:white;
    padding:30px;
    border-radius:10px;
    box-shadow:0px 0px 10px #ccc;
}

input{
    width:100%;
    padding:12px;
    margin:10px 0;
}

button{
    width:100%;
    padding:12px;
    background:#2563eb;
    color:white;
    border:none;
    cursor:pointer;
}

h2{
    text-align:center;
}

</style>

</head>
<body>

<div class="container">

<h2>Student Attendance</h2>

<form action="checkatt.php" method="POST">

<input
type="text"
name="pin"
placeholder="Enter PIN Number"
required>

<button type="submit">
Check Attendance
</button>

</form>

</div>

</body>
</html>
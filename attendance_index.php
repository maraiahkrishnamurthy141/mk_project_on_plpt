<!DOCTYPE html>
<html>
<head>
<title>Student Attendance</title>

<style>
body{
    font-family:Arial,sans-serif;
    background:#f4f6f9;
    padding:30px;
}

.container{
    width:500px;
    margin:auto;
    background:white;
    padding:25px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,.1);
}

input,select{
    width:100%;
    padding:10px;
    margin-top:5px;
    margin-bottom:15px;
}

button{
    background:#2563eb;
    color:white;
    border:none;
    padding:12px;
    width:100%;
    cursor:pointer;
}
</style>

</head>
<body>

<div class="container">

<h2>Daily Attendance Entry</h2>

<form action="save_attendance.php" method="POST">

<label>Student ID</label>
<input type="text" name="student_id" required>

<label>Student Name</label>
<input type="text" name="student_name" required>

<label>Branch</label>
<input type="text" name="branch" required>

<label>Semester</label>
<input type="text" name="semester" required>

<label>Date</label>
<input type="date" name="attendance_date" required>

<label>Status</label>
<select name="status">
    <option value="Present">Present</option>
    <option value="Absent">Absent</option>
</select>

<button type="submit">
Save Attendance
</button>

</form>

</div>
<a href="view_attendance.php"><butto style="background-color: blue; color: white;">Click here to view attendance page</button></a>

</body>
</html>
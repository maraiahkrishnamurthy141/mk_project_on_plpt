<?php

include 'attdb.php';

$pin = $_POST['pin'];

$sql = "SELECT * FROM attendance WHERE student_id=?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("s",$pin);

$stmt->execute();

$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html>
<head>
<title>Attendance Result</title>

<style>

body{
    font-family:Arial;
    background:#f4f6f9;
}

.card{
    width:500px;
    margin:80px auto;
    background:white;
    padding:30px;
    border-radius:10px;
    box-shadow:0 0 10px #ccc;
}

.success{
    color:green;
}

.error{
    color:red;
}

table{
    width:100%;
    border-collapse:collapse;
}

td{
    padding:10px;
    border:1px solid #ddd;
}

</style>

</head>
<body>

<div class="card">

<?php

if($result->num_rows > 0){

    $row = $result->fetch_assoc();

    echo "<h2 class='success'>Student Found</h2>";

    echo "<table>";

    echo "<tr>
            <td>Pin</td>
            <td>".$row['student_id']."</td>
          </tr>";

    echo "<tr>
            <td>Name</td>
            <td>".$row['student_name']."</td>
          </tr>";
    echo "<tr>
            <td>Branch</td>
            <td>".$row['branch']."</td>
          </tr>";
    echo "<tr>
            <td>Date</td>
            <td>".$row['attendance_date']."</td>
          </tr>";  
    echo "<tr>
            <td>status</td>
            <td>".$row['status']."</td>
          </tr>";          

    echo "</table>";

}
else{

    echo "<h2 class='error'>PIN Not Found</h2>";

}

?>

</div>
<a href="index.php"><butto style="background-color: blue; color: white;">Click here to go to Home page</button></a>

</body>
</html>
<?php

include 'attdb.php';

$student_id = $_POST['student_id'];
$student_name = $_POST['student_name'];
$branch = $_POST['branch'];
$semester = $_POST['semester'];
$attendance_date = $_POST['attendance_date'];
$status = $_POST['status'];

/* Check if attendance already exists */

$check = "SELECT * FROM attendance
          WHERE student_id=? AND attendance_date=?";

$checkStmt = $conn->prepare($check);
$checkStmt->bind_param("ss", $student_id, $attendance_date);
$checkStmt->execute();

$result = $checkStmt->get_result();

if($result->num_rows > 0){

    echo "<h2 style='color:red'>
            Attendance Already Saved
          </h2>";

}
else{

    $sql = "INSERT INTO attendance
    (student_id,student_name,branch,semester,attendance_date,status)
    VALUES
    (?,?,?,?,?,?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
    "ssssss",
    $student_id,
    $student_name,
    $branch,
    $semester,
    $attendance_date,
    $status
    );

    if($stmt->execute()){

        echo "<h2 style='color:green'>
                Attendance Saved Successfully
              </h2>";

    }else{

        echo "Error : " . $conn->error;

    }

    $stmt->close();
}

$checkStmt->close();
$conn->close();

?>

<br><br>

<a href="view_attendance.php">
    <button>View Attendance</button>
</a>
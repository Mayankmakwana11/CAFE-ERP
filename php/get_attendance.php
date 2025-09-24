<?php
include 'connect.php';

header('Content-Type: application/json');

$sql = "SELECT staff.name as staff_name, attendance.date, attendance.present FROM attendance JOIN staff ON attendance.staff_id = staff.id";
$result = $conn->query($sql);

$attendanceRecords = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $attendanceRecords[] = $row;
    }
}

echo json_encode($attendanceRecords);

$conn->close();
?>
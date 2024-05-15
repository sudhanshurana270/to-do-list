<?php
require 'db_connection.php';

if(isset($_POST['task_id'])){
    $taskId = $_POST['task_id'];
    $stmt = $conn->prepare("UPDATE tasks SET status='completed' WHERE id=?");
    $stmt->bind_param("i", $taskId);
    $stmt->execute();
    $stmt->close();
}
?>

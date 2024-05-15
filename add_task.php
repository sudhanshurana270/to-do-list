<?php
require 'db_connection.php';

if(isset($_POST['task_name'])){
    $taskName = $_POST['task_name'];
    $stmt = $conn->prepare("INSERT INTO tasks (task_name) VALUES (?)");
    $stmt->bind_param("s", $taskName);
    $stmt->execute();
    $stmt->close();
}
?>

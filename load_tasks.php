<?php
require 'db_connection.php';

$query = "SELECT * FROM tasks";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $taskStatus = ($row['status'] == 'completed') ? 'task-done' : '';
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td class='$taskStatus'>" . htmlspecialchars($row['task_name']) . "</td>";
        echo "<td class='$taskStatus'>" . ucfirst($row['status']) . "</td>";
        echo "<td class='actions'>";
        if ($row['status'] == 'pending') {
            echo "<span class='complete' data-task-id='" . $row['id'] . "'>&#9989;</span>";
        }
        echo "<span class='remove' data-task-id='" . $row['id'] . "'>&#10060;</span>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No tasks found</td></tr>";
}

$conn->close();
?>

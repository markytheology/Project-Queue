<?php
include 'DBConnection.php';
$conn = OpenCon();

$sql = "SELECT id FROM transaction_table WHERE status = '2' ORDER BY created_on DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $queue_number = $row["id"];
} else {
    $queue_number = "---";
}

$sql = "Select id From transaction_table WHERE status = 1 ORDER BY created_on DESC LIMIT 10";
$result = $conn->query($sql);

$pendingList = '<ul>';
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $task = $row['id'];
    $pendingList .= '<li>' . $task . '</li>';
  }
}
$pendingList .= '</ul>';
     
$conn->close();

echo $pendingList;
?>
<div class = "queue">
<h2><b><p align="center">Now Serving: <br><br>
<span id="span-list"><?php echo $queue_number; ?> </span>
</div>
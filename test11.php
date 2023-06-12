<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        table, th, td {
            border: 1px solid black;
            padding: 10px;
        }
    </style>
</head>
<body>
    <h2>Cashiers</h2>
    <?php
    // Call the function to display the cashiers
    displayCashiers();
    ?>

    <h2>Queues</h2>
    <?php
    // Call the function to display the queues
    displayQueues();
    ?>
</body>
</html>


<?php
include '../DBConnection.php';
$conn = OpenCon();


$sql = "SELECT id FROM transaction_table WHERE status = '2' ORDER BY created_on DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $queue_number = $row["id"];
} else {
    $queue_number = "---";
}

$conn->close();
?>

<body>
<h2><b><p align="center">Cashier<br><br>
<span>Now Serving:<br>
<span id="span-list"><?php echo $queue_number; ?> </span>
</body>

<script>
setInterval(function() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("span-list").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "monitor.php", true);
    xhttp.send();
}, 5000);
</script>

<?php
include 'monitor.php';
?>
<body>
<h2><b><p align="center">Now Serving: <br><br>
<span id="span-list"><?php echo $queue_number; ?> </span>
</body>
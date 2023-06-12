<?php
session_start();

function getCurrentCashier() {
    if (isset($_SESSION['windows'])) {
        return $_SESSION['windows'];
    } else {
        return "Cashier 1";
    }
}

function updateCashier($newCashier) {
    $_SESSION['windows'] = $newCashier;
}
?>

<!DOCTYPE html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>

        body {
            font-family: Arial, sans-serif;
        }
        
        .monitor {
            background-color: #f2f2f2;
            border: 1px solid #ccc;
            padding: 20px;
            width: 300px;
            margin: 0 auto;
            text-align: center;
        }
    </style>
    <script>

        function refreshMonitor() {

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {

                    document.getElementById("cashier").innerHTML = xhr.responseText;
                }
            };
            xhr.open("GET", "index2.php", true);
            xhr.send();

            setTimeout(refreshMonitor, 5000);
        }

        window.onload = refreshMonitor;
        
    </script>
</head>
<body>
    <div class="monitor">
        <h2>Queue Monitor</h2>
        <h4>Pending Queue Monitor</h4>

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

         <div id="pendingQueue"></div>
        <p><b>Cashier: <span id="cashier"><?php echo getCurrentCashier(); ?></span></p>
        <span id="span-list"><?php echo $queue_number; ?> </span>
</div>
    </div>
</body>
</html>

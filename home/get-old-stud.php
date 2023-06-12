<!DOCTYPE html>
<hmtl lang="en">
  <head>
    <meta charset = "UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OLD STUDENT</title>
    <link rel="stylesheet" href="../css/bootsrap.min.css">
    <script src="./js/jquery-3.6.9.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/script.js"></script>
    <style>
        html, body{
            height:100%;
        }
    </style>
    </head>
    <body class="bg-dark bg-gradient">
      <div class="h-100 d-flex justify-content-center align-items-center">
        <div class='w-100'>
          <h3 class="py-5 text-center text-light">OLD STUDENT</h3>
          <div class="card my-3 cold-md4 offset-md-4">
            <div class="card-body">


<?php
include '../DBConnection.php';
$conn = OpenCon();

$id_num =  $_REQUEST['id_num'];
    $fullname = $_REQUEST['fullname'];
    $mobile_num =  $_REQUEST['mobile_num'];
    $transaction_id = $_REQUEST['transaction_id'];

$sql = "INSERT INTO transaction_table (client_type, id_num, fullname, mobile_num, transaction_id, status)
VALUES ('Old Student', '$id_num', '$fullname', '$mobile_num', '$transaction_id', '1')";

if ($conn->query($sql) === TRUE) {
  $last_input_id = $conn->insert_id;
  echo "Priority number is: ", $last_input_id;
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

echo'<form method="POST" action="queue-home.php">
    <input class="btn btn-sm btn-primary rounded-0 my-1" value = "Back" type="submit"/>
    </form>';

$conn->close();
?>
</div>
</div>
</div>
</body>
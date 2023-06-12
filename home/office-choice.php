<?php
include './../DBConnection.php';
$conn = OpenCon();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEW STUDENT</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/script.js"></script>
    <script>src ="../css/get.queue.css"</script>
    
    <style>
        html, body{
            height:100%;
        }
    </style>
</head>
<body class="bg-dark bg-gradient">
   <div class="h-100 d-flex jsutify-content-center align-items-center">
       <div class='w-100'>
        <h3 class="py-5 text-center text-light">Queuing System</h3>
        <div class="card my-3 col-md-4 offset-md-4">
            <div class="card-body">
                
                    <form method="POST" action="old-student.php">
                    <input class="btn btn-sm btn-primary rounded-0 my-1" value = "Old Student" type="submit"/>
                    </form>

                    <form method="POST" action="new-student.php">
                    <input class="btn btn-sm btn-primary rounded-0 my-1" value = "New Student" type="submit"/>
                    </form>

                    <form method="POST" action="parents.php">
                    <input class="btn btn-sm btn-primary rounded-0 my-1" value = "Parent/Guardians" type="submit"/>
                    </form>

                    <form method="POST" action="others.php">
                    <input class="btn btn-sm btn-primary rounded-0 my-1" value = "Others" type="submit"/>
                    </form>

                    <form method="POST" action="../login/login-page.php">
                    <input class="btn btn-sm btn-primary rounded-0 my-1" value = "Back" type="submit"/>
                    </form>
                
            </div>
        </div>
       </div>
   </div>
</body>
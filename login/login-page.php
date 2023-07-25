<?php
/*session_start();
if(isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0){
    header("Location:./");
    exit;
}*/
session_start();
include './../DBConnection.php';
$conn = OpenCon();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
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
   <div class="h-100 d-flex jsutify-content-center align-items-center">
       <div class='w-100'>
        <h3 class="py-5 text-center text-light">Queuing System</h3>
        <div class="card my-3 col-md-4 offset-md-4">
        <form action="authenticate.php" method="post">
            <div class="card-body">
                <form action="" id="login-form">
                <?php if (isset($_GET['error'])) 
                    { 
                        ?>
                            <center><p class="error"><?php echo $_GET['error']; ?></p></center>
                        <?php 
                    }
                ?>
                    <div class="form-group">
                        <label for="username" class="control-label">Username</label>
                        <input type="text" id="username" autofocus name="username"
                             class="form-control form-control-sm rounded-0" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label">Password</label>
                        <input type="password" id="password" name="password"
                             class="form-control form-control-sm rounded-0" required>
                    </div>
                    <div class="form-group d-flex w-100 justify-content-between align-items-center">
                        <form action="authenticate.php" method="POST">  
                            <input class="btn btn-sm btn-primary rounded-0 my-1" value = 'Login' type="submit"/>
                        </div>
                </form>
            </div>
        </div>
       </div>
   </div>
</body>
</html>
<body>
<h3>Welcome Admin</h3>
<hr>
<form action = "users-admin.php" method = "POST">
<button class="btn btn-primary" type="submit">Users</button>
</form>
<form action = "office-window.php" method = "POST">
<button class="btn btn-primary" type="submit">Windows List</button>
</form>
<form action = "history-page.php" method = "POST">
<button class = "btn btn-primary" type = "submit">History</button>
</form>
<form action = "../login/logout.php" method = "POST">
<button class="btn btn-primary" type="submit">Logout</button>
</form>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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

<div class="col-12">
    <div class="col-md-12">
        <?php 
        include './../DBConnection.php';
        $conn = OpenCon();
        session_start();
            $vid = scandir('../video');
            $video = $vid[2];
            if($video):
        ?>
            <center><br><br><video src="../video/<?php echo $video ?>" autoplay muted controls id="vid_loop" class="bg-dark" loop style="height:50vh;width:60%"></video></center>
        <?php 
            endif; 
        ?>
        <form action="" id="upload-form">
            <input type="hidden" name="video" value="<?php echo $video; ?>">
            <div class="row justify-content-center my-2">
                <div class="form-group col-md-4">
                    <label for="vid" class="control-label">Update Video</label>
                    <input type="file" name="vid" id="vid" class="form-control" accept="video/*" required>
                </div>
            </div>
            <div class="row justify-content-center my-2">
                <center>
                    <button class="btn btn-primary" type="submit">Update</button>
                </center>
            </div>
        </form>
    </div>
</div>
        </body>